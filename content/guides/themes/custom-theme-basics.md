# Custom Theme Basics

PyroCMS supports themes which allow you to easily change the look and feel of your web-site. The way it works is with a master {{ link title="layout" uri="theming/theme-layouts" }} file and multiple {{ link title="partials" uri="theming/theme-partials" }} that share presentation logic between different layouts.

## Creating a theme

Your themes can be stored in one of two places:

	addons/shared_addons/themes (for themes available to all sites)
	addons/[site-name]/themes (for themes available to only one specific site)

When creating your first theme it's a good idea to look at the default theme and see how it works. You might like to copy it and tweak it to create your own. The default theme is a &quot;core theme&quot; so it is located in <dfn>system/cms/themes/default</dfn>. Copy that to <dfn>addons/shared_addons/themes/custom</dfn> or whatever name you like. Whenever you rename a theme folder you must rename the class name in theme.php to match the folder name.

## Supported Folders

* css
* img
* js
* views
* views/layouts
* views/partials
* views/modules

## theme.php

Each theme has it&#39;s own information. Author, version, web-site, etc. This file is located in the root of each theme, here:

     addons/shared_addons/themes/my_theme_name/theme.php

or

     addons/[site-ref]/themes/my_theme_name/theme.php

No real PHP experience is required to edit this file, just remember to change the last part of &quot;Theme\_Custom&quot; in the theme file below to match your folder. It must always start with &quot;Theme\_&quot; and then have the folder name with the first letter capitalized. As mentioned below in the Theme Options section the &quot;public $options&quot; array is optional. If you do not want to add options, simply remove that section.

		<?php defined('BASEPATH') OR exit('No direct script access allowed');
		class Theme_Custom extends Theme
		{
		    public $name            = 'My Theme';
		    public $author          = 'John Smith';
		    public $author_website  = 'http://example.com';
		    public $website         = 'http://example.com/themes/mytheme';
		    public $description     = 'An awesome theme in blue and green with two columns and stuff.';
		    public $version         = '1.0';

		    public $options         =  array(
		        'show_breadcrumbs' =>   array('title'         => 'Show Breadcrumbs',
		                                      'description'   => 'Would you like to display breadcrumbs?',
		                                      'default'       => 'yes',
		                                      'type'          => 'radio',
		                                      'options'       => 'yes=Yes|no=No',
		                                      'is_required'   => TRUE),
		        'layout' =>             array('title'         => 'Layout',
		                                      'description'   => 'Which type of layout shall we use?',
		                                      'default'       => '2 column',
		                                      'type'          => 'select',
		                                      'options'       => '2 column=Two Column|full-width=Full Width',
		                                      'is_required'   => TRUE),
		     );

		 }
		/* End of file theme.php */

## Theme Options

This feature is optional and may not be necessary for simple themes but for more complex themes it is can be very helpful. The options defined here are accessible in the control panel via Design &gt; Themes &gt; Options. If you are creating a theme and add another option to theme.php just click the Re-index button in the Options window. This will load the latest options from your theme.php file into the database.

The available form types are:

* radio
* checkbox
* select
* select-multiple
* text
* textarea
* password

If we were to use a tag to access this example it would look like this:

    {{ noparse }}{{ theme:options option="layout" }}{{ /noparse }}

And it would output either &quot;2 column&quot; or &quot;full-width&quot; depending on the selection in the dropdown in the admin panel.

### screenshot.png

So you can see a preview of your theme in the CP &gt; Design &gt; Themes area you will need to create a screenshot.png and place it in your theme folder.
