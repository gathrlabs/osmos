<?php

namespace App\Http\Controllers;

use App\Osmos\Maps\EndPoints\AutoCompletePlace;
use App\Osmos\Osmos;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function show(Request $request)
    {
        $response = Osmos::endPoint(new AutoCompletePlace, ['unsanitized_location' => $request->get('place')]);

        return $response;
    }
}
