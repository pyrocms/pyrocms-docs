# Streams

* {{ docs:id_link title="Where to Get Streams" }}
* {{ docs:id_link title="Creating Fields" }}
* {{ docs:id_link title="Assigning Fields" }}
* {{ docs:id_link title="Default Columns" }}
* {{ docs:id_link title="Entry Ordering" }}
* {{ docs:id_link title="Displaying Your PyroStreams Data" }}
* {{ docs:id_link title="Streams Resources" }}

Many sites require data that is not in a page format. For instance – dates of live shows, lists of bands, or lists of pets. Each of these requires a data structure and a way to create, read, update, and delete entries.

In PyroStreams, each "list" of data is known as a "stream". So, a list of bands would be a stream. A list of live shows would be a stream. PyroStreams gives you the tools to create and manage those streams on the back end, and then gives you the tools to display that data on your website easily via PyroCMS page templates.

{{ docs:header }}Where to Get Streams{{ /docs:header }}

The Streams module is part of [PyroCMS Pro](https://www.pyrocms.com/store/details/pyrocms_professional) and is also available as a [standalone module](https://www.pyrocms.com/store/details/pyrostreams). Streams Core and the Streams API is available in the Community version of PyroCMS. For a primer on the different parts of streams, see the {{ link title="streams concept page" uri="concepts/streams" }}.

{{ docs:header }}Creating a Stream{{ /docs:header }}

To create a new stream, click **New Stream**. You'll be prompted to fill in four pieces of information.

<table>
	<tr>
		<th width="25%">Field</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Stream Name</td>
		<td>The full name for this stream. For example "Events" or "Our Products".</td>
	</tr>
	<tr>
		<td>Stream Slug</td>
		<td>A short name for this stream - lowercase with only certain characters allowed. This will be the string by which you refer to your stream, and also the name of the database table that will be created when the stream is created.</td>
	</tr>
	<tr>
		<td>Stream Prefix</td>
		<td>This is an optional prefix that will be used in the database if there is already a table with the name you'd like. For instance, if you want to create a stream with a slug of 'files', there is already a files table used by PyroCMS. You can add a prefix such as 'my_', and the table name will be my_files. You can still refer to your stream as 'files' in plugins and other places.</td>
	</tr>
	<tr>
		<td>About this Stream</td>
		<td>A simple description of your stream. Optional.</td>
	</tr>
</table>

### A Note About Namespaces

Namespaces are the streams concept that allow modules the freedom to use slugs for fields and stream without worrying about conflicts. Modules that use streams as their data structure will have a unique namespace. The streams module uses **streams** as its namespace.

{{ docs:header }}Creating Fields{{ /docs:header }}

In PyroStreams, fields are like columns in a spreadsheet. Only in PyroStreams, there are specific types of data for you to choose from that dictate how that data in the column is edited and displayed. You may need a plain text field (you can use the text field type for that), or a list of US States (you can use the US State field type for that).

Field types range in functionality from the extremely simple (text field) to the extremely complex (multiple relationships). They allow you to create the functionality you need to build data structures.

Like all streams-enabled modules, Streams usses the group of core field types that comes with PyroCMS, as well as any additional installed field types.

To create a field, go to the "Fields" section at the top of the page. There you'll be prompted to add a new field if you haven't done so already.

You'll need to give your field a name and a slug, as well as choose what type of field you want to create. Based on the field type, extra parameters might appear that allow you to customize the field's behavior or display.

{{ docs:header }}Sharing Fields{{ /docs:header }}

You’ll notice that fields are not specifically linked to their stream right away. This is because PyroStreams is built to allow you to share fields between streams. Instead of having to create a "Name" field over and over again, you can create one and assign it to more and one field.

This comes in handy for creating relationship fields. You can create a field, for instance, called "Band" that is a relationship link to the bands stream, and then use that in several streams to link to a band.

{{ docs:header }}Assigning Fields{{ /docs:header }}

Once you've created a stream and a field, you can now assign fields to a stream.

To do this, go into the Manage section of your stream, and click on Stream Field Assignments. Here you can choose from a list of available fields to add.

You can also choose some extra settings for this instance of your field. You can tell PyroStreams to make sure its value is unique within the stream, that it is required, and give notes that will appear on the edit and add forms. The following field are available.

<table>
	<tr>
		<th width="25%">Field</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Field is Required</td>
		<td>If you select this option, the user must enter a value for this field. This goes for files and images as well.</td>
	</tr>
	<tr>
		<td>Field is Unique</td>
		<td>If you select this option, the field's value will be compared to other entries in the stream to make sure it is unique. This is useful if you want to make a column a primary key, such an ID number. Obviously, this doesn’t work for data that can’t be accurately compared, like files and images.
</td>
	</tr>
	<tr>
		<td>Field Instructions</td>
		<td>This is a simple line of text that gives the end user a hint of how to enter data or what to enter. You could tell them to remember to include "The" or to include a dollar sign – anything that will help the user entering data.
 </td>
</tr>
	<tr>
		<td>Make field the Title Column</td>
		<td>Each stream should have a title column. This column is the field that most represents the data rows within each stream. Usually this is a name field or some other unique field. It is used to represent the rows of a field when displaying posts in a relationship drop down, among other things. You can always change the title column under the Stream Settings -> Edit Stream section.
</td>
	</tr>
</table>

{{ docs:header }}Default Columns{{ /docs:header }}

Each stream comes with some default columns that are always created and populated. You don't need to create these, and they are always available.

<table> 
	<thead> 
		<tr> 
		<th width="25%">Field</th>
			<th> 
				Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td> 
				ID</td> 
			<td> 
				Incremental numerical ID.</td> 
		</tr> 
		<tr> 
			<td> 
				created</td> 
			<td> 
				Date of when the entry was created.</td> 
		</tr> 
		<tr> 
			<td> 
				updated</td> 
			<td> 
				Date of when the entry was last updated.</td> 
		</tr> 
		<tr> 
			<td> 
				created_by</td> 
			<td> 
				ID of the user that created the entry. Returned as user data in the data cycle.</td> 
		</tr> 
	</tbody> 
</table> 

These fields can be used and displayed in templates and are automatically populated and dealt with behind the scenes, so you never have to create these.

{{ docs:header }}Ordering Fields{{ /docs:header }}

To edit the order in which your assigned fields appear, you can just drap and drop them when viewing them on the **Stream Field Asssignments** page.

{{ docs:header }}Entry Ordering{{ /docs:header }}

PyroStreams comes with two types of ordering built-in: **manual** and **automatic**. These two ordering modes affect how information is ordered on the back end when you look through it, as well as how it is ordered when you loop through it in your layouts.

Ordering is set to automatic by default once you have a title column. You can change the ordering mode under the stream admin panel, under Edit Stream

<div class="tip"><strong>Note:</strong> You can always break the default sort order in PyroStreams with the order_by and sort parameters in the cycle plugin.</div>

<table>
	<tr>
		<th width="25%">Field</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Automatic Ordering</td>
		<td>This ordering will sort your entries in ascending order using your title column.</td>
	</tr>
	<tr>
		<td>Manual Ordering</td>
		<td>This ordering allows you to sort your entries using a drag and drop interface.</td>
	</tr>
</table>

{{ docs:header }}PyroStreams Permissions{{ /docs:header }}

PyroStreams comes with two extra permission settings:

<table>
	<tr>
		<th width="25%">Setting</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Admin Streams</td>
		<td>This gives the user the ability to create streams and edit existing ones, including the ability to delete streams.</td>
	</tr>
	<tr>
		<td>Admin Fields</td>
		<td>This gives the user the ability to create and manage fields, including deleting fields.</td>
	</tr>
</table>

If you have a client you just want to have edit entries, and not have any control over the structure of those entries, you can just give them permission to access the module, without the permission to admin streams or fields. This way they can manage data without the risk of them accidentally deleting a stream or field.

{{ docs:header }}Displaying Your PyroStreams Data{{ /docs:header }}

Once you have your data structures set up, you'll want to display it in some form in your page layouts and templates. To do that, you can use the {{ link title="PyroStreams plugin" uri="plugin/streams" }}.

{{ docs:header }}Resources{{ /docs:header }}

* {{ link uri="developers/tools/streams-api" title="Streams API Docs" }}
* {{ link uri="developers/addons/developing-field-types" title="Developing Field Type Docs" }}