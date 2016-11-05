<?php

namespace PdfApi;
use PdfApi\Parameter\Margin;

/**
 * Created by IntelliJ IDEA.
 * User: tobre
 * Date: 05/11/2016
 * Time: 11:08
 */
class PdfApi
{
    const VERSION = '1.0.0';

    private $apiKey;

    /**
     * @var Parameters
     */
    private $parameters;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->parameters = new Parameters();
    }

    public function setContents($content)
    {
        $this->parameters->setContents($content);
    }

    public function setHtml($html)
    {
        $this->setContents($html);
    }

    public function setHeader($header)
    {
        $this->parameters->setHeader($header);
    }

    public function setFooter($footer)
    {
        $this->parameters->setFooter($footer);
    }

    public function setSize($size)
    {
        $this->parameters->setSize($size);
    }

    public function setOrientation($orientation)
    {
        $this->parameters->setOrientation($orientation);
    }

    public function setMargins(Margin $margin)
    {
        $this->parameters->setMargins($margin);
    }

    public function setParameters(array $params)
    {
        $this->parameters->setParameters($params);
    }

    public function getParameters()
    {
        return $this->parameters->getParameters();
    }

    public function generate()
    {
        return $this->convert()->getContents();
    }

    public function save($location)
    {
        file_put_contents($location, $this->generate());
    }

    private function convert()
    {
        $request = new PdfApiRequest();
        $request->setMethod('POST');
        $request->setEndpoint('/pdf');
        $request->setBody($this->parameters->toArray());

        $client = new PdfApiClient($this->apiKey);
        return $client->send($request);
    }
}