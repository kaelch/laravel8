<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:/user r,web', ['only' => ['index']]);
        $this->middleware('permission:/user c,web', ['only' => ['store']]);
        $this->middleware('permission:/user u,web', ['only' => ['update']]);
        $this->middleware('permission:/user d,web', ['only' => ['destroy']]);
    }

    public function index()
    {
        return '유저 정보 리스트 출력';
    }

    public function store()
    {
        return '신규 유저 등록';
    }

    public function update()
    {
        return '기존 유저 수정';
    }

    public function destroy()
    {
        return '유저 삭제';
    }
}
