<!-- ═══ Salo.uk-Inspired Header ═══ -->
<header id="q-header" class="q-header" role="banner">
    <div class="q-header-inner">

        {{-- Logo --}}
        <div class="q-header-brand">
            <a href="{{ asset('') }}" class="q-logo-link" aria-label="{{ getAppName() }} — Go to homepage">
                <img src="{{ getLogoUrl() }}" alt="{{ getAppName() }}" class="q-logo-img">
            </a>
            <span class="q-header-tagline">{{ $setting['sub_text'] ?? 'One tap. Your business' }}</span>
        </div>

        {{-- Desktop Nav --}}
        <nav class="q-nav" aria-label="Main navigation">
            <ul class="q-nav-list" role="list">
                <li><a class="q-nav-link" href="{{ asset('') }}#frontAboutTabUsTab">{{ __('auth.about') }}</a></li>
                @if ($faqs !== null)
                <li><a class="q-nav-link" href="{{ route('fornt-faq') }}">{{ __('messages.faqs.faqs') }}</a></li>
                @endif
                <li><a class="q-nav-link" href="{{ asset('') }}#frontPricingTab">{{ __('auth.pricing') }}</a></li>
                <li><a class="q-nav-link" href="{{ route('fornt-blog') }}">{{ __('messages.blog.blogs') }}</a></li>
                <li><a class="q-nav-link" href="{{ asset('') }}#frontContactUsTab">{{ __('auth.contact') }}</a></li>
            </ul>
        </nav>

        {{-- Actions --}}
        <div class="q-header-actions">

            {{-- Language Switcher --}}
            <div class="q-lang-dropdown">
                <button class="q-lang-btn" id="q-lang-toggle" aria-haspopup="listbox" aria-expanded="false">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    <span>{{ getLanguageByKey(checkFrontLanguageSession()) }}</span>
                    <svg class="q-lang-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </button>
                <ul class="q-lang-menu" role="listbox" aria-labelledby="q-lang-toggle">
                    @foreach (getAllLanguageWithFullData() as $key => $language)
                        <li class="languageSelection {{ checkFrontLanguageSession() == $key ? 'active' : '' }}"
                            data-prefix-value="{{ $language->iso_code }}" role="option">
                            <a href="javascript:void(0)" class="q-lang-item {{ checkFrontLanguageSession() == $key ? 'active' : '' }}">
                                @if (array_key_exists($language->iso_code, \App\Models\User::FLAG))
                                    @foreach (\App\Models\User::FLAG as $imageKey => $imageValue)
                                        @if ($imageKey == $language->iso_code)
                                            <img src="{{ asset($imageValue) }}" class="q-lang-flag" alt="{{ $language->name }}">
                                        @endif
                                    @endforeach
                                @else
                                    @if (count($language->media) != 0)
                                        <img src="{{ $language->image_url }}" class="q-lang-flag" alt="{{ $language->name }}">
                                    @else
                                        <i class="fa fa-flag" aria-hidden="true"></i>
                                    @endif
                                @endif
                                {{ $language->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Auth CTA — Salo.uk style --}}
            @if (empty(getLogInUser()))
                <a class="q-btn-nav-secondary" href="{{ route('login') }}" data-turbo="false">
                    {{ __('auth.sign_in') }}
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
                <a class="q-btn-nav-primary" href="{{ route('register') }}" data-turbo="false" id="header-cta-btn">
                    <span>{{ __('auth.get_started') }}</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            @else
                @if (getLogInUser()->hasrole('admin') || getLogInUser()->hasrole('user'))
                    <a class="q-btn-nav-primary" href="{{ route('admin.dashboard') }}" data-turbo="false" id="header-cta-btn">
                        <span>{{ __('messages.dashboard') }}</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                @endif
                @if (getLogInUser()->hasrole('super_admin'))
                    <a class="q-btn-nav-primary" href="{{ route('sadmin.dashboard') }}" data-turbo="false" id="header-cta-btn">
                        <span>{{ __('messages.dashboard') }}</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                @endif
            @endif

            {{-- Mobile hamburger --}}
            <button class="q-hamburger" id="q-hamburger" aria-label="Open menu" aria-expanded="false" aria-controls="q-mobile-menu">
                <span class="q-hamburger-bar"></span>
                <span class="q-hamburger-bar"></span>
                <span class="q-hamburger-bar"></span>
            </button>
        </div>
    </div>
</header>

{{-- ═══ Mobile Menu Overlay ═══ --}}
<div class="q-mobile-overlay" id="q-mobile-menu" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Mobile navigation">
    <div class="q-mobile-panel">
        <div class="q-mobile-header">
            <img src="{{ getLogoUrl() }}" alt="{{ getAppName() }}" class="q-logo-img">
            <button class="q-mobile-close" id="q-mobile-close" aria-label="Close menu">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>

        <nav class="q-mobile-nav" aria-label="Mobile navigation">
            <p class="q-mobile-nav-label">Navigation</p>
            <ul class="q-mobile-nav-list" role="list">
                <li><a class="q-mobile-nav-link" href="{{ asset('') }}#frontAboutTabUsTab">{{ __('auth.about') }}</a></li>
                @if ($faqs !== null)
                <li><a class="q-mobile-nav-link" href="{{ route('fornt-faq') }}">{{ __('messages.faqs.faqs') }}</a></li>
                @endif
                <li><a class="q-mobile-nav-link" href="{{ asset('') }}#frontPricingTab">{{ __('auth.pricing') }}</a></li>
                <li><a class="q-mobile-nav-link" href="{{ route('fornt-blog') }}">{{ __('messages.blog.blogs') }}</a></li>
                <li><a class="q-mobile-nav-link" href="{{ asset('') }}#frontContactUsTab">{{ __('auth.contact') }}</a></li>
            </ul>
        </nav>

        <div class="q-mobile-actions">
            @if (empty(getLogInUser()))
                <a class="q-mobile-btn-secondary" href="{{ route('login') }}" data-turbo="false">{{ __('auth.sign_in') }}</a>
                <a class="q-mobile-btn-primary" href="{{ route('register') }}" data-turbo="false">
                    {{ __('auth.get_started') }}
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            @else
                @if (getLogInUser()->hasrole('admin') || getLogInUser()->hasrole('user'))
                    <a class="q-mobile-btn-primary" href="{{ route('admin.dashboard') }}" data-turbo="false">{{ __('messages.dashboard') }}</a>
                @endif
                @if (getLogInUser()->hasrole('super_admin'))
                    <a class="q-mobile-btn-primary" href="{{ route('sadmin.dashboard') }}" data-turbo="false">{{ __('messages.dashboard') }}</a>
                @endif
            @endif
        </div>
    </div>
</div>
<!-- end header section -->
