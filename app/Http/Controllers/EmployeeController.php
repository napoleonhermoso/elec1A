<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use Validator;
Use Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$employee = employee::all();
        //return $employee;
        
        
        $employee = employee::paginate(4);
        
        return view('employeelist')->with('employee',$employee);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('addemployeeform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
    //     return $request->input('employeeid').
    //     $request->input('fname').
    //    $request->input('middlename').
    //     $request->input('lastname');
        // $employee = new employee;
        // $employee->employeeid = $request->input('employeeid');
        // $employee->fname = $request->input('fname');
        // $employee->middlename = $request->input('middlename');
        // $employee->lastname = $request->input('lastname');
        // $employee->save();

        $validator = Validator::make($request->all(),
            [
                "employeeid" => "required|min:4|max:5|unique:employees",
                "fname"=>"required|min:2|max:26",
                "middlename"=>"required|min:2|max:16",
                "lastname"=>"required|min:2|max:16"
            ]
        );
        if($validator->fails()){
                // return back()
                // ->withErrors($validator)->withInput();
                return redirect("/employees/create")
                ->withErrors($validator)->withInput();
        }
        // $request->validate([
        //     "employeeid" => "required|min:4|max:5|unique:employees",
        //     "fname"=>"required|min:2|max:26",
        //     "middlename"=>"required|min:2|max:16",
        //     "lastname"=>"required|min:2|max:16"
        // ]);    
        
        employee::create([
            "employeeid"=>$request->employeeid,
            "fname"=>$request->fname,
            "middlename"=>$request->middlename,
            "lastname"=>$request->lastname
        ]);
        $msg = "Employee Successfully Added";
        Log::notice($msg);
        Log::info($msg);
        Log::alert($msg);
        return redirect("/employees")
        ->with("msg","Employee Successfully Added");
        // echo "Successfully Added";
  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employee = employee::find($id); 
        return view("showEmployee")->with("employee",$employee);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        //return $id;
        $employee = employee::find($id);
        //return $employee;
        return view("editEmployeeForm")->with("employee",$employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
       //return $id;
       $employee = employee::find($id);
       $employee->fname = $request->fname;
       $employee->middlename = $request->middlename;
       $employee->lastname = $request->lastname;
       $employee->save();
       echo "Successfully Saved!";
       //return $employee;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        employee::destroy($id);
        echo "Successfully Deleted!";
    }
}
