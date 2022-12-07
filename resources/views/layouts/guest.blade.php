<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- owl -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font Awesome JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    @livewireStyles
</head>

<body>
<div class="container-fluid p-0 d-flex">
    <nav class="navbar fixed-top navbar-light bg-white border-bottom">
        <div class="row w-100 mx-2">
            <div class="col-md-3 d-sm-block d-inline-block w-sm-auto">
                <a class="navbar-brand align-middle m-0" href="{{route("home")}}">
                    <img src="{{asset('assets/images/logo.png')}}" width="50px" alt="">
                    <span class="h5 d-lg-inline d-none">{{ __('Shield Company') }}</span>
                </a>
            </div>
            <div class="col-md-6 p-0 text-center d-sm-block d-inline-block w-sm-auto">
                <ul class="mb-0 p-0 align-middle when-hover">
                    <li class="d-inline-block mx-2 px-3 active rounded">
                        <a href="{{ route('home') }}"
                           class="d-inline-block nav-link h3 border-2 border-bottom"><i
                                class="fas fa-home"></i></a>
                    </li>
                    <li class="d-inline-block mx-2 px-3 active rounded">
                        <a href="{{ route('login') }}"
                           class="d-inline-block nav-link h3 border-2 border-bottom"><i
                                class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 text-start d-lg-block d-none w-lg-100">
                <div class="row mt-2">
                    <div class="col-md-8">
                        @if(auth()->check())
                            <a href="{{ route('profile') }}">
                                <img src="{{auth()->user()->image}}" width="40px" height="40px"
                                     class="d-inline-block border rounded-circle bg-light" alt="">
                                <span class="h6 text-dark">{{auth()->user()->name}}</span>
                            </a>
                        @else
                            <a href="{{route('login')}}">
                                <img src="{{asset('assets/images/logo.png')}}" width="40px" height="40px"
                                     class="d-inline-block border rounded-circle bg-light" alt="">
                                <span class="h6 text-dark">{{__("Guest")}}</span>
                            </a>
                        @endif
                    </div>
                    <div class="col-md-4 mt-auto mb-auto text-start">
                        <ul class="m-0 p-0 d-inline-block align-middle">
                                <li class="rounded-circle bg-light d-inline-block p-2 position-relative">
                                    <a href="{{route('logout')}}" class="h5 text-success"><i
                                            class="fas fa-sign-out-alt"></i></a>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-0">
        <div class="overlay"></div>
        <div class="margin-top-76 pt-5 pb-5">
            {{$slot}}
        </div>

        <footer class="px-2 pt-0 pb-2 border-top position-relative bottom-0 end-0 w-100">
            <div class="row bg-light p-4 pb-0">
                <div class="col-md-4 text-end">
                    <img src="{{ asset('assets/images/logo.png') }}" width="50px" height="50px" class="d-inline-block rounded-circle p-1 shadow" alt="">
                    <h4 class="p-2 text-success d-inline-block">{{ __('Shield Company') }} .</h4>
                    <p class="pe-4 mt-2 text-dark">{{ __('Information Technology and Business Solutions') }}</p>
                </div>
                <div class="col-md-4 text-end">
                    <h5 class="text-success">{{ __('Useful Links') }} </h5>
                    <ul class="me-3">
                        <li class="py-2"><a href="https://courses.shieldit.sa/" class="text-dark">{{ __('Courses') }}</a></li>
                        <li class="py-2"><a href="https://communication.shieldit.sa/" class="text-dark">{{ __('Communications') }}</a></li>
                        <li class="py-2"><a href="https://posts.shieldit.sa/" class="text-dark">{{ __('Posts') }}</a></li>
                    </ul>
                </div>
            </div>
            <h6 class="mt-2 mb-0">{{ __('All rights reserved to') }} <a href="{{ route('home') }}" class="text-primary">{{ __('Shield Company') }}</a></h6>
        </footer>
    </div>

</div>
@livewireScripts

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    window.addEventListener('close-modal', event => {
        $(".modal").modal('hide');
    })

    window.livewire.on('alertSuccess', (message) => {

        $(".modal").modal('hide');
        Swal.fire({
            title: '{{ __('Saved successfully') }}',
            text: message,
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    })

    window.livewire.on('alertError', (message) => {
        Swal.fire({
            title: 'error!',
            text: message,
            icon: 'error',
            confirmButtonText: 'OK'
        })
    })

</script>

@yield('js_code')

</body>
</html>
