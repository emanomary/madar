@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{__('admin.news')}}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item">{{__('admin.news')}}
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
                                        @include('admin.includes.alerts.success')
                                        @include('admin.includes.alerts.errors')
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('admin.title')}}</th>
                                                <th>{{__('admin.categoryName')}}</th>
                                                <th>{{__('admin.status')}}</th>
                                                <th>{{__('admin.publishDate')}}</th>
                                                <th>{{__('admin.publishTime')}}</th>
                                                <th>{{__('admin.action')}}</th>
                                            </tr>
                                            </thead>
                                            @if($news->count() > 0)
                                                <tbody>
                                                @foreach($news as $index => $new)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{$new->title}}</td>
                                                    <td>{{$new->category->name}}</td>
                                                    <td>{{$new->getActive()}}</td>
                                                    <td>{{$new->publishDate}}</td>
                                                    <td>{{$new->publishTime}}</td>
                                                    <td>
                                                        <a href="{{route('admin.news.edit',$new->id)}}"
                                                           class="btn btn-outline-warning">
                                                            <i class="la la-edit"></i>
                                                        </a>
                                                        <a href="#" data-toggle="modal" data-target="#deleteModal"
                                                           class="btn btn-outline-danger"
                                                           data-newid="{{$new->id}}">
                                                            <i class="la la-trash"></i>
                                                        </a>
                                                    </td>
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
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h4 class="modal-title white" id="myModalLabel10">{{__('admin.confirmMessage')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>{{__('admin.selectDelete')}}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
                        {{__('admin.cancel')}}
                    </button>
                    <form method="POST" action="">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger" onclick="$(this).closest('form').submit();">
                            {{__('admin.delete')}}
                        </button>
                    </form>
                </div>
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
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var new_id = button.data('newid')

            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/news/destroy/' + new_id);
        })
    </script>
@endsection
