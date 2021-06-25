<?php

namespace App\Common;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\DataTransferObject;
use Symfony\Component\HttpFoundation\Response;

class ResponseData extends DataTransferObject  implements Responsable
{
    public int $status = 200;

    public ObjectData $data;

    public function toResponse($request): JsonResponse|Response
    {
        return response()->json(
            [
                'data' => $this->data->toArray(),
            ],
            $this->status
        );
    }
}
