<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function processPayment(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'stripeToken' => 'required|string',
            'appointment_id' => 'required|exists:appointments,id',
        ]);

        $appointment_id = $validated['appointment_id'];

        try {
            // Set Stripe API key
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Fetch the appointment and calculate the amount
            $appointment = Appointment::with('doctor')->findOrFail($appointment_id);
            $amount = $appointment->doctor->price * 100; // Convert to cents

            // Create a Stripe charge
            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'description' => 'Doctor Appointment price',
                'source' => $validated['stripeToken'],
            ]);

            // Record the payment in the database
            Payment::create([
                'appointment_id' => $appointment->id,
                'amount' => $appointment->doctor->price,
                'status' => 'completed',
            ]);

            // Update appointment status
            $appointment->update(['status' => 'confirmed']);

            return redirect()->route('appointments.show', $appointment_id)
                             ->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Payment Error: ', ['exception' => $e]);

            return redirect()->route('cashpayment')
                             ->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
