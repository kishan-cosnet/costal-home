<?php

namespace App\Http\Controllers;

use App\Models\ContractFinishReason;
use Illuminate\Http\Request;
use Validator;
use League\Csv\Reader;
use League\Csv\Writer;

class ContractFinishReasonController extends Controller
{
    public function index()
    {
        $reasons = ContractFinishReason::all();
        return view('contract_finish_reasons.index', compact('reasons'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reason_name' => 'required|string|max:100',
            'reason_description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        ContractFinishReason::create([
            'reason_name' => $request->reason_name,
            'reason_description' => $request->reason_description,
        ]);

        return response()->json(['success' => 'Reason added successfully.']);
    }

    public function edit($id)
    {
        $reason = ContractFinishReason::find($id);
        return response()->json($reason);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'reason_name' => 'required|string|max:100',
            'reason_description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $reason = ContractFinishReason::find($id);
        $reason->update([
            'reason_name' => $request->reason_name,
            'reason_description' => $request->reason_description,
        ]);

        return response()->json(['success' => 'Reason updated successfully.']);
    }

    public function destroy($id)
    {
        ContractFinishReason::find($id)->delete();
        return response()->json(['success' => 'Reason deleted successfully.']);
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
        $csv->setHeaderOffset(0); // Assume the CSV has a header row

        $records = $csv->getRecords();
        $importedCount = 0;

        foreach ($records as $record) {
            // Validate each row data
            $rowValidator = Validator::make($record, [
                'reason_name' => 'required|string|max:100',
                'reason_description' => 'required|string',
            ]);

            if ($rowValidator->fails()) {
                continue; // Skip invalid rows
            }

            // Create new ContractFinishReason
            ContractFinishReason::create([
                'reason_name' => $record['reason_name'],
                'reason_description' => $record['reason_description'],
            ]);

            $importedCount++;
        }

        return response()->json(['success' => "$importedCount reasons imported successfully."]);
    }

    public function downloadSampleCsv()
    {
        $header = ['reason_name', 'reason_description'];

        // Create a new CSV writer instance
        $csv = Writer::createFromString('');

        // Insert the header
        $csv->insertOne($header);

        // Insert sample data (optional)
        $csv->insertOne(['Project Completion', 'The project has been completed successfully.']);
        $csv->insertOne(['Mutual Agreement', 'The contract was terminated by mutual agreement.']);

        // Generate a filename and return the CSV as a response
        $filename = 'sample_contract_finish_reasons.csv';

        return response((string) $csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }

}
