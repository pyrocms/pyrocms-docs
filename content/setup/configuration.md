# Configuration

* {{ docs:id_link title="Introduction" }}
* {{ docs:id_link title="Maintenance Mode" }}
* {{ docs:id_link title="Pretty URLs" }}

</div>
<div class="doc_content">

## Introduction

All of the configuration files for PyroCMS are stored in the config directory. Many of the options use the `.env` file that was generated during installation in PyroCMS's root directory.

<div class="note"><strong>Note: </strong> Some of the file based configuration is configurable through and then overridden by the Settings or Preferences modules where applicable.</div>

## Maintenance Mode

When PyroCMS is in maintenance mode (see [Laravel Configuration](http://laravel.com/docs/configuration#maintenance-mode)) or your site is disabled from the Settings module a 503 response will be returned.

### Maintenance Mode Response Views

To override the views for maintenance mode and other status codes create a view in your theme's `views/override`:

	example-theme/resources/views/override/streams/errors/503.twig

<div class="note"><strong>Note: </strong> 404 and 500 response views will be used accordingly when PyroCMS is not in debug mode.</div>

## Pretty URLs

### Apache

The Laravel framework PyroCMS ships with contains a public/.htaccess file that is used to allow URLs without index.php. If you use Apache to serve your Laravel application, be sure to enable the mod_rewrite module.

If the .htaccess file that comes with PyroCMS does not work with your Apache installation, try this one:

	Options +FollowSymLinks
	RewriteEngine On

	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule ^ index.php [L]

### Nginx

On Nginx, the following directive in your site configuration will allow "pretty" URLs:

	location / {
	    try_files $uri $uri/ /index.php?$query_string;
	}
