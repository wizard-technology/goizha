@extends("admin.layouts.app")
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title float-right">فۆڕمی زیادکردنی بەش</h4>
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
                    <h2 class="mt-0 header-title font-20">زیاد کردنی بەش</h2>
                </div>
                <div class="row justify-content-end" >
                    <p class="text-muted font-20 mr-4" >
                        تکایە ئەم فۆڕمە پڕبکەرەوە بەپێێ توانا
                    </p>
                </div>
                <form class="" action="{{route('department.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ناوی بەش:</label>
                        <input type="text" class="form-control font-18" dir="rtl" required placeholder="ناوی بەش" name="name" />
                    </div>
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ژ. پەڕینەوە:</label>
                        <input type="number" class="form-control font-18" dir="rtl" required placeholder="ژ. پەڕینەوە" name="limit" />
                    </div>
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ژ. قۆناغ:</label>
                        <input type="number" class="form-control font-18" dir="rtl" required placeholder="ژ. قۆناغ" name="stage" />
                    </div>
                    <div class="form-group">
                        <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">پاشگر ئینگلیزی:</label>
                        <input type="text" class="form-control font-18" dir="rtl" required placeholder="پاشگر ئینگلیزی" name="prefix" />
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