<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Not found response
     */
    public function notFound()
    {
        return response()->json([
            'code' => 404,
            'message' => 'The specified resource was not found'
        ], 404);
    }

    /**
     * Bad request response
     */
    public function badRequest()
    {
        return response()->json([
            'code' => 400,
            'message' => 'The request was invalid or cannot be served'
        ], 400);
    }
}
