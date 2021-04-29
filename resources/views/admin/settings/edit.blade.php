@extends('admin.layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{__('admin.settings')}}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.settings.index')}}">{{__('admin.settings')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin.editSetting')}}</a>
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
                                        <form class="form" action="{{route('admin.settings.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" id="id" value="{{$setting->id}}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-settings"></i>{{__('admin.settings')}}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.siteName')}}</label>
                                                            <input type="text" id="site_name" name="site_name" class="form-control"
                                                                   placeholder="{{__('admin.enterSiteName')}}"
                                                                   value="{{$setting->site_name}}">
                                                            @error('site_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">{{__('admin.email')}}</label>
                                                            <input type="text" id="email" name="email" class="form-control"
                                                                   placeholder="{{__('admin.enterEmail')}}"
                                                                   value="{{$setting->email}}">
                                                            @error('email')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.phone')}}</label>
                                                            <input type="text" id="phone" name="phone" class="form-control"
                                                                   placeholder="{{__('admin.enterPhone')}}"
                                                                   value="{{$setting->phone}}">
                                                            @error('phone')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.mobile')}}</label>
                                                            <input type="text" id="mobile" name="mobile" class="form-control"
                                                                   placeholder="{{__('admin.enterMobile')}}"
                                                                   value="{{$setting->mobile}}">
                                                            @error('mobile')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.address')}}</label>
                                                            <input type="text" id="address" name="address" class="form-control"
                                                                   placeholder="{{__('admin.enterAddress')}}"
                                                                   value="{{$setting->address}}">
                                                            @error('address')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.facebook_url')}}</label>
                                                            <input type="text" id="facebook_url" name="facebook_url" class="form-control"
                                                                   placeholder="{{__('admin.enterFacebookUrl')}}"
                                                                   value="{{$setting->facebook_url}}">
                                                            @error('facebook_url')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.twitter_url')}}</label>
                                                            <input type="text" id="twitter_url" name="twitter_url" class="form-control"
                                                                   placeholder="{{__('admin.enterTwitterUrl')}}"
                                                                   value="{{$setting->twitter_url}}">
                                                            @error('twitter_url')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.telegram_url')}}</label>
                                                            <input type="text" id="telegram_url" name="telegram_url" class="form-control"
                                                                   placeholder="{{__('admin.enterTelegramUrl')}}"
                                                                   value="{{$setting->telegram_url}}">
                                                            @error('telegram_url')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="avatar">{{__('admin.favicon')}}</label>
                                                            <input class="form-control"
                                                                   type="file"
                                                                   name="favicon"
                                                                   id="favicon">
                                                            @if($setting->favicon)
                                                                <img src="{{url('Admin/assets/images/logo',$setting->favicon)}}"
                                                                     alt="favicon"
                                                                     class="mt-1 img-thumbnail" width="50px" height="50px">
                                                            @endif
                                                            @error('favicon')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="logo">{{__('admin.logo')}}</label>
                                                            <input class="form-control"
                                                                   type="file"
                                                                   name="logo"
                                                                   id="logo">
                                                            @if($setting->logo)
                                                                <img src="{{url('Admin/assets/images/logo',$setting->logo)}}"
                                                                     alt="logo"
                                                                     class="mt-1 img-thumbnail" width="150px" height="100px">
                                                            @endif
                                                            @error('logo')
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
