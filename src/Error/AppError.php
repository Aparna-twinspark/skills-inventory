<?php
namespace App\Error;

use Cake\Error\BaseErrorHandler;

class AppError extends BaseErrorHandler
{
    public function _displayError($error, $debug)
    {
        pr('There has been an error'. json_encode($error));
    }

   	public function _returnError($error, $json=true)
   	{
   		return ($json) ? json_encode($error) : $error ;
   	}

    public function _displayException($exception)
    {
        pr ('There has been an exception!');
    }
}

?>