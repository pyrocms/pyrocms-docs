# Organization

One of the most important functions of a CMS is to provide a flexible organizational structure for designers, developers, and site builders to create their sites in a modular and flexible way. In this section, we'll talk about how you can structure and organize your site using PyroCMS.

For an example, let's take a simple site for a barbershop. This is going to be a really simple site, so let's take a look at the pages we need:

* A home page
* An about page
* A page with the shop hours and a location map

That's it, pretty simple.

So we can start by looking at the page designs. They are pretty awful, but we have a basic idea of what we need to get up on the site.

<img src="http://www.pyrocms.com/uploads/default/files/barbershop_pages.jpg" alt="Example Pages" class="doc_image" />

Before we get into how we will organize this site, let's take a look at the different tools available to you. There are four main ones:

1. Theme Layouts
2. Theme Partials
3. Page Layouts
4. Pages

Below we'll get into what each one does, and then pull them all together for our barbershop site.

## Theme Tools

Your design starts with your theme. A theme is where your basic layouts and assets (CSS, JS) go. (For a more in-depth discussion of themes and their structure, see the [themes](http://www.pyrocms.com/docs/2.0/theming-pyrocms/create-a-custom-theme) guide.). The two organizational tools available to your theme are **Theme Layouts** and **Theme Partials**.

### Theme Layouts

Layout files are the "shells" of your site's HTML code. They are files in the **views/layouts** folder of your theme, and contain things like the opening and closing HTML, the header, footer, and other things that invariably show up on your site. You can have as many layouts as you like.

### Theme Partials

Partials are pieces of code that you use over and over again that you'd like to separate out into smaller chunks. Examples are things like the header, footer, and metadata. They are kept in your theme's **views/partials** folder and are inserted into layouts using PyroCMS tags:

	{{ noparse }}{{ theme:partial name="header" }}{{ /noparse }}

You can have as many theme partials as you'd like, although they are not necessary. They are handy to separate out parts of your site's code.

## Page Tools

After we've used our theme elements for the general layout, we move to our specific pages, which are handled inside the control panel. There are two tools available here: **Page Layouts** and **Pages**.

### Page Layouts

Page layouts can be found in the Page Layouts section of the Pages module, and are managed via the PyroCMS control panel.

Simply put, page layouts are ways to separate out the different organizational structures of your pages that are _not_ part of the larger layout (header, footer, etc). When you create a new page layout, you assign it a theme layout, and the page layout content is embedded into the theme layout with the following tag:

	{{ noparse }}{{ template:body }}{{ /noparse }}

If this sounds confusing, don't worry. We'll get back to the barbershop example shortly to explain how page layouts work in practice. For now, just remember they deal with the structure of individual pages.

### Pages

The last part in the organizational structure of PyroCMS is the page. Pages are what are actually accessed via the URL, and they hold whatever content you'd like to have added to the layout/partial/page layout structure behind it.

Each page can be assigned a page layout (which in turn has a layout assigned to it).

## Our Example: Bill's Barbershop

Now that we have gone over the different parts of a PyroCMS page, we can easily mentally segment out how to build our barbershop page. Again, here are the three pages we need to implement:

First, we can take the header and footer and put it into a **theme layout**. We know these elements won't change from page to page, so we can keep them all in one place. Here are the areas that will be included in our **theme layout**:

<img src="http://www.pyrocms.com/uploads/default/files/barbershop_theme_layouts.jpg" alt="Theme Layouts" class="doc_image" />

_Note: If we want to, we can keep the header and footer code in their own **partials** and load them into the main layout. This not required, however._

Now that we have those areas accounted for, we can turn to our individual pages. We have three pages, and we know each page has a different HTML structure between the header and footer. The home page is more complex, the about page is simple, and the Hours & Map page just needs two columns. Here are the areas of our pages that will be handled by page layouts:

<img src="http://www.pyrocms.com/uploads/default/files/barbershop_page_layouts.jpg" alt="Page Layout Areas" class="doc_image" />

We can create these structures with **page layouts**. For this example, we'll be creating three:

1. Home
2. Default
3. Hours & Location

Two of these are very specific (Home and Hours & Location), but default (which we'll use for the about page) can be re-used for new pages down the road since it is so generic (a title and body text).

Let's take the Hours & Map page for our example. This page layout will need two columns - the page content in one, and a Google map (using the Google Maps widget) in the other: 

<img src="http://www.pyrocms.com/uploads/default/files/barbershop_single.jpg" alt="Single page" class="doc_image" />

So we'll go to **Content &rarr; Pages** in the control panel and select the **Layouts** section. Click on **Add Page Layout** to create a new one.

Here's an example of what our layout code might look like for Hours & Map:

     <h1>{{ page:title }}</h1>
     
     <div class="one_third">{{ page:body }}</div>

     <div class="two_thirds">{{ widgets:instance id="1"}}</div>

_Note: The {{ page:title }} and {{ page:body }} are special PyroCMS tags for use in page layouts._

Notice that we don't need to include any code about our theme layout. The page layout content will go where we put **{{ template:body }}** in our theme layout.

If we have our page layouts ready, we can go into the Page tree under **Content &rarr; Pages** and create a page for each in our example, assigning the corresponding page layout under the **Design** tab.

## Roundup

PyroCMS provides some nice organizational tools:

1. A place to put the shell of the site (header, footer, etc.) - **theme layouts**.
2. A way to create **page layouts** withouts having to touch the master layout.

Once you get used to creating pages, page layouts, and theme layouts, you can really experiment with new ways to organize your site. For instance, you can use PyroCMS tags in page content boxes. You can also create page "chunks" to separate your page content into several different pieces.

PyroCMS aims to be flexible, so use that flexibility to build the way you feel fits your project best.
{{ /noparse }}