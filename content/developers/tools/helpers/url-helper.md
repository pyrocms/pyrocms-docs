# URL Helper

This helper adds functionality not available in the [CodeIgniter URL Helper](http://codeigniter.com/user_guide/helpers/url_helper.html).

## Functions


### url_title($str, $separator = 'dash', $lowercase = false)

__&#42;&#42;Overrides default CodeIgniter function.&#42;&#42;__

This behaves like the normal CodeIgniter `url_title()` function, except it adds Cyrillic alphabet support.

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
			<td>The string to convert</td>
		</tr>
		<tr>
			<td>separator</td>
			<td>dash</td>
			<td>No</td>
			<td>Convert bad characters to this character</td>
		</tr>
		<tr>
			<td>lowercase</td>
			<td>false</td>
			<td>No</td>
			<td>Return result in lowercase?</td>
		</tr>
	</tbody>
</table>


### shorten_url($url = '')

Takes a long URL and uses the TinyURL API to return a shortened version.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>url</td>
			<td>(Current URL)</td>
			<td>No</td>
			<td>The long URL</td>
		</tr>
	</tbody>
</table>

	// usage
	shorten_url('https://www.google.com/search?q=what+is+tinyurl');
	
	// returns
	'http://tinyurl.com/cvwr4sn'