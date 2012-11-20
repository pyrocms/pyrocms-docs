# Plugins 

Plugins are the simplest type of add-on in PyroCMS, but they are at the core of how you access functionality via {{ link title="tags" uri="concepts/pyrocms-tags" }}.

For an example, let's take the user plugin, which is a part of the user module (modules can have a plugin as a part of the module, see the {{ link title="module overview" uri="concepts/addons/modules" }} for more info on that).

Each plugin has a name (or slug) by which we reference it in the tags. For example, if we wanted to get the username of the current user, we would use:

	{{ noparse }}{{ user:username }}{{ /noparse }}

We can also specify a user id and get the username of a specific user:

	{{ noparse }}{{ user:username user_id="5" }}{{ /noparse }}

Whenever you are using tags in PyroCMS, you are interfacing with a plugin.

## Tag Logic

To get a full idea of what tags can do, make sure you read over the {{ link title="PyroCMS tag system documentation" uri="concepts/pyrocms-tags" }}.

## Installing Plugins

Plugins have no installation procedure. Just upload them to _addons/shared\_addons/plugins_ or _addons/[site-ref]/plugins_ and use the tag in your layouts!

## Plugin Resources

* {{ link title="Core Plugins Docs" uri="plugins" }}
* {{ link title="Developing Plugins - PyroCMS Developer Docs" uri="developers/addons/developing-plugins" }}
* [Plugins on the PyroCMS Store](https://www.pyrocms.com/store/categories/plugins)