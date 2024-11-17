@extends('layouts.doctor')

@push('css')

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}">

<link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}">

@endpush



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
                        <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Profile Settings</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

@endsection

@section('content')




    <div class="col-md-7 col-lg-8 col-xl-9">
        <form action="{{ route('doctor.update', $doctor->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Basic Information -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic Information</h4>
                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="profile-img">
                                        <img id="preview" src="{{ $doctor->image }}"  alt="User Image">
                                    </div>
                                    <div class="upload-img">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" class="upload" onchange="previewImage(event)" name="image">
                                        </div>
                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $doctor->name }}" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" value="{{ $doctor->email }}" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Specialize</label>
                                <input type="text" name="specialize" value="{{ $doctor->specialize }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Address</label>
                                <input type="text" class="form-control" name="address" value="{{ $doctor->address }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Basic Information -->

            <!-- About Me -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">About Me</h4>
                    <div class="form-group mb-0">
                        <label for="bio">Biography</label>
                        <textarea class="form-control" rows="5" name="bio" id="bio">{{ $doctor->bio }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /About Me -->





            <!-- Pricing -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pricing</h4>

                    <div class="form-group mb-0">
                        <div id="pricing_select">
                            <input type="number" name="price" class="form-control" id="custom_rating_input" name="custom_rating_count" value="{{ $doctor->price }}" placeholder="Enter your price">
                        </div>

                    </div>



                </div>
            </div>
            <!-- /Pricing -->





            <div class="submit-section submit-btn-bottom">
                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
            </div>
        </form>
    </div>


@endsection



@push('js')

    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Dropzone JS -->
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>

    <!-- Profile Settings JS -->
    <script src="{{ asset('assets/js/profile-settings.js') }}"></script>

    <script>
        function previewImage(event) {
        var input = event.target;
        var image = document.getElementById('preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    </script>

@endpush
