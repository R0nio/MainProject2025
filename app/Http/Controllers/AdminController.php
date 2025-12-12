<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $reports = Report::all();
        $statuses = Status::all();
        return view('admin.index', compact('reports', 'statuses'));
    }
}
