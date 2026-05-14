<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PizzaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this -> id,
            "name" => $this -> name,
            "size" => "{$this -> size} cm",
            "base" => $this -> base,
            "cheese_crust" => $this -> cheese_crust,
            "customer_id" => $this -> customer_id,
            "created_at" => $this -> created_at,
            "updated_at" => $this -> updated_at,
            "customer" => $this -> whenLoaded("customer")
        ];
    }
}
