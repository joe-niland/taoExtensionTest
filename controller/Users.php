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

class Users extends \tao_actions_CommonModule // \tao_actions_RestController // \tao_actions_CommonModule
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
		common_Logger::d('index called');
		$this->setView('index.tpl');
		// $this->returnFailure(new \common_exception_NotImplemented('This API does not support this call.'));
	}

	public function public()
	{
		common_Logger::d('public called');
		$this->setSuccessJsonResponse(['message' => 'This is a public route.']);
	}
}
