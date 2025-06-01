<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Health & Workout App')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Base Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            line-height: 1.6;
            color: #333;
        }

        .app-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: #70A604;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #64748b;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #70A604;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem 0;
        }

        /* Footer */
        .footer {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            color: #64748b;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .nav-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .main-content {
                padding: 1rem 0;
            }
        }
    </style>

    <!-- Page specific styles -->
    @stack('styles')
</head>
<body>
    <div class="app-container">
        <!-- Navigation -->
        <nav class="navbar">
            <div class="nav-content">
                <a href="{{ route('todolist.index') }}" class="nav-brand">
                    🏃‍♂️ HealthFit
                </a>

                <ul class="nav-links">
                    <li><a href="{{ route('todolist.index') }}" class="{{ request()->routeIs('todolist.*') ? 'active' : '' }}">Todo List</a></li>
                    <li><a href="#" onclick="alert('Coming Soon!')">Progress</a></li>
                    <li><a href="#" onclick="alert('Coming Soon!')">Settings</a></li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; {{ date('Y') }} HealthFit App. Made with ❤️ for your wellness journey.</p>
        </footer>
    </div>

    <!-- Scripts -->
    @stack('scripts')

    <!-- Base JavaScript -->
    <script>
        // Setup CSRF token for AJAX requests
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };

        // Setup AJAX headers
        if (typeof fetch !== 'undefined') {
            const originalFetch = fetch;
            window.fetch = function(url, options = {}) {
                if (!options.headers) {
                    options.headers = {};
                }
                options.headers['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                return originalFetch(url, options);
            };
        }

        // jQuery CSRF setup (if using jQuery)
        if (typeof $ !== 'undefined') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    </script>
</body>
</html>
