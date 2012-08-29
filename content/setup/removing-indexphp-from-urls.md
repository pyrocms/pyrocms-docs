# Removing index.php from URLs

During installation, PyroCMS will ask you if you have Apache's [mod_rewrite](http://httpd.apache.org/docs/current/mod/mod_rewrite.html) installed. This has to do with the PHP framework PyroCMS is built on, 
[CodeIgniter](http://www.codeigniter.com).

In CodeIgniter, everything is routed through the index.php file, so your URL might look like:

     http://www.example.com/index.php/about

Obviously, we want to remove that ugly index.php, and you can do so with an .htaccess file, and Apache's mod_rewrite.

To remove the index.php, create a file at the root of your PyroCMS site called **.htaccess**. You can [find out more about .htaccess here](http://httpd.apache.org/docs/current/howto/htaccess.html), but for our purposes here we just want to use it to hide index.php in our URLs.

Not every web server is the same, but something along these lines should work for your purposes:

    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ /index.php?/$1 [L]

This tells Apache to remove the index.php from the URL entirely (whilst still serving any 'real' files -f or directories -d from your docroot.)

Your URLs will now look clean and smooth:

     http://www.example.com/about

If you chose the no mod_rewrite during installation and your links keep adding the index.php, open up **system/cms/config/config.php** and change:

     $config['index_page'] = 'index.php';

to:

     $config['index_page'] = '';

This will stop PyroCMS from prefixing links with index.php
