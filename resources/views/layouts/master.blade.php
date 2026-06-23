<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SupportChain System') | Helpdesk Portal</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Custom Premium Styles -->
    <style>
        :root {
            --primary-bg: #0f172a;
            --sidebar-bg: #1e293b;
            --sidebar-active: #3b82f6;
            --body-bg: #f8fafc;
            --card-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05), 0 2px 5px -1px rgba(0, 0, 0, 0.02);
            --font-family-sans-serif: 'Plus Jakarta Sans', sans-serif;
            --font-family-display: 'Outfit', sans-serif;
        }

        body {
            font-family: var(--font-family-sans-serif);
            background-color: var(--body-bg);
            color: #334155;
            min-height: 100vh;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-family-display);
            font-weight: 600;
        }

        /* Layout Structure */
        #wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #content-wrapper {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s;
            margin-left: 260px; /* Default sidebar width */
        }

        @media (max-width: 991.98px) {
            #content-wrapper {
                margin-left: 0;
            }
        }

        .main-content {
            padding: 30px;
            flex: 1;
        }

        /* Card and Elements */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            background: #ffffff;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn {
            border-radius: 10px;
            font-weight: 500;
            padding: 8px 16px;
        }

        .table-responsive {
            border-radius: 12px;
        }

        /* Toast / Alert styling overrides */
        .swal2-popup {
            border-radius: 16px !important;
            font-family: var(--font-family-sans-serif) !important;
        }
    </style>
    @stack('styles')
</head>
<body>

    <div id="wrapper">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Content Area -->
        <div id="content-wrapper">
            <!-- Header Navbar -->
            @include('partials.header')

            <!-- Main Page Content -->
            <main class="main-content">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </main>

            <!-- Footer -->
            @include('partials.footer')
        </div>
    </div>

    <!-- JS CDNs -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Global Helpers and AJAX setup -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Dynamic Notification Count Update
        function updateNotificationCount() {
            $.get("{{ route('notifications.unread-count') }}", function(data) {
                if (data.count > 0) {
                    $('.notification-badge').text(data.count).show();
                } else {
                    $('.notification-badge').hide();
                }
            });
        }
        $(document).ready(function() {
            updateNotificationCount();
            setInterval(updateNotificationCount, 30000); // refresh every 30 seconds
        });
    </script>
    @stack('scripts')
</body>
</html>
