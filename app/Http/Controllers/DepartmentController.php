<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;

class DepartmentController extends Controller
{
    public function departments(){
        $select = DB::select('select * from departments');
        return view('departments')->with('name',$select);
    }
    public function add_dep(Request $request){
        $id = $request->id;
        $del_id = $request->del_id;
        if(isset($id)){
            $affected = DB::table('departments')->where('id', $id)->update([
              'name' => $request->name
            ]);
        }
        elseif(isset($del_id)){
            $affected = DB::table('departments')->where('id', $del_id)->delete();
        }
        else {
            $department = new Department;
            $department->name =  $request->name;
            $department->save();
        }
        return redirect()->route('departments')->with('success','Data Added successfully.');
    }
    
}
