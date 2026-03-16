<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        if($sort == 'asc' || $sort == 'desc'){
            $reports = Report::orderBy('created_at', $sort)
                ->paginate(8);
        } else {
            $reports = Report::paginate(8);
        }

        $statuses = Status::all();
        return view('reports.index', compact('reports','statuses'));

        $status = $request->input('status');
        $validate = $request->validate([
            'status' => "exists:statuses,id"
        ]);
        if($validate){
            $reports = Report::where('status_id', $status)
                    ->paginate(8);
        } else {
            $reposrts = Report::paginate(8);
        }
    }

    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|max:20',
            'description' => 'required|string'
        ]);

        Report::create($request->all());
        return redirect()->route('reports.index');
    }

    public function edit(Report $report)
    {
        return view('report.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $report->update($request->all());
        return redirect()->route('reports.index');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index');
    }
}