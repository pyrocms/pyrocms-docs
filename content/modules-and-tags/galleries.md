# Galleries Tags

**Note:** As of PyroCMS 2.1, the *Galleries* module is no longer included in the PyroCMS core code, although it can be downloaded for free from the [store](http://www.pyrocms.com/store/details/galleries).

The <em>galleries</em> tag displays images from a gallery.

## galleries:images
	
	{{ noparse }}{{ galleries:images }}{{ /noparse }}
	
Display all images from any one gallery.

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
				slug</td>
			<td width="100">
				None</td>
			<td width="100">
				Yes</td>
			<td>
				The gallery to display images from.</td>
		</tr>
		<tr>
			<td width="100">
				limit</td>
			<td width="100">
				All</td>
			<td width="100">
				No</td>
			<td>
				Limit the number of displayed images.</td>
		</tr>
		<tr>
			<td width="100">
				offset</td>
			<td width="100">
				0</td>
			<td width="100">
				No</td>
			<td>
				Offset the images when retrieving them with a limit set.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{&nbsp;galleries:images slug=&quot;test-gallery&quot; limit=&quot;5&quot; }}
	&lt;h2&gt;{{&nbsp;title }}&lt;/h2&gt;
	&lt;a href=&quot;http://yoursite.com/galleries/{{&nbsp;gallery_slug }}/{{&nbsp;id }}&quot;&gt;
		&lt;img src=&quot;http://yoursite.com/files/thumb/{{&nbsp;file_id }}/100/75&quot; alt=&quot;{{&nbsp;name }}&quot;/&gt;
		100/75 is desired thumbnail width/height respectively
	&lt;/a&gt;
	&lt;p&gt;{{&nbsp;description }}&lt;/p&gt;
{{&nbsp;/galleries:images }}{{ /noparse }}

## galleries:exists

	{{ noparse }}{{&nbsp;galleries:exists }}{{ /noparse }}

Check to see if a gallery exists.

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
				slug</td>
			<td width="100">
				None</td>
			<td width="100">
				Yes</td>
			<td>
				The gallery to check for.</td>
		</tr>
	</tbody>
</table>
<p>
	&nbsp;</p>
