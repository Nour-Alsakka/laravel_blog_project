<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (max-width: 769px) {
            .gradient-custom-2 {
                background: linear-gradient(to right, #e78123, #12343a, #d23475, #123593);
            }
        }
    </style>

</head>

<body>

    <section class="h-100 gradient-form p-5" style="background-color: #eee;">

        <div class="login_pad d-flex justify-content-center align-items-center h-100">

            <div class="card rounded-3 text-black w-100">
                <div class="row ">
                    <div class="col-sm-12 col-md-12 col-lg-6 ">
                        <div class="card-body p-md-5 mx-md-4">

                            <div class="text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                                <h4 class="mt-1 mb-5 pb-1">We are The Laravel Amazing Team</h4>
                            </div>

                            <div class="text-dark px-3 py-4 p-md-5 mx-md-4 d-sm-block d-lg-none">
                                <h4 class="mb-4">We are more than just a company</h4>
                                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>

                            @yield('form')

                        </div>
                    </div>
                    <div class=" col-lg-6 col2 align-items-center gradient-custom-2">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                            <h4 class="mb-4">We are more than just a company</h4>
                            <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</body>

</html>
