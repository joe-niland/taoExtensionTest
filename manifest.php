<?php

/**  
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
 * Copyright (c) 2014 (original work) Open Assessment Technologies SA;
 *               
 * 
 */

// $extpath = dirname(__FILE__) . DIRECTORY_SEPARATOR;
// $taopath = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'tao' . DIRECTORY_SEPARATOR;

return [
	'name' => 'taoExtensionTest',
	'label' => 'TAO Sample Extension',
	'description' => 'TAO sample extensions',
	'license' => 'GPL-2.0',
	'version' => '1.0',
	'author' => 'Joe Niland',
	'dependencies' => array('tao'),
	'models' => array(),
	'acl' => array(
		array('grant', 'http://www.tao.lu/Ontologies/TAO.rdf#BackOfficeRole', array('ext' => 'taoExtensionTest')),
	),
	'install' => array(),
	'classLoaderPackages' => array(
		dirname(__FILE__) . '/actions/',
		dirname(__FILE__) . '/helpers/'
	),
	// 'autoload' => array(
	// 	'psr-4' => array(
	// 		'JoeNiland\\taoExtensionTest\\' => dirname(__FILE__) . DIRECTORY_SEPARATOR
	// 	)
	// ),
	'routes' => array(
		'/taoExtensionTest' => 'JoeNiland\\taoExtensionTest\\actions'
	),
	'constants' => array(
		# actions directory
		"DIR_ACTIONS"			=> __DIR__ . DIRECTORY_SEPARATOR . "actions" . DIRECTORY_SEPARATOR,

		# models directory
		"DIR_MODELS"			=> __DIR__ .  DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR,

		# views directory
		"DIR_VIEWS"				=> __DIR__ .  DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR,

		# helpers directory
		//		"DIR_HELPERS"			=> $extpath . "helpers" . DIRECTORY_SEPARATOR,

		# default module name
		//		'DEFAULT_MODULE_NAME'	=> 'Browser',

		#default action name
		//		'DEFAULT_ACTION_NAME'	=> 'getTreeData',

		#BASE PATH: the root path in the file system (usually the document root)
		//		'BASE_PATH'				=> $extpath,

		#BASE URL (usually the domain root)
		'BASE_URL'				=> ROOT_URL . 'taoExtensionTest/',

		#BASE WWW the web resources path
		//		'BASE_WWW'				=> ROOT_URL . '/taoExtensionTest/views/',

		//		'DOCS_PATH'				=> $extpath . "views" . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR,
		//		'DOCS_URL'				=> ROOT_URL . "/taoExtensionTest/views/data/",

		#TAO extension Paths
		//		'TAOBASE_WWW'			=> ROOT_URL  . '/tao/views/',
		//		'TAOVIEW_PATH'			=> $taopath . 'views' . DIRECTORY_SEPARATOR,
		//		'TAO_TPL_PATH'			=> $taopath . 'views' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR,
	)
];
