@extends('layouts.master')

@section('title') Sales Statistics @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Admin @endslot
        @slot('title') Sales Statistics @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Monthly Sales - Totals</h4>

                    <div class="row text-center">

                    </div>

                    <canvas id="monthly_total_sales" data-colors='["--bs-primary-rgb, 0.2", "--bs-primary", "--bs-light-rgb, 0.2", "--bs-light", "--bs-primary-rgb, 0.2", "--bs-primary", "--bs-primary-rgb, 0.2", "--bs-primary"]' height="300"></canvas>

                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Monthly Trials and Converted trials</h4>

                    <div class="row text-center">

                    </div>

                    <canvas id="monthly_trials" data-colors='["--bs-primary-rgb, 0.2", "--bs-primary", "--bs-light-rgb, 0.2", "--bs-light", "--bs-primary-rgb, 0.2", "--bs-primary", "--bs-primary-rgb, 0.2", "--bs-primary"]' height="300"></canvas>

                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->


    <!--------------------------------------------------------------------------->



    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Monthly Sales - Packages</h4>

                    <div class="row text-center">
                        <div class="col-4">
                            <h5 class="mb-0">US$ {{ number_format($totalpackagessalespreviousmonth, 2) }}</h5>
                            <p class="text-muted text-truncate">Previous Month</p>
                        </div>
                        <div class="col-4">
                            <h5 class="mb-0">US$ {{ number_format($totalpackagessalesthismonth, 2) }}</h5>
                            <p class="text-muted text-truncate">This Month</p>
                        </div>
                        <div class="col-4">
                            <h5 class="mb-0">US$ {{ number_format($totalpackagessalesthismonthproyected, 2) }}</h5>
                            <p class="text-muted text-truncate">This Month Proyected</p>
                        </div>
                    </div>

                    <canvas id="monthly_sales" data-colors='["--bs-primary-rgb, 0.2", "--bs-primary", "--bs-light-rgb, 0.2", "--bs-light", "--bs-primary-rgb, 0.2", "--bs-primary", "--bs-primary-rgb, 0.2", "--bs-primary"]' height="300"></canvas>

                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Monthly Sales - Resets</h4>

                    <div class="row text-center">
                        <div class="col-4">
                            <h5 class="mb-0">US$ {{ number_format($totalresetssalespreviousmonth, 2) }}</h5>
                            <p class="text-muted text-truncate">Previous Month</p>
                        </div>
                        <div class="col-4">
                            <h5 class="mb-0">US$ {{ number_format($totalresetssalesthismonth, 2) }}</h5>
                            <p class="text-muted text-truncate">This Month</p>
                        </div>
                        <div class="col-4">
                            <h5 class="mb-0">US$ {{ number_format($totalresetssalesthismonthproyected, 2) }}</h5>
                            <p class="text-muted text-truncate">This Month Proyected</p>
                        </div>
                    </div>

                    <canvas id="monthly_sales_resets" data-colors='["--bs-primary-rgb, 0.2", "--bs-primary", "--bs-light-rgb, 0.2", "--bs-light", "--bs-primary-rgb, 0.2", "--bs-primary", "--bs-primary-rgb, 0.2", "--bs-primary"]' height="300"></canvas>

                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Monthly Sales - Edu Packages</h4>

                <div class="row text-center">

                </div>

                <canvas id="monthly_edu_sales" data-colors='["--bs-primary-rgb, 0.2", "--bs-primary", "--bs-light-rgb, 0.2", "--bs-light", "--bs-primary-rgb, 0.2", "--bs-primary", "--bs-primary-rgb, 0.2", "--bs-primary"]' height="300"></canvas>

            </div>
        </div>
    </div><!-- end col -->





    <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Relation between Active Packages</h4>

                    <div class="row text-center">

                    </div>

                    <canvas id="no_of_packages" data-colors='["--bs-success-rgb, 0.8", "--bs-success"]' height="300"></canvas>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection
