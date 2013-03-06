# Plugins 

Plugins are the simplest type of add-on in PyroCMS, but they are at the core of how you access functionality via {{ link title="tags" uri="guides/pyrocms-tags" }}.

</div>
<div class="doc_content">

## Example Usage

Let's take the user plugin, which is a part of the user module (modules can have a plugin as a part of the module, see the {{ link title="module overview" uri="guides/addons/modules" }} for more info on that).

Each plugin has a name by which we reference it in the tags. For example, the {{ link title="format plugin" link="plugins/format" }}'s variables and functions can be referenced with <samp>format:foo</samp>. So, you can use the markdown's format function like this:

	{{ noparse }}{{ format:markdown }}Let's _convert_ this to **HTML**.{{ /format:markdown }}{{ /noparse }}

Genreally, whenever you are using tags in PyroCMS, you are interfacing with a plugin. To get familiar with the tag syntax in PyroCMS, check out the {{ link title="tags guide" uri="guides/pyrocms-tags" }}.

## Installing Plugins

Plugins have no installation procedure. Just upload them to **addons/shared\_addons/plugins_ or _addons/[site-ref]/plugins** and use the tag in your layouts!

You can see which plugins you have available to you by going to <samp>Add-ons &rarr; Plugins</smap> in the PyroCMS admin.

## Plugin Resources

* {{ link title="Core Plugins Docs" uri="plugins" }}
* {{ link title="Developing Plugins - PyroCMS Developer Docs" uri="developers/addons/developing-plugins" }}
* [Plugins on the PyroCMS Store](https://www.pyrocms.com/store/categories/plugins)