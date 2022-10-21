<?php


namespace POS\ExceptionBundle\Exception\Handler;


use FOS\RestBundle\Exception\InvalidParameterException;
use POS\Bundle\CommunBundle\Utils\ConstantSrv;
use POS\Bundle\CoreBundle\Exception\AbstractPosException;
use POS\Bundle\CoreBundle\Exception\PosExceptionInterface;

class PosInvalidParameterExceptionHandler extends AbstractPosException implements PosExceptionInterface
{

    /**
     * @inheritDoc
     */
    public function setData(\Exception $exception)
    {
        return array_merge(
            array(
                'message' => $exception->getMessage(),
                'http_message' => 'Parametre invalid',
                'code' => ConstantSrv::CODE_UNAUTHORIZED,
            ), $this->getMessageParts($exception)
        );
    }

    /**
     * @inheritDoc
     */
    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof InvalidParameterException;
    }
}
