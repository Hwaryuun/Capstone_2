<?php

namespace App\Http\Controllers;
use App\Models\OrderedItemsModel;
use App\Models\OrdersModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\PartialModel;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use App\Models\CategoryTypeModel;
use Carbon\Carbon;

class PrintPDFController extends Controller
{
    public function PrintPdfr($urdirs){
       
        $orders = OrderedItemsModel::withTrashed()->findorfail($urdirs);
     
        $pdf = Pdf::loadView('Admin.Preview.OrderPDF',['order' => $orders,]);
        return $pdf->download($orders->Orders->tracking_no.'-Order.pdf');
    }

    public function PrintPdfrPar($urdirs){
       
        $orders = PartialModel::findorfail($urdirs);
     
        $pdf = Pdf::loadView('Admin.Preview.PartialPDF',['order' => $orders,]);
        return $pdf->download($orders->Orders->tracking_no.'-Order.pdf');
    }

    public function PrintPdfrREPO(){
       
        $daiki2 = ProductsModel::leftJoin('ordered_items', 'ordered_items.product_id', '=', 'products.id')                         
        ->selectRaw('products.*,  products.name as prodname,  SUM(ordered_items.price) as sales, ordered_items.created_at as dateb')    
        ->groupByRaw('products.name, WEEK(ordered_items.created_at)')
        ->orderBy('products.name')
        ->whereNot('ordered_items.price', 0)
        ->get();

        $daiki23 = ProductsModel:: leftJoin('productpricing', 'productpricing.product_id', '=', 'products.id')  
                                ->leftJoin('usercart', 'usercart.pricing_id', '=', 'productpricing.id')
                                ->leftJoin('partialorder', 'partialorder.cart_id', '=', 'usercart.id')             
                                ->selectRaw('products.*,  products.name as prodname,  SUM(partialorder.price) as salesw, partialorder.created_at as dateb')    
                                ->groupByRaw('products.name, WEEK(partialorder.created_at)')
                                ->orderBy('products.name')
                                ->whereNot('partialorder.price', 0)
                                ->get();

  

        $pdf = Pdf::loadView('Admin.Preview.ReportsPDF',['daiki2' => $daiki2, 'daiki23' => $daiki23, ]);
        return $pdf->download(now()->format('Y-m-d').' Reports.pdf');
    }

    public function PrintPdfrSRVCS(){
       
        $daiki3 = CategoryTypeModel::leftJoin('category', 'category.categorytype_id', '=', 'categorytype.id')
        ->leftJoin('products', 'products.category_id', '=', 'category.id')                                
        ->leftJoin('ordered_items', 'ordered_items.product_id', '=', 'products.id')                        
        ->selectRaw('categorytype.*,  SUM(ordered_items.price) as sales ,  categorytype.typename as nme, ordered_items.created_at as nse')    
        ->groupBy('categorytype.id')
        // ->groupByRaw('WEEK(ordered_items.created_at)')
        ->get();

        $daiki4 = CategoryTypeModel::leftJoin('category', 'category.categorytype_id', '=', 'categorytype.id')
        ->leftJoin('products', 'products.category_id', '=', 'category.id')   
        ->leftJoin('productpricing', 'productpricing.product_id', '=', 'products.id')
        ->leftJoin('usercart', 'usercart.pricing_id', '=', 'productpricing.id')  
        ->leftJoin('partialorder', 'partialorder.cart_id', '=', 'usercart.id')                                                
        ->selectRaw('categorytype.*,  SUM(partialorder.price) as sales ,  categorytype.typename as nme, partialorder.created_at as nse')    
        ->groupBy('categorytype.id')
        // ->groupByRaw('WEEK(ordered_items.created_at)')
        ->get();




        $pdf = Pdf::loadView('Admin.Preview.ServicesPDF',['daiki3' => $daiki3, 'daiki4' => $daiki4 ]);
        return $pdf->download(now()->format('Y-m-d').'Service Reports.pdf');
    }

    
  
    public function PrintPdfrPROD(){
               
        $products = ProductsModel::orderBy('name')->with('Category')->get();

        $pdf = Pdf::loadView('Admin.Preview.ProdutctsPDF', ['products' => $products]);
        return $pdf->download(now()->format('Y-m-d').' Product Masterlist.pdf');

    }

    public function PrintPdfrWTRNS(){
               
        $sumeru = OrdersModel::withTrashed()->with('ClientAcc')->orderBy('created_at', 'desc')
        ->whereDate('created_at', '>=', Carbon::now()->subDays(7))
        ->get(); 

        $pdf = Pdf::loadView('Admin.Preview.WeeklyPDF', ['sumeru' => $sumeru]);
        return $pdf->download(now()->format('Y-m-d').' Weekly Transactions.pdf');

    }

    public function PrintPdfrMTRNS(){
               
      
        $sumeru = OrdersModel::withTrashed()->with('ClientAcc')->orderBy('created_at', 'desc')
        ->whereDate('created_at', '<=', Carbon::now()->subDays(30))
        ->get(); 

        $pdf = Pdf::loadView('Admin.Preview.Monthly', ['sumeru' => $sumeru]);
        return $pdf->download(now()->format('Y-m-d').' Monthly Transactions.pdf');

    }

    public function PrintPdfrATRNS(){
               
        $sumeru = OrdersModel::withTrashed()->with('ClientAcc')->orderBy('created_at', 'desc')->get(); 

        $pdf = Pdf::loadView('Admin.Preview.Allrep', ['sumeru' => $sumeru]);
        return $pdf->download(now()->format('Y-m-d').' All Transactions.pdf');

    }
}
