<?php


namespace POS\ExceptionBundle\Exception\Handler\Http;


use POS\Bundle\CommunBundle\Utils\ConstantSrv;
use POS\Bundle\CoreBundle\Exception\AbstractPosException;
use POS\Bundle\CoreBundle\Exception\PosExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PosNotFoundHttpExceptionHandler extends AbstractPosException implements PosExceptionInterface
{
    public function setData(\Exception $exception)
    {
        return array_merge(
            array(
                'message' => $exception->getMessage(),
                'http_message' => 'Not found',
                'code' => ConstantSrv::CODE_DATA_NOTFOUND,
            ), $this->getMessageParts($exception)
        );
    }

    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof NotFoundHttpException;
    }

}
