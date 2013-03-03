# Widgets

Widgets are little chunks of code that are each designed to do a very specific thing. You can use them by creating widget "instances" and the and then adding that instance to your template code with PyroCMS tags.

If you go to the **Content &rarr; Widgets** section of the control panel, you'll see a list of widgets that you can create instances of:

{{ asset:img file="docs/widgetlist.png" alt="Widget List" class="doc_image" }} 

When you create a widget instance, you can edit the parameters of the widget right there, if there are any:

{{ asset:img file="docs/rsswidget.png" alt="RSS Widget" class="doc_image" }} 

Once you create an instance, you can use it in your template by specifying the instance:

	{{ noparse }}{{ widgets:instance id="6"}}{{ /noparse }}

You can even group widgets together into widget areas and order them, which is handy if you have a sidebar that you want to be able to manage from the control panel:
{{ noparse }}{{ widgets:area slug="blog-right" }}{{ /noparse }}

## Widget Resources

* {{ link title="Core Widget Docs" uri="widgets" }}
* {{ link title="Developing Widgets - PyroCMS Developer Docs" uri="developers/addons/developing-widgets" }}
* [Widgets on the PyroCMS Store](https://www.pyrocms.com/store/categories/widgets)