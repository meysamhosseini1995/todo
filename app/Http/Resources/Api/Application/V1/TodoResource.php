<?php

namespace App\Http\Resources\Api\Application\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class TodoResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'todo_body' => $this->todo_body,
            'is_completed' => $this->is_completed,
            'creator' => (new UserResource($this->whenLoaded('user')))->setIsSimple(true),
            'created_at' => $this->created_at,
        ];
    }


}
