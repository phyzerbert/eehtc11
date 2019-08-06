@extends('layouts.master')
@section('style')    
    <link href="{{asset('master/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" />    
    <link href="{{asset('master/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('master/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
    @php
        $role = Auth::user()->role->slug;
    @endphp
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
<h1 class="page-title">أضف برنامج تدريبي</h1>
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="la la-home font-20"></i></a></li>
                <li class="breadcrumb-item">المشروع</li>
                <li class="breadcrumb-item">تفاصيل المشروع</li>
                <li class="breadcrumb-item">أضف برنامج تدريبي</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="ibox ibox-fullheight">
                        <div class="ibox-head">
                            <div class="ibox-title">برنامج تدريبي جديد</div>
                        </div>
                        <form class="form-horizontal" action="{{route('save_course')}}" method="POST">
                            @csrf
                            <div class="ibox-body">
                                <div class="form-group mb-4 row">
                                    <label class="col-sm-2 col-form-label">إسم البرنامج التدريبي<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="name" type="text" placeholder="أضف إسم البرنامج التدريبي كاملاً" autofocus required>
                                        @error('name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row">
                                    <label class="col-sm-2 col-form-label">المشروع<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="project_id" required>
                                            <option value="">اختر المشروع</option>
                                            @foreach ($projects as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('project_id')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row">
                                    <label class="col-sm-2 col-form-label">وصف البرنامج </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" placeholder="محتوى البرنامج" rows="5"></textarea>
                                    </div>
                                </div>                                
                                <div class="form-group mb-4 row">
                                    <label class="col-sm-2 col-form-label">تاريخ التنفيذ<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control due_to" name="due_to" type="text" value="{{date('Y-m-d')}}" autocomplete="off">
                                        @error('due_to')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4 row">
                                    <label class="col-sm-2 col-form-label">حالة البرنامج<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status">
                                            <option value="1">جديد</option>
                                            <option value="2">قيد العمل</option>
                                            <option value="3">متوقف</option>
                                            <option value="4">مكتمل</option>
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="form-group mb-4 row">
                                    <label class="col-sm-2 col-form-label">منسقي البرنامج</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="member_select" name="members[]" multiple="multiple">
                                            @foreach ($members as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>                                                
                                            @endforeach
                                        </select>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-footer row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button type="submit" class="btn btn-primary mr-2" type="button">ارسال</button>
                                    <button class="btn btn-secondary mr-2" type="reset">إعادة تعيين</button>
                                    <a href="javascript: history.go(-1)" class="btn btn-info">رجوع</a>
                                </div>
                            </div>
                        </form>
                    </div>                        
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
        @include('layouts.footer')        
    </div>

@endsection

@section('script')

    <script src="{{asset('master/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('master/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('master/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>    
    <script src="{{asset('master/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#member_select").select2();
            $('.due_to').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "yyyy-mm-dd"
            });
        });
    </script>
@endsection