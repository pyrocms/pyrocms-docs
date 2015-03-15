# Theme Tutorial

<div class="note"><strong>Note:</strong> Make sure you read and understand the {{ link uri="tutorials/index" title="Basics" }} before you continue.</div>

## Template Engine

PyroCMS uses [Twig](http://twig.sensiolabs.org) as it's template engine to display web pages.


## Complete Example

Want to play with some code?

[Download a complete example](https://github.com/anomalylabs/example-theme)

## The Tutorial

We'll be expanding the examples from the {{ link uri="tutorials/index" title="Tutorial Introduction" }} page.

## Folder structure



    /addons/shared/example/super-theme
      |
      |- .git
      |- composer.json
      |- LICENSE.md
      |- README.md
      |- src
            |- SuperTheme.php
            |- SuperThemeRouteProvider.php
            |- SuperThemeServiceProvider.php
      |- resources
         |
         |- css  //folder
         |- fonts //folder
         |- img  //folder
         |- js  //folder
         |- lang   
            |- en 
                |- addon.php
         |-views
            |- hello.twig
            |- layouts
                  |- default.twig  
            |- partials
                   |- header.twig
                   |- footer.twig
                   |- metadata.twig
                   |- messages.twig


## Git files

If you have a github (or other git repository account) you can create a repository and then clone that locally to save your work.  It is highly recommended, but not a requirement.  More information can be found at [Github](http://github.com) and [Bitbucket](http://bitbucket.com)

## Composer

If you intent to publish your work publicly, it's best to use git workflow coupled with [Packagist](https://packagist.org).  The file that helps control how your work appears is composer.json. Since PyroCMS leverages psr-4 autoloading, you must include the bare essentuals for you work. Below is the composer.json file for our example.  


    {
        "name": "example/super-theme",
        "type": "streams-addon",
        "description": "A seriously super theme!",
        "keywords": [
            "theme",
            "streams",
            "super",
            "pyrocms"
        ],
        "homepage": "http://example.com/",
        "version": "1.0.0-dev",
        "license": "MIT",
        "authors": [ 
            {
                "name": "Example, Inc.",
                "email": "you@example.com",
                "homepage": "http://example.com/",
                "role": "Clown"
            }
        ],
        "autoload": {
            "psr-4": {
                "Example\\SuperTheme\\": "src/"
            }
        },
        "support": {
            "email": "help@example.com",
            "issues": "https://github.com/example/super-theme/issues"
        },
        "extra": {
            "branch-alias": {
                "dev-master": "1.0.x-dev"
            }
        },
        "minimum-stability": "stable"
    }


## LICENSE.md

This is the optional license file for which you are releasing your work.  There are many type of licenses, it's up to you what license you want to release your software under.


## README.md

This is an optional file to explain what your project is and how to use it. On Github and Bitbucket, this is the first content people see.  The more time you spend explaining the ins and outs of your software, the more likely people are to use it.

## The src Folder

For those used to previous versions of PyroCMS, this is somewhat equivelent to the controller folder, but it houses all of the files your project needs to control it's behavior which includes models. `views` are still seperate.

### src/SuperTheme.php

    <?php namespace Example\SuperTheme;

    use Anomaly\Streams\Platform\Addon\Theme\Theme;

    /**
     * Class SuperTheme
     *
     * @link          http://example.com
     * @author        Your Name <you@example.com>
     * @package       Example/SuperTheme
     */
    class SuperTheme extends Theme
    {

    }

You should recall in the Tutorial Introduction we discussed Namespaces.  In the code above you'll see that we've carried our Vendor and Project names over when we declare the namespace, again, immediately after the opening PHP tag.

Next, we 'use' Anomaly\Streams\Platform\Addon\Theme\Theme which grants us access to that namespace as well.  Once we have access to the Theme namespace we can `extend` that class with our own by declaring `class SuperTheme extends Theme`.  Now we have access to Theme's functions as well as any we write.

### src/SuperThemeRouteProvider.php

    <?php namespace Example\SuperTheme;
    use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
    use Illuminate\Routing\Router;
    /**
     * Class SuperThemeRouteProvider
     *
     * @link          http://example.com
     * @author        Example, Inc. <you@example.com>
     * @package       Example\SuperTheme
     */
    class SuperThemeRouteProvider extends RouteServiceProvider
    {
        /**
         * Map the routes.
         *
         * @param Router $router
         */
        public function map(Router $router)
        {
            $router->any(
                '/',
                function () {
                    return view('theme::hello');
                }
            );
        }
    }

Again we declare our namespace and `use` (include) some other namespaces.  Then we declare our class and extend the RouteServiceProvider.

### src/SuperThemeServiceProvider

    <?php namespace Example\SuperTheme;
    use Illuminate\Support\ServiceProvider;
    /**
     * Class SuperThemeServiceProvider
     *
     * @link          http://example.com
     * @author        Example, Inc. <you@example.com>
     * @package       Example\SuperTheme
     */
    class SuperThemeServiceProvider extends ServiceProvider
    {
        /**
         * Register the service provider.
         *
         * @return void
         */
        public function register()
        {
            $this->app->register('Example\SuperTheme\SuperThemeRouteProvider');
        }
    }

Again we declare our namespace and `use` (include) some other namespaces.  Then we declare our class and extend the ServiceProvider.


## The resources folder

The resources folder is, obviously, where all files reside that it either used dynamically or statically.  You should remember there is great diversity in this folder.  There can be any number of folders and nested folder to help maintain your work. There are only a few required files and folders and these are: 
    
    lang/en/addons.php // provides support for theme info in admin
    views/hello.twig  // defined in src/SuperThemeRouteProvider.php

While that is the bare minimum we don't want everything to be in one file `hello.twig`. It's highly recommended to create layouts and partials folder to more easily maintain your code.  In those folders it's up to you how you set your layouts and partials.

### hello.twig

In `hello.twig` we extend our theme with:

    {% extends "theme::layouts/default" %} 

    {% block content %}
        {{ content|raw }}
    {% endblock %}

`layouts/default` will vary depending on your specific circumstances.


### layouts/default

Similar to any theme structure, and where this becomes little-changed from older PyroCMS versions, `default.twig` houses the basic formatting for the web pages.

    <!doctype html>
    <html>

    <head>
        {% include "theme::partials/metadata" %}
    </head>

    <body>

    {% include "theme::partials/header" %}
    {% include "theme::partials/messages" %}

    <section id="content" class="container-fluid">
        {{ block('content') }}
    </section>

    {% include "theme::partials/modals" %}
    {% include "theme::partials/footer" %}

    </body>
    </html> 

In `layouts/default.twig` you'll see we pull a number of partials into the layout which will finish the layout and make a presentable and proper html page for your website.

Below are the contents of the partial files:

### partials/footer.twig

    <footer class="container-fluid" id="footer">
        <div class="row-fluid">

            <p class="text-muted">
              <b>
                &copy; Copyright {{ now|date('Y') }} - Example, Inc. - All Rights Reserved
              </b>
            </p>

        </div>
    </footer>

### header.twig

    <header class="container-fluid" id="header">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span id="logo"></span>
                <a class="navbar-brand" href="{{ url('/') }}" target="_blank">My Seriously Awesome Website</a>
            </div>

            <div class="collapse navbar-collapse" id="header-nav">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url_to('/') }}">Home</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

### messages.twig

    <section id="messages" class="container-fluid">

        <!-- Success Messages -->
        {% if message_exists('success') %}
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>

                {% for message in message_get('success') %}
                    {{ trans(message)|markdown }}
                {% endfor %}
            </div>
        {% endif %}

        <!-- Informational Messages -->
        {% if message_exists('info') %}
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>

                {% for message in message_get('info') %}
                    {{ trans(message)|markdown }}
                {% endfor %}
            </div>
        {% endif %}


        <!-- Warning Messages -->
        {% if message_exists('warning') %}
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>

                {% for message in message_get('warning') %}
                    {{ trans(message)|markdown }}
                {% endfor %}
            </div>
        {% endif %}


        <!-- Error Messages -->
        {% if message_exists('error') %}
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>

                {% for message in message_get('error') %}
                    {{ trans(message)|markdown }}
                {% endfor %}
            </div>
        {% endif %}

    </section>


### metadata.twig

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width"/>
    <meta name="author" content="Enliven Applications"/>
    <meta name="generator" content="Streams Platform"/>

    <!-- Facebook Meta Tags -->
    <meta property="og:image" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:type" content="website"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>
        My Super Awesome Website
    </title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ image_url('theme::img/favicon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ image_url('theme::img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ image_url('theme::img/favicon.png') }}"/>

    <!-- CSS -->
    {#  add CSS to asset_path into theme.css for caching #}
    {{ asset_add("theme.css", "theme::css/bootstrap.min.css") }}  // add a single file
    {{ asset_add("theme.css", "theme::css/font-awesome.css") }}   // add a single file
    {{ asset_add("theme.css", "theme::css/theme/*") }}            // add all files in folder

    {# combine all css files #}
    {{ html_style(asset_path("theme.css")) }}

    {# compile CSS for caching #}
    {% for path in asset_paths("styles.css") %}
        {{ html_style(path) }}
    {% endfor %}


    <!-- JS -->
    {# add JS to asset_path into theme.js for caching #}
    {{ asset_add("theme.js", "theme::js/jquery-1.11.1.js") }}
    {{ asset_add("theme.js", "theme::js/modernizr.js") }}
    {{ asset_add("theme.js", "theme::js/bootstrap/*") }}
    {{ asset_add("theme.js", "theme::js/theme/*") }}

    {# combine all js files #}
    {{ html_script(asset_path("theme.js")) }}

    {# compile JS for caching #}
    {% for path in asset_paths("scripts.js") %}
        {{ html_script(path) }}
    {% endfor %}






























