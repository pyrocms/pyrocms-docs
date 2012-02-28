# Streams API Utilities Driver

The utilities driver is used to run uncommon streams functions that usually have to do with data setup and teardown.

You can call the entries driver like this:

	$this->streams->utilities->function();

## remove\_namespace(<var>$namespace\_slug</var>)

The **remove\_namespace()** function with destroy all data associated with a namespace. This includes:

* Streams metadata in the namespace
* Fields metadata in the namespace
* Streams tables in the namespace

Obviously, this should be used with caution!

## convert\_table\_to\_stream(<var>$table\_slug, $namespace\_slug, $prefix, $stream\_name, $about = NULL, $title\_column = NULL, $view\_options = array('id', 'created')</var>)

The **convert\_table\_to\_stream()** function takes an existing table and creates the streams metadata for it based on the given parameters.

This will add each of the four standard streams fields:

* created
* updated
* created_by
* ordering_count

<div class="tip"><strong>Note:</strong> The table you are converting to a stream needs to have an id field that is a primary key and auto incremented.</div> 

<div class="tip"><strong>Note:</strong> This function does not deal with the actual table columns. You'll need to do that in another function.</div> 

## convert\_column\_to\_field(<var>$stream_slug, $namespace, $field\_name, $field\_slug, $field\_type, $extra = array(), $assign\_data = array()</var>)

Allows you to take an existing column in a stream table that has not been added as a field, and convert it into a field. This simply creates the metadata around the field, it does nothing to the actual column in the table or its properties.

This is a useful function for when you are converting an existing table to a stream - you can convert the table to a stream, and then go through and convert all of the existing columns to fields.

The **$field\_slug** should be the same name as the column you are converting. The **$extra** array is extra field parameters, and the **$assign\_data** array allows you to pass these optional assignment parameters:

<table>
	<tr>
		<td width="25%"><strong>required</strong>
		<td>Boolean. Whether or not this field should be required. Defaults to false.</td>
	</tr>
	<tr>
		<td><strong>unique</strong>
		<td>Boolean. Whether or not this field should be unique in the stream. Defaults to false.</td>
	</tr>
	<tr>
		<td><strong>title_column</strong>
		<td>Boolean. Whether or not this field should be the title column. Defaults to false.</td>
	</tr>
	<tr>
		<td><strong>instructions</strong>
		<td>String. Instructions that will appear on the entry form next to this field.</td>
	</tr>
</table>