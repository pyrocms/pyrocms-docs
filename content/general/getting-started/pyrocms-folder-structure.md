One good core skill to have with PyroCMS is knowing what the folder structure is and what is where, so let's take a look at the folder/files that power PyroCMS.

#### The Add-on Folder

All extra modules, plugins, widgets, and themes you add to PyroCMS go here in their respective folders. However, inside of addons there will be at least two folders:

1. default (most likely)
2. shared_addons

Since PyroCMS Pro is multi-site enabled, even single installs of PyroCMS get their own identifiers. If you install a single copy of PyroCMS, your site will get the identifier "default", which is why you see that default folder sitting there.

If you are using PyroCMS Pro, all add-ons that you want to be shared between sites go in your shared_addons folder. Add-ons that only belong to specific sites can go in their respective folders that are created on installation of the site.

If you are running the regular PyroCMS version with one site, you can put your add-ons in either folder - PyroCMS will look in both places.

#### The system Folder

The system folder contains two main things: a copy of CodeIgniter (the PHP framework that PyroCMS runs on) and PyroCMS itself. You will most likely never have to go inside this folder, but there are two files you should know:

_system/cms/config/database.php_

When PyroCMS installs, it will create this file for you with your MySQL login data. However, if you want to change that data or add data for another environment (see [PyroCMS Environments]()), you'll need to edit this file.

_system/cms/config/config.php_

This is the CodeIgniter application config file, and has a whole lot of items that you'll never need to touch. In fact, PyroCMS automatically sets your base url so you could never look at this file and be fine!

However, if you start out without mod_rewrite URLs (ie: with index.php still in them), and you want to get rid of links adding index.php to your URLs later on, you can remove that easily by finding:

	$config['index_page'] = 'index.php';

and changing it to:

	$config['index_page'] = '';

That's it! PyroCMS' folder structure is very neat and tidy, so that's all there is to it!