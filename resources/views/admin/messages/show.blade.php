@extends('admin.layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{__('admin.messages')}}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item">{{__('admin.messages')}}
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
                                        <div class="table-responsive">
                                            @if(isset($message))
                                                <table class="table table-bordered table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">{{__('admin.name')}}</th>
                                                        <td>{{$message->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">{{__('admin.mobile')}}</th>
                                                        <td>{{$message->mobile}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">{{__('admin.email')}}</th>
                                                        <td>{{$message->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">{{__('admin.message')}}</th>
                                                        <td>{{$message->message}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    <!-- Contextual classes end -->
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
