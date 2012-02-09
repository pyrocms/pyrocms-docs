# URL Tags

The url plugin gives you access to url data and logic.

## url:current

Displays the full current URL.

### Example

	{{ noparse }}{{ url:current }}{{ /noparse }}

Returns:

	http://www.example.com/current/uri/

## url:site

Displays the full site url.

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
			<td width="100">uri</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>The URI segments passed to the site_url function.</td>
		</tr>
	</tbody>
</table>

### Example

With no URI specified:

	{{ noparse }}{{ url:site }}{{ /noparse }}

Returns:

	http://www.example.com

With a URI specified:

	{{ noparse }}{{ url:site uri="contact" }}{{ /noparse }}

Returns:

	http://www.example.com/contact

<div class="tip"><strong>Note:</strong> The site URL includes index.php if you are not using mod_rewrite to remove index.php and you have not changed the index_page variable in your config.php file. For more information, see [Removing index.php]().</div>

## url:base

Displays the full site base URL regardless of mod_rewrite settings.

### Example

	{{ noparse }}{{ url:base }}{{ /noparse }}

Returns:

	http://www.example.com/

## url:segments

Displays a specific URL segment.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>
				Name</th>
			<th>
				Default</th>
			<th>
				Required</th>
			<th>
				Description</th>
		</tr>
		<tr>
			<td width="100">
				segment</td>
			<td width="100">
				None</td>
			<td width="100">
				Yes</td>
			<td>
				Number of the segment of the URL you want to use.</td>
		</tr>
		<tr>
			<td width="100">
				default</td>
			<td width="100">
				None</td>
			<td width="100">
				No</td>
			<td>
				A default value to use if nothing is in the URL segment specified.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ url:segments segment=&quot;1&quot; default=&quot;home&quot; }}{{ /noparse }}

If the url is:

	http://www.example.com/products
	
The tag above will return:

	products

## url:anchor

{{ url:anchor }}</h5>

Generates an anchor tag based on the supplied attributes. This is essentially a wrapper for the built in anchor() function found in the url helper.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>
				Name</th>
			<th>
				Default</th>
			<th>
				Required</th>
			<th>
				Description</th>
		</tr>
		<tr>
			<td width="100">
				segments</td>
			<td width="100">
				None</td>
			<td width="100">
				Yes</td>
			<td>
				The segments passed to the anchor function.</td>
		</tr>
		<tr>
			<td width="100">
				title</td>
			<td width="100">
				None</td>
			<td width="100">
				No</td>
			<td>
				The text that is displayed between the &lt;a&gt;&lt;/a&gt; tags. If omitted, the generated url will be displayed.</td>
		</tr>
		<tr>
			<td width="100">
				class</td>
			<td width="100">
				None</td>
			<td width="100">
				No</td>
			<td>
				A class to be assigned to the anchor tag.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ url:anchor segments=&quot;users/login&quot; title=&quot;Login&quot; class=&quot;login&quot; }}{{ /noparse }}
	
Returns:

	<a href="http://www.example.com/users/login" class="login">Login</a>