<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link rel="stylesheet" href="{{ asset('master/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('master/css/main.css') }}">
    <style>
        @font-face {
            font-family: 'Your custom font name';
            src: url({{ storage_path('fonts\cairo.woff2') }}) format("truetype");
            font-weight: 400;
            font-style: normal;
        }
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>

<body style="background-color: white;">
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <div class="ibox-fullwidth-block py-5">
                    <table width="100%" style="width:100%" border="0">
                        <tbody>
                            <tr>
                                <td>
                                    <h1>{{config('app.name')}}</h1>
                                </td>
                                <td class="text-right">
                                    <p class="m-0 py-2">Requested Date: {{date('Y-m-d', strtotime($item->created_at))}}</p>
                                    <p class="m-0 py-2">Invoice Date: {{date('Y-m-d')}}</p>
                                    <p class="m-0 py-2">Email: @isset($item->user->email){{$item->user->email}}@endisset</p>
                                    <p class="m-0 py-2">Name: @isset($item->user->name){{$item->user->name}}@endisset</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="ibox-fullwidth-block">
                    <table class="table mb-4">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th class="pl-4">Company</th>
                                <th>Project</th>
                                <th>Course</th>
                                <th class="text-right pr-4">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pl-4">@isset($item->course->project->id){{$item->course->project->company->name}}@endisset</td>
                                <td>@isset($item->course->project){{$item->course->project->name}}@endisset</td>
                                <td>@isset($item->course->name){{$item->course->name}}@endisset</td>
                                <td class="text-right pr-4">{{$item->amount}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>