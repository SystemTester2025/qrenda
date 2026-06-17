<div>
    <style>
    /* Qrenda visual signatures — defined inline so this view paints without a webpack rebuild. */
    .qrenda-dashboard { color: #1f2937; }
    .qrenda-dashboard .row + .row { margin-top: 1rem; }
    .qrenda-dashboard .card { border: none; border-radius: 12px; background: #fff; box-shadow: 0 1px 4px rgba(15, 23, 42, .04); margin-bottom: 1.25rem; }
    .qrenda-dashboard .card-header { padding: 1rem 1.25rem; background: transparent; border-bottom: 1px solid rgba(15, 23, 42, .05); }
    .qrenda-dashboard .card-body { padding: 1.25rem; }

    /* Greeting hero with confetti decoration */
    .qrenda-dashboard .profile-greeting { background: linear-gradient(135deg, #6366f1 0%, #4338ca 100%); color: #fff; border-radius: 12px; position: relative; overflow: hidden; height: 100%; }
    .qrenda-dashboard .profile-greeting .card-header { background: rgba(255, 255, 255, .08); border: none; }
    .qrenda-dashboard .profile-greeting .setting-white { background: rgba(255, 255, 255, .2); color: #fff; }
    .qrenda-dashboard .profile-greeting .font-light { font-weight: 300; }
    .qrenda-dashboard .profile-greeting .confetti { position: absolute; inset: 0; pointer-events: none; }
    .qrenda-dashboard .profile-greeting .confetti-piece { position: absolute; width: 8px; height: 14px; border-radius: 2px; opacity: .55; }
    .qrenda-dashboard .profile-greeting .btn-light { background: #fff; color: #4338ca; border: none; }

    /* Qrenda card-primary/card-secondary pattern */
    .qrenda-dashboard .income-card { border-radius: 12px; color: #fff; padding: 1.5rem 1rem; text-align: center; position: relative; overflow: hidden; min-height: 150px; border: none; height: 100%; height: -webkit-fill-available; }
    .qrenda-dashboard .income-card.card-primary { background: linear-gradient(135deg, #6366f1 0%, #4338ca 100%); }
    .qrenda-dashboard .income-card.card-secondary { background: linear-gradient(135deg, #ec4899 0%, #9d174d 100%); }
    .qrenda-dashboard .income-card .round-box { width: 56px; height: 56px; border-radius: 50%; background: rgba(255, 255, 255, .15); display: inline-flex; align-items: center; justify-content: center; margin: 0 auto .75rem; }
    .qrenda-dashboard .income-card .round-box svg { fill: #fff; width: 24px; height: 24px; }
    .qrenda-dashboard .income-card h5 { color: #fff; font-size: 1.5rem; font-weight: 700; margin: .25rem 0; }
    .qrenda-dashboard .income-card p { color: rgba(255, 255, 255, .85); font-size: .82rem; margin: 0 0 .75rem; }
    .qrenda-dashboard .income-card .parrten { position: absolute; right: -25px; bottom: -25px; opacity: .35; }
    .qrenda-dashboard .income-card .parrten svg { fill: rgba(255, 255, 255, .4); width: 110px; height: 110px; }

    /* Setting-list action icons in card headers (qrenda pattern) */
    .qrenda-dashboard .header-top { display: flex; align-items: center; gap: .75rem; flex-wrap: wrap; }
    .qrenda-dashboard .header-top h5 { margin: 0; font-weight: 600; }
    .qrenda-dashboard .header-top .center-content { flex: 1; color: #6b7280; font-size: .82rem; }
    .qrenda-dashboard .header-top .center-content .font-primary { color: #4338ca; font-weight: 600; margin-right: .5rem; }
    .qrenda-dashboard .header-top .center-content .font-secondary { color: #9d174d; font-weight: 600; margin-right: .5rem; }
    .qrenda-dashboard .setting-list ul.setting-option { list-style: none; padding: 0; margin: 0; display: flex; gap: .25rem; }
    .qrenda-dashboard .setting-list .setting-primary, .qrenda-dashboard .setting-list .setting-secondary { width: 28px; height: 28px; border-radius: 6px; display: inline-flex; align-items: center; justify-content: center; font-size: .8rem; }
    .qrenda-dashboard .setting-list .setting-primary { background: rgba(99, 102, 241, .12); color: #4338ca; }
    .qrenda-dashboard .setting-list .setting-secondary { background: rgba(236, 72, 153, .12); color: #9d174d; }
    .qrenda-dashboard .setting-list .font-primary { color: #4338ca; }
    .qrenda-dashboard .setting-list .font-secondary { color: #9d174d; }
    .qrenda-dashboard .setting-list .font-white { color: #fff; }

    /* Qrenda's btn-arrow percentage badge */
    .qrenda-dashboard .btn-arrow { display: inline-flex; align-items: center; gap: .35rem; padding: .3rem .65rem; border-radius: 999px; font-size: .75rem; font-weight: 600; text-decoration: none; }
    .qrenda-dashboard .btn-arrow.arrow-primary { background: rgba(99, 102, 241, .15); color: #4338ca; }
    .qrenda-dashboard .btn-arrow.arrow-secondary { background: rgba(236, 72, 153, .15); color: #9d174d; }
    .qrenda-dashboard .toprightarrow-primary, .qrenda-dashboard .toprightarrow-secondary { font-size: .65rem; }

    /* Latest update + recent order + transaction tables & lists */
    .qrenda-dashboard .latest-update-sec .media { display: flex; gap: .75rem; align-items: center; }
    .qrenda-dashboard .latest-update-sec .media svg { width: 30px; height: 30px; fill: #4338ca; flex-shrink: 0; }
    .qrenda-dashboard .latest-update-sec .media .media-body span { display: block; font-weight: 600; color: #1f2937; font-size: .85rem; }
    .qrenda-dashboard .latest-update-sec .media .media-body p { margin: 0; color: #6b7280; font-size: .75rem; }
    .qrenda-dashboard .table-bordernone { width: 100%; border-collapse: collapse; }
    .qrenda-dashboard .table-bordernone td { padding: .65rem .5rem; border: none; vertical-align: middle; }
    .qrenda-dashboard .latest-update-sec td a { color: #4338ca; text-decoration: none; font-size: .82rem; }
    .qrenda-dashboard .week-date { list-style: none; padding: 0; margin: 0; display: flex; gap: .75rem; }
    .qrenda-dashboard .week-date li { color: #6b7280; font-size: .82rem; }
    .qrenda-dashboard .week-date .font-primary { color: #4338ca; font-weight: 600; }

    .qrenda-dashboard .recent-order-sec h5 { font-weight: 600; margin-bottom: 1rem; }
    .qrenda-dashboard .recent-order-sec table img.img-fluid { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; }

    .qrenda-dashboard .trasaction-sec .transaction-totalbal { padding: 1rem 1.25rem; color: #1f2937; }
    .qrenda-dashboard .trasaction-sec .transaction-totalbal h2 { font-size: 1.5rem; font-weight: 700; margin-bottom: .25rem; }
    .qrenda-dashboard .trasaction-sec .transaction-totalbal p { color: #6b7280; font-size: .82rem; margin: 0; }

    .qrenda-dashboard .box-col-3 { flex: 0 0 25%; max-width: 25%; }
    .qrenda-dashboard .box-col-6 { flex: 0 0 50%; max-width: 50%; }
    .qrenda-dashboard .des-xl-25 { flex: 0 0 25%; max-width: 25%; }
    .qrenda-dashboard .des-xl-50 { flex: 0 0 50%; max-width: 50%; }
    .qrenda-dashboard .des-xl-100 { flex: 0 0 100%; max-width: 100%; }
    @media (max-width: 1199.98px) {
        .qrenda-dashboard .des-xl-25, .qrenda-dashboard .des-xl-50, .qrenda-dashboard .des-xl-100 { flex: 0 0 100%; max-width: 100%; }
    }
    @media (max-width: 575.98px) {
        .qrenda-dashboard .income-card { min-height: 130px; padding: 1rem .75rem; }
        .qrenda-dashboard .income-card h5 { font-size: 1.25rem; }
    }
</style>

@php
    $confettiColors = ['#f59e0b', '#ec4899', '#10b981', '#3b82f6', '#ef4444', '#8b5cf6', '#06b6d4'];
@endphp

<div class="container-fluid dashboard-default-sec qrenda-dashboard">
    <div class="row">

        {{-- LEFT COLUMN: greeting hero + 2 small income cards --}}
        <div class="col-xl-5 box-col-12 des-xl-100">
            <div class="row">
                {{-- Greeting hero with confetti pieces (qrenda pattern) --}}
                <div class="col-xl-12 col-md-6 box-col-6 des-xl-50">
                    <div class="card profile-greeting">
                        <div class="card-header">
                            <div class="header-top">
                                <div class="setting-list bg-primary position-unset">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-white"><i class="fa fa-cog"></i></div>
                                        </li>
                                        <li><i class="fa fa-code font-white"></i></li>
                                        <li><i class="fa fa-expand font-white"></i></li>
                                        <li><i class="fa fa-refresh font-white"></i></li>
                                        <li><i class="fa fa-times font-white"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center p-t-0">
                            <h3 class="font-light">Welcome Back, {{ Auth::user()->full_name ?: (Auth::user()->name ?: 'Admin') }}!</h3>
                            <p>{{ number_format($activeUsersCount) }} active users · {{ number_format($activeVcard) }} live vCards across the platform.</p>
                            <a class="btn btn-light" href="{{ route('users.index') }}">Manage Users</a>
                            <div class="confetti">
                                @for($i = 0; $i < 13; $i++)
                                    <div class="confetti-piece" style="left: {{ 4 + ($i * 7.3) }}%; top: {{ 65 + (($i % 4) * 8) }}%; background: {{ $confettiColors[$i % count($confettiColors)] }}; transform: rotate({{ $i * 23 }}deg);"></div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Income mini-card: Active Users --}}
                <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <a href="{{ route('users.index') }}" class="text-decoration-none">
                        <div class="card income-card card-primary">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448.057 448.057">
                                        <g><path d="M404.562,7.468c-13.577-11.314-33.755-9.479-45.069,4.099L224.133,174.127,88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32V232.816l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path></g>
                                        <g><path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32S337.694,208.057,320.02,208.057z"></path></g>
                                    </svg>
                                </div>
                                <h5>{{ number_format($activeUsersCount) }}</h5>
                                <p>{{ __('messages.common.total_active_users') }}</p>
                                <a class="btn-arrow arrow-primary" href="{{ route('users.index') }}">
                                    <i class="toprightarrow-primary fa fa-arrow-up me-2"></i>
                                    {{ number_format(($activeUsersCount / max(1, $activeUsersCount + $deActiveUsersCount)) * 100, 2) }}%
                                </a>
                                <div class="parrten">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448.057 448.057">
                                        <g><path d="M404.562,7.468c-13.577-11.314-33.755-9.479-45.069,4.099L224.133,174.127,88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32V232.816l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path></g>
                                        <g><path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32S337.694,208.057,320.02,208.057z"></path></g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Income mini-card: Active Vcards --}}
                <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <a href="{{ route('sadmin.vcards.index') }}" class="text-decoration-none">
                        <div class="card income-card card-secondary">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <g><path d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M96,100.16c50.315,35.939,80.124,94.008,80,155.84c0.151,61.839-29.664,119.919-80,155.84C11.45,325.148,11.45,186.851,96,100.16z M256,480c-49.143,0.007-96.907-16.252-135.84-46.24C175.636,391.51,208.14,325.732,208,256c0.077-69.709-32.489-135.434-88-177.6c80.1-61.905,191.9-61.905,272,0c-98.174,75.276-116.737,215.885-41.461,314.059C353.003,463.884,305.179,480.088,256,480z M416,412C329.932,350.82,309.756,231.452,370.936,145.384C383.331,127.947,398.563,112.715,416,100.16C500.654,186.871,500.654,325.289,416,412z"></path></g>
                                    </svg>
                                </div>
                                <h5>{{ number_format($activeVcard) }}</h5>
                                <p>{{ __('messages.common.total_active_vcards') }}</p>
                                <a class="btn-arrow arrow-secondary" href="{{ route('sadmin.vcards.index') }}">
                                    <i class="toprightarrow-secondary fa fa-arrow-up me-2"></i>
                                    {{ number_format(($activeVcard / max(1, $activeVcard + $deActiveVcard)) * 100, 2) }}%
                                </a>
                                <div class="parrten">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <g><path d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M96,100.16c50.315,35.939,80.124,94.008,80,155.84c0.151,61.839-29.664,119.919-80,155.84C11.45,325.148,11.45,186.851,96,100.16z M256,480c-49.143,0.007-96.907-16.252-135.84-46.24C175.636,391.51,208.14,325.732,208,256c0.077-69.709-32.489-135.434-88-177.6c80.1-61.905,191.9-61.905,272,0c-98.174,75.276-116.737,215.885-41.461,314.059C353.003,463.884,305.179,480.088,256,480z M416,412C329.932,350.82,309.756,231.452,370.936,145.384C383.331,127.947,398.563,112.715,416,100.16C500.654,186.871,500.654,325.289,416,412z"></path></g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: Sales overview big card with header setting-list --}}
        <div class="col-xl-7 box-col-12 des-xl-100 dashboard-sec">
            <div class="card income-card" style="background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); color: #1f2937; text-align: left; min-height: 0;">
                <div class="card-header">
                    <div class="header-top d-sm-flex align-items-center">
                        <h5>{{ __('messages.sadmin_dashboard.sales_overview') }}</h5>
                        <div class="center-content">
                            <p class="d-sm-flex align-items-center mb-0">
                                <span class="font-primary m-r-10 f-w-700">{{ number_format($activeOrganisationsCount) }}</span>
                                <i class="toprightarrow-primary fa fa-arrow-up m-r-10"></i>
                                {{ number_format($activeOrganisationsCount) }} active organizations
                            </p>
                        </div>
                        <div class="setting-list">
                            <ul class="list-unstyled setting-option">
                                <li>
                                    <div class="setting-primary"><i class="fa fa-cog"></i></div>
                                </li>
                                <li><i class="fa fa-code font-primary"></i></li>
                                <li><i class="fa fa-expand font-primary"></i></li>
                                <li><i class="fa fa-refresh font-primary"></i></li>
                                <li><i class="fa fa-times font-primary"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div id="chart-timeline-dashbord" style="padding:1rem 1.25rem;">
                        <div class="row g-3">
                            <div class="col-md-3 col-6">
                                <small class="text-muted">{{ __('messages.common.active_organization') }}</small>
                                <h3 class="mb-0 fw-bold mt-1" style="color:#4338ca;">{{ number_format($activeOrganisationsCount) }}</h3>
                                <small class="text-success"><i class="toprightarrow-primary fa fa-arrow-up me-1"></i> {{ number_format($activeOrganisationsCount) }} active</small>
                            </div>
                            <div class="col-md-3 col-6">
                                <small class="text-muted">{{ __('messages.common.active_organization_user') }}</small>
                                <h3 class="mb-0 fw-bold mt-1" style="color:#4338ca;">{{ number_format($activeOrganisationUsersCount) }}</h3>
                                <small class="text-success"><i class="toprightarrow-primary fa fa-arrow-up me-1"></i> live</small>
                            </div>
                            <div class="col-md-3 col-6">
                                <small class="text-muted">{{ __('messages.common.deactive_organization') }}</small>
                                <h3 class="mb-0 fw-bold mt-1" style="color:#9d174d;">{{ number_format($deActiveOrganisationsCount) }}</h3>
                                <small class="text-danger"><i class="toprightarrow-secondary fa fa-arrow-down me-1"></i> {{ number_format($deActiveOrganisationsCount) }} deactivated</small>
                            </div>
                            <div class="col-md-3 col-6">
                                <small class="text-muted">{{ __('messages.common.deactive_organization_user') }}</small>
                                <h3 class="mb-0 fw-bold mt-1" style="color:#9d174d;">{{ number_format($deActiveOrganisationUsersCount) }}</h3>
                                <small class="text-danger"><i class="toprightarrow-secondary fa fa-arrow-down me-1"></i> idle</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Growth Overview + Latest Activity row (2-col layout per Qrenda) --}}
        <div class="col-xl-12 box-col-12 des-xl-100">
            <div class="row">
                {{-- Growth Overview card (left half) — user/vcard focus, distinct from sales_overview --}}
                <div class="col-xl-6 col-50 box-col-6 des-xl-50">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>Growth Overview</h5>
                                <div class="center-content">
                                    <p class="d-flex align-items-center mb-0">
                                        <i class="toprightarrow-primary fa fa-arrow-up me-2"></i>
                                        {{ number_format($activeUsersCount) }} active users
                                    </p>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-primary"><i class="fa fa-cog"></i></div>
                                        </li>
                                        <li><i class="fa fa-code font-primary"></i></li>
                                        <li><i class="fa fa-expand font-primary"></i></li>
                                        <li><i class="fa fa-refresh font-primary"></i></li>
                                        <li><i class="fa fa-times font-primary"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div style="padding:1rem 1.25rem;">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <small class="text-muted">{{ __('messages.common.total_active_users') }}</small>
                                        <h3 class="mb-0 fw-bold mt-1" style="color:#4338ca;">{{ number_format($activeUsersCount) }}</h3>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Total vCards</small>
                                        <h3 class="mb-0 fw-bold mt-1" style="color:#4338ca;">{{ number_format($activeVcard + $deActiveVcard) }}</h3>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">New Users (30d)</small>
                                        <h3 class="mb-0 fw-bold mt-1" style="color:#4338ca;">{{ number_format($newUsersCount ?? 0) }}</h3>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">New vCards (30d)</small>
                                        <h3 class="mb-0 fw-bold mt-1" style="color:#9d174d;">{{ number_format($newVcardsCount ?? 0) }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Latest activity card (right half) --}}
                <div class="col-xl-6 col-50 box-col-6 des-xl-50">
                    <div class="card latest-update-sec">
                        <div class="card-header">
                            <div class="header-top d-sm-flex align-items-center">
                                <h5>{{ __('messages.sadmin_dashboard.latest_activity') }}</h5>
                                <div class="center-content">
                                    <ul class="week-date">
                                        <li class="font-primary">Today</li>
                                        <li>Month</li>
                                    </ul>
                                </div>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-primary"><i class="fa fa-cog"></i></div>
                                        </li>
                                        <li><i class="fa fa-code font-primary"></i></li>
                                        <li><i class="fa fa-expand font-primary"></i></li>
                                        <li><i class="fa fa-refresh font-primary"></i></li>
                                        <li><i class="fa fa-times font-primary"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordernone">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <svg viewBox="0 0 512.001 512.001">
                                                        <g><path d="M506.35,80.699c-7.57-7.589-19.834-7.609-27.43-0.052L331.662,227.31l-42.557-42.557c-7.577-7.57-19.846-7.577-27.423,0L89.076,357.36c-7.577,7.57-7.577,19.853,0,27.423c3.782,3.788,8.747,5.682,13.712,5.682c4.958,0,9.93-1.894,13.711-5.682l158.895-158.888l42.531,42.524c7.57,7.57,19.808,7.577,27.397,0.032l160.97-160.323C513.881,100.571,513.907,88.288,506.35,80.699z"></path></g>
                                                    </svg>
                                                    <div class="media-body">
                                                        <span>User activations</span>
                                                        <p>{{ number_format($activeUsersCount) }} currently active on the platform</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="{{ route('users.index') }}">Edit</a></td>
                                            <td><a href="{{ route('users.index') }}">Audit</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <svg viewBox="0 0 512 512">
                                                        <path d="M362,91v-60H150v60H0v390h512C512,464.111,512,108.71,512,91z M180,61h152v30H180z M482,451H30V248.156l90,36v46.844h90v-30h92v30h90v-46.844l90-36V451z M180,301h-30v-60h30V301z M332,241h30v60h-30C332,293.741,332,248.307,332,241z M482,215.844l-90,36v-40.844h-90v60h-92v-60H120v40.844l-90-36c0-14.163,0-84.634,0-94.844h452C482,131.21,482,200.681,482,215.844z"></path>
                                                    </svg>
                                                    <div class="media-body">
                                                        <span>Live vcards</span>
                                                        <p>{{ number_format($activeVcard) }} active · {{ number_format($deActiveVcard) }} paused</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="{{ route('sadmin.vcards.index') }}">Edit</a></td>
                                            <td><a href="{{ route('sadmin.vcards.index') }}">Audit</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <svg viewBox="0 0 512 512">
                                                        <g><path d="M345.622,126.038c-50.748-45.076-130.482-46.914-183.244,3.903c-21.262,20.478-35.375,47.381-39.737,75.754c-5.454,35.471,2.872,70.834,23.444,99.576c56.271,78.616,49.132,141.058,49.915,145.691c0,16.435,6.211,31.795,17.491,43.253c11.289,11.469,26.386,17.785,42.509,17.785c33.084,0,60-26.916,60-60c.686-4.269-6.11-72.81,47.676-143.691c17.875-23.557,27.324-51.673,27.324-81.309C391,178.451,374.46,141.651,345.622,126.038z"></path></g>
                                                    </svg>
                                                    <div class="media-body">
                                                        <span>Tenants · organizations</span>
                                                        <p>{{ number_format($activeOrganisationsCount) }} active tenants this period</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="{{ route('organisation.index') }}">Edit</a></td>
                                            <td><a href="{{ route('organisation.index') }}">Audit</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Orders / Organization transaction card (full-width) --}}
        <div class="col-xl-12 box-col-12 des-xl-100 mt-3">
            <div class="row">
                <div class="col-xl-12 recent-order-sec">
                    <div class="card trasaction-sec d-flex flex-row align-items-stretch" style="overflow:hidden;">
                        <div style="flex:0 0 35%; padding:1.5rem 1.25rem; background: linear-gradient(135deg, #ec4899 0%, #9d174d 100%); color: #fff;">
                            <div class="header-top">
                                <h5 style="color:#fff;">{{ __('messages.common.total_organizations') }}</h5>
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li><div class="setting-secondary"><i class="fa fa-cog"></i></div></li>
                                        <li><i class="fa fa-expand font-secondary"></i></li>
                                        <li><i class="fa fa-times font-secondary"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="transaction-totalbal" style="color:#fff;">
                                <h2 style="color:#fff;">{{ number_format($activeOrganisationsCount) }}<span class="ms-3"><a class="btn-arrow arrow-secondary" href="{{ route('organisation.index') }}"><i class="toprightarrow-secondary fa fa-arrow-up me-1"></i>Active</a></span></h2>
                                <p style="color: rgba(255,255,255,.85);">{{ __('messages.sadmin_dashboard.total_tenants') }}</p>
                            </div>
                        </div>
                        <div style="flex:1; padding:1.25rem;">
                            <div class="row g-3">
                                <div class="col-6">
                                    <small class="text-muted">{{ __('messages.common.active_organization_user') }}</small>
                                    <h3 class="mb-0 fw-bold mt-1" style="color:#9d174d;">{{ number_format($activeOrganisationUsersCount) }}</h3>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">{{ __('messages.common.deactive_organization_user') }}</small>
                                    <h3 class="mb-0 fw-bold mt-1" style="color:#9d174d;">{{ number_format($deActiveOrganisationUsersCount) }}</h3>
                                </div>
                                <div class="col-12">
                                    <small class="text-muted">{{ __('messages.common.total_active_users') }}</small>
                                    <h3 class="mb-0 fw-bold mt-1" style="color:#1f2937;">{{ number_format($activeUsersCount) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
