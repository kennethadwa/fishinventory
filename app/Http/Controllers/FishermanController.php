<?php

namespace App\Http\Controllers;

use App\Models\Fisherman;
use Illuminate\Http\Request;

class FishermanController extends Controller
{


public function index(Request $request)
{
    $query = Fisherman::query();

    // SEARCH
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('full_name', 'like', '%' . $request->search . '%')
              ->orWhere('contact_number', 'like', '%' . $request->search . '%')
              ->orWhere('boat_name', 'like', '%' . $request->search . '%')
              ->orWhere('address', 'like', '%' . $request->search . '%');
        });
    }

    // FILTER
    if ($request->filled('status') && $request->status !== 'all') {
        $query->where('status', $request->status);
    }

    $fishermen = $query->latest()->paginate(10);

    // AJAX RESPONSE (IMPORTANT)
    if ($request->ajax()) {
        return view('fishermen.partials.table', compact('fishermen'))->render();
    }

    return view('fishermen.index', compact('fishermen'));
}

    public function create()
    {
        return view('fishermen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'status' => 'required',
        ]);

        Fisherman::create($request->all());

        return redirect()->route('fishermen.index')
            ->with('success', 'Fisherman added successfully');
    }

    public function show(Fisherman $fisherman)
{
    return view('fishermen.show', compact('fisherman'));
}

    public function edit(Fisherman $fisherman)
    {
        return view('fishermen.edit', compact('fisherman'));
    }

    public function update(Request $request, Fisherman $fisherman)
    {
        $request->validate([
            'full_name' => 'required',
            'status' => 'required',
        ]);

        $fisherman->update($request->all());

        return redirect()->route('fishermen.index')
            ->with('success', 'Information updated successfully');
    }

    public function destroy(Fisherman $fisherman)
    {
        $fisherman->delete();

        return redirect()->route('fishermen.index')
            ->with('success', 'Fisherman deleted successfully');
    }
}