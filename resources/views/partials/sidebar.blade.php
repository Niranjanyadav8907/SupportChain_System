<aside id="sidebar" class="bg-dark text-white d-flex flex-column" style="width: 260px; min-height: 100vh; position: fixed; left: 0; top: 0; z-index: 1000; transition: all 0.3s;">
    <!-- Logo area -->
    <div class="sidebar-header border-bottom border-secondary p-4 d-flex align-items-center justify-content-between">
        <a class="sidebar-logo d-flex align-items-center text-decoration-none"
            href="{{ route('dashboard') }}">
                <span class="support">SUPPORT</span>
                <span class="chain">CHAIN</span>
            </a>
        <button class="btn btn-close btn-close-white d-lg-none" type="button" onclick="document.getElementById('sidebar').classList.remove('show')"></button>
    </div>

    <!-- Navigation links -->
    <div class="flex-grow-1 overflow-y-auto px-3 py-4">
        <ul class="nav nav-pills flex-column gap-2">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-white d-flex align-items-center gap-3 py-3 px-3 {{ Route::is('dashboard') ? 'active bg-primary' : 'hover-bg' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- ============================
                 TICKET CENTER SUBMENU
            ============================= --}}
            @php
                $ticketActive = Route::is('tickets.index') || Route::is('tickets.create');
            @endphp

            <li class="nav-item">
                <a href="#"
                   class="nav-link text-white menu-toggle d-flex justify-content-between align-items-center {{ $ticketActive ? 'parent-active' : '' }}"
                   data-submenu="submenu-tickets">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-ticket-perforated"></i>
                        <span>Ticket Center</span>
                    </div>
                    <i class="bi bi-chevron-down submenu-icon"></i>
                </a>
                <ul class="submenu {{ $ticketActive ? 'show' : '' }}" id="submenu-tickets">
                    <li>
                        <a href="{{ route('tickets.index') }}" class="nav-link text-white {{ Route::is('tickets.index') ? 'active bg-primary' : 'hover-bg' }}">
                            <i class="bi bi-list"></i>
                            <span>
                                @if(auth()->user()->isAdmin())
                                    All Tickets
                                @elseif(auth()->user()->isTeamLead())
                                    Team Tickets
                                @else
                                    My Tickets
                                @endif
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tickets.create') }}" class="nav-link text-white {{ Route::is('tickets.create') ? 'active bg-primary' : 'hover-bg' }}">
                            <i class="bi bi-plus-circle"></i>
                            <span>Create Ticket</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- ============================
                 ESCALATIONS (commented out)
            ============================= --}}
            {{--
            @if(auth()->user()->isAdmin() || auth()->user()->isTeamLead() || auth()->user()->isProjectManager())
                <li class="nav-item">
                    <a href="{{ route('escalations.index') }}" class="nav-link text-white d-flex align-items-center gap-3 py-3 px-3 {{ Route::is('escalations.index') ? 'active bg-primary' : 'hover-bg' }}">
                        <i class="bi bi-exclamation-octagon"></i>
                        <span>Escalations</span>
                    </a>
                </li>
            @endif
            --}}

            {{-- ============================
                 MANAGEMENT SUBMENU
            ============================= --}}
            @if(auth()->user()->isAdmin() || auth()->user()->isTeamLead() || auth()->user()->isProjectManager())
            @php
                $managementActive = Route::is('hierarchy.index')
                    || Route::is('users.index')
                    || Route::is('departments.index')
                    || Route::is('roles.index')
                    || Route::is('ticket-categories.index');
            @endphp

            <li class="nav-item">
                <a href="#"
                   class="nav-link text-white menu-toggle d-flex justify-content-between align-items-center {{ $managementActive ? 'parent-active' : '' }}"
                   data-submenu="submenu-management">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-diagram-3"></i>
                        <span>Management</span>
                    </div>
                    <i class="bi bi-chevron-down submenu-icon"></i>
                </a>
                <ul class="submenu {{ $managementActive ? 'show' : '' }}" id="submenu-management">
                    <li>
                        <a href="{{ route('hierarchy.index') }}" class="nav-link text-white {{ Route::is('hierarchy.index') ? 'active bg-primary' : 'hover-bg' }}">
                            <i class="bi bi-diagram-3"></i>
                            <span>Hierarchy Tree</span>
                        </a>
                    </li>
                    @if(auth()->user()->isAdmin())
                    <li>
                        <a href="{{ route('users.index') }}" class="nav-link text-white {{ Route::is('users.index') ? 'active bg-primary' : 'hover-bg' }}">
                            <i class="bi bi-people"></i>
                            <span>User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('departments.index') }}" class="nav-link text-white {{ Route::is('departments.index') ? 'active bg-primary' : 'hover-bg' }}">
                            <i class="bi bi-building"></i>
                            <span>Departments</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}" class="nav-link text-white {{ Route::is('roles.index') ? 'active bg-primary' : 'hover-bg' }}">
                            <i class="bi bi-shield-lock"></i>
                            <span>Roles & Permissions</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ticket-categories.index') }}" class="nav-link text-white {{ Route::is('ticket-categories.index') ? 'active bg-primary' : 'hover-bg' }}">
                            <i class="bi bi-tags"></i>
                            <span>Ticket Categories</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- ============================
                 ANALYTICS SUBMENU
            ============================= --}}
            @if(auth()->user()->isAdmin() || auth()->user()->isProjectManager() || auth()->user()->isHR())
            @php
                $analyticsActive = Route::is('reports.index');
            @endphp

            <li class="nav-item">
                <a href="#"
                   class="nav-link text-white menu-toggle d-flex justify-content-between align-items-center {{ $analyticsActive ? 'parent-active' : '' }}"
                   data-submenu="submenu-analytics">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-bar-chart"></i>
                        <span>Analytics</span>
                    </div>
                    <i class="bi bi-chevron-down submenu-icon"></i>
                </a>
                <ul class="submenu {{ $analyticsActive ? 'show' : '' }}" id="submenu-analytics">
                    <li>
                        <a href="{{ route('reports.index') }}" class="nav-link text-white {{ Route::is('reports.index') ? 'active bg-primary' : 'hover-bg' }}">
                            <i class="bi bi-bar-chart"></i>
                            <span>System Reports</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            {{--
            @if(auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('activity-logs.index') }}" class="nav-link text-white d-flex align-items-center gap-3 py-3 px-3 {{ Route::is('activity-logs.index') ? 'active bg-primary' : 'hover-bg' }}">
                        <i class="bi bi-journal-text"></i>
                        <span>Activity Logs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('settings.index') }}" class="nav-link text-white d-flex align-items-center gap-3 py-3 px-3 {{ Route::is('settings.index') ? 'active bg-primary' : 'hover-bg' }}">
                        <i class="bi bi-sliders"></i>
                        <span>System Settings</span>
                    </a>
                </li>
            @endif
            --}}

        </ul>
    </div>

    <!-- Sidebar footer -->
    <div class="p-3 border-top border-secondary text-center text-secondary fs-8">
        SupportChain System v2.4.0
    </div>
