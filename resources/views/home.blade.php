@extends('layouts.dashboard')

@section('content')

    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-angle-double-left"></i>
        </a>

    @include('layouts.dashboard_menu')

    <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="form-group col-md-12">
                        <section>
                            <div class="container">
                                <h2 class="main-content-title"> خوش آمدید </h2>

                                <p>
                                    <h4>نکات:</h4>
                                    <ul>
                                        <li>نکته 1: لطفا قبل از استفاده از سامانه فایل راهنما را مطالعه کنید.</li>
                                        <li>نکته 2: در صورت مشکل می توانید با شماره تلفن 02532110488 تماس حاصل فرمایید.</li>
                                    </ul>
                                </p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

        </main>
        <!-- page-content" -->

    </div>
@endsection
