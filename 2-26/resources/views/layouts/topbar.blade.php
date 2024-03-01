<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/images/logo-dark-small.png') }}" alt="" height="48">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="64">
                    </span>
                </a>

                <a href="index" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/images/logo-light-small.png') }}" alt=""
                            height="32">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="64">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge bg-danger rounded-pill" id="page-header-notifications-number"
                        style="display: @if ($dbvar['$no_of_alerts_unread'] > 0) inline-block @else none @endif">{{ $dbvar['$no_of_alerts_unread'] }}</span>
                </button>
                <div class="dropdown-menu
                        dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications"> @lang('translation.Notifications') </h6>
                            </div>
                            {{-- <div class="col-auto">
                                <a href="#" class="small" key="t-view-all"> @lang('translation.View_All')</a>
                            </div> --}}
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 290px;">
                        @if (count($alerts) > 0)
                            @foreach ($alerts as $alert)
                                <a href="{{ stripos($alert->alert_short, 'deposit from rf') === false &&
                                stripos($alert->alert_short, 'deposit') !== false
                                    ? url('deposits')
                                    : (stripos($alert->alert_short, 'withdrawal from rf') === false &&
                                    stripos($alert->alert_short, 'withdrawal') !== false
                                        ? url('withdrawals')
                                        : (stripos($alert->alert_short, 'referral fees received') !== false
                                            ? url('referral-fees')
                                            : (stripos($alert->alert_short, 'fees paid') !== false
                                                ? url('fees')
                                                : '#'))) }}"
                                    class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3 flex-shrink-0">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bx-info-circle"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 me-3">
                                            <h6 class="mt-0 mb-1"> {{ $alert->alert_short }} </h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1"> {{ $alert->alert_long }}</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>
                                                        {{ Carbon\Carbon::parse($alert->created_at)->diffForHumans() }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="btn btn-sm btn-rounded btn-outline-secondary flex-shrink-0 btn-alert-delete"
                                            data-id="{{ $alert->id }}" style="margin: auto;" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="avatar-xs flex-shrink-0" style="margin: auto">
                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                    <i class="bx bx-bell-off"></i>
                                </span>
                            </div>
                            <p style="text-align: center; margin-top: 5px">No notifications yet</p>
                        @endif
                    </div>
                    @if (count($alerts) > 0)
                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)"
                                id="btn-alert-delete-all">
                                <i class="fas fa-trash-alt me-1"></i> <span key="t-view-more">Delete all
                                    notifications</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ ucfirst(Auth::user()->name) }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>


                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    {{-- <a class="dropdown-item" href="contacts-profile"><i
                            class="bx bx-user font-size-16 align-middle me-1"></i> <span
                            key="t-profile">@lang('translation.Profile')</span></a> --}}
                    {{-- <a class="dropdown-item" href="#"><i
                            class="bx bx-wallet font-size-16 align-middle me-1"></i> <span
                            key="t-my-wallet">@lang('translation.My_Wallet')</span></a> --}}
                    <a class="dropdown-item d-block" href="#" data-bs-toggle="modal"
                        data-bs-target=".change-password"><span key="t-settings">@lang('translation.Settings')</span></a>
                    {{-- <a class="dropdown-item" href="#"><i
                            class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span
                            key="t-lock-screen">@lang('translation.Lock_screen')</span></a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                            key="t-logout">@lang('translation.Logout')</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div> --}}
        </div>
    </div>
    </div>
</header>
<!--  Change-Password example -->
<div class="modal fade change-password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="change-password">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input id="current-password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror"
                            name="current_password" autocomplete="current_password"
                            placeholder="Enter Current Password" value="{{ old('current_password') }}">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" autocomplete="new_password"
                            placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm">
                        </div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword"
                            data-id="{{ Auth::user()->id }}" type="submit">Update Password</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
