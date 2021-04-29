@extends('admin.layouts.admin')

@section('style')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/css-rtl/plugins/forms/switch.css')}}">

@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{__('admin.videos')}}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.videos.index')}}">{{__('admin.videos')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin.editVideo')}}
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
                                        <form class="form" action="{{route('admin.videos.update',$video->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" id="id" value="{{$video->id}}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="la la-newspaper-o"></i>{{__('admin.videoInfo')}}</h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.videoTitle')}}</label>
                                                            <input type="text" id="title" name="title" class="form-control"
                                                                   placeholder="{{__('admin.enterVideoTitle')}}"
                                                                   value="{{$video->title}}">
                                                            @error('title')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.url')}}</label>
                                                            <input type="text" id="url" name="url" class="form-control"
                                                                   placeholder="{{__('admin.enterVideoUrl')}}"
                                                                   value="{{$video->url}}">
                                                            @error('url')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div>
                                                                <label for="status">{{__('admin.status')}}</label>
                                                            </div>
                                                            <input type="checkbox"
                                                                   class="switch hidden form-control"
                                                                   data-on-label="{{__('admin.active')}}"
                                                                   data-off-label="{{__('admin.inactive')}}"
                                                                   id="status"
                                                                   name="status"
                                                                   value="{{$video->status}}" {{$video->status == 1 ? 'checked':''}}>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.description')}}</label>
                                                            <textarea class="form-control text-right"
                                                                      name="description"
                                                                      id="description"
                                                                      cols="12" rows="15">{{$video->description}}</textarea>
                                                            @error('description')
                                                            <span class="text-danger">{{$message}}</span>
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
@section('script')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 300,
                lang: "ar",
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('Admin/assets/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('Admin/assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('Admin/assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <script src="{{asset('Admin/assets/js/scripts/forms/switch.js')}}" type="text/javascript"></script>

@endsection
