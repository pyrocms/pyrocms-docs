# Configuring Nginx with PHP-FPM

For those of you that like using [Nginx](http://nginx.org/), we have good news, you can run PyroCMS just fine. 

## Setting up your virtual host

We are going to use try\_files instead of the Rewrite Module. You can find out more about try\_files [here](http://wiki.nginx.org/HttpCoreModule#try_files).


	server {
	        listen 80;
	        server_name domain.com;
	        root /path/to/webroot;
	        index index.php;
	 
	        access_log  /path/to/logs/access.log  main;
	        error_log  /path/to/logs/error.log;
	 
	        client_max_body_size 200M;
	 
	        gzip  on;
	        gzip_static on;
	        gzip_http_version 1.0;
	        gzip_disable "MSIE [1-6].";
	        gzip_vary on;
	 
	        gzip_comp_level 9;
	        gzip_proxied any;
	        gzip_types text/plain text/css application/x-javascript text/xml application/xml application/xml+rss text/javascript;
	 
	        fastcgi_buffers 8 16k;
	        fastcgi_buffer_size 32k;
	        fastcgi_read_timeout 180;
	 
	        location / {
	                try_files $uri $uri/ /index.php;
	        }
	 
	         location /installer {
	                try_files $uri $uri/ /installer/index.php;
	        }
	 
	        fastcgi_intercept_errors off;
	 
	        location ~* .(?:ico|css|js|gif|jpe?g|png)$ {
	                expires max;
	                add_header Pragma public;
	                add_header Cache-Control "public, must-revalidate, proxy-revalidate";
	        }
	 
	        location ~ .php {
	                fastcgi_pass   unix:/tmp/domain.sock;
	                fastcgi_split_path_info ^(.+.php)(.*)$;
	                fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
	                include        fastcgi_params;
	        }
	 
	        include drop.conf;
	}
	
This configuration will work out of the box when PyroCMS is first uploaded to the web root.  One recommendation I have is to make the following changes to the **/installer/config/config.php** and **/system/cms/config/config.php**.

	$config['index_page'] = "";
	$config['uri_protocol'] = "REQUEST_URI";

## Fast CGI Params

Below are the included fastcgi\_params that users have reported have worked:

	fastcgi_param  QUERY_STRING       $query_string;
	fastcgi_param  REQUEST_METHOD     $request_method;
	fastcgi_param  CONTENT_TYPE       $content_type;
	fastcgi_param  CONTENT_LENGTH     $content_length;
	 
	fastcgi_param  SCRIPT_NAME        $fastcgi_script_name;
	fastcgi_param  REQUEST_URI        $request_uri;
	fastcgi_param  DOCUMENT_URI       $document_uri;
	fastcgi_param  DOCUMENT_ROOT      $document_root;
	fastcgi_param  SERVER_PROTOCOL    $server_protocol;
	 
	fastcgi_param  GATEWAY_INTERFACE  CGI/1.1;
	fastcgi_param  SERVER_SOFTWARE    nginx/$nginx_version;
	 
	fastcgi_param  REMOTE_ADDR        $remote_addr;
	fastcgi_param  REMOTE_PORT        $remote_port;
	fastcgi_param  SERVER_ADDR        $server_addr;
	fastcgi_param  SERVER_PORT        $server_port;
	fastcgi_param  SERVER_NAME        $server_name;
	 
	# PHP only, required if PHP was built with --enable-force-cgi-redirect
	fastcgi_param  REDIRECT_STATUS    200;
	 
	fastcgi_connect_timeout 60;
	fastcgi_send_timeout 180;
	fastcgi_read_timeout 180;
	fastcgi_buffer_size 128k;
	fastcgi_buffers 4 256k;
	fastcgi_busy_buffers_size 256k;
	fastcgi_temp_file_write_size 256k;
	fastcgi_intercept_errors off;

## Drop.conf Include

The first two lines stops the robot and favicon 404 from logging. The third line stops hidden files from being served. The fourth line prevents temporary files being served such as those created when editing files with vim.

	location = /robots.txt  { access_log off; log_not_found off; }
	location = /favicon.ico { access_log off; log_not_found off; }
	location ~ /\.          { access_log off; log_not_found off; deny all; }
	location ~ ~$           { access_log off; log_not_found off; deny all; }

## Setting up the PHP\-FPM Pool

The pool is setup using Unix sockets to reduce the TCP overhead. I find this method to increase performance on small VPS environments. For more information about the PHP\-FPM config file click [here](http://php-fpm.org/wiki/Configuration_File).

	[domain]
	listen = /tmp/domain.sock
	listen.allowed_clients = 127.0.0.1
	 
	user = someuser
	group = someuser
	 
	pm = dynamic
	 
	pm.max_children = 25
	pm.start_servers = 2
	pm.min_spare_servers = 2
	pm.max_spare_servers = 25
	 
	php_admin_value[error_log] = /var/log/php-fpm/domain-error.log
	php_admin_flag[log_errors] = on
	php_admin_value[session.save_path] = /tmp/ 
	
## Configuring Fast CGI Params for Multi\-Site

Outlined [here](http://hetaojl.com/blog/?p=15) Nginx uses what **$_SERVER['server\_name']** as the first server listed in the virtual server config. This causes login problems when trying to login a site where the URL doesn't match the first server\_name. One way to get around this is to setup the FastCGI params to use host instead of server\_name.

Update the fastcgi\_param from:

	fastcgi_param SERVER_NAME $server_name;
	
to:

	fastcgi_param SERVER_NAME $host;

Keep in mind this is just a work around and if you do not fully understand the implications do not make this change.
