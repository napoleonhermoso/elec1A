<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function redirectme($msg){
        echo $msg;
        return "This is the redirect controller message";
    }

    public function anothermsg(){
        return "Batman";
    }

    public function downmaintenance(){
        return "Sorry, This application is currently under maintenance!";
    }
}
