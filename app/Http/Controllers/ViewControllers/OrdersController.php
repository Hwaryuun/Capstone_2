<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use App\Models\OrderedItemsModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;
use App\Models\AuditLogModel;

class OrdersController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:Orders-view|Orders-edit|Orders-create|Orders-delete', ['only' => ['index','show', 'OrdersProgress', 'OrdersFinished']]);
        $this->middleware('role_or_permission:Orders-edit', ['only' => ['OrdersUpdate','update']]);
        $this->middleware('role_or_permission:Orders-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Orders-delete', ['only' => ['destroy']]);
    }


    public $sumeru;

    public function index(){

        $d1 = OrderedItemsModel::withTrashed()->where('status', 'New-Order') ->count();
        $d2 =OrderedItemsModel::withTrashed()->where('status', 'In-Progress') ->count();
        $d3 = OrderedItemsModel::withTrashed()->where('status', 'Finished') ->count();

        $this->sumeru = OrderedItemsModel::withTrashed()->with('Orders')->orderBy('created_at', 'desc')
        ->where('status', 'New-Order') ->get();     

        return view('Admin.Preview.Orders', ['sumeru' => $this->sumeru, 'd1' => $d1, 'd2' => $d2 , 'd3' => $d3]);
   }

   public function OrdersProgress(){

        $d1 = OrderedItemsModel::withTrashed()->where('status', 'New-Order') ->count();
        $d2 =OrderedItemsModel::withTrashed()->where('status', 'In-Progress') ->count();
        $d3 = OrderedItemsModel::withTrashed()->where('status', 'Finished') ->count();

        $this->sumeru = OrderedItemsModel::withTrashed()->with('Orders')->orderBy('created_at', 'desc')
        ->where('status', 'In-Progress') ->get();     
        return view('Admin.Preview.OrdersInProgress', ['sumeru' => $this->sumeru, 'd1' => $d1, 'd2' => $d2 , 'd3' => $d3]);
    }

    public function OrdersFinished(){

        $d1 = OrderedItemsModel::withTrashed()->where('status', 'New-Order') ->count();
        $d2 =OrderedItemsModel::withTrashed()->where('status', 'In-Progress') ->count();
        $d3 = OrderedItemsModel::withTrashed()->where('status', 'Finished') ->count();

        $this->sumeru = OrderedItemsModel::withTrashed()->with('Orders')->orderBy('created_at', 'desc')
        ->where('status', 'Finished') ->get();     
        return view('Admin.Preview.OrdersFinished', ['sumeru' => $this->sumeru, 'd1' => $d1, 'd2' => $d2 , 'd3' => $d3]);
    }
  
    public function OrdersUpdate($id){

        $orders = OrderedItemsModel::withTrashed()->findorfail($id);
     
        return view('Admin.UpdatePreview.UOrder', ['order' => $orders]);
    }
    public function update(Request $request, $id){


        // $orders = OrderedItemsModel::update([])->where($id);
        $segas = OrderedItemsModel::withTrashed()->findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Create",
            'description' =>  $segas->status. " Order Status is Updated to " .  $request->status, 
          );
        AuditLogModel::create($audits);   
        $segas->update(['status' => $request->status]);


        return back()->with('successupd','Order Status Updated To '.' '.$request->status);  
    }




}
