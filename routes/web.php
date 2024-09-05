<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractFinishReasonController;
use App\Http\Controllers\BookingCancellationTypeController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ClientReviewTypeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PublicHolidayController;

// Route::get('/', function () { return view('welcome'); });

Route::get('/', [CustomAuthController::class, 'index'])->name('/');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
// Route::get('dashboard', [CustomAuthController::class, 'dashboard']);

Route::middleware(['auth'])->group(function () {
    // Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Services controler route calls
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    //Contracts Finish reasons controler route calls
    Route::get('contract-finish-reasons', [ContractFinishReasonController::class, 'index'])->name('contract-finish-reasons.index');
    Route::post('contract-finish-reasons', [ContractFinishReasonController::class, 'store'])->name('contract-finish-reasons.store');
    Route::get('contract-finish-reasons/{id}/edit', [ContractFinishReasonController::class, 'edit'])->name('contract-finish-reasons.edit');
    Route::put('contract-finish-reasons/{id}', [ContractFinishReasonController::class, 'update'])->name('contract-finish-reasons.update');
    Route::delete('contract-finish-reasons/{id}', [ContractFinishReasonController::class, 'destroy'])->name('contract-finish-reasons.destroy');
    Route::post('contract-finish-reasons/import', [ContractFinishReasonController::class, 'import'])->name('contract-finish-reasons.import');
    Route::get('contract-finish-reasons/sample-csv', [ContractFinishReasonController::class, 'downloadSampleCsv'])->name('contract-finish-reasons.sample-csv');

    //Booking Cancellation Types controler route calls
    Route::get('booking-cancellation-types', [BookingCancellationTypeController::class, 'index'])->name('booking-cancellation-types.index');
    Route::post('booking-cancellation-types', [BookingCancellationTypeController::class, 'store'])->name('booking-cancellation-types.store');
    Route::get('booking-cancellation-types/{id}/edit', [BookingCancellationTypeController::class, 'edit'])->name('booking-cancellation-types.edit');
    Route::put('booking-cancellation-types/{id}', [BookingCancellationTypeController::class, 'update'])->name('booking-cancellation-types.update');
    Route::delete('booking-cancellation-types/{id}', [BookingCancellationTypeController::class, 'destroy'])->name('booking-cancellation-types.destroy');
    Route::post('booking-cancellation-types/import', [BookingCancellationTypeController::class, 'import'])->name('booking-cancellation-types.import');
    Route::get('booking-cancellation-types/sample-csv', [BookingCancellationTypeController::class, 'downloadSampleCsv'])->name('booking-cancellation-types.sample-csv');

    //Leave Types controler route calls
    Route::get('leave-types', [LeaveTypeController::class, 'index'])->name('leave-types.index');
    Route::post('leave-types', [LeaveTypeController::class, 'store'])->name('leave-types.store');
    Route::get('leave-types/{id}/edit', [LeaveTypeController::class, 'edit'])->name('leave-types.edit');
    Route::put('leave-types/{id}', [LeaveTypeController::class, 'update'])->name('leave-types.update');
    Route::delete('leave-types/{id}', [LeaveTypeController::class, 'destroy'])->name('leave-types.destroy');
    Route::post('leave-types/import', [LeaveTypeController::class, 'import'])->name('leave-types.import');
    Route::get('leave-types/sample-csv', [LeaveTypeController::class, 'downloadSampleCsv'])->name('leave-types.sample-csv');

    //Client Review Types controler route calls
    Route::get('client-review-types', [ClientReviewTypeController::class, 'index'])->name('client-review-types.index');
    Route::post('client-review-types', [ClientReviewTypeController::class, 'store'])->name('client-review-types.store');
    Route::get('client-review-types/{id}/edit', [ClientReviewTypeController::class, 'show'])->name('client-review-types.show');
    Route::put('client-review-types/{id}', [ClientReviewTypeController::class, 'update'])->name('client-review-types.update');
    Route::delete('client-review-types/{id}', [ClientReviewTypeController::class, 'destroy'])->name('client-review-types.destroy');

    //Teams controler route calls
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::post('/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
    Route::post('/teams/import', [TeamController::class, 'import'])->name('teams.import');
    Route::get('/teams/sample', [TeamController::class, 'downloadSampleCsv'])->name('teams.sample');

    //Public Holidays controler route calls
    Route::get('holidays', [PublicHolidayController::class, 'index'])->name('holidays.index');
    Route::post('holidays', [PublicHolidayController::class, 'store'])->name('holidays.store');
    Route::get('holidays/{id}/edit', [PublicHolidayController::class, 'edit'])->name('holidays.edit');
    Route::post('holidays/{id}', [PublicHolidayController::class, 'update'])->name('holidays.update');
    Route::delete('holidays/{id}', [PublicHolidayController::class, 'destroy'])->name('holidays.destroy');
    Route::post('holidays/import', [PublicHolidayController::class, 'import_hld'])->name('holidays.import');
    Route::get('holidays/sample', [PublicHolidayController::class, 'downloadSampleCsv'])->name('holidays.sample');

    //Contracts controler route calls
    Route::get('contracts', [ContractController::class, 'index'])->name('contracts.index');
    Route::get('contracts/create', [ContractController::class, 'create'])->name('contracts.create');
    Route::post('contracts', [ContractController::class, 'store'])->name('contracts.store');
    Route::get('contracts/{id}/edit', [ContractController::class, 'edit'])->name('contracts.edit');
    Route::put('contracts/{id}', [ContractController::class, 'update'])->name('contracts.update');
    Route::delete('contracts/{id}', [ContractController::class, 'destroy'])->name('contracts.destroy');


    

    //HTML View calls
    Route::get('/announcements', function () { return view('Announcements.index'); })->name('announcements');
    Route::get('/concerns', function () { return view('Concerns.index'); })->name('concerns');
    Route::get('/leave-requests', function () { return view('Leave.requests'); })->name('leave-requests');
    Route::get('/booking-types', function () { return view('Booking.types'); })->name('booking-types');
    Route::get('/calendar-booking', function () { return view('Calendar.booking'); })->name('calendar-booking');
    Route::get('/carers', function () { return view('Carers.index'); })->name('carers.index');
    Route::get('/carers/create', function () { return view('Carers.create'); })->name('carers.create');
    Route::get('/clients', function () { return view('Clients.index'); })->name('clients.index');
    // Route::get('/teams', function () { return view('Teams.index'); })->name('teams.index');
    Route::get('/people', function () { return view('People.index'); })->name('people.index');
    Route::get('/pricing', function () { return view('Pricing.index'); })->name('pricing.index');
    Route::get('/reconciliation', function () { return view('Reconciliation.index'); })->name('reconciliation.index');
    Route::get('/account', function () { return view('Account.index'); })->name('account.index');
    Route::get('/reports', function () { return view('Reports.index'); })->name('reports.index');
    Route::get('/publishing', function () { return view('Publishing.index'); })->name('publishing.index');
    Route::get('/shifts', function () { return view('Shifts.index'); })->name('shifts.index');
    Route::get('/late-arrivals', function () { return view('Alerts.late-arrivals'); })->name('late-arrivals');
    Route::get('/missed-tasks', function () { return view('Alerts.missed-tasks'); })->name('missed-tasks');
    Route::get('/missed-booking', function () { return view('Alerts.missed-booking'); })->name('missed-booking');
    Route::get('/missed-medications', function () { return view('Alerts.missed-medications'); })->name('missed-medications');
    Route::get('/note-reviews', function () { return view('Alerts.note-reviews');})->name('note-reviews');


    
    
});
