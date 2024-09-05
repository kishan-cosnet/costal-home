<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::all();
        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contract_name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|boolean',
        ]);

        Contract::create($request->all());

        return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contract = Contract::findOrFail($id);
        return view('contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contract = Contract::findOrFail($id);
        return view('contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'contract_name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|boolean',
        ]);

        $contract = Contract::findOrFail($id);
        $contract->update($request->all());

        return redirect()->route('contracts.index')->with('success', 'Contract updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();

        return redirect()->route('contracts.index')->with('success', 'Contract deleted successfully.');
    }
}
