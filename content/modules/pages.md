# Pages

The pages module is a simple but powerful way to manage static content on your site. Page layouts can be managed and widgets embedded without ever editing the template files.

* {{ docs:id_link title="How Pages Work in PyroCMS" }}
* {{ docs:id_link title="The Page Tree" }}
* {{ docs:id_link title="Re-Ordering Pages" }}
* {{ docs:id_link title="Modifying Pages" }}
* {{ docs:id_link title="Default Pages" }}
* {{ docs:id_link title="Modifying Pages" }}
* {{ docs:id_link title="Adding a New Page" }}

</div>
<div class="doc_content">

## How Pages Work in PyroCMS

Every page on a website has a purpose. For instance, a page's purpose could be to display a member of a company's staff. It could be to display a product. It could be a combination of things. Every page has some common elements as well. For instance, a page will always have metadata, privacy settings, etc.

PyroCMS's pages module let's you take all of this into account when managing pages on your site. Each page has common fields (like metadata), but you can also create data structures that allow you to enter only the data you need for that page. We call these **page types**. For instance, for your staff member page you can create a <samp>Staff Member</samp> page type and add a <samp>Bio</samp> and <samp>Headshot Image</samp> field. You could create a <samp>Product</samp> page type with all sorts of fields like product description, price, etc.

Page types even house how those fields are displayed in the page type layout field, so you can define your fields and also define how they should be displayed on a page.

## The Page Tree

The page tree is a visual, heirarchical overview of all the pages on your site. Module URIs don't show up here (see {{ link title="PyroCMS URLs" uri="guides/pyrocms-urls" }} for an overview of how URLs work in PyroCMS), just pages.

You can have any combination of page types in your page tree as well - they'll all show up in your page tree.

## Re-Ordering Pages

Page re-ordering is achieved via simple drag and drop. You can drag/drop individual pages or entire sections (by dragging the parent page). There will be a shadow to show you where your page drag will end up.

{{ asset:img file="docs/pages/dragdrop.png" alt="Drag and Drop Pages" class="doc_image" }}

## Modifying Pages

To modify a page, click it in the page tree. A data summary panel will show, with options for modifying the page.

{{ asset:img file="docs/pages/page\_options.png" alt="Page Options" class="doc_image" }}

The following options are available:

<table>
	<tr>
		<th width="30%">Option</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Add Child</td>
		<td>Adds a child page to the current page.</td>
	</tr>
	<tr>
		<td>Duplicate</td>
		<td>Duplicates a page <em>and all child pages</em>.</td>
	</tr>
	<tr>
		<td>Edit</td>
		<td>Edit a page.</td>
	</tr>
	<tr>
		<td>Delete</td>
		<td>Delete a page and its child pages.</td>
	</tr>
</table>

## Default Pages

You'll notice that on a default install of PyroCMS there are some pages already there in the tree:

<table>
	<tr>
		<th width="30%">Page</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Home</td>
		<td>Every site needs a home page! The home page is like any other page, it just has <strong>Is default (home) page?</strong> selected under the <strong>Options</strong> tab.</td>
	</tr>
	<tr>
		<td>Page Missing</td>
		<td>A 404 page that will be called when a page cannot be found.</td>
	</tr>
	<tr>
		<td>Contact</td>
		<td>This is an example page, using the contact module.</td>
	</tr>
</table>

## Adding a New Page

To add a new page, click **Add Page**. You'll get a multi-tabbed form with a lot of options. The following sections go over each tab.

{{ asset:img file="docs/pages/tabs.png" alt="Page Tabs" class="doc_image" }}

### Page Content

This is the basic info about your page - title, content, etc.

<table>
	<tr>
		<th width="30%">Field</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Title</td>
		<td>The full title of your page.</td>
	</tr>
	<tr>
		<td>Slug</td>
		<td>The slug that your page will be called by in the URI. Along with the slug, a preview of the full URI of your page is provided.</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>"Live" or "Draft". Draft pages can be seen by Administrators, but will not be available to other groups.</td>
	</tr>
	<tr>
		<td>Default Chunk</td>
		<td>There is no "page content" area in the pages form, only a default chunk. You can create and remove chunks on the page form, and then use them in your templates using the <a href="plugins/pages">pages plugin</a>.</td>
	</tr>
</table>

### Meta Data

The meta section allows you to control the meta data of your page. This is the data that is traditionally used by search engines (sans keywords) to populate the text preview of your page that shows up in search results.

<table>
	<tr>
		<th width="30%">Field</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Meta title</td>
		<td>The full title of your page.</td>
	</tr>
	<tr>
		<td>Meta Keywords</td>
		<td>Keywords the pretain to your page.</td>
	</tr>
	<tr>
		<td>Meta description</td>
		<td>A short (no more than 160 character) description of your page.</td>
	</tr>
</table>

### Design

The design tab allows you to select a custom page layout and optionally apply different css styles to it on this page only.

<table>
	<tr>
		<th width="30%">Field</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Page Layout</td>
		<td>The page layout that you'd like to use to render your page.</td>
	</tr>
	<tr>
		<td>CSS</td>
		<td>Extra CSS that will be added to your page.</td>
	</tr>
</table>

### Script

You may place javascript here that you would like appended to the &lt;head&gt; of the page.

<table>
	<tr>
		<th width="30%">Field</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Javascript</td>
		<td>JS that will be added to your page.</td>
	</tr>

</table>

### Options

<table>
	<tr>
		<th width="30%">Field</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Access</td>
		<td>Allows you to restrict access to this page to certain user groups. Groups without access will see a 404 page.</td>
	</tr>
	<tr>
		<td>Comments Enabled?</td>
		<td>Turns comments on and off for this page.</td>
	</tr>
	<tr>
		<td>RSS Enabled</td>
		<td>If the RSS feed is enabled an RSS feed will be created that a visitor can subscribe to. They will receive each child page in their rss reader.</td>
	</tr>
	<tr>
		<td>Is default (home) page?</td>
		<td>If this is checked, this page will be the page that loads up on your root URI.</td>
	</tr>
	<tr>
		<td>Require an exact uri match</td>
		<td>The "Require an exact uri match" field is a clever little tool that allows you to pass parameters in the url. By default PyroCMS looks for a page with the slug of "acme-widgets" that is the child of "products" when you visit products/acme-widgets. By un-checking this box in the Products page you are telling PyroCMS that it is now okay if there isn't a page named Acme Widgets. It will now load Products and 'acme-widgets' will just be a parameter. This makes it easy to pass parameters to embedded tags. An example using the Streams add-on to display the 'acme-widgets' stream on the Products page.</td>
	</tr>
</table>