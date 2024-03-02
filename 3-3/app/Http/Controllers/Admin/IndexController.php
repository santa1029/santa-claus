<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Sale;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index() {

        $monthlysales = Sale::all()->take(2);

        $thismonthsales = $monthlysales->first();

        $totalpackagessalesthismonth = $thismonthsales->bronze_accounts_amount + $thismonthsales->silver_accounts_amount
            + $thismonthsales->gold_accounts_amount + $thismonthsales->diamond_accounts_amount;

        $totalresetssalesthismonth = $thismonthsales->reset_bronze_accounts_amount + $thismonthsales->reset_silver_accounts_amount
            + $thismonthsales->reset_gold_accounts_amount + $thismonthsales->reset_diamond_accounts_amount;

        $totalpackagessalesthismonthproyected = $totalpackagessalesthismonth * now()->daysInMonth /  now()->day;

        $previousmonthsales = $monthlysales->last();

        $totalpackagessalespreviousmonth = $previousmonthsales->bronze_accounts_amount+ $previousmonthsales->silver_accounts_amount
            + $previousmonthsales->gold_accounts_amount + $previousmonthsales->diamond_accounts_amount;

        $totalresetssalespreviousmonth = $previousmonthsales->reset_bronze_accounts_amount + $previousmonthsales->reset_silver_accounts_amount
            + $previousmonthsales->reset_gold_accounts_amount + $previousmonthsales->reset_diamond_accounts_amount;

        $totalresetssalesthismonthproyected = $totalresetssalesthismonth * now()->daysInMonth /  now()->day;

        $sales_labels = '';

        $sales_packages_bronze = '';
        $sales_packages_silver = '';
        $sales_packages_gold = '';
        $sales_packages_diamond = '';

        $sales_reset_bronze = '';
        $sales_reset_silver = '';
        $sales_reset_gold = '';
        $sales_reset_diamond = '';

        $total_monthly_sales = '';

        $sales_edu = '';

        $sales_trial = '';
        $sales_converted = '';

        $sales = Sale::all();

        foreach ($sales as $sale) {

            $sales_labels = $sales_labels . '"' . $sale->period . '", ';

            $sales_packages_bronze = $sales_packages_bronze . '"' . $sale->bronze_accounts_amount . '", ' ;
            $sales_packages_silver = $sales_packages_silver . '"' . $sale->silver_accounts_amount . '", ' ;
            $sales_packages_gold = $sales_packages_gold . '"' . $sale->gold_accounts_amount . '", ' ;
            $sales_packages_diamond = $sales_packages_diamond . '"' . $sale->diamond_accounts_amount . '", ' ;

            $sales_reset_bronze = $sales_reset_bronze . '"' . $sale->reset_bronze_accounts_amount . '", ' ;
            $sales_reset_silver = $sales_reset_silver . '"' . $sale->reset_silver_accounts_amount . '", ' ;
            $sales_reset_gold = $sales_reset_gold . '"' . $sale->reset_gold_accounts_amount . '", ' ;
            $sales_reset_diamond = $sales_reset_diamond . '"' . $sale->reset_diamond_accounts_amount . '", ' ;

            $sales_edu = $sales_edu . '"' . $sale->edu_accounts_amount . '", ' ;

            $sales_trial = $sales_trial . '"' . $sale->trials . '", ' ;
            $sales_converted = $sales_converted . '"' . $sale->converted_trials . '", ' ;

            $total_sales_this_month = $sale->bronze_accounts_amount + $sale->silver_accounts_amount + $sale->gold_accounts_amount + $sale->diamond_accounts_amount
                + $sale->reset_bronze_accounts_amount + $sale->reset_silver_accounts_amount + $sale->reset_gold_accounts_amount + $sale->reset_diamond_accounts_amount
                + $sale->edu_accounts_amount;
            $total_monthly_sales = $total_monthly_sales . '"' . $total_sales_this_month . '", ' ;

            }

        $no_of_packages['bronze'] = Account::where('active')->where('package','Bronze')->count();
        $no_of_packages['silver'] = Account::where('active')->where('package','Silver')->count();
        $no_of_packages['gold'] = Account::where('active')->where('package','Gold')->count();
        $no_of_packages['diamond'] = Account::where('active')->where('package','Diamond')->count();

        return view('admin.salesstats', compact('totalpackagessalesthismonth', 'totalpackagessalespreviousmonth', 'totalpackagessalesthismonthproyected',
            'totalresetssalesthismonth', 'totalresetssalespreviousmonth', 'totalresetssalesthismonthproyected',
            'sales_labels', 'total_monthly_sales',
            'sales_packages_bronze', 'sales_packages_silver', 'sales_packages_gold', 'sales_packages_diamond',
            'sales_reset_bronze', 'sales_reset_silver' , 'sales_reset_gold', 'sales_reset_diamond',
            'sales_edu', 'sales_trial', 'sales_converted', 'no_of_packages'
    ));
        }
}