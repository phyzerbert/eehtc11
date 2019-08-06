@extends('layouts.master')

@section('style')    

    <link href="{{asset('master/vendors/daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" />

@endsection

@section('content')

    <div class="content-wrapper">

        <!-- START PAGE CONTENT-->

        <div class="page-content fade-in-up">

            <div class="row">

                <div class="col-lg-3 col-md-6">

                    <div class="ibox bg-success">

                        <div class="ibox-body">

                            <h2 class="mb-1 text-white">{{$return['today_money']}}</h2>

<<<<<<< HEAD
                            <div class="text-dark"> طلبات اليوم</div><i class="la la-money widget-stat-icon text-white"></i>
=======
                            <div class="text-dark">TODAY REQUESTS</div><i class="la la-money widget-stat-icon text-white"></i>
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="ibox bg-primary">

                        <div class="ibox-body">

                            <h2 class="mb-1 text-white">{{$return['week_money']}}</h2>

<<<<<<< HEAD
                            <div class="text-dark">طلبات الأسبوع</div><i class="la la-money widget-stat-icon text-white"></i>
=======
                            <div class="text-dark">WEEK REQUESTS</div><i class="la la-money widget-stat-icon text-white"></i>
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="ibox bg-info">

                        <div class="ibox-body">

                            <h2 class="mb-1 text-white">{{$return['month_money']}}</h2>

<<<<<<< HEAD
                            <div class="text-dark">طلبات الشهر</div><i class="la la-money widget-stat-icon text-white"></i>
=======
                            <div class="text-dark">MONTH REQUESTS</div><i class="la la-money widget-stat-icon text-white"></i>
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="ibox bg-warning">

                        <div class="ibox-body">

                            <h2 class="mb-1 text-white">{{$return['year_money']}}</h2>

<<<<<<< HEAD
                            <div class="text-dark">طلبات العام</div><i class="la la-money widget-stat-icon text-white"></i>
=======
                            <div class="text-dark">YEAR REQUESTS</div><i class="la la-money widget-stat-icon text-white"></i>
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b

                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="ibox">

                        <div class="ibox-head">

<<<<<<< HEAD
                            <div class="ibox-title">المحاسبة</div>
=======
                            <div class="ibox-title">Finances</div>
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b

                            <form action="" class="form-inline" method="post" id="search_form">

                                @csrf

<<<<<<< HEAD
                                <label for="period">التاريخ </label>

                                <input type="text" class="form-control form-control-sm mr-sm-2 ml-3" name="period" id="period" autocomplete="off" value="{{$period}}" style="width:200px;">

                                <button type="submit" class="btn btn-primary btn-sm">بحث</button>

                                <button type="button" class="btn btn-success btn-sm ml-1" id="btn-reset">إعادة تعيين</button>
=======
                                <label for="period">Date: </label>

                                <input type="text" class="form-control form-control-sm mr-sm-2 ml-3" name="period" id="period" autocomplete="off" value="{{$period}}" style="width:200px;">

                                <button type="submit" class="btn btn-primary btn-sm">Search</button>

                                <button type="button" class="btn btn-success btn-sm ml-1" id="btn-reset">Reset</button>
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b

                            </form>

                        </div>

                        <div class="ibox-body">

                            <div>

                                <canvas id="finance_chart" style="height:400px;"></canvas>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="ibox ibox-fullheight">

                        <div class="ibox-head">

<<<<<<< HEAD
                            <div class="ibox-title">أحدث البرامج</div>
=======
                            <div class="ibox-title">Recent Courses</div>
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b

                        </div>

                        <div class="ibox-body table-responsive">

                            <table class="table table-bordered table-hover" id="coursesTable" style="min-width:500px;">

                                <thead class="thead-default thead-lg">

                                    <tr>

<<<<<<< HEAD
                                        <th>البرنامج التدريبي</th>

                                        <th>حالة البرنامج</th>

                                        <th>المشروع</th>

                                        <th>الإنجاز</th>

                                        <th>تاريخ التنفيذ</th>
=======
                                        <th>Task</th>

                                        <th>Status</th>

                                        <th>Project</th>

                                        <th>Completion</th>

                                        <th>Due Date</th>
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($recent_courses as $item)                                            

                                        <tr>

                                            <td class="name">{{$item->name}}</td>

                                            <td class="status" data-value="{{$item->status}}">

                                                @if ($item->status == 1)

<<<<<<< HEAD
                                                    <span class="badge badge-primary badge-pill">جديد</span>

                                                @elseif ($item->status == 2)

                                                    <span class="badge badge-secondary badge-pill">قيد العمل</span>

                                                @elseif ($item->status == 3)

                                                    <span class="badge badge-info badge-pill">متوقف</span>

                                                @elseif ($item->status == 4)

                                                    <span class="badge badge-success badge-pill">مكتمل</span>
