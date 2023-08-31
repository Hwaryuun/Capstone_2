<?php


namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DesignModel;
use App\Models\FeaturedModel;
use App\Models\TemplatesModel;
use Illuminate\Validation\Rule;
use Exception;
use Illuminate\Support\Facades\File;
use App\Models\AuditLogModel;

class DesignController extends Controller
{

  function __construct()
  {
      $this->middleware('role_or_permission:Designs-view|Designs-edit|Designs-create|Designs-delete', ['only' => ['index','show']]);
      $this->middleware('role_or_permission:Designs-edit', ['only' => ['edit','update']]);
      $this->middleware('role_or_permission:Designs-create', ['only' => ['create','store']]);
      $this->middleware('role_or_permission:Designs-delete', ['only' => ['destroy']]);
  }


  public function index(){

    $designs = DesignModel::orderBy('name')->get();

    $countd = DesignModel::where('status', "Active")->count();
    $countf = FeaturedModel::where('status', "Active")->count();
    $countt = TemplatesModel::where('status', "Active")->count();

    return view('Admin.Preview.Design', [
        
        'designs' => $designs,     
        'countd' => $countd,
        'countf' => $countf,
        'countt' => $countt,

    ]);
  }

    public function create(){
        return view('Admin.AddPreview.AFTDesign');    
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>['required',Rule::unique('design', 'name')],
            'imagef'=>'required',
            'imageb'=>'required',
            'status' => 'required',
        ]);
    
          $input = $request->all();   

          if($image = $request->file('imagef')) {
            $destination = 'images/Clientfile_img';
            $pimage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destination,$pimage);
            $input['imagef'] = "$pimage";
          }

          if($imagex = $request->file('imageb')) {
            $destinations = 'images/Clientfile_img';
            $pimages = time().".".$imagex->getClientOriginalExtension();
            $imagex->move($destinations,$pimages);
            $input['imageb'] = "$pimages";
          }

              
          $audits = array(
            'user_id' =>  auth()->user()->id,
            'activity' => "Create",
            'description' => $request->name. " Has Created From Design Module", 
          );
          AuditLogModel::create($audits);   

          DesignModel::create($input);  

          return back()->with('successAdd','Design Added Successfully!');
    }

    public function edit($id){
        $designs = DesignModel::findorFail($id);
        // Select * from category where id = 1;
        return view('Admin.UpdatePreview.UDesign',[
            'designs' => $designs
        ]);    
    }

    public function update(Request $request, $id){
        $designs = DesignModel::findorFail($id);
        $this->validate($request,[
            'name'=>['required',Rule::unique('design', 'name')->ignore($designs->id)],
            'status' => 'required',
        ]);

        $audits = array(
          'user_id' =>  auth()->user()->id,
          'activity' => "Update",
          'description' =>  $designs->name." Has Updated to ".$request->name. "  From Design Module", 
        );
         AuditLogModel::create($audits); 
    
       
        $input = $request->all();

        if($image = $request->file('imagef')) {
            $destination = 'images/Clientfile_img';
            $pimage = date('Ms').".".$image->getClientOriginalExtension();
            $image->move($destination,$pimage);
            $input['imagef'] = "$pimage";
          }
        else{
            unset($input['imagef']);
        }

          if($imagex = $request->file('imageb')) {
            $destination = 'images/Clientfile_img';
            $pimages = time().".".$imagex->getClientOriginalExtension();
            $imagex->move($destination,$pimages);
            $input['imageb'] = "$pimages";
          }
        else{
            unset($input['imageb']);
        }

        $designs->update($input);

        return back()->with("successupd","Design Has Been Updated !");
    }

    public function destroy($id){
        

        $design = DesignModel::findorfail($id);
        $audits = array(
          'user_id' =>  auth()->user()->id,
          'activity' => "Delete",
          'description' =>  $design->name." Has Deleted From Design Module", 
        );
        AuditLogModel::create($audits);  


        $design->delete();
        return back()->with('successdel',"Design Has Been Deleted !");
    }

    
    public function DSarchive(){
      $designs = DesignModel::onlyTrashed()->get();
      return view('Admin.ArchivePreview.DesignARC',[
          'designs' => $designs,      
      ]);
  }

  public function DSdestroy($id){
      $designs = DesignModel::onlyTrashed()->findorfail($id);

      try{          
        $audits = array(
          'user_id' =>  auth()->user()->id,
          'activity' => "Delete : Archives",
          'description' =>  $designs->name." Has Deleted Permanently From Design Module", 
         );
        $designs->forcedelete();
        AuditLogModel::create($audits);  
      }catch(exception $e){
          return back()->with('Cannot',"This Design is Connected to another Branch !");
      }
    
      return back()->with('successdel',"Design Has Been Deleted Pemanently !");
  }

  public function DSstore($id){
      $designs = DesignModel::onlyTrashed()->findorfail($id);
      $audits = array(
        'user_id' =>  auth()->user()->id,
        'activity' => "Restore : Archives",
        'description' =>  $designs->name." Has Restored From Design Module", 
      );
      AuditLogModel::create($audits);  
      $designs->restore();
      return back()->with('restor',"Design Has Restore Successfully !");
  }
}
