<?php


namespace POS\ExceptionBundle\Exception\Handler\Pos;


use POS\Bundle\AdminBundle\Exception\PosException;
use POS\Bundle\CommunBundle\Utils\ConstantSrv;
use POS\Bundle\CoreBundle\Exception\PosExceptionInterface;

class PosGeneraleExceptionHandler implements PosExceptionInterface, PosGeneralExceptionInterface
{
    /**
     * @param \Exception $exception
     * @return array|string
     */
    public function setData(\Exception $exception)
    {
        return array(
            'message' => $exception->getMessage(),
            'http_message' => 'Erreur interne',
            'code' => ConstantSrv::CODE_INTERNAL_ERROR
        );
    }

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof PosException;
    }

}
