# Gravatar Helper

Helper functions to interact with Gravatar.

## Functions


### gravatar($email = '', $size = 50, $rating = 'g', $url_only = false, $default = false)

Get a Gravatar image based on the passed in params.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>email</td>
			<td></td>
			<td>Yes</td>
			<td>E-mail address of the Gravatar user</td>
		</tr>
		<tr>
			<td>size</td>
			<td>50</td>
			<td>No</td>
			<td>The size of the image in <em>px</em></td>
		</tr>
		<tr>
			<td>rating</td>
			<td>g</td>
			<td>No</td>
			<td>Limit the image to a specific rating</td>
		</tr>
		<tr>
			<td>url_only</td>
			<td>false</td>
			<td>No</td>
			<td>Return only the URL to the image file? Otherwise, returns <code>&lt;img /&gt;</code> tag.</td>
		</tr>
		<tr>
			<td>default</td>
			<td>false</td>
			<td>No</td>
			<td>URL to an image to use as the default if no Gravatar available</td>
		</tr>
	</tbody>
</table>