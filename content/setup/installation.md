# Installation <small>You are three steps away from development bliss.</small>

* {{ docs:id_link title="Install Composer" }}
* {{ docs:id_link title="Install PyroCMS" }}
* {{ docs:id_link title="Server Requirements" }}
* {{ docs:id_link title="Configuration" }}

</div>
<div class="doc_content">

## Install Composer

PyroCMS uses [Composer](https://getcomposer.org/) to manage dependencies and addons. Before going any further, make sure you have Composer installed on your machine.

## Install PyroCMS

### Via Build Download

You can download the latest build of PyroCMS from our website at [https://pyrocms.com/download](https://pyrocms.com/download).

The download includes all the dependencies included. Simply unzip and continue to run the installer.

### Via Git (requires composer)

You can install PyroCMS by simply cloning it to your machine:

	git clone https://github.com/pyrocms/pyrocms

After the download finishes you must run `composer install` from your PyroCMS directory.

### Via Composer

You can install PyroCMS by using the Composer create-project command in your terminal:

	composer create-project pyrocms/pyrocms --prefer-dist

### Run Installer

After you have downloaded PyroCMS and installed it's dependencies you must run the installer by visiting your installation URL. The installer will load and will walk you through the simple requirements to install PyroCMS.

<div class="ui segment blue"><strong>Note:</strong> If PyroCMS was installed via Composer or Git then loading the installer may take longer than normal while the system publishes assets for the first time.</div>

Once the installer finishes, you are all set! You can now login or view the site. The admin control panel is always located at `/admin`:

	http://localhost/pyro/admin

## Server Requirements

PyroCMS has a few system requirements:

- PHP >= 5.4
- Mcrypt PHP Extension
- OpenSSL PHP Extension
- Mbstring PHP Extension

As of PHP 5.5, some OS distributions may require you to manually install the PHP JSON extension. When using Ubuntu, this can be done via `apt-get install php5-json`.

## Configuration

The installer takes care of most of the initial configuration options for you. No configuration is required.

Other optional configuration can be set in the `.env` file and the configuration files found in the `config/` directory.

The [settings](#settings) and [Preferences](#preferences) modules will override fallback configuration in the `.env` file in some cases.

### Permissions

PyroCMS may require some permissions to be configured: folders within **storage** and **public/assets** require write access by the web server.

<div class="ui segment blue"><strong>Note:</strong> PyroCMS is built on Laravel. In some cases it may be helpful to consult the <a href="http://laravel.com/docs">Laravel documentation</a>.</div>
