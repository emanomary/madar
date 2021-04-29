@if (session('success'))
    <div class="alert alert-dismissible alert-success text-right">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif

