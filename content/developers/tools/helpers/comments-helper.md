# Comments Helper

A collection of helper functions included with the Comments module.

## Functions


### display\_comments($module\_item\_id = '', $module\_slug = null)

Display the comments on a specific item and show the add a comment form.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>module_item_id</td>
			<td></td>
			<td>Yes</td>
			<td>Unique ID of the module item</td>
		</tr>
		<tr>
			<td>module_slug</td>
			<td>(Current Module)</td>
			<td>No</td>
			<td>Module slug of module to look in</td>
		</tr>
	</tbody>
</table>

	// shows the comment form along with any comments
	// on the blog post with the id of 5
	display_comments(5, 'blog');

### count\_comments($module\_item\_id = '', $module\_slug = null, $return\_as\_number = false)

Count the number of comments a specific item has. This is used when determining the language used for singular vs. plural of comments.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>module_item_id</td>
			<td></td>
			<td>Yes</td>
			<td>Unique ID of the module item</td>
		</tr>
		<tr>
			<td>module_slug</td>
			<td>(Current Module Slug)</td>
			<td>No</td>
			<td>Module slug of module to look in</td>
		</tr>
		<tr>
			<td>return_as_number</td>
			<td>false</td>
			<td>No</td>
			<td>Return the actual number of comments, or lookup in lang: <em>comments.counter_none_label, comments.counter_singular_label, comments.counter_plural_label</em></td>
		</tr>
	</tbody>
</table>