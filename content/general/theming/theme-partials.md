# Theme Partials

Partials give you a slick way to organize your html code in smaller sections. The sections can then be loaded by different layout files. This keeps you from typing the same code (header, footer, etc.) into multiple layout files.

Partials are created as <dfn>addons/&lt;site-ref&gt;/themes/&lt;theme-name&gt;/views/partials/partialname.html</dfn> and are loaded with:

<pre>{{ theme:partial name="partialname" }}</pre>

You can put any syntax or HTML into partials that you would normally put in a layout, they will all be treated the same.

## Example

The easiest example of a layout using a shared partial is this:

<pre class="prettyprint">{{ noparse }}
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
	{{ theme:partial name=&quot;header&quot; }}
&lt;/head&gt;
&lt;body&gt;
	&lt;h1&gt;{{ template:title }}&lt;/h1&gt;
	{{ template:body }}
&lt;/body&gt;

&lt;/html&gt; {{ /noparse }}</pre>

In the above example all of the header code is placed in the header.html file. It can then be loaded into the default.html layout file by using the code above. If you wish to create a blog.html layout file then all you have to do to place the header in it is use the {{ noparse }}{{ theme:partial }}{{ /noparse }} tag. 