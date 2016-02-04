<?php

namespace MoveElevator\MeMedia\Domain\Model\Media\Movie;

use MoveElevator\MeMedia\Domain\Model\Media\Movie;

/**
 * Class ExternalStream
 *
 * @package MoveElevator\MeMedia\Domain\Model\Media\Movie
 */
class ExternalStream extends Movie
{

    /**
     * @var string
     */
    protected $externalId;

    /**
     * @var string
     */
    protected $provider;

    /**
     * @param string $externalId
     * @return void
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $provider
     * @return void
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }
}
