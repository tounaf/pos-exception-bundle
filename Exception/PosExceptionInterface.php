<?php


namespace POS\ExceptionBundle\Exception;


interface PosExceptionInterface
{
    /**
     * @param \Exception $exception
     * @return array
     */
    public function setData(\Exception $exception);

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function isMatchException(\Exception $exception);
}
