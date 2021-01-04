<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title></title>
    <meta content="Cargo Master Database Management System" name="description" />
    <meta content="Wizard.Tech" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset("apple-icon-57x57.png")}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset("apple-icon-60x60.png")}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset("apple-icon-72x72.png")}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("apple-icon-76x76.png")}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset("apple-icon-114x114.png")}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset("apple-icon-120x120.png")}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset("apple-icon-144x144.png")}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset("apple-icon-152x152.png")}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("apple-icon-180x180.png")}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset("android-icon-192x192.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("favicon-96x96.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("favicon-16x16.")}}">
    <link rel="manifest" href="{{asset("manifest.json")}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset("ms-icon-144x144.png")}}">
    <meta name="theme-color" content="#ffffff">

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <style>
        @font-face {
            src: url('{{asset("assets/fonts/Kjino.ttf")}}');
            font-family: test
        }

        body {
            font-family: test !important;
            -webkit-print-color-adjust: exact !important;
            font-size: 30px;
            height: 100%;
        }

        .orage-header {
            background-color: rgb(214, 214, 214) !important;
            color: #000 !important;
            font-weight: bold !important;
        }

        .main-table>tr {
            border-bottom: 1px solid #DDD !important;
        }

        .main-table {
            font-size: 20px;

        }

        /*
        .main-table>tr:nth-of-type(odd) {
            background-color: #F2F2F2 !important;
        } */

        /* .print {
            page-break-after: always;
        } */
    </style>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</head>

<body>

    @if ($round == 1)
    <div class="container print">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class=" p-0">
                        <div class="row pt-3">
                            <div class="col-sm-5 text-left px-5">
                                <p class="px-3">{{$year->y_year}}</p>
                                <p class="px-3">قۆناغی {{toTextTH($stage)}}</p>
                                <p class="px-3">یەکە {{$course->c_unit}}</p>
                            </div>
                            <div class="col-sm-2 align-items-center">
                                <center> <img src="{{asset("lg.png")}}" height="200px" width="200px" class="img-fluid">
                                </center>
                            </div>
                            <div class="col-sm-5 text-right px-5">
                                <p class="px-3">کۆلێجی زانکۆی گۆیژە</p>
                                <p class="px-3">بەش: {{$course->department->d_name}}</p>
                                <p class="px-3">{{$course->c_name}}</p>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-sm-12 text-center">
                                <p>ڕاپۆرتی وردبینی نمرەکان وەرزی {{toTextTH($semester)}} خولی {{toTextTH($round)}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row px-5 pt-2">
                            <div class="col-md-12">
                                <table style="width: 100%; border-collapse: collapse; margin-bottom: 1rem">
                                    <thead>
                                        <tr style="height: 40px !important" class="orage-header">
                                            <th class="border-0 text-uppercase small" style="text-align:center;">کۆی
                                                گشتی
                                            </th>
                                            <th class="border-0 text-uppercase small" style="text-align:center;">نمرەی
                                                زیادە
                                            </th>
                                            <th class="border-0 text-uppercase small" style="text-align:center;">نمرەی
                                                بریار
                                            </th>
                                            <th class="border-0 text-uppercase small" style="text-align:center;">کۆتای
                                                وەرز
                                            </th>
                                            <th class="border-0 text-uppercase small" style="text-align:center;">نیوەی
                                                وەرز
                                            </th>
                                            <th class="border-0 text-uppercase small" style="text-align:center;">ناوی
                                                خوێندکار
                                            </th>
                                            <th class="border-0 text-uppercase small p-2" style="text-align:center;">
                                                زنجیرە
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="main-table">
                                        @foreach ($data as $zhm=>$item)
                                        <tr style="height: 40px !important">
                                            <td style="text-align:center;">{{$item->dg_all_x1}}</td>
                                            <td style="text-align:center;">
                                                {{$item->dg_49_x1 == 0 ? '': $item->dg_49_x1}}</td>
                                            <td style="text-align:center;">
                                                {{$item->dg_bryar_x1== 0 ? '': $item->dg_bryar_x1}}</td>
                                            <td style="text-align:center;">{{$item->dg_degree_final_x1}}</td>
                                            <td style="text-align:center;">{{$item->dg_degree_tekra}}</td>
                                            <td style="text-align:center;">{{$item->student->s_fullname}}</td>
                                            <td style="text-align:center;">{{++$zhm}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br clear="all" style="page-break-before:always" />
        @endif
        <script>
            window.print();
        
        </script>
</body>

</html>