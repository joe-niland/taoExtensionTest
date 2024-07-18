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
	use TaskLogActionTrait;
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
		// $this->setView('index.tpl');
		$this->returnFailure(new \common_exception_NotImplemented('This API does not support this call.'));
	}

	/**
	 * @example method used to populate the tree widget
	 * render json data of the documents in the DOCS_PATH
	 * @return void
	 */
	public function getCurrentUser()
	{
		$request = $this->getPsrRequest();
		$testUri = $request->getQueryParams()['email'] ?? null;
		try {
			if ($request->getMethod() !== Request::HTTP_GET) { // || empty($testUri)) {
				// throw new common_exception_MissingParameter(self::PARAM_TEST_URI, $this->getRequestURI());
				throw new common_exception_BadRequest('This API only supports GET requests.');
			}
			$testResource = $this->getResource($testUri);
			$currentUser = $this->service->getCurrentUser();

			$this->returnSuccess(['user' => $currentUser->getUri()]);
			// } catch (MissingTestmodelException $e) {
			// 	$this->returnFailure(new common_exception_NotFound(
			// 		sprintf('Test %s not found', $testUri),
			// 		StatusCode::HTTP_NOT_FOUND,
			// 		$e
			// 	));
		} catch (Exception $e) {
			$this->returnFailure($e);
		}
	}

	// /**
	//  * this function must contain the word edit
	//  */
	// public function editDocument()
	// {
	// 	$filepath = $this->getRequestParameter('uri');

	// 	// send data to the template
	// 	$this->setData('filename', substr($filepath, strrpos($filepath, '/') + 1));
	// 	$this->setData('downloadpath', DOCS_URL . $filepath);

	// 	// select the template
	// 	$this->setView('editDocument.tpl');
	// }

	/**
	 * @see TaoModule::getRootClass
	 * @abstract implement the abstract method
	 */
	public function getRootClass()
	{
		return null;
	}
}
