<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="theme-color" content="#000000"/>
    <!-- Bootstrap CSS -->
    @if(app()->getLocale() == 'ar' )
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>    <!--load all styles for font aswesome -->
    <title>{{ config('app.name') }}</title>
    <!-- My own style -->
    <link href="{{asset('assets/css/style.css') }}?{{filemtime('../public/assets/css/style.css') }}" rel="stylesheet"/>
    @if(app()->getLocale() == 'en' )
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif
    <style>
        @font-face {
            src: url("{{ asset('assets/fonts/Tajawal-Regular.ttf') }}") !important;
            font-family: "tajawal" !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
          integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
    @livewireStyles
</head>

@php
    $active = '//'.$_SERVER['HTTP_HOST'];
@endphp
<body>
<div class="container-fluid p-0 d-flex">
    <div class=" d-lg-block d-none sidebar margin-top-76 padding-bottom-76">
            <ul class="py-4 list-unstyled when-hover-side">
                <li class="rounded-list position-relative sub-background py-3 pe-4  {{request()->is('admin/services')  ? 'active' : ''}} {{request()->is('admin')  ? 'active' : ''}} {{request()->is('admin/services*')  ? 'active' : ''}}">
                    <a href="{{ route('admin.services') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/services.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">{{ __('Services') }}</h5>
                    </a>
                </li>
                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/types') ? 'active' : ''}}">
                    <a href="{{ route('admin.types') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/list.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">{{ __('Types') }}</h5>
                    </a>
                </li>
                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/statuses') ? 'active' : ''}}">
                    <a href="{{ route('admin.statuses') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/status.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">{{ __('Packages Statuses') }}</h5>
                    </a>
                </li>
                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/applicants') ? 'active' : ''}}">
                    <a href="{{ route('admin.applicants') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/applicants.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">{{ __('Applicants') }}</h5>
                    </a>
                </li>


                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/applicants') ? 'active' : ''}}">
                    <a href="{{ route('admin.categories') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/applicants.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">أقسام المنتجات</h5>
                    </a>
                </li>
                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/applicants') ? 'active' : ''}}">
                    <a href="{{ route('admin.operations') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/applicants.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle"> مشاهدةجميع الخدمات</h5>
                    </a>
                </li>

                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/applicants') ? 'active' : ''}}">
                    <a href="{{ route('admin.questions') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/applicants.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">الأسئلة الشائعة</h5>
                    </a>
                </li>
                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/customerreviews') ? 'active' : ''}}">
                    <a href="{{ route('admin.customerreviews') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/applicants.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">أراء العملاء</h5>
                    </a>
                </li>


                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/applicants') ? 'active' : ''}}">
                    <a href="{{ route('admin.price') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/applicants.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle"> عرض الأسعار</h5>
                    </a>
                </li>
                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/applicants') ? 'active' : ''}}">
                    <a href="{{ route('admin.priceservices') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/applicants.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">الخدمات الفرعية</h5>
                    </a>
                </li>
                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/carts') ? 'active' : ''}}">
                    <a href="{{ route('admin.carts') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/cart.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">{{ __('Cart') }}</h5>
                    </a>
                </li>
                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/notifications') ? 'active' : ''}}">
                    <a href="{{ route('admin.notifications') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/notification.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">{{ __('Notifications') }}</h5>
                    </a>
                </li>
                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/statistics') ? 'active' : ''}}">
                    <a href="{{ route('admin.statistics') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/statistics.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">{{ __('Statistics') }}</h5>
                    </a>
                </li>
                <li class="rounded-list position-relative sub-background py-3 pe-4 {{request()->is('admin/telescope-emails') ? 'active' : ''}}">
                    <a href="{{ route('admin.telescope-emails') }}"
                       class="h5 font-22 text-decoration-none text-ddd d-block mb-0">
                        <img src="{{ asset('assets/images/icons8-email-64.png') }}" width="35px" height="35px" class="contain ms-2" alt=""><h5 class="mb-0 pe-2 py-2  border-end border-2 border-sid d-inline-block align-middle">
                        {{ __('Telescope emails') }}</h5>
                    </a>
                </li>
            </ul>
    </div>

    <nav class="navbar fixed-top navbar-light bg-sub shadow-sub d-print-none">
        <div class="row w-100">
            <div class="col-md-3 d-sm-block d-inline-block text-center text-md-end">
                <a class="navbar-brand align-middle m-0" href="{{route("admin.admin") }}">
                    <img src="{{asset('assets/images/logo.png') }}" width="50px" alt="">
                    <span class="h5 d-lg-inline d-none">{{config("app.name") }}</span>
                </a>
            </div>
            <div class="col-md-5 text-center d-sm-block d-inline-block w-sm-100"></div>


            <div class="col-md-4 text-start w-lg-100">
                <div class="row mt-md-0 mt-md-2">
                    <div class="col-md-12 d-lg-block d-none img-single">
                        @if(auth()->check())
                            <div class="dropdown d-inline-block">
                                <button class="btn m-0 p-0 text-dark px-0 position-relative" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                                    <img src="{{auth()->user()->image}}" class="d-inline-block border rounded-circle bg-light cover" alt="" width="40px" height="40px">
                                    <i class="fas fa-circle text-success position-absolute bottom-0 font-size-2" style="right: -5px"></i>
                                </button>
                                <ul class="dropdown-menu text-main border-0 shadow-sub text-end bg-sub" aria-labelledby="dropdownMenuButton1" data-bs-popper="none">
                                    <li class="px-2 pt-2 pb-2 border-bottom border-secondary">
                                        <a class="dropdown-item text-main" href="{{ route('profile') }}">
                                            <img src="{{auth()->user()->image}}" class="d-inline-block border rounded-circle bg-light cover" alt="" width="40px" height="40px">
                                            <div class="d-inline-block align-middle mx-2 w-75">
                                                <h6 class="mb-1 w-100 text-truncate d-block">{{auth()->user()->name}}</h6>
                                                <h6 class="mb-1 font-size-2 d-inline-block px-2 py-1 bg-main-1 rounded-3">{{auth()->user()->roles()->pluck('name')->implode(',')}}</h6>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="p-2">
                                        <a class="dropdown-item text-main py-2" href="{{ route('profile') }}">
                                            <h6 class="mb-0"><i class="fas fa-list h6 ms-2"></i>{{ __('Profile') }}</h6>
                                        </a>
                                        <a class="dropdown-item text-main py-2" href="{{route('logout')}}">
                                            <h6 class="mb-0"><i class="fas fa-ban h6 ms-2"></i>{{ __('Log out') }}</h6>
                                        </a>
                                    </li>
                                </ul>
                                @php
                                    $notifications = \App\Models\Notification::all();
                                @endphp
                                <div class="dropdown d-inline-block">
                                    <button class="btn mx-0 position-relative" type="button" id="dropdownMenuButton3"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fas fa-bell text-secondary h5 mb-0"></i>
                                        <span class="position-absolute top-0 end-0 font-10 badge bg-danger rounded-circle">{{ $notifications->count() }}</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-1 scroll-chat drop-notification border-0 shadow text-end"
                                        aria-labelledby="dropdownMenuButton2">
                                        @if($notifications->count())
                                            @foreach($notifications->take(4) as $notification)
                                                <li class="px-2 pt-2 pb-2 border-bottom border-secondary"><a href="{{ route('admin.services.show', ['token' => $notification->token]) }}">
                                                        <img src="{{ asset('assets/images/logo.png') }}" height="35px" width="35px"
                                                             class="cover rounded-circle border border-secondary shadow-sm d-inline-block" alt="">
                                                        <div class="d-inline-block w-81 align-top mt-1 me-1">
                                                            <h6 class="mb-0  text-truncate w-100">{{ $notification->title_lang }}</h6>
                                                            <small class="text-muted d-block btn-size-2 text-truncate w-100">{{ $notification->message_lang }}</small>
                                                            <small class="d-block btn-size-2 text-truncate text-muted text-start w-100">{{ $notification->created_at->diffForHumans() }}</small>
                                                        </div>
                                                    </a></li>
                                            @endforeach
                                            <li class="text-center py-2">
                                                <a href="{{ route('admin.notifications') }}" class="text-muted">{{ __('Show All Notifications') }}</a>
                                            </li>
                                        @else
                                            <li class="text-center text-muted py-2">
                                                {{ __('Empty list') }}
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                @if(app()->getLocale() == 'ar' )
                                    <a href="?language=en" class="text-secondary my-auto h5"><i
                                            class="fas fa-globe h6 text-secondary mx-1"></i>EN</a>
                                @else
                                    <a href="?language=ar" class="text-secondary my-auto h5"><i
                                            class="fas fa-globe h6 text-secondary mx-1"></i>AR</a>
                                @endif
                            </div>
                        @else
                            <a href="{{route('login')}}">
                                <img src="{{asset('assets/images/logo.png')}}" width="40px" height="40px"
                                     class="d-inline-block border rounded-circle bg-light" alt="">
                                <span class="h6 text-ddd">{{__("Guest")}}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="position-absolute active-sidebar d-sm-none">
            <i class="btn fas fa-bars border border-secondary text-ddd p-2 rounded-3 bg-main-1"></i>
        </div>
    </nav>
    <div class="container-fluid position-relative">
        <div class="overlay"></div>
        <div class="main margin-top-76 padding-bottom-76 pt-3 mb-5">
            <div class="d-block bg-sub py-2 px-3 mb-3 rounded-3 shadow-lg">
                @if(request()->is('admin/services') or request()->is('admin'))
                <ol class="breadcrumb h6 mb-0 ">
                    <li class=""><img src="{{ asset('assets/images/home.png') }}" class="mx-2" alt="" width="25px" height="25px"></li>
                    <li class="breadcrumb-item my-auto"><a href="{{ route('admin.admin') }}"> {{ __('Home') }}</a></li>
                    <li class="breadcrumb-item my-auto"><a href="{{ route('admin.services') }}">{{ __('Services') }}</a></li>
                </ol>
                @elseif(request()->is('admin/services*'))
                    <ol class="breadcrumb h6 mb-0 ">
                        <li class=""><img src="{{ asset('assets/images/home.png') }}" class="mx-2" alt="" width="25px" height="25px"></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.admin') }}"> {{ __('Home') }}</a></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.services') }}">{{ __('Services') }}</a></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.services.show', ['token' => request('token')]) }}">{{ \App\Models\Service::where('token', request('token'))->first()->name_lang }}</a></li>
                    </ol>
                @elseif(request()->is('admin/types'))
                    <ol class="breadcrumb h6 mb-0 ">
                        <li class=""><img src="{{ asset('assets/images/home.png') }}" class="mx-2" alt="" width="25px" height="25px"></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.admin') }}"> {{ __('Home') }}</a></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.types') }}">{{ __('Types') }}</a></li>
                    </ol>
                @elseif(request()->is('admin/statuses'))
                    <ol class="breadcrumb h6 mb-0 ">
                        <li class=""><img src="{{ asset('assets/images/home.png') }}" class="mx-2" alt="" width="25px" height="25px"></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.admin') }}"> {{ __('Home') }}</a></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.statuses') }}">{{ __('Packages Statuses') }}</a></li>
                    </ol>
                @elseif(request()->is('admin/applicants'))
                    <ol class="breadcrumb h6 mb-0 ">
                        <li class=""><img src="{{ asset('assets/images/home.png') }}" class="mx-2" alt="" width="25px" height="25px"></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.admin') }}"> {{ __('Home') }}</a></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.applicants') }}">{{ __('Applicants') }}</a></li>
                    </ol>
                @elseif(request()->is('admin/carts'))
                    <ol class="breadcrumb h6 mb-0 ">
                        <li class=""><img src="{{ asset('assets/images/home.png') }}" class="mx-2" alt="" width="25px" height="25px"></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.admin') }}"> {{ __('Home') }}</a></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.carts') }}">{{ __('Cart') }}</a></li>
                    </ol>
                @elseif(request()->is('admin/statistics'))
                    <ol class="breadcrumb h6 mb-0 ">
                        <li class=""><img src="{{ asset('assets/images/home.png') }}" class="mx-2" alt="" width="25px" height="25px"></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.admin') }}"> {{ __('Home') }}</a></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.statistics') }}">{{ __('Statistics') }}</a></li>
                    </ol>
                @elseif(request()->is('admin/notifications'))
                    <ol class="breadcrumb h6 mb-0 ">
                        <li class=""><img src="{{ asset('assets/images/home.png') }}" class="mx-2" alt="" width="25px" height="25px"></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.admin') }}"> {{ __('Home') }}</a></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.notifications') }}">{{ __('Notifications') }}</a></li>
                    </ol>
                @elseif(request()->is('admin/telescope-emails'))
                    <ol class="breadcrumb h6 mb-0 ">
                        <li class=""><img src="{{ asset('assets/images/home.png') }}" class="mx-2" alt="" width="25px" height="25px"></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.admin') }}"> {{ __('Home') }}</a></li>
                        <li class="breadcrumb-item my-auto"><a href="{{ route('admin.telescope-emails') }}">{{ __('Telescope emails') }}</a></li>
                    </ol>
                @endif

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-white border-0 p-2">
                        {{$slot}}
                    </div>
                </div>
        </div>


        <footer class="p-2 border-top position-absolute bottom-0 border-sid w-100 start-0 text-center">
            <h6>{{ __('All rights reserved to') }} <a href="" class="text-warning mx-1">{{ __('Shield Company') }}</a></h6>
        </footer>
    </div>
