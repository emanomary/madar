@extends('admin.layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{__('admin.roles')}}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">{{__('admin.roles')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin.addRole')}}
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
                                        <form class="form" action="{{route('admin.roles.store')}}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-tag"></i>{{__('admin.roleInfo')}}</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.roleName')}}</label>
                                                            <input type="text" id="name" name="name" class="form-control"
                                                                   placeholder="{{__('admin.enterRoleName')}}"
                                                                   value="{{old('name')}}">
                                                            @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__('admin.roleSlug')}}</label>
                                                            <input type="text" id="slug" name="slug" class="form-control"
                                                                   value="{{old('slug')}}">
                                                            @error('slug')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h6 class="control-label">{{__('admin.permissions')}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="animated-checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="check_all" id="check_all">
                                                                    <span class="label-text">{{__('admin.checkAll')}}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @foreach($permissions as $permission)
                                                        <div class="animated-checkbox col-sm-4">
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" id="permissions_{{$permission->id}}"
                                                                       value="{{$permission->id}}" class="permissions">
                                                                <span class="label-text">{{$permission->name}}</span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    @error('permissions')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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
            $('#check_all').click(function(event) {
                if(this.checked) { // check select status
                    $('.permissions').each(function() {
                        this.checked = true;  //select all
                    });
                }else{
                    $('.permissions').each(function() {
                        this.checked = false; //deselect all
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#name').keyup(function(e){
                var str = $('#name').val();
                str = str.replace(/\s+/g, '-');//rplace stapces with dash
                $('#slug').val(str);
                $('#slug').attr('placeholder', str);
            });
        });
    </script>
@endsection

