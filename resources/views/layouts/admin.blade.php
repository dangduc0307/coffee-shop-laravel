<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Quản trị hệ thống')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    {{-- CSS riêng --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <div class="admin-wrapper">

        {{-- Sidebar --}}
        @include('admin.partials.sidebar')

        {{-- Nội dung --}}
        <div class="admin-main">

            {{-- Header --}}
            @include('admin.partials.header')

            {{-- Nội dung trang --}}
            <main class="admin-content">

                @yield('content')

            </main>

            {{-- Footer --}}
            @include('admin.partials.footer')

        </div>

    </div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    {{-- JS riêng --}}
    <script src="{{ asset('js/admin/admin.js') }}"></script>

    <!-- CDN Pusher JS -->
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>

    <!-- CDN Laravel Echo -->
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.16.1/dist/echo.iife.js"></script>

    <script>
        // Khởi tạo Laravel Echo kết nối tới Laravel Reverb
        window.Echo = new Echo({
            broadcaster: 'reverb',
            key: '{{ env("REVERB_APP_KEY") }}',
            wsHost: '{{ env("REVERB_HOST", "127.0.0.1") }}',
            wsPort: {{ env("REVERB_PORT", 8080) }},
            wssPort: {{ env("REVERB_PORT", 8080) }},
            forceTLS: false,
            enabledTransports: ['ws', 'wss'],
        });
    </script>

    @stack('scripts')

</body>

</html>