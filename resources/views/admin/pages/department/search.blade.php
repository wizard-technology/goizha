@extends("admin.layouts.app")
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title float-right">پڕۆفایلی بەشی #{{$data->d_name}}</h4>
            <input type="hidden" id="valExcel" value="خوێنکارانی بەشی #{{$data->d_name}}">

            <div class="btn-group">
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card m-b-30 contact">
                    <div class="card-body">
                        <h6 class="header-title pb-3" style="text-align: right;">ئاماری بەش</h6>
                        <ul class="list-unstyled mb-0">
                            @foreach ($student as $k=>$v)
                            <li class="" style="text-align: right;"><b> {{$v->s_gender}} </b> : {{$v->gn}}</li>
                            @endforeach
                            @foreach ($course as $k=>$v)
                            <li class="" style="text-align: right;"><b> قۆناغی {{$v->c_stage}} </b> : {{$v->co}} وانە
                            </li>
                            @endforeach
                            {{-- <li class=""><i class="fas fa-phone mt-2 mr-2"></i> <b> phone </b> : {{$data->stf_phone}}
                            </li>
                            <li class="mt-2"><i class="far fa-envelope mt-2 mr-2"></i> <b> Email </b> :
                                {{$data->stf_email}}</li>
                            <li class="mt-2"><i class="fas fa-address-card mt-2 mr-2"></i> <b>Location</b> :
                                {{$data->stf_name}}</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        @include('admin.layouts.message')
                        <div class="row justify-content-end" style="width: 100%">
                            <h2 class="mt-0 header-title font-20">وانەکانی بەشی {{$data->d_name}}</h2>
                        </div>
                        <div class="row justify-content-end">
                            <p class="text-muted font-20 mr-4">
                                ئەم خشتەیە تایبەتە بە وانەی بەشی {{$data->d_name}} کە دەگوترێتەوە لەلایەن مامۆستایانەوە
                            </p>
                        </div>

                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse !important; border-spacing: 0 !important; width: 100% !important; ">

                            <thead>
                                <tr>
                                    <th style="text-align: right;">کردارەکان</th>
                                    <th style="text-align: right;">یەکە</th>
                                    <th style="text-align: right;">قۆناغ</th>
                                    <th style="text-align: right;">وەرز</th>
                                    <th style="text-align: right;">ناو</th>
                                    <th style="text-align: right;">#</th>
                                </tr>
                            </thead>

                            @foreach ($data->courses as $key=>$value)
                            <tr>
                                <th dir="rtl" style="text-align: right;">
                                    <div class="input-group">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">کردارەکان
                                            </button>
                                            <div class="dropdown-menu">
                                                {{-- <div role="separator" class="dropdown-divider"></div> --}}
                                                <form action="{{route('courses.destroy',$value->id)}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        style="text-align: right;" href="#">سڕینەوە</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                                <th dir="rtl" style="text-align: right;">{{$value->c_unit}}</th>
                                <th dir="rtl" style="text-align: right;">{{$value->c_stage}}</th>
                                <th dir="rtl" style="text-align: right;">{{$value->c_semester}}</th>
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
        </div>
    </div>
    <div class="col-lg-12 col-xl-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        @include('admin.layouts.message')
                        <div class="row justify-content-end" style="width: 100%">
                            <h2 class="mt-0 header-title font-20">خوێنکارانی بەشی {{$data->d_name}}</h2>
                        </div>
                        <div class="row justify-content-end">
                            <p class="text-muted font-20 mr-4">
                                ئەم خشتەیە تایبەتە بە خوێنکارانی ئەم بەشە
                            </p>
                        </div>
                        <form action="{{route('department.searchst')}}" method="get">
                            @csrf   
                            <div class="row justify-content-end">
                                <input type="hidden" name="dep" value="{{$data->id}}">
                                <div class="col-sm-4">
                                    <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ساڵی
                                        ئەکادیمی:</label>
                                    <select class="form-control" style="text-align: right" id="year"  name="year">
                                        <option dir="rtl" class="font-20" value="" disabled selected>ساڵی ئەکادیمی
                                        </option>
                                        @foreach ($year as $k=>$v)
                                        <option {{$old['year'] == $v->id ? 'selected':''}} dir="rtl" class="font-20" value="{{$v->id}}">{{$v->y_year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">قۆناغ
                                        :</label>
                                    <select class="form-control" style="text-align: right" id="stage" name="stage">
                                        <option dir="rtl" class="font-20" value="0" disabled selected>قۆناغ</option>
                                        <option {{$old['stage'] == 1 ? 'selected':''}}  dir="rtl" class="font-20" value="1">یەک</option>
                                        <option {{$old['stage'] == 2 ? 'selected':''}}  dir="rtl" class="font-20" value="2">دوو</option>
                                        <option {{$old['stage'] == 3 ? 'selected':''}}  dir="rtl" class="font-20" value="3">سێ</option>
                                        <option {{$old['stage'] == 4 ? 'selected':''}}  dir="rtl" class="font-20" value="4">چوار</option>
                                        <option {{$old['stage'] == 5 ? 'selected':''}}  dir="rtl" class="font-20" value="5">پێنج</option>
                                    </select>
                                </div>

                            </div>
                            <br>
                            <div style="text-align: right;">
                                <div style="">
                                    <button type="submit" class="btn btn-primary">گەڕان</button>
                                </div>
                            </div>
                            
                            <br>
                        </form>
                    <form style="text-align: right;" action="{{route('department.print')}}" method="GET">
                                @csrf
                                <input type="hidden" name="dep" value="{{$data->id}}">
                                <input type="hidden" name="year" value="{{$old['year']}}">
                                <input type="hidden" name="stage" value="{{$old['stage']}}">
                                <div style="">
                                    <button type="submit" class="btn btn-warning">ناوی سەرتەختەکان</button>
                                </div>
                            </form>
                        <table id="datatable-buttons2" class="table table-striped table-bordered dt-responsive"
                            style="border-collapse: collapse !important; border-spacing: 0 !important; width: 100% !important; ">
                            <thead>
                                <tr>
                                    <th style="text-align: right;">ساڵی ئەکادیمی</th>
                                    <th style="text-align: right;">قۆناغ</th>
                                    <th style="text-align: right;">ناو</th>

                                </tr>
                            </thead>

                            @foreach ($data->students as $key=>$value)
                            <tr>
                                <th dir="rtl" style="text-align: right;">{{$value->year->y_year}}</th>
                                <th dir="rtl" style="text-align: right;">{{$value->s_stage}}</th>
                                <th dir="rtl" style="text-align: right;">{{$value->s_fullname}}</th>

                            </tr>
                            @endforeach
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection