<?php

namespace App\Http\Controllers;

use App\Models\report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $reports = report::all(); 
        return view('report.index', compact('reports'));
    }

    public function destroy(Report $report){
        $report->delete();
        return redirect()->back();
    }

    public function store(Request $request, report $report){
        $data =$request -> validate([
            'number' => 'string',
            'description' => 'text',
        ]);

        $report->create($data);
        return redirect()->back();
    }
}
