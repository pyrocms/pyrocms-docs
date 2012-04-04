# Add-ons

Add-ons are things you can download and install in PyroCMS to add functionality. They come in three types: **Widgets**, **Plugins**, and **Modules** ({{ link title="overview" uri="/general/basics/widgets-plugins-and-modules" }}).

## Installing Modules

To install a module go to **Add-ons** in the control panel and click Upload. Select the zipped archive and upload. If your module does not show up or work properly check to make sure that the folder structure is correct when the archive is extracted.

Alternatively, you can simply upload the module folder into your _addons/shared\_addons/modules_ or _addons/&lt;site-ref&gt;/modules_ folder. Once you refresh the add-ons control panel page, you should see it in the modules list. Click **Install** to install it. 

### Disabling or Uninstalling a module

If you want to remove a module from the front-end and from the admin menus you may Disable the module. If you are completely done with it you may Uninstall it.

<div class="tip"><strong>Warning:</strong> Uninstalling a module deletes all source files, uploaded files, and database records associated with the module.</div>

## Installing Widgets

To install a widget you need to upload it to _addons/shared\_addons/widgets_ or _addons/&lt;site-ref&gt;/widgets_. Then navigate to **Content &rarr; Widgets**. Your widget should now show up in the list. To use it simply drag it into the appropriate Widget Area just like any other widget.

## Installing Plugins

Plugins have no installation procedure. Just upload them to _addons/shared\_addons/plugins_ or _addons/&lt;site-ref&gt;/plugins_ and use the tag in your layouts!
