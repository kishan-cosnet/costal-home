<?php

namespace App\Http\Controllers;

use App\Models\ClientReviewType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientReviewTypeController extends Controller
{
    // List all client review types
    public function index()
    {
        $clientReviewTypes = ClientReviewType::all();
        return view('client_review_types.index', compact('clientReviewTypes'));


    }

    // Store a new client review type
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'crt_name' => 'required|string|max:100',
            'crt_description' => 'required|string',
            'crt_status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);

        }

        $clientReviewType = ClientReviewType::create($request->all());

        return response()->json(['success' => 'Client Review Type added successfully.', 'data' => $clientReviewType]);

    }

    // Get a specific client review type
    public function show($id)
    {
        $clientReviewType = ClientReviewType::findOrFail($id);
        return response()->json($clientReviewType);
    }

    // Update a client review type
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'crt_name' => 'required|string|max:100',
            'crt_description' => 'required|string',
            'crt_status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $clientReviewType = ClientReviewType::findOrFail($id);
        $clientReviewType->update($request->all());

        return response()->json(['success' => 'Client Review Type updated successfully.', 'data' => $clientReviewType]);
    }

    // Delete a client review type
    public function destroy($id)
    {
        $clientReviewType = ClientReviewType::findOrFail($id);
        $clientReviewType->delete();

        return response()->json(['success' => 'Client Review Type deleted successfully.']);
    }
}
