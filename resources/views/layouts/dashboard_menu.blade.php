@inject('request', 'Illuminate\Http\Request')
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="#">دانشگاه معارف اسلامی</a>
            <div id="close-sidebar">
                <i class="fas fa-angle-double-right"></i>
            </div>
        </div>

        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded" src="/images/UsersPic/{{$user->pic}}"
                     alt="User picture">
            </div>
            <div class="user-info">
                    <span class="user-name">
                        {{$user->FirstName . " " . $user->LastName }}
                    </span>
                {{--<span class="user-role">{{$user->professor->level}}</span>--}}
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                  </span>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>سامانه ها</span>
                </li>

                @if($user->can('users_manage'))

                    <li class="sidebar-dropdown {{ $request->segment(2) == 'members'
                                                   || $request->segment(2) == 'maaref_lessons'
                                                   || $request->segment(2) == 'professor_term_lessons' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-tachometer-alt"></i>
                            <span class="menu-text">سامانه اعضاء</span>
                        </a>
                        <div class="sidebar-submenu" style="display: {{ $request->segment(2) == 'members'
                                                   || $request->segment(2) == 'maaref_lessons'
                                                   || $request->segment(2) == 'professor_term_lessons' ? 'block' : 'none' }}">
                            <ul>
                                <li class="{{ $request->segment(3) == 'ProfessorsList' ? 'active' : '' }}">
                                    <a href="{{route('management.ProfessorsList')}}">
                                        لیست اساتید
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'ImportProfessorsInfoForm' ? 'active' : '' }}">
                                    <a href="{{route('management.ImportProfessorsInfoForm')}}">
                                        بروزرسانی مشخصات اساتید
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'ProfessorTermLessonsImportForm' ? 'active' : '' }}">
                                    <a href="{{route('ProfessorTermLessons.ImportForm')}}">
                                        دروس ترم جاری اساتید
                                    </a>
                                </li>
                                <li class="sidebar-sub-dropdown {{ $request->segment(2) == 'maaref_lessons' ? 'active' : ''}}">
                                    <a href="#">
                                        مدیریت دروس دانشگاه
                                    </a>
                                    <div class="sidebar-sub-submenu" style="display: {{ $request->segment(2) == 'maaref_lessons' ? 'block' : 'none'}} ">
                                        <ul>
                                            <li class="{{ $request->segment(3) == 'lesson_types' ? 'active' : '' }}">
                                                <a href="{{route('lesson_types.index')}}">
                                                    <span class="menu-text">مدیریت نوع دورس</span>
                                                </a>
                                            </li>
                                            <li class="{{ $request->segment(3) == 'lesson_methods' ? 'active' : '' }}">
                                                <a href="{{route('lesson_methods.index')}}">
                                                    <span class="menu-text">مدیریت نوع ارائه دورس</span>
                                                </a>
                                            </li>
                                            <li class="{{ $request->segment(3) == 'lesson_genders' ? 'active' : '' }}">
                                                <a href="{{route('lesson_genders.index')}}">
                                                    <span class="menu-text">مدیریت جنسیت دورس</span>
                                                </a>
                                            </li>
                                            <li class="{{ $request->segment(3) == 'LessonsImportForm' ? 'active' : '' }}">
                                                <a href="{{route('lessons_import.LessonsImportForm')}}">
                                                    <span class="menu-text">درج و بروز رسانی دورس</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if($user->can('Register_AlumniAssociation'))
                    <li class="sidebar-dropdown {{ $request->segment(2) == 'alumni' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span class="menu-text">انجمن دانش آموختگان</span>
                        </a>
                        <div class="sidebar-submenu" style="display: {{ $request->segment(2) == 'alumni' ? 'block' : 'none' }}">
                            <ul>
                                <li class="{{ $request->segment(2) == 'index' ? 'active' : '' }}">
                                    <a href="{{route('alumni_index')}}">
                                        <span class="menu-text">ثبت نام در انجمن</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                @if($user->can('manage_AlumniAssociation'))
                    <li class="sidebar-dropdown {{ $request->segment(2) == 'alumni' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span class="menu-text">انجمن دانش آموختگان</span>
                        </a>
                        <div class="sidebar-submenu" style="display: {{ $request->segment(2) == 'alumni' ? 'block' : 'none' }}">
                            <ul>
                                <li class="{{ $request->segment(2) == 'grade' ? 'active' : '' }}">
                                    <a href="{{route('grade.index')}}">
                                        <span class="menu-text">مدیریت مقاطع</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(2) == 'field_of_study' ? 'active' : '' }}">
                                    <a href="{{route('field_of_study.index')}}">
                                        <span class="menu-text">مدیریت رشته ها</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(2) == 'orientation' ? 'active' : '' }}">
                                    <a href="{{route('orientation.index')}}">
                                        <span class="menu-text">مدیریت گرایش ها</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'training_center_type' ? 'active' : '' }}">
                                    <a href="{{route('training_center_type.index')}}">
                                        <span class="menu-text">مدیریت نوع مرکز آموزشی</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'training_center' ? 'active' : '' }}">
                                    <a href="{{route('training_center')}}">
                                        <span class="menu-text">مدیریت مراکز آموزشی</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'responsibility_type' ? 'active' : '' }}">
                                    <a href="{{route('responsibility_type')}}">
                                        <span class="menu-text">مدیریت نوع مسئولیت</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'advertising_record_place' ? 'active' : '' }}">
                                    <a href="{{route('advertising_record_place')}}">
                                        <span class="menu-text">مدیریت محل تبلیغ</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'lesson' ? 'active' : '' }}">
                                    <a href="{{route('lesson.index')}}">
                                        <span class="menu-text">مدیریت دروس</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'seminary_grade' ? 'active' : '' }}">
                                    <a href="{{route('seminary_grade.index')}}">
                                        <span class="menu-text">مدیریت پایه تحصیلی حوزوی</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'seminary_field_of_study' ? 'active' : '' }}">
                                    <a href="{{route('seminary_field_of_study.index')}}">
                                        <span class="menu-text">مدیریت رشته های حوزوی</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'seminary_academic_degree' ? 'active' : '' }}">
                                    <a href="{{route('seminary_academic_degree.index')}}">
                                        <span class="menu-text">مدیریت مقاطع تحصیلی حوزوی</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'country' ? 'active' : '' }}">
                                    <a href="{{route('country.index')}}">
                                        <span class="menu-text">مدیریت کشورها</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'province' ? 'active' : '' }}">
                                    <a href="{{route('province.index')}}">
                                        <span class="menu-text">مدیریت استان ها</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'city' ? 'active' : '' }}">
                                    <a href="{{route('city.index')}}">
                                        <span class="menu-text">مدیریت شهرها</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'religion' ? 'active' : '' }}">
                                    <a href="{{route('religion.index')}}">
                                        <span class="menu-text">مدیریت مذاهب</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'marital_status' ? 'active' : '' }}">
                                    <a href="{{route('marital_status.index')}}">
                                        <span class="menu-text">مدیریت وضعیت تأهل</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'public_conscription_status' ? 'active' : '' }}">
                                    <a href="{{route('public_conscription_status.index')}}">
                                        <span class="menu-text">مدیریت وضعیت نظام وظیفه</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if($user->can('manage_resume'))
                    @if( \Request::is('resumes/'.request()->route('id')) )
                        <li class="active">
                    @else
                        <li>
                    @endif
                        <a href="{{route('resumes.show',[0])}}">
                            <i class="fas fa-book"></i>
                            <span class="menu-text">سامانه اعضاء</span>
                        </a>
                    </li>
                @endif

                @if($user->can('manage_payments'))
                    <li class="sidebar-dropdown {{ $request->segment(2) == 'payments' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span class="menu-text">سامانه یکپارچه پرداخت وجه</span>
                        </a>
                        <div class="sidebar-submenu" style="display: {{ $request->segment(2) == 'payments' ? 'block' : 'none' }}">
                            <ul>
                                <li class="{{ $request->segment(3) == 'paymentsCase' ? 'active' : '' }}">
                                    <a href="{{route('paymentsCase.index')}}">
                                        <span class="menu-text">مدیریت موارد پرداخت ها</span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(3) == 'paymentsList' ? 'active' : '' }}">
                                    <a href="{{route('paymentsList.Report')}}">
                                        <span class="menu-text">گزارش گیری</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if($user->can('manage_reservations'))
                    <li>
                        <a href="#">
                            <i class="fas fa-concierge-bell"></i>
                            <span class="menu-text">اتوماسیون تغذیه</span>
                        </a>
                    </li>
                @endif

                @if($user->can('manage_tickets'))
                    <li>
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span class="menu-text">سامانه تیکت آنلاین</span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i>
            <span>خروج از سامانه</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>
