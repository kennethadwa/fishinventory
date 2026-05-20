<?php

namespace App\Http\Controllers;

use App\Models\FishType;
use Illuminate\Http\Request;

class FishTypeController extends Controller
{



public function index(Request $request)
{
    $query = FishType::query();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('fish_name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }

    $fishTypes = $query->latest()->paginate(10);

    // AJAX request → return only table body
    if ($request->ajax()) {
        return view('fish-types.partials.table', compact('fishTypes'))->render();
    }

    return view('fish-types.index', compact('fishTypes'));
}


    public function create()
    {
        return view('fish-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fish_name' => 'required',
            'default_buy_price' => 'nullable|numeric',
            'default_sell_price' => 'nullable|numeric',
        ]);

        FishType::create($request->all());

        return redirect()->route('fish-types.index')
            ->with('success', 'Fish type added successfully.');
    }

    public function show(FishType $fishType)
    {
        return view('fish-types.show', compact('fishType'));
    }

    public function edit(FishType $fishType)
    {
        return view('fish-types.edit', compact('fishType'));
    }

    public function update(Request $request, FishType $fishType)
    {
        $request->validate([
            'fish_name' => 'required',
            'default_buy_price' => 'nullable|numeric',
            'default_sell_price' => 'nullable|numeric',
        ]);

        $fishType->update($request->all());

        return redirect()->route('fish-types.index')
            ->with('success', 'Fish type updated successfully.');
    }

    public function destroy(FishType $fishType)
    {
        $fishType->delete();

        return redirect()->route('fish-types.index')
            ->with('success', 'Fish type deleted successfully.');
    }
}