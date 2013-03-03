# Streams API Streams Driver

The streams driver is used to create and manipulate streams. Remember, streams represent tables of data in the database, so when you are creating and manipulating streams, you are creating and manipulating database tables.

You can call the streams driver like this:

	$this->streams->streams->function();

* {{ docs:id_link title="Standard Fields" }}
* {{ docs:id_link title="add\_stream" }}
* {{ docs:id_link title="get\_stream" }}
* {{ docs:id_link title="get\_streams" }}
* {{ docs:id_link title="update\_stream" }}
* {{ docs:id_link title="delete\_stream" }}
* {{ docs:id_link title="get\_assignments" }}

</div>
<div class="doc_content">

## Standard Fields

When you create a stream, the following fields are created automatically:

<table class="table">
	<tr>
		<th>Field</th>
		<th>Notes</th>
	</tr>
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

When using standard Streams functions, all of these fields will be populated automatically. For instance, when you create a new entry in a stream using streams functions, the <dfn>ordering\_count</dfn> will be populated by an integer that is one more than the highest value in <dfn>ordering\_count</dfn>.

## add_stream

	add_stream($stream_name, $stream_slug, $namespace, $prefix = null, $about = null, $extra = array())

The **add_stream** function allows you to create a stream. It will create the actual table in the database, as well as the streams metadata in the streams table.
	
### Parameters

<table class="table">
	<tr>
		<th>Parameter</th>
		<th width="30px">Required?</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td width="25%"><var>stream_name</var></td>
		<td><img src="assets/img/tick.png" alt="Yes" /></td>
		<td>The full name of the stream.</td>
	</tr>
	<tr>
		<td><var>stream_slug</var></td>
		<td><img src="assets/img/tick.png" alt="Yes" /></td>
		<td>The stream slug.</td>
	</tr>
	<tr>
		<td><var>namespace</var></td>
		<td><img src="assets/img/tick.png" alt="Yes" /></td>
		<td>A namespace for your stream.</td>
	</tr>
	<tr>
		<td><var>prefix</var></td>
		<td></td>
		<td>Optional. A stream prefix. Will be used in the stream database table name.</td>
	</tr>
	<tr>
		<td><var>about</var></td>
		<td></td>
		<td>Optional. A short blurb about the stream.</td>
	</tr>
	<tr>
		<td><var>extra</var></td>
		<td></td>
		<td>Optional. An array of extra configuration variables (see below).</td>
	</tr>

</table>

The <var>$extra</var> array possible values are as follows. None of them are required. Note that with the exception of <var>title_column</var>, it is up to the module using these streams to implement these features. For instance, <dfn>get\_streams</dfn> will not automatically filter our streams that have <var>is\_hidden</var> set to <samp>yes</samp>, you as a developer will need to do that yourself.

<table class="table">
	<tr>
		<th width="20%">Name</th>
		<th width="20%">Default Value</th>
		<th width="25%">Type</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td><var>title_column</var></td>
		<td>null</td>
		<td>string</td>
		<td>A slug of the field that should be the title column. For more information on title columns, see the <a href="">something docs</a>.</td>
	</tr>
	<tr>
		<td><var>is_hidden</var></td>
		<td>no</td>
		<td>string (<dfn>yes</dfn> or <dfn>no<dfn>)</td>
		<td>This will hide the stream from any stream listings that support is_hidden.</td>
	</tr>
	<tr>
		<td><var>sorting</var></td>
		<td>title</td>
		<td>string (<dfn>title<dfn> or <dfn>custom</dfn>)</td>
		<td>This determines the entry sorting where supported. <dfn>title</dfn> will sort the title column DESC, and <dfn>custom</dfn> will sort by the <dfn>ordering_count</dfn> column DESC.</td>
	</tr>
	<tr>
		<td><var>menu_path</var></td>
		<td>null</td>
		<td>string</td>
		<td>Menu path where supported. Takes a simple string with the main and sub menu seprated by a forward slash. Ex: <samp>Content / FAQs</samp>.</td>
	</tr>
	<tr>
		<td><var>view_options</var></td>
		<td>array('id', 'created')</td>
		<td>array</td>
		<td>An array of field slugs that can be used when listing entries to control which fields are being displayed.</td>
	</tr>

