<?php

namespace App\Http\Controllers;

use App\Models\CategoryByReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewCategoryGroupController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($category_id)
    {
        $groups = (new CategoryByReview())->getGroupsByCategory($category_id);

        return response()->json($groups, 200);
    }
}
