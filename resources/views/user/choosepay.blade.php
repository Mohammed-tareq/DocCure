@extends('layouts.user')

@section('breadcrumb')

    <!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->


@endsection

@section('content')

<div class="content success-page-cont">
    <div class="container-fluid">

        <div class="row ">
            <div class="col-lg-12 mx-4">


                <!-- Success Card -->
                <div class="card success-card">
                    <div class="card-body">
                        <div class="success-cont">
                            <i class="fas fa-exclamation"></i>
                                    <h3>Appointment booked Successfully! hii</h3>
                            @if ($appointments->user->gender == 'male')
                                <p><strong>Mr: {{ $appointments->user->name }}</strong>  your Appointment booked with <strong> Dr. {{ $appointments->doctor->name }}</strong><br> on <strong>{{ $appointments->date }}
                                    {{ formatTimeTo12Hour($appointments->time) }}
                                </strong></p>
                                {{-- <a href="{{ route('home') }}" class="btn btn-primary view-inv-btn">Go To Doctors</a> --}}
                            @elseif($appointments->user->gender == 'female')
                                <p><strong> Ms:{{ $appointments->user->name }}</strong>  your Appointment booked with <strong> Dr. {{ $appointments->doctor->name }}</strong><br> on <strong>{{ $appointments->date }}
                                    {{ formatTimeTo12Hour($appointments->time) }}
                                </strong></p>
                                {{-- <a href="{{ route('home') }}" class="btn btn-primary view-inv-btn">Go To Doctors</a> --}}
                            @else
                                <p><strong>{{ $appointments->user->name }}</strong>  your Appointment booked with <strong> Dr. {{ $appointments->doctor->name }}</strong><br> on <strong>{{ $appointments->date }}
                                    {{ formatTimeTo12Hour($appointments->time) }}
                                </strong></p>
                                @endif
                               
                                <div class="d-flex justify-content-around ">
                                    <form action="{{ route('booksucc') }}" method="post">
                                        @csrf
                                        <input type="number" name="doctor_id"  value="{{ $appointments->doctor->id }}" hidden>
                                        <button type="submit" class="btn btn-primary view-inv-btn"> Cash payment</button> 
    
                                    </form>
                                    
                                    <form id="payment-form" action="{{ route('processPayment') }}" method="POST">
                                        @csrf
                                        <!-- Hidden field for appointment ID -->
                                        <input type="hidden" name="appointment_id" value="{{ $appointments->id }}">
                                    
                                        <!-- Stripe Card Element -->
                                        <div id="card-element"></div>
                                        <div id="card-errors" role="alert"></div>
                                    
                                        <!-- Pay Button -->
                                        <button id="payButton" class="btn btn-primary view-inv-btn" type="button">Pay ${{ $appointments->doctor->price }}</button>
                                    </form>
                                    
                                </div>
                        </div>
                    </div>
                </div>
                <!-- /Success Card -->
                

            </div>
        </div>

    </div>
</div>

@endsection


<?php
function formatTimeTo12Hour( $value)  {
    // Step 1: Create a DateTime object from the time string
    $dateTime = DateTime::createFromFormat('H:i:s', $value);

    // Step 2: Format the DateTime object to 12-hour format with AM/PM
    return $dateTime->format('h:i A');
}
?>

@push('js')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Initialize Stripe with your public key
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const elements = stripe.elements();

    // Create a card element
    const card = elements.create('card');
    card.mount('#card-element');

    // Add event listener to the pay button
    document.getElementById('payButton').addEventListener('click', async () => {
        // Disable the button to prevent multiple clicks
        document.getElementById('payButton').disabled = true;

        const { token, error } = await stripe.createToken(card);

        if (error) {
            // Display the error in the #card-errors div
            document.getElementById('card-errors').textContent = error.message;
            document.getElementById('payButton').disabled = false; // Re-enable the button
        } else {
            // Append the token to the form and submit
            const form = document.getElementById('payment-form');
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        }
    });
</script>
@endpush