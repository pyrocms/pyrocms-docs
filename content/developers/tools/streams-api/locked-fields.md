# Locked Fields

If your module uses the Streams API there is a chance that it will have field dependencies. For example, you might want to allow users to manage some fields but restrict them from deleting a field that your module depends on.

All fields have a "locked" bool parameter. This allows you to build your own field dependency logic.

<hr>

### Adding and "locking" Fields

The <b>Fields Driver's {{ link title="add\_field()" uri="/developers/tools/streams-api/fields-driver#add-field" }}</b> function allows to set the "locked" parameter to TRUE.

### Example

	$field = array(
	    'name'          => 'Question',
	    'slug'          => 'question',
	    'namespace'     => 'streams_sample',
	    'type'          => 'text',
	    'extra'         => array('max_length' => 200),
	    'assign'        => 'faqs',
	    'title_column'  => TRUE,
	    'required'      => TRUE,
	    'unique'        => TRUE,
	    'locked'		=> TRUE // lock this field
	)

	$this->streams->fields->add_field($field);

<hr>

### Automatically delete fields + assignments in a smart way

The <b>CP Driver's {{ link title="teardown\_assignment\_field()" uri="/developers/tools/streams-api/cp-driver#teardown-assignment-field" }}</b> function performs the following checks before deleting a field.

* If the field is **locked**, it deletes the assigment only.
* If the field is assigned to multiple streams, it deletes the assigment only. 
* If the field is assigned to only one stream, it deletes the assigment + field combo.
* If **force_delete** is set to **true**, it deletes the assigment + field combo, regardless of previous checks.

<hr>

### Hiding buttons for locked fields

When using the <b>CP Driver's {{ link title="fields\_table()" uri="/developers/tools/streams-api/cp-driver#fields-table" }} or {{ link title="assignments\_table()" uri="/developers/tools/streams-api/cp-driver#assignments-table" }}</b> functions, you might want to hide buttons for locked fields. A practical use case would be when you want to hide the <b>Delete</b> button. With the example bellow, the edit button is displayed for all fields and the delete button is hidden from the assignments table for fields that are locked.

### Example:

	$extra['buttons'] = array(
		array(
			'label' 	=> lang('global:edit'),
			'url' 		=> 'admin/streams_sample/edit/-entry_id-'
		),
		array(
			'label'		=> lang('global:delete'),
			'url' 		=> 'admin/streams_sample/delete/-entry_id-',
			'confirm'	=> true,
			'locked'	=> true	// hide delete button for locked fields
		)
	);

	$this->streams->cp->assignments_table('faqs', 'streams_sample', 15, 'admin/streams_sample/index', true, $extra);