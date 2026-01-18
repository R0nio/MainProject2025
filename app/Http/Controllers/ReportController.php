<?php

namespace App\Http\Controllers;

use App\Models\report;
use App\Models\Report as ModelsReport;
use App\Models\Status;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Encoders\WebpEncoder;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ReportController extends Controller
{
    public function index(Request $request)
    {

        $sort = $request->input('sort');
        if ($sort != 'asc' && $sort != 'desc') {
            $sort = 'desc';
        }

        $status = $request->input('status');
        $validate = $request->validate([
            'status' => "exists:statuses,id"
        ]);
        if ($validate) {
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

    public function destroy(Report $report)
    {
        if (Auth::user()->id === $report->user_id) {
            $report->delete();
            return redirect()->back();
        } else {
            abort(403, ' У вас нету прав для редактирования этой записи');
        }
    }

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'path_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // $imageName = time() . '.' . $request['path_img']->extension();
        // $request['path_img']->move(public_path('images'), $imageName);

        // $imageName = Storage::disk('public')->put('reports', $request->file('path_img'));


        $imageFile = $request->file('path_img');
        $img = Image::read($imageFile);
        $img->scaleDown(400);
        $encoded = $img->encode(new WebpEncoder(80));

        $imagePath = 'reports/' . time() . '.webp';
        Storage::disk('public')->put($imagePath, $encoded->toString());



        Report::create([
            'number' => $request->number,
            'description' => $request->description,
            'status_id' => 1,
            'path_img' => $imagePath,
            'user_id' => Auth::user()->id,
        ]);



        return redirect()->route('reports.index')->with('info', 'Заявление отправлено');
    }

    public function edit(report $report)
    {
        if (Auth::user()->id === $report->user_id) {
            return view('report.edit', compact('report'));
        } else {
            abort(403, ' У вас нету прав для редактирования этой записи');
        }
    }

    public function update(Request $request, report $report)
    {
        if (Auth::user()->id === $report->user_id) {
            try {
                $request->validate([
                    'number'      => 'required|string|max:255',
                    'description' => 'required|string',
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()
                    ->route('reports.edit', $report)
                    ->withErrors($e->validator)
                    ->withInput();
            }

            $report->update($request->only(['number', 'description']));

            return redirect()
                ->route('reports.index')
                ->with('success', 'Заявка успешно обновлена');
        } else {
            abort(403, ' У вас нету прав для редактирования этой записи');
        }
    }
    //     public function update(Request $request, Report $report)
    // {
    //     if (Auth::user()->id !== $report->user_id) {
    //         abort(403, 'У вас нет прав для редактирования этой записи');
    //     }
    //     try {
    //         $request->validate([
    //             'number'      => 'required|string|max:255',
    //             'description' => 'required|string',
    //         ]);
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return redirect()
    //             ->route('reports.edit', $report)
    //             ->withErrors($e->validator)
    //             ->withInput();
    //     }

    //     $report->update($request->only(['number', 'description']));

    //     return redirect()
    //         ->route('reports.index')
    //         ->with('success', 'Заявка успешно обновлена');
    // }

    public function statusUpdate(Request $request, report $report)
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id'
        ]);
        $report->update($request->only(['status_id']));
        return redirect()->back();
    }
}
