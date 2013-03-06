# Creating a New Page

At the heart of PyroCMS is the pages module: it's where you can define a structure for your site that you can hand off to clients to edit in an intuitive drag and drop interface.

</div>
<div class="doc_content">

To get familiar with creating pages in PyroCMS, let's create a new very simple page. After that, we'll set up more complex page type and add a page to it.

## Creating a New Page

To create a new page, go to <samp>Content &rarr; Pages</samp> on your admin panel. You'll see a simple page tree with some of PyroCMS' standard default pages. These are all at the root level, meaning they can be accessed by their <dfn>slugs</dfn>, or short URI names, at the root level of your site.

For our guide, let's add an about page. Click <samp>New Page</samp> at the top right hand corner of your admin panel:

{{ asset:img file="docs/addpage.png" alt="Page Tabs" class="doc_image" }}

This will take you to a new page form. There are a lot of options, but we are just going to fill out the very basics. Type <kbd>About</kbd> into the <samp>Page Title</samp> input, and the form will auto-generate the slug (although you can manually edit it).

{{ asset:img file="docs/pageform.png" alt="Page Tabs" class="doc_image" }}

Next, click the <samp>Page Content</samp> tab. This houses our page content text editor. Enter in some sample about text:

{{ asset:img file="docs/pagecontent.png" alt="Page Tabs" class="doc_image" }}

Next, click <samp>Save</samp>, and you'll be taken back to your page tree, with <samp>About</samp> in the 

## Creating a New Page Type

A powerful tool for organizing your site is using <dfn>page types</dfn>. For this guide, let's make a 