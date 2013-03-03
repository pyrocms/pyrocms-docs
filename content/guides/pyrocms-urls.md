# PyroCMS URLs

One of the most important concepts to understand about PyroCMS is where URLs resolve to and how to create your site's URLs using the tools available. This page explains how URLs are structured in PyroCMS.

* {{ docs:id_link title="Page URLs" }}
* {{ docs:id_link title="The Home Page" }}
* {{ docs:id_link title="404 Page" }}
* {{ docs:id_link title="Module URLs" }}

</div>
<div class="doc_content">

## Page URLs

By default, most URLs are routed to the PyroCMS Pages module, which is where your site's page tree is stored. If you Under **Content &rarr; Pages**, you'll see something like this:

{{ asset:img file="docs/pages.png" alt="Page Tree" class="doc_image" }}

If you are familiar with a page tree, you should be right at home! This represents pages in a nested hierarchy, so if you have a page at <samp>yoursite.com/about</samp>, a nested page with the slug of <samp>history</samp> will be accessed at <samp>yoursite.com/about/history</samp>. Pretty simple!

By default, URLs are _strict_ meaning that if you create a page with the URL <samp>yoursite.com/team</samp> and you tried to access <samp>yoursite.com/team/bob</samp>, the Pages module would only look for a page with the URI of <samp>about</samp> and return a 404. However, in the <dfn>Options</dfn> tab of your pages, you can turn strict URLs, so that <samp>yoursite.com/team/bob</samp> will display the page you created at <samp>yoursite.com/team</samp> (so will <samp>yoursite.com/team/foo</samp> and anything else, for that matter). See the <a href="">Pages module documentation</a> for more information. 

## The Home Page

Although PyroCMS comes with a default home page, _any_ page in PyroCMS can be the home page. Just go into the <dfn>Options</dfn> tag in the page and select the check box that says "Is default (home) page?". This will tell PyroCMS to load this page whenever your site's root URL is loaded.

{{ asset:img file="docs/homepage.png" alt="Home Page" class="doc_image" }}

## 404 Page

All pages that are not found in PyroCMS are routed to the Pages module, where a special 404 page handles them. This page simply has to have a slug of <dfn>404</dfn>, and PyroCMS will use it as the 404 and set the correct 404 headers accordingly.

## Module URLs

PyroCMS is a _modular_ CMS, and modules in PyroCMS can sometimes have their own front-end URLs in additon to back end URLs.

For instance, the sitemap module comes with a built-in URL that displays your site's sitemap index at <samp>/sitemap/sitemap/xml</samp> (this is simplified in the routes for this module to just be <samp>/sitemap.xml</samp>).

Most modules do not use front-end URLs, but some do. Check with the documentation of your modules to see if any 