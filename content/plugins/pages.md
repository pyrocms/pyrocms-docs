# Pages Plugin

The _pages_ plugin displays data about pages in the page tree. If you want information about the current page, you can use the {{ link title="current page plugin" uri="plugins/current-page" }}.

## pages:url

	{{ noparse }}{{ pages:url }}{{ /noparse }}
	
Gets a page's URL based on its ID.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">id</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>The page id of the page you want the URL for.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ pages:url id="4" }}​{{ /noparse }}

Returns:

	'http://www.example.com/about'
	
## pages:children	
	
	{{ noparse }}{{ pages:children }}{{ /noparse }}

Tag pair that loops through the children of a parent page.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">id</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Page ID of parent page whose children you want.</td>
		</tr>
		<tr>
			<td width="100">limit</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>Number of pages to return.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ pages:children id="1" limit="2" }}
	&lt;h2>{{ title }}&lt;/h2>
	{{ body }}
{{ /pages:children }}{{ /noparse }}

Returns:

	<h2>Child One</h2>
	Body Content One
		
	<h2>Child Two</h2>
	Body Content Two

You can also return any custom field variables by using the {{ custom_fields }} array.

	{{ noparse }}{{ pages:children id="1" }}
	&lt;h2>{{ title }}&lt;/h2>
	{{ custom_fields }}
		&lt;{{ introduction }}&lt;/p>
	{{ /custom_fields }}
	{{ body }}
{{ /pages:children }}{{ /noparse }}
	
## pages:display

	{{ noparse }}{{ pages:display }}{{ /noparse }}

Display a page inside other content.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">id</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>ID of the page you want to display.</td>
		</tr>
		<tr>
			<td width="100">slug</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>Slug of the page you want to display.</td>
		</tr>
	</tbody>
</table>

### Examples

	{{ noparse }}{{ pages:display slug="home" }}
	&lt;h2>{{ title }}&lt;/h2>
	{{ body }}
{{ /pages:display }}{{ /noparse }}

Returns:

	<h2>Page Title</h2>
	<p>Page Body</p>

You can also return any custom field variables by using the {{ custom_fields }} array.

	{{ noparse }}{{ pages:display slug="home" }}
	&lt;h2>{{ title }}&lt;/h2>
	{{ custom_fields }}
		&lt;{{ introduction }}&lt;/p>
	{{ /custom_fields }}
	{{ body }}
{{ /pages:display }}{{ /noparse }}

## pages:chunk

	{{ noparse }}{{ pages:chunk }}{{ /noparse }}

A tag that allows any one page chunk to be displayed anywhere on the site, even inside another page's content.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">id</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>ID of the page that the chunk belongs to.</td>
		</tr>
		<tr>
			<td width="100">name</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>The name of the page chunk that you want to display.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ pages:chunk id="1" name="default" }}{{ /noparse }}

Returns:

	<p>Welcome to our homepage. We have not quite finished setting up our website yet, but please add us to your bookmarks and come back soon.</p>

## pages:is

	{{ noparse }}{{ pages:is }}{{ /noparse }}

A tag that confirms if a page is a direct child of another page, or is a descendent of another page.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="80">Default</th>
			<th width="80">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>child</td>
			<td>None</td>
			<td>No</td>
			<td>ID or Slug of the page whose relation you want to check.</td>
		</tr>
		<tr>
			<td>children</td>
			<td>None</td>
			<td>No</td>
			<td>Children separated by a comma.</td>
		</tr>
		<tr>
			<td>parent</td>
			<td>None</td>
			<td>No</td>
			<td>ID or Slug of the page to check if it is a parent of child.</td>
		</tr>
		<tr>
			<td>descendent</td>
			<td>None</td>
			<td>No</td>
			<td>ID or Slug of the page to check if it is a descendent of child.</td>
		</tr>
	</tbody>
</table>

### Example A

	{{ noparse }}{{ if {pages:is child="ingredients" parent="cookbook"} == true }}
	&lt;p>Click here to see table of contents cookbook&lt;/p>
{{ endif }}{{ /noparse }}

Returns:

	<p>Click here to see table of contents cookbook</p>
	
### Example B
	
	{{ noparse }}{{ if {pages:is child="terms-and-conditions" parent="information"} == true }}
&lt;body class="terms information">
{{ else }}
&lt;body class="">
{{ endif }}{{ /noparse }}

Returns:

	<body class="terms information">

## pages:page_tree

	{{ noparse }}{{ pages:page_tree }}{{ /noparse }}
	
A tag that displays a tree of pages starting from the id specified.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">start-id</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>ID of the page you want to display children for.</td>
		</tr>
		<tr>
			<td width="100">disable-levels</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>A list of page slugs to skip separated by the pipe character. Example: secret|super-secret|nuclear-codes</td>
		</tr>
		<tr>
			<td width="100">order-by</td>
			<td width="100">title</td>
			<td width="100">No</td>
			<td>Database column to order pages by.</td>
		</tr>
		<tr>
			<td width="100">order-dir</td>
			<td width="100">asc</td>
			<td width="100">No</td>
			<td>Direction to sort the pages.</td>
		</tr>
	</tbody>
</table>

### Examples

	{{ noparse }}{{ pages:page_tree start-id="20" }}{{ /noparse }}
	
Returns:

	<ul>
	     <li><a href="http://example.com/page">Page Name</a>
	          <ul>
	               <li><a href="http://example.com/page/child">Child Name</a></li>
	          </ul>
	     </li>
	</ul>