=======
                                                    <span class="badge badge-primary badge-pill">New</span>

                                                @elseif ($item->status == 2)

                                                    <span class="badge badge-secondary badge-pill">In Progress</span>

                                                @elseif ($item->status == 3)

                                                    <span class="badge badge-info badge-pill">On Hold</span>

                                                @elseif ($item->status == 4)

                                                    <span class="badge badge-success badge-pill">Completed</span>
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b

                                                @endif

                                            </td>

                                            <td class="project" data-value="{{$item->project_id}}">@isset($item->project->name){{$item->project->name}}@endisset</td>

                                            <td class="prog" data-value="{{$item->progress}}">

                                                <div class="progress">

                                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$item->progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$item->progress}}%;">{{$item->progress}}%</div>

                                                </div>

                                            </td>

                                            <td class="due_to">{{$item->due_to}}</td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="ibox">

                        <div class="ibox-head">

<<<<<<< HEAD
                            <div class="ibox-title">أحدث التنبيهات</div>
=======
                            <div class="ibox-title">Recent Notifications</div>
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b

                        </div> 

                        <div class="ibox-body">  
                                                    
                            <ul class="media-list media-list-divider scroller" data-height="285px">
                                @foreach ($recent_notifications as $item)
                                    @php
                                        $posted_time = new DateTime($item->created_at);
                                        $now = new DateTime();
                                        $interval = $posted_time->diff($now);
                                        if($interval->d >= 1){
                                            $time = $interval->d. " days";
                                        }else if($interval->h >= 1){
                                            $time = $interval->h. " hours";
                                        }else if($interval->i >= 1){
                                            $time = $interval->i. " mins";
                                        }else{
                                            $time = "Just now";
                                        }
                                        
                                    @endphp 
                                    <li class="media py-2">
                                        <div class="media-img">
                                            <span class="btn-icon-only btn-circle bg-primary-50 text-primary">
                                                @switch($item->type)
                                                    @case("create_project")
                                                        <i class="ti-check"></i>
<<<<<<< HEAD
                                                        @php $type = "اضافة مشروع جديد";  @endphp
                                                        @break
                                                    @case("new_request")
                                                        <i class="fa fa-file-excel-o"></i>
                                                        @php $type = "طلب مالي جديد";  @endphp
                                                        @break
                                                    @case("exceed_limit")
                                                        <i class="fa fa-money"></i>
                                                        @php $type = "طلب يتخطى حد الصرف";  @endphp
                                                        @break
                                                    @case("new_course")
                                                        <i class="fa fa-list"></i>
                                                        @php $type = "اضافة برنامج جديد";  @endphp
                                                        @break
                                                    @case("completed")
                                                        <i class="ti-announcement"></i>
                                                        @php $type = "مكتمل";  @endphp
                                                        @break
                                                    @default
                                                        <i class="fa fa-file-list"></i>
                                                        @php $type = "تنبية جديد";  @endphp
=======
                                                        @php $type = "Created New Project";  @endphp
                                                        @break
                                                    @case("new_request")
                                                        <i class="fa fa-file-excel-o"></i>
                                                        @php $type = "New money Request";  @endphp
                                                        @break
                                                    @case("exceed_limit")
                                                        <i class="fa fa-money"></i>
                                                        @php $type = "Exceed Money Limit";  @endphp
                                                        @break
                                                    @case("new_course")
                                                        <i class="fa fa-list"></i>
                                                        @php $type = "Created New Course";  @endphp
                                                        @break
                                                    @case("completed")
                                                        <i class="ti-announcement"></i>
                                                        @php $type = "Completed";  @endphp
                                                        @break
                                                    @default
                                                        <i class="fa fa-file-list"></i>
                                                        @php $type = "New Notification";  @endphp
>>>>>>> cdd4cff71cf8790b5e8f6b111209845ae2f13e4b
                                                @endswitch   
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                {{ucwords($type)}}
                                                {{-- <small class="float-right text-muted ml-2">{{}}</small> --}}
                                            </div>
                                            <div class="font-13 text-light">{{$item->content}}&nbsp;<small class="float-left text-muted ml-2 nowrap">{{$time}}</small></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>                       

                    </div>

                </div>

            </div>

        </div>

        <!-- END PAGE CONTENT-->

        @include('layouts.footer')

    </div>

@endsection



@section('script')

    <!-- PAGE LEVEL PLUGINS-->

    <script src="{{ asset('master/vendors/chart.js/dist/Chart.min.js') }}"></script>

    <script src="{{ asset('master/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>

    <script src="{{asset('master/vendors/daterangepicker/moment.min.js')}}"></script>

    <script src="{{asset('master/vendors/daterangepicker/jquery.daterangepicker.min.js')}}"></script>

    

    <script>

        var lineData = {

            labels: <?php echo json_encode($key_array); ?>,

            datasets: [

                {

                    label: "Requested Money",

                    backgroundColor: 'rgba(213,217,219, 0.5)',

                    borderColor: 'rgba(213,217,219, 1)',

                    pointBorderColor: "#fff",

                    data: <?php echo json_encode($money_array); ?>,

                    // fill: false,

                }

            ]

        };

        var lineOptions = {

            legend: {

                display: false,

            },

            responsive: true,

            maintainAspectRatio: false

        };

        var ctx = document.getElementById("finance_chart").getContext("2d");

        new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

        $(function(){

            $('.easypie').each(function(){

                $(this).easyPieChart({

                trackColor: $(this).attr('data-trackColor') || '#f2f2f2',

                scaleColor: false,

                });

            });

            $("#period").dateRangePicker();

            $("#btn-reset").click(function(){

                $("#period").val('');

            })

        });

    </script>

@endsection