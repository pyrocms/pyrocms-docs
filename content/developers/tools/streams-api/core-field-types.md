# Core Field Types

PyroCMS comes with a variety of field types in the Streams Core module that you can count on being available in PyroCMS 2.2 and above for your module.

Additionally, you can develop your own field types and add them to the addons folders inside a "field_type" folder. The Streams Type library will automatically look for them there.

Below is a reference of all the core PyroCMS field types.

* {{ link uri="developers/tools/streams-api/core-field-types#choice" title="Choice" }}
* {{ link uri="developers/tools/streams-api/core-field-types#country" title="Country" }}
* {{ link uri="developers/tools/streams-api/core-field-types#datetime" title="Date/Time" }}
* {{ link uri="developers/tools/streams-api/core-field-types#email" title="Email" }}
* {{ link uri="developers/tools/streams-api/core-field-types#encrypt" title="Encrypt" }}
* {{ link uri="developers/tools/streams-api/core-field-types#file" title="File" }}
* {{ link uri="developers/tools/streams-api/core-field-types#image" title="Image" }}
* {{ link uri="developers/tools/streams-api/core-field-types#integer" title="Integer" }}
* {{ link uri="developers/tools/streams-api/core-field-types#pyro_lang" title="Pyro Lang" }}
* {{ link uri="developers/tools/streams-api/core-field-types#relationship" title="Relationship" }}
* {{ link uri="developers/tools/streams-api/core-field-types#slug" title="Slug" }}
* {{ link uri="developers/tools/streams-api/core-field-types#us_state" title="US State" }}
* {{ link uri="developers/tools/streams-api/core-field-types#text" title="Text" }}
* {{ link uri="developers/tools/streams-api/core-field-types#textarea" title="Textarea" }}
* {{ link uri="developers/tools/streams-api/core-field-types#url" title="URL" }}
* {{ link uri="developers/tools/streams-api/core-field-types#user" title="User" }}
* {{ link uri="developers/tools/streams-api/core-field-types#wysiwyg" title="WYSIWYG" }}
* {{ link uri="developers/tools/streams-api/core-field-types#year" title="Year" }}

<h2 id="choice">Choice</h2>

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

<h2 id="country">Country</h2>

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

<h2 id="datetime">Date/Time</h2>

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

<h2 id="email">Email</h2>

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

<h2 id="encrypt">Encrypt</h2>

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
