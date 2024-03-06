<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\District;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke()
    {
        $applications = Application::where('status_id', 2)->latest()->take(6)->get();
        return view('index', ['applications' => $applications, 'districts' => District::all(), 'categories' => Category::all()]);
    }
}
