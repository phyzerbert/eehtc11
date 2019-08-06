@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-header">
            <div class="ibox flex-1">
                <div class="ibox-body">
                    <div class="flexbox">
                        <div class="flexbox-b">
                            <div class="ml-5 mr-5">
                                <img class="img-circle" src="@if (isset(Auth::user()->picture)){{asset(Auth::user()->picture)}} @else {{asset('images/avatar128.png')}} @endif" alt="image" width="110" />
                            </div>
                            <div>
                                <h4>{{$user->name}}</h4>
                                <div>
                                    <span class="mr-3">
                                        <span class="badge badge-primary badge-circle mr-2 font-14" style="height:30px;width:30px;"><i class="ti-briefcase"></i></span>{{$user->role->name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-inline-flex">
                            @if ($user->role->slug == 'project_manager')
                                <div class="px-4 text-center">
                                    <div class="text-muted font-13">PROJECTS</div>
                                    <div class="h2 mt-2">{{$user->projects()->count()}}</div>
                                </div>
                            @elseif($user->role->slug == 'course_member')
                                <div class="px-4 text-center">
                                    <div class="text-muted font-13">COURSES</div>
                                    <div class="h2 mt-2">{{$user->courses()->count()}}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container page-content fade-in-up">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="ibox ibox-fullheight">
                        <div class="ibox-head">
                            <div class="ibox-title">بياناتي الشخصية</div>
                        </div>
                        <form class="form-info" action="{{route('save_profile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="ibox-body">
                                <div class="form-group mb-4">
                                    <label>الإسم</label>
                                    <input class="form-control" type="text" name="name" value="{{$user->name}}" placeholder="أضف الإسم الكامل">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>البريد الإلكتروني</label>
                                    <input class="form-control" type="email" name="email" value="{{$user->email}}" placeholder="أضف البريد الإلكتروني">
                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                                
                                <div class="form-group mb-4">
                                    <label>صورة شخصية</label>
                                    <input class="form-control form-control-sm" type="file" name="picture" accept="image/*" />
                                    @error('picture')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label>كلمة المرور</label>
                                    <input class="form-control" type="password" name="password" placeholder="كلمة المرور">
                                </div>                                
                                <div class="form-group mb-4">
                                    <label>كرر كلمة المرور</label>
                                    <input class="form-control" type="password" name="password-confirm" placeholder="أعد كتابة كلمة المرور">
                                </div>
                            </div>
                            <div class="ibox-footer text-right">
                                <button class="btn btn-secondary mr-2" type="reset">إلغاء</button>
                                <button class="btn btn-info" type="submit">أرسل</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
        <footer class="page-footer">
            <div class="font-13">2019 © <b>New Horizon Co.</b> </div>
            
            <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
        </footer>
    </div>
@endsection