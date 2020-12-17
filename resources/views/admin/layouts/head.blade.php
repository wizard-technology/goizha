<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>UOG Dashboard</title>
    <meta content="University Of Goizha" name="description" />
    <meta content="Mhamad Kamaran" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- DataTables -->
    <link href="{{asset("assets/plugins/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/plugins/datatables/buttons.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/plugins/datatables/responsive.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" /> 
    {{-- <link href="{{asset("assets/plugins/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/plugins/datatables/buttons.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/plugins/datatables/responsive.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />  --}}
    <link href="{{asset("assets/plugins/sweet-alert2/sweetalert2.min.css")}}" rel="stylesheet" type="text/css">

    <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/plugins/animate/animate.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/icons.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/style.css")}}" rel="stylesheet" type="text/css">
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
    <style>
        @font-face{
            src: url('{{asset("assets/fonts/Kjino.ttf")}}');
            font-family: test
        }
        .paginate_button {
            margin: 0 !important;
            padding: 0 !important;
        }
        *{
            font-size: 20px;
        }
        @font-face{
            src: url('{{asset("assets/fonts/Kjino.ttf")}}');
            font-family: test
        }
        h1,h2,h3,h4,h5,h6,p,label,input,th,td,div{
            font-family: test !important
        }
        
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{asset("assets/js/jquery.min.js")}}"></script>

</head>