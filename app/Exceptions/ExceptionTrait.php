<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
  public function apiException($request, $exception)
  {
    if ($this->isModelException($exception)) {
      return $this->errorResponse('Product not found');
    }

    if ($this->isHttpException($exception)) {
      return $this->errorResponse('Incorrect route');
    }

    return parent::render($request, $exception);
  }

  protected function isModelException($exception)
  {
    return $exception instanceof ModelNotFoundException;
  }

  protected function isHttpException($exception)
  {
    return $exception instanceof NotFoundHttpException;
  }

  protected function errorResponse($message)
  {
    return response()->json(["errors" => $message], Response::HTTP_NOT_FOUND);
  }
}
