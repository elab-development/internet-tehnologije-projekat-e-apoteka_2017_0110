<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ID' => $this->resource->id,
            'Naziv' => $this->resource->naziv,
            'Vlasnik' => $this->resource->vlasnik,
            'Adresa' => $this->resource->adresa,
            'Grad' => $this->resource->grad,
            'Website' => $this->resource->website
        ];
    }
}