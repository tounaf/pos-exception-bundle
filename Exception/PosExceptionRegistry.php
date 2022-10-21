<?php


namespace POS\ExceptionBundle\Exception;

class PosExceptionRegistry
{
    /**
     * @var PosExceptionInterface[] $exceptionHandlers
     */
    private $exceptionHandlers;
    public function __construct($exceptionHandlers)
    {
        $this->exceptionHandlers = $exceptionHandlers;
    }

    /**
     * @param \Exception $exception
     * @return AbstractPosException|PosExceptionInterface
     */
    public function geExceptionHandler(\Exception $exception)
    {
        foreach($this->exceptionHandlers as $exceptionHandler) {
            /** @var AbstractPosException $exceptionHandler **/
            if($exceptionHandler->isMatchException($exception)) {
                return $exceptionHandler;
            }
        }

        return new PosGenericExceptionHandler();
    }
}
