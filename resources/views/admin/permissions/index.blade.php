@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{__('admin.permissions')}}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item">{{__('admin.permissions')}}
                                </li>
                                <li class="breadcrumb-item active">{{__('admin.showAll')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('admin.name')}}</th>
                                                <th>{{__('admin.slug')}}</th>
                                            </tr>
                                            </thead>
                                            @if($permissions->count() > 0)
                                                <tbody>
                                                @foreach($permissions as $index => $permission)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{$permission->name}}</td>
                                                    <td>{{$permission->slug}}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('Admin/assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('Admin/assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
@endsection
