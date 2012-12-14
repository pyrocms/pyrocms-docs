# Inflector Helper

This helper adds functionality not available in the [CodeIgniter Inflector Helper](http://codeigniter.com/user_guide/helpers/inflector_helper.html).

## Functions


### humanize($str)

__&#42;&#42;Overrides default CodeIgniter function.&#42;&#42;__

Takes multiple words separated by underscores and changes them to spaces.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>str</td>
			<td></td>
			<td>Yes</td>
			<td>A string to <em>humanize</em>.</td>
		</tr>
	</tbody>
</table>

	// usage
	humanize('what_would_you_like_to_do_today');
	
	// output
	'What Would You Like To Do Today'

### keywords($str)

Takes multiple words separated by spaces and changes them to _keywords_ in the PyroCMS context. Makes sure the keywords are separated by a comma followed by a space.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>str</td>
			<td></td>
			<td>Yes</td>
			<td>Keywords separated by spaces: <em>Ex: 'keyword_1 keyword_2 keyword_3'</em></td>
		</tr>
	</tbody>
</table>

	// usage
	keywords('keyword_1 keyword_2 keyword_3');
	
	// output
	'keyword_1, keyword_2, keyword_3'