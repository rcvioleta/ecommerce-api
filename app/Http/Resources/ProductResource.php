<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      'name' => $this->name,
      'description' => $this->detail,
      'price' => $this->price,
      'discount' => $this->discount,
      'stock' => $this->stock !== 0 ? $this->stock : 'Out of Stock',
      'overall_rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star') / $this->reviews->count()) : 'No ratings yet',
      'total_price' => round((1 - ($this->discount / 100)) * $this->price, 2),
      'href' => [
        'reviews' => route('reviews.index', $this->id)
      ]
    ];
  }
}
