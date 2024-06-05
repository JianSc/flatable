<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $title = (isset($title)) ? $title : config('app.web_title') ?>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/css/site.css" type="text/css">
    <!--if lt IE 9-->
    <script type="text/javascript" src="/js/html5.js"></script>
    <script type="text/javascript" src="/js/respond.min.js"></script>
    <!--endif-->
    <script src="/js/jquery.js" type="text/javascript"></script>
    <script src="/js/jquery.form.js" type="text/javascript"></script>
    <script src="/js/bootstrap.js" type="text/javascript"></script>
</head>
<body>
<div class="container-fluid">
    @yield('content')
</div>
</body>
</html>