</aside>

<style>
/* =========================
   SIDEBAR DESIGN
========================= */

#sidebar {
    width: 260px;
    min-height: 100vh;
    background: #111827;
    border-right: 1px solid rgba(255,255,255,0.08);
    transition: all .3s ease;
}

/* =========================
   LOGO
========================= */

.sidebar-header {
    padding: 22px 20px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}

.sidebar-logo {
    font-size: 1.6rem;
    font-weight: 800;
    letter-spacing: -.5px;
    text-decoration: none;
}

.sidebar-logo .support {
    color: #ffffff;
}

.sidebar-logo .chain {
    color: #bc342c;
}

/* =========================
   NAVIGATION
========================= */

.nav {
    gap: 6px !important;
}

.nav-link {
    color: #cbd5e1 !important;
    border-radius: 12px;
    font-size: .95rem;
    font-weight: 500;
    padding: 12px 14px !important;
    display: flex;
    align-items: center;
    gap: 10px !important;
    transition: all .25s ease;
}

/* Icons */
.nav-link i {
    width: 18px;
    font-size: 1rem;
    text-align: center;
}

/* Hover */
.nav-link:hover,
.hover-bg:hover {
    background: rgba(188, 52, 44, 0.12);
    color: #ffffff !important;
    transform: translateX(4px);
}

/* Active child link */
.nav-link.active {
    background: #bc342c !important;
    color: #ffffff !important;
    box-shadow: 0 6px 18px rgba(188,52,44,.35);
}

.nav-link.active i {
    color: #ffffff;
}

/* =========================
   PARENT ACTIVE STATE
   (when a child route is active)
========================= */

.nav-link.parent-active {
    background: rgba(188, 52, 44, 0.18) !important;
    color: #ffffff !important;
    border-left: 3px solid #bc342c;
}

.nav-link.parent-active .submenu-icon {
    transform: rotate(180deg);
}

/* =========================
   SECTION TITLE
========================= */

.nav-header {
    color: #94a3b8 !important;
    font-size: .70rem;
    font-weight: 700;
    letter-spacing: 1.4px;
    text-transform: uppercase;
    margin-top: 18px !important;
    margin-bottom: 8px !important;
    padding-left: 14px !important;
}

/* =========================
   SCROLLBAR
========================= */

#sidebar ::-webkit-scrollbar {
    width: 5px;
}

#sidebar ::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,.15);
    border-radius: 20px;
}

/* =========================
   FOOTER
========================= */

#sidebar .border-top {
    border-color: rgba(255,255,255,.08) !important;
}

#sidebar .text-secondary {
    color: #94a3b8 !important;
    font-size: .75rem;
}

/* =========================
   MOBILE
========================= */

@media (max-width: 991.98px) {
    #sidebar {
        left: -260px !important;
    }
    #sidebar.show {
        left: 0 !important;
    }
}

/* =========================
   SUB MENU
========================= */

.submenu {
    display: none;
    list-style: none;
    padding-left: 18px;
    margin: 6px 0 0;
    padding-bottom: 4px;
}

.submenu.show {
    display: block;
}

.submenu .nav-link {
    padding: 10px 14px !important;
    font-size: 0.9rem;
}

.submenu .nav-link:hover {
    background: rgba(188, 52, 44, 0.12);
}

.submenu {
    border-left: 2px solid rgba(188, 52, 44, 0.35);
    margin-left: 20px;
}

.menu-toggle {
    cursor: pointer;
}

.submenu-icon {
    transition: transform .3s ease;
    font-size: .85rem;
    flex-shrink: 0;
}


.menu-toggle.active .submenu-icon {
    transform: rotate(180deg);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.menu-toggle').forEach(function (toggle) {
        var submenuId = toggle.getAttribute('data-submenu');
        var submenu   = submenuId ? document.getElementById(submenuId) : toggle.nextElementSibling;
        if (submenu && submenu.classList.contains('show')) {
            toggle.classList.add('active');
        }
        toggle.addEventListener('click', function (e) {
            e.preventDefault();

            this.classList.toggle('active');

            var target = this.getAttribute('data-submenu')
                ? document.getElementById(this.getAttribute('data-submenu'))
                : this.nextElementSibling;

            if (target) {
                target.classList.toggle('show');
            }
        });
    });

});
</script>