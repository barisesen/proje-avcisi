<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proje Avcisi Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="/admin/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/admin/css/style.default.css" id="theme-stylesheet">
    @yield('style')
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
    @yield('content')
    <script src="/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/admin/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/admin/vendor/chart.js/Chart.min.js"></script>
    <script src="/admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/admin/js/front.js"></script>
    @yield('js')
</body>
</html>