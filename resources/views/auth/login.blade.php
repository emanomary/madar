{{--@extends('auth.loginLayout.loginLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}

@extends('auth.loginLayout.loginLayout')

@section('title',__('admin.login'))

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <?php
                                        use App\Models\Setting;
                                        $logo = Setting::select('logo')->get();
                                        ?>
                                        @if($logo->isEmpty())
                                                <img src="{{asset('Admin/assets/images/logo/logo.png')}}" alt="branding logo">
                                        @else
                                            <img alt="branding logo"
                                                 src="{{url('Admin/assets/images/logo',$logo[0]['logo'])}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2">
                                        <span>{{__('admin.usingYourAccount')}}</span>
                                    </p>
                                    <div class="card-body pt-0">
                                        <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            {{-- Email Input --}}
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input placeholder="{{__('admin.enterEmail')}}"
                                                       id="email" type="email"
                                                       class="form-control input-lg @error('email') is-invalid @enderror"
                                                       name="email"
                                                       value="{{ old('email') }}"
                                                       required
                                                       autocomplete="email"
                                                       autofocus>
                                                <div class="form-control-position">
                                                    <i class="la la-user"></i>
                                                </div>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input placeholder="{{__('admin.enterPassword')}}"
                                                       required
                                                       id="password"
                                                       type="password"
                                                       class="form-control input-lg @error('password') is-invalid @enderror"
                                                       name="password"
                                                       autocomplete="current-password">
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </fieldset>
                                            <button type="submit" class="btn btn-info btn-lg btn-block">
                                                <i class="ft-unlock"></i>
                                                {{ __('admin.login') }}
                                            </button>
                                        </form>
                                    </div>
                                    <div class="card-body pb-0">
                                        {{--<p class="text-center">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="card-link">
                                                    {{ __('admin.forgotPassword') }}
                                                </a>
                                            @endif
                                        </p>--}}
                                        {{--<p class="text-center">New to Modern Admin? <a href="register-with-navbar.html" class="card-link">Create Account</a></p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
