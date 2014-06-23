# Streams API Entries Driver

The entries driver is used to get entries from a stream. Entries are the rows in your stream.

You can call the entries driver like this:

	$this->load->driver('Streams');
	$this->streams->entries->function();

## get_entries(<var>$params, $pagination\_config = array()</var>)

The get_entries function allows you to pull entries from a streams table. This will run all of the entries through the various formatting and filtering that each field type has.

### $params

The params array contains all of the data to affect what data you get back from the get_entries function. The only two parameters that are required are **stream** and **namespace**.

	$params = array(
		'stream'    => 'faqs',
		'namespace' => 'faq'
	);
	
	$entries = $this->streams->entries->get_entries($params);

Here is a full list of parameters and what they do:

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
	<tr> 
		<th width="130">Parameter</th> 
		<th width="70">Type</th> 
		<th width="90">Default</th> 
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
		<td>The field to run date parameters through. This is the field that is used when using other time-based result restrictions such as <em>show_upcoming</em>.</td> 
	</tr> 
	<tr>
		<td>year</td>
		<td>int</td>
		<td></td> 
		<td>Restrict results to a year (uses the <em>date_by</em> field).</td> 
	</tr> 
	<tr>
		<td>month</td>
		<td>int</td>
		<td></td> 
		<td>Restrict results to a month (uses <em>date_by</em> field). Takes the numerical month value.</td> 
	</tr> 
	<tr> 
		<td>day</td>
		<td>int</td>
		<td></td> 
		<td>Restrict results to a day (uses the <em>date_by</em> field). Takes a numerical day value.</td> 
	</tr> 
	<tr> 
		<td>show_upcoming</td>
		<td>'yes' or 'no'</td>
		<td>yes</td>
		<td>Choose yes or no to show entries dated in the future (uses the <em>date_by</em> field).</td> 
	</tr> 
	<tr> 
		<td>show_past</td> 
		<td>'yes' or 'no'</td>
		<td>yes</td> 
		<td>Choose yes or no to show entries dated in the past (uses the <em>date_by</em> field).</td> 
	</tr> 
	<tr> 
		<td>where</td>
		<td>string</td>
		<td></td> 
	<td>Allows you to specify a where parameter using the following structure: <em>field_slug = 'value'</em>.</td> 
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
	<tr> 
		<td>paginate</td>
		<td>string</td>
		<td>'yes' or 'no' (default is 'no')</td>
		<td>Allows you to enable pagination (generate a string with page navigation links). Pagination feature is tied to the <em>pag_segment</em> option below</td> 
	</tr>
	<tr> 
		<td>pag_segment</td>
		<td>int</td>
		<td>2</td>
		<td>Indicate which uri segment the CI pagination helper have to look into, to get the target page index. For instance, in the "http://my.app.com/controller/method/page_index", the pag_segment should be 3 ( 1 refers to 'controller', and 2 refers to 'method'</td> 
	</tr>
	</tbody> 
</table>

### $pagination_config

Streams uses identical pagination config to the [CodeIgniter pagination parameters](http://ellislab.com/codeigniter/user-guide/libraries/pagination.html). You usually won't need to touch these if you are displaying your pagination in the control panel.

### Return Format

The `get_entries()` function will return an array with several values:

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
		<td>The pagination code if you are using pagination (need to set <em>paginate</em> and <em>pag_segment</em> options)</td>
	</tr> 
	<tr> 
		<td>total</td>
		<td>int</td>
		<td>Total results (total, not just based on current page)</td>
	</tr>
</table>

## get\_entry(<var>$entry\_id, $stream\_slug, $namespace\_slug, $format = true</var>)

The `get_entry()` function allows you to get a single entry. If you'd like to bypass the streams formatting, you can set the fourth parameter to `false`.

## delete\_entry(<var>$entry\_id, $stream\_slug, $namespace\_slug</var>)

Allows you to delete an entry.

## insert\_entry(<var>$entry\_data, $stream\_slug, $namespace\_slug, $skips = array(), $extra = array()</var>)

Allows you to add an entry in a stream.

### $entry\_data

The **$entry\_data** parameter is an array of values for each field. This data is not run through any field validation (for required, unique, etc). Keep in mind that many field types have a **pre\_save** function that formats data before it gets to the database columns.

### $skips

The **$skips** parameter is an array of field slugs that you would like streams to ignore. These fields will not be processed to included in the entry.

### $extra

The **$extra** parameter is an associative array of data to be added to the database by bypassing any field formatting. For instance, if you have a field that you added to your streams table without using a field and field type, you could include that data there, and the `insert_entry` function would simply add it to the data to be inserted.

### Example

	$entry_data = array(
		'question' => 'Why is the sky blue?',
		'answer'   => 'Because of science.'
	);
	$this->streams->entries->insert_entry($entry_data, 'faqs', 'faq');

In this example, we have extra data.

	$entry_data = array(
		'question' => 'Why is the sky blue?',
		'answer'   => 'Because of science.'
	);
	$this->streams->entries->insert_entry($entry_data, 'faqs', 'faq', array(), array('not_added_by_streams' => 'extra value'));

## update\_entry(<var>$entry\_id, $entry\_data, $stream, $namespace, $skips=array(), $extra = array(), $include\_only\_passed = true</var>)

Allows you to update an entry in the stream. Identical to `insert_stream`, except the first parameter is the id of the entry you want to update.

	$entry_data = array(
			'answer'	=> 'Because of magic.'
		);
	$this->streams->entries->update_entry(2, $entry_data, 'faqs', 'faq');
	
### $include\_only\_passed

The **$include\_only\_passed** parameter is a boolean indicating whether or not fields should be modified if they are not present in the `$entry_data` array. It defaults to `true`, so only the included fields are modified. If set to `false`, any fields not in the `$entry_data` array will be updated to **NULL** in the database.
