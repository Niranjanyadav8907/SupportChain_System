<nav class="navbar navbar-expand navbar-light bg-white sticky-top shadow-sm px-4 py-2">
    <div class="container-fluid">
        <!-- Sidebar Toggle Switch for Mobile -->
        <button class="btn btn-link d-lg-none me-3" id="sidebarToggle" type="button">
            <i class="bi bi-list fs-3"></i>
        </button>

        <!-- Search Bar -->
        <form class="d-none d-md-flex w-25" action="{{ route('tickets.index') }}" method="GET">
            <div class="input-group">
                <span class="input-group-text bg-light border-0 rounded-start-pill text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input class="form-control bg-light border-0 rounded-end-pill ps-0" type="search" name="search" placeholder="Search tickets..." aria-label="Search">
            </div>
        </form>

        <!-- Right Side Nav Elements -->
        <ul class="navbar-nav ms-auto align-items-center gap-3">
            
            <!-- In-App Notifications Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link position-relative" href="#" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell-fill fs-5 text-muted"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger notification-badge" style="display: none; font-size: 0.7rem;">
                        0
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 p-3" aria-labelledby="navbarDropdownNotification" style="width: 320px;">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                        <h6 class="mb-0 fw-bold">Recent Alerts</h6>
                        <a href="{{ route('notifications.index') }}" class="text-primary text-decoration-none small fw-semibold">View All</a>
                    </div>
                    <!-- Notifications list injected via AJAX or simple fallback -->
                    <div class="notifications-dropdown-list">
                        @forelse(auth()->user()->unreadNotifications->take(4) as $n)
                            <a class="dropdown-item d-flex gap-3 align-items-start rounded-3 py-2 px-2 text-wrap" href="{{ route('tickets.show', $n->data['ticket_id']) }}">
                                <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; flex-shrink: 0;">
                                    <i class="bi bi-ticket-detailed"></i>
                                </div>
                                <div>
                                    <p class="mb-0 small fw-medium">{{ $n->data['message'] }}</p>
                                    <small class="text-muted text-xs">{{ $n->created_at->diffForHumans() }}</small>
                                </div>
                            </a>
                        @empty
                            <div class="text-center py-3">
                                <i class="bi bi-bell-slash text-muted fs-4"></i>
                                <p class="text-muted mb-0 small mt-1">No unread notifications</p>
                            </div>
                        @endforelse
                    </div>
                </ul>
            </li>

            <!-- User Info and Avatar Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link d-flex align-items-center gap-2" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold text-uppercase" style="width: 38px; height: 38px;">
                        {{ substr(auth()->user()->name, 0, 2) }}
                    </div>
                    <div class="d-none d-lg-block text-start">
                        <span class="fw-bold d-block text-sm" style="line-height: 1.1;">{{ auth()->user()->name }}</span>
                        <small class="text-muted fs-7">{{ auth()->user()->roles->first()?->name ?? 'Staff' }}</small>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 p-2" aria-labelledby="navbarDropdownUser">
                    <li>
                        <a class="dropdown-item rounded-3 d-flex align-items-center gap-2" href="{{ route('profile.index') }}">
                            <i class="bi bi-person text-muted"></i> My Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-3 d-flex align-items-center gap-2" href="{{ route('profile.index') }}#change-password">
                            <i class="bi bi-key text-muted"></i> Change Password
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item rounded-3 d-flex align-items-center gap-2 text-danger">
                                <i class="bi bi-box-arrow-right"></i> Log Out
                            </button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>

<script>
    // Sidebar toggler for smaller resolutions
    document.addEventListener("DOMContentLoaded", function() {
        var sidebarBtn = document.getElementById("sidebarToggle");
        if (sidebarBtn) {
            sidebarBtn.addEventListener("click", function() {
                var sidebar = document.getElementById("sidebar");
                sidebar.classList.toggle("show");
            });
        }
    });
</script>


<style>
/* =========================
   TOP NAVBAR
========================= */

.navbar {
    background: #ffffff !important;
    border-bottom: 1px solid #e2e8f0;
    box-shadow: 0 2px 15px rgba(0,0,0,.05) !important;
}

/* Sidebar Toggle */

#sidebarToggle {
    color: #bc342c !important;
    padding: 0;
}

#sidebarToggle:hover {
    color: #a52d26 !important;
}

/* =========================
   SEARCH BAR
========================= */

.navbar .input-group-text {
    background: #f8fafc !important;
    border: 1px solid #dbe2ea !important;
    border-right: none !important;
    color: #64748b;
}

.navbar .form-control {
    background: #f8fafc !important;
    border: 1px solid #dbe2ea !important;
    border-left: none !important;
    color: #334155 !important;
    box-shadow: none !important;
}

.navbar .form-control:focus {
    border-color: #bc342c !important;
    box-shadow: 0 0 0 4px rgba(188,52,44,.12) !important;
}

/* =========================
   NOTIFICATION ICON
========================= */

.navbar .bi-bell-fill {
    color: #64748b !important;
    transition: .3s;
}

.navbar .bi-bell-fill:hover {
    color: #bc342c !important;
}

.notification-badge {
    background: #bc342c !important;
}

/* =========================
   USER AVATAR
========================= */

.navbar .bg-primary {
    background: #bc342c !important;
}

.navbar .fw-bold {
    color: #1e293b;
}

/* =========================
   DROPDOWNS
========================= */

.dropdown-menu {
    border-radius: 16px !important;
    border: 1px solid #e2e8f0 !important;
    box-shadow: 0 10px 30px rgba(0,0,0,.08) !important;
}

.dropdown-item {
    border-radius: 10px;
    transition: all .2s ease;
}

.dropdown-item:hover {
    background: rgba(188,52,44,.08);
    color: #bc342c;
}

.dropdown-item.text-danger:hover {
    background: rgba(220,53,69,.08);
    color: #dc3545 !important;
}

/* =========================
   NOTIFICATION ITEMS
========================= */

.bg-primary-subtle {
    background: rgba(188,52,44,.12) !important;
}

.text-primary {
    color: #443e3e !important;
}

/* =========================
   USER ROLE TEXT
========================= */

.fs-7,
small.text-muted {
    color: #0b0e13 !important;
}

/* =========================
   MOBILE
========================= */

@media (max-width: 768px) {
    .navbar {
        padding-left: 15px !important;
        padding-right: 15px !important;
    }

    .navbar .form-control {
        font-size: .9rem;
    }
}

</style>