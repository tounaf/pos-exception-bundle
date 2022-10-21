<?php


namespace POS\ExceptionBundle\Exception\Handler;


use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use POS\Bundle\CommunBundle\Utils\ConstantSrv;
use POS\Bundle\CoreBundle\Exception\PosExceptionInterface;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PosUniqueConstraintViolationExceptionHandler implements PosExceptionInterface
{
    public function setData(\Exception $exception)
    {
        $messageExeption = $exception->getMessage();
        if (preg_match('#Duplicate entry \'(.*)\'#Uis', $messageExeption, $val)
            || preg_match('#Duplicata du champ \'(.*)\'#Uis', $messageExeption, $val)
        ) {
            $messageExeption = $val[1];
        }
        return array(
            'message' => "L'élément  " . (string)$messageExeption . " existe déjà !",
            'http_message' => 'Duplicate entry',
            'code' => ConstantSrv::CODE_INTERNAL_ERROR,
        );
    }

    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof UniqueConstraintViolationException;
    }

}
