<?php

namespace Atyantik\Mozscape\Manager;
use Atyantik\Mozscape\Authentication\Authenticator;
use Atyantik\Mozscape\Services\LinksService;
use Atyantik\Mozscape\Services\URLMetricsService;

/**
 * Created by PhpStorm.
 * User: chiragpatel
 * Date: 10/4/17
 * Time: 4:06 PM
 */

class MozManager
{
    protected $accessId;
    protected $secretKey;
    protected $authenticator;
    const RATE_LIMIT=50;

    public function __construct($accessId,$secretKey)
    {
        $this->accessId=$accessId;
        $this->secretKey=$secretKey;
        $this->authenticator = new Authenticator();
        $this->authenticator->setAccessID($accessId);
        $this->authenticator->setSecretKey($secretKey);
        $this->authenticator->setRateLimit(self::RATE_LIMIT);
    }

    public function linkServiceData($url, $options)
    {
        $linksService = new LinksService($this->authenticator);
        $response = $linksService->getLinks($url, $options);
        return $response;
    }

    public function urlMetricsServiceData($url, $options=[])
    {
        $service = new URLMetricsService($this->authenticator);
        $response = $service->getUrlMetrics($url, $options);
        return $response;
    }

}