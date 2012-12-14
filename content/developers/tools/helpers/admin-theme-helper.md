# Admin Theme Helper

This helper is intended to be used with your Admin Theme.

## Functions


### file_partial($file = '', $ext = 'php')

Loads a file partial from your Theme Views Partials folder. `echo`'s directly to the page.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>file</td>
			<td></td>
			<td>Yes</td>
			<td>The path to the view. Inside <dfn>THEME_VIEWS_FOLDER/partials/</dfn></td>
		</tr>
		<tr>
			<td>ext</td>
			<td>php</td>
			<td>No</td>
			<td>Extension of the file of other than <em>php</em></td>
		</tr>
	</tbody>
</table>


### template_partial($name = '')

Loads a template partial previously set with `$this->template->partial()`. `echo`'s directly to the page.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>name</td>
			<td></td>
			<td>Yes</td>
			<td>The name you set the partial as</td>
		</tr>
	</tbody>
</table>

{{# Internal only?
### accented_characters()

Returns the array of the accented characters and their replacements set in <dfn>config/foreign_chars.php</dfn>.
#}}