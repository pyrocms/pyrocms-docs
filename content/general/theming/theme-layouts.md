# Theme Layouts

The basic idea is that most of your pages will share the same header, footer, wrapping navigation, etc and only the actual body of the page will change. Using this logic you can avoid repeating yourself or having lots of identical HTML. By using multiple layout files you can change the layout of your site for each module or for each page.

All layouts exist in <dfn>addons/&lt;site-ref&gt;/themes/&lt;theme-name&gt;/views/layouts/</dfn> or <dfn>shared_addons/themes/&lt;theme-name&gt;/views/layouts/</dfn>. Every theme should have a layout named &quot;default&quot; in <dfn>addons/themes/views/layouts/.</dfn> Additional layout files are optional.

## Example Layout

Using the template Tag you can output the title, metadata (which includes CSS and javascript) and body to create the most basic layout possible:

<pre class="prettyprint">{{ noparse }}
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
	&lt;title&gt;{{ template:title }}&lt;/title&gt;
	{{ template:metadata }}
&lt;/head&gt;
&lt;body&gt;
	&lt;h1&gt;{{ template:title }}&lt;/h1&gt;
	{{ template:body }}
&lt;/body&gt;

&lt;/html&gt;{{ /noparse }}</pre>

## Multiple Layouts

For added flexibility, you can make use of as many layout files as you'd like. When you edit or create a Page Layout in CP &gt; Pages &gt; Page Layouts and select your desired file from the dropdown, all your layouts in your theme's layout file will be available. This allows you to assign a number of pages to a Page Layout and use a different layout file for that group of pages.

## Mobile Layouts

A nice feature of PyroCMS is the ability to easily display separate layouts for mobile.

To take advantage of this feature, move your layouts into a folder called "web" inside your views folder, so your default layout will be in:

     your-theme/views/web/layouts/default.html

When a user accesses your browser from a web browser, these layouts will be used. If the user is on a mobile device, however, you can supply different layouts in a folder called *mobile*, so your default mobile layout would be here:

     your-theme/views/mobile/layouts/default.html

Same for all your other layout files, they will load the mobile version if you browse to the page with anything CodeIgniter thinks is a mobile phone.

<strong>Note:</strong> PyroCMS does not consider an iPad a mobile device, so it will not load your mobile layouts if the user is accessing your site via an iPad. Note also that new PyroCMS default themes use 
[responsive design](http://en.wikipedia.org/wiki/Responsive_Web_Design) (try resizing this page in your browser.)

