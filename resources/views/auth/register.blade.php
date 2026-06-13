@extends('layouts.auth')
@section('title')
    {{ __('messages.common.register') }}
@endsection
@section('content')
<div class="q-login-card q-register-card">
    <div class="q-login-logo">
        <a href="{{ route('home') }}">
            <img src="{{ getLogoUrl() }}" alt="{{ getAppName() }}">
        </a>
    </div>

    <h1 class="q-login-title">{{ __('messages.common.create_an_account') }}</h1>

    <div class="q-flash-wrap">
        @include('flash::message')
        @include('layouts.errors')
    </div>

    <form method="POST"
        action="{{ request()->input('referral-code') ? route('register') . '?referral-code=' . request()->input('referral-code') : route('register') }}"
        id="UserRegisterForm">
        @csrf

        <div class="q-form-row">
            <div class="q-input-group q-form-col">
                <label for="first_name">{{ __('messages.user.first_name') }}:</label>
                <input name="first_name" type="text" id="first_name" required
                       placeholder="{{ __('messages.user.first_name') }}"
                       value="{{ old('first_name') }}">
            </div>
            <div class="q-input-group q-form-col">
                <label for="last_name">{{ __('messages.user.last_name') }}:</label>
                <input name="last_name" type="text" id="last_name" required
                       placeholder="{{ __('messages.user.last_name') }}"
                       value="{{ old('last_name') }}">
            </div>
        </div>

        <div class="q-input-group">
            <label for="email">{{ __('messages.user.email') }}:</label>
            <input name="email" type="email" id="email" required
                   placeholder="{{ __('messages.user.email') }}"
                   value="{{ old('email') }}">
            <span id="email-error-msg" class="q-msg-error"></span>
        </div>

        @if (getSuperAdminSettingValue('phone_number_required'))
            <div class="q-input-group">
                <label for="phoneNumber">{{ __('messages.common.phone') }}:</label>
                {{ Form::tel('contact', getDefaultPhoneCode(), ['class' => 'form-control text-start', 'placeholder' => __('messages.form.contact'), 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'id' => 'phoneNumber']) }}
                {{ Form::hidden('region_code', getDefaultPhoneCode(), ['id' => 'prefix_code']) }}
                <span id="valid-msg" class="q-msg-success d-none">{{ __('messages.placeholder.valid_number') }}</span>
                <span id="error-msg" class="q-msg-error d-none">Invalid Number</span>
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        @endif

        <div class="q-form-row">
            <div class="q-input-group q-form-col">
                <label for="password">{{ __('messages.user.password') }}:</label>
                <div class="q-password-wrap">
                    <input name="password" type="password" id="password" required
                           placeholder="{{ __('messages.user.password') }}"
                           aria-label="Password" data-toggle="password">
                    <span class="q-password-toggle" onclick="togglePassword('password', 'passwordIcon')">
                        <i class="bi bi-eye-slash-fill" id="passwordIcon"></i>
                    </span>
                </div>
            </div>
            <div class="q-input-group q-form-col">
                <label for="password_confirmation">{{ __('messages.user.confirm_password') }}:</label>
                <div class="q-password-wrap">
                    <input name="password_confirmation" type="password" id="password_confirmation" required
                           placeholder="{{ __('messages.user.confirm_password') }}"
                           aria-label="Confirm Password" data-toggle="password">
                    <span class="q-password-toggle" onclick="togglePassword('password_confirmation', 'confirmIcon')">
                        <i class="bi bi-eye-slash-fill" id="confirmIcon"></i>
                    </span>
                </div>
            </div>
        </div>

        @if(!request()->has('referral-code'))
            @if (getSuperAdminSettingValue('show_referral_code'))
                <div class="q-input-group">
                    <label for="referral_code">{{ __('messages.user.referral_code') }}:</label>
                    <input name="referral_code" type="text" id="referral_code"
                           placeholder="{{ __('messages.user.referral_code') }}"
                           value="{{ old('referral_code') }}">
                </div>
            @endif
        @endif

        <div class="q-input-group">
            <label class="q-checkbox">
                <input type="checkbox" name="term_policy_check" id="privacyPolicyCheckbox">
                <span class="q-checkbox-box"></span>
                @lang('messages.by_signing_up_you_agree_to_our')
                <a href="{{ route('terms.conditions') }}" target="_blank" class="q-link">{!! __('messages.vcard.term_condition') !!}</a>
                &
                <a href="{{ route('privacy.policy') }}" target="_blank" class="q-link">{{ __('messages.vcard.privacy_policy') }}</a>
            </label>
        </div>

        @if (getSuperAdminSettingValue('captcha_enable'))
            <div class="q-input-group">
                @if (getRecaptchaVersion() == 1)
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                @else
                    <input type="hidden" name="g-recaptcha-response" id="recaptcha-token">
                    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer></script>
                    <script>
                        document.getElementById('UserRegisterForm').addEventListener('submit', function(e) {
                            e.preventDefault();
                            grecaptcha.ready(function() {
                                grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'register' })
                                    .then(function(token) {
                                        document.getElementById('recaptcha-token').value = token;
                                        e.target.submit();
                                    });
                            });
                        });
                    </script>
                @endif
            </div>
        @endif

        <button type="submit" class="q-btn-login">
            {{ __('messages.common.create_an_account') }}
        </button>

        <div class="q-register-section">
            <span>{{ __('messages.common.already_have_an_account') . '?' }}</span>
            <a href="{{ route('login') }}" class="q-register-link">
                {{ __('messages.common.sign_in_here') }}
            </a>
        </div>
    </form>

    <div class="q-copyright">
        {{ __('messages.placeholder.all_rights_reserve') }} &copy; {{ date('Y') }}
        <a href="{{ route('home') }}" target="_blank">{{ getAppName() }}</a>
    </div>
</div>

@push('scripts')
<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
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
