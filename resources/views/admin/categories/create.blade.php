@extends('admin.layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{__('admin.categories')}}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">{{__('admin.categories')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin.addCategory')}}
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
                                        <form class="form" action="{{route('admin.categories.store')}}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-tag"></i>{{__('admin.categoryInfo')}}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.categoryName')}}</label>
                                                            <input type="text" id="name" name="name" class="form-control"
                                                                   placeholder="{{__('admin.enterCategoryName')}}"
                                                                   value="{{old('name')}}">
                                                            @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.categorySlug')}}</label>
                                                            <input type="text" id="slug" name="slug" class="form-control"
                                                                   value="{{old('slug')}}">
                                                            @error('slug')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 d-flex">
                                                        <div class="col-md-6">
                                                            <div class="animated-radio-button">
                                                                <label>
                                                                    <input type="radio" name="type" value="1"
                                                                           {{ old('type') == 1 ? "checked" : "" }}checked>
                                                                    <span class="label-text">{{__('admin.mainCategory')}}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="animated-radio-button">
                                                                <label>
                                                                    <input type="radio" name="type" value="2"
                                                                        {{ old('type') == 2 ? "checked" : "" }}>
                                                                    <span class="label-text">{{__('admin.subCategory')}}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row" id="category_list" style="display: none;">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    @if($categories->count() > 0)
                                                                        <select name="parent_id" class="form-control ">
                                                                            <option label="{{__('admin.selectMainCategory')}} "></option>
                                                                            @if($categories && $categories -> count() > 0)
                                                                                {{subRecursion($categories, 0,'-')}}
                                                                            @endif
                                                                        </select>
                                                                    @else
                                                                        <select name="parent_id" class="select2 form-control ">
                                                                            <option label="{{__('admin.notFountCategories')}} "></option>
                                                                        </select>
                                                                    @endif
                                                                    @error('parent_id')
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
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
    <script src="{{asset('Admin/assets/js/category.js')}}"></script>
@endsection
