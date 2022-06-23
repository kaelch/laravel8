<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:/system r,web', ['only' => ['index']]);
        $this->middleware('permission:/system c,web', ['only' => ['store']]);
        $this->middleware('permission:/system u,web', ['only' => ['update']]);
        $this->middleware('permission:/system d,web', ['only' => ['destroy']]);
    }

    public function index()
    {
        return '시스템 정보 리스트 출력';
    }

    public function store()
    {
        return '신규 시스템 등록';
    }

    public function update()
    {
        return '기존 시스템 수정';
    }

    public function destroy()
    {
        return '시스템 삭제';
    }
}
