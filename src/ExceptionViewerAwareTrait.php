<?php
/**
 * This file is part of tomkyle/ExceptionHandling
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
namespace tomkyle\ExceptionHandling;


/**
 * ExceptionViewerAwareTrait
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
trait ExceptionViewerAwareTrait {


    /**
     * @var ExceptionViewerInterface
     */
    public $exception_viewer;


    /**
     * @param  ExceptionViewerInterface{null} $exception_viewer
     * @return object Fluent Interface
     * @uses   $exception_viewer
     */
    public function setExceptionViewer( ExceptionViewerInterface $exception_viewer = null)
    {
        $this->exception_viewer = $exception_viewer;
        return $this;
    }


    /**
     * @return ExceptionViewerInterface
     * @uses   $exception_viewer
     */
    public function getExceptionViewer( )
    {
        return $this->exception_viewer;
    }

}
