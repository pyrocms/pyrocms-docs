# Upgrading v2.1.x to v2.2.x

Any version of the 2.1 branch can be upgraded to any version of the 2.2 branch by following these instructions.

## 1.) Download the latest copy of PyroCMS

You can download the latest version of PyroCMS 2.2 [here](https://github.com/pyrocms/pyrocms/zipball/2.2/master).

If you are using git, you can get the latest copy by running:

     git pull git://github.com/pyrocms/pyrocms.git 2.2/master

Incidentally, if you are using Git to upgrade this is probably the last step you need to make - unless you have custom addons.

## 2.) Backup Your Add-ons and database.php

We're going to replace the entire system, so you'll need to back up any files you've modified. Most likely, this is just the database.php file, which is stored in system/cms/config/database.php and contains your database connection details.  

If you are using a GUI, take care you don't miss any "hidden" files like .htaccess when copying.

Additionally, you'll want to back up any addons that you've added to the addons directory. We'll be replacing this entire folder, so back those up.

## 3.) Replace the addons and system folder

Replace the system and addons folders with their new version, and then add your backed up database.php and addons back in.

## 4.) Update your database.php

At the bottom of this file, change:

	$active_record = TRUE;
	// to
	$query_builder = TRUE;

## 5.) Replace index.php with a the new version

This is not usually the case, but occasionally there will be changes to the root index.php file, so make sure you have the latest one.

## 6.) Ensure config/pagination.php is present

In all of this folder moving, you may be missing a new file: system/cms/config/pagination.php. Make sure that is in your config folder.

## 7.) Make sure the following folders are writable

These folders need to be writable (chmod 777) or "Writable by Everyone", and may have had their permissions reset when you uploaded 
them to your server. Make sure they are still writable, along with all of their contents.

* assets/cache
* system/cms/logs
* system/cms/cache
* system/cms/config
* uploads

## 8.) Update your Addons (Developers)

CodeIgniter has been updated to v3.0 so you will need to take a look at the changelog.

In your modules, if you have been checking for an exact match to FALSE, you will need to change it to this:

	// Old
	$this->input->post('something') !== FALSE

	// New
	$this->input->post('something') !== NULL

If your modules refer to either of the follow two hooks then you will need to change your code to use {{ link uri="modules-and-tags" title="Events" }} instead.

	$this->hooks->call_hook('post_user_login');
	$this->hooks->call_hook('post_user_activation');

If you were using the MySQL or MySQLi drivers and your modules use $this->dbforge->drop_table() on tables that may or may not exist, you 
will need to change the code like so:

	// from
	$this->dbforge->drop_table('sometable');
	// to
	$this->dbforge->drop_table('sometable', true);
	

## Rejoice

Done! You are now running the latest, shiniest version of PyroCMS!

This upgrade was bigger than usual - especially for people with custom addons - but it's because we added a lot of awesome stuff.
Remember, if you use Git this is WAY quicker. All database changes are handled automatically (by 'migrations') the next time you load up the control panel. 
