<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ getAppName() }}</title>
    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('assets/css/page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    {{-- Login redesign CSS --}}
    <link href="{{ asset('assets/css/auth/login.css') }}" rel="stylesheet" type="text/css">
    @stack('css')
    @yield('css')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>

<body>
    @yield('content')

    @routes
    <script src="{{ mix('assets/js/front-third-party.js') }}"></script>
    <script src="{{ asset('messages.js?$mixID') }}"></script>
    <script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
    <script src="{{ mix('assets/js/auth/auth.js') }}"></script>
    @stack('scripts')

    <script>
        let defaultCountryCodeValue = 'in';
        let mobileValidation = "{{ getSuperAdminSettingValue('mobile_validation') }}";
        let utilsScript = "{{ asset('assets/js/inttel/js/utils.min.js') }}"
        $(document).ready(function() {
            $('.alert').delay(5000).slideUp(300)
        })
    </script>
    <script src="{{ mix('assets/js/intl-tel-input/build/intlTelInput.js') }}"></script>
</body>

</html>
