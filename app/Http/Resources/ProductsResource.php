<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->product_name,
            'slug' => $this->product_slug,
            'price' => $this->product_price,
            'created_at_d' => date_format($this->created_at, 'd/m/Y'),
            'created_at_h' => date_format($this->created_at, 'H:i'),
        ];
    }
}
