# Date Helper

This helper adds functionality not available in the [CodeIgniter Date Helper](http://codeigniter.com/user_guide/helpers/date_helper.html).

## Functions


### format_date($unix, $format = '')

Format a UNIX Timestamp to a specific format or use the default date format in the site settings.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>unix</td>
			<td></td>
			<td>Yes</td>
			<td>A UNIX Timestamp or <code>strtotime()</code> valid string</td>
		</tr>
		<tr>
			<td>format</td>
			<td>(Site Settings Date Format)</td>
			<td>No</td>
			<td>The PHP Date format for the date</td>
		</tr>
	</tbody>
</table>