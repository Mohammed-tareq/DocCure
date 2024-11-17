@extends('layouts.user')


@push('css')

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<!-- Select2 CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

@endpush



@push('sidebar')

@include('include.usersidebar')

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
    <div class="card">
        <div class="card-body">

            <!-- Profile Settings Form -->
            <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{ $user->image }}"  id="preview" alt="User Image">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" onchange="previewImage(event)" class="upload" name="image">
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" value="Richard">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control" value="Wilson">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="">
                                <input type="date" id="dateForm" name="dateofbir" class="form-control datetimepicker" value="{{ $user->dateofbir }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control select" name="gender">
                                <option selected disabled> Select Your Gender </option>
                              

                                    <option @selected( $user->gender == 'male' ) value="male">male</option>
                                    <option @selected( $user->gender == 'female' ) value="female">female</option>
                                
                            
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control select" name="bloodgroup">
                                <option selected disabled> Select Your Blood </option>
                                @foreach ($bloodgroups as $bloodgroup)

                                    <option @selected( $user->bloodgroup == $bloodgroup )>{{ $bloodgroup }}</option>
                                
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label>Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                        </div>
                    </div>
                    
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                </div>
            </form>
            <!-- /Profile Settings Form -->

        </div>
    </div>
</div>

@endsection




@push('js')


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


<script>
    document.getElementById("dateForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevents the form from submitting to show the result here

        // Get the date value from the input
        const dateInput = document.getElementById("date").value;

        // Check if the date is selected
        if (dateInput) {
            // The value is already in yyyy-mm-dd format by default
            const formattedDate = dateInput;

            // Display the formatted date in the output paragraph (for demonstration)
            document.getElementById("output").innerText = `Formatted Date: ${formattedDate}`;

            // For actual form submission, remove the event.preventDefault() line above
            // and submit the form to save or send the formatted date.
            console.log("Date saved in yyyy-mm-dd format:", formattedDate);
        } else {
            document.getElementById("output").innerText = "Please select a date.";
        }
    });
</script>



<!-- Select2 JS -->
<script src="assets/plugins/select2/js/select2.min.js"></script>

<!-- Datetimepicker JS -->
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Sticky Sidebar JS -->
<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
@endpush





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Input Example</title>
</head>
<body>





</body>
</html>
