<?php
/**
 * This file is part of tomkyle/ExceptionHandling
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
namespace tomkyle\ExceptionHandling;


/**
 * ExceptionViewer
 *
 * Purpose of this class is a 'HTML-formatted' readable Exception output.
 *
 * Usage:
 *
 *     <?php
 *     use tomkyle\ExceptionHandling\ExceptionViewer;
 *
 *     // somewhere inside catch block:
 *     $ev = new ExceptionViewer( new \Exception );
 *
 *     // Use as string
 *     echo $ev;
 *
 *     // or
 *     echo $ev->getHtml();
 *     ?>
 *
 * @author Carsten Witt <tomkyle@posteo.de>
 */
class ExceptionViewer implements ExceptionViewerInterface
{

    use ExceptionAwareTrait;


	public $template_basic   = '<div class="error %s">
<h2>%s</h2>
<p>Thrown at line %s in <br />%s</p>
<p><i><b>%s</b></i></p>
<h3>Backtrace in detail:</h3>
<pre>%s</pre>
</div>';

    public $template_context = '<h2>Variables Context</h2><pre>%s</pre>';




    /**
     * Pass the exception you want to inspect.
     *
     * Do not pass for using `setException` after instantiation.
     *
     * @param \Exception $e The exception to view. Default null
     * @uses  setException()
     */
	public function __construct( \Exception $e = null )
	{
    	$this->setException($e);
	}


    /**
     * @return string
     * @uses   getHtml()
     */
	public function __toString()
	{
		return $this->getHtml();
	}



    /**
     * @return string
     * @uses   $template_basic
     * @uses   $template_context
     * @uses   getException()
     */
	public function getHtml() {
		if (!$exception = $this->getException()) {
			return '';
		}

        $class          = get_class($exception);
        $css            = strtolower(str_replace('\\', ' ', $class));


        $complete_trace_string = $exception->getTraceAsString();
        $complete_trace_array  = $exception->getTrace();


        // Build basic information
        $output = sprintf($this->template_basic,
            $css,
            $class,
            $exception->getLine(),
            $exception->getFile(),
            $exception->getMessage(),
            print_r($complete_trace_array, "noecho")
        );


        // Add context for ErrorExceptions
        if ($exception instanceOf \ErrorException) {

            // Extract info
            $complete_report = array_shift($complete_trace_array);
            $complete_scope  = (!empty($complete_report['args'])
                                ? (!empty($complete_report['args'][4])
                                   ? $complete_report['args'][4]
                                   : $complete_report['args'])
                                : $complete_report);
            // Append to output
            $output .= sprintf($this->template_context, print_r($complete_scope, "noecho"));
        }

		return $output;
	}

}
