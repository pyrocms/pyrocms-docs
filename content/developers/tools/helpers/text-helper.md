# Text Helper

This helper adds functionality not available in the [CodeIgniter Text Helper](http://ellislab.com/codeigniter/user-guide/helpers/text_helper.html).

## Functions

### escape_tags($string)

Replaces any `{` or `}` characters with HTML entities to prevent parsing.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>string</td>
			<td></td>
			<td>Yes</td>
			<td>A string containing parser tags</td>
		</tr>
	</tbody>
</table>

	// usage
	escape_tags('{{noparse}}Hello, my name is {{ name }}.{{/noparse}}');
	
	// output
	'Hello, my name is &#123;&#123; name &#125;&#125;.'

### process\_data\_jmr1($text = '')

Minifies content by stripping out whitespace, etc. Used by the __Template__ library when minifying output is enabled.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>text</td>
			<td></td>
			<td>Yes</td>
			<td>A string to minify. Most likely HTML code.</td>
		</tr>
	</tbody>
</table>

	// usage
	$html = <<< HTML
	<html>
	<head>
		<title>Page Title</title>
	</head>
	<body>
		<p>This is the page content!</p>
	</body>
	</html>
	HTML;
	
	$result = process_data_jmr1($html);
	
	// $result
	'<html> <head> <title>Page Title</title> </head> <body> <p>This is the page content!</p> </body> </html>'