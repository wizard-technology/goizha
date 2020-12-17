@extends("admin.layouts.app")

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title float-right">نمرە</h4>
            <div class="btn-group">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row justify-content-end" style="width: 100%">
                    <h2 class="mt-0 header-title font-20">گەڕان</h2>
                </div>
                <div class="row justify-content-end">
                    <p class="text-muted font-20 mr-4">
                        تکایە هەنگاو بە هەنگاو زانیاریەکان هەڵبژێرە و پڕیکەرەوە
                    </p>
                </div>
                <div class="general-label">
                <form class="form-horizontal" method="GET" action="{{route('print.kart')}}">
                        <div class="form-group row justify-content-end">

                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">خول:</label>
                                <select class="form-control" style="text-align: right" name="round" disabled id="round">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>خول</option>
                                    <option dir="rtl" class="font-20" value="1">یەک</option>
                                    <option dir="rtl" class="font-20" value="2">دوو</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ساڵی
                                    ئەکادیمی:</label>
                                <select class="form-control" style="text-align: right" name="year" disabled id="year">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>ساڵی ئەکادیمی</option>
                                    @foreach ($year as $key=>$value)
                                    <option dir="rtl" class="font-20" value="{{$value->id}}">{{$value->y_year}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">وەرز:</label>
                                <select class="form-control" style="text-align: right" name="semester"  disabled id="semester">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>وەرز</option>
                                    <option dir="rtl" class="font-20" value="1">یەک</option>
                                    <option dir="rtl" class="font-20" value="2">دوو</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">قۆناغ:</label>
                                <select class="form-control" style="text-align: right" name="stage" disabled id="stage">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>قۆناغ</option>
                                    <option dir="rtl" class="font-20" value="1">یەک</option>
                                    <option dir="rtl" class="font-20" value="2">دوو</option>
                                    <option dir="rtl" class="font-20" value="3">سێ</option>
                                    <option dir="rtl" class="font-20" value="4">چوار</option>
                                    <option dir="rtl" class="font-20" value="5">پێنج</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">بەش:</label>
                                <select class="form-control" style="text-align: right" name="department" id="department">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>بەش</option>
                                    @foreach ($department as $key=>$value)
                                    <option dir="rtl" class="font-20" value="{{$value->id}}">{{$value->d_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-2">
                                @csrf
                                <br>
                                <button type="submit" style="text-align: right" class="btn btn-lg btn-secondary">کارت</button>
                                {{-- <button style="text-align: right" class="btn btn-lg btn-primary">مینیشیت</button>
                                <button style="text-align: right" class="btn btn-lg btn-primary">ماستەرشیت</button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.js"
    integrity="sha512-UNbeFrHORGTzMn3HTt00fvdojBYHLPxJbLChmtoyDwB6P9hX5mah3kMKm0HHNx/EvSPJt14b+SlD8xhuZ4w9Lg=="
    crossorigin="anonymous"></script>
<script>
    $("#department").on("change",function (e) {
          $("#stage").removeAttr( "disabled" );
          $("#stage").val(0);
          $("#semester").val(0);
          $("#year").val(0);
          $("#round").val(0);

          $('#course option').remove();
                    var x = new Option("وانە", "0");
                    x.selected;
                    x.disabled;
                    $("#course").append(x);
    });
    $("#stage").on("change",function (e) {
          $("#semester").removeAttr( "disabled" );
          $("#semester").val(0);
          $("#year").val(0);
          $("#round").val(0);

          $('#course option').remove();
                    var x = new Option("وانە", "0");
                    x.selected;
                    x.disabled;
                    $("#course").append(x);
    });
    $("#semester").on("change",function (e) {
          $("#year").removeAttr( "disabled" );
          $("#year").val(0);
          $("#round").val(0);

          get($("#department").val(),$("#stage").val(),$("#semester").val());
          $('#course option').remove();
                    var x = new Option("وانە", "0");
                    x.selected;
                    x.disabled;
                    $("#course").append(x);
        
    });
    $("#year").on("change",function (e) {
          $("#round").removeAttr( "disabled" );
          $("#round").val(0);
    });
</script>

@endsection