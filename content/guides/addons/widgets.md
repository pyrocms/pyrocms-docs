# Widgets

Widgets are little chunks of code that are each designed to do a very specific thing. You can use them by creating widget "instances" and the and then adding that instance to your template code with PyroCMS tags.

</div>
<div class="doc_content">

## Using Widgets

If you go to the <samp>Add-ons &rarr; Widgets</samp> section of the control panel, you'll see a list of widgets that are available to use.

To use those widgets, head on over to the <samp>Content &rarr; Widgets</samp> section, where you can creat widget <dfn>instances</dfn> and widget <dfn>areas</dfn>.

## Widget Instances

Widgets store configuration values that you enter on the back end, and a collection of those configuration values is an instance. For example, when you set up an instance of a Google Maps widget, you set what size you want the map, what the map should show, etc. That instance is the re-usable.

## Widget Areas

Widget areas are simply groups of widget instances. So, for example, you can have an area of widgets for your blog sidebar that you can arrange in the order that you'd like. Then, that area can be added using a simple tag syntax:

    {{ noparse }}{{ widgets:area slug="sidebar" }}{{ /noparse }}

## Setting Up Widgets

The widgets interface has two separate seections: the available widgets on the left, and the widget areas on the right. To create a new area, go into the <samp>Area</samp> section.

To add a new widget instance to an area, drag it under the area until you see a dotted line area where you can drog the widget.

{{ asset:img file="docs/widgetsinterface.png" alt="Widget Interface" class="doc_image" }} 

Then, some configuration form inputs should appear.

{{ asset:img file="docs/htmlwidget.png" alt="HTML Widget" class="doc_image" }} 

Fill those out, and you've got a widget instance!

{{ asset:img file="docs/areas.png" alt="Widget Area" class="doc_image" }} 

## Using Widget Instances Individually

Once you create an instance, you can use it in your template by specifying the instance id, even if that instance is in a widget area:

    {{ noparse }}{{ widgets:instance id="6"}}{{ /noparse }}

## Widget Resources

* {{ link title="Core Widget Docs" uri="widgets" }}
* {{ link title="Developing Widgets - PyroCMS Developer Docs" uri="developers/addons/developing-widgets" }}
* [Widgets on the PyroCMS Store](https://www.pyrocms.com/store/categories/widgets)