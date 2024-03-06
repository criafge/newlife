<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Application;
use App\Models\Category;
use App\Models\District;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request)
    {
        if ($request !== null) {
            $applications = Application::whereIn('status_id', [2, 3])->where('category_id', $request->category_id)->where('district_id', $request->district_id)->get();
            return view('results', ['applications' => $applications, 'districts' => District::all(), 'categories' => Category::all()]);
        } else {
            return view('results', ['districts' => District::all(), 'categories' => Category::all()])->with('error', 'Объявление не найдено');
        }
    }
}
