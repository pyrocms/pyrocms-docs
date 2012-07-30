# Widgets, Plugins, and Modules

Simply put, modules, widgets and plugins are ways to get more complex functionality into your sites using PyroCMS's simple {{ link uri="general/basics/pyrocms-tags" title="tag system" }}. PyroCMS comes with its own core modules, widgets, and plugins, and you can also download free and paid third party ones via the PyroCMS [add-on store](http://www.pyrocms.com/store).

<div class="tip"><strong>Note:</strong> if you are a developer and interested in developing your own widgets, plugins, and modules, find how to do so in our {{ link uri="developers" title="dev guide" }}.</div>

Below is an overview of each.

## Widgets

Widgets are little chunks of code that do a specific thing. For instance, you can create a simple HTML widget that holds HTML code, or you can create a login widget that displays a login form.

You can create and edit widgets in the widgets section of the admin panel (under **Content &rarr; Widgets**). Once you create them, you can easily add them into your layouts using PyroCMS tags:

	{{ noparse }}{{ widgets:instance id="6"}}{{ /noparse }}

You can even group widgets together into widget areas and order them, which is handy if you have a sidebar that you want to be able to manage from the control panel.
	
	{{ noparse }}{{ widgets:area slug="blog-right" }}{{ /noparse }}

## Plugins

Plugins are simple: they allow you to display or manipulate data in your layouts using PyroCMS tags, and they follow a simple syntax:

	{{ noparse }}{{ plugin:function parameter="value" }}{{ /noparse }}

PyroCMS comes with an array of plugins that make it easy to do things like grab a URL segment:

	{{ noparse }}{{ url:segments segment="1" }}{{ /noparse }}

You can also do things like show a page tree:

	{{ noparse }}{{ pages:page_tree start="about" }}{{ /noparse }}

Plugins can also use two tags to loop through data:

	{{ noparse }}{{ blog:posts limit="5" order-by="title" }}
     &lt;h2>&lt;a href="{{ url }}">{{ title }}&lt;/a>&lt;/h2>
{{ /blog:posts }}{{ /noparse }}

_For more information on PyroCMS tags and how to use them, see the {{ link uri="modules-and-tags" title="tag reference" }}._

## Modules

Many add-ons need more than just functionality you can access via PyroCMS tags. Sometimes you need an interface in the control panel, as well as other resources like javascript files.

Modules are the largest type of PyroCMS add-on. They have a place in the control panel menu (usually), have control panel controls, their own widgets, and their own plugins.

For instance, the Pages module contains the control panel area that allows you to create and organize pages, and also the {{ link title="pages plugin" uri="/modules-and-tags/tag-reference/pages" }}, which allows you to do things like display a page tree with PyroCMS tags.

What makes PyroCMS modules unique is the fact that they can have public-facing pages as well.

For instance, the Blog module allows you to manage posts in the control panel, but yoursite.com/blog maps to the blog module and displays posts using your theme.
