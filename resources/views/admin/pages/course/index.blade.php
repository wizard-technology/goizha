@extends("admin.layouts.app")

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title float-right">وانەکان</h4>
            <div class="btn-group">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-body">
                @include('admin.layouts.message')
                <div class="row justify-content-end" style="width: 100%">
                    <h2 class="mt-0 header-title font-20">هەموو بەشەکان</h2>
                </div>
                <div class="row justify-content-end">
                    <p class="text-muted font-20 mr-4">
                        ئەم خشتەیە هەموو ئەو بەشانە لە خۆ دەگرێت کە لە زانکۆکەماندا هەیە
                    </p>
                </div>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse !important; border-spacing: 0 !important; width: 100% !important; ">

                    <thead>
                        <tr>
                            <th style="text-align: right;">کردارەکان</th>
                            <th style="text-align: right;">یەکە</th>
                            <th style="text-align: right;">بەش</th>
                            <th style="text-align: right;">وەرز</th>
                            <th style="text-align: right;">کێشی وانە</th>
                            <th style="text-align: right;">قۆناغ</th>
                            <th style="text-align: right;">ناو</th>
                            <th style="text-align: right;">#</th>
                        </tr>
                    </thead>

                    @foreach ($data as $key=>$value)
                    <tr>
                        <th dir="rtl" style="text-align: right;">
                            <div class="input-group">
                                <div class="input-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">کردارەکان
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" style="text-align: right;" data-toggle="modal"
                                            data-target=".bd-example-modal-form-{{$value->id}}" type="button">دەستکاری
                                            کردن</button>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <form action="{{route('courses.destroy',$value->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="dropdown-item text-danger"
                                                style="text-align: right;" href="#">سڕینەوە</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                         
                            <div class="modal fade bd-example-modal-form-{{$value->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form class="modal-content" action="{{route('courses.update',$value->id)}}" method="POST">
                                        <div class="modal-header" >
                                            <h5 class="modal-title" id="exampleModalform"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-dark">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18"
                                                    style="text-align:right;float: right; ">ناوی وانەکە:</label>
                                                <input type="text" class="form-control font-18" dir="rtl" required
                                                    placeholder="ناوی وانەکە" name="name" value="{{$value->c_name}}" />
                                            </div>
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18"
                                                    style="text-align:right;float: right; ">یەکەی وانەکە:</label>
                                                <input type="number" class="form-control font-18" dir="rtl" required
                                                    placeholder="یەکەی وانەکە" name="unit" value="{{$value->c_unit}}" />
                                            </div>
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18"
                                                    style="text-align:right;float: right; ">کێشی وانەکە:</label>
                                                <input type="number" class="form-control font-18" dir="rtl" required
                                                    placeholder="کێشی وانەکە" name="weight" value="{{$value->c_weight}}" />
                                            </div>
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">وەرز:</label>
                                                <select class="form-control" style="text-align: right" name="semester">
                                                    <option {{$value->c_semester == 1 ? "selected" : ""}} dir="rtl" class="font-20" value="1">یەک</option>
                                                    <option {{$value->c_semester == 2 ? "selected" : ""}} dir="rtl" class="font-20" value="2">دوو</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">قۆناغ:</label>
                                                <select class="form-control" style="text-align: right" name="stage">
                                                    <option {{$value->c_stage == 1 ? "selected" : ""}} dir="rtl" class="font-20" value="1">یەک</option>
                                                    <option {{$value->c_stage == 2 ? "selected" : ""}} dir="rtl" class="font-20" value="2">دوو</option>
                                                    <option {{$value->c_stage == 3 ? "selected" : ""}} dir="rtl" class="font-20" value="3">سێ</option>
                                                    <option {{$value->c_stage == 4 ? "selected" : ""}} dir="rtl" class="font-20" value="4">چوار</option>
                                                    <option {{$value->c_stage == 5 ? "selected" : ""}} dir="rtl" class="font-20" value="5">پێنج</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-raised btn-danger ml-2"
                                                data-dismiss="modal">داخستنەوە</button>
                                            <button type="submit" class="btn btn-raised btn-primary">ئەنجامدانی گۆڕانکاری</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </th>
                        <th dir="rtl" style="text-align: right;">{{$value->c_unit}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->department->d_name}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->c_semester}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->c_weight}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->c_stage}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->c_name}}</th>
                        <th dir="rtl" style="text-align: right;">{{++$key}}</th>
                    </tr>
                    @endforeach
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection