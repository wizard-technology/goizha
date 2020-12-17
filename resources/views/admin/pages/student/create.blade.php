@extends("admin.layouts.app")
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title float-right">فۆڕمی زیادکردنی خوێنکار</h4>
            <div class="btn-group">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                @include('admin.layouts.message')
                <div class="row justify-content-end" style="width: 100%">
                    <h2 class="mt-0 header-title font-20">زیاد کردنی خوێنکار</h2>
                </div>
                <div class="row justify-content-end">
                    <p class="text-muted font-20 mr-4">
                        تکایە ئەم فۆڕمە پڕبکەرەوە بەپێێ توانا
                    </p>
                </div>
                <form class="" action="{{route('student.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ناوی
                            خوێنکار:</label>
                        <input type="text" class="form-control font-18" dir="rtl" required placeholder="ناوی خوێنکار"
                        name="name" value="{{old("name")}}" />
                    </div>
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">بەش:</label>
                        <select class="form-control" style="text-align: right" name="department">
                            @foreach ($department as $key=>$value)
                            <option dir="rtl" {{old("department") == $value->id ? "selected" : ""}} class="font-20" value="{{$value->id}}">{{$value->d_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">قۆناغ:</label>
                        <select class="form-control" style="text-align: right" name="stage">
                            <option {{old("stage") == 1 ? "selected" : ""}} dir="rtl" class="font-20" value="1">یەک</option>
                            <option {{old("stage") == 2 ? "selected" : ""}} dir="rtl" class="font-20" value="2">دوو</option>
                            <option {{old("stage") == 3 ? "selected" : ""}} dir="rtl" class="font-20" value="3">سێ</option>
                            <option {{old("stage") == 4 ? "selected" : ""}} dir="rtl" class="font-20" value="4">چوار</option>
                            <option {{old("stage") == 5 ? "selected" : ""}} dir="rtl" class="font-20" value="5">پێنج</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ساڵی
                            ئەکادیمی:</label>
                        <select class="form-control" style="text-align: right" name="year">
                            @foreach ($years as $key=>$value)
                            <option dir="rtl"  {{old("year") == $value->id ? "selected" : ""}} class="font-20" value="{{$value->id}}">{{$value->y_year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group font-18 ">
                        <label for="example-date-input font-18" style="text-align:right;float: right; " class="col-form-label">:بەرواری دەستپێکردن</label>
                        <div class="">
                            <input class="form-control" type="date" name="start date" id="example-date-input" value="{{old("start_date")}}">
                        </div>
                    </div>
                    <div class="form-group " >
                        <label class=" my-1 control-label mr-1 font-18"
                            style="text-align:right;float: right; ">:ڕەگەز</label>
                        <div class="form-check-inline my-1" style="text-align:right;float: right; ">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="gender" name="gender" value="نێر" {{old("gender") == "نێر" ? "checked" :''}} {{old("gender") == null ? 'checked':''}}  class="custom-control-input">
                                <label class="custom-control-label font-20" for="gender"  >نێر</label>
                            </div>
                        </div>
                        <div class="form-check-inline my-1" style="text-align:right;float: right; ">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="gender6" name="gender" value="مێ" {{old("gender") == "مێ" ? "checked" :''}}  class="custom-control-input">
                                <label class="custom-control-label font-20" for="gender6">مێ</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group mb-0 row  mr-1">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                زیادکردن
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection