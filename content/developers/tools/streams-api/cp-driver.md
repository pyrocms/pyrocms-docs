# Streams API CP Driver

The CP driver has functions that take care of common PyroCMS control panel routines. Since we know the whole data structure, including validation, we bypass a lot of annoying and repetitive coding.

You can call the entries driver like this:

	$this->load->driver('Streams');
	$this->streams->cp->function();

## Functions

* {{ docs:id_link title="Entries Table" }}
* {{ docs:id_link title="Entry Form" }}
* {{ docs:id_link title="Field Form" }}
* {{ docs:id_link title="Fields Table" }}
* {{ docs:id_link title="Assignments Table" }}
* {{ docs:id_link title="Teardown Assignment Field" }}

<hr id="entries-table"/>

## entries\_table(<var>$stream\_slug, $namespace\_slug, $pagination = null, $pagination\_uri = null, $view\_override = false, $extra = array()</var>)

Allows you to create a table of entries on the back end, including pagination.

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
		<td>view_override</td>
		<td>bool</td>
		<td>Setting this to true removes the need to load a template in your controller function.</td>
	</tr>
	<tr> 
		<td>extra</td>
		<td>array</td>
		<td>An array of extra parameters that all have default values. See section below.</td>
	</tr>
</table>

### $extra Parameters

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
	<tr> 
		<th width="150">Param</th> 
		<th width="150">Format</th>
		<th width="150">Default</th> 
		<th></th> 
	</tr>
	</thead>
	<tbody> 
	<tr> 
		<td>title</td>
		<td>string</td>
		<td>null</td>
		<td>A title for the header bar.</td>
	</tr>
	<tr> 
		<td>buttons</td>
		<td>array</td>
		<td>null</td>
		<td>An array of buttons for each row. Each button is an array of the label, url, and optionally confirm. See the example below for more information. -entry_id- is replaced with the row's entry id.</td>
	</tr>
	<tr> 
		<td>filters</td>
		<td>array</td>
		<td>array()</td>
		<td>An array of filter inputs to make available for searching entries. Each filter is a field slug with an optional array of dropdown options.</td>
	</tr>
	</tbody>
</table>

### Example:
	
	$extra['title'] = 'FAQs';
	
	$extra['buttons'] = array(
		array(
			'label' 	=> lang('global:edit'),
			'url' 		=> 'admin/faq/edit/-entry_id-'
		),
		array(
			'label'		=> lang('global:delete'),
			'url' 		=> 'admin/faq/delete/-entry_id-',
			'confirm'	=> true
		)
	);
	
	$extra['filters'] = array(
		'status' => array(
			0 		=> 'Disabled',
			1 		=> 'Enabled'
		),
		'name',
		'description'
	);
	
	$this->streams->cp->entries_table('faqs', 'faq', 15, 'admin/faq/index', true, $extra);
	
It is possible to sort records dynamically wherever you use this method by appending query string to your actual URL.

	?order-<stream-slug>=<field-slug>[&sort-<field_slug>=asc|desc]
	
<hr id="entry-form"/>

## entry\_form(<var>$stream\_slug, $namespace\_slug, $mode = 'new', $entry = null, $view\_override = false, $extra = array(), $skips = array()</var>)

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
	<tr> 
		<td>tabs</td>
		<td>array</td>
		<td>A optional multidimensional array that organizes your fields into tabs. Defaults to false.</td>
	</tr>
	<tr> 
		<td>hidden</td>
		<td>array</td>
		<td>An optional array fields that will be hidden in the form. This is handy for str_id type fields.</td>
	</tr>
	<tr> 
		<td>defualts</td>
		<td>array</td>
		<td>An optional associative array of fields => values that helps prepopulate the form with default data.</td>
	</tr>
</table>

