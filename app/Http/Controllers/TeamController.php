<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;
use League\Csv\Writer;

class TeamController extends Controller
{
    // Display all teams
    public function index()
    {
        $teams = Team::all();
        return view('Teams.index', compact('teams'));
    }

    // Store a new team
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'team_name' => 'required|string|max:255',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Team::create($request->all());

        return response()->json(['success' => 'Team added successfully.']);
    }

    // Edit a team (retrieve data for a specific team)
    public function edit($id)
    {
        $team = Team::find($id);
        if ($team) {
            return response()->json($team);
        }
        return response()->json(['error' => 'Team not found'], 404);
    }

    // Update team data
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'team_name' => 'required|string|max:255',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $team = Team::find($id);
        if ($team) {
            $team->update($request->all());
            return response()->json(['success' => 'Team updated successfully.']);
        }

        return response()->json(['error' => 'Team not found'], 404);
    }

    // Delete a team
    public function destroy($id)
    {
        $team = Team::find($id);
        if ($team) {
            $team->delete();
            return response()->json(['success' => 'Team deleted successfully.']);
        }

        return response()->json(['error' => 'Team not found'], 404);
    }

    // Import teams from CSV
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
                'team_name' => 'required|string|max:255',
                'status' => 'required|string|in:Active,Inactive',
            ]);

            if ($rowValidator->fails()) {
                continue;
            }

            Team::create($record);
            $importedCount++;
        }

        return response()->json(['success' => "$importedCount teams imported successfully."]);
    }

    // Download sample CSV for teams
    public function downloadSampleCsv()
    {
        $header = ['team_name', 'status'];

        $csv = Writer::createFromString('');
        $csv->insertOne($header);
        $csv->insertOne(['Sample Team', 'Active']);

        $filename = 'sample_teams.csv';

        return response((string) $csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}
