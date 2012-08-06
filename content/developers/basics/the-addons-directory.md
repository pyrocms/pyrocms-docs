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

An important note is that you cannot extend helpers or libraries found in the system/ directory automatically (neither system/cms or system/codeigniter) as the <a href="http://codeigniter.com/user_guide/libraries/loader.html" target="_blank">CodeIgniter Loader class</a> does not know to look there. The only way to do this is to extend the library in your module, and reference it manually.

To extend a core library, build a class similar to the following:

    class Search_Input extends CI_Input
    {
        // Do something...
    }

Save it in the libraries/ folder of your module as search_input.php, and load it where necessary:

    $this->load->library('search_input');

It is NOT recommended to extend or overwrite libraries in the system/cms or system/codeigniter folders, as this breaks the ability to easily upgrade PyroCMS, and makes it difficult to find your code at a later date.

In a similar way there are limitations on what config files you can put into your module. For example; config files like autoload.php and database.php will have no effect here. It is recommended you only put custom config files in here that will be loaded and used within your own add-ons.

You can use the **addons/shared\_addons/** folder in exactly the same way as the old **addons/** folder. The only difference is that when you upload a module or a theme from the site's admin panel it will be placed in **addons/default/**. Then if you upgrade to the Professional version at some point that theme, module, or widget will be confined to one site only. If you upgrade to Professional the add-ons for each additional site that you create will be placed in their own folder (**addons/__site\_name__**).