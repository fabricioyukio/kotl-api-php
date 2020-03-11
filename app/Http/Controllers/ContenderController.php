<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContenderRequest;
use App\Contender;
use App\Vote;
use App\Election;
use App\Jobs\SendValidateContenderEmailJob;


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
        if($new_contender){
            $response = [
                'message'=>'contender.welcome',
                'contender'=>$new_contender
            ];
            dispatch(new SendValidateContenderEmailJob($new_contender->id));
            return response()->json($response,201);
        }
        return response()->json(['message'=>'Not a valid input'],400);
    }
    public function get($request,$id){
        try{
            $contender = Contender::where(['id'=>$id]);
        }catch (\Illuminate\Database\QueryException $exception) {
            return $exception->errorInfo;
        }
    }
    public function get_active(){
        return ['contenders'=>Contender::select(['name','status','id','email'])->active()->get(['name','status','id','gravatar'])->makeHidden('email')];
    }
    public function get_inactive(){
        return ['contenders'=>Contender::select(['name','status','id','email'])->inactive()->get(['name','status','id','gravatar'])->makeHidden('email')];
    }
    public function get_by_email(Request $request,$email){

    }
    public function activate($request,$uuid){

    }
    public function confirmation($uuid){
        $contender = Contender::where('token',$uuid)->first();
        if($contender){
            if(strtoupper($contender->status)==='CREATED'){
                $contender->status = 'ACTIVE';
                if($contender->save()){
                    return response()->view('contender.confirmed',['contender'=>$contender],202);
                }
            }
            return response()->view('contender.confirmation_error',['contender'=>$contender],401);
        }else{
            return response()->view('contender.confirmation_failed',['erro'=>'Token inválido!'],400);
        }
    }
}
