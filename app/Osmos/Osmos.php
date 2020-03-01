<?php
/**
 * Created by PhpStorm.
 * User: tomscerri
 * Date: 23/12/18
 * Time: 8:22 PM
 */

namespace App\Osmos;

class Osmos
{
    /**
     * Perform a http request with the given interaction.
     *
     * This performs the common validate and handle flow of end points.
     *
     * @param  string  $interaction
     * @param  array  $parameters
     * @return
     */
    public static function endPoint($endPoint, array $parameters)
    {
        $endPoint->validator($parameters)->validate();
        return $endPoint->handle($parameters);
    }
}
