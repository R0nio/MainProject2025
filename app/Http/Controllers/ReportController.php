<?php

namespace App\Http\Controllers;

use App\Models\report;
use App\Models\Status;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function index(Request $request){

        $sort = $request->input('sort');
        if($sort !='asc' && $sort !='desc' ){
            $sort = 'desc';
        }

        $status = $request->input('status');
        $validate = $request->validate([
            'status' => "exists:statuses,id"
        ]);
        if($validate){
            $reports = report::where('status_id', $status)
                    ->orderBy('created_at', $sort)
                    ->simplePaginate(8);
        } else {
            $reports = report::orderBy('created_at', $sort)
                    ->simplePaginate(8);
        }

        $statuses = Status::all();

        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
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
