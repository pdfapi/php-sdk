<?php
/**
 * Created by IntelliJ IDEA.
 * User: tobre
 * Date: 05/11/2016
 * Time: 12:16
 */

namespace PdfApi;


use GuzzleHttp\Client;

class PdfApiClient
{
    const BASE_URL = 'https://pdfapi.io/api';
    const API_VERSION = '1';
    const DEFAULT_REQUEST_TIMEOUT = 60;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClientHandler;

    private $apiKey;

    public function __construct($apiKey)
    {
        $this->httpClientHandler = new Client();
        $this->apiKey = $apiKey;
    }

    public function send(PdfApiRequest $request)
    {
        $response = $this->httpClientHandler->request($request->getMethod(), static::BASE_URL . '/v' . static::API_VERSION . $request->getEndpoint(), [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode(':' . $this->apiKey),
                'Content-type' => 'application/json',
            ],
            'body' => \GuzzleHttp\json_encode($request->getBody()),
        ]);

        return new PdfApiResponse($response);
    }
}