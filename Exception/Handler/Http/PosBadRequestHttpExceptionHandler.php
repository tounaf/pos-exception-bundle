<?php


namespace POS\ExceptionBundle\Exception\Handler\Http;


use POS\Bundle\CommunBundle\Utils\ConstantSrv;
use POS\Bundle\CoreBundle\Exception\AbstractPosException;
use POS\Bundle\CoreBundle\Exception\PosExceptionInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PosBadRequestHttpExceptionHandler extends AbstractPosException implements PosExceptionInterface
{
    public function setData(\Exception $exception)
    {
        return array_merge(
            array(
                'message' => $exception->getMessage(),
                'http_message' => 'Authentication failed',
                'code' => ConstantSrv::CODE_BAD_REQUEST,
            ), $this->getMessageParts($exception)
        );
    }

    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof BadRequestHttpException;
    }

}
