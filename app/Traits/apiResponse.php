<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait apiResponse
{

    public function apiResponse($data = null, $message = 'تم تنفيذ العملية بنجاح', $status = Response::HTTP_OK)
    {
        $array = [
            "status" => $status,
            "response_message" => $message,
            "data" => $data,

        ];
        return response($array, 200);
    }
}