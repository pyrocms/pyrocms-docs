# Environments

If you've ever used the same codebase for two different environments, you know that switching between the two can be a pain. Luckily, PyroCMS has built-in support for multiple environments.

There are three built-in environments:

* Development
* Staging
* Production

In this section, we'll take a look at what PyroCMS figures out on its own, and how you can configure your environments for easy switcing between them with the same codebase.

</div>
<div class="doc_content">

## Automatic Base URL

PyroCMS guesses your base URL so you don't have to enter it in as a config and change it when you move from development to production. That means you can launch the same code on your localhost as well as your production server and never have to change any URL configs.

If you find PyroCMS is not able to guess your base URL, you can add in manually in **system/cms/config/config.php** by altering the <var>base_url</var> config;

     $config['base_url']	= '';

## Telling PyroCMS What The Current Environment Is

On Apache, you can tell PyroCMS what environment to load by setting a variable in your .htaccess file using the following syntax:

     SetEnv PYRO_ENV production

Once you've done this you'll need to be careful not to copy your .htaccess back to your development server by mistake (or vice-versa). If you're using 
git you can prevent this with .gitignore, as described below.

If you are using Nginx and php-fpm, you can add PYRO_ENV parameter to Nginx config file like this:

     fastcgi_param PYRO_ENV production;

You choices for the value of **PYRO_ENV** are:

* <samp>development</samp>
* <samp>staging</samp>
* <samp>production</samp>

Once you set your <var>PYRO_ENV</var>, PyroCMS will use that information to do things like use the right database credentials. You can also use this data in your layouts to check what environment you are running the site in.

## Multiple Database Environments

PyroCMS can also choose the database based on your environment. Let's say you have two databases - one on your local machine for development, and one on your production server. You can enter in both of the connection details into the **system/cms/config/database.php** file.

If you open up **system/cms/config/database.php**, you'll see an array of database connection configuration for each environment. For example, here is the developemnt database configuration:

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


Each of these corresponds to a database group in your database.php configuration file.

<div class="note"><p>If you are versioning your PyroCMS site with git, once you have PyroCMS set up for multiple environments, you can keep your database.php under version control since you will no longer need separate database.php files for development, staging, and production.</p></div>

### Checking the Environment In Layouts

If you'd like to conditionally check the environment in your PyroCMS layout, you can do so with the **global:environment** tag:

	{{ noparse }}{{ if global:environment == 'production' }}
	// Production-only content
{{ endif }}{{ /noparse }}

## Ignoring Folders with Git

If you have your project with PyroCMS on git, you can ignore files that you shouldn't share between environments by creating a <strong>.gitignore</strong> file and adding files and folders you want it to ignore to it. If you have pulled down PyroCMS files using git, you'll notice there is already a robust .gitignore included with the repo that you can customize to your needs.