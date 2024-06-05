<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $title = (isset($title)) ? $title : config('app.web_title') ?>
    <title>{{ $title }} - 后台管理登录</title>
    <link rel="stylesheet" href="/res-manage/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="/res-manage/assets/css/site.css" type="text/css">
    <!--if lt IE 9-->
    <script type="text/javascript" src="/js/html5.js"></script>
    <script type="text/javascript" src="/js/respond.min.js"></script>
    <!--endif-->
    <script src="/js/jquery.js" type="text/javascript"></script>
    <script src="/js/jquery.form.js" type="text/javascript"></script>
    <script src="/js/bootstrap.js" type="text/javascript"></script>
</head>
<body>
<div class="loader-bg d-none">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<div class="auth-wrapper">
    <div class="auth-content text-center">
        {{--        <img src="assets/images/logo.png" alt="" class="img-fluid mb-4">--}}
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <div class="card-body">
                        <form id="form1">
                            <h4 class="mb-3 f-w-400">管理面板</h4>
                            <span style="color: #9b9b9b">
                            输入您的帐号密码以登录管理面板.
                        </span>
                            <div class="alert text-left alert-danger alert-dismissible fade show mt-2 d-none"
                                 role="alert">
                                <span></span>
                                <button type="button" class="close">×</button>
                            </div>
                            <hr>
                            <div class="form-group mb-3">
                                <input type="text" name="name" class="form-control" id="name" placeholder="帐号">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="密码">
                            </div>
                            {{--                            <div class="form-group mb-4 d-flex flex-row">--}}
                            {{--                                <input type="text" name="captcha" class="form-control" id="captcha" placeholder="验证码"--}}
                            {{--                                       style="width: 160px;">--}}
                            {{--                                <img style="cursor: pointer" id="captcha-img" class="ml-1" src="{{ captcha_src() }}">--}}
                            {{--                            </div>--}}
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                <input type="checkbox" name="rem" class="custom-control-input" id="rem"
                                       style="margin-top: -3px;">
                                {{ csrf_field() }}
                                <label class="custom-control-label" for="rem">记住我</label>
                            </div>
                            <button class="btn btn-block btn-info event-btn mb-3" type="button">
                            <span class="mr-1 spinner-border spinner-border-sm event-btn-spinner d-none"
                                  role="status"></span>
                                <span class="load-text event-btn-load-text d-none">Loading...</span>
                                <span class="btn-text event-btn-text">登 录</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        //
    });

    function evebtn_disable(e) {
        $(e).addClass('disabled');
        $(e).find('.event-btn-spinner').removeClass('d-none');
        $(e).find('.event-btn-load-text').removeClass('d-none');
        $(e).find('.event-btn-text').addClass('d-none');
    }

    function evebtn_enable(e) {
        $(e).removeClass('disabled');
        $(e).find('.event-btn-spinner').addClass('d-none');
        $(e).find('.event-btn-load-text').addClass('d-none');
        $(e).find('.event-btn-text').removeClass('d-none');
    }

    function res_captcha() {
        if ($('.event-btn').hasClass('disabled')) {
            return;
        }
        let dom = $('#captcha-img');
        let path = '{{ captcha_src() }}?x=' + Math.random();
        $(dom).attr('src', path);
    }

    $('#captcha-img').on('click', function (e) {
        res_captcha();
    });

    function is_alert(e) {
        let b = $('.card-body .alert');
        $(b).removeClass('d-none');
        $(b).find('span').html(e);
    }

    function alert_hide() {
        let dom = $('.card-body .alert');
        $(dom).addClass('d-none');
    }

    $('.card-body .alert button').on('click', function (e) {
        let dom = $(this).parent();
        $(dom).addClass('d-none');
    });

    $('.event-btn').on('click', function (e) {
        let $btn = this;
        let name = $("input[id='uname']").val();
        let pwd = $("input[id='password']").val();
        // let captcha = $("input[id='captcha']").val();
        let loader = $('.loader-bg');

        if ($($btn).hasClass('disabled')) {
            return;
        }

        if (name == '') {
            is_alert('请输入帐号');
            return;
        }
        if (pwd == '') {
            is_alert('请输入密码');
            return;
        }
        // if (captcha == '') {
        //     is_alert('请输入验证码');
        //     return;
        // }
        alert_hide();
        evebtn_disable($btn);
        $(loader).removeClass('d-none');

        $.ajax({
            url: "/manage/login",
            type: "POST",
            data: $('#form1').serialize(),
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                switch (data['t']) {
                    case "err":
                        console.log('1');
                        evebtn_enable($btn);
                        $("#form1")[0].reset();
                        $("#form1 input[id='name']").focus();
                        res_captcha();
                        is_alert(data['m']);
                        $(loader).addClass('d-none');
                        break;
                    case "suc":
                        window.location.href = "/manage";
                        break;
                }
            }
        });

    });
</script>
</body>
</html>