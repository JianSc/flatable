<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ManageController extends Controller
{
    public function __construct()
    {
        // 访问权限闭包中间件
        // 除 /manage/login 登录界面外其它都需要登录状态 auth('admin')->check();
        // 非登录状态除全部跳转到 /manage/login 界面
        $this->middleware(function ($request, $next) {
            if (!auth('admin')->check()) {
                return redirect('/manage/login');
            }
            return $next($request);
        })->except('login');
    }

    public function index()
    {
        return view('home.manage.index');
    }

    public function login(Request $request)
    {
        // Get
        if ($request->isMethod('get')) {
            if (auth('admin')->check()) {
                return redirect('/manage');
            } else {
                return view('home.manage.login');
            }

        }

        // Post
        if ($request->isMethod('post')) {
            //输入数据验证
            $v = validator($request->all(), [
                'name' => 'required|max:32|alpha_dash',
                'password' => 'required|min:3',
//                'captcha' => 'required|captcha|alpha_num',
            ], [
                'name.required' => '请输入帐号',
                'name.max' => '帐号最多只能输入32个字符',
                'password.required' => '请输入密码',
                'password.min' => '密码最少包含3个字符',
//                'captcha.required' => '请输入验证码',
//                'captcha.captcha' => '验证码错误',
            ]);

            $token = csrf_token();
            if ($request->input('_token') != $token) {
                return json_encode(['t' => 'err', 'm' => '拒绝连接']);
            }

            if ($v->fails()) {
                return json_encode(['t' => 'err', 'm' => $v->errors()->first()]);
            }

            $rem = !(($request->input('rem') == null));

            // auth 数据库帐号验证
            $b = auth('admin')->attempt([
                'name' => $request->input('name'),
                'password' => $request->input('password'),
            ], $rem);
            $a = auth('admin')->viaRemember();
            if (!$b) {
                return json_encode(['t' => 'err', 'm' => '帐号或密码错误']);
            }

            return json_encode(['t' => 'suc']);
        }
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect('/manage/login');

    }

}