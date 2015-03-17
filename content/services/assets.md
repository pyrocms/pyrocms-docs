# Assets <small>Hassle free asset management for addons.</small>

The `\Anomaly\Streams\Platform\Asset\Asset` class provides a very simple API for adding assets to your views from various locations in your project.

* {{ docs:id_link title="Introduction" }}
* {{ docs:id_link title="Paths" }}
* {{ docs:id_link title="Usage" }}
* {{ docs:id_link title="Plugin" }}


## Introduction

Your addons may have assets such as JavaScript, CSS and even Less, SASS and CoffeeScript. Normally, Laravel requires you to compile and publish assets. The Asset service let's you effortlessly include your addon's assets without pre-compiling or publishing.

The asset service is a wrapper for the popular [Assetic](https://github.com/kriswallsmith/assetic) package. You can minify, pre-process, combine, parse and include your assets from any addon.

{{ segment:blue text='Addon assets are stored in the `resources` folder of your addon and use namespaces. For more on addon development, paths, and namespaces see the [development section](http://docs.local:8888/development/introduction).' }}


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

{{ segment:blue text="You may also manually flag the active module during a request by using the `ModuleCollection` class." }}