<div id="top"></div>

# Core Field Types

PyroCMS comes with a variety of field types in the Streams Core module that you can count on being available in PyroCMS 2.1 and above for your module.

Additionally, you can develop your own field types and add them to the addons folders inside a "field_type" folder. The Streams Type library will automatically look for them there.

Below is a reference of all the core PyroCMS field types.

* {{ docs:id_link title="Choice" }}
* {{ docs:id_link title="Country" }}
* {{ docs:id_link title="Date Time" }}
* {{ docs:id_link title="Email" }}
* {{ docs:id_link title="Encrypt" }}
* {{ docs:id_link title="File" }}
* {{ docs:id_link title="Image" }}
* {{ docs:id_link title="Integer" }}
* {{ docs:id_link title="Pyro Lang" }}
* {{ docs:id_link title="Relationship" }}
* {{ docs:id_link title="Slug" }}
* {{ docs:id_link title="US State" }}
* {{ docs:id_link title="Text" }}
* {{ docs:id_link title="Textarea" }}
* {{ docs:id_link title="URL" }}
* {{ docs:id_link title="User" }}
* {{ docs:id_link title="WYSIWYG" }}
* {{ docs:id_link title="Year" }}

## Choice

The choice field type allows you to make drop downs, radio buttons, or check boxes.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>choice</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>VARCHAR or TEXT for checkboxes</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores the chosen value (key) or a newline-separated list of selected values for checkboxes.</td>
	</tr>
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>choice_data</td>
		<td>A string of available choices, one on each line. They can either be simple values, or you can specify a key => value pair by separating them with a colon surrounded by 2 space. So, you could have y : Yes. Values can be language keys when prefixed by lang:.</td>
	</tr>
	<tr>
		<td>choice_type</td>
		<td>The type of input you want to use. Accepted values are dropdown, radio, and checkboxes.</td>
	</tr>
	<tr>
		<td>default_value</td>
		<td>For radio and dropdown this is the default value (or key, if you are using keys). For checkboxes, you can have multiple default values by putting them on separate lines.</td>
	</tr>
</table>

## Country

The country field type creates a dropdown list of countries to choose from.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>country</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>VARCHAR</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores the country code.</td>
	</tr>
</table>

## Date Time

The date/time field type stores date and time information. You can choose to just store the date, or store the date and time.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>datetime</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>DATE, DATETIME, or INT, depending on the storage option and choice to record time or just the date.</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores the timestamp in the column type format.</td>
	</tr>
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Values</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>start_date</td>
		<td></td>
		<td>See the "Start/End Parameters" section below.</td>
	</tr>
	<tr>
		<td>end_date</td>
		<td></td>
		<td>See the "Start/End Parameters" section below.</td>
	</tr>
	<tr>
		<td>use_time</td>
		<td>'yes' or 'no'</td>
		<td>Whether or not to save the time along with the date..</td>
	</tr>
	<tr>
		<td>storage</td>
		<td>'datetime' or 'unix'</td>
		<td>Date/time values can either be stored as a unix timestamp or a MySQL date/time format.</td>
	</tr>
	<tr>
		<td>input_type</td>
		<td>'datepicker' or 'dropdown'</td>
		<td>Option to either use the jQuery datepicker or a series of drop downs for picking.</td>
	</tr>
</table>

### Start/End Parameters

You can specify what date range that the user can select from by specifying the number of weeks, days, months, and years relative to the current date. You can specify them in the following format:

	+1D +2W +2M +4Y

If you set this as the end_date, the user would be able to select a date up until 1 day. 2 weeks, 2 months, and 4 years into the future. You can use just one or any combination of the four. For instance, the following used for the start_date would allow the user to select a date 18 years before the current date.

	-18Y

## Email

The email field type is similar to the text field, but adds validation for a valid email address and uses the HTML5 email input type that optimizes email input for mobile devices.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>email</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>VARCHAR</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores the email address.</td>
	</tr>
	<tr>
		<td>Validation</td>
		<td>Checks to make sure it is a valid email address.</td>
	</tr></table>

## Encrypt

The encrypt field type stores a string as encrypted data in the database and decrypts it for output. Uses the CodeIgniter encryption library to encrypt the date and decrypt it before output.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>encrypt</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>BLOB</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores the encrypted string.</td>
	</tr>
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Values</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>hide_typing</td>
		<td>'yes' or 'no'</td>
		<td>If set to yes, the form input will be a password input instead of a regular text box.</td>
	</tr>
</table>

## File

The file field type allows you to upload and link to a file.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>file</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>INT</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores the file id of a file in the files module.</td>
	</tr>
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>folder</td>
		<td>Interfaces with the PyroCMS files module. Create an upload folder in the files module and select it here using the folder&#39;s id.</td>
	</tr>
        <tr>
		<td>allowed_types</td>
		<td>Allowed types separated by pipe characters. Ex: doc|pdf.</td>
	</tr>
</table>

## Image

