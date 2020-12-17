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
                    <div class="form-horizontal">
                        <form class="form-group row justify-content-end" method="GET"
                            action="{{route('degree.search')}}">
                            @csrf
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">خول:</label>
                                <select class="form-control" style="text-align: right" name="xwl_old" disabled
                                    id="round">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>خول</option>
                                    <option dir="rtl" class="font-20" value="1">یەک</option>
                                    <option dir="rtl" class="font-20" value="2">دوو</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ساڵی
                                    ئەکادیمی:</label>
                                <select class="form-control" style="text-align: right" name="sall_old" disabled
                                    id="year">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>ساڵی ئەکادیمی</option>
                                    @foreach ($year as $key=>$value)
                                    <option dir="rtl" class="font-20" value="{{$value->id}}">{{$value->y_year}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">وانە:</label>
                                <select class="form-control" style="text-align: right" name="wana_old" disabled
                                    id="course">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>وانە</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">وەرز:</label>
                                <select class="form-control" style="text-align: right" name="warz_old" disabled
                                    id="semester">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>وەرز</option>
                                    <option dir="rtl" class="font-20" value="1">یەک</option>
                                    <option dir="rtl" class="font-20" value="2">دوو</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">قۆناغ:</label>
                                <select class="form-control" style="text-align: right" name="qonagh_old" disabled
                                    id="stage">
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
                                <select class="form-control" style="text-align: right" name="bash_old" id="department">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>بەش
                                    </option>
                                    @foreach ($department as $key=>$value)
                                    <option dir="rtl" class="font-20" value="{{$value->id}}">{{$value->d_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <p></p>
                                <br>
                                <button id="search" type="submit" style="text-align: right"
                                    class="btn btn-lg btn-primary">گەڕان</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-body">
                @include('admin.layouts.message')
                <div class="row justify-content-end" style="width: 100%">
                    <h2 class="mt-0 header-title font-20">داغڵکردنی نمرە</h2>
                </div>
                <div class="row justify-content-end">
                    <p class="text-muted font-20 mr-4">
                        تکایە ئاگاداری بەکارهێنانی ئەم خشتەیەبە لەکاتی پڕکردنەوەی
                    </p>
                </div>

                <div class="row row justify-content-end">
                    <div class="col-sm-3">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ڕێژەی تاقیکردنەوەی
                            کۆتای:</label>
                        <input type="number" name="" value="60" max="100" min="0" id="rezha">

                    </div>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive "
                    style="border-collapse: collapse !important; border-spacing: 0 !important; width: 100% !important; ">
                    <thead>
                        <tr>
                            <th style="text-align: right;">خول</th>
                            <th style="text-align: right;">کۆتای</th>
                            <th style="text-align: right;">
                                قەرار
                                <div class="form-group ml-2">
                                    <div class="custom-control custom-checkbox">
                                        <button type="button" class="btn btn-primary" id="input-alert">پێدانی نمرەی قەرار</button>
                                    </div>
                                </div>
                            </th>
                            <th style="text-align: right;">
                                ٤٩
                                <div class="form-group ml-2">
                                    <div class="custom-control custom-checkbox">
                                        <button type="button" class="btn btn-primary" id="sa-warning">پێدانی
                                            نمرە</button>
                                    </div>
                                </div>
                            </th>
                            <th style="text-align: right;">تێبینی</th>
                            <th style="text-align: right;">نمرەکانی لە ١٠٠</th>
                            <th style="text-align: right;">نمرەکانی لە ١٠٠</th>
                            <th style="text-align: right;">نمرەی تاقیکردنەوەی کۆتای</th>
                            <th style="text-align: right;">نمرەی تاقیکردنەوەی کۆتای</th>
                            <th style="text-align: right;">تێکڕای نمرەی ڕۆژانە</th>
                            <th style="text-align: right;">تێکڕای نمرەی ڕۆژانە</th>
                            <th style="text-align: right;">ناو</th>
                            <th style="text-align: right;">#</th>
                        </tr>
                    </thead>

                    @foreach ($data as $key=>$value)
                    @if (isset($old['xwl_old']))
                    @if ($old['xwl_old'] == 1)
                    <tr
                        style="color: {{$value->dg_all_x1 +$value->dg_49_x1 + $value->dg_bryar_x1 < 50 ? 'red':'black'}}">
                        <td
                            style="text-align: right;color:{{$value->dg_all_x1 + $value->dg_49_x1 + $value->dg_bryar_x1 < 50 ? 'red':'black'}}">
                            {{isset($old['xwl_old']) ? $old['xwl_old'] == 1 ? 'یەکەم' : 'دووەم' : 'یەکەم'   }}</td>
                        <td style="text-align: right">
                            {{$value->dg_bryar_x1 + $value->dg_49_x1 +$value->dg_all_x1}}
                        </td>
                        <td style="text-align: right;color: {{$value->dg_bryar_x1 > 0 ? 'orange':'black'}}">{{$value->dg_bryar_x1}}</td>
                        <td style="text-align: right;color: {{$value->dg_49_x1 == 1 ? 'blue':'black'}}">
                            {{$value->dg_49_x1}}</td>
                        <td style="text-align: right">{{isset($value->report) ? $value->report->r_report :'نییە'}}</td>
                        <td style="text-align: right;color: {{$value->dg_all_x1 < 50 ? 'red':'black'}}">
                            {{$value->dg_all_text_x1  ?? 'صفر'}}</td>
                        <td style="text-align: right;color: {{$value->dg_all_x1 < 50 ? 'red':'black'}}">
                            {{$value->dg_all_x1}}</td>
                        <td style="text-align: right">{{$value->dg_degree_final_text_x1 ?? 'صفر'}}</td>
                        <td style="text-align: right">{{$value->dg_degree_final_x1}}</td>
                        <td style="text-align: right">{{$value->dg_degree_tekra_text }}</td>
                        <td style="text-align: right">{{$value->dg_degree_tekra}}</td>
                        <td style="text-align: right">{{$value->student->s_fullname}}</td>
                        <td style="text-align: right">{{++$key}}</td>
                    </tr>
                    @else
                    @isset($value->degreex2)

                    <tr style="color: {{$value->degreex2->dg_all_x2  +$value->degreex2->dg_49_x2 + $value->degreex2->dg_bryar_x2 < 50 ? 'red':'black'}}">
                        <td style="text-align: right">
                            {{isset($old['xwl_old']) ? $old['xwl_old'] == 1 ? 'یەکەم' : 'دووەم' : 'یەکەم'   }}</td>
                        <td style="text-align: right">
                            {{$value->degreex2->dg_bryar_x2 + $value->degreex2->dg_49_x2 +$value->degreex2->dg_all_x2}}
                        </td>
                        <td style="text-align: right;color: {{$value->degreex2->dg_bryar_x2 > 0 ? 'orange':'black'}}">
                            {{$value->degreex2->dg_bryar_x2}}</td>
                        <td style="text-align: right;color: {{$value->dg_49_x2 == 1 ? 'blue':'black'}}">
                            {{$value->degreex2->dg_49_x2}}</td>
                        <td style="text-align: right">
                            {{isset($value->degreex2->report) ? $value->degreex2->report->r_report :'نییە'}}</td>
                        <td style="text-align: right;color: {{$value->dg_all_x2 < 50 ? 'red':'black'}}">
                            {{$value->degreex2->dg_all_text_x2 ?? 'صفر'}}</td>
                        <td style="text-align: right;color: {{$value->dg_all_x2 < 50 ? 'red':'black'}}">
                            {{$value->degreex2->dg_all_x2}}</td>
                        <td style="text-align: right">
                            {{$value->degreex2->dg_degree_final_text_x2 ?? 'صفر'}}</td>
                        <td style="text-align: right">
                            {{$value->degreex2->dg_degree_final_x2}}</td>
                        <td style="text-align: right">
                            {{$value->dg_degree_tekra_text}}</td>
                        <td style="text-align: right">
                            {{$value->dg_degree_tekra}}</td>
                        <td style="text-align: right">
                            {{$value->student->s_fullname}}</td>
                        <td style="text-align: right">
                            {{++$key}}</td>
                    </tr>
                    @endisset
                    @endif
                    @else
                    <tr
                        style="color: {{$value->dg_all_x1 +$value->dg_49_x1 + $value->dg_bryar_x1 < 50 ? 'red':'black'}}">
                        <td style="text-align: right;color:">
                            {{isset($old['xwl_old']) ? $old['xwl_old'] == 1 ? 'یەکەم' : 'دووەم' : 'یەکەم'}}</td>
                        <td style="text-align: right">{{$value->dg_bryar_x1 + $value->dg_49_x1 +$value->dg_all_x1}}</td>
                        <td style="text-align: right;color: {{$value->dg_bryar_x1 > 0 ? 'orange':'black'}}">{{$value->dg_bryar_x1}}</td>
                        <td style="text-align: right;color: {{$value->dg_49_x1 == 1 ? 'blue':'black'}}">{{$value->dg_49_x1}}</td>
                        <td style="text-align: right">{{isset($value->report) ? $value->report->r_report :'نییە'}}</td>
                        <td style="text-align: right">{{$value->dg_all_text_x1  ?? 'صفر'}}</td>
                        <td style="text-align: right">{{$value->dg_all_x1}}</td>
                        <td style="text-align: right">{{$value->dg_degree_final_text_x1 ?? 'صفر'}}</td>
                        <td style="text-align: right">{{$value->dg_degree_final_x1}}</td>
                        <td style="text-align: right">{{$value->dg_degree_tekra_text }}</td>
                        <td style="text-align: right">{{$value->dg_degree_tekra}}</td>
                        <td style="text-align: right">{{$value->student->s_fullname}}</td>
                        <td style="text-align: right">{{++$key}}</td>
                    </tr>
                    @endif
                    @endforeach
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
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
          $("#course").removeAttr( "disabled" );
          $("#year").val(0);
          $("#round").val(0);

          get($("#department").val(),$("#stage").val(),$("#semester").val());
          $('#course option').remove();
                    var x = new Option("وانە", "0");
                    x.selected;
                    x.disabled;
                    $("#course").append(x);
        
    });
    $("#course").on("change",function (e) {
          $("#year").removeAttr( "disabled" );
          $("#year").val(0);
          $("#round").val(0);

    });
    $("#year").on("change",function (e) {
          $("#round").removeAttr( "disabled" );
          $("#round").val(0);
    });
  

    function get(dep,stg,sem) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
                url: "http://{{request()->getHost()}}/courses/get",
                method: "POST",
                dataType: 'json', 
                data:
                {
                    'department': dep,
                    'stage': stg,
                    'semester': sem,
                },
                success: function(result){
                    result.forEach(element => {
                        /// jquerify the DOM object 'o' so we can use the html method
                        // $(o).html("option text");
                        var o = new Option(element.c_name, element.id);
                        $("#course").append(o);
                    console.log();
                    });
                },
            });
           
    }
    
    function onchangeInput6040(id) {
    
       var x40 = document.getElementById('dg-degree-40-'+id);
       var x60 = document.getElementById('dg-degree-60-'+id);
       if(x40.value != "NaN" || x60.value != "NaN"){
        document.getElementById('dg-degree-100-'+id).value = parseInt( x40.value) + parseInt( x60.value); 
       }
    }
    function num49To50() {
     
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
                url: "http://{{request()->getHost()}}/student/to50",
                method: "POST",
                dataType: 'json', 
                data:
                {
                    'department': '{{$old["bash_old"] ?? null}}',
                    'course': '{{$old["wana_old"] ?? null}}',
                    'stage': '{{$old["qonagh_old"] ?? null}}',
                    'semester': '{{$old["warz_old"] ?? null}}',
                    'year': '{{$old["sall_old"] ?? null}}',
                    'round': '{{$old["xwl_old"] ?? null}}',
                },
                success: function(result){
                    swal(
                        'سەرکەوتوبوو',
                        'بەسەرکەوتووی ١ نمرە درا بە خوێنکارەکان',
                        'success',);
                        console.log(result);
                },
                error:  function(xhr, status, error){
                    swal(
                        'سەرکەوتونەبوو',
                        'تکایە دڵنیا بەرەوە لە هەڵبژاردنەکانت',
                        'error',
                    );
                },
            });
    }
    function qararNums(n){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
                url: "http://{{request()->getHost()}}/student/qarar",
                method: "POST",
                dataType: 'json', 
                data:
                {
                    'department': '{{$old["bash_old"] ?? null}}',
                    'course': '{{$old["wana_old"] ?? null}}',
                    'stage': '{{$old["qonagh_old"] ?? null}}',
                    'semester': '{{$old["warz_old"] ?? null}}',
                    'year': '{{$old["sall_old"] ?? null}}',
                    'round': '{{$old["xwl_old"] ?? null}}',
                    'qarar': n,
                },
                success: function(result){
                    swal(
                        'سەرکەوتوبوو',
                        'بەسەرکەوتووی '+n+' نمرە درا بە خوێنکارەکان',
                        'success',);
                        console.log(result);
                },
                error:  function(xhr, status, error){
                    swal(
                        'سەرکەوتونەبوو',
                        'تکایە دڵنیا بەرەوە لە هەڵبژاردنەکانت',
                        'error',
                    );
                },
            });
    }
</script>

@endsection