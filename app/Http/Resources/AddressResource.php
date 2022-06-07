<?php

namespace App\Http\Resources;

use App\Http\Resources\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'city'        => $this->city,
            'postal_code' => $this->postal_code,
            'country'     => new CountryResource($this->country),
            'default'     => $this->default
        ];
    }
}
