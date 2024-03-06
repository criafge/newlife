<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationStoreRequest;
use App\Http\Requests\EditRequest;
use App\Models\Application;
use App\Models\Category;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-application', ['categories' => Category::all(), 'districts' => District::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApplicationStoreRequest $request)
    {
        $filename = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('public', $filename);
        Auth::user() != null ? $user = Auth::user()->id : $user = null;
        Application::create([
            'title' => $request->title,
            'description' => $request->description,
            'phone' => $request->phone,
            'user_id' => $user,
            'photo' => $filename,
            'category_id' => $request->category_id,
            'district_id' => $request->district_id,
        ]);
        return redirect()->back()->with('success', 'Успешный успех');
    }


    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('application', ['application' => $application, 'comments' => $application->comments]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        return view('edit', ['application' => $application, 'categories' => Category::all(), 'districts' => District::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Application $application)
    {
        $application->update($request->validated());
        return redirect()->back()->with('success', 'Объявление редактировано');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->back()->with('success', 'Успешный успех');
    }
}
