<?php
namespace App\Osmos;

use App\Osmos\Http\Http;

abstract class EndPoint
{
    /**
     * @var Http
     */
    protected $http;
    /**
     * @var string
     */
    protected $url;
    /**
     * EndPoint constructor.
     */
    public function __construct()
    {
        // Resolve an instance of Http, configured for CouriersPlease
        $this->http = isset($this->client) ? resolve('http.' . $this->client) : resolve('http');
    }
    /**
     * @param $body
     * @param bool $throwException
     * @return mixed
     * @throws \Exception
     */
    protected function post($body, $throwException = true)
    {
        return $this->request('post', $body, $throwException);
    }
    /**
     * @param bool $throwException
     * @return mixed
     * @throws \Exception
     */
    protected function get($throwException = true)
    {
        return $this->request('get', null, $throwException);
    }

    protected function async($throwException = true)
    {
        return $this->request('async', null, $throwException);
    }


    /**
     * @param string $method
     * @param $body
     * @param bool $throwException
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    private function request(string $method, $body, $throwException = true)
    {
        $this->http->$method($this->url, $body ? collect($body) : null);
        if ($throwException && $this->http->fails()) {
            throw new \Exception('The API request failed for the following reason [' .
                $this->http->getReasonPhrase() . ': ' . $this->http->getBody() . ']');
        }
        if ($method == 'post' || $method == 'get') {
            $decoded = $this->http->getDecodedBody();
            if (isset($this->expects)) {
                \Validator::validate($decoded, $this->expects);
            }
            return $decoded;
        }
    }
}
