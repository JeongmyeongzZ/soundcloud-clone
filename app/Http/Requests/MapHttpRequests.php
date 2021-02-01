<?php


namespace App\Http\Requests;


use Illuminate\Http\Request;
use JsonMapper;
use JsonMapper_Exception;
use ReflectionClass;
use ReflectionException;
use RuntimeException;
use Symfony\Component\HttpFoundation\ParameterBag;

trait MapHttpRequests
{
    /**
     * @param ParameterBag $request
     * @param string $className
     * @return mixed|object
     * @throws ReflectionException
     */
    public function mapHttpRequestToRequestObject(ParameterBag $request, string $className)
    {
        try {
            $mapper = new JsonMapper();
            $mapper->bIgnoreVisibility = true;

            return $mapper->map(
                $request,
                (new ReflectionClass($className))->newInstanceWithoutConstructor()
            );
        } catch (JsonMapper_Exception $exception) {
            throw new RuntimeException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}
