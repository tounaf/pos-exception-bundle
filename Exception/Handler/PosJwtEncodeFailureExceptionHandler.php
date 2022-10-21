<?php


namespace POS\ExceptionBundle\Exception\Handler;


use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;
use POS\Bundle\CommunBundle\Utils\ConstantSrv;
use POS\Bundle\CoreBundle\Exception\AbstractPosException;
use POS\Bundle\CoreBundle\Exception\PosExceptionInterface;

class PosJwtEncodeFailureExceptionHandler extends AbstractPosException implements PosExceptionInterface
{
    public function setData(\Exception $exception)
    {
        return array_merge(
            array(
                'message' => $exception->getMessage(),
                'http_message' => 'Authentication failed',
                'code' => ConstantSrv::CODE_INTERNAL_ERROR,
            ), $this->getMessageParts($exception)
        );
    }

    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof JWTEncodeFailureException;
    }

}
