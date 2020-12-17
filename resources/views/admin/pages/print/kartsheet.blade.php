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
                        <div class="form-group row justify-content-end">

                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">خول:</label>
                                <select class="form-control" style="text-align: right" disabled id="round">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>خول</option>
                                    <option dir="rtl" class="font-20" value="1">یەک</option>
                                    <option dir="rtl" class="font-20" value="2">دوو</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ساڵی
                                    ئەکادیمی:</label>
                                <select class="form-control" style="text-align: right" disabled id="year">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>ساڵی ئەکادیمی</option>
                                    @foreach ($year as $key=>$value)
                                    <option dir="rtl" class="font-20" value="{{$value->id}}">{{$value->y_year}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">وانە:</label>
                                <select class="form-control" style="text-align: right" disabled id="course">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>وانە</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">وەرز:</label>
                                <select class="form-control" style="text-align: right" disabled id="semester">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>وەرز</option>
                                    <option dir="rtl" class="font-20" value="1">یەک</option>
                                    <option dir="rtl" class="font-20" value="2">دوو</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label dir="rtl" class="mr-1 font-18"
                                    style="text-align:right;float: right; ">قۆناغ:</label>
                                <select class="form-control" style="text-align: right" disabled id="stage">
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
                                <select class="form-control" style="text-align: right" id="department">
                                    <option dir="rtl" class="font-20" value="0" disabled selected>بەش</option>
                                    @foreach ($department as $key=>$value)
                                    <option dir="rtl" class="font-20" value="{{$value->id}}">{{$value->d_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <p></p>
                                <br>
                                <button id="search" onclick="search()" style="text-align: right"
                                    class="btn btn-lg btn-primary">گەڕان</button>
                            </div>
                        </div>


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
                <button id="button-a" class="btn btn-warning">Excel</button>
                <br>
                @include('admin.layouts.message')
                <br>    
                <table class="datatable-buttons table table-striped table-bordered dt-responsive "
                    style="border-collapse: collapse !important; border-spacing: 0 !important; width: 100% !important; " id="table-nums">
                    <thead>
                        <tr>
                            <th style="text-align: right;">بە نوسین</th>
                            <th style="text-align: right;">ن. کۆتای</th>
                            <th style="text-align: right;">٤٩</th>
                            <th style="text-align: right;">بڕیار</th>
                            <th style="text-align: right;">بە نوسین</th>
                            <th style="text-align: right;">ن.ت. کۆتای</th>
                            <th style="text-align: right;">بە نوسین</th>
                            <th style="text-align: right;">نمرەی تێکڕا</th>
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
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.js" integrity="sha512-UNbeFrHORGTzMn3HTt00fvdojBYHLPxJbLChmtoyDwB6P9hX5mah3kMKm0HHNx/EvSPJt14b+SlD8xhuZ4w9Lg==" crossorigin="anonymous"></script>
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
    function search() {
        if( $("#round").val() == 1){
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         $.ajax({
                url: "http://{{request()->getHost()}}/student/get",
                method: "POST",
                dataType: 'json', 
                data:
                {
                    'department': $("#department").val(),
                    'stage': $("#stage").val(),
                    'semester': $("#semester").val(),
                    'course': $("#course").val(),
                    'year': $("#year").val(),
                    'round': $("#round").val(),
                },
                success: function(result){
                    $(".datatable-buttons > tbody").html("");
                    var counter =1;
                    var xvall = "";
                    var xv100 = "";
                    var xv60 = "";
                    var xv40 = "";
                    var xv100text = "";
                    var xv60text = "";
                    var xv40text = "";
                    var id_dgr = "";
                    var report_dg = 0;
                    var note = "";
                    var qarar = "";
                    var bryar = "";
                    result.forEach(element => {
                        if(!(element.degreex1 === null)){
                            console.log(element.degreex1 );
                             xv100 =element.degreex1.dg_all_x1 == 0 ?'': element.degreex1.dg_all_x1.toFixed();
                             xv60 = element.degreex1.dg_degree_final_x1== 0 ?'':element.degreex1.dg_degree_final_x1.toFixed();
                             xv40 = element.degreex1.dg_degree_tekra== 0 ?'':element.degreex1.dg_degree_tekra.toFixed();
                             xv100text = element.degreex1.dg_all_x1 == 0 ?'':element.degreex1.dg_all_text_x1 ;
                             xv60text = element.degreex1.dg_degree_final_x1== 0 ?'': element.degreex1.dg_degree_final_text_x1;
                             xv40text =  element.degreex1.dg_degree_tekra== 0 ?'': element.degreex1.dg_degree_tekra_text;
                             id_dgr = element.degreex1.id;
                             xvall = element.degreex1.dg_all_x1 + element.degreex1.dg_49_x1 +element.degreex1.dg_bryar_x1;
                             xvall_text = nums[xvall];
                             report_dg = element.degreex1.dg_report_x1 ?? 0;
                             note = element.degreex1.dg_note_x1 ?? "";
                             qarar = element.degreex1.dg_49_x1 == 0 ? '' :element.degreex1.dg_49_x1 ;
                            bryar = element.degreex1.dg_bryar_x1  == 0 ? '' :element.degreex1.dg_bryar_x1;
   
                        }else{
                            xvall = "";
                            xv100 = "";
                            xv60 = "";
                            xv40 = "";
                            xv100text = "";
                            xv60text = "";
                            xv40text = "";
                            qarar = "";
                            bryar = "";
                            note = "";
                            report_dg = 0;
                        }
                        $('.datatable-buttons > tbody:last-child').append(`
                        <tr>
                            <td style="text-align: right;">`+xvall_text+`</td>
                            <td style="text-align: right;">`+xvall+`</td>
                            <td style="text-align: right;">`+qarar+`</td>
                            <td style="text-align: right;">`+bryar+`</td>
                            <td style="text-align: right;">`+xv60text+`</td>
                            <td style="text-align: right;">`+xv60+`</td>
                            <td style="text-align: right;">`+xv40text+`</td>
                            <td style="text-align: right;">`+xv40+`</td>
                            <td style="text-align: right;">`+element.s_fullname+`</td>
                            <td style="text-align: right;">`+(counter++) +`</td>
                        </tr>
                        `);
                    });
                },
            });
        }
        if( $("#round").val() == 2){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "http://{{request()->getHost()}}/student/get",
                method: "POST",
                dataType: 'json', 
                data:
                {
                    'department': $("#department").val(),
                    'stage': $("#stage").val(),
                    'semester': $("#semester").val(),
                    'course': $("#course").val(),
                    'year': $("#year").val(),
                    'round': $("#round").val(),
                },
                success: function(result){
                    $(".datatable-buttons > tbody").html("");
                    var counter =1;
                    var xv100 = "";
                    var xv60 = "";
                    var xv40 = "";
                    var note = "";
                    var report_dg = 0;
                    var id_dgr = "";
                    result.forEach(element => {
                        if(!(element.degreex1 === null)){
                            if(!(element.degreex1.degreex2 === null)){
                            xv100 = element.degreex1.degreex2.dg_all_x2.toFixed();
                            xv60 = element.degreex1.degreex2.dg_degree_final_x2.toFixed();
                            report_dg = element.degreex1.degreex2.dg_report_x2 ?? 0;
                            note = element.degreex1.degreex2.dg_note_x2 ?? "";
                            }else{
                                xv100 = "";
                                xv60 = "";
                            report_dg = 0;
                            note = "";

                            }
                             xv40 = element.degreex1.dg_degree_tekra.toFixed();
                             id_dgr = element.degreex1.id;
                        }else{
                            xv100 = "";
                            xv60 = "";
                            xv40 = "";
                            report_dg = 0;
                            note = "";
                        }
                        if(!(element.degreex1 === null)){

                        $('.datatable-buttons > tbody:last-child').append(`
                        <tr>
                            <input type="hidden" value="`+element.id+`" id="id-`+counter+`">
                            <td style="text-align: right;"><button disabled onclick="save_two(this)" class="save_two btn btn-primary nums-btn" style="text-align: right;" type="button">خەزنکردن</button></td>
                            <td style="text-align: right;"><textarea disabled class="nums-tb" name="" id="" cols="10" rows="1">`+note+`</textarea></td>
                            <td style="text-align: right;">`+$("#round").val()+`</td>
                            <td style="text-align: right;">
                                <div>
                                <label dir="rtl" class="font-18"></label>
                                <select class="form-control nums-report" style="text-align: right" disabled id="dg-report-`+counter+`">
                                    <option dir="rtl" class="font-20" value="0"  selected>تێبینی خێرا</option>
                                    @foreach ($report as $k=>$vs)
                                    <option dir="rtl" class="font-20 nums-report" value="{{$vs->id}}">{{$vs->r_report}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </td>
                            <td style="text-align: right;"><input type="number" disabled class="nums-100" max="100" min="0"  onchange="resualt(`+counter+`)" name="" id="dg-degree-100-`+counter+`" value="`+xv100+`"></td>
                            <td style="text-align: right;"><input type="number" onclick="onchangeInput6040(`+counter+`)" disabled class="nums-60"  max="99" min="0"  name="" id="dg-degree-60-`+counter+`" value="`+xv60+`"></td>
                            <td style="text-align: right;"><input type="number" onclick="onchangeInput6040(`+counter+`)" disabled class="nums-40"  max="99" min="0" name="" id="dg-degree-40-`+counter+`" value="`+xv40+`"></td>
                            <td style="text-align: right;">`+element.s_fullname+`</td>
                            <input type="hidden" value="`+id_dgr+`" id="id-degree-`+counter+`">
                            <td style="text-align: right;">`+(counter++) +`</td>
                        </tr>
                        `);
                        var sll = document.getElementById('dg-report-'+(counter - 1));
                    
                        for (let i = 0; i <  sll.children.length; i++) {
                            sll.children[i].removeAttribute(sll.selectedIndex);
                            if(sll.children[i].value == report_dg){
                                sll.children[i].setAttribute("selected", "selected");
                                break;
                            }
                        }
                        }
                    });
                },
            });
        }
        
    }
    function resualt(index) {
        rezha = document.getElementById('rezha').value ;
        input = document.getElementById('dg-degree-100-'+index).value;
        document.getElementById('dg-degree-60-'+index).value = ((rezha / 100) * input).toFixed();
        document.getElementById('dg-degree-40-'+index).value = (((100 - rezha ) / 100) * input).toFixed();
    }
    function onchangeCheck(ch) {
        if(ch.id == 'num-tb'){
            if(ch.checked){
                col = document.getElementsByClassName('nums-tb');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = false;
                }
            }else{
                col = document.getElementsByClassName('nums-tb');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = true;
                }
            }
        }
        if(ch.id == 'num-100'){
            if(ch.checked){
                col = document.getElementsByClassName('nums-100');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = false;
                }
            }else{
                col = document.getElementsByClassName('nums-100');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = true;
                }
            }
        }
        if(ch.id == 'num-60'){
           if(ch.checked){
                col = document.getElementsByClassName('nums-60');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = false;
                }
            }else{
                col = document.getElementsByClassName('nums-60');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = true;
                }
            }
        }
        if(ch.id == 'num-40'){
           if(ch.checked){
                col = document.getElementsByClassName('nums-40');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = false;
                }
            }else{
                col = document.getElementsByClassName('nums-40');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = true;
                }
            }
        }
        if(ch.id == 'num-report'){
            if(ch.checked){
                col = document.getElementsByClassName('nums-report');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = false;
                }
            }else{
                col = document.getElementsByClassName('nums-report');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = true;
                }
            }
        }
        if(ch.id == 'num-btn'){
            if(ch.checked){
                col = document.getElementsByClassName('nums-btn');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = false;
                }
            }else{
                col = document.getElementsByClassName('nums-btn');
                for (var i = 0; i < col.length; i++) { 
                    col[i].disabled = true;
                }
            }
        }
    }
    
        

    function s2ab() {
        var wb = XLSX.utils.table_to_book(document.getElementById('table-nums'), {sheet:"Sheet JS"});
        var wpr = XLSX.write(wb,{bookType:"xlsx",bookSST:true,type:'binary'});
              var buf = new ArrayBuffer(wpr.length);
              var view = new Uint8Array(buf);
              for (var i=0; i<wpr.length; i++) view[i] = wpr.charCodeAt(i) & 0xFF;
              return buf;
            }
        $("#button-a").click(function(){
    
                    saveAs(new Blob([s2ab()],{type:"application/octet-stream"}), $("#department option:selected").html()+'-قۆناغ-'+ $("#stage option:selected").html()+'-وەرز-'+ $("#semester option:selected").html()+'-'+ $("#course option:selected").html()+'-'+ $("#year option:selected").html()+'-خول-'+ $("#round option:selected").html()+'.xlsx');
        });
</script>
@endsection