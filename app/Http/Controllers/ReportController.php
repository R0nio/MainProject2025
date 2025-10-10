<?php

namespace App\Http\Controllers;

use App\Models\report;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

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
        $data = $request -> validate([
            'number' => 'string',
            'description' => 'string',
        ]);

        $report->create($data);
        return redirect()->back();
    }

    public function edit(report $report){
        return view('report.edit', compact('report'));
    }

    public function update(Request $request, report $report){
        $data = $request -> validate([
           'number' => 'string',
           'description' => 'string', 
        ]);

        $report ->update($data);
        return redirect()->back();
    }
}
