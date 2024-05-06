<?php

namespace App\Http\Controllers;

use App\Constants\ActivityStatus;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Activity::class);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Activity::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($row) {
                    return app('format')->dateIndo($row->date);
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                        <a href="' . route('dashboard.activities.show', $row->uuid) . '" class="btn btn-primary btn-sm">
                            <i class="bi bi-list-ul"></i>
                            Detail
                        </a> 
                        ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.dashboard.activities.index');
    }

    public function create()
    {
        return view('pages.dashboard.activities.create');
    }

    public function store(StoreActivityRequest $request)
    {
        try {
            Activity::create([
                'name' => $request->name,
                'place' => $request->place,
                'date' => $request->date,
                'attachment' => basename($request->file('attachment')->store('public/uploads/attachments')),
                'pic_id' => auth()->user()->pic->id
            ]);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function show(Activity $activity)
    {
        $documentations = $activity->documentations->sortByDesc('date')->groupBy('date');

        return view('pages.dashboard.activities.show', compact('activity', 'documentations'));
    }

    public function edit(Activity $activity)
    {
        return view('pages.dashboard.activities.edit', compact('activity'));
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        try {
            if ($request->hasFile('attachment')) {
                Storage::delete('public/uploads/attachments/' . $activity->attachment);
                $activity->attachment = basename($request->file('attachment')->store('public/uploads/attachments'));
            }

            $activity->name = $request->name;
            $activity->place = $request->place;
            $activity->date = $request->date;
            $activity->save();

            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('dashboard.activities.index')->with('success', 'Data berhasil dihapus');
    }

    public function confirm(Activity $activity)
    {
        try {
            $activity->status = ActivityStatus::CONFIRMED;
            $activity->save();

            return redirect()->route('dashboard.activities.show', $activity->uuid)->with('success', 'Data telah dikonfirmasi');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }
}
