@extends('layouts.master')

@section('Kingsley_Markets Main')
@endsection

@section('content')
@section('css')
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}" />
    <style>
        .statics-card {
            cursor: pointer;
        }

        .statics-card:hover {
            background: #2e3545;
            box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                    <p class="mb-2">Now viewing Account:</p>
                                    <h5 class="mb-1">{{ $dbvar['mt4_account'] }} @if ($dbvar['active'])
                                            <i style='color: green' class='bx bxs-smile'></i> Active
                                        @else
                                            <i style='color: orangered' class='bx bxs-sad'></i> Deactivated
                                        @endif <span style="font-size: x-small"
                                            id="default_link">&nbsp&nbsp&nbsp<a
                                                href="javascript: set_default({{ $dbvar['mt4_account'] }});">Set as
                                                Default</a></span></h5>
                                    <p class="mb-0">{{ $dbvar['account_name'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 align-self-center">
                        <div class="text-lg-center mt-4 mt-lg-0">
                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Performance fee</p>
                                        <h5 class="mb-0">10%</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Management Fee</p>
                                        <h5 class="mb-0">2% per year</h5>
                                    </div>
                                </div>
                                <div class="col-4">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="clearfix mt-4 mt-lg-0">
                            <div class="dropdown float-end">
                                <button class="btn btn-primary" type="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-list-ol align-middle me-1"></i> Change Account
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    @foreach ($show_accounts as $show_account)
                                        {!! $show_account !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row mb-4">
    <div class="col-xl-9">
        <div class="card h-100">
            <div class="card-body">
                <div class="clearfix">
                    <h4 class="card-title mb-4">Balances</h4>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="text-muted">
                            <div class="mb-4">
                                <p>Current Balance</p>
                                <h4>{{ $dbvar['current_balance'] }}€</h4>
                                <div><span class="badge {{ $dbvar['balance_change_badge'] }} font-size-12 me-1">
                                        {{ $dbvar['balance_change'] }}%</span> from last month's close</div>
                            </div>
                            @isset($dbvar['3agomonth_balance'])
                                <div class="mb-5">
                                    <p class="mb-2">3 Months ago</p>
                                    <h5>{{ $dbvar['3agomonth_balance'] }}€</h5>
                                </div>
                            @endisset
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div id="daily-balance-chart" class="apex-charts" data-colors="" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3">
        <div class="card h-100">
            <div class="card-body">
                <h4 class="card-title mb-4">Monthly P/L</h4>
                <div id="monthlypl" class="apex-charts"></div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xl-12">
        <div class="row">

            <div class="col-sm-3">
                <div class="card statics-card" id="total-deposits-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-dock-top"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Total Deposits</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $dbvar['deposit_sum'] }}€</h4>
                        </div>
                        <div class="d-flex">
                            <span class="ms-2 text-truncate"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card statics-card" id="total-fees-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-dock-top"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Total Fees</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $dbvar['fees_sum'] }}€</h4>
                        </div>
                        <div class="d-flex">
                            <span class="ms-2 text-truncate"></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-3">
                <div class="card statics-card" id="total-referral-fees-card">
                    <div class="card-body" data-bs-toggle="modal" data-bs-target="#Total-referral-fees">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-dock-bottom"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Total Referral Fees</h5>
                        </div>
                        <div class="d-flex text-muted mt-4">
                            <h4>{{ $dbvar['referral_sum'] }}€</h4>
                        </div>
                       <div class="d-flex">
                            <span class="ms-2 text-truncate"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card statics-card" id="total-withdrawals-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-dock-bottom"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Total Withdrawals</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $dbvar['withdrawal_sum'] }}€</h4>
                        </div>
                        <div class="d-flex">
                            <span class="ms-2 text-truncate"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>

</div>
<!-- end row -->

<!-- Reinvest Confirm Modal Start -->
<div class="modal fade" id="reinvest-confirm-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="m-2" style="text-align: center; font-weight: normal">Are you sure?</h3>
                <h6 class="m-2" style="text-align: center; font-weight: normal">Do you want to reinvest total
                    referral fees?</h6>
                <div class="d-flex" style="justify-content: center">
                    <button class="btn btn-primary m-1" data-bs-dismiss="modal" id="submit_reinvest">Yes</button>
                    <button class="btn btn-danger m-1" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Reinvest Confirm Modal End -->

<!-- Total referral fees modal Start -->
<div class="modal fade" id="Total-referral-fees" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Total referral fees</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex" style="justify-content: center">
                    <button href="" class="btn btn-primary d-flex" id="withdrawal_btn" style="margin-left: 20px"  data-bs-toggle="modal" data-bs-target="#withdrawal-confirm-modal">Withdrawal</button>
                    <button href="" class="btn btn-success d-flex" id="reinvest_btn" style="margin-left: 20px" data-bs-toggle="modal" data-bs-target="#reinvest-confirm-modal">Reinvest</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Total referral fees modal End -->

<!-- Withdrawal Confirm Modal Start -->
<div class="modal fade" id="withdrawal-confirm-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="" id="withdrawal-confirm-form">
                    <div class="mb-3">
                        <label for="amount">Withdrawal amount:</label>
                        <input type="number" required step="any" min="0.1" class="form-control"
                            id="amount" placeholder="Enter withdrawal amount...">
                        <div class="text-danger" id="amountError"></div>
                    </div>

                    <div class="mb-3">
                        <label for="instructions">Special Instructions:</label>
                        <textarea type="text" class="form-control" id="FF" placeholder="Enter special instructions..."></textarea>
                        <div class="text-danger" id="instructionsError"></div>
                    </div>

                    <div class="mb-3">
                        <label for="bankNameAddress">Bank name and address:</label>
                        <textarea type="text" class="form-control" id="bankNameAddress" placeholder="Enter bank name and address..."></textarea>
                        <div class="text-danger" id="bankNameAddressError"></div>
                    </div>

                    <div class="mb-3">
                        <label for="abaSwift">ABA/Swift:</label>
                        <input type="text" class="form-control" id="abaSwift" placeholder="Enter ABA/Swift...">
                        <div class="text-danger" id="abaSwiftError"></div>
                    </div>

                    <div class="mb-3">
                        <label for="iban">IBAN(Required for all international bank transfers) or bank account
                            #:</label>
                        <input type="text" class="form-control" id="iban"
                            placeholder="Enter IBAN or bank account number...">
                        <div class="text-danger" id="ibanError"></div>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex" style="margin: auto">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Withdrawal Confirm Modal End -->


@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/echarts/echarts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>

<script>
    function set_default(acc) {
        var xhttp;
        if (acc == "") {
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("default_link").innerHTML = "&nbsp&nbsp&nbspSelected as Default";
            }
        };
        xhttp.open("GET", "set_default_account/" + acc, true);
        xhttp.send();
    }
</script>

<script>
    colors = ["#9b7234", "#34c38f", "#556ee6", "#f46a6a"];
    options = {
        chart: {
            height: 320,
            type: "line",
            toolbar: {
                show: 1
            }
        },

        dropShadow: {
            enabled: true,
            color: "#000",
            top: 5,
            left: 5,
            blur: 2,
            opacity: 0
        },
        stroke: {
            curve: "smooth",
            width: [3, 1, 1, 1],
            dashArray: [0, 3, 5, 3],
        },
        series: [{
            name: "EoM Balance",
            type: "line",
            data: [
                @foreach ($eombalance4view as $eombalance)
                    {{ $eombalance }},
                @endforeach
            ]
        }],
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: "categories",
            categories: []
        },
        colors: colors,
        yaxis: {
            show: true,
            showAlways: true,
            forceNiceScale: true,
            labels: {
                show: true,
                style: {
                    colors: '#FFFFFF',
                },
                formatter: function(value) {
                    return value.toLocaleString("us-US") + " €";
                },
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#daily-balance-chart"), options);
    chart.render();
</script>

<script>
    var options = {
        series: [{
            name: 'Monthly P/L',
            data: [
                @foreach ($monthlypl as $idx => $pl)
                    {
                        x: "{{ $idx }}",
                        y: {{ $pl }}
                    },
                @endforeach
            ]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: 'Monthly PL'
            },
            labels: {
                show: true,
                style: {
                    colors: '#FFFFFF',
                },
                formatter: function(value) {
                    return value.toLocaleString("us-US") + " €";
                },
            },
        },

        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return value.toLocaleString("us-US") + " €";
                }
            }
        }
    };
    var chart = new ApexCharts(document.querySelector("#monthlypl"), options);
    chart.render();

    $(document).ready(function() {
        $('#withdrawal_btn').on('click', function(e) {
            e.preventDefault();
        });
        $('#reinvest_btn').on('click', function(e) {
            e.preventDefault();
        });
        $('#submit_reinvest').on('click', function() {
            const amount = parseFloat(("{{ $dbvar['referral_sum'] }}").replace(/,/g, ''));

            const today = new Date();
            // Get YYYY-MM-DD format
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const dd = String(today.getDate()).padStart(2, '0');
            const date = `${yyyy}-${mm}-${dd}`;

            $.ajax({
                url: "{{ url('account-transactions') }}",
                type: "POST",
                data: {
                    type: "Deposit from RF",
                    amount,
                    date,
                    account_id: {{ $dbvar['account_id'] }},
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    toastr.success('Reinvest done successfully.');
                    setTimeout(() => {
                        window.location.href = window.location.href;
                    }, 1000);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
        $('#withdrawal-confirm-form').on('submit', function(event) {
            event.preventDefault();
            const amount = $('#amount').val();
            const instructions = $('#instructions').val();
            const bankNameAddress = $('#bankNameAddress').val();
            const abaSwift = $('#abaSwift').val();
            const iban = $('#iban').val();

            const today = new Date();
            // Get YYYY-MM-DD format
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const dd = String(today.getDate()).padStart(2, '0');
            const date = `${yyyy}-${mm}-${dd}`;

            $.ajax({
                url: "{{ url('account-transactions') }}",
                type: "POST",
                data: {
                    type: "Withdrawal from RF",
                    amount,
                    date,
                    account_id: {{ $dbvar['account_id'] }},
                    instructions,
                    bankNameAddress,
                    abaSwift,
                    iban,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    toastr.success('Reinvest done successfully.');
                    setTimeout(() => {
                        window.location.href = window.location.href;
                    }, 1000);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        $("#total-deposits-card").on('click', function() {
            window.location.href = "{{ url('deposits') }}";
        });

        $("#total-fees-card").on('click', function(event) {
            window.location.href = "{{ url('fees') }}";
        });

        $("#total-referral-fees-card").on('click', function(event) {
            // window.location.href = "{{ url('referral-fees') }}";
        });

        $("#total-withdrawals-card").on('click', function(event) {
            window.location.href = "{{ url('withdrawals') }}";
        });
    });
</script>
@endsection
