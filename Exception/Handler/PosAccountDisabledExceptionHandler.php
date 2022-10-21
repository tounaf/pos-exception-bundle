<?php


namespace POS\ExceptionBundle\Exception\Handler;


use POS\Bundle\CommunBundle\Utils\ConstantSrv;
use POS\Bundle\CoreBundle\Exception\AbstractPosException;
use POS\Bundle\CoreBundle\Exception\PosExceptionInterface;
use Symfony\Component\Security\Core\Exception\DisabledException;

class PosAccountDisabledExceptionHandler extends AbstractPosException implements PosExceptionInterface
{
    /**
     * @param \Exception $exception
     * @return array
     */
    public function setData(\Exception $exception)
    {
        return array_merge(
            array(
                'message' => $exception->getMessage(),
                'http_message' => 'User account is disabled.',
                'code' => ConstantSrv::CODE_UNAUTHORIZED,
            ), $this->getMessageParts($exception)
        );
    }

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof DisabledException;
    }

}
