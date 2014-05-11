# Upgrading v2.2.x to v2.3.0

Any version of 2.2.x can be upgraded to 2.3.0 by following these instructions.

</div>
<div class="doc_content">

## Step 1: Download PyroCMS v2.3.0

You can download PyroCMS v2.3.0 [from GitHub](https://github.com/pyrocms/pyrocms/zipball/v2.3.0).

If you are using git, you can get the latest copy by running:

    $ git pull git://github.com/pyrocms/pyrocms.git 2.3/master
    $ cd pyrocms
    $ composer install

**Note:** If you do not have Composer installed then read their <a href="https://getcomposer.org/doc/00-intro.md">Getting Started</a> documentation.

## Step 2: Backup Your Add-ons and database.php

We're going to replace the entire system, so you'll need to back up any files you've modified. Most likely, this is just 
the <dfn>database.php</dfn> file, which is stored in <dfn>system/cms/config/database.php</dfn> and contains your database connection details.  

If you are using Windows Explorer or OSX Finder, take care you don't miss any "hidden" files like <dfn>.htaccess</dfn> when copying.

Additionally, you'll want to back up any addons that you've added to the <dfn>addons/</dfn> directory. We will replace this entire 
folder, so copy the contents of that folder to a temporary folder.

## Step 3: Replace the addons and system folders

Delete the <dfn>system</dfn> and <dfn>addons</dfn> folders, then replace/upload the new versions.

Replace/upload the contents from your <dfn>addons<dfn> folder. 

## Step 4: Update your database.php (Optional)

Your database.php from 2.2 will continue to work 2.3, but it can be updated to use the <a href="http://www.php.net/manual/en/book.pdo.php">PHP PDO extension</a>.

An example of your production config would look like this:

	$db['production'] = array(
		'dbdriver' 	=> 	'pdo',
		'dsn'		=> 	'mysql:host=127.0.0.1;dbname=pyrocms;port=3306',
		'username'	=> 	'root',
		'password'	=> 	'password',
		'pconnect' 	=>	true,
		'db_debug' 	=>	true,
		'cache_on' 	=>	false,
		'char_set' 	=>	'utf8',
		'dbcollat' 	=>	'utf8_unicode_ci',
	);

Notice that some of the items have moved into the 'dsn' field. This is the standard structure for PDO. While it might look a little
strange, it let us add support for other database systems in 2.3, such as PostgreSQL and SQLite.

If you were using the 'mysql' driver, that will not work if you upgrade to PHP 5.6, either change it to 'mysqli' or use this example with 'pdo'.

## Step 5: Replace index.php with a the new version

This is not usually the case, but occasionally there will be changes to the root <dfn>index.php</dfn> file, so make sure you have 
the latest one.

We added support for `$_ENV['PYRO_DEBUG']` which can be set to `on` or `off` to show or hide debug on a particular server, instead of relying on it being staging or production. This helps with the initial deployment of production, as you can see what the errors are then turn it off before the official launch.

## Step 6: Switch cache config

Remove the old <dfn>system/cms/config/pyrocache.php</dfn> file and ensure you have added the new <dfn>system/cms/config/cache.php</dfn> file, also <a href="https://raw.githubusercontent.com/pyrocms/pyrocms/2.3/master/system/cms/config/cache.php">available on GitHub</a>.

## Step 7: Make sure the following folders are writable

These folders need to be writable (chmod 777) or "Writable by Everyone", and may have had their permissions reset when 
you uploaded them to your server. Make sure they are still writable, along with all of their contents.

* assets/cache
* system/cms/logs
* system/cms/cache
* system/cms/config
* system/cms/modules/streams_core/models
* uploads


## Developers Only

There are a few large but hugely beneficial changes to the PyroCMS code-base for developers to be aware of.

Firstly, PyroCMS has made a huge leap into the modern world of PHP by switching to Composer, PSR-0, PSR-1 and PSR-2.

### Update CodeIgniter Library / Spark Usage

Composer packages are now replacing many of the various core libraries and Sparks that PyroCMS used to rely on. Some old Sparks and libraries will remain until 3.0, so here is a breakdown of what has gone.

**Akismet Library:** This has been removed, and PyroCMS now uses <dfn>"tijsverkoyen/akismet": "1.1.*"</dfn>, <a href="https://packagist.org/packages/tijsverkoyen/akismet">available on Packagist</a>.

**Markdown Parser Library:** This has been removed, and PyroCMS now uses <dfn>"dflydev/markdown": "1.0.*"</dfn>, <a href="https://packagist.org/packages/dflydev/markdown">available on Packagist</a>.

**SimplePie Library:** This has been removed, and PyroCMS now uses <dfn>"dflydev/markdown": "1.3.*"</dfn>, <a href="https://packagist.org/packages/simplepie/simplepie">available on Packagist</a>.

**Pyrocache Library:** This has been removed, and PyroCMS now uses <dfn>"illuminate/cache": "4.1.*"</dfn>, <a href="https://packagist.org/packages/illuminate/cache">available on Packagist</a>.

**Textile Library:** This has been removed, as PyroCMS was not actually using this for anything in the core. Textile was planned to be supported as a format for page content, but nobody seemed to want it and it never happened.

**Twitter Library:** This has been removed along with the OAuth library that it depended on. No core functionality in PyroCMS was using this, but to allow for those who were using it we have added <dfn>"ruudk/twitter-oauth": "4.1.*"</dfn>, <a href="https://packagist.org/packages/ruudk/twitter-oauth">available on Packagist</a>.

**Payments Spark:** This spark has been used as once again, it was planned to be used by upcoming functionality that was not implemented it. If you are looking for a quality payment library then look into <a href="https://github.com/omnipay/omnipay">Omnipay</a>.

### Update Core Model Usage

If you are using any models or libraries from core modules, then you will notice some differences in 2.3.

Many core modules used to contain a <dfn>models/</dfn> directory, and maybe a <dfn>library/</dfn>. These - in core modules - are now gone, and replaced with one <dfn>src/</dfn> directory. This is a PSR-0 folder which will allow for true autoloaded code - not the old CodeIgniter-style autoloading, which just meant "always-loaded".

For example, if you want to find one user by their username, you can use the following code in one of your controllers:

	<?php
	use Pyro\Module\Users\Model as UserModel;

	class Something extends Public_Controller
	{
		public function profile($username)
		{
			$user = UserModel::findByUsername($username);
			var_dump($user);
		}
	}

Sadly all of our models had to be recoded from the old CodeIgniter style to the new PSR-0, PSR-1 and PSR-2 style, but now we are free
from the CodeIgniter way of doing things we can slowly improve our entire data access layer, and as we improve through 3.x and 4.x we can start to introduce unit-testing, the repository pattern and all sorts of quality practices. 

For 2.3, the biggest goal was to stop using the CodeIgniter Query Builder and DBForge, which just was not working for PyroCMS as we tried to switch to PostgreSQL and SQLite.

Future changes will be kept minimal and manageable compared to this large change. We appologize, but it had to be done.

For help understanding the structure of these new models and libraries, consult the <a href="http://docs.pyrocms.com/2.3/api/">v2.3 API documentation</a>.

### New Streams Drivers

If you have been working with Streams, they have also had a substantial overhaul.

[RYAN IS GOING TO ADD MORE INFO HERE]

### Stop using CodeIgniter Active Record/Query Build and DBForge (Optional)

Each version of PyroCMS from this point will deprecate, and then remove a piece of the CodeIgniter as we move to abandon it entirely. 

To start off with, we have deprecated usage of the Query Builder (previously [incorrectly] called Active Record) and the DBForge. You _can_ still use them both in 2.3, but they will be completely unavailable in 3.0. 

CodeIgniter Query Builder is being replaced by the Laravel <a href="http://laravel.com/docs/queries">Query Builder</a>.
CodeIgniter DBForge is being replaced by the Laravel <a href="http://laravel.com/docs/schema">Schema Builder</a>.

### New Model and Library Structure (Optional)

Just like the core modules, libraries and models should become a file in the `src/` folder of your module, using PSR-0 namespacing.

	<?php
	namespace Pyro\Module\YourModule\Model;

	class Foo {}

This means means you no longer need to specifially load models and libraries in your controllers or other locations with code like this:

	// Remove
	$this->load->model('foo_m');

 Simply place a use statement at the top of your file, which helps PHP understand the location of your class but also provide a simple alias to reference it inside oyur code:

	use Pyro\Module\YourModule\Model\Foo as FooModel;

Then inside your methods, reference your code as:

	$foo = new FooModel;
	$foo->bar();

	// or... 

	FooModel::bar();

3.0 will allow you to use Laravel's <a href="http://laravel.com/docs/facades">Facades</a> or the IoC container, but we had to limit the changes in 2.3 if we were going to make it possible for uses to upgrade. Switching from the CodeIgniter-way was essentially PHP4 style static code, so now we are switching to PHP5-style static code, or manually instantiation, and planning to get everyone onto fully dependency injected greatness in 3.0 - which is already a long way along.

## Rejoice

Done! You are now running the latest, shiniest version of PyroCMS!

We said this in 2.2, but this upgrade was much bigger than usual. Migrating from CodeIgniter to Laravel is going to be a long and tricky road, but the benefits will be - and already have been - huge for developers and users alike. The power being added to PyroCMS is immense, while also improving testability, stability and simplicity.

Remember, if you use Git this is WAY quicker. All database changes are handled automatically (by 'migrations') the next 
time you load up the control panel. 
