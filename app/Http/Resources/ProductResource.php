<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "id" => $this->id,
            "nameEn" => $this->nameEn,
            "nameAr" => $this->nameAr,
            "descriptionAr" => $this->descriptionAr,
            "descriptionEn" => $this->descriptionEn,
            "price" => $this->price,
            "amount" => $this->amount,
            "category_id" => $this->category_id,
        ];
    }
}