<?php

namespace App\Http\Controllers;

use App\Models\CatchModel;
use App\Models\Fisherman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatchController extends Controller
{
    public function index(Request $request)
    {
        $query = CatchModel::with(['fisherman', 'creator']);

        // SEARCH
        if ($request->filled('search')) {

            $search = $request->search;

            $query->whereHas('fisherman', function ($q) use ($search) {
                $q->where('full_ame', 'like', "%{$search}%");
            });

        }

        $catches = $query->latest()->paginate(10);

        return view('catches.index', compact('catches'));
    }

    public function create()
    {
        $fishermen = Fisherman::orderBy('full_name')->get();

        return view('catches.create', compact('fishermen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fisherman_id' => 'required|exists:fishermen,id',
            'delivery_date' => 'required|date',
            'total_weight' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string',
        ]);

        CatchModel::create([
            'fisherman_id' => $request->fisherman_id,
            'delivery_date' => $request->delivery_date,
            'total_weight' => $request->total_weight,
            'total_amount' => $request->total_amount,
            'remarks' => $request->remarks,
            'created_by' => Auth::id(),
        ]);

        return redirect()
            ->route('catches.index')
            ->with('success', 'Catch record created successfully.');
    }

    public function show(CatchModel $catch)
    {
        return view('catches.show', compact('catch'));
    }

    public function edit(CatchModel $catch)
    {
        $fishermen = Fisherman::orderBy('full_name')->get();

        return view('catches.edit', compact('catch', 'fishermen'));
    }

    public function update(Request $request, CatchModel $catch)
    {
        $request->validate([
            'fisherman_id' => 'required|exists:fishermen,id',
            'delivery_date' => 'required|date',
            'total_weight' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'remarks' => 'nullable|string',
        ]);

        $catch->update([
            'fisherman_id' => $request->fisherman_id,
            'delivery_date' => $request->delivery_date,
            'total_weight' => $request->total_weight,
            'total_amount' => $request->total_amount,
            'remarks' => $request->remarks,
        ]);

        return redirect()
            ->route('catches.index')
            ->with('success', 'Catch record updated successfully.');
    }

    public function destroy(CatchModel $catch)
    {
        $catch->delete();

        return redirect()
            ->route('catches.index')
            ->with('success', 'Catch record deleted successfully.');
    }
}