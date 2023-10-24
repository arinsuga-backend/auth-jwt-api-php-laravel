<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;

class PostlikeController extends ResponseController
{
    //POST
    public function like(Request $request)
    {

        $success = [
            'code' => 200,
            'message' => 'POST like'
        ];
        return $this->sendResponse($success);

    }

    //POST
    public function dislike(Request $request)
    {

        $success = [
            'code' => 200,
            'message' => 'POST dislike'
        ];
        return $this->sendResponse($success);

    }

    //put
    public function clear(Request $request)
    {

        $success = [
            'code' => 200,
            'message' => 'PUT dislike'
        ];
        return $this->sendResponse($success);

    }

}
