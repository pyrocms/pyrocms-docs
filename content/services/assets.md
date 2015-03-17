# Assets <small>Hassle free asset management for addons.</small>

The `Anomaly\Streams\Platform\Asset\Asset` class provides a very simple API for adding assets to your views from various locations in your project.

* {{ docs:id_link title="Introduction" }}
* {{ docs:id_link title="Paths" }}
* {{ docs:id_link title="Filters" }}
* {{ docs:id_link title="Usage" }}
* {{ docs:id_link title="Plugin" }}


## Introduction

Your addons may have assets such as JavaScript, CSS and even Less, SASS and CoffeeScript. Normally, Laravel requires you to compile and publish assets. The Asset service let's you effortlessly include your addon's assets without pre-compiling or publishing.

The asset service is a wrapper for the popular [Assetic](https://github.com/kriswallsmith/assetic) package. You can minify, pre-process, combine, parse and include your assets from any addon.

{{ segment:blue text='Addon assets are stored in the `resources` folder of your addon and use namespaces. For more on addon development, paths, and namespaces see the [development section](http://docs.local:8888/development/introduction).' }}

{{ segment:green text="The asset service automatically publishes the resulting file if needed and will return the published file path for future request. It is encouraged to leverage the asset class in order to consolidate asset requests and let developers and designers to use popular syntax like LESS / SASS." }}

## Paths

The Asset service uses namespaces in order to hint paths to your files. Assets are added to a collection.

	$assets->add('my_collection.js', 'namespace::js/foo.js');

{{ segment:red text="The file extension of the collection is required and determines the output file type." }}

### streams::

This is the path hint for the Streams Platform's resources folder in `vendor/anomaly/streams-platform/resources`

### theme::

This is the path hint for the "active" theme during any given request. If you are in the control panel this will be the active admin theme. Otherwise this will be the active standard theme.

### module::

This is the path hint for the "active" module. The active module is determined by the URI slug in the control panel.

{{ segment:red text="The active module is not always available and this namespace should be used sparingly." }}

### vendor.type.slug::

All addons are namespaced using the addon's vendor, addon type and addon slug.

For example, the blog module would be `anomaly.module.blog::` and points to `the-addon-path/resources`.

### bower::

Bower comes packaged with the Streams Platform. This is the path hint for the bower component files in `bin/bower_components`

	$asset->add('vendor.js', 'bower::jquery/dist/jquery.js');

### Adding Paths

You may add paths at anytime by using resolving or injecting the `\AnomalyStreams\Platform\Asset\AssetPaths` class and adding the path by it's namespace.

	app('Anomaly\Streams\Platform\Asset\AssetPaths')->addPath('s3', 'https://s3-us-west-2.amazonaws.com/my-public-bucket');

{{ segment:blue text="Remote paths (where the path starts with http) can be used but assets will be included as is." }}

You may also add paths to your streams.php config file. The path array should be a key value array where the namespace is the key and the value is the path.

	'asset_paths' => ['neat_assets' => 'my/neat/assets/path']


## Filters

Filters are added as a simple array and allow you to manipulate single asset files or entire collections of assets in different ways. Below is an overview of what each filter does and how to use them.

{{ segment:green text="Some filters are automatically applied to individual files that match a certain pattern. For instance the less filter will be automatically added to less files." }}

You may define filters on assets:

	$asset->add('vendor.js', 'bower::modernizr/dist/modernizr.js', ['min']);
	
Or on entire collections:

	$asset->path('vendor.js', ['min', 'live']);

### less

The less filter will send the asset or collection through the less pre-compiler.

### scss

The scss filter will send the asset or collection through the sass pre-compiler.

### coffee

The coffee filter will send the asset or collection through the coffee pre-compiler.

### embed

The embed filter will embed image data in your stylesheets as base64 encoded data.

### min

The min filter will minify the file or collection when published.

### live

The live filter forces the service to re-publish the file or collection upon every request.

### debug

The debug filter forces the service to re-publish the file or collection upon every request **only when in your application is in debug mode**.

{{ segment:green text="Because all files are sent through the Twig parser first you can use plugins inside your assets." }}


## Usage

The Asset and AssetPaths classes are a singletons. This means you will want to resolve them form the IoC container by using `app('Anomaly\Streams\Platform\Asset\AssetPaths')` or by letting Laravel automatically inject it.

Here is an example of injecting the class into your controller, adding some assets and retrieving the URL, path and tag for the resulting file:

	class ExampleController extends AdminController
	{
	    public function example(Asset $asset)
	    {
	        $asset->add('vendors.js', 'bower::jquery/dist/jquery.js');
   	        $asset->add('vendors.js', 'bower::modernizer/dist/modernizer.js');
   	        
   	        $asset->add('styles.css', 'theme::less/theme.less');
   	        
   	        $url    = $asset->url('vendors.js', ['min']);
   	        $path   = $asset->path('vendors.js', ['min']);
   	        $script = $asset->script('vendors.js', ['min']);
   	        $style  = $asset->style('styles.css', ['debug']);
	    }
	}

You may also get the paths for all the assets in a collection separately:

	class ExampleController extends AdminController
	{
	    public function example(Asset $asset)
	    {  	        
   	        $asset->add('styles.css', 'theme::less/scaffolding.less');
   	        $asset->add('styles.css', 'theme::less/plugins.less');
   	        $asset->add('styles.css', 'theme::less/header.less');
   	        $asset->add('styles.css', 'theme::less/nav.less');
   	        
   	        foreach ($asset->paths('styles.css') as $path) {
   	        	echo url($path);
   	        }
	    }
	}

## Plugin

There are a few functions that are added to Twig with the Asset plugin. They closely follow the API methods:

	{{ asset_add('vendors.js', 'bower::jquery/dist/jquery.js') }}
	{{ asset_add('vendors.js', 'bower::modernizer/dist/modernizer.js') }}
   	        
   	{{ asset_scripts('vendors.js', ['min']) }}

