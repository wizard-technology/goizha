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
    @foreach ($data as $key=>$value)
    @if ($round == 1)
    <div class="container print">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row pt-3">
                            <div class="col-sm-4 text-right px-5">
                                <p class="px-3">وەرز : {{$semester}}</p>
                                <p class="px-3">خول : {{$round}}</p>
                                <p class="px-3">قۆناغ : {{$stage}}</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="{{asset("lg.png")}}" class="img-fluid">
                            </div>
                            <div class="col-sm-4 text-right px-5">
                                <p class="px-3">کۆلێجی زانکۆی گۆیژە</p>
                                <p class="px-3">بۆ دیراساتی ئاینیی</p>
                                <p class="px-3">بەش: {{$value->department->d_name}}</p>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-sm-12 text-center">
                                <p>ئەنجامی تاقیکردنەوەی کۆتایی ساڵی خوێندن {{$value->year->y_year}}</p>
                            </div>
                        </div>


                        <div class="row py-0 px-5 pt-1">
                            <div class="col-md-6">
                                <table class="text-left">
                                    <tr>
                                        <td class="p-1">{{$value->id}}</td>
                                        <td class="p-1" style="background-color: #577C6BAA;color: white;">:کۆد </td>
                                    </tr>

                                </table>
                            </div>

                            <div class="col-md-6 text-right">
                                <table class="text-right">
                                    <tr class="text-right" style="">
                                        <td class="p-1" style="width: %90 !important">{{$value->s_fullname}}</td>
                                        <td class="p-1" style="background-color: #577C6BAA;color: white">:ناوی خوێندکار
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="row px-5 pt-2">
                            <div class="col-md-12">
                                <table style="width: 100%; border-collapse: collapse; margin-bottom: 1rem">
                                    <thead>
                                        <tr style="height: 100px !important" class="orage-header">
                                            <th class="border-0 text-uppercase small" style="text-align:center;">ئاست
                                            </th>
                                            <th class="border-0 text-uppercase small" style="text-align:center;">بابەت
                                            </th>
                                            <th class="border-0 text-uppercase small p-2" style="text-align:center;">ژ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="main-table">
                                        @foreach ($value->degreeAll as $zhm=>$item)
                                        <tr style="height: 100px !important">
                                            <td style="text-align:center;">
                                                {{setRange($item->dg_bryar_x1+$item->dg_all_x1+$item->dg_49_x1)}}
                                            </td>
                                            <td style="text-align:center;">{{$item->course->c_name}}</td>
                                            <td style="text-align:center;">{{++$zhm}}</td>
                                        </tr>
                                        @endforeach
                                        {{-- @foreach ($value->degree1->degree2 as $item)
                                           
                                       @endforeach --}}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row  px-5">
                            <div class="col-6 text-left pl-5">لیژنەی تاقیکردنەوەکان</div>
                            <div class="col-6 text-right">ئەنجام : دەرچووە</div>
                        </div>
                        <br>
                        <br>
                        <div class="row px-5">
                            <div class="col-2 text-right"></div>
                            <div class="col-10 text-right">تێبینی: ئەم بەڵگەنامەیە بۆ هیچ مەبەستێکی فەرمی بەکارنایەت
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br clear="all" style="page-break-before:always" />
    @endif
    @if ($round == 2)
    @if (is_null($value->degreex2))
<div  id="krt-{{$value->id}}">

<div class="container print">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row pt-3">
                            <div class="col-sm-4 text-right px-5">
                                <p class="px-3">وەرز : {{$semester}}</p>
                                <p class="px-3">خول : {{$round}}</p>
                                <p class="px-3">قۆناغ : {{$stage}}</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="{{asset("lg.png")}}" class="img-fluid">
                            </div>
                            <div class="col-sm-4 text-right px-5">
                                <p class="px-3">کۆلێجی زانکۆی گۆیژە</p>
                                <p class="px-3">بۆ دیراساتی ئاینیی</p>
                                <p class="px-3">بەش: {{$value->department->d_name}}</p>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-sm-12 text-center">
                                <p>ئەنجامی تاقیکردنەوەی کۆتایی ساڵی خوێندن {{$value->year->y_year}}</p>
                            </div>
                        </div>


                        <div class="row py-0 px-5 pt-1">
                            <div class="col-md-6">
                                <table class="text-left">
                                    <tr>
                                        <td class="p-1">{{$value->id}}</td>
                                        <td class="p-1" style="background-color: #577C6BAA;color: white;">:کۆد </td>
                                    </tr>

                                </table>
                            </div>

                            <div class="col-md-6 text-right">
                                <table class="text-right">
                                    <tr class="text-right" style="">
                                        <td class="p-1" style="width: %90 !important">{{$value->s_fullname}}</td>
                                        <td class="p-1" style="background-color: #577C6BAA;color: white">:ناوی خوێندکار
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="row px-5 pt-2">
                            <div class="col-md-12">
                                <table style="width: 100%; border-collapse: collapse; margin-bottom: 1rem">
                                    <thead>
                                        <tr style="height: 100px !important" class="orage-header">
                                            <th class="border-0 text-uppercase small" style="text-align:center;">ئاست
                                            </th>
                                            <th class="border-0 text-uppercase small" style="text-align:center;">بابەت
                                            </th>
                                            <th class="border-0 text-uppercase small p-2" style="text-align:center;">ژ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="main-table">
                                            @php
                                                $count = 0;
                                            @endphp
                                        @foreach ($value->degreeAll as $zhm=>$item)
                                        @php
                                                $count ++;
                                            @endphp
                                        <tr style="height: 100px !important">
                                            <td style="text-align:center;">
                                                {{setRange($item->degreex2->dg_bryar_x2+$item->degreex2->dg_all_x2+$item->degreex2->dg_49_x2)}}
                                            </td>
                                            <td style="text-align:center;">{{$item->course->c_name}}</td>
                                            <td style="text-align:center;">{{++$zhm}}</td>
                                        </tr>
                                        @endforeach
                                       @if ($count == 0)
                                           <script>
                                               $('#krt2-{{$value->id}}').remove();
                                               $('#krt-{{$value->id}}').remove();
                                           </script>
                                       @endif
                                    
                                        

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row  px-5">
                            <div class="col-6 text-left pl-5">لیژنەی تاقیکردنەوەکان</div>
                            <div class="col-6 text-right">ئەنجام : دەرچووە</div>
                        </div>
                        <br>
                        <br>
                        <div class="row px-5">
                            <div class="col-2 text-right"></div>
                            <div class="col-10 text-right">تێبینی: ئەم بەڵگەنامەیە بۆ هیچ مەبەستێکی فەرمی بەکارنایەت
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br clear="all" style="page-break-before:always" id="krt2-{{$value->id}}"/>
</div>
    

    @endif
    @endif

    @endforeach

    <script>
        window.print();
        
    </script>
</body>

</html>