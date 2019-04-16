<?php
/**
 * Created by PhpStorm.
 * User: we.praktikant
 * Date: 16.04.2019
 * Time: 13:22
 */

namespace App\Services;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class MoviesApiHttpClient
 * @package App
 */
class MoviesApiHttpClient
{

    const API_VERSION  = 'v1';
    const API_ENDPOINT = 'movies';

    /** @var ClientInterface */
    protected $httpClient;

    /**
     * MoviesApiHttpClient constructor.
     */
    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllMovies()
    {
        $request = new Request('GET', $this->getApiBaseUrl() . '/' . self::API_ENDPOINT);

        $response = $this->httpClient->send($request);

        return json_decode($response->getBody(), true);
    }

    /**
     * @return string
     */
    private function getApiBaseUrl()
    {
        return  'https://backend-ygzsyibiue.now.sh/api/' . self::API_VERSION;
    }

}