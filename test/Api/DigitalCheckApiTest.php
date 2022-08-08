<?php

namespace CirculoDeCredito\DigitalCheck\Client;

use CirculoDeCredito\DigitalCheck\Client\Configuration;
use CirculoDeCredito\DigitalCheck\Client\ApiException;
use CirculoDeCredito\DigitalCheck\Client\ObjectSerializer;
use CirculoDeCredito\DigitalCheck\Client\Api\ApiClient;
use CirculoDeCredito\DigitalCheck\Client\Model\RequestData;
use GuzzleHttp\Client as HttpClient;

class DigitalCheckApiTest extends \PHPUnit\Framework\TestCase
{
    private $apiKey;
    private $httpClient;
    private $config;

    public function setUp():void
    {
            $this->apiKey = "";
	    $apiUrl = "";

	    $this->config = new Configuration();
	    $this->config->setHost($apiUrl);

	    $this->httpClient = new HttpClient();
    }

    public function testFullfraud()
    {
	    $requestPayload = new RequestData();
	    $requestPayload->setFolioOtorgante("");
	    $requestPayload->setFolioConsulta("");
	    $requestPayload->setIp("");
	    $requestPayload->setEmail("");
	    $requestPayload->setPhone("");

        $response = null;

	try {

	    $client = new ApiClient($this->httpClient, $this->config);
	    $response = $client->fullfraud($this->apiKey, $requestPayload);

	    print("\n".$response);
	
	} catch(ApiException $exception) {
	    print("\nHTTP request failed, an error ocurred: ".($exception->getMessage()));
	    print("\n".$exception->getResponseObject());
	}

	$this->assertNotNull($response);
    }
}
