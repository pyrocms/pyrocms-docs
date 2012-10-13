# Module Development

PyroCMS is built to be modular, so creating modules is a pretty simple process. The core modules are stored in <dfn>system/pyrocms/modules</dfn> and you can install extra ones to <dfn>addons/default/modules</dfn> or <dfn>addons/shared_addons/modules</dfn>. Any module you create should go into one of those two locations, not in <dfn>system/cms/modules</dfn>.

Each module can contain the following directories:

* config/
* controllers/
* helpers/
* libraries/
* models/
* views/
* js/
* css/
* img/

If a module will need to have a front-end (something that displays to the user) then it should contain at least one controller, and that controller should be named after the module.

	addons/<site-ref>/modules/blog/controllers/blog.php

## The Module details.php File

Each module contains a <dfn>details.php</dfn> file which contains its name, description, version, whether it is available in the backend and/or frontend, admin menus, etc. If you set a module to `backend => false` then it will not show in the admin panel menu. Likewise if you set it to `frontend => false` it will not be available in places like Navigation where it shows a list of modules to link to.

When the __CP > Addons__ page is loaded or when PyroCMS is installed it indexes all <dfn>details.php</dfn> files and stores the data from the `info()` method in the _default\_modules_ table. If you make edits to this file the changes will not be seen until it is re-installed or you edit the table manually. One exception is the sections and shortcuts used by the admin panel. These are loaded each time they are needed so you can place permission checks around them and control the menus the way you need to.

You must use `$this->db->dbprefix('table_name')` when running manual queries. This makes sure the module is using the correct database table as all table names are prefixed with a "site ref" which in most installations will simply be "default_". This ensures that you may easily upgrade to Professional if the need arises or that you may distribute the module for installation on both Community and Pro.

<div class="tip"><strong>Note:</strong> this is only necessary when using <code>$this->db->query()</code> or similar. Active Record such as <code>$this->db->where()</code> and <code>$this->db->get()</code> add the prefix automatically. You can also manage your tables with dbforge to avoid this step as it automatically adds the prefix.</div>

If you wish to create a module that is available for use across all sites on a Multi-Site install then you can specify your own prefix before running queries to that table. Just remember to set it back in case PyroCMS makes more queries after your module. You may set the prefix using `$this->db->set_dbprefix('custom');` and you may set it back by using `$this->db->set_dbprefix(SITE_REF.'_');`

Here is the basic structure for the details.php file:

	<?php defined('BASEPATH') or exit('No direct script access allowed');
	
	class Module_Sample extends Module {
	
		public $version = '2.0';
		
		public function info()
		{
			return array(
				'name' => array(
					'en' => 'Sample'
				),
				'description' => array(
					'en' => 'This is a PyroCMS module sample.'
				),
				'frontend' => true,
				'backend' => true,
				'menu' => 'content', // You can also place modules in their top level menu. For example try: 'menu' => 'Sample',
				'sections' => array(
					'items' => array( //"items" will be the same in the Admin controller as protected $section filed
						'name' 	=> 'sample:items', // These are translated from your language file
						'uri' 	=> 'admin/sample',
							'shortcuts' => array(
								'create' => array(
									'name' 	=> 'sample:create',
									'uri' 	=> 'admin/sample/create',
									'class' => 'add'
									)
								)
							)
					)
			);
		}
		
		public function install()
		{
			$this->dbforge->drop_table('sample');
			$this->db->delete('settings', array('module' => 'sample'));
		
			$sample = array(
		        'id' => array(
				'type' => 'INT',
					'constraint' => '11',
					'auto_increment' => true
				),
				'name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100'
				),
				'slug' => array(
					'type' => 'VARCHAR',
					'constraint' => '100'
				),
			);
		
			$sample_setting = array(
				'slug' => 'sample_setting',
				'title' => 'Sample Setting',
				'description' => 'A Yes or No option for the Sample module',
				'default' => '1',
				'value' => '1',
				'type' => 'select',
				'options' => '1=Yes|0=No',
				'is_required' => 1,
				'is_gui' => 1,
				'module' => 'sample'
			);
		
			$this->dbforge->add_field($sample);
			$this->dbforge->add_key('id', true);
		
			// Let's try running our DB Forge Table and inserting some settings
			if ( ! $this->dbforge->create_table('sample') OR ! $this->db->insert('settings', $sample_setting))
			{
				return false;
			}
		
			// No upload path for our module? If we can't make it then fail
			if ( ! is_dir($this->upload_path.'sample') AND ! @mkdir($this->upload_path.'sample',0777,true))
			{
				return false;
			}
		
			// We made it!
			return true;
		}
		
		public function uninstall()
		{
			$this->dbforge->drop_table('sample');
		
			$this->db->delete('settings', array('module' => 'sample'));
		
			// Put a check in to see if something failed, otherwise it worked
			return true;
		}
		
		
		public function upgrade($old_version)
		{
			// Your Upgrade Logic
			return true;
		}
		
		public function help()
		{
			// Return a string containing help info
			return "Here you can enter HTML with paragrpah tags or whatever you like";
				
			// or
			
			// You could include a file and return it here.
			return $this->load->view('help', null, true); // loads modules/sample/views/help.php
		}
	}

The array contains details that will be read and saved to the database on install. You can supply as many extra languages as you like, by default the en version of name and description will be used.

This array will be available in your Public\_Controller's and Admin\_Controller's via `$this->module_details['name']`. Notice, name and description will use the active language, not return the whole array.

## Detail File Resources

Although it is likely that your third party module will be installed via the Add-ons section of the control panel, it is a good precaution to take note that your module may be installed when the PyroCMS installer runs. Modules that are in the <dfn>shared_addons</dfn> folder will be installed along with core modules during installation.

Because the installer is a separate CodeIgniter application, you cannot load any module files such as configs or helpers when your module is being installed via the PyroCMS installer. Because of this, we recommend that your <dfn>details.php</dfn> file be independent of other configs, helpers, or other CodeIgniter-loaded resources.

## Public Controllers

In a normal CodeIgniter installation there is only one controller class. In PyroCMS there are four. Controller, MY\_Controller, Admin\_Controller and Public\_Controller. To use one of these you can extend them like so:

	class News extends Public_Controller {
		
		function index()
		{
			$message = "Hello World!";
	
			// Loads from addons/<site-ref>/modules/blog/views/view_name.php
			$this->template
					->set('message' , $message)
					->build('view_name');
		 }
	}

This page will be available to anyone whether logged in or not and will use the frontend design. That means it will use the current active theme and show any login data and navigation, etc and can be viewed via "http://example.com/modulename".

## Admin Controllers

Admin controllers have a few different properties to them. It will automatically check that a user has permission to be there, and redirect them to a login page if not. This means they either need to have a user role of "admin" or be allowed specific permission to access the module.

<dfn>addons/<strong>&lt;site-ref&gt;</strong>/modules/<strong>&lt;module-name&gt;</strong>/controllers/admin.php</dfn>

	class Admin extends Admin_Controller {
	
		protected $section = "item"; //This must match the name in the 'sections' field in details.php
	
		function index()
		{
			$message = "Hello logged in admin guy!";			
	
			// Loads from addons/modules/blog/views/admin/view_name.php
			$this->template
					->set('message' , $message)
					->build('admin/view_name');
		 }
	}

This page can be accessed via "http://example.com/admin/<module-name>".