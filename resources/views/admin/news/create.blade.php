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
                    <h3 class="content-header-title mb-0 d-inline-block">{{__('admin.news')}}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.news.index')}}">{{__('admin.news')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin.addNew')}}
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
                                        <form class="form" action="{{route('admin.news.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="la la-newspaper-o"></i>{{__('admin.newInfo')}}</h4>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.title')}}</label>
                                                            <input type="text" id="title" name="title" class="form-control"
                                                                   placeholder="{{__('admin.enterNewTitle')}}"
                                                                   value="{{old('title')}}">
                                                            @error('title')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="publishDate">{{__('admin.publishDate')}}</label>
                                                            <input type="date" id="publishDate" class="form-control" name="publishDate"
                                                            value="{{old('publishDate')}}">
                                                            @error('publishDate')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.slug')}}</label>
                                                            <input type="text" id="slug" name="slug" class="form-control"
                                                                   value="{{old('slug')}}" >
                                                            @error('slug')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="publishTime">{{__('admin.publishTime')}}</label>
                                                            <input type="time" id="publishTime" class="form-control" name="publishTime"
                                                                   value="{{old('publishTime')}}">
                                                            @error('publishTime')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="projectinput5">{{__('admin.categories')}}</label>
                                                            <select id="category_id" name="category_id" class="form-control">
                                                                <option value="none" selected="" disabled="">{{__('admin.selectCategory')}}</option>
                                                                @if($categories && $categories -> count() > 0)
                                                                    {{subRecursionForNews($categories, 0,'-')}}
                                                                @endif
                                                            </select>
                                                            @error('category_id')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div>
                                                                <label for="status">{{__('admin.status')}}</label>
                                                            </div>
                                                            <input type="checkbox"
                                                                   class="switch hidden form-control"
                                                                   data-on-label="{{__('admin.active')}}" data-off-label="{{__('admin.inactive')}}"
                                                                   id="status"
                                                                   name="status"
                                                                   checked="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="image">{{__('admin.newImage')}}</label>
                                                            <input class="form-control"
                                                                   type="file"
                                                                   name="image"
                                                                   id="image">
                                                            @error('image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput5">{{__('admin.authors')}}</label>
                                                            <select id="user_id" name="user_id" class="form-control">
                                                                <option value="none" selected="" disabled="">{{__('admin.selectAuthor')}}</option>
                                                                @if($users && $users->count() > 0)
                                                                    @foreach($users as $user)
                                                                        <option {{ old('user_id') == $user->id ? "selected" : "" }} value="{{$user->id}}">{{$user->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            @error('user_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.details')}}</label>
                                                            <textarea class="form-control text-right"
                                                                      name="details"
                                                                      id="details"
                                                                      cols="12" rows="15">{{ old("details") }}</textarea>
                                                            @error('details')
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
        $(document).ready(function(){
            $('#title').keyup(function(e){
                var str = $('#title').val();
                str = str.replace(/\s+/g, '-');//rplace stapces with dash
                $('#slug').val(str);
                $('#slug').attr('placeholder', str);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#details').summernote({
                /*toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],*/
                height: 300,
                lang: "ar"
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
