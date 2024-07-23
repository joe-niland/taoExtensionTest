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

namespace JoeNiland\taoExtensionTest\actions;

use common_exception_BadRequest;
use oat\tao\model\http\HttpJsonResponseTrait;
use oat\tao\model\taskQueue\TaskLogActionTrait;
use core_kernel_classes_Resource as Resource;
use Exception;
use Request;
use tao_models_classes_UserService;

class taoExtensionTest_users extends \tao_actions_RestController // \tao_actions_CommonModule
{
	// use TaskLogActionTrait;
	// use HttpJsonResponseTrait;

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
		$this->setView('index.tpl');
		// $this->returnFailure(new \common_exception_NotImplemented('This API does not support this call.'));
	}

	public function public()
	{
		$this->setSuccessJsonResponse(['message' => 'This is a public route.']);
	}
}
