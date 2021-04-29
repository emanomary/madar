@extends('admin.layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{__('admin.users')}}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">{{__('admin.users')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin.editProfile')}}</a>
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
                                        <form class="form" action="{{route('admin.users.updateProfile',$user->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i>{{__('admin.personalInfo')}}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.name')}}</label>
                                                            <input type="text" id="name" name="name" class="form-control"
                                                                   placeholder="{{__('admin.enterUserName')}}"
                                                                   value="{{$user->name}}">
                                                            @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">{{__('admin.email')}}</label>
                                                            <input type="text" id="email" name="email" class="form-control"
                                                                   placeholder="{{__('admin.enterEmail')}}"
                                                                   value="{{$user->email}}">
                                                            @error('email')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">{{__('admin.password')}}</label>
                                                            <input type="password" id="password" name="password" class="form-control"
                                                                   placeholder="{{__('admin.enterPassword')}}">
                                                            @error('password')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="passwordConfirmation">{{__('admin.passwordConfirmation')}}</label>
                                                            <input type="password" id="passwordConfirmation" name="password_confirmation" class="form-control"
                                                                   placeholder="{{__('admin.enterPasswordConfirmation')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="avatar">{{__('admin.avatar')}}</label>
                                                            <input class="form-control"
                                                                   type="file"
                                                                   name="avatar"
                                                                   id="avatar">
                                                            @if($user->avatar)
                                                                <img src="{{url('Admin/assets/images/users',$user->avatar)}}"
                                                                     alt="..."
                                                                     class="mt-1 img-thumbnail" width="50px" height="50px">
                                                            @else
                                                                <img src="{{url('Admin/assets/images/users/person.png')}}"
                                                                     alt="..."
                                                                     class="mt-1 img-thumbnail" width="50px" height="50px">
                                                            @endif
                                                            @error('avatar')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin.save')}}
                                                </button>
                                            </div>
                                        </form>
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
