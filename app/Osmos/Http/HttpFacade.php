<?php
/**
 * Created by PhpStorm.
 * User: tomscerri
 * Date: 23/12/18
 * Time: 9:09 PM
 */

namespace App\Osmos\Http;

use Illuminate\Support\Facades\Facade;

class HttpFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'http';
    }
}
