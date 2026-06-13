@extends('front.layouts.app')
@section('title'){{ getAppName() }}@endsection
@section('body-class')class="q-homepage"@endsection
@section('content')

{{-- ═══ Hero — Salo.uk Inspired ═══ --}}
<section class="q-hero" id="frontHomeTab" @if (checkFrontLanguageSession() == 'ar' || checkFrontLanguageSession() == 'fa') dir="rtl" @endif>
    {{-- Salo-inspired background canvas --}}
    <div class="q-hero-canvas-wrapper">
        <canvas id="hero-canvas"></canvas>
    </div>

    {{-- Floating Ambient Cursors --}}
    <div class="HomeHero__ambientCursor HomeHero__ambientCursor--topLeft" id="cursor-carl" aria-hidden="true">
        <div class="Cursor" style="--cursor-color: #3b82f6;">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.43938 2.43938C3.85531 2.02345 4.47597 1.88901 5.02673 2.09555L16.0267 6.22055C16.6416 6.45111 17.035 7.05477 16.9976 7.71034C16.9603 8.36592 16.5009 8.921 15.8638 9.08026L11.237 10.237L10.0803 14.8638C9.921 15.5009 9.36592 15.9603 8.71034 15.9976C8.05477 16.035 7.45111 15.6416 7.22055 15.0267L3.09555 4.02673C2.88901 3.47597 3.02345 2.85531 3.43938 2.43938Z" fill="white"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.67558 3.03185C4.49199 2.963 4.2851 3.00782 4.14646 3.14646C4.00782 3.2851 3.963 3.49199 4.03185 3.67558L8.15685 14.6756C8.2337 14.8805 8.43492 15.0117 8.65345 14.9992C8.87197 14.9868 9.057 14.8336 9.11009 14.6213L10.4123 9.41232L15.6213 8.11009C15.8336 8.057 15.9868 7.87197 15.9992 7.65345C16.0117 7.43492 15.8805 7.2337 15.6756 7.15685L4.67558 3.03185Z" fill="#3b82f6"></path>
            </svg>
            <span class="Cursor__name">Carl</span>
        </div>
    </div>
    <div class="HomeHero__ambientCursor HomeHero__ambientCursor--bottomRight" id="cursor-sophie" aria-hidden="true">
        <div class="Cursor" style="--cursor-color: #ec4899;">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.43938 2.43938C3.85531 2.02345 4.47597 1.88901 5.02673 2.09555L16.0267 6.22055C16.6416 6.45111 17.035 7.05477 16.9976 7.71034C16.9603 8.36592 16.5009 8.921 15.8638 9.08026L11.237 10.237L10.0803 14.8638C9.921 15.5009 9.36592 15.9603 8.71034 15.9976C8.05477 16.035 7.45111 15.6416 7.22055 15.0267L3.09555 4.02673C2.88901 3.47597 3.02345 2.85531 3.43938 2.43938Z" fill="white"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.67558 3.03185C4.49199 2.963 4.2851 3.00782 4.14646 3.14646C4.00782 3.2851 3.963 3.49199 4.03185 3.67558L8.15685 14.6756C8.2337 14.8805 8.43492 15.0117 8.65345 14.9992C8.87197 14.9868 9.057 14.8336 9.11009 14.6213L10.4123 9.41232L15.6213 8.11009C15.8336 8.057 15.9868 7.87197 15.9992 7.65345C16.0117 7.43492 15.8805 7.2337 15.6756 7.15685L4.67558 3.03185Z" fill="#ec4899"></path>
            </svg>
            <span class="Cursor__name">Sophie</span>
        </div>
    </div>

    {{-- Central Content --}}
    <div class="q-hero-content">
        <p class="q-hero-name q-hero-enter">{{ getAppName() }}</p>
        <h1 class="q-hero-enter">{{ $setting['home_page_title'] }}</h1>
        <p class="q-hero-sub q-hero-enter">{{ $setting['sub_text'] ?? 'Create your digital business card and share it with the world.' }}</p>
        <div class="q-hero-cta q-hero-enter">
            <a class="q-btn-primary" href="{{ route('register') }}" data-turbo="false">
                <span class="q-btn-primary-glow" aria-hidden="true"></span>
                <span>{{ __('auth.get_started') }}</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.3335 8H12.6668M12.6668 8L8.00016 3.33334M12.6668 8L8.00016 12.6667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <span class="q-hero-note">Replies in 24 hours. No obligation.</span>
        </div>
        <div class="q-alias q-hero-enter">
            <input id="search-alias-input" type="text" placeholder="{{ __('messages.vcard.search_vcard_alias') }}" required>
            <button id="search-alias-btn" type="submit" class="q-btn-primary" style="padding:12px 24px;flex-shrink:0;font-size:0.875rem">{{ __('messages.vcard.available') }}</button>
        </div>
        <div id="search-alias-error" class="d-none" style="color:#ef4444;font-size:0.875rem;margin-top:8px">{{ __('messages.vcard.already_alias_url') }}</div>
        <div id="search-alias-success" class="d-none" style="color:#22c55e;font-size:0.875rem;margin-top:8px">{{ __('messages.vcard.url_alias_available') }}</div>
    </div>

    {{-- Salo.uk-style marquee at bottom of hero --}}
    <div class="q-hero-bottom">
        <p class="q-hero-partners-label">Trusted by forward-thinking businesses</p>
        <div class="q-marquee" aria-hidden="true">
            <div class="q-marquee-track">
                {{-- First set --}}
                @for ($i = 1; $i <= 6; $i++)
                    <div class="q-marquee-item">
                        <img src="{{ asset('assets/img/new_front/logos/logo-' . $i . '.svg') }}" alt="Client logo" loading="lazy" onerror="this.parentElement.style.display='none'">
                    </div>
                @endfor
                {{-- Duplicate for seamless loop --}}
                @for ($i = 1; $i <= 6; $i++)
                    <div class="q-marquee-item">
                        <img src="{{ asset('assets/img/new_front/logos/logo-' . $i . '.svg') }}" alt="Client logo" loading="lazy" onerror="this.parentElement.style.display='none'">
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>

