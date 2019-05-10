<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
  /**
   * Transform the resource collection into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      'name' => $this->name,
      'overall_rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star') / $this->reviews->count()) : '',
      'total_price' => round((1 - ($this->discount / 100)) * $this->price, 2),
      'href' => [
        'detail' => route('products.show', $this->id)
      ]
    ];
  }
}
