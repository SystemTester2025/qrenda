@extends('layouts.auth')
@section('title')
    {{ __('messages.common.login') }}
@endsection
@section('content')
<div class="q-login-card">
    <div class="q-login-logo">
        <a href="{{ route('home') }}">
            <img src="{{ getLogoUrl() }}" alt="{{ getAppName() }}">
        </a>
    </div>

    <h1 class="q-login-title">Welcome back</h1>
    <p class="q-login-sub">Sign in to your account</p>

    <div class="q-flash-wrap">
        @include('flash::message')
        @include('layouts.errors')
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">

        <div class="q-input-group">
            <label for="email">{{ __('messages.user.email') }}:</label>
            <input name="email" type="email" id="email" required
                   placeholder="{{ __('messages.user.email') }}"
                   value="{{ old('email', \Cookie::get('email', '')) }}" autofocus>
        </div>

        <div class="q-input-group">
            <label for="password">{{ __('messages.user.password') }}:</label>
            <div class="q-password-wrap">
                <input name="password" type="password" id="password" required
                       placeholder="{{ __('messages.user.password') }}"
                       @if (\Cookie::has('password')) value="{{ \Cookie::get('password') }}" @endif>
                <span class="q-password-toggle" onclick="togglePassword()">
                    <i class="bi bi-eye-slash-fill" id="passwordIcon"></i>
                </span>
            </div>
        </div>

        <div class="q-row-flex">
            <label class="q-checkbox">
                <input type="checkbox" name="remember" @if (\Cookie::has('remember')) checked @endif>
                <span class="q-checkbox-box"></span>
                {{ __('messages.common.remember_me') }}
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="q-forgot-link">
                    {{ __('messages.common.forgot_your_password') }}?
                </a>
            @endif
        </div>

        <button type="submit" class="q-btn-login">
            {{ __('messages.common.login') }}
        </button>

        @if (config('app.google_client_id') && config('app.google_client_secret') && config('app.google_redirect') || config('app.facebook_app_id') && config('app.facebook_app_secret') && config('app.facebook_redirect'))
            <div class="q-divider">
                <span>{{ __('messages.or') ?? 'or' }}</span>
            </div>
        @endif

        @if (config('app.google_client_id') && config('app.google_client_secret') && config('app.google_redirect'))
            <a href="{{ route('social.login', 'google') }}" class="q-social-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/>
                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/>
                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/>
                </svg>
                {{ __('messages.placeholder.login_via_google') }}
            </a>
        @endif

        @if (config('app.facebook_app_id') && config('app.facebook_app_secret') && config('app.facebook_redirect'))
            <a href="{{ route('social.login', 'facebook') }}" class="q-social-btn">
                <i class="bi bi-facebook"></i>
                {{ __('messages.placeholder.login_via_facebook') }}
            </a>
        @endif

        @if (getSuperAdminSettingValue('register_enable'))
            <div class="q-register-section">
                <span>{{ __('messages.common.new_here') }}? </span>
                <a href="{{ route('register') }}" class="q-register-link">
                    {{ __('messages.common.create_an_account') }}
                </a>
            </div>
        @endif
    </form>

    <div class="q-copyright">
        {{ __('messages.placeholder.all_rights_reserve') }} &copy; {{ date('Y') }}
        <a href="{{ route('home') }}" target="_blank">{{ getAppName() }}</a>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('passwordIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'bi bi-eye-fill';
    } else {
        input.type = 'password';
        icon.className = 'bi bi-eye-slash-fill';
    }
}
</script>
@endpush
