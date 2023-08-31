<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\CategoryTypeModel;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreCategoryRequest;
use Exception;
use App\Models\AuditLogModel;

class AuditLogController extends Controller
{

    
    function __construct()
    {
        $this->middleware('role_or_permission:Audit-view|Audit-edit|Audit-create|Audit-delete', ['only' => ['index','show']]);
        // $this->middleware('role_or_permission:Audit-edit', ['only' => ['edit','update']]);
        // $this->middleware('role_or_permission:Audit-create', ['only' => ['create','store']]);
        // $this->middleware('role_or_permission:Audit-delete', ['only' => ['destroy']]);
    }
  

    public function index(){
        $audit = AuditLogModel::orderBy('created_at','desc')->with('UserLog')->get();
        return view('Admin.Preview.AuditLog', ['audit'=>$audit]);
   }
  
}
