<?php
/**
 * This file is part of tomkyle/ExceptionHandling
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
namespace tomkyle\ExceptionHandling;


/**
 * ExceptionAwareInterface
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
interface ExceptionAwareInterface
{

/**
 * @param  \Exception $e
 * @return ExceptionAwareInterface Fluent Interface
 */
	public function setException( \Exception $e );


/**
 * @return \Exception|null;
 */
	public function getException( );

}
