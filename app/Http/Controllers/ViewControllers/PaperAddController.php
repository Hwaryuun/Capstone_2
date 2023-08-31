<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\CategoryTypeModel;
use Illuminate\Validation\Rule;

use App\Models\PapersModel;
use App\Models\PaperTypeModel;


class PaperAddController extends Controller
{
    public function show($id){

        $category = CategoryModel::findorFail($id);
        $cattypedata = CategoryTypeModel::orderBy('typename')
        ->select('id', 'typename')
        ->get();

        $papers = PapersModel::orderBy('name')
        ->select('id', 'name')
        ->where('status', "Active")
        ->get();

        $papertypes = PaperTypeModel::orderBy('name')
        ->select('id', 'name')
        ->where('status', "Active")
        ->get();

        return view('Admin.AddPreview.APaperAdd',[
            'category' => $category,
            'cattypedata' => $cattypedata,
            'papers' => $papers,
            'papertypes' => $papertypes,
        ]);    
    }
}
