# PyroCMS URLs

PyroCMS works off a simple page tree concept. Under **Content &rarr; Pages**, you'll find a listing of your pages. Each page has a URL that a user can access (although PyroCMS does come with page-based permissions).

{{ asset:img file="docs/pages.png" alt="Page Tree" class="doc_image" }}

However, PyroCMS is also a modular CMS, and one of its unique features is to allow modules to have their own public URLs. For example, the **Blog** module has a control panel interface, but it also contains all the logic to display blog posts and even an RSS feed, accessible via the URL.

These module URLs use your site's selected theme, so they will be styled in the same way. However, if you want a fine-grain control over these module URLs, you can do so by {{ link title="overriding module views in your themes" uri="/general/theming/overloading-module-views" }}.

<div class="tip">
<strong>Tip! Custom Routing:</strong><br /> Although not supported via the Control Panel, occasionally you may want custom routing to allow PyroCMS to ignore certain segments. This can be achieved with the free <a href="http://www.pyrocms.com/store/details/pyroroutes">PyroRoutes</a> addon.
</div>
