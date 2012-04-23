# Upgrading Within 2.0

PyroCMS is in heavy active development, meaning there are frequently {{ link uri="/general/about/changelog" title="new versions" }} with bug fixes and new features. 
You can follow the [blog](http://www.pyrocms.com/blog) and our [Twitter feed](http://www.twitter.com/pyrocms) to be notified of new versions.

Upgrading PyroCMS is quick and easy. Just follow the steps below:

## Download the latest copy of PyroCMS

You can download the latest version of PyroCMS 2.x [here](https://github.com/pyrocms/pyrocms/zipball/v2.0.3).

If you are using git, you can get the latest copy by running:

     git pull git://github.com/pyrocms/pyrocms.git tag v2.0.3

## Backup Your Add-ons and database.php

We're going to replace the entire system, so you'll need to back up any files you've modified. Most likely, this is just the database.php file, which is stored in system/cms/config/database.php and contains your database connection details.  

If you are using a GUI, take care you don't miss any "hidden" files like .htaccess when copying.

Additionally, you'll want to back up any addons that you've added to the addons directory. We'll be replacing this entire folder, so back those up.

## Replace the addons and system folder

Replace the system and addons folders with their new version, and then add your backed up database.php and addons back in.

## Replace index.php with a the new version.

This is not usually the case, but occasionally there will be changes to the root index.php file, so make sure you have the latest one.

### Make sure the following folders are writable:

* system/cms/logs
* system/cms/cache
* system/cms/cache/simplepie
* system/cms/config
* uploads

## Rejoice

That's it! All database changes are handled automatically (by 'migrations') the next time you load up the control panel. You are now running the latest, shiniest version of PyroCMS!
