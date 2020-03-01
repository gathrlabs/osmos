<?php
/**
 * Created by PhpStorm.
 * User: tomscerri
 * Date: 23/12/18
 * Time: 9:14 PM
 */

namespace App\Osmos\Maps\EndPoints;

use App\Osmos\EndPoint;
use GuzzleHttp\Promise\Promise;

class AutoCompletePlace extends EndPoint
{
    protected $stem = '/geocoding/v5/mapbox.places/';

    protected $url;

    protected $parameters = '&autocomplete=true&country=au&types=country%2Cregion%2Cdistrict%2Cpostcode%2Clocality%2Cneighborhood%2Cplace';

    /**
     * @var string
     */
    protected $client = 'maps-api';

    public function validator(array $data)
    {
        return \Validator::make($data, [
            'unsanitized_location' => 'required|string'
        ]);
    }

    public function handle(array $data)
    {
        $this->generateUrl($data['unsanitized_location']);
        $response = $this->get($this->url);

        return $response;
    }

    protected function generateUrl($location)
    {
        $sanitizedLocation = filter_var($location, FILTER_SANITIZE_URL);
        $this->url = $this->stem . $sanitizedLocation . '.json?access_token=' . config('maps-api.connections.mapbox.key') . $this->parameters;
        return;
    }
}
