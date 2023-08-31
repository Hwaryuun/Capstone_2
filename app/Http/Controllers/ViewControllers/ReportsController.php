<?php


namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use App\Models\CategoryTypeModel;
use App\Models\PartialModel;
use App\Models\OrdersModel;
use App\Models\OrderedItemsModel;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerModel;

class ReportsController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:Reports-view|Reports-edit|Reports-create|Reports-delete', ['only' => ['index','show']]);

    }


    public function index(){
   
        $daiki2 = ProductsModel::leftJoin('ordered_items', 'ordered_items.product_id', '=', 'products.id')                         
                                ->selectRaw('products.*,  products.name as prodname,  SUM(ordered_items.price) as sales, ordered_items.created_at as dateb')    
                                ->groupByRaw('products.name, WEEK(ordered_items.created_at)')
                                ->orderBy('products.name')
                                ->whereNot('ordered_items.price', 0)
                                ->get();
           
        $daiki23 = ProductsModel:: leftJoin('productpricing', 'productpricing.product_id', '=', 'products.id')  
                                ->leftJoin('usercart', 'usercart.pricing_id', '=', 'productpricing.id')
                                ->leftJoin('partialorder', 'partialorder.cart_id', '=', 'usercart.id')             
                                ->selectRaw('products.*,  products.name as prodname,  SUM(partialorder.price) as salesw')    
                                ->groupByRaw('products.name, WEEK(partialorder.created_at)')
                                ->orderBy('products.name')
                                ->whereNot('partialorder.price', 0)
                                ->get();

    
        $daiki3 = CategoryTypeModel::leftJoin('category', 'category.categorytype_id', '=', 'categorytype.id')
                                ->leftJoin('products', 'products.category_id', '=', 'category.id')                                
                                ->leftJoin('ordered_items', 'ordered_items.product_id', '=', 'products.id')                        
                                ->selectRaw('categorytype.*,  SUM(ordered_items.price) as sales ,  categorytype.typename as nme')    
                                ->groupBy('categorytype.id')
                                // ->groupByRaw('WEEK(ordered_items.created_at)')
                                ->get();


        $orders = OrderedItemsModel::withTrashed()->with('Orders')->get();
        $orders2 = PartialModel::with(['Orders','ClientAcc','Carts'])->get(); 

    
        return view('Admin.Preview.Reports', ['orders' => $orders, 'orders2' => $orders2,  'daiki2'=>$daiki2,  'daiki23'=>$daiki23,
        'daiki3' =>   $daiki3  
       
      ]);
    }

}
