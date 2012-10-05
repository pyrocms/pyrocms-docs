# Modules

Many add-ons need more than just functionality you can access via PyroCMS tags. Sometimes you need an interface in the control panel, as well as other resources like javascript files.

Modules are the largest type of PyroCMS add-on. They have a place in the control panel menu (usually), have control panel controls, their own widgets, and their own plugins.

For instance, the Pages module contains the control panel area that allows you to create and organize pages, and also the {{ link title="pages plugin" uri="plugins/pages" }}, which allows you to do things like display a page tree with PyroCMS tags.

What makes PyroCMS modules unique is the fact that they can have public-facing pages as well.

For instance, the Blog module allows you to manage posts in the control panel, but yoursite.com/blog maps to the blog module and displays posts using your theme.

## Installing Modules

To install a module go to **Add-ons** in the control panel and click Upload. Select the zipped archive and upload. If your module does not show up or work properly check to make sure that the folder structure is correct when the archive is extracted.

Alternatively, you can simply upload the module folder into your _addons/shared\_addons/modules_ or _addons/[site-ref]/modules_ folder. Once you refresh the add-ons control panel page, you should see it in the modules list. Click **Install** to install it. 

### Disabling or Uninstalling a module

If you want to remove a module from the front-end and from the admin menus you may Disable the module. If you are completely done with the data you may Uninstall it. To remove the data and delete the module itself use the Delete feature.

<div class="tip"><strong>Warning:</strong> Deleting a module deletes all source files, uploaded files, and database records associated with the module.</div>
