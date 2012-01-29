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

	$this->streams->streams->add_stream('Recipes', 'recipes', 'recipes', NULL, 'Our recipes');

## get_stream(<var>$stream\_slug, $namespace</var>)

Gets data about a stream. It does not retrieve entries, just the stream metadata.
	
### Example:

	$this->streams->streams->get_stream('recipes', 'recipes');

Returns:
	
	stdClass Object
	(
	    [id] => 16
	    [stream_name] => Recipes
	    [stream_slug] => recipes
	    [stream_namespace] => recipes
	    [stream_prefix] => 
	    [about] => Our recipes
	    [view_options] => Array
	        (
	            [0] => id
	            [1] => created
	        )
	
	    [title_column] => 
	    [sorting] => title
	)
	
<div class="tip"><strong>Note:</strong> The view options column is an array of the columns that are shown when listing entries in a table. 'id' and 'created' are the default values.</div>

## get_streams(<var>$namespace</var>)

Gets basic data about all the streams in a namespace.

### Example:

	$this->streams->streams->get_streams('recipes');
	
Returns:

	Array
	(
	    [0] => stdClass Object
	        (
	            [id] => 16
	            [stream_name] => Recipes
	            [stream_slug] => recipes
	            [stream_namespace] => recipes
	            [stream_prefix] => 
	            [about] => Our recipes
	            [view_options] => Array
	                (
	                    [0] => id
	                    [1] => created
	                )
	
	            [title_column] => 
	            [sorting] => title
	        )
	)

## update_stream(<var>$stream, $namespace, $data</var>)

Allows you to update basic stream metadata. You can pass any stream metadata value and it will handle the necessary changes, so you can give it a new stream slug and it will update the metadata and update the table name. Returns BOOL.

### Example:

	$data = array(
		'stream_slug'	=> 'le_recipes',
		'about'			=> 'A list of recipes',
		'view_options'	=> serialize(array('name'))
	);
	
	$this->streams->streams->update_stream('recipes', 'recipes', $data);

## delete_stream(<var>$stream\_slug, $namespace</var>)

Deletes a stream. This will delete all the entries associated with this stream as well, as well as run all of the field destruct functions for fields assigned to this stream.

This streams returns TRUE or FALSE, based on whether the streams was successfully deleted.
		
### Example:

	$this->streams->streams->delete_stream('recipes', 'recipes');

## get_assignments(<var>$stream, $namespace</var>)

Gets assignments for a stream. More information forthcoming.