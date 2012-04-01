# Comments Helper

The Comments Helper enables you to use comments with your own module.

## Loading

This helper is loaded by default

## The following functions are available:
	display_comments()
	count_comments()


## Functions

### display_comments

	display_comments($ref_id = '', $reference = NULL);

### Parameters


<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">$ref_id</td>
			<td width="100">int</td>
			<td width="100">Yes</td>
			<td>The reference id to the object we are working with.</td>
		</tr>
		<tr>
			<td width="100">$reference</td>
			<td width="100">string</td>
			<td width="100">No</td>
			<td>A module name or other reference to namespace comments. Uses module name if none provided</td>
		</tr>
	</tbody>
</table>

### Example

	display_comments($sample->id, 'sample');
	
***

### count_comments

	count_comments($module_item_id = '', $module_slug = NULL, $return_as_number = FALSE)

### Parameters

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">$module_item_id</td>
			<td width="100">int</td>
			<td width="100">Yes</td>
			<td>The ID of the module item to count comments for</td>
		</tr>
		<tr>
			<td width="100">$module_slug</td>
			<td width="100">string</td>
			<td width="100">No</td>
			<td>Specify the module slug or the current module's slug will be used</td>
		</tr>
		<tr>
			<td width="100">$return_as_number</td>
			<td width="100">bool</td>
			<td width="100">no</td>
			<td>True to return a number or False to return a language string</td>
		</tr>
	</tbody>
</table>

### Example

	count_comments($sample->id, 'sample', true);
	