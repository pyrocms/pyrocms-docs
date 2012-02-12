# Streams API CP Driver

The CP driver has functions that take care of common PyroCMS control panel routines. Since we know the whole data structure, including validation, we bypass a lot of annoying and repetitive coding.

You can call the entries driver like this:

	$this->streams->cp->function();

## entries_table(<var>$stream_slug, $namespace_slug, $pagination = null, $pagination_uri = null, $buttons = array(), $view_override = false</var>)

Allows you to more painlessly create a table of entries on the back end, including pagination.

This function returns the table string unless **$view_override** is set to true, in which case this function will take care of loading the template view for the form.

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
		<td>pagination</td>
		<td>int</td>
		<td>If you want pagination activated, set this variable to the number of entries you'd like shown on each page.</td>
	</tr>
	<tr> 
		<td>pagination_uri</td>
		<td>string</td>
		<td>URI to be used in pagination, not including the offset section. No trailing slash.</td>
	</tr>
	<tr> 
		<td>buttons</td>
		<td>array</td>
		<td>An array of buttons for each row. Each button is an array of the <strong>label</strong>, <strong>url</strong>, and optionally <strong>confirm</strong>. See the example below for more information. **-entry_id-** is replaced with the row's entry id.</td>
	</tr>
	<tr> 
		<td>view_override</td>
		<td>bool</td>
		<td>Setting this to true removes the need to load a template in your controller function.</td>
	</tr>
</table>

### Example:

	$buttons = array(
		array(
			'label' 	=> lang('global:edit'),
			'url' 		=> 'admin/streams_sample/edit/-entry_id-'
		),
		array(
			'label'		=> lang('global:delete'),
			'url' 		=> 'admin/streams_sample/delete/-entry_id-',
			'confirm'	=> true
		)
	);
	
	$this->streams->cp->entries_table('faqs', 'streams_sample', 15, 'admin/streams_sample/index', $buttons, true);

## form(<var>$stream\_slug, $namespace\_slug, $mode = 'new', $entry = null, $view\_override = false, $extra = array(), $skips = array()</var>)

Creates an entry form for the control panel. Also manages and sets validation.

This function returns the form string unless **$view_override** is set to true, in which case this function will take care of loading the template view for the form.

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
		<td>Setting this to true removes the need to load a template in your controller function.</td>
	</tr>
	<tr> 
		<td>extra</td>
		<td>array</td>
		<td>An array of extra parameters that all have default values. See section below.</td>
	</tr>
	<tr> 
		<td>skips</td>
		<td>array</td>
		<td>You can remove fields from the form by adding their field slugs to this array. Field slugs in this array will not be put through validation. This is handy if you want to set a form value manually without allowing your user to do it.</td>
	</tr>
</table>

### $extra Parameters

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
	<tr> 
		<th width="150">Param</th> 
		<th width="250">Default</th> 
		<th></th> 
	</tr>
	</thead>
	<tbody> 
	<tr> 
		<td>return</td>
		<td>current url</td>
		<td>The URL to return to after the form submission. **-id-** in this string will get replaced by the edit or new entry id, depending on the entry mode (edit or new).</td>
	</tr> 
	<tr> 
		<td>success_message</td>
		<td>generic successful entry submission message</td>
		<td>Flash message to show after successful entry submission.</td>
	</tr> 
	<tr> 
		<td>failure_message</td>
		<td>generic failed entry submission message</td>
		<td>Flash message to show after failed entry submission.</td>
	</tr> 
	<tr> 
		<td>required</td>
		<td>&lt;span&gt;*&lt;/span&gt;</td>
		<td>This defaults to the standard required marker for the PyroCMS CP, so it shouldn't usually be changed, but if you need to you can pass a new value here.</td>
	</tr>
	<tr> 
		<td>title</td>
		<td>null</td>
		<td>A title for the header bar.</td>
	</tr> 
	<tr> 
		<td>email_notifications</td>
		<td>null</td>
		<td>An array of email notification data. More docs coming on this.</td>
	</tr> 
	</tbody>
</table>

### Example:

	$extra = array(
		'return'			=> 'admin/streams_sample',
		'success_message'	=> lang('streams_sample:submit_success'),
		'failure_message'	=> lang('streams_sample:submit_failure'),
		'title'				=> lang('streams_sample:new')
	);
	
	$this->streams->cp->form('faqs', 'streams_sample', $mode = 'new', $skips = null, $view_override = true, $extra);