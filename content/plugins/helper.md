# Helper Plugin

The _helper_ plugin handles useful little things like formatting, language strings, and counting.

## helper:lang

	{{ noparse }}{{ helper:lang }}{{ /noparse }}
	
Displays a language string from the current language.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">line</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>The array key of the language string that you wish to display.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ helper:lang line="global:control-panel" }}{{ /noparse }}

Returns (if the current language is English):

	"Control Panel"

## helper:config

	{{ noparse }}{{ helper:config }}{{ /noparse }}
	
Displays a configuration item.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">item</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>The config item to display.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ helper:config item="default_language" }}{{ /noparse }}

Returns (if the default language is English):

	"en"

## helper:date

	{{ noparse }}{{ helper:date }}{{ /noparse }}
	
Displays a date in the format defined in **Control Panel &rarr; Settings** or in the format specified.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">format</td>
			<td width="100">Set in <strong>CP &rarr; Settings</strong></td>
			<td width="100">No</td>
			<td>The date using <a href="http://php.net/manual/en/function.date.php">php date formatting</a>.</td>
		</tr>
		<tr>
			<td width="100">timestamp</td>
			<td width="100">Current time</td>
			<td width="100">No</td>
			<td>Pass an epoch or MySQL timestamp to format a date in the past or future.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ helper:date format="m/d/Y" }}{{ /noparse }}

Returns:

    The current date in "04/20/2012" format.

### Example

	{{ noparse }}{{ blog:posts }}
    Title: {{ title }}
    Posted On: {{ helper:date format="d/m/Y" timestamp=created_on }}
{{ /blog:posts }}{{ /noparse }}

Returns:

	Title: Test Blog Post
    Posted On: 31/01/2012

## helper:gravatar

	{{ noparse }}{{ helper:gravatar }}{{ /noparse }}
	
Displays an avatar linked to the provided email address at gravatar.com

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">email</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>The email linked to the avatar.</td>
		</tr>
		<tr>
			<td width="100">size</td>
			<td width="100">50</td>
			<td width="100">No</td>
			<td>The width of the image, in pixels.</td>
		</tr>
		<tr>
			<td width="100">rating</td>
			<td width="100">g</td>
			<td width="100">No</td>
			<td>The content rating of the avatar.</td>
		</tr>
		<tr>
			<td width="100">url-only</td>
			<td width="100">false</td>
			<td width="100">No</td>
			<td>Fetch the url only or a complete image tag.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ helper:gravatar email="test@pyrocms.com" }}{{ /noparse }}

## helper:count

	{{ noparse }}{{ helper:count }}{{ /noparse }}
	
Count the number of items being output in a tag loop

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">indentifier</td>
			<td width="100">default</td>
			<td width="100">No</td>
			<td>An identifier to make each counter unique if using multiple counters on the same site.</td>
		</tr>
		<tr>
			<td width="100">start</td>
			<td width="100">1</td>
			<td width="100">No</td>
			<td>The number to start counting at.</td>
		</tr>
		<tr>
			<td width="100">mode</td>
			<td width="100">add</td>
			<td width="100">No</td>
			<td>Whether to add or subtract from the start number.</td>
		</tr>
		<tr>
			<td width="100">return</td>
			<td width="100">true</td>
			<td width="100">No</td>
			<td>Output the count result on each loop or just increment the counter silently.</td>
		</tr>
	</tbody>
</table>

### Example 

    {{ noparse }}{{ blog:posts }}
        {{ helper:count mode="subtract" start="10" }} -- {{ title }}
{{ /blog:posts }}

Outputs:

    10 -- This is an example title
     9 -- This is another title


You can add a second counter to a page by setting a unique identifier:
{{ files:listing folder="foo" }}
    {{ helper:count identifier="files" return="false" }}
    {{ name }} -- {{ slug }}
{{ /files:listing }}

You have {{ helper:show_count identifier="files" }} files. {{ /noparse }}

## helper:show_count

A helper tag that works together with the above tag as shown in its last example. It can be placed anywhere on 
the page after the counter and it will only display the value without incrementing the count.

## helper:[function]

	{{ noparse }}{{ helper:[function] }}{{ /noparse }}
	
Executes a whitelisted PHP function on your data. Attributes are passed to the function as arguments.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">[wildcard]</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>You must pass the arguments that the function requires as attributes. The attribute name is discarded.</td>
		</tr>
	</tbody>
</table>

### Example 

In this example we will assume that the variable {{ html }} contains this string: '&lt;div class="test"&gt;My Test is %s&lt;/div&gt;'

    // note that you could name the attribute anything you want here. I used "value" as that is explanatory
    {{ noparse }}{{ helper:strip_tags value=html }}{{ /noparse }}

Returns:

    My Test is %s

Now we'll use sprintf and pass both the string and the value as sprintf requires at least two arguments.

    {{ noparse }}{{ helper:sprintf string=html status="Complete" }}{{ /noparse }}

Returns:

    My Test is Complete

### Allowed Functions

The functions that can be used are defined in system/cms/config/parser.php

This is the current list:

 * character\_limiter
 * count
 * count\_chars
 * empty
 * explode
 * format\_date
 * html\_entity\_decode
 * htmlentities
 * htmlspecialchars
 * htmlspecialchars\_decode
 * implode
 * is\_array
 * is\_int
 * is\_integer
 * is\_string
 * isset
 * ltrim
 * md5
 * money\_format
 * number\_format
 * preg\_match
 * preg\_replace
 * rtrim
 * sprintf
 * str\_replace
 * str\_word\_count
 * strip\_tags
 * strpos
 * strtolower
 * strtoupper
 * substr
 * trim
 * ucfirst
 * ucwords
 * word\_censor
 * word\_limiter
 * wordwrap