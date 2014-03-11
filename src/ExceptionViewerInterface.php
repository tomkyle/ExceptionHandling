<?php
/**
 * This file is part of tomkyle/ExceptionHandling
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
namespace tomkyle\ExceptionHandling;


/**
 * ExceptionViewerInterface
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
interface ExceptionViewerInterface extends ExceptionAwareInterface
{

    /**
     * @return string
     */
    public function __toString();


    /**
     * @return string
     */
    public function getHtml();

}
