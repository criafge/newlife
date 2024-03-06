<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ChangeStatusController extends Controller
{

    public function __invoke(Request $request, Application $application)
    {
        $application->status_id = $request->status;
        $application->save();
        return redirect()->back()->with('success');
    }
}
