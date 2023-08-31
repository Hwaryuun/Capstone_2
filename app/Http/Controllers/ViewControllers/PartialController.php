<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use App\Models\PartialModel;
use Illuminate\Http\Request;
use App\Models\AuditLogModel;

class PartialController extends Controller
{

   
    function __construct()
    {
        $this->middleware('role_or_permission:Orders-view|Orders-edit|Orders-create|Orders-delete', ['only' => ['index','show','PartialProgress','PartialFinished']]);
        $this->middleware('role_or_permission:Orders-edit', ['only' => ['edit','update', 'PartialUpdate']]);
        $this->middleware('role_or_permission:Orders-create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Orders-delete', ['only' => ['destroy']]);
    }

    public $sumeru;

    public function index(){

        $d1 = PartialModel::where('statusODR', 'New-Order') ->count();
        $d2 =PartialModel::where('statusODR', 'In-Progress') ->count();
        $d3 = PartialModel::where('statusODR', 'Finished') ->count();

        $this->sumeru = PartialModel::with(['Orders','ClientAcc', 'Carts'])->orderBy('created_at', 'desc')
        ->where('statusODR', 'New-Order') ->get();     

        return view('Admin.Preview.Partial', ['sumeru' => $this->sumeru, 'd1' => $d1, 'd2' => $d2 , 'd3' => $d3]);
    }

   public function PartialProgress(){


        $d1 = PartialModel::where('statusODR', 'New-Order') ->count();
       $d2 =PartialModel::where('statusODR', 'In-Progress') ->count();
       $d3 = PartialModel::where('statusODR', 'Finished') ->count();


        $this->sumeru = PartialModel::with('Orders')->orderBy('created_at', 'desc')
        ->where('statusODR', 'In-Progress') ->get();     
        return view('Admin.Preview.PartialProgress', ['sumeru' => $this->sumeru, 'd1' => $d1, 'd2' => $d2 , 'd3' => $d3]);
    }

    public function PartialFinished(){

        $d1 = PartialModel::where('statusODR', 'New-Order') ->count();
        $d2 =PartialModel::where('statusODR', 'In-Progress') ->count();
        $d3 = PartialModel::where('statusODR', 'Finished') ->count();

        $this->sumeru = PartialModel::with('Orders')->orderBy('created_at', 'desc')
        ->where('statusODR', 'Finished') ->get();     
        return view('Admin.Preview.PartialFinished', ['sumeru' => $this->sumeru, 'd1' => $d1, 'd2' => $d2 , 'd3' => $d3]);
    }
  
    public function PartialUpdate($id){

        $orders = PartialModel::findorfail($id);
     
        return view('Admin.UpdatePreview.UPartial', ['order' => $orders]);
    }
    public function update(Request $request, $id){


        // $orders = OrderedItemsModel::update([])->where($id);
        $segas = PartialModel::findorfail($id);
        $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Create",
            'description' =>  $segas->statusODR. " Order Status is Updated to " .  $request->status, 
          );
        AuditLogModel::create($audits);   
        $segas->update(['statusODR' => $request->status]);


        return back()->with('successupd','Order Status Updated To '.' '.$request->status);  
    }

}
