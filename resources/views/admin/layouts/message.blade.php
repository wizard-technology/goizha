@if(session('success'))
<div class="alert alert-primary alert-dismissible fade show d-flex align-items-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="mdi mdi-checkbox-marked-circle font-32"></i>{{session('success')}} <strong class="pr-1"> سەرکەوتوبوو </strong>
    
</div>
@endif
@if(count($errors) > 0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="mdi mdi-close-circle font-32"></i>{{$error}}<strong class="pr-1"> هەڵە هەیە </strong> 
</div>
@endforeach
@endif