<?php


namespace POS\ExceptionBundle\Exception;


abstract class AbstractPosException implements PosExceptionInterface
{

    /**
     * @param \Exception $exception
     *
     * @return array
     */
    protected function getMessageParts(\Exception $exception)
    {
        $message = $exception->getMessage();
        $customResponse = array(
            'message' => $message,
        );
        if (strpos($message, '|') !== false) {
            list($title, $message,) = explode('|', $message);
            $customResponse['message'] = $message;
            $customResponse['title'] = $title;
        }

        return $customResponse;
    }

}
