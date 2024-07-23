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
use oat\generis\model\GenerisRdf;
use tao_models_classes_UserService;
use tao_helpers_Display as DisplayHelper;

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

		$fieldsMap = [
			'login' => GenerisRdf::PROPERTY_USER_LOGIN,
			'firstname' => GenerisRdf::PROPERTY_USER_FIRSTNAME,
			'lastname' => GenerisRdf::PROPERTY_USER_LASTNAME,
			'email' => GenerisRdf::PROPERTY_USER_MAIL,
			'guiLg' => GenerisRdf::PROPERTY_USER_UILG,
			'roles' => GenerisRdf::PROPERTY_USER_ROLES
		];

		$response = [];
		$index = 1;

		$users = $this->service->getAllUsers();

		foreach ($users as $user) {
			$propValues = $user->getPropertiesValues(array_values($fieldsMap));

			$login = (string)current($propValues[GenerisRdf::PROPERTY_USER_LOGIN]);
			$firstName = empty($propValues[GenerisRdf::PROPERTY_USER_FIRSTNAME])
				? ''
				: (string)current($propValues[GenerisRdf::PROPERTY_USER_FIRSTNAME]);
			$lastName = empty($propValues[GenerisRdf::PROPERTY_USER_LASTNAME])
				? ''
				: (string)current($propValues[GenerisRdf::PROPERTY_USER_LASTNAME]);
			$email = (string)current($propValues[GenerisRdf::PROPERTY_USER_MAIL]);
			$response[$index]['login'] = DisplayHelper::htmlEscape($login);
			$response[$index]['firstname'] = DisplayHelper::htmlEscape($firstName);
			$response[$index]['lastname'] = DisplayHelper::htmlEscape($lastName);
			$response[$index]['email'] = DisplayHelper::htmlEscape($email);

			$index++;
		}

		$this->setData('users', $response);
		$this->setView('index.tpl');
	}

	public function public()
	{
		common_Logger::d('Users::public called');
		$userCount = $this->service->getCountUsers();
		$this->setData('userCount', $userCount);
		$this->setView('public.tpl');
	}
}
