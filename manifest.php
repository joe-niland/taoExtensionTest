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

use oat\tao\model\user\TaoRoles;

return [
	'name' => 'taoExtensionTest',
	'label' => 'TAO Sample Extension',
	'description' => 'TAO sample extensions',
	'license' => 'GPL-2.0',
	'version' => '1.0',
	'author' => 'Joe Niland',
	'dependencies' => array('tao'),
	'models' => array(),
	// 'managementRole' => 'http://www.tao.lu/Ontologies/TAO.rdf#TaoManagerRole',
	'acl' => [
		['grant', 'http://www.tao.lu/Ontologies/TAO.rdf#BackOfficeRole', array('ext' => 'taoExtensionTest')],
		[
			'grant',
			'http://www.tao.lu/Ontologies/TAO.rdf#BackOfficeRole',
			[
				'ext' => 'taoExtensionTest',
				'mod' => 'Users',
			],
		],
		['grant', TaoRoles::REST_PUBLISHER, ['ext' => 'taoExtensionTest', 'mod' => 'Users']],
	],
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
		'DEFAULT_MODULE_NAME'	=> 'Users',

		#default action name
		'DEFAULT_ACTION_NAME'	=> 'index',

		#BASE PATH: the root path in the file system (usually the document root)
		'BASE_PATH'				=> __DIR__,

		#BASE URL (usually the domain root)
		'BASE_URL'				=> ROOT_URL . 'taoExtensionTest/',
	),
	'extra' => [
		'structures' => __DIR__ . DIRECTORY_SEPARATOR . 'actions' . DIRECTORY_SEPARATOR . 'structures.xml',
	],
];
