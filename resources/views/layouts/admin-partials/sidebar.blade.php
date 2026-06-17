<header class="main-nav">
    <div class="sidebar-user text-center">
        @role(\App\Models\Role::ROLE_SUPER_ADMIN)
            <a class="setting-primary" href="{{ route('setting.index') }}"><i data-feather="settings"></i></a>
        @else
            <a class="setting-primary" href="{{ route('user.setting.index') }}"><i data-feather="settings"></i></a>
        @endrole
        {{-- Profile image: the User::profile_image accessor returns null/empty
             for users who have not uploaded a photo. The codebase's standard
             fallback pattern (used in admin_users/fields, profile/index,
             users/fields, organisation/fields, etc.) is:
                 !empty($user->profile_image) ? $user->profile_image : asset('placeholder')
              We mirror that pattern here, using the Qrenda starter-kit
             placeholder so the layout style stays consistent when the admin
             has not yet uploaded a photo. --}}
        <img class="img-90 rounded-circle"
             src="{{ !empty(getLogInUser()->profile_image) ? getLogInUser()->profile_image : asset('assets/qrenda/images/dashboard/1.png') }}"
             alt=""
             onerror="this.onerror=null;this.src='{{ asset('assets/qrenda/images/dashboard/1.png') }}'" />
        <div class="badge-bottom"><span class="badge badge-primary">{{ auth()->user()->roles->first()->display_name ?? 'User' }}</span></div>
        <a href="javascript:void(0)"><h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->full_name }}</h6></a>
        <p class="mb-0 font-roboto">{{ auth()->user()->email }}</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>

                    @role(\App\Models\Role::ROLE_SUPER_ADMIN)
                    <li class="sidebar-main-title"><div><h6>General</h6></div></li>
                    
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ Request::is('sadmin/dashboard*') ? 'active' : '' }}" href="{{ route('sadmin.dashboard') }}">
                            <i data-feather="home"></i><span>{{ __('messages.dashboard') }}</span>
                        </a>
                    </li>
                    
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="users"></i><span>{{ __('messages.users') }}</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admins.index') }}" class="{{ Request::is('sadmin/admins*') ? 'active' : '' }}">{{ __('messages.admins') }}</a></li>
                            <li><a href="{{ route('users.index') }}" class="{{ Request::is('sadmin/users*') ? 'active' : '' }}">{{ __('messages.vcard.user') }}</a></li>
                            <li><a href="{{ route('organisation.index') }}" class="{{ Request::is('sadmin/organisation*') ? 'active' : '' }}">{{ __('messages.organization.organization') }}</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-main-title"><div><h6>Content</h6></div></li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="credit-card"></i><span>{{ __('messages.vcards') }}</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('sadmin.vcards.index') }}" class="{{ Request::is('sadmin/vcard*') ? 'active' : '' }}">{{ __('messages.vcards') }}</a></li>
                            <li><a href="{{ route('sadmin.whatsapp-stores.index') }}" class="{{ Request::is('sadmin/whatsapp-store*') ? 'active' : '' }}">{{ __('messages.whatsapp_stores.whatsapp_stores') }}</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="layout"></i><span>{{ __('messages.vcards_templates') }}</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('sadmin.templates.index') }}" class="{{ Request::is('sadmin/templates*') ? 'active' : '' }}">{{ __('messages.vcards_templates') }}</a></li>
                            <li><a href="{{ route('plans.index') }}" class="{{ Request::is('sadmin/plans*') ? 'active' : '' }}">{{ __('messages.plans') }}</a></li>
                            <li><a href="{{ route('subscription.cash') }}" class="{{ Request::is('sadmin/planSubscription*') ? 'active' : '' }}">{{ __('messages.cash_payment') }}</a></li>
                            <li><a href="{{ route('subscription.user.plan') }}" class="{{ Request::is('sadmin/subscribedPlan*') ? 'active' : '' }}">{{ __('messages.subscribed_plans') }}</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-main-title"><div><h6>Finance</h6></div></li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="credit-card"></i><span>{{ __('messages.nfc.sell_nfc_cards') }}</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('sadmin.nfc.card.types') }}" class="{{ Request::is('sadmin/nfc*') ? 'active' : '' }}">{{ __('messages.nfc.sell_nfc_cards') }}</a></li>
                            <li><a href="{{ route('coupon-codes.index') }}" class="{{ Request::is('sadmin/coupon-codes*') ? 'active' : '' }}">{{ __('messages.coupon_code.coupon_codes') }}</a></li>
                            <li><a href="{{ route('currencies.index') }}" class="{{ Request::is('sadmin/currencies*') ? 'active' : '' }}">{{ __('messages.currency.currencies') }}</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-main-title"><div><h6>Settings</h6></div></li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="settings"></i><span>{{ __('messages.settings') }}</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('setting.front.cms') }}" class="{{ Request::is('sadmin/front-cms*') || Request::is('sadmin/advanced*') ? 'active' : '' }}">{{ __('messages.front_cms.front_cms') }}</a></li>
                            <li><a href="{{ route('setting.index') }}" class="{{ Request::is('sadmin/settings*') ? 'active' : '' }}">{{ __('messages.settings') }}</a></li>
                            <li><a href="{{ route('blogs.index') }}" class="{{ Request::is('sadmin/blogs*') ? 'active' : '' }}">{{ __('messages.blogs') }}</a></li>
                            <li><a href="{{ route('custom.page.index') }}" class="{{ Request::is('sadmin/custom-page*') ? 'active' : '' }}">{{ __('messages.custom_page.custom_page') }}</a></li>
                            <li><a href="{{ route('send.mail.index') }}" class="{{ Request::is('sadmin/send*') ? 'active' : '' }}">{{ __('messages.send_mail.send_mail') }}</a></li>
                            <li><a href="{{ route('email.templates.index') }}" class="{{ Request::is('sadmin/email*') ? 'active' : '' }}">{{ __('messages.email_templates.email_templates') }}</a></li>
                            <li><a href="{{ route('languages.default-language') }}" class="{{ Request::is('sadmin/language*') ? 'active' : '' }}">{{ __('messages.languages.languages') }}</a></li>
                            <li><a href="{{ route('countries.index') }}" class="{{ Request::is('sadmin/countries*') || Request::is('sadmin/states*') || Request::is('sadmin/cities*') ? 'active' : '' }}">{{ __('messages.country.countries') }}</a></li>
                        </ul>
                    </li>
                    @endrole

                    @role(\App\Models\Role::ROLE_ADMIN)
                    <li class="sidebar-main-title"><div><h6>General</h6></div></li>
                    
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ Request::is('admin/dashboard*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i data-feather="home"></i><span>{{ __('messages.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="sidebar-main-title"><div><h6>Content</h6></div></li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="credit-card"></i><span>{{ __('messages.vcards') }}</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('vcards.index') }}" class="{{ Request::is('admin/vcard*') ? 'active' : '' }}">{{ __('messages.vcards') }}</a></li>
                            <li><a href="{{ route('whatsapp.stores') }}" class="{{ Request::is('admin/whatsapp-store*') ? 'active' : '' }}">{{ __('messages.whatsapp_stores.whatsapp_stores') }}</a></li>
                            @if (checkFeature('appointments'))
                            <li><a href="{{ route('appointments.index') }}" class="{{ Request::is('admin/appointments*') ? 'active' : '' }}">{{ __('messages.vcard.appointments') }}</a></li>
                            @endif
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="file-text"></i><span>{{ __('messages.contact_us.inquries') }}</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('inquiries.index') }}" class="{{ Request::is('admin/inquiries*') ? 'active' : '' }}">{{ __('messages.contact_us.inquries') }}</a></li>
                            <li><a href="{{ route('product-orders.index') }}" class="{{ Request::is('admin/product-orders*') ? 'active' : '' }}">{{ __('messages.product_orders') }}</a></li>
                            <li><a href="{{ route('wp-product-order.index') }}" class="{{ Request::is('admin/wp-product-orders*') ? 'active' : '' }}">{{ __('messages.whatsapp_product_order') }}</a></li>
                        </ul>
                    </li>

                    @if (empty(getLogInUser()->organisation_id))
                    <li class="sidebar-main-title"><div><h6>Account</h6></div></li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="settings"></i><span>{{ __('messages.settings') }}</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('user.setting.index') }}" class="{{ Request::is('admin/user-setting*') ? 'active' : '' }}">{{ __('messages.settings') }}</a></li>
                            <li><a href="{{ route('user.storage') }}" class="{{ Request::is('admin/storage*') ? 'active' : '' }}">{{ __('messages.storage') }}</a></li>
                            <li><a href="{{ route('virtual-backgrounds.index') }}" class="{{ Request::is('admin/virtual-backgrounds*') ? 'active' : '' }}">{{ __('messages.virtual_backgrounds') }}</a></li>
                        </ul>
                    </li>
                    @endif

                    @if (getLogInUser()->hasRole(\App\Models\Role::ROLE_ADMIN) && empty(getLogInUser()->organisation_id))
                    <li class="sidebar-main-title"><div><h6>Subscription</h6></div></li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{ route('subscription.index') }}">
                            <i data-feather="credit-card"></i><span>{{ __('messages.subscription.manage_subscription') }}</span>
                        </a>
                    </li>
                    @endif
                    @endrole
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>