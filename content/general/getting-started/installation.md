# Installation

The first step in getting up and running with PyroCMS is downloading a copy of the latest version and installing it on your development server. 

## Downloading PyroCMS Manually

You can download the latest 2.1.x version of PyroCMS <a href="https://github.com/pyrocms/pyrocms/zipball/2.1/master">here</a>. Extract the files from the zip and copy or upload them to your webserver or development environment.
 
## Downloading PyroCMS using Git

If you are familiar with [git](http://git-scm.com/), you can pull the latest version of PyroCMS from our [GitHub repo](https://github.com/pyrocms/pyrocms).  Make sure you 
are using the correct branch - the {{ link title="PyroCMS versions guide" uri="/general/about/pyrocms-versions" }} explains the difference.

## Installing PyroCMS

After you've got the files in the right place, load up PyroCMS in your browser and the installer should appear. This video below will take you through the process and it's only a few minutes long.

<iframe src="http://player.vimeo.com/video/33693492?title=0&amp;byline=0&amp;portrait=0&amp;color=ff9933" width="700" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>  
  
The installer will guide you through the steps necessary to install PyroCMS, including checking your server for the required software. Check out the 
{{ link title="server requirements" uri="/general/getting-started/server-requirements" }} page for a detailed list of what you'll need.

### Delete the Installer

After you install PyroCMS successfully, it is very important that you delete the installer directory from your PyroCMS installation. You'll no longer need the files, and keeping it there is a security issue.

### Remove Installer Check from index.php

This isn't completely necessary, but once you have installed PyroCMS, you can open up your index.php and remove the install check at the top of the file. The code block should look like this:

     # If you have already installed then delete this
     if ( ! file_exists('system/cms/config/database.php'))
    {
	// Make sure we've not already tried this
	if (strpos($_SERVER['REQUEST_URI'], 'installer/'))
	{
		header('Status: 404');
		exit('PyroCMS is missing system/cms/config/database.php and cannot find installer.');
	}
	
	// Otherwise go to installer
	header('Location: '.rtrim($_SERVER['REQUEST_URI'], '/').'/installer/');
	exit;
    }

This does not affect PyroCMS functionality (unless you do not have a database.php file), but it removes an unnecessary file check.
