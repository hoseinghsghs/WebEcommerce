@extends('admin.layout.MasterAdmin')
@section('title','آنالیز بازدید ها')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویژگی‌ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">آنالیز بازدید ها</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong><i class="zmdi zmdi-chart"></i> گزارش</strong> بازدید</h2>
                                    </div>
                                    <div class="body">
                                        <div id="chart-area-spline-sracke" class="c3_chart d_sales"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                      </br>
            <div class="row clearfix">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>صفحات پر بازدید</strong></h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">ویرایش</a></li>
                                        <li><a href="javascript:void(0);">حذف</a></li>
                                        <li><a href="javascript:void(0);">گزارش</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body text-center">
                            <div id="chart-pie" class="c3_chart d_distribution"></div>
                            <!-- <button hidden class="btn btn-primary mt-4 mb-4">مشاهده بیشتر</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<!-- نمودار درصد ترافیک -->

<script>
initC3Chart();

function initC3Chart() {
    month_visits = "{{json_encode($month_visits)}}";
    month_visits = JSON.parse(month_visits);
    if ("{{json_encode($month_visits)}}" === "[0]") {} else {

        setTimeout(function() {
            month_visits = "{{json_encode($month_visits)}}";
            month_visits = JSON.parse(month_visits);
            $(document).ready(function() {
                var chart = c3.generate({
                    bindto: "#chart-area-spline-sracke", // id of chart wrapper
                    data: {
                        columns: [
                            // each columns data
                            ["data1", month_visits[0], month_visits[1], month_visits[2],
                                month_visits[3], month_visits[4], month_visits[5],
                                month_visits[
                                    6], month_visits[7], month_visits[8], month_visits[9],
                                month_visits[10], month_visits[11]
                            ],
                        ],
                        type: "area-spline", // default type of chart
                        groups: [
                            ["data1", "data2", "data3"]
                        ],
                        colors: {
                            data1: Aero.colors["teal"],
                        },
                        names: {
                            // name of each serie
                            data1: "میزان بازدید",
                        },
                    },
                    axis: {

                        x: {
                            type: "category",
                            // name of each category
                            categories: [
                                "فروردین",
                                "اردیبهشت",
                                "خرداد",
                                "تیر",
                                "مرداد",
                                "شهریور",
                                "مهر",
                                "آبان",
                                "آذر",
                                "دی",
                                "بهمن",
                                "اسفند",
                            ],
                        },
                    },
                    legend: {
                        show: true, //hide legend
                    },
                    padding: {
                        bottom: 0,
                        top: 0,
                    },
                });
            });
        }, 500);
    }


}
</script>
<!-- پایان نمودار درصد ترافیک -->

<script>
$(document).ready(function() {
    more_1 = @json($more[0]);
    more_2 = @json($more[1]);
    more_3 = @json($more[2]);

    var chart = c3.generate({
        bindto: "#chart-pie", // id of chart wrapper
        data: {
            columns: [

                ["data1", more_1.pageViews],
                ["data2", more_2.pageViews],
                ["data3", more_3.pageViews],

                // each columns data


            ],
            type: "pie", // default type of chart
            colors: {
                data1: Aero.colors["lime"],
                data2: Aero.colors["teal"],
                data3: Aero.colors["gray"],
            },
            names: {
                // name of each serie
                data1: more_1.pageTitle,
                data2: more_2.pageTitle,
                data3: more_3.pageTitle,
            },
        },
        axis: {},
        legend: {
            show: true, //hide legend
        },
        padding: {
            bottom: 0,
            top: 0,
        },
    });
});
</script>


@endpush
@endsection
