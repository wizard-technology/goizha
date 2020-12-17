@extends("admin.layouts.app")
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title float-right">فۆڕمی زیادکردنی ستاف</h4>
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
                    <h2 class="mt-0 header-title font-20">زیاد کردنی ستاف</h2>
                </div>
                <div class="row justify-content-end" >
                    <p class="text-muted font-20 mr-4" >
                        تکایە ئەم فۆڕمە پڕبکەرەوە بەپێێ توانا
                    </p>
                </div>
                <form class="" action="{{route('staff.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ناوی ستاف:</label>
                        <input type="text" class="form-control font-18" dir="rtl" required placeholder="ناوی ستاف" name="name" />
                    </div>

                    <div class="form-group">
                        
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ئیمەیڵی ستاف:</label>
                        <input type="email" class="form-control font-18" dir="rtl" required placeholder="ئیمەیڵی ستاف"  name="email"/>
                    </div>
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ژ.مۆبایل:</label>
                        <input type="text" class="form-control font-18" dir="rtl" required placeholder="ژ.مۆبایل"  name="phone"/>
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