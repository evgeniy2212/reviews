<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddComplainRequest;

class ComplainController extends Controller
{
    public function addComplain(AddComplainRequest $request){
        auth()->user()->complains()->attach($request->review_id, ['msg' => $request->msg]);

        return redirect()->back()->withSuccess([__('service/index.complain.success')]);
    }
}
