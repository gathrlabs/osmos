<?php

namespace App\Osmos\Http;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use GuzzleHttp\Promise\Promise;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Created by PhpStorm.
 * User: tomscerri
 * Date: 23/12/18
 * Time: 8:52 PM
 */

class Http
{
    /**
     * Guzzle
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Setting http_errors to false in the request options stops guzzle from throwing exceptions for 4xx/5xx responses.
     * We are going to represent these response types with the $this->failed property as to prevent us constantly
     * having to try/catch request that often fail. We don't consider this a 'strict exception' as such. Examples
     * of this would be a request that checks if a record exists on the server. Just because the record does not
     * exist, does not mean we take exception to this. We would prefer this be represented in state than an
     * exception. You can read more on this, and guzzles requestOptions in general at the link below.
     * http://docs.guzzlephp.org/en/stable/request-options.html
     *
     * @var array
     */
    protected $requestOptions = [
        'http_errors' => false
    ];

    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $response;

    /**
     * Will be true if the response code is anything other than 200.
     * @var bool
     */
    protected $failed = false;


    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Accepts an array that will be used as the base of the request options for the client. As we are currently using
     * the Guzzle client you can see the list of request options at the url below.
     * http://docs.guzzlephp.org/en/stable/request-options.html
     *
     * @param array $config
     * @return $this
     */
    public function config(array $config)
    {
        $this->requestOptions = array_merge($this->requestOptions, $config);
        return $this;
    }

    /**
     * Allows the addition of headers to the request.
     *
     * @param array $headers
     * @return $this
     */
    public function addHeaders(array $headers)
    {
        // If headers were previously set, we merge the array provided.
        // Otherwise we simply set with the values provided.
        $this->requestOptions['headers'] = isset($this->requestOptions['headers'])
            ? array_merge($this->requestOptions['headers'], $headers)
            : $headers;

        return $this;
    }

    /**
     * Calling the debug method adds the debug = true flag to the request options. This causes Guzzle to output the
     * request stream. Handy if you are having issues with the request.
     *
     * @return $this
     */
    public function debug()
    {
        $this->requestOptions = array_merge($this->requestOptions, [ 'debug' => true ]);
        return $this;
    }

    /**
     * @param $url
     * @param $body
     * @return $this
     */
    public function post($url, $body = null)
    {
        if ($body) {
            $this->addBody($body);
        }

        return $this->request('post', $url);
    }

    /**
     * @param $url
     * @return $this
     */
    public function get($url, $query = null)
    {
        if ($query) {
            $this->addQuery($query);
        }

        return $this->request('get', $url);
    }

    /**
     * @param $url
     * @param $body
     * @return $this
     */
    public function put($url, $body = null)
    {
        if ($body) {
            $this->addBody($body);
        }

        return $this->request('put', $url);
    }

    /**
     * @param $url
     * @return $this
     */
    public function delete($url)
    {
        return $this->request('delete', $url);
    }

    /**
     * An async get request method.
     * @param $url
     */
    public function async($url)
    {
        $promise = $this->client->requestAsync('GET', $url, $this->requestOptions);
        $promise->then(
            function (ResponseInterface $res) {
                $this->response = $res;
            },
            function (RequestException $e) {
                $this->failed = !Str::startsWith($this->response->getStatusCode(), 2);

                return $this;
            }
        );

        $promise->wait();

        return $this;
    }

    /**
     * @param $method
     * @param null $body
     * @return $this
     */
    protected function request($method, $url)
    {
        $this->response = $this->client->$method($url, $this->requestOptions);

        // If the response status code is anything other than a 2xx, we mark the request as failed.
        $this->failed = !Str::startsWith($this->response->getStatusCode(), 2);

        return $this;
    }

    /**
     * Returns the underlying Guzzle PSR-7 response.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Returns the status code from the http response.
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    /**
     * Returns the status 'code' as a human readable phrase.
     *
     * @return string
     */
    public function getReasonPhrase(): string
    {
        return $this->response->getReasonPhrase();
    }

    /**
     * Convenience method for accessing the PSR-7 response stream.
     */
    public function getStream(): StreamInterface
    {
        return $this->response->getBody();
    }

    /**
     * Returns the entire contents of the PSR-7 response stream. Rewinds the steam pointer in-case the stream is
     * accessed again.
     *
     * @return string
     */
    public function getBody(): string
    {
        // Gets the contents of the Stream.
        $contents = $this->getStream()->getContents();
        // After calling getContents on the stream, we need to reset the stream pointer in case the contents of
        // the stream is requested again.
        $this->getStream()->rewind();
        return $contents;
    }

    /**
     * Decodes the entire contents of the PSR-7 response stream. Obviously assumes the response stream is json.
     *
     * @return mixed
     */
    public function getDecodedBody()
    {
        return json_decode(utf8_encode($this->getBody()), true);
    }

    /**
     * Will return true if the response had a status code that was NOT 200.
     *
     * @return bool
     */
    public function fails(): bool
    {
        return $this->failed;
    }

    /**
     * If the request required a body, we merge it into the requestOptions array.
     * http://docs.guzzlephp.org/en/stable/request-options.html#body
     *
     * @param $body
     */
    protected function addBody($body)
    {
        $this->requestOptions = array_merge($this->requestOptions, ['body' => $body]);
    }

    /**
     * If the request had a query string we merge it onto the requestOptions array.
     * http://docs.guzzlephp.org/en/stable/request-options.html#query
     *
     * @param $query
     */
    private function addQuery($query)
    {
        $this->requestOptions = array_merge($this->requestOptions, ['query' => $query]);
    }
}
