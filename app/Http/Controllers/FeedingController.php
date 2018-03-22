<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;

class FeedingController extends Controller
{
    /**
     * POST
     * Feed the specified cats by updating their last_fed date
     *
     * @param  Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $catIds = $request->all();
        if (! $catIds) {
            return $this->badRequest();
        }

        $now = date('Y-m-d H:i:s');

        $cats = Cat::whereIn('id', $catIds)->count();
        if (! $cats) {
            return $this->notFound();
        }

        Cat::whereIn('id', $catIds)
            ->update(['last_fed' => $now]);

        return response(null, 200);
    }
}
