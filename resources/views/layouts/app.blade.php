<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ getAppName() }}</title>
    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Qrenda Admin Dashboard">
    <meta name="author" content="Qrenda">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:300,400,500,600,700" rel="stylesheet" />

    <!-- App CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css">
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/rappasoft/livewire-tables/css/laravel-livewire-tables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/rappasoft/livewire-tables/css/laravel-livewire-tables-thirdparty.min.css') }}">
    @if (!getLogInUser()->theme_mode)
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css?id=$mixID') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.dark.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.dark.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('assets/css/custom-pages-dark.css') }}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{ mix('assets/css/page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('assets/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('assets/css/lazy-loading.css') }}">

    <!-- Qrenda CSS (loads last to override) -->
    <link rel="stylesheet" href="{{ asset('assets/qrenda/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/qrenda/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/qrenda/css/feather-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/qrenda/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/qrenda/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/qrenda/css/qrenda-content.css') }}">

    {{-- Theme tokens (--bs-primary, etc.) MUST stay Blade-compiled inline so
         the super-admin-configured primary color overrides Qrenda's hardcoded
         value at request time. Static component rules live in
         resources/assets/scss/qrenda-legacy.scss. --}}
    <style>
        :root {
            --bs-primary: {{ getSuperAdminSettingValue('primary_color') ?? '#1C274C' }};
            --bs-secondary: {{ getSuperAdminSettingValue('secondary_color') ?? '#ADB5BD' }};
            --bs-info: {{ getSuperAdminSettingValue('primary_color') ?? '#0099FB' }};
            --bs-primary-rgb: {{ hexToRgb(getSuperAdminSettingValue('primary_color') ?? '#1C274C') }};
            --bs-bg-blur: rgba(var(--bs-primary-rgb), 0.2);
        }
        .main-header-left .logo-wrapper img { max-height: 40px; width: auto; }
    </style>
    @stack('css')
</head>
<body>
    <div class="loader-wrapper">
        <div class="theme-loader"></div>
    </div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('layouts.admin-partials.header')
        <div class="page-body-wrapper sidebar-icon">
            @include('layouts.admin-partials.sidebar')
            <div class="page-body">
                @yield('content')
            </div>
            <footer>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright {{ date('Y') }} {{ getAppName() }}. All rights reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="pull-right mb-0">Powered by Qrenda</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @livewireScripts
    <script src="{{ asset('vendor/rappasoft/livewire-tables/js/laravel-livewire-tables.min.js') }}"></script>
    <script src="{{ asset('vendor/rappasoft/livewire-tables/js/laravel-livewire-tables-thirdparty.min.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    <script src="{{ asset('assets/js/third-party.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>

    <!-- Initialize sidebar localStorage defaults so sidebar-menu.js doesn't overwrite classes with null -->
    <script>
        if (!localStorage.getItem('page-wrapper')) { localStorage.setItem('page-wrapper', 'page-wrapper compact-wrapper'); }
        if (!localStorage.getItem('page-body-wrapper')) { localStorage.setItem('page-body-wrapper', 'sidebar-icon'); }
    </script>
    <!-- Qrenda JS (feather defines window.feather globally) -->
    <script src="{{ asset('assets/qrenda/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/qrenda/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/qrenda/js/config.js') }}"></script>
    <script src="{{ asset('assets/qrenda/js/script.js') }}"></script>

    <script data-turbo-eval="false">
        let mobileValidation = "{{ getSuperAdminSettingValue('mobile_validation') }}"
        let phoneNumberRequired = "{{ getSuperAdminSettingValue('phone_number_required') }}"
        let stripe = ''
        @if (getSelectedPaymentGateway('stripe_key'))
            stripe = Stripe('{{ getSelectedPaymentGateway('stripe_key') }}')
        @endif
        let appUrl = "{{ config('app.url') }}"
        let noData = "{{ __('messages.no_data') }}"
        let utilsScript = "{{ asset('assets/js/inttel/js/utils.min.js') }}"
        let defaultProfileUrl = "{{ asset('web/media/avatars/user.png') }}"
        let defaultTemplate = "{{ asset('assets/images/default_cover_image.jpg') }}"
        let defaultServiceIconUrl = "{{ asset('assets/images/default_service.png') }}"
        let defaultProductIconUrl = "{{ asset('images/wp-product.png') }}"
        let defaltNfcLogo = "{{ asset('assets/img/nfc/nfc_default_logo.png') }}"
        let defaultCoverUrl = "{{ asset('assets/images/default_cover_image.jpg') }}"
        let defaultGalleryUrl = "{{ asset('assets/images/default_service.png') }}"
        let defaultAppLogoUrl = "{{ asset(getAppLogo()) }}"
        let defaultFaviconUrl = "{{ getFaviconUrl() }}"
        let getLoggedInUserdata = "{{ getLogInUser() }}"
        window.getLoggedInUserLang = "{{ getCurrentLanguageName() }}"
        let lang = "{{ Illuminate\Support\Facades\Auth::user()->language ?? 'en' }}"
        let getCurrencyCode = "{{ getMaximumCurrencyCode($getIcon = true) }}"
        let sweetAlertIcon = "{{ asset('images/remove.png') }}"
        let sweetCompletedAlertIcon = "{{ asset('images/Alert.png') }}"
        let defaultCountryCodeValue = "{{ getSuperAdminSettingValue('default_country_code') }}"
        let getUniqueVcardUrlAlias = "{{ getUniqueVcardUrlAlias() }}"
        let currencyAfterAmount = "{{ getSuperAdminSettingValue('currency_after_amount') }}"
        let userDateFormate = "{{ getSuperAdminSettingValue('datetime_method') ?? 1 }}";
        let defaultVideoCoverImg = "{{ asset('assets/images/video-icon.png') }}";
        let getLoggedInUsersteps = "{{ getLogInUser()->steps }}"
        let hasActiveSubscription = "{{ hasActiveSubscription() }}"
        let defaultPlaceholderImgUrl = "{{ asset('web/media/logos/placeholder.png') }}"
        let defaultNfcCard = "{{ asset('assets/img/nfc/card_default.png') }}"
        feather.replace();
        // Re-bind sidebar toggle after feather replaces <i> with <svg> (destroying original handler)
        $(document).on('click', '#sidebar-toggle', function() {
            $('.main-nav').toggleClass('close_icon');
            $('.page-main-header').toggleClass('close_icon');
        });
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
            $(document).on('show.bs.tooltip', '#sidebar [data-bs-toggle="tooltip"]', function (e) {
                if (window.innerWidth <= 1199 || !$('#sidebar').hasClass('collapsed-menu')) {
                    e.preventDefault();
                }
            });
        })
    </script>
    @php
        $toBytes = function ($value) {
            $value = trim($value);
            $unit  = strtolower(substr($value, -1));
            $bytes = (int) $value;
            switch ($unit) {
                case 'g': $bytes *= 1024;
                case 'm': $bytes *= 1024;
                case 'k': $bytes *= 1024;
            }
            return $bytes;
        };
        $maxUploadBytes = min($toBytes(ini_get('upload_max_filesize')), $toBytes(ini_get('post_max_size')));
    @endphp
    <script>window.APP_UPLOAD_MAX_BYTES = {{ $maxUploadBytes }};</script>
    @stack('scripts')
    @routes
    <script src="{{ asset('messages.js?$mixID') }}"></script>
    <script src="{{ mix('assets/js/pages.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/shepherd.js@10.0.1/dist/js/shepherd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shepherd.js@10.0.1/dist/css/shepherd.css" />
    @include('layouts.shepherd-js')
    @include('profile.changePassword')
    @include('profile.changelanguage')
    @include('twofactor_authentication.two_factor_authentication')
</body>
</html>