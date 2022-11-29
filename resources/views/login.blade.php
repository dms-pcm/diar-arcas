<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- PWA  -->
    <meta name="theme-color" content="#1D2B36"/>
    <link rel="apple-touch-icon" href="{{ asset('logo-diararcas-new.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <link rel="stylesheet" href="{{asset('assets/css/mystyle.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
    <title>Document</title>

    <script>
        let baseUrl = "{{url('/')}}/";
        let urlApi = "{{url('/api')}}/";
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <img src="{{asset('assets/img/LOGOBR.png')}}" class="img-fluid mx-auto d-block mt-4" width="200" alt="Responsive image">
        </div>
        <div class="wrapper">
            <div class="logo">
                <img src="{{asset('assets/img/icon.png')}}" alt="">
            </div>
            <div class="text-center mt-4 name">
                Selamat Datang
            </div>
            <div class="text-center" style="font-size:13px;">
                <smal>Silahkan login terlebih dahulu untuk melanjutkan aktivitas</small>
            </div>
            <!-- <form class="p-3 mt-3" novalidate="novalidate">
                @csrf -->
                <div class="p-3 mt-3">
                    <div class="form-field d-flex align-items-center">
                        <span class="far fa-user ml-2"></span>
                        <input class="input-login" type="text" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-key ml-2"></span>
                        <input class="input-login" type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <button class="tombol mt-3" onclick="login()">Login</button>
                </div>
                <!-- </form> -->
            </div>
            <ul class="bg-bubbles">
               <li></li>
               <li></li>
               <li></li>
               <li></li>
               <li></li>
               <li></li>
               <li></li>
               <li></li>
               <li></li>
               <li></li>
           </ul>
       </div>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js"></script>
       <script src="{{asset('assets/vendors/js/extensions/sweetalert2.all.js')}}"></script>
       <script src="{{asset('assets/vendors/js/animation/loaders.js')}}"></script>
       <script src="{{asset('assets/extends/page/configuration.js')}}"></script>
       <script src="{{asset('assets/extends/page/login.js')}}"></script>
       <script src="{{ asset('/sw.js') }}"></script>
       <script>
         jQuery(document).ready(function () {
            $('.input-login').keyup(function(event){
               event.preventDefault();
               if (event.keyCode === 13) {
                  login()
              }
          });
        });
         if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</body>
</html>