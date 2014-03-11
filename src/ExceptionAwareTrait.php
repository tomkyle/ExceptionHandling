<?php
/**
 * This file is part of tomkyle/ExceptionHandling
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
namespace tomkyle\ExceptionHandling;


/**
 * ExceptionAwareTrait
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
trait ExceptionAwareTrait {


    /**
     * @var \Exception
     */
    public $exception;


    /**
     * @param  \Exception|null $e
     * @return object Fluent Interface
     * @uses   $exception
     */
    public function setException( \Exception $e = null)
    {
        $this->exception = $e;
        return $this;
    }


    /**
     * @return \Exception|null
     * @uses   $exception
     */
    public function getException(  )
    {
        return $this->exception;
    }
}
