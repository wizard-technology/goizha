@extends("admin.layouts.app")

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title float-right">ساڵە ئەکادیمیەکان</h4>
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
                    <h2 class="mt-0 header-title font-20">هەموو ساڵە ئەکادیمیەکان</h2>
                </div>
                <div class="row justify-content-end">
                    <p class="text-muted font-20 mr-4">
                        ئەم خشتەیە هەموو ئەو ساڵانە لە خۆ دەگرێت کە خویندنی تیا کراوە یان دەکرێت
                    </p>
                </div>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse !important; border-spacing: 0 !important; width: 100% !important; ">

                    <thead>
                        <tr>
                            <th style="text-align: right;">کردارەکان</th>
                            <th style="text-align: right;">ساڵی ئەکادیمی</th>
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
                                        <form action="{{route('year.destroy',$value->id)}}" method="POST">
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
                                    <form class="modal-content" action="{{route('year.update',$value->id)}}" method="POST">
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
                                                    style="text-align:right;float: right; ">ساڵی ئەکادیمی:</label>
                                                <input type="text" class="form-control font-18" dir="rtl" required
                                                    placeholder="ساڵی ئەکادیمی" name="year" value="{{$value->y_year}}" />
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
                        <th dir="rtl" style="text-align: right;">{{$value->y_year}}</th>
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