<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VoteRequest;
use App\Contender;
use App\Vote;
use App\Election;
use Carbon\Carbon;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function register(VoteRequest $request){
        $valid_inputs = $validated = $request->validated();
        if (array_key_exists('id',$valid_inputs)) unset($valid_inputs['id']);

        $today = Carbon::now();
        /* Check if is there some open election */
        $election = Election::open()->daily()->where('available_at',$today->toDateString())->first();

        $errors = [];
        $errorCode = 404;
        if(is_null($election)){
            $errors[] = ['election'=>'election.error.not_found'];
        }else{
            $contender = Contender::active()->find($valid_inputs['contender_id']);
            if(is_null($contender)){
                $errors[] = ['election'=>'contender.error.not_found'];
            }else{
                try{
                    $vote = Vote::create([
                        'election_id'=>$election->id,
                        'contender_id'=>$contender->id,
                        'voter_email'=>$valid_inputs['voter_email'],
                        'status'=>'CONFIRMED'
                    ]);
                    return response()->json([
                        'message'=>'vote.accepted',
                        'contender'=> $contender->toArray(),
                        'election'=> $election->toArray(),
                    ],202);
                }catch(\Exception $e){
                    $errors[]= ['vote'=>'vote.already_voted'];
                    $errorCode = 409;
                }
            }
        }

        return response()->json($errors,$errorCode);
    }
}
