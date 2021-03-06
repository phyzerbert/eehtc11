@extends('layouts.master')
@section('style')    
    <link href="{{asset('master/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" />    
    <link href="{{asset('master/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
    @php
        $role = Auth::user()->role->slug;
        $progress = $project->courses->avg('progress');
        $progress = intval($progress);
    @endphp
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">تفاصيل المشروع</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="la la-home font-20"></i></a></li>
                <li class="breadcrumb-item">المشاريع</li>
                <li class="breadcrumb-item">تفاصيل المشروع</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-xl-8">
                    <div class="ibox">
                        <div class="ibox-body">
                            <div class="d-flex justify-content-between m-b-20">
                                <div>
                                    <h3 class="m-0">{{$project->name}}</h3>
                                    <div>{{$project->description}}</div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-3 pl-3">
                                    <h6 class="mb-3">تاريخ التنفيذ</h6>
                                    <span class="h2 mr-3"><i class="fa fa-calendar text-primary h1 mb-0 mr-2"></i>
                                        <span>{{date('Y-m-d', strtotime($project->created_at))}}</span>
                                    </span>
                                </div>
                                <div class="col-3 pl-4">
                                    <h6 class="mb-3">أعضاء المشروع</h6>
                                    <span class="h2 mr-3"><i class="fa fa-users text-primary h1 mb-0 mr-2"></i>
                                        <span>{{$project_members_count}}</span>
                                    </span>
                                </div>
                                <div class="col-3 pl-4">
                                    <h6 class="mb-3">برامج المشروع المشروع</h6>
                                    <span class="h2 mr-3"><i class="fa fa-list-ul text-primary h1 mb-0 mr-2"></i>
                                        <span>{{$project->courses()->count()}}</span>
                                    </span>
                                </div>                                
                                <div class="col-3 pl-4">
                                    <h6 class="mb-3">نسبة الإنجاز</h6>
                                    <span class="h2 mr-3"><i class="fa fa-spinner text-primary h1 mb-0 mr-2"></i>
                                        <span>{{$progress}}%</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-body">
                            <div>
                                <h3 class="float-left mb-1">البرامج التدريبية بالمشروع</h3>
                                @if($role == 'project_manager')
                                    <a href="{{route('create_course')}}" id="btn-add-course" class="btn btn-sm btn-primary btn-fix float-right mb-2"><span class="btn-icon"><i class="ti-plus"></i>أضف برنامج جديد</span></a>
                                @endif
                                @if($role == 'admin' || $role == 'accountant')
                                    <a href="{{route('course.export', $project->id)}}" id="btn-add-course" class="btn btn-sm btn-primary btn-fix float-right mb-2 mr-2"><span class="btn-icon"><i class="la la-file-excel-o"></i>تصدير</span></a>
                                @endif
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="coursesTable">
                                    <thead class="thead-default thead-lg">
                                        <tr>
                                            <th class="text-center">الرقم</th>
                                            <th>البرنامج التدريبي</th>
                                            <th>الحالة</th>
                                            <th>إسم المشروع ( العقد )</th>
                                            <th>مؤشر الإنجاز</th>
                                            <th>تاريخ التنفيذ</th>
                                            <th class="text-center">الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $item)                                            
                                            <tr>
                                                <input type="hidden" class="description" name="description" value="{{$item->description}}">
                                                <td class="text-center">{{$loop->index +1}}</td>
                                                <td class="name">{{$item->name}}</td>
                                                <td class="status" data-value="{{$item->status}}">
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-primary badge-pill">جديد</span>
                                                    @elseif ($item->status == 2)
                                                        <span class="badge badge-secondary badge-pill">قيد العمل</span>
                                                    @elseif ($item->status == 3)
                                                        <span class="badge badge-info badge-pill">متوقف</span>
                                                    @elseif ($item->status == 4)
                                                        <span class="badge badge-success badge-pill">مكتمل</span>
                                                    @endif
                                                </td>
                                                <td class="project" data-value="{{$item->project_id}}">@isset($item->project->name){{$item->project->name}}@endisset</td>
                                                <td class="prog" data-value="{{$item->progress}}">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$item->progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$item->progress}}%;">{{$item->progress}}%</div>
                                                    </div>
                                                </td>
                                                <td class="due_to">{{$item->due_to}}</td>
                                                <td class="text-center py-1">
                                                    @if($role == 'admin' || $role == 'project_manager')
                                                        <a href="#" data-id="{{$item->id}}" class="btn btn-sm btn-pink btn-fix btn-edit"><span class="btn-icon text-white"><i class="la la-edit"></i>تعديل</span></a> 
                                                        {{-- <a href="{{route('course.delete', $item->id)}}" class="btn btn-sm btn-danger btn-fix" onclick="return window.confirm('Are you sure?')"><span class="btn-icon text-white"><i class="la la-trash"></i>حذف</span></a>  --}}
                                                    @endif
                                                    <a href="{{route('course.detail', $item->id)}}" class="btn btn-sm btn-info btn-fix btn-manage"><span class="btn-icon text-white"><i class="la la-pencil"></i>إدارة</span></a>                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">أعضاء المشروع</div>
                        </div>
                        <div class="ibox-body">
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;"><ul class="media-list media-list-divider mr-2 scroller">
                                <li class="media align-items-center py-1">
                                    <a class="media-img" href="javascript:;">
                                        <img class="img-circle" src="@if (isset($project->user->picture)){{asset($project->user->picture)}} @else {{asset('images/avatar128.png')}} @endif" alt="image" width="45">
                                    </a>
                                    <div class="media-body d-flex align-items-center">
                                        <div class="flex-1">
                                            <div class="media-heading">{{$project->user->name}}</div><small class="text-muted"><a href="mailto:{{$project->user->email}}">{{$project->user->email}}</a></small></div>
                                        <span class="badge badge-primary badge-pill">مدير المشروع </span>
                                    </div>
                                </li>
                                @foreach ($project_members as $member)
                                    <li class="media align-items-center py-1">
                                        <a class="media-img" href="javascript:;">
                                            <img class="img-circle" src="@if (isset($member->picture)){{asset($member->picture)}} @else {{asset('images/avatar128.png')}} @endif" alt="image" width="45">
                                        </a>
                                        <div class="media-body d-flex align-items-center">
                                            <div class="flex-1">
                                                <div class="media-heading">{{$member->name}}</div><small class="text-muted"><a href="mailto:{{$member->email}}">{{$member->email}}</a></small></div>
                                            <span class="badge badge-success badge-pill">منسق البرنامج</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul><div class="slimScrollBar" style="background: rgb(113, 128, 143); width: 4px; position: absolute; top: 28px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 552.381px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.9; z-index: 90; right: 1px;"></div></div>
                        </div>
                    </div>

                    
                    
                </div>
            </div>
        </div>  
        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('course.edit')}}" method="post" id="edit_form">
                        @csrf
                        <input type="hidden" class="id" name="id" />
                        <div class="modal-header">
                            <h4 class="modal-title">تعديل البرنامج</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label text-right mt-1">إسم البرنامج التدريبي<span class="text-danger">*</span></label>
                                <input class="form-control name" type="text" name="name" id="edit_name" placeholder="Name" readonly required>
                                <span id="name_error" class="invalid-feedback">
                                    <strong></strong>
                                </span>
                            </div>
    
                            <div class="form-group">
                                <label class="control-label text-right mt-1">محتوى البرنامج<span class="text-danger">*</span></label>
                                <textarea class="form-control description" name="description" id="edit_description" rows="4" placeholder="Description" required></textarea>
                                <span id="email_error" class="invalid-feedback">
                                    <strong></strong>
                                </span>
                            </div>
    
                            <div class="form-group">
                                <label class="control-label text-right mt-1">تاريخ التنفيذ<span class="text-danger">*</span></label>
                                <div class="input-group date">
                                    <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                    <input class="form-control due_to" type="text" name="due_to" id="edit_due_to" autocomplete="off" />
                                </div>
                                <span id="due_to_error" class="invalid-feedback">
                                    <strong></strong>
                                </span>
                            </div>

                            <div class="form-group">
                                <label>نسبة الإنجاز</label>
                                <input class="form-control progress" name="progress" type="text">
                            </div>
                        </div>
                        
                        <div class="modal-footer">    
                            <button type="submit" class="btn btn-primary">حفظ</button>                       
                            <button type="button" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>       
        <!-- END PAGE CONTENT-->
        @include('layouts.footer')        
    </div>
@endsection

@section('script')

    <script src="{{asset('master/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('master/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>    
    <script src="{{asset('master/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script>
        $(document).ready(function(){

            $('#add_due_to').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "yyyy-mm-dd"
            });

            $("#btn-add").click(function(){
                $("#addModal").modal();
            });


            $(".btn-edit").click(function(){
                let id = $(this).data('id');
                let name = $(this).parents('tr').find('.name').text().trim();
                let description = $(this).parents('tr').find('.description').val().trim();
                let due_to = $(this).parents('tr').find('.due_to').text().trim();
                let progress = $(this).parents('tr').find('.prog').data('value');

                $("#edit_form .id").val(id);
                $("#edit_form .name").val(name);
                $("#edit_form .description").val(description);
                $("#edit_form .due_to").val(due_to);
                $("#edit_form .progress").val(progress);
                $
                
                ("#editModal").modal();
            });

            $("form .progress").TouchSpin({
                min: 0,
                max: 100,
                step: 1,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%',
            });
        });
    </script>
@endsection