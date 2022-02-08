<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\Designations;

class DesignationsController extends Controller

{
    
    public function designations(){
        
        $designation = Department::with('designations_r')->get();

        return view('designations', compact('designation'));
    }
    public function add_des(Request $request)
    {
        $request->validate([
            'designations' => 'required'
        ]);
        
        $del_id = $request->del_id;
        $edit_id = $request->edit_id;
        if(isset($del_id)){
            $affected = DB::table('designations')->where('id', $del_id)->delete();
        }
        elseif(isset($edit_id)){
            $affected = DB::table('designations')->where('id', $edit_id)->update([
                'department_id' => $request->id,
                'designations' => $request->designations
              ]);
        }
        else{
            $department = Department::find($request->id);
 
            $designation = new Designations;
            
            $designation->designations = $request->designations;
            
            $designation->department()->associate($department)->save();
        }
        return redirect()->route('designations')->with('success','Comment Added successfully.');
        
    }
}
