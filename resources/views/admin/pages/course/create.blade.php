@extends("admin.layouts.app")
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title float-right">فۆڕمی زیادکردنی وانە</h4>
                <div class="btn-group">
                </div>
        </div>
    </div>
</div>
<div class="row"  >
    <div class="col-md-12 col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                @include('admin.layouts.message')
                <div class="row justify-content-end" style="width: 100%">
                    <h2 class="mt-0 header-title font-20">زیاد کردنی وانە</h2>
                </div>
                <div class="row justify-content-end" >
                    <p class="text-muted font-20 mr-4" >
                        تکایە ئەم فۆڕمە پڕبکەرەوە بەپێێ توانا
                    </p>
                </div>
                <form class="" action="{{route('courses.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ناوی وانە:</label>
                        <input type="text" class="form-control font-18" dir="rtl" required placeholder="ناوی وانە" name="name" value="{{old("name")}}" />
                    </div>
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">یەکەی وانە:</label>
                        <input type="number" class="form-control font-18" dir="rtl" required placeholder="یەکەی وانە" name="unit" value="{{old("unit")}}" />
                    </div>
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right;">کێشی وانە:</label>
                        <input type="number" class="form-control font-18" dir="rtl" required placeholder="کێشی وانە" name="weight" value="{{old("weight")}}" />
                    </div>
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">وەرز:</label>
                        <select class="form-control" style="text-align: right" name="semester">
                            <option {{old("stage") == 1 ? "selected" : ""}} dir="rtl" class="font-20" value="1">یەک</option>
                            <option {{old("stage") == 2 ? "selected" : ""}} dir="rtl" class="font-20" value="2">دوو</option>
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
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">بەش:</label>
                        <select class="form-control" style="text-align: right" name="department">
                            @foreach ($department ?? '' as $key=>$value)
                            <option dir="rtl" {{old("department") == $value->id ? "selected" : ""}} class="font-20" value="{{$value->id}}">{{$value->d_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-0 row justify-content-end mr-1">
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