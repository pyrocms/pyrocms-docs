# Theme Partials

Partials give you a simple way to organize your html code in smaller sections. The sections can then be loaded by different layout files. This keeps you from typing the same code (header, footer, etc.) into multiple layout files.

Partials are created as <dfn>addons/&lt;site-ref&gt;/themes/&lt;theme-name&gt;/views/partials/partialname.html</dfn> and are loaded with:

	{{ noparse }}{{ theme:partial name="partialname" }}{{ /noparse }}

You can put any syntax or HTML into partials that you would normally put in a layout, they will all be treated the same.

## Example

The easiest example of a layout using a shared partial is this:

	{{ noparse }}&lt;!DOCTYPE html>
&lt;html>
&lt;head>
	{{ theme:partial name="header" }}
&lt;/head>
&lt;body>
	&lt;h1>{{ template:title }}&lt;/h1>
	{{ template:body }}
&lt;/body>
&lt;/html>{{ /noparse }}

In the above example all of the header code is placed in the header.html file. It can then be loaded into the default.html layout file by using the code above. If you wish to create a blog.html layout file, all that's needed to add the header is the {{ noparse }}{{ theme:partial }}{{ /noparse }} tag. 
