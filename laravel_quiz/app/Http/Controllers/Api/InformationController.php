<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Information;

class InformationController extends Controller
{
    // api/informationにGETされた時の処理
    public function index()
    {
        $informations = Information::orderby('id', 'desc')->get();

        return $informations;
    }
}
