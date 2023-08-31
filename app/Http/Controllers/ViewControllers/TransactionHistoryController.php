<?php


namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use App\Models\OrderedItemsModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use App\Models\AuditLogModel;
use Carbon\Carbon;

class TransactionHistoryController extends Controller
{
    
    function __construct()
    {
        $this->middleware('role_or_permission:Transac-view|Transac-edit|Transac-create|Transac-delete', ['only' => ['index','show', 'allhistoryindex', 'monthlyindex']]);
        // $this->middleware('role_or_permission:Audit-edit', ['only' => ['edit','update']]);
        // $this->middleware('role_or_permission:Audit-create', ['only' => ['create','store']]);
        // $this->middleware('role_or_permission:Audit-delete', ['only' => ['destroy']]);
    }

    public function index(){
        // $date = Carbon::today();
        $sumeru = OrdersModel::withTrashed()->with('ClientAcc')->orderBy('created_at', 'desc')
        ->whereDate('created_at', '>=', Carbon::now()->subDays(7))
        ->get(); 

  
        return view('Admin.Preview.TransactionHistory', [ 'sumeru' => $sumeru]);
    }

    public function monthlyindex(){
       
        $sumeru = OrdersModel::withTrashed()->with('ClientAcc')->orderBy('created_at', 'desc')
        ->whereDate('created_at', '<=', Carbon::now()->subDays(30))
        ->get(); 
       
        return view('Admin.Preview.TransactionHistoryM', [ 'sumeru' => $sumeru]);
    }

    public function allhistoryindex(){

        $sumeru = OrdersModel::withTrashed()->with('ClientAcc')->orderBy('created_at', 'desc')->get(); 


        return view('Admin.Preview.TransactionHistoryA', [ 'sumeru' => $sumeru]);
    }

    
}
