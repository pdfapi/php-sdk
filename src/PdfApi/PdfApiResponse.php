<?php
/**
 * Created by IntelliJ IDEA.
 * User: tobre
 * Date: 05/11/2016
 * Time: 12:34
 */

namespace PdfApi;


use GuzzleHttp\Psr7\Response;

class PdfApiResponse
{

    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function getContents()
    {
        return $this->response->getBody()->getContents();
    }
}