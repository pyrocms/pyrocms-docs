# Session Plugin

The _session_ plugin gives you the ability to set and read session data.

## session:data

	{{ noparse }}{{ session:data }}{{ /noparse }}
	
Displays or sets a piece of session data.

If you supply a *value*, it will set the session data and display nothing, otherwise the existing value of *name* will be displayed.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">name</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of the data you want to display or set.</td>
		</tr>
		<tr>
			<td width="100">value</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>Add a value to set data instead of displaying it.</td>
		</tr>
	</tbody>
</table>

### Examples

Setting data:

	{{ noparse }}{{ session:data name="color_preference" value="red" }}{{ /noparse }}

Displaying data:

	{{ noparse }}{{ session:data name="color_preference" }}{{ /noparse }}

Returns:

	red
	
## session:flash	

Identical to the data function, but uses flash data.

Flash data is data that is only available for the next page load, then it is destroyed.

### Examples

Setting data:

	{{ noparse }}{{ session:flash name="color_preference" value="blue" }}{{ /noparse }}

Displaying data:

	{{ noparse }}{{ session:flash name="color_preference" }}{{ /noparse }}

Returns:

	blue

## session:messages

Displays a flashdata message.

PyroCMS has standardized messages to belong to one of three categories:

* success
* notice
* error

Each has a different meaning and by default will appear with a class name associated to it.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">success</td>
			<td>success</td>
			<td>No</td>
			<td>Set your own class name for success messages.</td>
		</tr>
		<tr>
			<td width="100">notice</td>
			<td>notice</td>
			<td>No</td>
			<td>Set your own class name for notice messages.</td>
		</tr>
		<tr>
			<td width="100">error</td>
			<td>error</td>
			<td>No</td>
			<td>Set your own class name for error messages.</td>
		</tr>
	</tbody>
</table>

### Examples

Standard output:

	{{ noparse }}{{ session:messages }}{{ /noparse }}

Returns:

	<div class="error">There was an error.</div>

With custom classes:

	{{ noparse }}{{ session:messages success="my_success_class" }}{{ /noparse }}

Returns: 
	
	<div class="my_success_class">Success!</div>
