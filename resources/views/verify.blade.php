@extends('layouts.login')

@section('content')
{{--    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Phone Verification</div>

                    <div class="panel-body">

                        @if(\Session::has('message'))
                            <div class="alert alert-success">{{ \Session::get('message') }}</div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('verify.submit') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Enter Code</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

<style>

</style>

    <div class="omni-authorize clearfix">
        <div class="col-md-6 omni-authorize-form">
            <div class="omni-form-inner">
                <div class="logo" align="center">
                    <div class="MaarefLogo"></div>
                    <div style="margin-top:10px;color:#107837;font-size:18px;margin-bottom:30px">
                        سامانه یکپارچه اعضاء
                    </div>
                </div>

                <div id="timer">
                    <div id="seconds"></div>
                    <div>:</div>
                    <div id="minutes"></div>
                </div>

                <div class="content">
                    <div id="notifier" class="notify-wrap" style="display:none;clear:both;margin-top:0px">

                    </div>
                    <div>

                        <div class="card-body">

                            @if(\Session::has('message'))
                                <div class="alert alert-success">{{ \Session::get('message') }}</div>
                            @endif

                            <form class="form-horizontal" method="POST" action="{{ route('verify.submit') }}">
                                <h2 class="text-center margin-bottom-30">لطفا کد ارسالی به شماره همراهتان را در کادر زیر وارد کنید</h2>
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">

                                        <input autocomplete="off" caption="کد ارسالی" type="text"
                                               class="form-control input-lg" name="code" value="{{ old('code') }}" required autofocus placeholder="کد ارسالی">

                                        <div class="input-bottom-error" id="txtNameFamily_pm">کد ارسالی به شماره همراه را وارد کنید.</div>

                                        @if ($errors->has('code'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <div >
                                        <button type="submit" class="btn btn-primary" style="width: 100%">
                                            تأیید تلفن همراه
                                        </button>
                                    </div>
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

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

    <script>
        var timeLeft = 90;
        function makeTimer() {
            timeLeft--;

            if (timeLeft == 0 ) {
                clearTimeout(timer);
                document.getElementById("logout-form").submit();
            }

            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") { hours = "0" + hours; }
            if (minutes < "10") { minutes = "0" + minutes; }
            if (seconds < "10") { seconds = "0" + seconds; }

            /*$("#days").html(days + "<span>Days</span>");
            $("#hours").html(hours + "<span>Hours</span>");*/
            $("#minutes").html(minutes);
            $("#seconds").html(seconds);

        }

        setInterval(function() { makeTimer(); }, 1000);
    </script>

@endsection
