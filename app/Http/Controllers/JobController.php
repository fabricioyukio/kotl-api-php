<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendValidateApplicantEmail;

class JobController extends Controller
{
    //
    public function proccessQueue(){
        $emailJob = new SendValidateApplicantEmail();
        dispatch($emailJob);
    }

}
