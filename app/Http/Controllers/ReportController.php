<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use Intervention\Image\Laravel\Facades\Image; 
use Intervention\Image\Encoders\WebpEncoder; 

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'desc');
        $status = $request->input('status');

        $query = Report::query();

        if (Auth::user()->role !== 'admin') {
            $query->where('user_id', Auth::id());
        }

        if ($request->filled('status')) {
            $query->where('status_id', $status);
        }

        $reports = $query->orderBy('created_at', $sort)
                         ->paginate(9)
                         ->withQueryString();

        $statuses = Status::all();

        return view('reports.index', compact('reports', 'statuses', 'sort', 'status'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'path_img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
        ]);

        $imagePath = null;

        if ($request->hasFile('report_image')) {
            $imageFile = $request->file('report_image');
            $img = Image::read($imageFile);
            $img->scaleDown(width: 800);
            $encoded = $img->encode(new WebpEncoder(quality: 80));
            
            $imagePath = 'reports/' . time() . '.webp';
            Storage::disk('public')->put($imagePath, $encoded->toString());
        }

        Report::create([
            'number' => $request->number,
            'description' => $request->description,
            'report_image' => $imagePath,
            'user_id' => Auth::id(),
            'status_id' => 1, 
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Ваше заявление успешно создано!');
    }

    public function edit(Report $report)
    {
        if (Auth::user()->role !== 'admin' && $report->user_id !== Auth::id()) {
            abort(403);
        }
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        if (Auth::user()->role !== 'admin' && $report->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'number' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $report->update($request->only('number', 'description'));

        return redirect()->route('reports.index')->with('success', 'Данные обновлены');
    }

    public function destroy(Report $report)
    {
        if (Auth::user()->role !== 'admin' && $report->user_id !== Auth::id()) {
            abort(403);
        }

        if ($report->report_image) {
            Storage::disk('public')->delete($report->report_image);
        }

        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Заявление удалено');
    }

    public function show(Report $report)
    {
        if (Auth::user()->role !== 'admin' && $report->user_id !== Auth::id()) {
            abort(403);
        }
        return view('reports.show', compact('report'));
    }
}