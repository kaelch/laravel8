<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:/product r,web', ['only' => ['index']]);
        $this->middleware('permission:/product c,web', ['only' => ['store']]);
        $this->middleware('permission:/product u,web', ['only' => ['update']]);
        $this->middleware('permission:/product d,web', ['only' => ['destroy']]);
    }

    public function index()
    {
        return '상품 정보 리스트 출력';
    }

    public function store()
    {
        return '신규 상품 등록';
    }

    public function update()
    {
        return '기존 상품 수정';
    }

    public function destroy()
    {
        return '상품 삭제';
    }
}
