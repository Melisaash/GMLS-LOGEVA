<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <!-- Custom Tailwind configuration (optional) -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6', // blue-500
                        secondary: '#6B7280', // gray-500
                    },
                    height: {
                        'screen-mobile': 'calc(100vh - 4rem)', // adjust for mobile nav
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 antialiased flex flex-col min-h-screen">
    <!-- Main content container with bottom padding -->
    <div class="container mx-auto px-4 pt-8 pb-24 flex-1"> <!-- pb-24 untuk bottom nav -->
        @yield('content')
    </div>

    <!-- Bottom navigation -->
    @include('includes.nav')

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    @yield('scripts')
    @stack('scripts')
</body>

</html>

