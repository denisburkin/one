<?php defined('SYSPATH') or die('No direct script access.');

return array
(
	// Enable the API browser.  TRUE or FALSE
//	'api_browser'  => TRUE,

	// Enable these packages in the API browser.  TRUE for all packages, or a string of comma seperated packages, using 'None' for a class with no @package
	// Example: 'api_packages' => 'Kohana,Kohana/Database,Kohana/ORM,None',
//	'api_packages' => TRUE,

	// Leave this alone
	'modules' => array(

		// This should be the path to this modules userguide pages, without the 'guide/'. Ex: '/guide/modulename/' would be 'modulename'
		'keytech' => array(

			// Whether this modules userguide pages should be shown
			'enabled'     => TRUE,

			// The name that should show up on the userguide index page
			'name'        => 'Key-Tech',

			// A short description of this module, shown on the index page
			'description' => 'Admin controller',

			// Copyright message, shown in the footer for this module
			'copyright'   => '&copy; 2008–2011 KeyTech Team - Denis Burkin',
		)
	)
);
