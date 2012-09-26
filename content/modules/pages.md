# Pages

The pages module is a simple but powerful way to manage static content on your site. Page layouts can be managed and widgets embedded without ever editing the template files.

## The Page Tree

The page tree is a visual, heirarchical overview of all the pages on your site. Note that these do not include module URIs (see {{ link title="PyroCMS URLs" uri="concepts/pyrocms-urls" }} for an overview of how URLs work in PyroCMS).

### Re-Ordering Pages

Page re-ordering is achieved via simple drag and drop. You can drag/drop individual pages or entire sections (by dragging the parent page). There will be a shadow to show you where your page drag will end up.

### Modifying Pages

To modify a page, click it in the page tree. A data summary panel will show, with options for modifying the page:

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

You'll notice 

## Adding a New Page

To add a new page, click **Add Page**. You'll get a multi-tabbed form with a lot of options. The following sections go over each tab.

### Page Content

This is the basic info about your page - title, content, etc.

### Meta Data

The meta title is generally used as the title in search results and is believed to carry significant weight in page rank.
Meta keywords are words that describe your site content and are for the benefit of search engines only.

The meta description is a short description of this page and may be used as the search snippet if the search engine deems it relevant to the search.

### Design

The design tab allows you to select a custom page layout and optionally apply different css styles to it on this page only. Refer to the Page Layouts section below for instructions on how to best use Page Layouts.

### Script

You may place javascript here that you would like appended to the &lt;head&gt; of the page.

### Options

Allows you to turn on comments and an rss feed for this page. You can also restrict a page to specific logged in user groups by setting the Access field. If the RSS feed is enabled a visitor can subscribe to this page and they will receive each child page in their rss reader.

The "Require an exact uri match" field is a clever little tool that allows you to pass parameters in the url. By default PyroCMS looks for a page with the slug of "acme-widgets" that is the child of "products" when you visit http://localhost:8888/pyrocms/versions/2.1_develop/index.php/products/acme-widgets. By checking this box in the Products page you are telling PyroCMS that it is now okay if there isn't a page named Acme Widgets. It will now load Products and 'acme-widgets' will just be a parameter. This makes it easy to pass parameters to embedded tags. An example using the Streams add-on to display the 'acme-widgets' stream on the Products page:

### Page Layouts

Page layouts allows you to control the layout of the page without modifying the theme files. You can also select theme layout files when creating Page Layouts. You can embed tags into the page layout instead of placing them in every page. For example: If you have a twitter feed widget that you want to display at the bottom of every page you can just place the widget tag in the page layout:

