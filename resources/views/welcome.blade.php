@extends('layouts.main')


@section('content')
    <!-- Home Banner -->
    <section class="section section-search" style="height: 80vh ;">
        <div class="container-fluid">
            <div class="banner-wrapper">
                <div class="banner-header text-center">
                    <h1>Choose Doctor, Make an Appointment</h1>
                    <p>Discover the best Doctors nearest to you.</p>
                </div>

                <!-- Search -->
                <div class="text-center login-link">
                    <a href="{{ route('register') }}" class="btn btn-success btn-lg px-5 mt-5">Login / Signup</a>

                </div>
                <!-- /Search -->

            </div>
        </div>
    </section>
    <!-- /Home Banner -->
@endsection
