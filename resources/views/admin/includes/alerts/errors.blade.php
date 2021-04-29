@if(Session::has('error'))
    <div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
        <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        {{Session::get('error')}}
    </div>
@endif
