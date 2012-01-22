# Custom Theme Basics

PyroCMS supports themes which allow you to easily change the look and feel of your web-site. The way it works is with a master <a href="http://pyrocms.com/docs/glossary#theme-layouts">layout</a> file and multiple <a href="http://pyrocms.com/docs/glossary#theme-partials">partials</a> that share presentation logic between different layouts.

## Creating a theme

Like modules, themes are stored in three places: <dfn>addons/shared_addons/themes (for themes available to all sites) &amp;</dfn><dfn> addons/&lt;site-name&gt;/themes (for themes available to only one specific site),&nbsp;</dfn><dfn> system/pyrocms/themes (for default themes).</dfn>

To create your first theme it is a good idea to look at the default theme and see how it works. You might even like to copy it and tweak it to create your own. The default theme is a &quot;core theme&quot; so it is located in <dfn>system/pyrocms/themes/default</dfn>. Copy that to <dfn>addons/</dfn><dfn>shared_addons/</dfn><dfn>themes/custom</dfn> or whatever name you like. Whenever you rename a theme folder you must rename the class name in theme.php to match the folder name.

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

     addons/shared_addons/themes/my-theme-name/theme.php

or

     addons/<site-ref>/themes/my-theme-name/theme.php

No real PHP experience is required to edit this file, just remember to change the last part of &quot;Theme\_Custom&quot; to match your folder. It must always start with &quot;Theme\_&quot; and then have the folder name with the first letter capitalized. As mentioned below in the Theme Options section the &quot;public $options&quot; array is optional. If you do not want to add options, simply remove that section.

<script src="https://gist.github.com/1447647.js?file=gistfile1.aw"></script>

## Theme Options

This feature is optional and may not be necessary for simple themes but for more complex themes it is can be very helpful. The options defined here are accessible in the admin panel via CP &gt; Design &gt; Themes &gt; Options. If you are creating a theme and add another option to theme.php just click the Re-index button in the Options window. This will load the latest options from your theme.php file into the database.

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