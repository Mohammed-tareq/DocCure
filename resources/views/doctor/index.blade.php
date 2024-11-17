@extends('layouts.doctor')





@push('sidebar')

@include('include.docsidebar')

@endpush

@section('breadcrumb')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

@endsection

@section('content')





    <div class="col-md-7 col-lg-8 col-xl-9">

        <div class="row">
            <div class="col-md-12">
                <div class="card dash-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="dash-widget dct-border-rht">
                                    <div class="circle-bar circle-bar1">
                                        <div class="circle-graph1" data-percent="75">
                                            <img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Total Patient</h6>
                                        <h3>{{ $appointments->unique('user_id')->count() }}</h3>
                                        <p class="text-muted">Till Today</p>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12 col-lg-6">
                                <div class="dash-widget">
                                    <div class="circle-bar circle-bar3">
                                        <div class="circle-graph3" data-percent="50">
                                            <img src="{{ asset('assets/img/icon-03.png') }}" class="img-fluid" alt="Patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Appoinments</h6>
                                        <h3>{{ $appointments->count() }}</h3>
                                        <p class="text-muted">{{ now()->format('d M, Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Patient Appoinment</h4>
                <div class="appointments">

                    @foreach ($appointments as $appointment)

                    <!-- Appointment List -->
                    <div class="appointment-list">
                        <div class="profile-info-widget">
                            <a href="#" class="booking-doc-img">
                                <img src="{{ $appointment->user->image }}" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3><a href="#">{{ $appointment->user->name }}</a></h3>
                                <div class="patient-details">
                                    <h5><i class="far fa-clock"></i> {{ $appointment->date}}, {{  formatTimeTo12Hour($appointment->time)}}</h5>
                                    <h5><i class="fas fa-map-marker-alt"></i> {{ $appointment->user->address }}</h5>
                                    <h5><i class="fas fa-envelope"></i>{{$appointment->user->email}}</h5>
                                    <h5 class="mb-0"><i class="fas fa-phone"></i>{{$appointment->user->phone}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="appointment-action">

                            <a href="{{ route('appointment.accept.doctor', $appointment->id) }}" class="btn btn-sm bg-success-light">
                                <i class="fas fa-check"></i> Accept
                            </a>
                            <a href="{{ route('appointment.cancal.doctor', $appointment->id) }};" class="btn btn-sm bg-danger-light">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </div>
                    <!-- /Appointment List -->
                    @endforeach


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



<!-- Circle Progress JS -->
<script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>



<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>



<!-- Sticky Sidebar JS -->
<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<!-- Circle Progress JS -->
<script src="assets/js/circle-progress.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>
@endpush

