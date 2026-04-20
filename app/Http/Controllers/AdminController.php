<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report; 
use App\Models\Status; 
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Report::with(['user', 'status'])->get();
        $statuses = Status::all();

        return view('admin.index', compact('reports', 'statuses'));
    }

    public function update(Request $request, Report $report): RedirectResponse
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);


        if ($report->status_id != 1) {
            return back()->with('error', 'Статус этого заявления уже был изменен и зафиксирован!');
        }

        $report->status_id = $request->status_id;
        $report->save();

        return back()->with('success', "Статус заявления успешно изменен на «{$report->status->name}»");
    }
}