@include('flash::message')



{{-- ═══ Trust Bar ═══ --}}
<section class="q-trust">
    <p class="q-trust-title q-reveal">Trusted by professionals worldwide</p>        <div class="q-trust-stats">
        <div class="q-trust-stat-item q-reveal q-reveal-d1">
            <div class="q-stat-num">{{ number_format($totalUser) }}+</div>
            <div class="q-stat-label">{{ __('messages.users') ?? 'Users' }}</div>
        </div>
        <div class="q-trust-stat-item q-reveal q-reveal-d2">
            <div class="q-stat-num">{{ number_format($toalVcards) }}+</div>
            <div class="q-stat-label">{{ __('messages.vcards') ?? 'VCards' }}</div>
        </div>
        <div class="q-trust-stat-item q-reveal q-reveal-d3">
            <div class="q-stat-num">{{ number_format($totalCountries) }}+</div>
            <div class="q-stat-label">{{ __('messages.country.countries') }}</div>
        </div>
    </div>
</section>

{{-- ═══ Services / Features ═══ --}}
<section class="q-services" id="frontFeaturesTab" @if (checkFrontLanguageSession() == 'ar' || checkFrontLanguageSession() == 'fa') dir="rtl" @endif>
    <div class="container">
        <p class="q-section-label q-reveal">Our Services</p>
        <h2 class="q-section-title q-reveal">{{ __('messages.plan.features') }}</h2>
        <div class="q-services-grid">
            @foreach ($features as $feature)
                <div class="q-service-card">
                    <div class="q-service-icon">
                        @if ($feature->profile_image)
                            <img src="{{ $feature->profile_image }}" alt="" style="width:24px;height:24px;object-fit:cover;border-radius:4px">
                        @else
                            <i class="fas fa-bolt"></i>
                        @endif
                    </div>
                    <h3>{{ $feature->name }}</h3>
                    <p>{!! $feature->description !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ About / Interface — Bento Grid ═══ --}}
<section class="q-about" id="frontAboutTabUsTab" @if (checkFrontLanguageSession() == 'ar' || checkFrontLanguageSession() == 'fa') dir="rtl" @endif>
    <div class="container">
        <p class="q-section-label q-reveal" style="text-align:center">What we do</p>
        <h2 class="q-section-title center q-reveal">{{ __('auth.modern_&_powerful_interface') }}</h2>
        <div class="q-bento-grid">
            @foreach ($aboutUS as $i => $about)
                <div class="q-bento-card q-bento-{{ ($i % 4) + 1 }} q-reveal" style="background-image:url('{{ isset($about['about_url']) ? $about['about_url'] : asset('front/images/about-' . ($i + 1) . '.png') }}')">
                    <div class="q-bento-overlay"></div>
                    <div class="q-bento-content">
                        <span class="q-bento-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3>{{ $about['title'] }}</h3>
                        <p>{!! nl2br(e($about['description'])) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ Pricing ═══ --}}
