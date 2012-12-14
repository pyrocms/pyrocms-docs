# Pagination Helper

Some helper functions to use with the [CodeIgniter Pagination Library](http://userguides.ellislab.com/codeigniter/libraries/pagination.html).

## Functions

### create\_pagination($uri, $total\_rows, $limit = null, $uri\_segment = 4)

Helps you generate basic pagination. If you want something more flexible, use the actual [Pagination library](http://userguides.ellislab.com/codeigniter/libraries/pagination.html).

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="130">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>uri</td>
			<td></td>
			<td>Yes</td>
			<td>The URI to base pagination off.</td>
		</tr>
		<tr>
			<td>total_rows</td>
			<td></td>
			<td>Yes</td>
			<td>The total of the items to paginate.</td>
		</tr>
		<tr>
			<td>limit</td>
			<td>(Site Settings Records Per Page)</td>
			<td>No</td>
			<td>How many items to per page.</td>
		</tr>
		<tr>
			<td>uri_segment</td>
			<td>4</td>
			<td>No</td>
			<td>The URI Segment with the current page param</td>
		</tr>
	</tbody>
</table>