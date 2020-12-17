@extends("admin.layouts.app")

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title float-right">خوێنکارەکان</h4>
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
                    <h2 class="mt-0 header-title font-20">هەموو خوێنکارەکان</h2>
                </div>
                <div class="row justify-content-end">
                    <p class="text-muted font-20 mr-4">
                        ئەم خشتەیە هەموو ئەو خوێنکارانە لە خۆ دەگرێت کە لەبەشەکەماندا وانە دەخوێنن
                    </p>
                </div>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse !important; border-spacing: 0 !important; width: 100% !important; ">

                    <thead>
                        <tr>
                            <th style="text-align: right;">کردارەکان</th>
                            <th style="text-align: right;">بەرواری دەستپێکردن</th>
                            <th style="text-align: right;">ساڵی ئەکادیمی</th>
                            <th style="text-align: right;">بەش</th>
                            <th style="text-align: right;">قۆناغ</th>
                            <th style="text-align: right;">ڕەگەز</th>
                            <th style="text-align: right;">ناو</th>
                            <th style="text-align: right;">#</th>
                        </tr>
                    </thead>

                    @foreach ($data as $krd=>$value)
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
                                        <form action="{{route('student.destroy',$value->id)}}" method="POST">
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
                                    <form class="modal-content" action="{{route('student.update',$value->id)}}" method="POST">
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
                                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ناوی
                                                    خوێنکار:</label>
                                                <input type="text" class="form-control font-18" dir="rtl" required placeholder="ناوی خوێنکار"
                                                name="name" value="{{$value->s_fullname}}" />
                                            </div>
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">بەش:</label>
                                                <select class="form-control" style="text-align: right" name="department">
                                                    @foreach ($department as $key=>$v)
                                                    <option dir="rtl" class="font-20" {{$value->department->id == $v->id ? "selected" : ""}} value="{{$v->id}}">{{$v->d_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">قۆناغ:</label>
                                                <select class="form-control" style="text-align: right" name="stage">
                                                    <option {{$value->s_stage == 1 ? "selected" : ""}} dir="rtl" class="font-20" value="1">یەک</option>
                                                    <option {{$value->s_stage == 2 ? "selected" : ""}} dir="rtl" class="font-20" value="2">دوو</option>
                                                    <option {{$value->s_stage == 3 ? "selected" : ""}} dir="rtl" class="font-20" value="3">سێ</option>
                                                    <option {{$value->s_stage == 4 ? "selected" : ""}} dir="rtl" class="font-20" value="4">چوار</option>
                                                    <option {{$value->s_stage == 5 ? "selected" : ""}} dir="rtl" class="font-20" value="5">پێنج</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ساڵی
                                                    ئەکادیمی:</label>
                                                <select class="form-control" style="text-align: right" name="year">
                                                    @foreach ($years as $k=>$v)
                                                    <option dir="rtl"  {{$value->year->id == $v->id ? "selected" : ""}} class="font-20" value="{{$v->id}}">{{$v->y_year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group font-18 ">
                                                <label for="example-date-input font-18" style="text-align:right;float: right; " class="col-form-label">:بەرواری دەستپێکردن</label>
                                                <div class="">
                                                    <input class="form-control" type="date" name="start date" id="example-date-input" value="{{$value->s_start_at}}">
                                                </div>
                                            </div>
                                            <div class="form-group " >
                                                <label class=" my-1 control-label mr-1 font-18"
                                                    style="text-align:right;float: right; ">:ڕەگەز</label>
                                                <div class="form-check-inline my-1" style="text-align:right;float: right; ">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="gender" name="gender" value="نێر" {{$value->s_gender == "نێر" ? "checked" :''}}  class="custom-control-input">
                                                        <label class="custom-control-label font-20" for="gender"  >نێر</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1" style="text-align:right;float: right; ">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="gender6" name="gender" value="مێ" {{$value->s_gender == "مێ" ? "checked" :''}}  class="custom-control-input">
                                                        <label class="custom-control-label font-20" for="gender6">مێ</label>
                                                    </div>
                                                </div>
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
                        <th dir="rtl" style="text-align: right;">{{$value->s_start_at}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->year->y_year}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->department->d_name}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->s_stage}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->s_gender}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->s_fullname}}</th>
                        <th dir="rtl" style="text-align: right;">{{++$krd}}</th>
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