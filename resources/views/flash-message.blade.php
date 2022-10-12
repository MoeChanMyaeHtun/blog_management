@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert" style="border:none;background-color:#d1e7dd;"><i class="fa fa-close" style="color: #ffffff"></i></button>
    <strong>{{ $message }}</strong>
</div>
@endif
