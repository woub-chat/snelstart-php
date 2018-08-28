<?php
/**
 * @author  IntoWebDevelopment <info@intowebdevelopment.nl>
 * @project SnelstartApiPHP
 */

namespace SnelstartPHP\Connector;

use SnelstartPHP\Exception\PreValidationException;
use SnelstartPHP\Mapper\BoekingMapper;
use SnelstartPHP\Model\Inkoopboeking;
use SnelstartPHP\Model\Verkoopboeking;
use SnelstartPHP\Request\BoekingRequest;

class BoekingConnector extends BaseConnector
{
    public function addInkoopboeking(Inkoopboeking $inkoopboeking)
    {
        if ($inkoopboeking->getId() !== null) {
            throw new PreValidationException("New records should not have an ID.");
        }

        $inkoopboeking->assertInBalance();
        return BoekingMapper::addInkoopboeking($this->connection->doRequest(BoekingRequest::addInkoopboeking($inkoopboeking)));
    }

    public function addVerkoopboeking(Verkoopboeking $verkoopboeking)
    {
        if ($verkoopboeking->getId() !== null) {
            throw new PreValidationException("New records should not have an ID.");
        }

        $verkoopboeking->assertInBalance();
        return BoekingMapper::addVerkoopboeking($this->connection->doRequest(BoekingRequest::addVerkoopboeking($verkoopboeking)));
    }
}