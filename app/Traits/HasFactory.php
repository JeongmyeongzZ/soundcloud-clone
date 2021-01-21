<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

trait HasFactory
{
    /**
     * Get a new factory instance for the model.
     *
     * @param  mixed  $parameters
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public static function factory(...$parameters)
    {
        $factory = static::newFactory() ?: Factory::factoryForModel(get_called_class());

        return $factory
            ->count(is_numeric($parameters[0] ?? null) ? $parameters[0] : null)
            ->state(is_array($parameters[0] ?? null) ? $parameters[0] : ($parameters[1] ?? []));
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        $a = get_called_class();

        $package = Str::before(get_called_class(), 'Models\\');
        $modelName = Str::after(get_called_class(), 'Models\\');

        $path = $package.'Database\\Factories\\'.$modelName.'Factory';

        return $path::new();
    }
}
