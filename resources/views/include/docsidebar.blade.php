<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
                <img src= "{{ Auth::guard('doctor')->user()->image }}" alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>Dr. {{ Auth::guard('doctor')->user()->name }}</h3>

                <div class="patient-details">
                    <h5 class="mb-0">{{ Auth::guard('doctor')->user()->specialize }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li>
                    <a href="{{ route('doctor.index') }}">
                        <i class="fas fa-columns"></i>
                        <span>Doctor Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('appointment.index') }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.profile', Auth::guard('doctor')->user()->id) }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Doctor profile</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('doctor.edit', Auth::guard('doctor')->user()->id) }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('doctor.logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