### $extra Parameters

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
	<tr> 
		<th width="150">Param</th>
		<th width="150">Format</th>
		<th width="150">Default</th> 
		<th></th> 
	</tr>
	</thead>
	<tbody> 
	<tr> 
		<td>return</td>
		<td>string</td>
		<td>current url</td>
		<td>The URL to return to after the form submission. **-id-** in this string will get replaced by the edit or new entry id, depending on the entry mode (edit or new).</td>
	</tr> 
	<tr> 
		<td>success_message</td>
		<td>string</td>
		<td>generic successful entry submission message</td>
		<td>Flash message to show after successful entry submission.</td>
	</tr> 
	<tr> 
		<td>failure_message</td>
		<td>string</td>
		<td>generic failed entry submission message</td>
		<td>Flash message to show after failed entry submission.</td>
	</tr> 
	<tr> 
		<td>required</td>
		<td>string</td>
		<td>&lt;span&gt;*&lt;/span&gt;</td>
		<td>This defaults to the standard required marker for the PyroCMS CP, so it shouldn't usually be changed, but if you need to you can pass a new value here.</td>
	</tr>
	<tr> 
		<td>title</td>
		<td>string</td>
		<td>null</td>
		<td>A title for the header bar.</td>
	</tr> 
	<tr> 
		<td>email_notifications</td>
		<td>bool</td>
		<td>false</td>
		<td>An array of email notification data. More docs coming on this.</td>
	</tr> 
	</tbody>
</table>

### Example:

	$extra = array(
		'return'			=> 'admin/faqs',
		'success_message'	=> lang('faqs:submit_success'),
		'failure_message'	=> lang('faqs:submit_failure'),
		'title'				=> lang('faqs:new')
	);
	
	$tabs = array(
		array(
			'title' 	=> "General Information",
			'id'		=> 'general-tab',
			'fields'	=> array('str_id', 'question', 'answer')
		),
		array(
			'title' 	=> "Additional Information",
			'id'		=> 'additional-tab',
			'fields'	=> array('image', 'category')
		)
	);
	
	$hidden = array('str_id');
	
	$defaults = array(
		'str_id' => md5(now()),
		'question' => 'Type your question...'
	);
	
	$this->streams->cp->entry_form('faqs', 'faq', 'new', null, true, $extra, $skips = array(), $tabs, $hidden, $defaults);
	
<hr id="field-form"/>

## field\_form(<var>$stream\_slug, $namespace_slug, $method = 'new', $return = null, $assign\_id = null, $include\_types = array(), $view\_override = false, $extra = array()</var>)

Creates a custom field form.

This allows you to easily create a form that users can use to add new fields to a stream. This functions as the form assignment as well.

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
		<td>return</td>
		<td>string</td>
		<td>The URL to return to after the form submission.</td>
	</tr>
	<tr> 
		<td>assign_id</td>
		<td>int</td>
		<td>The field assignment id.</td>
	</tr>
	<tr> 
		<td>include_types</td>
		<td>array</td>
		<td>The field types to include.</td>
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
		<th width="150">Format</th> 
		<th width="150">Default</th> 
		<th></th> 
	</tr>
	</thead>
	<tbody> 
	<tr> 
		<td>return</td>
		<td>string</td>
		<td>current url</td>
		<td>The URL to return to after the form submission. **-id-** in this string will get replaced by the edit or new entry id, depending on the entry mode (edit or new).</td>
	</tr> 
	<tr> 
		<td>success_message</td>
		<td>string</td>
		<td>generic successful entry submission message</td>
		<td>Flash message to show after successful entry submission.</td>
	</tr> 
	<tr> 
		<td>failure_message</td>
		<td>string</td>
		<td>generic failed entry submission message</td>
		<td>Flash message to show after failed entry submission.</td>
	</tr> 
	<tr> 
		<td>required</td>
		<td>string</td>
		<td>&lt;span&gt;*&lt;/span&gt;</td>
		<td>This defaults to the standard required marker for the PyroCMS CP, so it shouldn't usually be changed, but if you need to you can pass a new value here.</td>
	</tr>
	<tr> 
		<td>title</td>
		<td>string</td>
		<td>null</td>
		<td>A title for the header bar.</td>
	</tr> 
	</tbody>
</table>

