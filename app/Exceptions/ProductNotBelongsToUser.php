<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ProductNotBelongsToUser extends Exception
{
  public function render()
  {
    return response()->json([
      "errors" => "Product does not belong to user"
    ], Response::HTTP_UNAUTHORIZED);
  }
}
