@if ($message = Session::get('success')) <!-- alternative representation session('success') -->
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>Success!</strong> {{ session('success') }}
</div>
@endif