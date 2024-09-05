<?php

namespace App\Http\Controllers;

use App\Models\BookingCancellationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;
use League\Csv\Writer;

class BookingCancellationTypeController extends Controller
{
    public function index()
    {
        $bookings = BookingCancellationType::all();
        return view('booking_cancellation_types.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booking_name' => 'required|string|max:100',
            'booking_description' => 'required|string',
            'booking_status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        BookingCancellationType::create($request->all());

        return response()->json(['success' => 'Booking Cancellation Type added successfully.']);
    }

    public function edit($id)
    {
        $booking = BookingCancellationType::find($id);
        return response()->json($booking);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'booking_name' => 'required|string|max:100',
            'booking_description' => 'required|string',
            'booking_status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $booking = BookingCancellationType::find($id);
        $booking->update($request->all());

        return response()->json(['success' => 'Booking Cancellation Type updated successfully.']);
    }

    public function destroy($id)
    {
        BookingCancellationType::find($id)->delete();
        return response()->json(['success' => 'Booking Cancellation Type deleted successfully.']);
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
                'booking_name' => 'required|string|max:100',
                'booking_description' => 'required|string',
                'booking_status' => 'required|boolean',
            ]);

            if ($rowValidator->fails()) {
                continue;
            }

            BookingCancellationType::create($record);
            $importedCount++;
        }

        return response()->json(['success' => "$importedCount booking cancellation types imported successfully."]);
    }

    public function downloadSampleCsv()
    {
        $header = ['booking_name', 'booking_description', 'booking_status'];

        $csv = Writer::createFromString('');
        $csv->insertOne($header);
        $csv->insertOne(['Sample Type', 'Sample description', '1']);

        $filename = 'sample_booking_cancellation_types.csv';

        return response((string) $csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}
