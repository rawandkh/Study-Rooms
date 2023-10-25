<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   return[
        'name'=>$this->name,
        'desription'=>$this->description,
        'user_name'=>$this->user_name,
        'created_at'=>$this->created_at
       
    ];
    }
}
