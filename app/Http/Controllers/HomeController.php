<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

// 前端控制器
class HomeController extends Controller
{
    public function __construct()
    {
        //
    }

    // 主页
    public function index()
    {
        return view('home.main.index');
    }

    // 登录
    public function login()
    {
    }

    // 注册
    public function register()
    {
    }

}