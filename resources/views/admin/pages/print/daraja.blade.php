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
    <link rel="apple-touch-icon" sizes="    " href="{{asset("apple-icon-57x57.png")}}">
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
            background-color: #577C6BAA !important;
            color: #FFF !important;
            font-weight: bold !important;
        }

        .main-table>tr {
            border-bottom: 1px solid #DDD !important;
        }

        .main-table>tr:nth-of-type(odd) {
            background-color: #F2F2F2 !important;
        }

        .print {
            page-break-after: always;
        }
    </style>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-body">
                    @include('admin.layouts.message')
                    <br>
                    <table class="datatable-buttons table table-striped table-bordered dt-responsive "
                        style="border-collapse: collapse !important; border-spacing: 0 !important; width: 100% !important; "
                        id="table-nums">
                        <thead>
                            <tr>
                                <th style="text-align: right;">بە نوسین</th>
                                <th style="text-align: right;">ن. کۆتای</th>
                                <th style="text-align: right;">٤٩</th>
                                <th style="text-align: right;">بڕیار</th>
                                <th style="text-align: right;">بە نوسین</th>
                                <th style="text-align: right;">ن.ت. کۆتای</th>
                                <th style="text-align: right;">بە نوسین</th>
                                <th style="text-align: right;">ن.ت. ڕۆژانە</th>
                                <th style="text-align: right;">ناو</th>
                                <th style="text-align: right;">#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <script>
        window.print();
    </script>
</body>

</html>