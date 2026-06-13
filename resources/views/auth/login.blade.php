@extends('layouts.auth')
@section('title')
    {{ __('messages.common.login') }}
@endsection
@section('content')
<div class="login-page">
    <div class="login-card">
        <div class="login-header">
            <a href="{{ route('home') }}" class="login-logo">
                <img src="{{ getLogoUrl() }}" alt="{{ getAppName() }}">
            </a>
            <h1>{{ __('auth.sign_in') }}</h1>
            <p>{{ __('messages.welcome_back') ?? 'Welcome back to ' . getAppName() }}</p>
        </div>

        @include('flash::message')
        @include('layouts.errors')

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">

            <div class="form-group">
                <label for="email">{{ __('messages.user.email') }} <span class="required">*</span></label>
                <input name="email" type="email" class="form-input" id="email"
                    placeholder="{{ __('messages.user.email') }}"
                    value="{{ old('email', \Cookie::get('email', '')) }}" required autofocus>
            </div>

            <div class="form-group">
                <div class="form-label-row">
                    <label for="password">{{ __('messages.user.password') }} <span class="required">*</span></label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ __('messages.common.forgot_your_password') . '?' }}</a>
                    @endif
                </div>
                <div class="password-wrapper">
                    <input name="password" type="password" class="form-input" id="password"
                        placeholder="{{ __('messages.user.password') }}"
                        @if (\Cookie::has('password')) value="{{ \Cookie::get('password') }}" @endif required>
                    <button type="button" class="password-toggle" aria-label="Toggle password visibility" onclick="togglePassword()">
                        <i class="bi bi-eye-slash-fill" id="passwordIcon"></i>
                    </button>
                </div>
            </div>

            <div class="form-group form-check-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="remember" @if (\Cookie::has('remember')) checked @endif>
                    <span class="checkmark"></span>
                    {{ __('messages.common.remember_me') }}
                </label>
            </div>

            <button type="submit" class="btn btn-primary btn-block">{{ __('messages.common.login') }}</button>
        </form>

        @if (config('app.google_client_id') && config('app.google_client_secret') && config('app.google_redirect'))
            <div class="social-divider">
                <span>{{ __('messages.or') ?? 'or' }}</span>
            </div>
            <a href="{{ route('social.login', 'google') }}" class="btn btn-social btn-google">
                <svg width="20" height="20" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/>
                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/>
                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/>
                </svg>
                {{ __('messages.placeholder.login_via_google') }}
            </a>
        @endif

        @if (config('app.facebook_app_id') && config('app.facebook_app_secret') && config('app.facebook_redirect'))
            <a href="{{ route('social.login', 'facebook') }}" class="btn btn-social btn-facebook">
                <i class="fab fa-facebook-f"></i>
                {{ __('messages.placeholder.login_via_facebook') }}
            </a>
        @endif

        @if (getSuperAdminSettingValue('register_enable'))
            <div class="login-footer-text">
                {{ __('messages.common.new_here') . '?' }}
                <a href="{{ route('register') }}">{{ __('messages.common.create_an_account') }}</a>
            </div>
        @endif
    </div>
</div>

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
@endsection
