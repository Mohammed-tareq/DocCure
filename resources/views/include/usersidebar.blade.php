

    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{ Auth::user()->image }}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{ Auth::user()->name }}</h3>
                    <div class="patient-details">
                        <h5><i class="fas fa-birthday-cake"></i> {{ Auth::user()->dateofbir }} ,{{ calculateAge(Auth::user()->dateofbir) }} years</h5>

                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{Auth::user()->address }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="fas fa-columns"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.doctors') }}">
                            <i class="fas fa-user-md"></i>
                            <span>Doctors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.edit', Auth::user()->id) }}">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('password', Auth::user()->id) }}">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
    @php
        function calculateAge($dateofbir) {
        $birthDate = new DateTime($dateofbir);
        $today = new DateTime();
        $diff = $today->diff($birthDate);
        return $diff->y;
    }
    @endphp

