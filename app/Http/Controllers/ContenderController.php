<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContenderRequest;
use App\Contender;


/*
* Contenter - Candidates related actions
*/
class ContenderController extends Controller
{
    //
    public function create(ContenderRequest $request){
        $valid_inputs = $validated = $request->validated();
        if (array_key_exists('id',$valid_inputs)) unset($valid_inputs['id']);
        try{
            $new_contender = Contender::create($valid_inputs);
        }catch (\Illuminate\Database\QueryException $exception) {
            return $exception->errorInfo;
        }
        return ['message'=>'Will create a contender','New Contender'=>$new_contender,'request'=> $valid_inputs];
    }
    public function get($request,$id){
        try{
            $contender = Contender::where(['id'=>$id]);
        }catch (\Illuminate\Database\QueryException $exception) {
            return $exception->errorInfo;
        }
    }
    public function get_active(){
        return ['contenders'=>Contender::active()->get(['name','status','id'])];
    }
    public function get_inactive(){
        return ['contenders'=>Contender::inactive()->get(['name','status','id'])];
    }
    public function get_by_email(Request $request,$email){

    }
    public function activate($request,$uuid){

    }
    public function confirm(){

    }
}
