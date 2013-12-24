# Server Requirements

Below are the server requirements for running PyroCMS 2.x. If you aren't sure if you have all of these, PyroCMS will check for them on installation for you.

</div>
<div class="doc_content">

### A HTTP Server

Any of the following HTTP servers will work.

* Apache 2.x
* nginx
* Abyss Web Server
* Uniform Server
* Zend Community Server

So far PyroCMS only seems to struggle with IIS.

### Database Server

* MySQL v5.1 or higher
* PostgreSQL v8.0 or higher
* SQLite v3.6 or higher

### PHP

PHP 5.3.7 and up (including PHP 5.4.x and 5.5.x) are both fully supported.

### GD 2

This library needs to be installed on your server with PHP compiled to include it.  Usually your package manager will take care of this for you, if not you can get it <a href="https://bitbucket.org/pierrejoye/gd-libgd/overview" target="_blank" title="Find out how to make GD2 work with PHP">here</a> (the Libgd wiki is currently unavailable.)

### cURL

<a href="http://curl.haxx.se/" target="_blank">libcurl 7.10.5 or greater</a> need's to be installed on your server with PHP compiled to include it. Usually your package manager will take care of this for you, if not see instructions <a href="http://curl.haxx.se/libcurl/php/install.html" target="_blank" title="Find out how to make cURL work  with PHP">here</a>.

### Bundled Requirements

PyroCMS uses these third-party packages to run, but includes them in each release so you do not need to install them yourself:

* <a href="http://codeigniter.com/" target="_blank">CodeIgniter 2.1.x</a>
* <a href="http://jquery.com/" target="_blank">jQuery 1.7.x</a>
* <a href="http://github.com/pyrocms/lex" target="_blank">Lex</a>
