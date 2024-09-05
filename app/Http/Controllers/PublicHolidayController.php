<?php

namespace App\Http\Controllers;

use App\Models\PublicHoliday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;
use League\Csv\Writer;

class PublicHolidayController extends Controller
{
    // Show holiday listing
    public function index()
    {
        $holidays = PublicHoliday::all();
        return view('Holidays.index', compact('holidays'));
    }

    // Store a new holiday
    public function store(Request $request)
    {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'hld_name' => 'required|string|max:100',
            'hld_date' => 'required|date',
            'hld_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        PublicHoliday::create($request->all());

        return response()->json(['success' => 'Public holiday added successfully.']);
    }

    // Edit a specific holiday
    public function edit($id)
    {
        $holiday = PublicHoliday::find($id);
        return response()->json($holiday);
    }

    // Update a holiday
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'hld_name' => 'required|string|max:100',
            'hld_date' => 'required|date',
            'hld_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $holiday = PublicHoliday::find($id);
        $holiday->update($request->all());

        return response()->json(['success' => 'Public holiday updated successfully.']);
    }

    // Delete a holiday
    public function destroy($id)
    {
        PublicHoliday::find($id)->delete();
        return response()->json(['success' => 'Public holiday deleted successfully.']);
    }

    // Import holidays from CSV
    public function import_hld(Request $request)
    {
        dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'csv_file' => 'required|file|mimes:csv,txt',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        $path = $request->file('csv_file')->getRealPath();
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();
        $importedCount = 0;

        foreach ($records as $record) {
            // $rowValidator = Validator::make($record, [
            //     'hld_name' => 'required|string|max:100',
            //     'hld_date' => 'required|date',
            //     'hld_description' => 'nullable|string',
            // ]);

            // if ($rowValidator->fails()) {
            //     continue;
            // }

            PublicHoliday::create($record);
            $importedCount++;
        }

        return response()->json(['success' => "$importedCount leave types imported successfully."]);
    }

    // Download sample CSV file
    public function downloadSampleCsv()
    {
        $header = ['hld_name', 'hld_date', 'hld_description'];

        $csv = Writer::createFromString('');
        $csv->insertOne($header);
        $csv->insertOne(['Sample Holiday', '2024-01-01', 'Sample Description']);

        $filename = 'sample_public_holidays.csv';

        return response((string) $csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}
