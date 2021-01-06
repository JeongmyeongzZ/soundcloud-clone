<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Http\FormRequest;
use JsonMapper;
use JsonMapper_Exception;
use RuntimeException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class JsonMapperFactory
 * @package App\Http\Requests
 */
class JsonMapperFactory
{
    /**
     * @param string $className
     * @param ParameterBag $parameterBag
     * @return mixed
     */
    protected function createPayload(string $className, ParameterBag $parameterBag)
    {
        try {
            $jsonMapper = $this->createJsonMapper();

            /**
             * @var mixed $payload
             */
            $payload = $jsonMapper->map(
                $parameterBag,
                $jsonMapper->createInstance($className)
            );

            return $payload;
        } catch (JsonMapper_Exception $exception) {
            throw new BadRequestHttpException('Bad request.');
        }
    }

    /**
     * @param string $className
     * @param ParameterBag $parameterBag
     * @return array|mixed[]
     */
    protected function createPayloads(string $className, ParameterBag $parameterBag)
    {
        try {
            $jsonMapper = $this->createJsonMapper();

            /**
             * @var mixed $payloads
             */
            $payloads = $jsonMapper->mapArray(
                $parameterBag->all(),
                [],
                $className
            );

            return $payloads;
        } catch (JsonMapper_Exception $exception) {
            throw new BadRequestHttpException('Bad request.');
        }
    }

    /**
     * @return JsonMapper
     */
    private function createJsonMapper(): JsonMapper
    {
        try {
            //todo to base controller, or trait

            return $this->container->make(JsonMapper::class);
            return new JsonMapper();
        } catch (BindingResolutionException $exception) {
            throw new RuntimeException('can\'t resolve JsonMapper class.', 0, $exception);
        }
    }
}
