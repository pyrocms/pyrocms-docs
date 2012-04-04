# Environments

If you've ever used the same codebase for two different environments, you know that switching between the two can be a pain. Luckily, PyroCMS has built-in support for multiple environments 

## Automatic Base URL

PyroCMS guesses your base URL so you don't have to enter it in as a config and change it when you move from development to production. That means you can launch the same code on your localhost as well as your production server and never have to change the URL.

If you find PyroCMS is not able to guess your base URL, you can add in manually in **system/cms/config/config.php** by altering the **base_url** config;

     $config['base_url']	= '';

## Multiple Database Environments

PyroCMS can also choose the database based on your environment. Let's say you have two databases - one on your local machine for development, and one on your production server. You can enter in both of the connection details into the **system/cms/config/database.php** file. The environments available to you are:

* Development
* Staging
* Production

You'll see an array of database connection configuration for each:

     // Development
     $db[PYRO_DEVELOPMENT] = array(
	'hostname'		=> 	'localhost',
	'username'		=> 	'root',
	'password'		=> 	'',
	'database'		=> 	'pyrocms',
	'dbdriver' 		=> 	'mysql',
	'dbprefix' 		=>	'',
	'active_r' 		=>	TRUE,
	'pconnect' 		=>	TRUE,
	'db_debug' 		=>	TRUE,
	'cache_on' 		=>	FALSE,
	'char_set' 		=>	'utf8',
	'dbcollat' 		=>	'utf8_unicode_ci',
	'port' 	 		=>	3306,

	// 'Tough love': Forces strict mode to test your app for best compatibility
	'stricton' 		=> TRUE,
     );

You can tell PyroCMS what environment to load by setting a variable in your .htaccess file using the following syntax:

     SetEnv PYRO_ENV production

Once you've done this you'll need to be careful not to copy your .htaccess back to your development server by mistake (or vice-versa). If you're using 
git you can prevent this with .gitignore, as described below.

If you are using Nginx and php-fpm, you can add PYRO_ENV parameter to Nginx config file like this:

     fastcgi_param PYRO_ENV production;

This sets a variable called **PYRO_ENV** that will be read by PyroCMS and used to load the right database for the current environment.

You choices for the value of **PYRO_ENV** are:

* development
* staging
* production

Each of these corresponds to a database group in your database.php configuration file.

<div class="tip"><strong>Tip:</strong> If you are versioning your PyroCMS site with git, once you have PyroCMS set up for multiple environments, keep your database.php under version control since you will no longer need separate database.php files for development, staging, and production.</div>

### Checking the Environment In Layouts

If you'd like to conditionally check the environment in your PyroCMS layout, you can do so with the **global:environment** tag:

	{{ noparse }}{{ if global:environment == 'production' }}
	
	// Production-only content
	
{{ endif }}{{ /noparse }}

## Ignoring Folders with Git

If you have your project with PyroCMS on git, you can ignore files that you shouldn't share between environments by creating a <strong>.gitignore</strong> file and adding files and folders you want it to ignore to it. Here is a good start for a PyroCMS .gitignore:

    system/cms/cache/
    system/cms/logs/
    .htaccess
    uploads/

<div class="tip"><strong>Note:</strong> In some cases you might want to keep your uploads folder under version control. This is just a suggestion for ignored items.</div>
