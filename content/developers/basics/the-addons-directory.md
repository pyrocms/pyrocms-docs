# The Add-ons Directory

The **/addons** directory is the main location for all custom code and is simply a CodeIgniter **"Application Package"**. The main purpose of this folder is to store all third-party or custom modules, widgets and plugins but it can also be used to share custom config, libraries, helpers and language files between your addons.

Multiple sites are available in PyroCMS Professional, so addons are divided between PyroCMS sites, and can therefore be stored in one of the following locations:

* addons/shared\_addons - These are available to _all_ sites
* addons/default - Available only to the default site
* addons/*&lt;site-name&gt; - Available to your custom site

Below is a full list of folders you can put in your addons directory:

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

An important note is that you cannot extend helpers or libraries found in the system/ directory automatically (neither system/cms or system/codeigniter) as the <a href="http://codeigniter.com/user_guide/libraries/loader.html" target="_blank">CodeIgniter Loader class</a> does not know to look there. The only way to do this is to extend the library in the addons folder, and reference it manually.

To extend a core library, build a class similar to the following:

    class Search_Input extends CI_Input
    {
        // Do something...
    }

Save it in the libraries/ folder, and load it where necessary:

    $this->load->library('search_input');

It is NOT recommended to extend or overwrite libraries in the system/cms or system/codeigniter folders, as this breaks the ability to easily upgrade PyroCMS, and makes it difficult to find your code at a later date.

In a similar way there are limitations on what config files you can put into the config/ folder. For example; config files like autoload.php, database.php and routes.php will have no effect here. It is recommended you only put custom config files in here that will be loaded and used within your own add-ons.

You can use the **addons/shared\_addons/** folder in exactly the same way as the old **addons/** folder. The only difference is that when you upload a module or a theme from the site's admin panel it will be placed in **addons/default/**. Then if you upgrade to the Professional version at some point that theme, module, or widget will be confined to one site only. If you upgrade to Professional the add-ons for each additional site that you create will be placed in their own folder (**addons/__site\_name__**).