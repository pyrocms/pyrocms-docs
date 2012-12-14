# Navigation Plugin

The _navigation_ plugin creates lists of navigation links based on navigation groups defined in **CP &gt; Design &gt; Navigation**.

## navigation:links

	{{ noparse }}{{ navigation:links }}{{ /noparse }}

Creates a list of links for a group.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="80">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>group</td>
			<td>None</td>
			<td>Yes</td>
			<td>The navigation group the tag should use.</td>
		</tr>
		<tr>
			<td>group_segment</td>
			<td>None</td>
			<td>No</td>
			<td>If your navigation name is in the URI, you can specify the numeric URI segment here, and it will pull the value from the URI.</td>
		</tr>
		<tr>
			<td>list-tag</td>
			<td>ul</td>
			<td>No</td>
			<td>Choose between <code>ol</code> and <code>ul</code> lists. The value of this is wrapped in brackets on either end.</td>
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
			<td>The CSS class to add when an element is the current page.</td>
		</tr>
		<tr>
			<td>more-class</td>
			<td>has_children</td>
			<td>No</td>
			<td>The class applied to a parent <code>li</code> when it contains a <code>ul</code> or <code>ol</code>.</td>
		</tr>
		<tr>
			<td>first-class</td>
			<td>first</td>
			<td>No</td>
			<td>The class applied the first in a list of dropdown links.</td>
		</tr>
		<tr>
			<td>last-class</td>
			<td>last</td>
			<td>No</td>
			<td>The class applied to the last in a list of dropdown links.</td>
		</tr>
		<tr>
			<td>more-class</td>
			<td>None</td>
			<td>No</td>
			<td>The class to use when an element has child elements.</td>
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
			<td><code>true</code> or <code>false</code>. Set if the output source code should be wrapped with an optional <em>list-tag</em>.</td>
		</tr>
		<tr>
			<td>indent</td>
			<td>None</td>
			<td>No</td>
			<td>'tab' or 'space'. Character used to indent the output of source code.</td>
		</tr>
		<tr>
			<td>link-class</td>
			<td>None</td>
			<td>No</td>
			<td>The class names to apply in all anchor elements.</td>
		</tr>
		<tr>
			<td>wrap</td>
			<td>None</td>
			<td>No</td>
			<td>HTML that that you wish to wrap the link title in. Most likely a <code>span</code> element</td>
		</tr>
		<tr>
			<td>top</td>
			<td>link</td>
			<td>No</td>
			<td>Set to &quot;text&quot; and the top level menu items will be rendered as plain text instead of links.</td>
		</tr>
	</tbody>
</table>

### Single Tag Usage

You can use the basic single-tag approach to output a chunk of HTML by itself. This will apply the class names to the `<li>` tags (default) and use the `<a>` tags (default) to wrap the anchors.</p>

	{{ noparse }}{{ navigation:links group="header" }}{{ /noparse }}
	
Returns:

	<li class="first current"><a href="http://localhost/pyrocms/index.php">Home</a></li><li class="last"><a href="http://www.google.com">About Us</a></li>

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

### Tag Pair Usage

If you'd like complete control over your navigation markup, you can use the links function as a tag pair:

	{{ noparse }}&lt;ul>
{{ navigation:links group="header" }}
&lt;li><a href="{{ url }}" class="{{ class }}">{{ title }}</a>
	{{ if children }}
	&lt;ul>
	{{ children }}
		&lt;li>&lt;a href="{{ url }}">{{ title }}&lt;/a>&lt;/li>
	{{ /children }}
	&lt;/ul>
	{{ endif }}
&lt;/li>
{{ /navigation:links }}
&lt;/ul>{{ /noparse }}

### Variables

The following variables are available to you in the tag pair:

<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="150">{{ noparse }}{{ url }}{{ /noparse }}</td>
			<td>Full URL of the link.</td>
		</tr>
		<tr>
			<td width="150">{{ noparse }}{{ title }}{{ /noparse }}</td>
			<td>Link title.</td>
		</tr>
		<tr>
			<td width="150">{{ noparse }}{{ class }}{{ /noparse }}</td>
			<td>Link class.</td>
		</tr>
		<tr>
			<td width="150">{{ noparse }}{{ target }}{{ /noparse }}</td>
			<td>Link target.</td>
		</tr>
		<tr>
			<td width="150">{{ noparse }}{{ children }}{{ /noparse }}</td>
			<td>Tag pair of child link elements. Each child element has all the same above variables as the main elements.</td>
		</tr>
	</tbody>
</table>

### Advanced Options

You can use a combination of params to output a chunk of HTML that shows a short paragraph of navigation, using `<p>` as _list\_tag_ to wrap all items by disabling _items\_only_ and using the tag `<span>` to wrap each anchor link.

	{{ noparse }}{{ navigation:links group="header" tag="span" class="active" separator="|" list-tag="p" items-only="false" }}{{ /noparse }}
	
Returns:

	<p><span class="first active"><a href="http://localhost/pyrocms/index.php">Home</a></span> | <span class="last">...
	<a href="http://www.google.com">About Us</a></span></p>
