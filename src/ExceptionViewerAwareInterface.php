<?php
/**
 * This file is part of tomkyle/ExceptionHandling
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
namespace tomkyle\ExceptionHandling;


/**
 * ExceptionViewerAwareInterface
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
interface ExceptionViewerAwareInterface
{

    /**
     * @param  ExceptionViewerInterface      $viewer
     * @return ExceptionViewerAwareInterface Fluent Interface
     */
	public function setExceptionViewer( ExceptionViewerInterface $viewer );


    /**
     * @return ExceptionViewerInterface
     */
	public function getExceptionViewer( );

}