### Example:

	$extra = array(
		'return'			=> 'admin/faqs',
		'success_message'	=> lang('faqs:submit_success'),
		'failure_message'	=> lang('faqs:submit_failure'),
		'title'				=> lang('faqs:new')
	);

	$this->streams->cp->field_form('faqs', 'faq', 'new', 'admin/faqs/index', null, array(), true, $extra);

<hr id="fields-table"/>

## fields\_table(<var>$namespace_slug, $pagination = null, $pagination\_uri = null, $view\_override = false, $extra = array(), $skips = array()</var>)

Easily create a table of fields in a certain namespace.

<div class="tip">Note: This function supports hidding buttons for {{ link title="Locked Fields" uri="/developers/tools/streams-api/locked-fields#content" }}.</div>

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
		<td>namespace</td>
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
		<th width="150">Format</th>
		<th width="150">Default</th> 
		<th></th> 
	</tr>
	</thead>
	<tbody> 
	<tr> 
		<td>title</td>
		<td>string</td>
		<td>null</td>
		<td>A title for the header bar.</td>
	</tr>
	<tr> 
		<td>buttons</td>
		<td>array</td>
		<td>null</td>
		<td>An array of buttons for each row. Each button is an array of the label, url, and optionally confirm. See the example below for more information. -entry_id- is replaced with the row's entry id.</td>
	</tr> 
	</tbody>
</table>

### Example:

	$extra['title'] = 'FAQ Fields';

	$extra['buttons'] = array(
		array(
			'label' 	=> lang('global:edit'),
			'url' 		=> 'admin/faqs/edit/-entry_id-'
		),
		array(
			'label'		=> lang('global:delete'),
			'url' 		=> 'admin/faqs/delete/-entry_id-',
			'confirm'	=> true,
		)
	);
	
	$this->streams->cp->fields_table('faq', 15, 'admin/faqs/index', true, $extra)

<hr id="assignments-table"/>

## assignments\_table(<var>$stream\_slug, $namespace\_slug, $pagination = null, $pagination\_uri = null, $view\_override = false, $extra = array(), $skips = array()</var>)

Easily create a table of field assignments in a certain namespace.

<div class="tip">Note: This function supports hidding buttons for {{ link title="Locked Fields" uri="/developers/tools/streams-api/locked-fields#content" }}.</div>

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
		<th width="150">Format</th>
		<th width="150">Default</th> 
		<th></th> 
	</tr>
	</thead>
	<tbody> 
	<tr> 
		<td>title</td>
		<td>string</td>
		<td>null</td>
		<td>A title for the header bar.</td>
	</tr>
	<tr> 
		<td>buttons</td>
		<td>array</td>
		<td>null</td>
		<td>An array of buttons for each row. Each button is an array of the label, url, and optionally confirm. See the example below for more information. -entry_id- is replaced with the row's entry id.</td>
	</tr>
	</tbody>
</table>

### Example:

	$extra['title'] = 'FAQ Fields';

	$extra['buttons'] = array(
		array(
			'label' 	=> lang('global:edit'),
			'url' 		=> 'admin/faqs/edit/-entry_id-'
		),
		array(
			'label'		=> lang('global:delete'),
			'url' 		=> 'admin/faqs/delete/-entry_id-',
			'confirm'	=> true,
		)
	);

	$this->streams->cp->assignments_table('faqs', 'faq', 15, 'admin/faqs/index', true, $extra);

<hr id="teardown-assignment-field"/>

## teardown\_assignment\_field(<var>$assign\_id, $force\_delete = false</var>)

Tear down an assignment + field combo.

Usually we'd just delete the assignment, but we need to delete the field as well, since there is a 1-1 relationship here.

<div class="tip">Note: This function supports {{ link title="Locked Fields" uri="/developers/tools/streams-api/locked-fields#content" }}.</div>

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
		<td>assign_id</td>
		<td>int</td>
		<td>The field assignment id.</td>
	</tr> 
	<tr> 
		<td>force_delete</td>
		<td>bool</td>
		<td>Set to true to force delete the field assignment.</td>
	</tr>
</table>

### Example:

	$this->streams->cp->teardown_assignment_field($assign_id, true);
