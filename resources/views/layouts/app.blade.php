<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Support Chain System - Corporate Employee Helpdesk & escalation ticket portal.">
    <title>Support Chain System | Internal Employee Support & Escalation</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CDNs: Bootstrap 5, Bootstrap Icons, Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">

    @yield('head')
</head>
<body>

    <!-- Navigation Header -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img 
                    src="{{ asset('images/Baseline-Logo-White-text-SVG.png') }}" 
                    alt="SupportChain Logo"
                    height="50">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#supportChainNavbar" aria-controls="supportChainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="supportChainNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#workflow">Workflow</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dashboard-preview">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tech-stack">Technology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-corporate btn-sm px-4">
                                Go to Portal <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="navbar-login-btn">
                                Log In
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn navbar-register-btn">
                                    Register Portal
                                </a>
                            @endif
                        @endauth
                    @else
                        <!-- Fallback buttons when Auth system is not yet fully configured -->
                        <a href="#contact" class="btn btn-outline-corporate btn-sm px-3 py-2">
                            Request Demo
                        </a>
                        <a href="#contact" class="btn btn-corporate btn-sm px-4 py-2">
                            Access System
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Yield -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-corporate">
        <div class="container">
            <div class="row g-5">
                <!-- Brand details -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-logo">
                        <span class="fs-3 fw-extrabold display-font text-white">
                         BASELINE SUPPORT<span class="text-info">CHAIN</span>
                        </span>
                    </div>
                    <p class="mt-3 mb-4 pe-lg-4" style="font-size: 0.95rem; line-height: 1.7; color: #94a3b8;">
                        Internal Ticket & Escalation Management System. Designed for organizations to streamline employee service desk requests, HR disputes, facilities reports, and role-based incident approvals.
                    </p>
                    <div class="d-flex gap-2">
                        <span class="badge bg-secondary-subtle text-dark border-0 rounded px-2 py-1 fs-8">Version 2.4.0</span>
                        <span class="badge bg-success-subtle text-success border-0 rounded px-2 py-1 fs-8">Secure Connection</span>
                    </div>
                </div>

                <!-- Fast Links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Categories</h5>
                    <ul class="footer-corporate-links">
                        <li><a href="#categories">IT Support</a></li>
                        <li><a href="#categories">Hardware Repair</a></li>
                        <li><a href="#categories">Software Requests</a></li>
                        <li><a href="#categories">HR & Payroll</a></li>
                        <li><a href="#categories">Facilities Complaints</a></li>
                    </ul>
                </div>

                <!-- Company Info -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>System Resources</h5>
                    <ul class="footer-corporate-links">
                        <li><a href="#">Knowledge Base</a></li>
                        <li><a href="#">IT Helpdesk SLA</a></li>
                        <li><a href="#">HR Guidelines</a></li>
                        <li><a href="#">System Status</a></li>
                        <li><a href="#">Admin Guidelines</a></li>
                    </ul>
                </div>

                <!-- Support line -->
                <div class="col-lg-4 col-md-6">
                    <h5>Internal Help Desk</h5>
                    <p class="mb-4" style="font-size: 0.95rem; color: #94a3b8;">
                        Need direct assistance? Get in touch with the admin support office.
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="fs-3 text-info"><i class="bi bi-headset"></i></div>
                        <div>
                            <span class="d-block small text-uppercase" style="color: #64748b; font-weight: 700; letter-spacing: 0.05em;">EXT Toll-Free</span>
                            <span class="fs-5 text-white fw-bold">096461 06743</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="row footer-bottom-corporate">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="m-0" style="color: #64748b;">&copy; {{ date('Y') }} Baseline Support Chain. Internal Organization Use Only.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="m-0" style="color: #64748b;">
                        <a href="#" class="text-decoration-none me-3" style="color: #64748b; transition: all 0.3s;">System Guidelines</a>
                        <a href="#" class="text-decoration-none" style="color: #64748b; transition: all 0.3s;">Security Policy</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/homepage.js') }}"></script>
</body>
</html>
