<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_name' => 'required|string|max:255',
            'service_description' => 'required|string',
            'service_status' => 'required|boolean',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); 
        }

        Service::create($request->all());
        return response()->json(['success' => 'Service added successfully.']);
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return response()->json($service);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'service_name' => 'required|string|max:255',
            'service_description' => 'required|string',
            'service_status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $service = Service::find($id);
        $service->update($request->all());

        return response()->json(['success' => 'Service updated successfully.']);
    }

    public function destroy($id)
    {
        Service::find($id)->delete();
        return response()->json(['success' => 'Service deleted successfully.']);
    }
}