</div>
    @if(!auth()->check())
        <div class="modal fade" id="exampleModalFirstSession" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Process completion') }}</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rounded-3 p-3 shadow-sm m-3">
                            <h5><i class="fas fa-lightbulb ms-1 text-danger"></i>{{ __('Notification to complete the process') }} :</h5>
                            <div class="my-3 text-center">
                                <button class="btn  rounded-pill btn-primary py-1 px-2" data-bs-dismiss="modal">{{ __('Continue without logging in') }}</button>
                                <a href="{{ route('login') }}" class="btn rounded-pill btn-success py-1 px-2">{{ __('Login') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

<!-- Optional JavaScript; choose one of the two! -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"
        integrity="sha512-t2JWqzirxOmR9MZKu+BMz0TNHe55G5BZ/tfTmXMlxpUY8tsTo3QMD27QGoYKZKFAraIPDhFv56HLdN11ctmiTQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
        integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"
            integrity="sha512-zMfrMAZYAlNClPKjN+JMuslK/B6sPM09BGvrWlW+cymmPmsUT1xJF3P4kxI3lOh9zypakSgWaTpY6vDJY/3Dig=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @livewireScripts

<script>
    window.addEventListener('close-modal', event => {
        $(".modal").modal('hide');
    })

    window.addEventListener('updateSelect2', event => {
        $(".multiple").select2();
    })

    window.livewire.on('alertSuccess', (message) => {
        Swal.fire({
            title: '{{ __('Saved successfully') }}',
            text: message,
            icon: 'success',
            confirmButtonText: 'Ok',
            color: '#ddd',
            background: '#151a30',
        })

        Livewire.emit("refreshModal");
        $(".modal").modal("hide");
        if (message == "تم تسجيل بياناتك بنجاح سيتم التواصل معكم في اقرب وقت ممكن , شكرا لمشاركتكم معنا مع تحيات فريق درع") {
            setTimeout(function () {
                window.location.href = "https://shieldit.sa";
            }, 3000);
        }
    })

    window.addEventListener('close-modal', event => {
        $(".modal").modal('hide');
    })
    window.livewire.on('alertError', (message) => {
        Swal.fire({
            title: 'error!',
            text: message,
            icon: 'error',
            confirmButtonText: 'OK',
            color: '#ddd',
            background: '#151a30',
        })
    })

    @if (!auth()->check())
    $(document).ready(function () {
        $('#exampleModalFirstSession').modal('show');
    })
    @endif

    $(".drop-applicants").niceScroll({
        cursorwidth:6,
        cursoropacitymin:0.4,
        cursorcolor:'#6c757d',
        cursorborder:'none',
        cursorborderradius:4,
        autohidemode:'leave'
    });
    $(".scroll-chat").niceScroll({
        cursorwidth: "5px",
        cursorcolor: "#BEBEBE",
        cursorborder: "1px",
    });
</script>

@yield('js_code')
@yield('tooltip')

</body>
</html>