The file field type allows you to upload and link to a file.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>image</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>INT</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>The image field type allows you to upload and resize an image.</td>
	</tr>
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>folder</td>
		<td>Interfaces with the PyroCMS files module. Create an upload folder in the files module and select it here using the folder&#39;s id.</td>
	</tr>
        <tr>
		<td>resize_width</td>
		<td>Number of pixels to resize the image to width-wise. Can be left blank.</td>
	</tr>
        <tr>
		<td>resize_height</td>
		<td>Number of pixels to resize the image to height-wise. If left blank while the Resize Width field is filled, this will be calculated based on the dimensions of the image.</td>
	</tr>
        <tr>
		<td>allowed_types</td>
		<td>Allowed types separated by pipe characters. Ex: jpg|gif|png.</td>
	</tr>
</table>

## Integer

The file field type allows you store an Integer value.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>integer</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>INT</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores an Integer.</td>
	</tr>
        <tr>
		<td>Validation</td>
		<td>Checks to make sure it is an Integer.</td>
	</tr>
        
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>max_length</td>
		<td>Maximum characters of the integer.</td>
	</tr>
        <tr>
		<td>default_value</td>
		<td>Specify the value that will be used if none is provide.</td>
	</tr>
</table>

## Pyro Lang

Shows a drop down of languages to choose from. You can filter them by available languages for the current theme.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>pyro_lang</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>VARCHAR</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores a language selection.</td>
	</tr>
        
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
                <th>Value</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>filter_theme</td>
		<td>'yes' or 'no'</td>
                <td>Whether or not to filter language list by available languages for a theme.</td>
	</tr>
</table>

## Relationship

The relationship field type allows you to link streams together by allowing you to choose an entry from another stream as an input, and have access to all the data from the connected entry on the front end.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>relationship</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>INT</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores relationship between streams</td>
	</tr>
        
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>choose_stream</td>
                <td>The stream ID to pull the relationship entry from. (Caution : This is not the Stream Slug )</td>
	</tr>
</table>

## Slug

The slug field allows you to automatically generate a slug from another text field.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>slug</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>VARCHAR</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores a slug</td>
	</tr>
        
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>space_type</td>
                <td>Allows you to choose the character that replaces whitespace.</td>
	</tr>
        <tr>
		<td>slug_field</td>
                <td>The field that we should create a slug for.</td>
	</tr>
</table>

## US State

The state field type creates a dropdown list of US states to choose from.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>state</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>VARCHAR</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores value from state dropdown.</td>
	</tr>
        
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>state_display</td>
		<td>Allows you to choose between showing the full state name (ex: Florida) or the abbreviated version (ex: FL).</td>
	</tr>
</table>

## Text

The simplest type of field, the text field allows you to enter in simple text data.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>text</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>VARCHAR</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores a string of text.</td>
	</tr>
        
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>max_length</td>
		<td>Maximum length of the input. Defaults to 255 if blank.</td>
	</tr>
        <tr>
		<td>default_value</td>
		<td>Specify the value that will be used if none is provide.</td>
	</tr>
</table>

## Textarea

The textarea field type allows you to enter in large blocks of text.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>textarea</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>LONGTEXT</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores a large body text.</td>
	</tr>
        
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
        <tr>
		<td>default_value</td>
		<td>Specify the value that will be used if none is provide.</td>
	</tr>
</table>

## URL

The URL field type allows you to enter a URL for a website.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>url</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>VARCHAR</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores a url.</td>
	</tr>
        <tr>
		<td>Validation</td>
		<td>Checks if URL is in a valid format EX: http://example.com.</td>
	</tr>
        
</table>

## User

The user field type allows you to choose and return data for a user.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>user</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>INT</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores the id of a user.</td>
	</tr>
        
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
        <tr>
		<td>restrict_group</td>
		<td>Allows restriction of the choice of user to a group.</td>
	</tr>
</table>

## WYSIWYG

The WYSIWYG field creates a PyroCMS WYSIWYG text editor.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>wysiwyg</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>LONGTEXT</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores content from the WYSIWYG editor.</td>
	</tr>
        
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
                <th>Default</th>
		<th>Description</th>
	</tr>
        
        <tr>
		<td>editor_type</td>
                <td>simple</td>
		<td>You can choose between a simple or advanced editor.</td>
	</tr>
</table>

## Year

The Year field type creates a dropdown of years for you.

### Type Info

<table>
	<tr>
		<td width="30%">Slug</td>
		<td>year</td>
	</tr>
	<tr>
		<td>Column Type</td>
		<td>CHAR</td>
	</tr>
        <tr>
		<td>Column Constraint</td>
		<td>4</td>
	</tr>
	<tr>
		<td>Column Storage</td>
		<td>Stores the year as a 4 digit integer.</td>
	</tr>
        <tr>
		<td>Validation</td>
		<td>Checks if is an Integer.</td>
	</tr>
        
</table>

### Extra Parameters

<table>
	<tr>
		<th width="30%">Parameter</th>
		<th>Description</th>
	</tr>
        
        <tr>
		<td>start_year</td>
		<td>Specifies the year the dropdown should start with.</td>
	</tr>
       <tr>
		<td>end_year</td>
		<td>Specifies the year the dropdown should stop at.</td>
	</tr> 
</table>
