# Streams API Streams Driver

The streams driver is used to create and manipulate streams. Streams represent tables of data in the database.

You can call the streams driver like this:

	$this->streams->streams->function();
	
## Preset Fields

When you create a stream, the following fields are created automatically.

<table>
	<tr>
		<td width="25%"><strong>id</strong>
		<td>An auto-incrementing standard primary key ID.</td>
	</tr>
	<tr>
		<td><strong>created</strong>
		<td>A MySQL datetime field of when an entry was created.</td>
	</tr>
	<tr>
		<td><strong>updated</strong>
		<td>A MySQL datetime field of the last time an entry was updated.</td>
	</tr>
	<tr>
		<td><strong>created_by</strong>
		<td>ID of the user who initially created the entry.</td>
	</tr>
	<tr>
		<td><strong>ordering_count</strong>
		<td>Incrementing numerical ordering count.</td>
	</tr>
</table>

## add_stream(<var>$stream\_name, $stream\_slug, $namespace, $prefix = NULL, $about = NULL</var>)

The **add_stream** function allows you to create a stream. It will create the actual table in the database, as well as the streams metadata in the streams table.
	
### Parameters

<table>
	<tr>
		<td width="25%"><strong>stream_name</strong>
		<td>The full name of the stream.</td>
	</tr>
	<tr>
		<td><strong>stream_slug</strong>
		<td>The stream slug.</td>
	</tr>
	<tr>
		<td><strong>namespace</strong>
		<td>A namespace for your stream.</td>
	</tr>
	<tr>
		<td><strong>prefix</strong>
		<td>Optional. A stream prefix. Will be used in the stream database table name.</td>
	</tr>
	<tr>
		<td><strong>about</strong>
		<td>Optional. A short blurb about the stream.</td>
	</tr>
</table>

### Example:

In this example we add the recipe stream. Since the module is also called "recipes", our namespace is called "recipes". We are not providing a prefix in this case, so our table will be created a **default_recipes**. If we had a prefix, let's say 'rec_', it would be **default\_rec\_recipes**.

	$this->streams->streams->add_stream('FAQs', 'faqs', 'streams_sample', 'sample_', NULL);

## get_stream(<var>$stream\_slug, $namespace</var>)

Gets data about a stream. It does not retrieve entries, just the stream metadata.
	
### Example:

	$this->streams->streams->get_stream('faqs', 'streams_sample');

Returns:
	
	stdClass Object
	(
	    [id] => 18
	    [stream_name] => FAQs
	    [stream_slug] => faqs
	    [stream_namespace] => streams_sample
	    [stream_prefix] => sample_
	    [about] => 
	    [view_options] => Array
	        (
	            [0] => id
	            [1] => created
	        )
	
	    [title_column] => question
	    [sorting] => title
	)
	
<div class="tip"><strong>Note:</strong> The view options column is an array of the columns that are shown when listing entries in a table. 'id' and 'created' are the default values.</div>

## get_streams(<var>$namespace</var>)

Gets basic data about all the streams in a namespace.

### Example:

	$this->streams->streams->get_streams('streams_sample');
	
Returns:

	Array
	(
	    [0] => stdClass Object
	        (
	            [id] => 18
	            [stream_name] => FAQs
	            [stream_slug] => faqs
	            [stream_namespace] => streams_sample
	            [stream_prefix] => sample_
	            [about] => 
	            [view_options] => Array
	                (
	                    [0] => id
	                    [1] => created
	                )
	
	            [title_column] => question
	            [sorting] => title
	        )
	)

## update_stream(<var>$stream, $namespace, $data</var>)

Allows you to update basic stream metadata. You can pass any stream metadata value and it will handle the necessary changes, so you can give it a new stream slug and it will update the metadata and update the table name. Returns BOOL.

### Example:

	$update_data = array(
		'stream_slug'	=> 'the_faqs',
		'about'			=> 'A list of frequently asked questions.',
		'view_options'	=> array('question')
	);
	
	$this->streams->streams->update_stream('faqs', 'streams_sample', $update_data);

## delete_stream(<var>$stream\_slug, $namespace</var>)

Deletes a stream. This will delete all the entries associated with this stream as well, as well as run all of the field destruct functions for fields assigned to this stream.

This streams returns TRUE or FALSE, based on whether the streams was successfully deleted.
		
### Example:

	$this->streams->streams->delete_stream('faqs', 'streams_sample');

## get_assignments(<var>$stream, $namespace</var>)

Gets assignments for a stream. More information forthcoming.

### Example:

	$this->streams->streams->get_assignments('faqs', 'streams_sample');
	
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
	
	    [1] => stdClass Object
	        (
	            [id] => 11
	            [stream_name] => FAQs
	            [stream_slug] => faqs
	            [stream_namespace] => streams_sample
	            [stream_prefix] => sample_
	            [about] => 
	            [title_column] => question
	            [sorting] => title
	            [stream_view_options] => a:2:{i:0;s:2:"id";i:1;s:7:"created";}
	            [stream_id] => 18
	            [field_id] => 11
	            [field_name] => Answer
	            [field_slug] => answer
	            [field_namespace] => streams_sample
	            [field_type] => textarea
	            [field_data] => a:0:{}
	            [field_view_options] => 
	        )
	)