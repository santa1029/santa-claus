<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserTransactionsController;
use App\Http\Controllers\Admin\AccountTransactionsController;
use App\Http\Controllers\Admin\EomBalanceController;
use App\Http\Controllers\Admin\PerformanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
Route::get('index', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('index/{mt4_account}', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/set_default_account/{account}', [App\Http\Controllers\DashboardController::class, 'set_default_account']);


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile']);
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword']);

Route::delete('/api/alert/{id}', [App\Http\Controllers\AlertController::class, 'deleteOneAlert']);
Route::delete('/api/alerts', [App\Http\Controllers\AlertController::class, 'deleteAllAlerts']);
Route::put('/api/alerts', [App\Http\Controllers\AlertController::class, 'seenAllAlerts']);

Route::get('/statements', [App\Http\Controllers\StatementController::class, 'index']);
Route::get('/statement/{id}', [App\Http\Controllers\StatementController::class, 'view']);
Route::get('/statements-year', [App\Http\Controllers\StatementController::class, 'index']);
Route::get('/statement-year/{id}', [App\Http\Controllers\StatementController::class, 'year_view']);

Route::get('/deposits', [App\Http\Controllers\DashboardController::class, 'deposits']);
Route::get('/fees', [App\Http\Controllers\DashboardController::class, 'fees']);
Route::get('/referral-fees', [App\Http\Controllers\DashboardController::class, 'referralFees']);
Route::get('/withdrawals', [App\Http\Controllers\DashboardController::class, 'withdrawals']);

Route::resource('/account-transactions', AccountTransactionsController::class);

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // page routes
        Route::get('/index', [App\Http\Controllers\Admin\AdminController::class, 'index']);
        Route::get('/accounts', [App\Http\Controllers\Admin\AdminController::class, 'accounts']);
        Route::get('/transactions/user', [App\Http\Controllers\Admin\AdminController::class, 'userTransactions']);
        Route::get('/transactions/account', [App\Http\Controllers\Admin\AdminController::class, 'accountTransactions']);
        Route::get('/eombalances/{account_id}', [App\Http\Controllers\Admin\AdminController::class, 'eomBalances']);
        Route::get('/statements', [App\Http\Controllers\Admin\AdminController::class, 'statements']);
        Route::get('/statements/{account_id}', [App\Http\Controllers\Admin\AdminController::class, 'statements']);
        Route::get('/statement/{id}', [App\Http\Controllers\StatementController::class, 'adminView']);
        Route::get('/statements-year', [App\Http\Controllers\Admin\AdminController::class, 'statementsYear']);
        Route::get('/statements-year/{account_id}', [App\Http\Controllers\Admin\AdminController::class, 'statementsYear']);
        Route::get('/statement-year/{id}', [App\Http\Controllers\StatementController::class, 'adminViewYear']);


        // api routes
        Route::resource('/api/users', UserController::class);
        Route::resource('/api/accounts', AccountController::class);
        Route::resource('/api/transactions', TransactionController::class);
        Route::resource('/api/user-transactions', UserTransactionsController::class);
        Route::resource('/api/account-transactions', AccountTransactionsController::class);
        Route::resource('/api/eombalances', EomBalanceController::class);
        Route::resource('/api/performance', PerformanceController::class);
        Route::delete('/api/statement/{id}', [App\Http\Controllers\StatementController::class, 'delete']);
    });
});