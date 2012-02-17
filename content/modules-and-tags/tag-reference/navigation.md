# Navigation Tags

The _navigation_ tag creates lists of navigation links based on navigation groups defined in CP &gt; Design -&gt; Navigation.

## navigation:links

	{{ noparse }}{{ navigation:links }}{{ /noparse }}

Creates a list of links for a group.

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
			<td width="100">group</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Required. The navigation group the tag should use.</td>
		</tr>
		<tr>
			<td>list-tag</td>
			<td>ul</td>
			<td>No</td>
			<td>Choose between ol and ul lists. The value of this is wrapped in brackets on either end.</td>
		</tr>
		<tr>
			<td>tag</td>
			<td>li</td>
			<td>No</td>
			<td>Type of tag that surrounds each navigation item. The value of this is wrapped in brackets on either end.</td>
		</tr>
		<tr>
			<td>class</td>
			<td>current</td>
			<td>No</td>
			<td>The class to use when an element is the current page.</td>
		</tr>
		<tr>
			<td>separator</td>
			<td>None</td>
			<td>No</td>
			<td>String that separates each navigation item.</td>
		</tr>
		<tr>
			<td>items-only</td>
			<td>true</td>
			<td>No</td>
			<td>true or false. Set if the output source code should be wrapped with an optional list_tag.</td>
		</tr>
		<tr>
			<td>indent</td>
			<td>None</td>
			<td>No</td>
			<td>tab or space. Character used to indent the output of source code.</td>
		</tr>
		<tr>
			<td>link-class</td>
			<td>None</td>
			<td>No</td>
			<td>The class names to apply in all anchor elements.</td>
		</tr>
		<tr>
			<td>top</td>
			<td>link</td>
			<td>No</td>
			<td>Set to &quot;text&quot; and the top level menu items will be rendered as plain text instead of links.</td>
		</tr>
	</tbody>
</table>

### Simple Usage

You can use the basic single-tag approach to output a chunk of HTML by itself. This will apply the class names to the <kdb>&lt;li&gt;</kdb> tags (default) and use the <kdb>&lt;a&gt;</kdb> tags (default) to wrap the anchors.</p>

	{{ noparse }}{{ navigation:links group=&quot;header&quot; }}{{ /noparse }}
	
Returns:

	<li class="first current">
		<a href="http://localhost/pyrocms/index.php">Home</a>
	</li>
	<li class="last">
		<a href="http://www.google.com">About Us</a>
	</li>

You can use the basic single-tag approach like this to output a chunk of HTML that renders indented source code and adds a custom class name to all link anchors.

	{{ noparse }}{{ navigation:links group="header" indent="tab" link-class="foo" }}{{ /noparse }}
	
Returns:

	<li class="first current">
		<a href="http://localhost/pyrocms/index.php" class="foo">Home</a>
	</li>
	<li class="last">
		<a href="http://www.google.com" class="foo">About Us</a>
	</li>
	
If you use nested links the default tag outputs the following html when menu items are arranged in a multilevel menu.

	{{ noparse }}{{ navigation:links group="header" indent="tab" }}{{ /noparse }}
	
Returns:
	
	<li class="first current">
		<a href="http://example.com/home">Home</a>
	</li>
	<li class="">
		<a href="http://example.com/about-us">About Us</a>
		<ul>
			<li class="first">
				<a href="http://example.com/contact">Contact</a>
			</li>
			<li class="last">
				<a href="http://example.com/staff">Staff</a>
				<ul>
					<li class="single">
						<a href="http://example.com/history">History</a>
					</li>
				</ul>
			</li>
		</ul>
	</li>
	<li class="last">
		<a href="http://example.com/blog">Blog</a>
	</li>
	
### Advanced Options

You can use a combination of params to output a chunk of HTML that shows a short paragraph of navigation, using <p> as list_tag to wrap all items by disabling items_only and using the tag <span> to wrap each anchor link.

	{{ noparse }}{{ navigation:links group="header" tag="span" class="active" separator="|" list-tag="p" items-only="false" }}{{ /noparse }}
	
Returns:

	<p><span class="first active"><a href="http://localhost/pyrocms/index.php">Home</a></span> | <span class="last">...
	<a href="http://www.google.com">About Us</a></span></p>