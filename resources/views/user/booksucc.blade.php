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
                            <i class="fas fa-check"></i>
                            <h3>Appointment booked Successfully!</h3>
                            @if ($appointments->user->gender == 'male')
                                <p><strong>Mr: {{ $appointments->user->name }}</strong>  your Appointment booked with <strong> Dr. {{ $appointments->doctor->name }}</strong><br> on <strong>{{ $appointments->date }}
                                    {{ formatTimeTo12Hour($appointments->time) }}
                                </strong></p>
                            @elseif($appointments->user->gender == 'female')
                                <p><strong> Ms:{{ $appointments->user->name }}</strong>  your Appointment booked with <strong> Dr. {{ $appointments->doctor->name }}</strong><br> on <strong>{{ $appointments->date }}
                                    {{ formatTimeTo12Hour($appointments->time) }}
                                </strong></p>
                            @else
                                <p><strong>{{ $appointments->user->name }}</strong>  your Appointment booked with <strong> Dr. {{ $appointments->doctor->name }}</strong><br> on <strong>{{ $appointments->date }}
                                    {{ formatTimeTo12Hour($appointments->time) }}
                                </strong></p>
                                @endif
                                <a href="{{ route('home') }}" class="btn btn-primary view-inv-btn">Go To Appointments</a>
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
