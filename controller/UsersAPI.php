<?php

/**
 * Docs Controller provide actions to manage docs
 * 
 * @author Bertrand Chevrier, <taosupport@tudor.lu>
 * @package taoExtensionTest
 * @subpackage actions
 * @license GPLv2  http://www.opensource.org/licenses/gpl-2.0.php
 * 
 */

namespace JoeNiland\taoExtensionTest\controller;

use common_Logger;
use tao_models_classes_UserService;
use oat\tao\model\http\HttpJsonResponseTrait;
use oat\tao\model\TaoOntology;

class UsersAPI extends \tao_actions_RestController
{
	use HttpJsonResponseTrait;

	/**
	 * constructor: initialize the service and the default data
	 * @return Docs
	 */
	public function __construct()
	{

		parent::__construct();

		//the service is initialized by default
		// 	$this->service = \taoExtensionTest_models_classes_TestService::singleton();
		// 	$this->defaultData();
		$this->service = tao_models_classes_UserService::singleton();
	}

	/**
	 * Show the list of documents
	 * @return void
	 */
	public function index()
	{
		common_Logger::d('UsersAPI::index called');
		$this->setSuccessJsonResponse(
			[
				'users' => $this->service->toTree($this->getClass(TaoOntology::CLASS_URI_TAO_USER), [])
			]
		);
	}
}
