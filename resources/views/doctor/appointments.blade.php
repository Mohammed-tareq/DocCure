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
                        <li class="breadcrumb-item active" aria-current="page">Appointments</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Appointments</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

@endsection



@section('content')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <h2 class="text-center my-3">Accepted Appoinments</h2>
                        <div class="appointments">

                            <!-- Appointment List -->
                            @foreach ($appointments as $appointment)

                            <div class="appointment-list">
                                <div class="profile-info-widget">
                                    <a href="patient-profile.html" class="booking-doc-img">
                                        <img src="{{ $appointment->user->image }}" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3><a href="patient-profile.html">{{ $appointment->user->name }}</a></h3>
                                        <div class="patient-details">
                                            <h5><i class="far fa-clock"></i>  {{ $appointment->date }}, {{  formatTimeTo12Hour($appointment->time)}}</h5>
                                            <h5><i class="fas fa-map-marker-alt"></i>{{ $appointment->user->address }}</h5>
                                            <h5><i class="fas fa-envelope"></i> {{ $appointment->user->email }}</h5>
                                            <h5 class="mb-0"><i class="fas fa-phone"></i> {{ $appointment->user->phone }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-action align-content-center">
                                    <a href="{{ route('appointment.cancal.doctor', $appointment->id) }}"  class="btn btn-sm bg-danger-light">
                                        <i class="far fa-trash-alt"></i> Cancel
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            <!-- /Appointment List -->
        </div>
@endsection






@push('js')
<!-- Sticky Sidebar JS -->
<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
@endpush


<?php
function formatTimeTo12Hour( $value)  {
    // Step 1: Create a DateTime object from the time string
    $dateTime = DateTime::createFromFormat('H:i:s', $value);

    // Step 2: Format the DateTime object to 12-hour format with AM/PM
    return $dateTime->format('h:i A');
}
?>
