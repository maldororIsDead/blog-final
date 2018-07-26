<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->summary,
            'body' => str_limit($this->body, 200),
            'thumbnail' => $this->getFirstMediaUrl('images'),
        ];
    }
}
