<?php

namespace App\Http\Controllers;

use App\Models\report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('created_at', $sort)
                    ->simplePaginate(8);
        } else {
            $reports = report::where('user_id', Auth::user()->id)
                    ->orderBy('created_at', $sort)
                    ->simplePaginate(8);
        }

        $statuses = Status::all();

        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
    }

    public function destroy(Report $report){
        if(Auth::user()->id === $report->user_id){
            $report->delete();
            return redirect()->back();
        }
        else{
            abort(403, ' У вас нету прав для редактирования этой записи');
        }
    }

    public function store(Request $request, report $report){
        $data = $request -> validate([
            'number' => 'string',
            'description' => 'string',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['status_id'] = 1;

        $report->create($data);
        return redirect()->back();
    }

    public function edit(report $report){
        if(Auth::user()->id === $report->user_id){
            return view('report.edit', compact('report'));
        }
        else{
            abort(403, ' У вас нету прав для редактирования этой записи');
        }
    }

    public function update(Request $request, report $report){
        if(Auth::user()->id === $report->user_id){
            $data = $request -> validate([
            'number' => 'string',
            'description' => 'string', 
            ]);

            $report ->update($data);
            return redirect()->back();
        }
        else{
            abort(403, ' У вас нету прав для редактирования этой записи');
        }
    }
}
