@extends('layouts.login')

@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                    @if(\Session::has('message'))
                        <div class="alert alert-success">{{ \Session::get('message') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('نام کاربری') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
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
</div>--}}

<div class="omni-authorize clearfix">
    <div class="col-md-6 omni-authorize-form">
        <div class="omni-form-inner">
            <div class="logo" align="center">
                <div class="MaarefLogo"></div>
                <div style="margin-top:10px;color:#107837;font-size:18px;margin-bottom:30px">
                    سامانه یکپارچه اعضاء
                </div>
            </div>
            <div class="content">
                <div id="notifier" class="notify-wrap" style="display:none;clear:both;margin-top:0px">

                </div>
                <div>

                    <div class="card-body">

                        @if(\Session::has('message'))
                            <div class="alert alert-success">{{ \Session::get('message') }}</div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">

                                <input autocomplete="off" caption="نام کاربری" id="username" type="text"
                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} input-lg"
                                       name="username" value="{{ old('username') }}" required autofocus placeholder="نام کاربری">

                                <div class="input-bottom-error" id="txtNameFamily_pm">نام کاربری خود را وارد کنید.</div>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">

                                <input autocomplete="off" caption="رمز عبور" id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-lg"
                                       name="password" required placeholder="رمز عبور" onFocus="this.select();">

                                <div class="input-bottom-error" id="txtNameFamily_pm">رمز عبور خود را وارد کنید.</div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label remember-label" for="remember">
                                        {{ __('مرا به خاطر بسپار') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">

                                <button type="submit" class="btn btn-primary" style="width: 100%">
                                    {{ __('ورود') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <center>
            <div style="margin: 20px;margin-top: 30px;max-width:600px" align="center">
                <div style="text-align:justify;font-size:14px;line-height: 30px;padding: 15px">
                    <p style="color:#FF0066" align="center"><i class="fa fa-bell"></i>&nbsp;در صورت بروز هرگونه اشکال یا خطا، با شماره تلفن 32110488-025 تماس حاصل فرموده و یا با پست الکترونیک it@maaref.ac.ir مکاتبه نمائید.</p>
                </div>
                <div class="copyright" align="center">2019 &copy; مرکز فناوری دانشگاه معارف اسلامی.</div>
            </div>
        </center>
        <div class="omni-footer">
        </div>
    </div>
    <div class="col-md-6 omni-authorize-image">
        <div class="omni-authorize-copy" style="text-shadow: 5px 2px 5px #000;margin: 50px 110px 110px 110px;text-align: justify;width: unset !important;">
            <h5>
                <i class="fa fa-quote-right"></i> بى شك دوست محمد(ص ) كسى است كه خدا را فرمان برد اگر چه خويشاوندى او با آن حضرت دور باشد.
                <i class="fa fa-quote-left"></i><BR><BR><span style="font-size: 15px !important;">حضرت علي (ع) - همان ، خ 92، ص 1129.</span>
            </h5>
        </div>
    </div>
</div>
@endsection
