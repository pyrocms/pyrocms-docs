# Streams API Fields Driver

The fields driver is used to create and manipulate fields.

You can call the fields driver like this:

	$this->streams->fields->function();

<hr id="add-field">

## add_field(<var>$field</var>)

Creates a field. The function takes a single array which can have the following data:
	
### Parameters

<table>
	<tr>
		<td width="25%"><strong>name</strong>
		<td>The full name of the field.</td>
	</tr>
	<tr>
		<td><strong>slug</strong>
		<td>The field slug.</td>
	</tr>
	<tr>
		<td><strong>namespace</strong>
		<td>A namespace for your field. This should be the namespace of the module or where .</td>
	</tr>
	<tr>
		<td><strong>type</strong>
		<td>The field type for this field.</td>
	</tr>
	<tr>
		<td><strong>extra</strong>
		<td>Optional. Extra data required or optional for the field type you choose. Please see the field types documentation to see what values are available.</td>
	</tr>
	<tr>
		<td><strong>assign</strong>
		<td>Optional. Allows you to automatically assign field to a stream. This value is the stream slug of the stream you'd like to assign this field to. The stream needs to be in the same namespace as the field.</td>
	</tr>
</table>	
	
### Example:

	$field = array(
		'name'			=> 'Question',
		'slug'			=> 'question',
		'namespace'		=> 'streams_sample',
		'type'			=> 'text',
		'extra'			=> array('max_length' => 200),
		'assign'		=> 'faqs',
		'title_column'	=> TRUE,
		'required'		=> TRUE,
		'unique'		=> TRUE
	)
	
	$this->streams->fields->add_field($field);

## add\_fields(<var>$fields</var>)

Allows you to add an array of fields in the same format of add_field() above.

### Example:

	$fields = array(
		array(
			'name'			=> 'Question',
			'slug'			=> 'question',
			'namespace'		=> 'streams_sample',
			'type'			=> 'text',
			'extra'			=> array('max_length' => 200),
			'assign'		=> 'faqs',
			'title_column'	=> TRUE,
			'required'		=> TRUE,
			'unique'		=> TRUE
		),
		array(
			'name'			=> 'Answer',
			'slug'			=> 'answer',
			'namespace'		=> 'streams_sample',
			'type'			=> 'textarea',
			'assign'		=> 'faqs',
			'required'		=> TRUE
		)
	);
	
	$this->streams->fields->add_fields($fields);

## assign\_field(<var>$namespace, $stream\_slug, $field\_slug, $assign\_data = array()</var>)

Assigns a field to a stream. These must both be in the same namespace. The last parameter, **assign_data** is an array that can have the follow values:

<table>
	<tr>
		<td width="25%"><strong>required</strong>
		<td>Boolean. Whether or not this field should be required. Defaults to FALSE.</td>
	</tr>
	<tr>
		<td><strong>unique</strong>
		<td>Boolean. Whether or not this field should be unique in the stream. Defaults to FALSE.</td>
	</tr>
	<tr>
		<td><strong>title_column</strong>
		<td>Boolean. Whether or not this field should be the title column.</td>
	</tr>
	<tr>
		<td><strong>instructions</strong>
		<td>String. Instructions that will appear on the entry form next to this field.</td>
	</tr>
</table>

### Example

	$this->streams->fields->assign_field('streams_sample', 'faqs', 'question', array('required' => TRUE));
	
<div class="tip"><strong>Note:</strong> If you use the assign option when adding a field, you do not need to assign it.</div>

## deassign\_field(<var>$namespace, $stream\_slug, $field\_slug</var>)

Deassigns a field from a stream. This will not only remove the assignment, but also the actual column from the stream table, so all data for the field in the stream will be lost.

### Example:

	$this->streams->fields->deassign_field('streams_sample', 'faqs', 'question');

## delete\_field(<var>$field\_slug, $namespace</var>)

Deletes a field and the field assignment.

### Example:

	$this->streams->fields->delete_field('question', 'streams_sample');
	
## get\_field\_assignments(<var>$field\_slug, $namespace</var>)

Get the assignments for a give field.

### Example:

	$this->streams->fields->get_field_assignments('question', 'streams_sample');

Returns:

	Array
	(
	    [0] => stdClass Object
	        (
	            [id] => 10
	            [stream_name] => FAQs
	            [stream_slug] => faqs
	            [stream_namespace] => streams_sample
	            [stream_prefix] => sample_
	            [about] => 
	            [view_options] => 
	            [title_column] => question
	            [sorting] => title
	            [stream_view_options] => a:2:{i:0;s:2:"id";i:1;s:7:"created";}
	            [stream_id] => 18
	            [field_id] => 10
	            [field_name] => Question
	            [field_slug] => question
	            [field_namespace] => streams_sample
	            [field_type] => text
	            [field_data] => a:1:{s:10:"max_length";i:200;}
	            [field_view_options] => 
	        )
	
	)