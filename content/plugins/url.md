# URL Plugin

The url plugin gives you access to url data and logic.

## url:current

Displays the full current URL.

### Example

	{{ noparse }}{{ url:current }}{{ /noparse }}

Returns:

	http://www.example.com/current/uri/

## url:site

Displays the full site URL. Use this to generate links within your site - supply URL segments and generate a full (absolute) URL with domain name and path.

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
			<td>URI segments passed to the site_url function.</td>
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

<div class="tip"><strong>Note:</strong> The site URL includes index.php if you are not using mod_rewrite to remove it and you've not changed the <strong>$config['index_page']</strong> variable in <em>/system/cms/config/config.php</em>. For more information, see {{ link title="Removing index.php from URLs" uri="setup/removing-indexphp-from-urls" }}.</div>

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
				Number of segment (left to right, first segment is 1).</td>
		</tr>
		<tr>
			<td width="100">
				default</td>
			<td width="100">
				None</td>
			<td width="100">
				No</td>
			<td>Default value if selected segment does not exist/is not in use.</td>
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

Generates an anchor tag (a link) with an absolute URL (domain name and path) from URI segments. Essentially a wrapper for built in anchor() function found in the url helper.

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
				Segments passed to the anchor function.</td>
		</tr>
		<tr>
			<td width="100">
				title</td>
			<td width="100">
				None</td>
			<td width="100">
				No</td>
			<td>
				Text displayed between &lt;a href&gt;&lt;/a&gt; tags. If omitted, URL is duplicated.</td>
		</tr>
		<tr>
			<td width="100">
				class</td>
			<td width="100">
				None</td>
			<td width="100">
				No</td>
			<td>
				Optional CSS class.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ url:anchor segments=&quot;users/login&quot; title=&quot;Login&quot; class=&quot;login&quot; }}{{ /noparse }}
	
Returns:

	<a href="http://www.example.com/users/login" class="login">Login</a>
