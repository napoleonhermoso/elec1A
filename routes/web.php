<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\PagesController;

Route::get('/maintenance',[PagesController::class,'downmaintenance']);

Route::get('/', function () {
    return view('welcome');
})->Middleware("maintenancemw");

Route::get('/try/{msg}',[PagesController::class,'redirectme'])
->name("redirectRoute");

Route::get('try2',[PagesController::class,'anothermsg']);

Route::get('/redirect',function(){
    // return redirect()->route("redirectRoute",
    // ["msg"=>"Hello World!"]
    // );
    return redirect()
    ->action([PagesController::class,'anothermsg']);
});

Route::resource('/employees',EmployeeController::class)
->Middleware("maintenancemw");

Route::get('/employeesa', function () {
    // $employees = [
    //     "name"=>"Napoleon",
    //     "age"=>26,
    //     "department"=>"IT Department"
    // ];
    $grade =-10;
    $age = 1;
    $employees = array(
        array("name"=>"Maria","age"=>26,"department"=>"Marketing Department"),
        array("name"=>"Juan","age"=>27,"department"=>"IT Department"),
        array("name"=>"Ahmed","age"=>28,"department"=>"Accounting Department")
    );

    // $employees = array();

    return view('employee')
    ->with('grade',$grade)
    ->with('age',$age)
    ->with('employees',$employees);
})->Middleware("maintenancemw");