<section class="q-pricing" id="frontPricingTab" @if (checkFrontLanguageSession() == 'ar' || checkFrontLanguageSession() == 'fa') dir="rtl" @endif>
    <div class="container">
        <p class="q-section-label q-reveal" style="text-align:center">Pricing</p>
        <h2 class="q-section-title center q-reveal">{{ __("auth.choose_a_plan_that's_right_for_you") }}</h2>
        <div class="q-pricing-grid">
            @foreach ($plans as $plan)
                @php $isFeatured = $loop->middle; @endphp
                <div class="q-price-card {{ $isFeatured ? 'featured' : '' }}">
                    @if ($isFeatured)
                        <div class="q-price-badge">{{ __('messages.plan.most_popular') }}</div>
                    @endif
                    <div class="q-price-name">{!! $plan->name !!}</div>

                    @if ($plan->trial_days > 0)
                        <div style="font-size:0.8125rem;color:var(--q-text-muted);margin-bottom:8px">
                            {{ __('messages.subscription.trial_plan') . ' (' . $plan->trial_days . ' ' . __('messages.plan.days') . ')' }}
                        </div>
                    @endif

                    @if ($plan->custom_select == 1 && $plan->planCustomFields->isNotEmpty())
                        @php $formattedPrice = str_replace('.00', '', currencyFormat($plan->planCustomFields[0]->custom_vcard_price, 2, $plan->currency->currency_code)); @endphp
                        <div class="q-price-amount">
                            @if(getSuperAdminSettingValue('currency_after_amount') == 0)
                                {{ $plan->currency->currency_icon }}<span class="custom-price-{{ $plan->id }}">{{ $formattedPrice }}</span>
                            @else
                                <span class="custom-price-{{ $plan->id }}">{{ $formattedPrice }}</span>{{ $plan->currency->currency_icon }}
                            @endif
                        </div>
                        <div class="q-price-period">
                            @if ($plan->frequency == 1)/ {{ __('messages.plan.monthly') }} @else/ {{ __('messages.plan.yearly') }} @endif
                        </div>
                        <select id="vcardNumber-{{ $plan->id }}" class="q-input customSelect" data-plan-id="{{ $plan->id }}" style="margin-bottom:16px;padding:10px 12px;font-size:0.875rem">
                            @foreach ($plan->planCustomFields as $customField)
                                <option value="{{ $customField->id }}" data-price="{{ $customField->custom_vcard_price }}" data-currency="{{ $plan->currency->currency_code }}">
                                    {{ $customField->custom_vcard_number }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <div class="q-price-amount">
                            @if ($plan->custom_select == 0)
                                {{ str_replace('.00', '', currencyFormat($plan->price, 2, $plan->currency->currency_code)) }}
                            @endif
                        </div>
                        <div class="q-price-period">
                            @if ($plan->frequency == 1)/ {{ __('messages.plan.monthly') }} @else/ {{ __('messages.plan.yearly') }} @endif
                        </div>
                        @if ($plan->custom_select == 0 && $plan->planCustomFields->isEmpty())
                            <div style="font-size:0.875rem;color:var(--q-text-muted);margin-bottom:16px">
                                {{ __('messages.plan.no_of_vcards') }}: {{ $plan->no_of_vcards }}
                            </div>
                        @endif
                    @endif

                    <ul class="q-price-features">
                        <li><span class="check">✓</span> {{ __('messages.plan.storage_limit') }}: {{ $plan->storage_limit }}</li>
                        @foreach (getPlanFeature($plan) as $feature => $value)
                            <li class="{{ $value == 1 ? '' : 'muted' }}">
                                <span class="check">{{ $value == 1 ? '✓' : '—' }}</span>
                                {{ __('messages.feature.' . $feature) }}
                            </li>
                        @endforeach
                    </ul>

                    @if (getLoggedInUserRoleId() != getSuperAdminRoleId())
                        @if (getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                            @if (!empty(getCurrentSubscription()) && $plan->id == getCurrentSubscription()->plan_id && !getCurrentSubscription()->isExpired())
                                @if ($plan->price != 0)
                                    <button type="button" class="q-btn-outline" data-id="{{ $plan->id }}" data-turbo="false" style="width:100%;pointer-events:none;opacity:0.6">
                                        {{ __('messages.subscription.currently_active') }}
                                    </button>
                                @else
                                    <button type="button" class="q-btn-outline" data-turbo="false" style="width:100%">
                                        {{ __('messages.subscription.renew_free_plan') }}
                                    </button>
                                @endif
                            @else
                                @if (!empty(getCurrentSubscription()) && !getCurrentSubscription()->isExpired() && ($plan->price == 0 || $plan->price != 0))
                                    @if ($plan->hasZeroPlan->count() == 0)
                                        <a href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}" class="q-btn-primary {{ $plan->price == 0 ? 'freePayment' : '' }}" data-id="{{ $plan->id }}" data-plan-price="{{ $plan->price }}" id="planId{{ $plan->id }}" data-turbo="false" style="width:100%">
                                            {{ __('messages.subscription.switch_plan') }}
                                        </a>
                                    @else
                                        <button type="button" class="q-btn-outline" data-turbo="false" style="width:100%">
                                            {{ __('messages.subscription.renew_free_plan') }}
                                        </button>
                                    @endif
                                @else
                                    @if ($plan->hasZeroPlan->count() == 0)
                                        <a href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}" class="q-btn-primary {{ $plan->price == 0 ? 'freePayment' : '' }}" data-id="{{ $plan->id }}" data-plan-price="{{ $plan->price }}" id="planId{{ $plan->id }}" data-turbo="false" style="width:100%">
                                            {{ __('messages.subscription.choose_plan') }}
                                        </a>
                                    @else
                                        <button type="button" class="q-btn-outline" data-turbo="false" style="width:100%">
                                            {{ __('messages.subscription.renew_free_plan') }}
                                        </button>
                                    @endif
                                @endif
                            @endif
                        @else
                            @if ($plan->hasZeroPlan->count() == 0)
                                <a href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}" class="q-btn-primary {{ $plan->price == 0 ? 'freePayment' : '' }}" data-id="{{ $plan->id }}" data-plan-price="{{ $plan->price }}" id="planId{{ $plan->id }}" data-turbo="false" style="width:100%">
                                    {{ __('messages.subscription.choose_plan') }}
                                </a>
                            @else
                                <button type="button" class="q-btn-outline" data-turbo="false" style="width:100%">
                                    {{ __('messages.subscription.renew_free_plan') }}
                                </button>
                            @endif
                        @endif
                    @else
                        @if ($plan->hasZeroPlan->count() == 0)
                            <a href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}" class="q-btn-primary {{ $plan->price == 0 ? 'freePayment' : '' }}" data-id="{{ $plan->id }}" data-plan-price="{{ $plan->price }}" id="planId{{ $plan->id }}" data-turbo="false" style="width:100%">
                                {{ __('messages.subscription.choose_plan') }}
                            </a>
                        @else
                            <button type="button" class="q-btn-outline" data-turbo="false" style="width:100%">
                                {{ __('messages.subscription.renew_free_plan') }}
                            </button>
                        @endif
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ Testimonials ═══ --}}
@if (!$testimonials->isEmpty())
    <section class="q-testimonials" @if (checkFrontLanguageSession() == 'ar' || checkFrontLanguageSession() == 'fa') dir="rtl" @endif>
        <div class="container">
            <p class="q-section-label q-reveal" style="text-align:center">Testimonial</p>
            <h2 class="q-section-title center q-reveal">{{ __('auth.stories_from_our_customers') }}</h2>
            <div class="q-testimonials-grid">
                @foreach ($testimonials as $testimonial)
                    <div class="q-testimonial-card">
                        <blockquote>{!! $testimonial->description !!}</blockquote>
                        <div class="q-testimonial-author">
                            <img src="{{ $testimonial->testimonial_url }}" alt="{{ $testimonial->name }}" loading="lazy">
                            <div>
                                <strong>{{ $testimonial->name }}</strong>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- ═══ Contact ═══ --}}
