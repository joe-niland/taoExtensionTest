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

class Users extends \tao_actions_CommonModule // \tao_actions_RestController 
{
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
	 * Show a view
	 * @return void
	 */
	public function index()
	{
		common_Logger::d('Users::index called');

		$users = $this->service->getAllUsers();

		$this->setData('users', $users);
		$this->setView('index.tpl');
	}

	public function public()
	{
		common_Logger::d('Users::public called');
		$this->setView('public.tpl');
	}
}
