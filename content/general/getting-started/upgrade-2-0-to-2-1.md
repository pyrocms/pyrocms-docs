# Upgrading v2.0.x to v2.1.x

Any version of the 2.0 branch can be upgraded to any version of the 2.1 branch by following these instructions.

## Download the latest copy of PyroCMS

You can download the latest version of PyroCMS 2.1.x [here](https://github.com/pyrocms/pyrocms/zipball/2.1/master).

If you are using git, you can get the latest copy by running:

     git pull git://github.com/pyrocms/pyrocms.git 2.1/master.

## Backup Your Add-ons and database.php

We're going to replace the entire system, so you'll need to back up any files you've modified. Most likely, this is just the database.php file, which is stored in system/cms/config/database.php and contains your database connection details.  

If you are using a GUI, take care you don't miss any "hidden" files like .htaccess when copying.

Additionally, you'll want to back up any addons that you've added to the addons directory. We'll be replacing this entire folder, so back those up.

## Replace the addons and system folder

Replace the system and addons folders with their new version, and then add your backed up database.php and addons back in.

## Replace index.php with a the new version.

This is not usually the case, but occasionally there will be changes to the root index.php file, so make sure you have the latest one.

### Make sure the following folders are writable

These folders need to be writable (chmod 777) or "Writable by Everyone", and may have had their permissions reset when you uploaded 
them to your server. Make sure they are still writable.

* assets/cache
* system/cms/logs
* system/cms/cache
* system/cms/cache/simplepie
* system/cms/config
* uploads

## Check blog overloaded views

If you were overloading index.php, category.php and tagged.php for the blog module then you will need to take a look at the new posts.php. 
This has replaced those similar files with one file, meaning you have less HTML repeition. It has also changed some of the markup, so you 
may need to fiddle with your CSS a little.

## Rejoice

That's it! All database changes are handled automatically (by 'migrations') the next time you load up the control panel. You are now running the latest, shiniest version of PyroCMS!
