# Streams API Entries Driver

The entries driver is used to get entries (database table rows) from a stream.

You can call the entries driver like this:

	$this->load->driver('Streams');
	$this->streams->entries->function();

## get_entries(<var>$params, $pagination\_config = array()</var>)

The get_entries function allows you to pull entries from a streams table. This will run all of the entries through the various formatting and filtering that each field type has.

### $params

The params array contains all of the data to affect what data you get back from the get_entries function. The only two parameters that are required are **stream** and **namespace**.

	$params = array(
			'stream' 		=> 'faqs',
			'namespace'		=> 'streams_sample'
	);
	
	$entries = $this->streams->entries->get_entries($params);

Here is a full list of parameters and what they do:

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
	<tr> 
		<th width="150">Parameter</th> 
		<th width="150">Type</th> 
		<th width="150">Default</th> 
		<th></th> 
	</tr>
	</thead>
	<tbody> 
	<tr> 
		<td>stream</td>
		<td>string</td>
		<td></td>
		<td>Slug of the stream you want to get entries from.</td> 
	</tr> 
	<tr> 
		<td>namespace</td>
		<td>string</td>
		<td></td>
		<td>Namespace of the stream you want to get entries from.</td> 
	</tr> 
	<tr> 
		<td>limit</td>
		<td>int</td>
		<td></td>
		<td>Number of entries to limit the results to.</td> 
	</tr> 
	<tr> 
		<td>offset</td> 
		<td>int</td>
		<td></td> 
		<td>Number to offset the results by.</td> 
	</tr> 
	<tr>
		<td>order_by</td>
		<td>string</td>
		<td>created</td> 
		<td>Specify a field to order by.</td> 
	</tr> 
	<tr>
		<td>sort</td> 
		<td>string</td>
		<td>desc</td>
		<td>The sort order. Ascending (<em>asc</em>), descending (<em>desc</em>), or <em>random</em>.</td> 
	</tr> 
	<tr> 
		<td>date_by</td>
		<td>string</td>
		<td>created</td>
		<td>The field to run date parameters through. This is the field that is used when using other time-based result restrictions such as show_upcoming.</td> 
	</tr> 
	<tr>
		<td>year</td>
		<td>int</td>
		<td></td> 
		<td>Restrict results to a year (uses the date_by field).</td> 
	</tr> 
	<tr>
		<td>month</td>
		<td>int</td>
		<td></td> 
		<td>Restrict results to a month (uses date_by field). Takes the numerical month value.</td> 
	</tr> 
	<tr> 
		<td>day</td>
		<td>int</td>
		<td></td> 
		<td>Restrict results to a day (uses the date_by field). Takes a numerical day value.</td> 
	</tr> 
	<tr> 
		<td>show_upcoming</td>
		<td>'yes' or 'no'</td>
		<td>yes</td>
		<td>Choose yes or no to show entries dated in the future (uses the date_by field).</td> 
	</tr> 
	<tr> 
		<td>show_past</td> 
		<td>'yes' or 'no'</td>
		<td>yes</td> 
		<td>Choose yes or no to show entries dated in the past (uses the date_by field).</td> 
	</tr> 
	<tr> 
		<td>where</td>
		<td>string</td>
		<td></td> 
	<td>Allows you to specify a where parameter using the following structure: <em>field_slug==value</em>.</td> 
	</tr> 
	<tr> 
		<td>exclude</td>
		<td>string</td>
		<td></td>
		<td>IDs of entries to exclude separated by a pipe character (|). Ex: 1|4|7</td> 
	</tr> 
	<tr> 
		<td>exclude_called</td>
		<td>'yes' or 'no'</td>
		<td>no</td> 
		<td>Set to 'yes' to exclude entries that have already been called in the same page load.</td> 
	</tr> 
	<tr> 
		<td>disable</td>
		<td>string</td>
		<td></td>
		<td>Allows you to disable fields and their formatting. You can specify multiple fields by separating them with a pipe character (|). This is a useful if you want to bypass the extra work that streams does to format fields that you aren't using.</td> 
	</tr> 
	</tbody> 
</table>

### $pagination_config

Streams uses identical pagination config to the [CodeIgniter pagination parameters](http://codeigniter.com/user_guide/libraries/pagination.html). You usually won't need to touch these if you are displaying your pagination in the control panel.

### Return Format

The get_entries() function will return an array with several values:

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
	<tr> 
		<th width="150">Key</th> 
		<th width="150">Format</th> 
		<th></th> 
	</tr>
	</thead>
	<tbody> 
	<tr> 
		<td>entries</td>
		<td>array</td>
		<td>An array of the entries you wanted to return.</td>
	</tr> 
	<tr> 
		<td>pagination</td>
		<td>string</td>
		<td>The pagination code if you are using paginaton</td>
	</tr> 
	<tr> 
		<td>total</td>
		<td>int</td>
		<td>Total results (total, not just based on pagination)</td>
	</tr>
</table>

## get\_entry(<var>$entry\_id, $stream\_slug, $namespace\_slug, $format = true</var>)

The **get_entry()** function allows you to get a single entry. If you'd like to bypass the streams formatting, you can set the fourth parameter to FALSE.

## delete\_entry(<var>$entry\_id, $stream\_slug, $namespace\_slug</var>)

Allows you to delete an entry.

## insert\_entry(<var>$entry\_data, $stream\, $namespace,$skips=array(), $extra = array()</var>)

Allows you to add an entry in the stream. 

$entry_data  = array()
ex : 
	$data=array(
		"category-name"=>"test"
	);

$stream = int,slug,or object

$namespace = string

$skips = fiel slugs to skip

$extra = extra datat to add in