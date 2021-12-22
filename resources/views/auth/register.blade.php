<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        <title>Bursa Kerja Khusus SMKN 1 Kota Bengkulu | Login</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/logo.jpg') }}">
        <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href=" {{ asset('css/style_register.css') }} ">
        <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
        <style>
            .preloader {    position: fixed;    top: 0;    left: 0;    right: 0;    bottom: 0;    background-color: #ffffff;    z-index: 99999;    height: 100%;    width: 100%;    overflow: hidden !important;}.do-loader{    width: 200px;    height: 200px;    position: absolute;    left: 50%;    top: 50%;    margin: 0 auto;    -webkit-border-radius: 100%;       -moz-border-radius: 100%;         -o-border-radius: 100%;            border-radius: 100%;    background-image: url({{ asset('assets/images/logo.jpg') }});    background-size: 80% !important;    background-repeat: no-repeat;    background-position: center;    -webkit-background-size: cover;            background-size: cover;    -webkit-transform: translate(-50%,-50%);       -moz-transform: translate(-50%,-50%);        -ms-transform: translate(-50%,-50%);         -o-transform: translate(-50%,-50%);            transform: translate(-50%,-50%);}.do-loader:before {    content: "";    display: block;    position: absolute;    left: -6px;    top: -6px;    height: calc(100% + 12px);    width: calc(100% + 12px);    border-top: 1px solid #07A8D8;    border-left: 1px solid transparent;    border-bottom: 1px solid transparent;    border-right: 1px solid transparent;    border-radius: 100%;    -webkit-animation: spinning 0.750s infinite linear;       -moz-animation: spinning 0.750s infinite linear;         -o-animation: spinning 0.750s infinite linear;            animation: spinning 0.750s infinite linear;}@-webkit-keyframes spinning {   from {-webkit-transform: rotate(0deg);}   to {-webkit-transform: rotate(359deg);}}@-moz-keyframes spinning {   from {-moz-transform: rotate(0deg);}   to {-moz-transform: rotate(359deg);}}@-o-keyframes spinning {   from {-o-transform: rotate(0deg);}   to {-o-transform: rotate(359deg);}}@keyframes spinning {   from {transform: rotate(0deg);}   to {transform: rotate(359deg);}}
          </style>
	</head>
	<body>
        <div class="preloader">
            <div class="do-loader"></div>
        </div>
		<div id="particles-js">
            <div class="loginBox">
                <img src=" {{ asset('assets/images/logo.jpg') }} " class="user">
                @if ($errors->any())
                    <div class="alert alert-danger alert-block" style="font-size:13px;">
                        <ul style="margin-bottom: 0px !important">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <h6>Form Register Akun Alumni</h6>
                    <p style="text-align:center; margin-bottom:20px;">Sistem Informasi Bursa Kerja Khusus <br> SMKN 1 Kota Bengkulu</p>
                @endif
                <form method="post" action="{{ route('alumni.register') }}">
                    {{ csrf_field() }} {{ method_field("POST") }}
                    <p>Username Login (Tanpa Spasi)</p>
                    <input type="text" value="{{ old('usernameLogin') }}" name="usernameLogin" placeholder="masukan username">
                    <p>Nama Lengkap</p>
                    <input type="text" value="{{ old('namaLengkap') }}" name="namaLengkap" placeholder="masukan nama lengkap">
                    <p>Email</p>
                    <input type="text" value="{{ old('email') }}" name="email" placeholder="masukan email">
                    <p>Password</p>
                    <input type="password" name="password" placeholder="••••••">

                    <button type="submit" name="submit" style="margin-bottom:10px;r"><i class="fa fa-check-circle"></i>&nbsp; Daftar</button>

                    <a style="font-weight:100; font-size:12px; color:white;">Sudah memiliki akun?</a> <a href="{{ route('login') }}" style="font-weight:100; font-size:12px;" ><u>Login Disini</u></a>
                </form>
            </div>
        </div>
    </body>
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('assets/particles/particles.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('assets/particles/app.js') }} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    {{-- <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script> --}}
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        $(window).on('load', function(){
        // will first fade out the loading animation
        jQuery(".status").fadeOut();
        // will fade out the whole DIV that covers the website.
        jQuery(".preloader").delay(0).fadeOut("slow");

      });
      @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
            toastr.options = {"closeButton": true,"debug": false,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
            toastr.options = {"closeButton": true,"debug": false,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
            toastr.options = {"closeButton": true,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
            toastr.options = {"closeButton": true,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                toastr.error("{{ Session::get('message') }}");
                break;
        }
      @endif
    </script>
</html>