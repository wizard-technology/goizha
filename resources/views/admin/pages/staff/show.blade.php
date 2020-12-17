@extends("admin.layouts.app")
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
        <h4 class="page-title float-right">پڕۆفایلی ستاف #{{$data->stf_name}}</h4>
            <div class="btn-group">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-3">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card m-b-30 contact">
                    <div class="card-body">
                        <h6 class="header-title pb-3">Contact</h6>
                        <ul class="list-unstyled mb-0">
                            <li class=""><i class="fas fa-phone mt-2 mr-2"></i> <b> phone </b> : {{$data->stf_phone}}</li>
                            <li class="mt-2"><i class="far fa-envelope mt-2 mr-2"></i> <b> Email </b> : {{$data->stf_email}}</li>
                            <li class="mt-2"><i class="fas fa-address-card mt-2 mr-2"></i> <b>Location</b> :  {{$data->stf_name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xl-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        @include('admin.layouts.message')
                        <div class="row justify-content-end" style="width: 100%">
                            <h2 class="mt-0 header-title font-20">بەشداربوونی لە ستافی تاقیکردنەوەکان</h2>
                        </div>
                        <div class="row justify-content-end">
                            <p class="text-muted font-20 mr-4">
                                ئەم خشتەیە تایبەتە بە ستافەکان کە بەشدار ئەبن لە ستافی تاقیکردنەوەکان بەپێی ساڵ خول وەرز پۆلێن ئەکرێن
                            </p>
                        </div>
        
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse !important; border-spacing: 0 !important; width: 100% !important; ">
        
                            <thead>
                                <tr>
                                    <th style="text-align: right;">کردارەکان</th>
                                    <th style="text-align: right;">وەرزی خوێندن</th>
                                    <th style="text-align: right;">خولی خوێندن</th>
                                    <th style="text-align: right;">ساڵی ئەکادیمی</th>
                                    <th style="text-align: right;">ناو</th>
                                    <th style="text-align: right;">#</th>
                                </tr>
                            </thead>
        
                            @foreach ($data->exam as $key=>$value)
                            <tr>
                                <th dir="rtl" style="text-align: right;"><div class="input-group">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">کردارەکان
                                        </button>
                                        <div class="dropdown-menu">
                                            
                                            {{-- <div role="separator" class="dropdown-divider"></div> --}}
                                            <form action="{{route('staff.deleteAsStaff',$value->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="dropdown-item text-danger"
                                                    style="text-align: right;" href="#">سڕینەوە</button>
                                            </form>
                                        </div>
                                    </div>
                                </div></th>
                                <th dir="rtl" style="text-align: right;">{{$value->se_semester == 1 ? "یەکەم" : "دووەم"}}</th>
                                <th dir="rtl" style="text-align: right;">{{$value->se_round  == 1 ? "یەکەم" : "دووەم"}}</th>
                                <th dir="rtl" style="text-align: right;">{{$value->year->y_year}}</th>
                                <th dir="rtl" style="text-align: right;">{{$data->stf_name}}</th>
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
</div>
@endsection