@if(Session::has('success'))
<div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
    <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    {{Session::get('success')}}
</div>
@endif