<section class="q-contact" id="frontContactUsTab" @if (checkFrontLanguageSession() == 'ar' || checkFrontLanguageSession() == 'fa') dir="rtl" @endif>
    <div class="container">
        <p class="q-section-label q-reveal" style="text-align:center">Get in touch</p>
        <h2 class="q-section-title center q-reveal">{{ __('messages.contact_us.contact') }}</h2>
        <div class="q-contact-grid">
            <div class="q-reveal">
                <div class="q-contact-info">
                    <div class="q-contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:{{ $setting['email'] }}">{{ $setting['email'] }}</a>
                    </div>
                    <div class="q-contact-item">
                        <i class="fas fa-phone"></i>
                        <a href="tel:{{ $setting['prefix_code'] }}{{ $setting['phone'] }}" dir="ltr">{{ '+' . $setting['prefix_code'] . ' ' . $setting['phone'] }}</a>
                    </div>
                    <div class="q-contact-item">
                        <i class="fas fa-location-dot"></i>
                        <span>{{ $setting['address'] }}</span>
                    </div>
                </div>
            </div>
            <div class="q-reveal q-reveal-d1">
                <form class="q-contact-form" id="myForm">
                    @csrf
                    <div id="contactError" class="alert alert-danger d-none"></div>
                    <input name="name" id="name" type="text" class="q-input" placeholder="{{ __('messages.front.enter_your_name') }}*" required>
                    <input name="email" id="email" type="email" class="q-input" placeholder="{{ __('messages.front.enter_your_email') }}*" required>
                    <input name="subject" id="subject" type="text" class="q-input" placeholder="{{ __('messages.common.subject') }}*" required>
                    <textarea name="message" id="message" rows="4" class="q-input" placeholder="{{ __('messages.front.enter_your_message') }}*" required></textarea>
                    <button type="submit" id="submit" class="q-btn-primary" style="justify-self:start">{{ __('messages.contact_us.send_message') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- ═══ Bottom CTA — Salo.uk Style ═══ --}}
