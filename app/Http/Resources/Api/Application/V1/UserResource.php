<?php

namespace App\Http\Resources\Api\Application\V1;

use App\Traits\IsSimple;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class UserResource extends JsonResource
{
    use IsSimple;
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->checkSimple($this->email),
            'created_at' => $this->checkSimple($this->created_at),
        ];
    }


}
