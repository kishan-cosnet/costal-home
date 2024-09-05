<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;
use League\Csv\Writer;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $leaveTypes = LeaveType::all();
        return view('leave_types.index', compact('leaveTypes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lt_name' => 'required|string|max:100',
            'lt_description' => 'required|string',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        LeaveType::create($request->all());

        return response()->json(['success' => 'Leave Type added successfully.']);
    }

    public function edit($id)
    {
        $leaveType = LeaveType::find($id);
        return response()->json($leaveType);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'lt_name' => 'required|string|max:100',
            'lt_description' => 'required|string',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $leaveType = LeaveType::find($id);
        $leaveType->update($request->all());

        return response()->json(['success' => 'Leave Type updated successfully.']);
    }

    public function destroy($id)
    {
        LeaveType::find($id)->delete();
        return response()->json(['success' => 'Leave Type deleted successfully.']);
    }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $path = $request->file('csv_file')->getRealPath();
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();
        $importedCount = 0;

        foreach ($records as $record) {
            $rowValidator = Validator::make($record, [
                'lt_name' => 'required|string|max:100',
                'lt_description' => 'required|string',
                'status' => 'required|boolean',
            ]);

            if ($rowValidator->fails()) {
                continue;
            }

            LeaveType::create($record);
            $importedCount++;
        }

        return response()->json(['success' => "$importedCount leave types imported successfully."]);
    }

    public function downloadSampleCsv()
    {
        $header = ['lt_name', 'lt_description', 'status'];

        $csv = Writer::createFromString('');
        $csv->insertOne($header);
        $csv->insertOne(['Sample Leave', 'Sample description', '1']);

        $filename = 'sample_leave_types.csv';

        return response((string) $csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}
