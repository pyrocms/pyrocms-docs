# The Add-ons Directory

The **/addons** directory is the main location for all custom code and is simply a CodeIgniter **"Application Package"**. The main purpose of this folder is to store all third-party or custom modules, widgets and plugins but it can also be used to share custom config, libraries, helpers and language files between your addons.

Below is a full list of folders you can put in the addons directory:

* config/
* helpers/
* language/
* libraries/
* models/
* modules/
* plugins/
* themes/
* widgets/

All of your custom code should fit into one of those folders and should be developed in the same way as you normally would in a CodeIgniter application.

An important note here is that you cannot extend helpers or libraries found in the system/ directory (neither system/pyrocms/ or system/codeigniter) as the <a href="http://codeigniter.com/user_guide/libraries/loader.html" target="_blank">CodeIgniter Loader class</a> does not know to look there. This is a "limitation" of CodeIgniter itself, so if you need to extend core files you will need to either extend in system/pyrocms or extend there. If you do this make sure you are tracking your changes with Git as otherwise you will end up loosing your modifcations next time you upgrade PyroCMS.

In a similar way there are limitations on what config files you can put into here. For example config files like autoload.php, database.php and routes.php will have no effect here. It is recommended you only put custom config files in here that will be loaded and used within your own add-ons.

You can use the **addons/shared\_addons/** folder in exactly the same way as the old **addons/** folder. The only difference is that when you upload a module or a theme from the site's admin panel it will be placed in **addons/default/**. Then if you upgrade to the Professional version at some point that theme, module, or widget will be confined to one site only. If you upgrade to Professional the add-ons for each additional site that you create will be placed in their own folder (**addons/__site\_name__**).