<!DOCTYPE html>
<html lang="en">

<head>

    <title>{{$gn->site_name}}</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets/admin/')}}/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('assets/admin/')}}/css/style.css">




</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <form action="{{route('multivendorstore.login.submit')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <img src="{{asset($gn->logo)}}" style="height: 50px;width: 170px;" alt="" class="img-fluid mb-4">
                            <h4 class="mb-3 f-w-400">Signin</h4>
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">Email address</label>
                                <input type="text" name="email" class="form-control" id="Email" placeholder="">
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="password" name="password" class="form-control" id="Password" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary mb-4">Signin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{asset('assets/admin/')}}/js/vendor-all.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/plugins/bootstrap.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/ripple.js"></script>
<script src="{{asset('assets/admin/')}}/js/pcoded.min.js"></script>



</body>

</html>
