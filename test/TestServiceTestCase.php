<?php
require_once dirname(__FILE__) . '/../../tao/test/TestRunner.php';
include_once dirname(__FILE__) . '/../includes/raw_start.php';

/**
 * This class enable you to test the models managment of the taoSubjects extension
 *
 * @author Bertrand Chevrier, <taosupport@tudor.lu>
 * @package taoSubjects
 * @subpackage test
 */
class TestServiceTestCase extends UnitTestCase
{

	/**
	 * tests initialization
	 */
	public function setUp()
	{
		TestRunner::initTest();
	}

	/**
	 * Test the subject models management methods from the taoSubjects_models_classes_SubjectsService class
	 * @see taoSubjects_models_classes_SubjectsService
	 */
	public function testTestService()
	{

		$subjectService = tao_models_classes_ServiceFactory::get('taoExtensionTest_models_classes_TestService');
		$this->assertIsA($subjectService, 'taoExtensionTest_models_classes_TestService');
	}
}
