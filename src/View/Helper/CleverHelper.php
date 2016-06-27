<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Core\Configure;

class CleverHelper extends Helper
{
    public $helpers = ['Html'];

   
    public function loginButton($size='')
    {
    	//This creates the URL for login to Clever. The values need to be configured in Bootstrap.php
    	$cleverUrl = Configure::read('Clever.oauth_url').'?response_type='.Configure::read('Clever.response_type').'&redirect_uri='.Configure::read('Clever.redirect_uri').'&client_id='.Configure::read('Clever.client_id');

    	//The switch case assumes that the image sizes are downloaded and placed in the webroot/img folder
    	switch($size)
    	{
    		case 'full':
        		$imagesrc = "sign-in-with-clever-full.png";
        		break;
    		case 'medium':
        		$imagesrc = "sign-in-with-clever-medium.png";
        		break;
    		case 'small':
        		$imagesrc = "sign-in-with-clever-small.png";
        		break;
		    case 'micro':
        		$imagesrc = "sign-in-with-clever-micro.png";
        		break; 
		    default:
		    	$imagesrc = "sign-in-with-clever-medium.png";
		    	break;
    	}


    	return $this->Html->image($imagesrc, [
            "alt" => "Clever Login",
    		'url' => $cleverUrl,
			]);
    }
}

?>