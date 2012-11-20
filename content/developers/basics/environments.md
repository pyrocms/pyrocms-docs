# Environments

Developers often desire different system behavior depending on whether
an application is running in a development or production environment.
For example, verbose error output is something that would be useful
while developing an application, but it may also pose a security issue
when "live".

## The ENVIRONMENT Constant

By default, PyroCMS comes with the environment constant set to 'development'. Near the top of index.php, you will see::

	define('PYRO_DEVELOPMENT', 'development');
	define('PYRO_STAGING', 'staging');
	define('PYRO_PRODUCTION', 'production');

	define('ENVIRONMENT', (isset($_SERVER['PYRO_ENV']) ? $_SERVER['PYRO_ENV'] : PYRO_DEVELOPMENT));

In addition to affecting some basic framework behavior (see the next
section), you may use this constant in your own development to
differentiate between which environment you are running in.

## Effects On Default Framework Behavior

There are some places in PyroCMS where the <kbd>ENVIRONMENT</kbd> constant is used. This section describes how default framework behavior is affected.

### Error Reporting

Setting the <kbd>ENVIRONMENT</kbd> constant to a value of `'development'` will cause
all PHP errors to be rendered to the browser when they occur.
Conversely, setting the constant to `'production'` will disable all error
output. Disabling error reporting in production is a good security.

### Configuration Files

Optionally, you can have PyroCMS load environment-specific
configuration files. This may be useful for managing things like
differing API keys across multiple environments. This is described in
more detail in the environment section of the [CodeIgniter Config
Class](http://codeigniter.com/user_guide/libraries/config.html#environments) documentation.

## Setting $\_SERVER['PYRO\_ENV']

The easiest way to change ENVIONMENTS is to make your servers aware of what envionment PyroCMS expects them to be. You can do this with a nice interface if you use a Platform-as-a-Service like Pagoda Box or PHP Fog for your hosting, but can be a little more tricky for others. Apache supports a SetEnv via [mod\_env](http://httpd.apache.org/docs/2.2/mod/mod_env.html) and this can be done in your main Apache config, or you can open .htaccess in the root folder and remove the **`#`** from this line:

	SetEnv PYRO_ENV production