# Blog Tags

## blog:posts

	{{ noparse }}{{ blog:posts }}{{ /noparse }}

Display all blog posts or blog posts by category.

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
				category</td>
			<td width="100">
				All Categories</td>
			<td width="100">
				No</td>
			<td>
				Display posts from this category only.</td>
		</tr>
		<tr>
			<td width="100">
				limit</td>
			<td width="100">
				10</td>
			<td width="100">
				No</td>
			<td>
				The maximum number of posts to display.</td>
		</tr>
		<tr>
			<td width="100">
				order-by</td>
			<td width="100">
				created_on</td>
			<td width="100">
				No</td>
			<td>
				Choose which column to sort by. (category_title, title, author_id, created_on, updated_on)</td>
		</tr>
		<tr>
			<td width="100">
				order-dir</td>
			<td width="100">
				asc</td>
			<td width="100">
				No</td>
			<td>
				The direction to sort results by. (asc, desc)</td>
		</tr>
	</tbody>
</table>

### Example</strong>

	{{ noparse }}{{ blog:posts limit=&quot;5&quot; order-by=&quot;title&quot; order-dir=&quot;desc&quot; category=&quot;pyrocms&quot; }}
	&lt;h2&gt;{{ title }}&lt;/h2&gt;
	&lt;p&gt;{{ intro }} &lt;a href=&quot;{{ url }}&quot; title=&quot;Read more about: {{ title }}&quot;&gt;Read more&lt;/a&gt;&lt;/p&gt;
	&lt;p&gt;Written by: &lt;a href=&quot;/users/profile/{{ author_id }}&quot;&gt;{{ author_name }}&lt;/a&gt;&lt;/p&gt;
{{ /blog:posts }}{{ /noparse }}

## blog:categories

	{{ noparse }}{{ blog:categories }}{{ /noparse }}

Display all blog categories available.

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
				limit</td>
			<td width="100">
				10</td>
			<td width="100">
				No</td>
			<td>
				The maximum number of categories to display.</td>
		</tr>
		<tr>
			<td width="100">
				order-by</td>
			<td width="100">
				created_on</td>
			<td width="100">
				No</td>
			<td>
				Choose which column to sort by. (id, title, slug)</td>
		</tr>
		<tr>
			<td width="100">
				order-dir</td>
			<td width="100">
				asc</td>
			<td width="100">
				No</td>
			<td>
				The direction to sort results by. (asc, desc)</td>
		</tr>
	</tbody>
</table>

### Example</strong>

	{{ noparse }}&lt;ul&gt;
	&lt;li&gt;&lt;a href=&quot;/blog&quot; class=&quot;button&quot;&gt;All categories&lt;/a&gt;&lt;/li&gt;
	{{ blog:categories order-by=&quot;title&quot; limit=&quot;5&quot; }}
	&lt;li&gt;&lt;a href=&quot;{{ url }}&quot; class=&quot;button {{ slug }}&quot;&gt;{{ title }}&lt;/a&gt;&lt;/li&gt;
	{{ /blog:categories }}
&lt;/ul&gt;
{{ /noparse }}