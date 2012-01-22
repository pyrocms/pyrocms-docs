During installation, PyroCMS will ask you if you have Apache's mod_rewrite installed. This has to do with the PHP framework PyroCMS is built on: CodeIgniter.

In CodeIgniter, everything is routed through the index.php file, so your URL might look like:

     http://www.example.com/index.php/about

Obviously, we want to remove that index.php, and you can do so with an .htaccess file, and mod_rewrite.

To implement this, create a file at the root of your PyroCMS site called **.htaccess**. You can find out more about .htaccess [here](http://httpd.apache.org/docs/1.3/howto/htaccess.html), but for our purposes here we just want to use it for one purpose: get rid of the ugly looking index.php from our URLs.

Not every web server is the same, but something along these lines should work for your purposes:

    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ /index.php?/$1 [L]

This tells Apache to remove the index.php from the URL entirely, and your URLs will look clean and smooth:

     http://www.example.com/about

If you chose the no mod_rewrite during installation and your links keep adding the index.php, open up **system/cms/config/config.php** and change:

     $config['index_page'] = 'index.php';

to:

     $config['index_page'] = '';

This will stop PyroCMS from adding index.php into links.