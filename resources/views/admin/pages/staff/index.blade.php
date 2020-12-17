@extends("admin.layouts.app")

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title float-right">ستافەکان</h4>
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
                    <h2 class="mt-0 header-title font-20">هەموو ستافەکان</h2>
                </div>
                <div class="row justify-content-end">
                    <p class="text-muted font-20 mr-4">
                        ئەم خشتەیە هەموو ئەو کارمەندانە لە خۆ دەگرێت کە بەشداربوون یان بەشدار ئەبن لە لیژنەی
                        تاقیکدنەوەکان
                    </p>
                </div>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse !important; border-spacing: 0 !important; width: 100% !important; ">

                    <thead>
                        <tr>
                            <th style="text-align: right;">کردارەکان</th>
                            <th style="text-align: right;">ئیمەیڵ</th>
                            <th style="text-align: right;">ژ.مۆبایل</th>
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
                                            data-target=".bd-example-modal-exam-{{$value->id}}" type="button">هەڵبژاردنی
                                            وەک ستاف</button>
                                        <a class="dropdown-item" style="text-align: right;" href="{{route('staff.show',$value->id)}}">بینین</a>
                                        <button class="dropdown-item" style="text-align: right;" data-toggle="modal"
                                            data-target=".bd-example-modal-form-{{$value->id}}" type="button">دەستکاری
                                            کردن</button>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <form action="{{route('staff.destroy',$value->id)}}" method="POST">
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
                                    <form class="modal-content" action="{{route('staff.update',$value->id)}}"
                                        method="POST">
                                        <div class="modal-header">
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
                                                    style="text-align:right;float: right; ">ناوی ستاف:</label>
                                                <input type="text" class="form-control font-18" dir="rtl" required
                                                    placeholder="ناوی ستاف" name="name" value="{{$value->stf_name}}" />
                                            </div>

                                            <div class="form-group">

                                                <label dir="rtl" class="mr-1 font-18"
                                                    style="text-align:right;float: right; ">ئیمەیڵی ستاف:</label>
                                                <input type="email" class="form-control font-18" dir="rtl" required
                                                    placeholder="ئیمەیڵی ستاف" name="email"
                                                    value="{{$value->stf_email}}" />
                                            </div>
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18"
                                                    style="text-align:right;float: right; ">ژ.مۆبایل:</label>
                                                <input type="text" class="form-control font-18" dir="rtl" required
                                                    placeholder="ژ.مۆبایل" name="phone" value="{{$value->stf_phone}}" />
                                            </div>

                                        </div>
                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-raised btn-danger ml-2"
                                                data-dismiss="modal">داخستنەوە</button>
                                            <button type="submit" class="btn btn-raised btn-primary">ئەنجامدانی
                                                گۆڕانکاری</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal fade bd-example-modal-exam-{{$value->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form class="modal-content" action="{{route('staff.setAsStaff',$value->id)}}"
                                        method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalform"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-dark">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">وەرزی خوێندن:</label>
                                                <select class="form-control" style="text-align: right" name="semester">
                                                    <option dir="rtl" class="font-20" value="1">یەک</option>
                                                    <option dir="rtl" class="font-20" value="2">دوو</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">خولی تاقیکدنەوەکان:</label>
                                                <select class="form-control" style="text-align: right" name="round">
                                                    <option dir="rtl" class="font-20" value="1">یەک</option>
                                                    <option dir="rtl" class="font-20" value="2">دوو</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label dir="rtl" class="mr-1 font-18" style="text-align:right;float: right; ">ساڵی
                                                    ئەکادیمی:</label>
                                                <select class="form-control" style="text-align: right" name="year">
                                                    @foreach ($year as $key=>$v)
                                                    <option dir="rtl" class="font-20" value="{{$v->id}}">{{$v->y_year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        <input type="hidden" value="{{$value->id}}" name="staff">
                                        </div>
                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-raised btn-danger ml-2"
                                                data-dismiss="modal">داخستنەوە</button>
                                            <button type="submit" class="btn btn-raised btn-primary">ئەنجامدانی
                                                گۆڕانکاری</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </th>
                        <th dir="rtl" style="text-align: right;">{{$value->stf_email}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->stf_phone}}</th>
                        <th dir="rtl" style="text-align: right;">{{$value->stf_name}}</th>
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