<?php 

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Network\Http\Client;
use Cake\Core\Exception\Exception;
use Cake\Error\BaseErrorHandler;
use App\Error\AppError;

class CleverApiComponent extends Component
{
	
	Const CLEVER_VERSION = "v1.1";

	Const CLEVER_URL ="https://api.clever.com";
	
	private $_endpoint='';

	private $_resources= [
								'districts' => ['events', 'schools', 'teachers', 'students', 'sections', 'admins', 'status'],
								'teachers' => ['events', 'sections', 'school', 'district', 'students','grade_levels'], 
								'students' => ['events','sections','school','district','teachers','contacts'], 
								'sections' => ['events','school','district','students','teachers','teacher'], 
								'schools' => ['events','teachers','students','sections','district'], 
								'district_admins' => array(),
								'school_admins' => ['schools'],
								'events' => array(), 
								'contacts' => ['student','district']
							];

	public function initialize(array $config)
	{
		$this->_endpoint = self::CLEVER_URL."/".self::CLEVER_VERSION."/";
	}


	public function fetchData($token, $resource, $id=null, $subResource = null) 
	{

		if(!$token  || !$resource  || !array_key_exists($resource, $this->_resources)) 
		{
			throw new Exception(__("Resource Name or Token is missing or mispelled. The available options are ".implode(", ",array_keys($this->_resources))));
		}
			
                    if(!empty($subResource) && !in_array($subResource, $this->_resources[$resource]))
                    {
			throw new Exception(__("Incorrect Subresource provided. The available options for ".$resource." are ".implode(", ",$this->_resources[$resource])));
                    }
		$url = $this->_createUrl($resource, $id, $subResource);
		return  $this->_fetchResponseData($url, $token);	
	}

   	private function _createUrl($resource, $id=false, $subResource = false)
   	{
   		//$basicUrl = self::CLEVER_URL."/".self::CLEVER_VERSION."/";
   		return  $this->_endpoint . (($id) ? $resource."/".$id."/".$subResource : $resource);
    }

    private function _fetchResponseData($url, $token)
    {	
        $http = new Client();
        $response = $http->get($url, [], [
  		'headers' => ['Authorization' => 'Bearer '.$token]
		]);


        if($response->code != '200') {

 			$errorCall= new AppError();
			//error call here
			$errorCall->_displayError($response->body, 7);
        }
		return $response->json;
    }

}

?>