@section('script')
    <!-- Chart JS -->
    <script src="{{ URL::asset('/assets/libs/chart-js/chart-js.min.js') }}"></script>

    <script>

    function getChartColorsArray(chartId) {
    if (document.getElementById(chartId) !== null) {
    var colors = document.getElementById(chartId).getAttribute("data-colors");

    if (colors) {
    colors = JSON.parse(colors);
    return colors.map(function (value) {
    var newValue = value.replace(" ", "");
    if (newValue.indexOf(",") === -1) {
    var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);

    if (color){
    color = color.replace(" ", "");
    return color;
    }
    else return newValue;
    } else {
    var val = value.split(',');
    if (val.length == 2) {
    var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
    rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
    return rgbaColor;
    } else {
    return newValue;
    }
    }
    });
    }
    }
    }

    !function($) {
    "use strict";

    var ChartJs = function() {};

    ChartJs.prototype.respChart = function(selector,type,data, options) {
    Chart.defaults.global.defaultFontColor='#9295a4',
    Chart.defaults.scale.gridLines.color='rgba(166, 176, 207, 0.1)';
    // get selector by context
    var ctx = selector.get(0).getContext('2d');
    // pointing parent container to make chart js inherit its width
    var container = $(selector).parent();

    // enable resizing matter
    $(window).resize( generateChart );

    // this function produce the responsive Chart JS
    function generateChart(){
    // make chart width fit with its container
    var ww = selector.attr('width', $(container).width() );
    switch(type){
    case 'Line':
    new Chart(ctx, {type: 'line', data: data, options: options});
    break;
    case 'Doughnut':
    new Chart(ctx, {type: 'doughnut', data: data, options: options});
    break;
    case 'Pie':
    new Chart(ctx, {type: 'pie', data: data, options: options});
    break;
    case 'Bar':
    new Chart(ctx, {type: 'bar', data: data, options: options});
    break;
    case 'Radar':
    new Chart(ctx, {type: 'radar', data: data, options: options});
    break;
    case 'PolarArea':
    new Chart(ctx, {data: data, type: 'polarArea', options: options});
    break;
    }
    // Initiate new chart or Redraw

    };
    // run function - render chart at first load
    generateChart();
    },
    //init
    ChartJs.prototype.init = function() {
        //creating Charts


        var BarchartColors = getChartColorsArray("monthly_total_sales");
        if (BarchartColors) {
            var barChart = {
                labels: [{!! $sales_labels !!}],
                datasets: [
                    {
                        label: "Total Monthly Sales",
                        backgroundColor: '#D4AF37',
                        borderColor: '#D4AF37',
                        borderWidth: 1,
                        hoverBackgroundColor: '#D4AF37',
                        hoverBorderColor: '#FFFFFF',
                        data: [{!! $total_monthly_sales !!}]
                    }
                ]
            };
            var barOpts = {
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 100,
                            callback: function (value) {
                                return 'US$ ' + value;
                            }
                        }
                    }]

                }
            }
            this.respChart($("#monthly_total_sales"), 'Bar', barChart, barOpts);
        }


        var LinechartLinechartColors = getChartColorsArray('monthly_sales');
        if (LinechartLinechartColors) {
            var lineChart = {
                labels: [{!! $sales_labels !!}],
                datasets: [
                    {
                        label: "Bronze",
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: LinechartLinechartColors[0],
                        borderColor: '#CD7F32',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[1],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[1],
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_packages_bronze !!}]
                    },
                    {
                        label: "Silver",
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: LinechartLinechartColors[2],
                        borderColor: '#C0C0C0',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[3],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[3],
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_packages_silver !!}]
                    },
                    {
                        label: "Gold",
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: LinechartLinechartColors[2],
                        borderColor: '#D4AF37',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[3],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[3],
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_packages_gold !!}]
                    },
                    {
                        label: "Diamond",
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: '#B9F2FF',
                        borderColor: '#B9F2FF',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[3],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[3],
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_packages_diamond !!}],
                    }
                ]
            };
            var lineOpts = {
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 10,
                            callback: function (value) {
                                return 'US$ ' + value;
                            }
                        }
                    }]
                }
            };

            this.respChart($("#monthly_sales"), 'Line', lineChart, lineOpts);
        }


        var LinechartLinechartColors = getChartColorsArray('monthly_edu_sales');
        if (LinechartLinechartColors) {
            var lineChart = {
                labels: [{!! $sales_labels !!}],
                datasets: [
                    {
                        label: "Edu",
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: LinechartLinechartColors[0],
                        borderColor: '#FFFFFF',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[1],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[1],
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_edu !!}]
                    }
                ]
            };
            var lineOpts = {
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 10,
                            callback: function (value) {
                                return 'US$ ' + value;
                            }
                        }
                    }]
                }
            };

            this.respChart($("#monthly_edu_sales"), 'Line', lineChart, lineOpts);
        }





        var LinechartLinechartColors = getChartColorsArray('monthly_sales_resets');
        if (LinechartLinechartColors) {
            var lineChart = {
                labels: [{!! $sales_labels !!}],
                datasets: [
                    {
                        label: "Bronze",
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: LinechartLinechartColors[0],
                        borderColor: '#CD7F32',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[1],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[1],
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_reset_bronze !!}]
                    },
                    {
                        label: "Silver",
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: LinechartLinechartColors[2],
                        borderColor: '#C0C0C0',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[3],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[3],
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_reset_silver !!}]
                    },
                    {
                        label: "Gold",
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: LinechartLinechartColors[2],
                        borderColor: '#D4AF37',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[3],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[3],
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_reset_gold !!}]
                    },
                    {
                        label: "Diamond",
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: '#B9F2FF',
                        borderColor: '#B9F2FF',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[3],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[3],
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_reset_diamond !!}],
                    }
                ]
            };
            var lineOpts = {
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 10,
                            callback: function (value) {
                                return 'US$ ' + value;
                            }
                        }
                    }]
                }
            };

            this.respChart($("#monthly_sales_resets"), 'Line', lineChart, lineOpts);
        }


        var LinechartLinechartColors = getChartColorsArray('monthly_trials');
        if (LinechartLinechartColors) {
            var lineChart = {
                labels: [{!! $sales_labels !!}],
                datasets: [
                    {
                        label: "Trials",
                        yAxisID: 'y-left',
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: LinechartLinechartColors[0],
                        borderColor: '#FFFFFF',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[1],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[1],
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_trial !!}]
                    },
                    {
                        label: "Converted",
                        yAxisID: 'y-right',
                        fill: false,
                        lineTension: 0.5,
                        backgroundColor: LinechartLinechartColors[2],
                        borderColor: '#D4AF37',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: LinechartLinechartColors[3],
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: LinechartLinechartColors[3],
                        pointHoverBorderColor: "#eef0f2",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [{!! $sales_converted !!}]
                    }
                ]
            };
            var lineOpts = {
                    scales: {
                        yAxes: [{
                            id: 'y-left',
                            type: 'linear',
                            display: true,
                            position: 'left',
                            ticks: {
                                stepSize: 1,
                                suggestedMin: 0,
                            }

                        },
                        {
                            id: 'y-right',
                            type: 'linear',
                            display: true,
                            position: 'right',
                            ticks: {
                                stepSize: 1,
                                suggestedMin: 0,

                            }
                        }
                    ]
                    }
                };

        this.respChart($("#monthly_trials"), 'Line', lineChart, lineOpts);
    }


        var PiechartColors = getChartColorsArray("no_of_packages");
        if (PiechartColors) {
            var pieChart = {
                labels: [
                    "Bronze",
                    "Silver",
                    "Gold",
                    "Diamond",
                ],
                datasets: [
                    {
                        data: [{{ $no_of_packages['bronze'] }}, {{ $no_of_packages['silver'] }}, {{ $no_of_packages['gold'] }}, {{ $no_of_packages['diamond'] }} ],
                        backgroundColor: ['#CD7F32', '#C0C0C0', '#D4AF37', '#B9F2FF'],
                        hoverBackgroundColor: ['#CD7F32', '#C0C0C0', '#D4AF37', '#B9F2FF'],
                        hoverBorderColor: "#fff"
                    }]
            };
            this.respChart($("#no_of_packages"),'Pie',pieChart);
        }




        //donut chart
    var DoughnutchartColors = getChartColorsArray("doughnut");
    if (DoughnutchartColors) {
    var donutChart = {
    labels: [
    "Desktops",
    "Tablets"
    ],
    datasets: [
    {
    data: [300, 210],
    backgroundColor: DoughnutchartColors,
    hoverBackgroundColor: DoughnutchartColors,
    hoverBorderColor: "#fff"
    }]
    };
    this.respChart($("#doughnut"),'Doughnut',donutChart);
    }


    //Pie chart
    var PiechartColors = getChartColorsArray("pie");
    if (PiechartColors) {
    var pieChart = {
    labels: [
    "Desktops",
    "Tablets"
    ],
    datasets: [
    {
    data: [300, 180],
    backgroundColor: PiechartColors,
    hoverBackgroundColor: PiechartColors,
    hoverBorderColor: "#fff"
    }]
    };
    this.respChart($("#pie"),'Pie',pieChart);
    }


    //barchart
    var BarchartColors = getChartColorsArray("bar");
    if (BarchartColors) {
    var barChart = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
    {
    label: "Sales Analytics",
    backgroundColor: BarchartColors[0],
    borderColor: BarchartColors[0],
    borderWidth: 1,
    hoverBackgroundColor: BarchartColors[1],
    hoverBorderColor: BarchartColors[1],
    data: [65, 59, 81, 45, 56, 80, 50,20]
    }
    ]
    };
    var barOpts = {
    scales: {
    xAxes: [{
    barPercentage: 0.4
    }]
    }
    }
    this.respChart($("#bar"),'Bar',barChart, barOpts);
    }


    //radar chart
    var RadarchartColors = getChartColorsArray("radar");
    if (RadarchartColors) {
    var radarChart = {
    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
    datasets: [
    {
    label: "Desktops",
    backgroundColor: RadarchartColors[0],
    borderColor: RadarchartColors[1],
    pointBackgroundColor: RadarchartColors[1],
    pointBorderColor: "#fff",
    pointHoverBackgroundColor: "#fff",
    pointHoverBorderColor: RadarchartColors[1],
    data: [65, 59, 90, 81, 56, 55, 40]
    },
    {
    label: "Tablets",
    backgroundColor: RadarchartColors[2],
    borderColor: RadarchartColors[3],
    pointBackgroundColor: RadarchartColors[3],
    pointBorderColor: "#fff",
    pointHoverBackgroundColor: "#fff",
    pointHoverBorderColor: RadarchartColors[3],
    data: [28, 48, 40, 19, 96, 27, 100]
    }
    ]
    };
    this.respChart($("#radar"),'Radar',radarChart);
    }

    //Polar area  chart
    var PolarAreachartColors = getChartColorsArray("polarArea");
    if (PolarAreachartColors) {
    var polarChart = {
    datasets: [{
    data: [
    11,
    16,
    7,
    18
    ],
    backgroundColor: PolarAreachartColors,
    label: 'My dataset', // for legend
    hoverBorderColor: "#fff"
    }],
    labels: [
    "Series 1",
    "Series 2",
    "Series 3",
    "Series 4"
    ]
    };
    this.respChart($("#polarArea"),'PolarArea',polarChart);
    }
    },
    $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs

    }(window.jQuery),

    //initializing
    function($) {
    "use strict";
    $.ChartJs.init()
    }(window.jQuery);

    </script>

@endsection
