# Module Helper

A collection of helper functions included with the Modules module.

## Functions


### module_directories()

Returns an array of the module directories.


### module_array()

Returns an array of the modules and their information.


### module_exists($module = '')

Check if a module exists. Returns bool.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>module</td>
			<td></td>
			<td>Yes</td>
			<td>Module slug</td>
		</tr>
	</tbody>
</table>

{{# I don't believe this method works correctly
### module_controller($controller, $module)

Check if the module has a controller with the name given. Returns bool.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>controller</td>
			<td></td>
			<td>Yes</td>
			<td>Controller name</td>
		</tr>
		<tr>
			<td>module</td>
			<td></td>
			<td>Yes</td>
			<td>Module slug</td>
		</tr>
	</tbody>
</table>
#}}

### reload\_module\_details($slug = '')

Reload a modules details file and write changes to the database.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>slug</td>
			<td></td>
			<td>Yes</td>
			<td>Module slug</td>
		</tr>
	</tbody>
</table>