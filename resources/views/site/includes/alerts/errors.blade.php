@if (session('error'))
    <div class="alert alert-dismissible alert-danger text-right">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif
