@extends('layouts.user')

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
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

@endsection


@section('content')

    <!-- Page Content -->

    
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">

                        <!-- Change Password Form -->
                        <form action="{{ route('user.changepass', $user->id) }}" method="POST">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                            </div>
                        </form>
                        <!-- /Change Password Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
