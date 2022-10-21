<?php


namespace POS\ExceptionBundle\Exception;


use POS\Bundle\CommunBundle\Utils\ConstantSrv;

class PosGenericExceptionHandler implements PosExceptionInterface
{
    public function setData(\Exception $exception)
    {
        $messageExeption = $exception->getMessage();
        return array(
            'message' => $messageExeption,
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
        return false;
    }

}