</table>

### Example:

In this example we add the FAQ stream. The module is also called <samp>faqs</samp>, our namespace is called <samp>faq</samp>. We are providing the <samp>faq_</samp> prefix, so our table will be created as <samp>default\_faq\_faqs</samp> (sitename, prefix and slug concatenated). Without specifying any prefix, it would be <samp>default\_faqs</samp> (sitename and slug concatenated).

	$this->streams->streams->add_stream('FAQ', 'faqs', 'faq', 'faq_', null);

## get_stream

	get_stream($stream, $namespace = null)

Gets data about a stream. It does not retrieve entries, just the stream metadata.
	
### Example:

	// Stream String
	$this->streams->streams->get_stream('faqs', 'faq');

	// Stream Object
	$this->streams->streams->get_stream($faq_stream);

	// Stream Id
	$this->streams->streams->get_stream(2);

Example Return:
	
	stdClass Object
	(
	    [id] => 18
	    [stream_name] => FAQs
	    [stream_slug] => faqs
	    [stream_namespace] => faq
	    [stream_prefix] => faq_
	    [about] => 
	    [view_options] => Array
	        (
	            [0] => id
	            [1] => created
	        )
	
	    [title_column] => question
	    [sorting] => title
	)

## get_streams

	get_streams($namespace)

Gets basic data about all the streams in a namespace.

### Example:

	$this->streams->streams->get_streams('faq');
	
Returns:

	Array
	(
	    [0] => stdClass Object
	        (
	            [id] => 18
	            [stream_name] => FAQs
	            [stream_slug] => faqs
	            [stream_namespace] => faq
	            [stream_prefix] => faq_
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

## update_stream

	update_stream($stream, $namespace = null, $data = array())

Allows you to update stream metadata. This function will take any of the parameters of <dfn>add\_stream</dfn> (including values in the <var>$extra</var> array) and update the stream accordingly. Any changes in the stream <dfn>prefix</dfn> or <dfn>slug</dfn> will result in the stream table being renamed.

Returns boolean.

### Example:

	$update_data = array(
		'stream_slug'	=> 'the_faqs',
		'about'			=> 'A list of frequently asked questions.',
		'view_options'	=> array('question')
	);
	
	$this->streams->streams->update_stream('faqs', 'faq', $update_data);

## delete_stream

	delete_stream($stream_slug, $namespace = null)

Deletes a stream. This will delete all the entries associated with this stream as well, as well as run all of the field destruct functions for fields assigned to this stream.

This streams returns true or false, based on whether the streams was successfully deleted.
		
### Example:

	$this->streams->streams->delete_stream('faqs', 'faq');

## get_assignments

	get_assignments($stream, $namespace = null)

Gets assignments for a stream.

### Example:

	$this->streams->streams->get_assignments('faqs', 'faq');
	
Returns:

	Array
	(
	    [0] => stdClass Object
	        (
	            [id] => 10
	            [stream_name] => FAQs
	            [stream_slug] => faqs
	            [stream_namespace] => faq
	            [stream_prefix] => faq_
	            [about] => 
	            [title_column] => question
	            [sorting] => title
	            [stream_view_options] => a:2:{i:0;s:2:"id";i:1;s:7:"created";}
	            [stream_id] => 18
	            [field_id] => 10
	            [field_name] => Question
	            [field_slug] => question
	            [field_namespace] => faq
	            [field_type] => text
	            [field_data] => a:1:{s:10:"max_length";i:200;}
	            [field_view_options] => 
	        )
	
	    [1] => stdClass Object
	        (
	            [id] => 11
	            [stream_name] => FAQs
	            [stream_slug] => faqs
	            [stream_namespace] => faq
	            [stream_prefix] => faq_
	            [about] => 
	            [title_column] => question
	            [sorting] => title
	            [stream_view_options] => a:2:{i:0;s:2:"id";i:1;s:7:"created";}
	            [stream_id] => 18
	            [field_id] => 11
	            [field_name] => Answer
	            [field_slug] => answer
	            [field_namespace] => faq
	            [field_type] => textarea
	            [field_data] => a:0:{}
	            [field_view_options] => 
	        )
	)