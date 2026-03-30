<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'desc');
        $status = $request->input('status');

        $query = Report::where('user_id', Auth::id());

        if ($status) {
            $query->where('status_id', $status);
        }

        $reports = $query->orderBy('created_at', $sort)->paginate(9);
        $statuses = Status::all();

        return view('reports.index', compact('reports', 'statuses', 'sort', 'status'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|string',
            'description' => 'required|string',
        ]);

        $data['user_id'] = Auth::id();
        $data['status_id'] = 1;      

        Report::create($data); 

        return redirect()->route('reports.index');
    }

    public function show(Report $report)
    {
        if (Auth::id() === $report->user_id) {
            return view('reports.show', compact('report'));
        }
        abort(403);
    }

    public function edit(Report $report)
    {
        if (Auth::id() === $report->user_id) {
            return view('reports.edit', compact('report'));
        }
        abort(403);
    }

    public function update(Request $request, Report $report)
    {
        if (Auth::id() === $report->user_id) {
            $data = $request->validate([
                'number' => 'required|string',
                'description' => 'required|string',
            ]);
            $report->update($data);
            return redirect()->route('reports.index');
        }
        abort(403);
    }

    public function destroy(Report $report)
    {
        if (Auth::id() === $report->user_id) {
            $report->delete();
            return redirect()->route('reports.index');
        }
        abort(403);
    }

    public function statusUpdate(Request $request, Report $report)
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);

        $report->update($request->only(['status_id']));
        
        return redirect()->back()->with('success', 'Статус обновлен');
    }
}