<section class="q-bottom-cta" @if (checkFrontLanguageSession() == 'ar' || checkFrontLanguageSession() == 'fa') dir="rtl" @endif>
    <div class="container" style="text-align:center">
        <p class="q-section-label q-reveal">Ready to get started?</p>
        <h2 class="q-section-title center q-reveal" style="max-width:500px;margin-bottom:24px">{{ $setting['home_page_title'] }}</h2>
        <p class="q-hero-sub q-reveal" style="margin:0 auto 40px;max-width:480px">Don't let limited resources hold you back. Level up your digital presence with a professional business card.</p>
        <div class="q-hero-cta q-reveal">
            <a class="q-btn-primary" href="{{ route('register') }}" data-turbo="false">
                <span class="q-btn-primary-glow" aria-hidden="true"></span>
                <span>{{ __('auth.get_started') }}</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.3335 8H12.6668M12.6668 8L8.00016 3.33334M12.6668 8L8.00016 12.6667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <span class="q-hero-note">Replies in 24 hours. No obligation.</span>
        </div>
    </div>
</section>

{{-- GSAP CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // ── 1. Hero Text Reveal Animations ──
    gsap.fromTo(".q-hero-enter", 
        { opacity: 0, y: 30, filter: "blur(12px)" },
        { opacity: 1, y: 0, filter: "blur(0px)", duration: 1.2, ease: "power3.out", stagger: 0.15, delay: 0.2 }
    );

    // ── 2. Canvas — Geometric Mark (5 Layers, Mouse Rotation) ──
    const canvas = document.getElementById("hero-canvas");
    if (!canvas) return;
    const ctx = canvas.getContext("2d", { alpha: true, desynchronized: true });
    const dpr = Math.min(window.devicePixelRatio || 1, 2);

    const pathData = "M108.965 17.6077C195.9 -23.0772 299.303 14.4975 339.931 101.558C380.419 188.316 343.285 291.435 256.993 332.413L249.775 316.941L249.351 316.033L248.445 316.458C161.509 357.143 58.1065 319.568 17.478 232.507C-23.0092 145.749 14.1253 42.6205 100.417 1.64188L107.635 17.1243L108.058 18.0315L108.965 17.6077ZM130.992 64.805C79.1277 89.08 56.7283 150.857 80.9683 202.802C105.068 254.434 166.181 276.905 217.865 253.313L225.088 268.788L225.511 269.696L226.418 269.271C278.283 244.995 300.681 183.219 276.442 131.274C252.342 79.6413 191.228 57.169 139.544 80.762L132.322 65.2874L131.898 64.3802L130.992 64.805Z";
    const path = new Path2D(pathData);
    const mWidth = 358;
    const mHeight = 334;

    // 4 layers — tighter equal distance
    const layers = [
        { scale: 1.15, opacity: 0.15, color: "rgba(167, 139, 250, 0.5)" },
        { scale: 1.10, opacity: 0.25, color: "rgba(139, 92, 246, 0.45)" },
        { scale: 1.05, opacity: 0.45, color: "rgba(255, 255, 255, 0.65)" },
        { scale: 1,    opacity: 0.75, color: "rgba(255, 255, 255, 0.95)" },
    ];

    let targetRot = 0;
    let currentRot = 0;

    function getScale() {
        const w = window.innerWidth;
        const h = window.innerHeight;
        return (w <= 1023 ? w * 0.95 : Math.min(h * 0.8, w * 0.8)) / Math.max(mWidth, mHeight);
    }

    function drawPath() {
        const w = canvas.width / dpr;
        const h = canvas.height / dpr;
        ctx.clearRect(0, 0, w, h);

        const cx = w / 2;
        const cy = h / 2;
        const maxR = Math.min(w, h) * 0.62;
        const scale = getScale();

        let diff = targetRot - currentRot;
        diff = Math.atan2(Math.sin(diff), Math.cos(diff));
        currentRot += diff * 0.08;

        // Purple ambient glow
        const glow = ctx.createRadialGradient(cx, cy, 0, cx, cy, maxR * 1.1);
        glow.addColorStop(0, "rgba(124, 58, 237, 0.10)");
        glow.addColorStop(0.6, "rgba(124, 58, 237, 0.03)");
        glow.addColorStop(1, "rgba(0,0,0,0)");
        ctx.fillStyle = glow;
        ctx.beginPath();
        ctx.arc(cx, cy, maxR * 1.1, 0, Math.PI * 2);
        ctx.fill();

        // Draw layers back to front
        for (let i = layers.length - 1; i >= 0; i--) {
            const layer = layers[i];
            if (layer.opacity < 0.001) continue;

            ctx.save();
            ctx.globalAlpha = layer.opacity;
            ctx.translate(cx + Math.cos(currentRot * 0.006 * (4 - i)) * 3 * (4 - i), cy + Math.sin(currentRot * 0.006 * (4 - i)) * 3 * (4 - i));
            ctx.rotate(currentRot * 0.003 * (4 - i) - 0.2 + (4 - i) * 0.06);
            ctx.scale(layer.scale * scale, layer.scale * scale);
            ctx.translate(-mWidth / 2, -mHeight / 2);

            ctx.strokeStyle = layer.color;
            ctx.lineWidth = 1.4 / (layer.scale * scale);
            ctx.stroke(path);
            ctx.restore();
        }

        animFrame = requestAnimationFrame(drawPath);
    }

    function resizeCanvas() {
        canvas.width = canvas.clientWidth * dpr;
        canvas.height = canvas.clientHeight * dpr;
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    }

    window.addEventListener("resize", resizeCanvas);
    resizeCanvas();
    let animFrame = requestAnimationFrame(drawPath);

    // ── 3. Mouse-driven rotation ──
    const isDesktop = window.matchMedia("(hover: hover) and (pointer: fine)").matches;
    if (isDesktop) {
        window.addEventListener("mousemove", function (e) {
            const cx = window.innerWidth / 2;
            const cy = window.innerHeight / 2;
            targetRot = Math.atan2(e.clientY - cy, e.clientX - cx);
        });
    }

    // ── 4. Drifting Ambient Cursors ──
    function animateCursor(selector, bounds) {
        const el = document.querySelector(selector);
        if (!el) return;
        
        function drift() {
            const targetX = Math.random() * (bounds.x[1] - bounds.x[0]) + bounds.x[0];
            const targetY = Math.random() * (bounds.y[1] - bounds.y[0]) + bounds.y[0];
            const duration = Math.random() * 2.5 + 2.0;
            
            gsap.to(el, {
                x: targetX,
                y: targetY,
                duration: duration,
                ease: "sine.inOut",
                onComplete: drift
            });
        }
        drift();
    }
    
    animateCursor("#cursor-carl", { x: [-140, 120], y: [-100, 85] });
    animateCursor("#cursor-sophie", { x: [-110, 150], y: [-85, 115] });

    // ── 5. Header Scroll scrolled Class Toggler ──
    const header = document.querySelector(".header");
    if (header) {
        const toggleScrolled = () => {
            header.classList.toggle("scrolled", window.scrollY > 60);
        };
        toggleScrolled();
        window.addEventListener("scroll", toggleScrolled, { passive: true });
    }

    // ── 6. Interactive Hover Button Glow ──
    document.querySelectorAll(".btn-white, .q-btn-primary").forEach(button => {
        const glow = document.createElement("span");
        glow.className = "btn-bg";
        button.appendChild(glow);
        
        button.addEventListener("mousemove", e => {
            const rect = button.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            glow.style.left = `${x}px`;
            glow.style.top = `${y}px`;
        });
    });
});
</script>
@endsection

