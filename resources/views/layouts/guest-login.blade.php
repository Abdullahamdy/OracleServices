<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="theme-color" content="#000000"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!--load all styles for font aswesome -->

    <!-- My own style -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>

    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @livewireStyles

</head>
<body>
<div>
    <div class="container">
        <div class="row justify-content-center align-items-center all-login min-vh-100">
            <div class="col-md-8 text-end mb-5">
                <div class="pe-5 pb-5 title-login mx-auto d-inline-block text-end">
                    <h3>{{ __('Hey, you') }} ..</h3>
                    <h1 class="text-primary">{{ config('app.name') }}</h1>
                    <p class="h4">{{ __('To provide and interact with services and packages') }}</p>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <div class="border-secondary border mb-3 rounded-30 py-3 shadow-sub">
                    <div class="card-body">
                        <div class="mb-3">
                            <h4 class="text-primary p-2 mb-0">{{ __('Login') }}</h4>
                            <small class="p-2 text-muted">{{ __('Please enter your account information') }}</small>
                        </div>
                        <livewire:login :key="'login-guest-login-'"></livewire:login>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@livewireScripts

<!-- Optional JavaScript; choose one of the two! -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>
