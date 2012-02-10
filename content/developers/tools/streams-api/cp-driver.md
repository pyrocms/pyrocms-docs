# Streams API CP Driver

The CP driver has functions that take care of common PyroCMS control panel routines. Since we know the whole data structure, including validation, we bypass a lot of annoying and repetitive coding.

You can call the entries driver like this:

	$this->streams->cp->function();

## form(<var>$stream\_slug, $namespace\_slug, $mode = 'new', $entry = NULL, $view\_override = FALSE, $skips = array()</var>)

Creates an entry form for the control panel. Also manages and sets validation.

This function returns the form string unless **$view_override** is set to TRUE, in which case this function will take care of loading the template view for the form.

So if you really want to go simple, you could have a controller function that loads a new entry form complete with validation and everything with one line. Pretty cool, huh?

### Parameters

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
	<tr> 
		<th width="150">Var</th> 
		<th width="150">Format</th> 
		<th></th> 
	</tr>
	</thead>
	<tbody> 
	<tr> 
		<td>stream_slug</td>
		<td>string</td>
		<td>The form stream slug.</td>
	</tr> 
	<tr> 
		<td>namespace_slug</td>
		<td>string</td>
		<td>The form stream namespace slug.</td>
	</tr> 
	<tr> 
		<td>mode</td>
		<td>'new' or 'edit'</td>
		<td>Create a new entry or edit one. If set to edit, the $entry param cannot be null.</td>
	</tr>
	<tr> 
		<td>entry</td>
		<td>int</td>
		<td>ID of the entry to edit.</td>
	</tr>
	<tr> 
		<td>view_override</td>
		<td>bool</td>
		<td>Setting this to TRUE removes the need to load a template in your controller function.</td>
	</tr>
	<tr> 
		<td>skips</td>
		<td>array</td>
		<td>You can remove fields from the form by adding their field slugs to this array. Field slugs in this array will not be put through validation. This is handy if you want to set a form value manually without allowing your user to do it.</td>
	</tr>
</table>


