# Markdown Helper

Some Markdown helper functions to interact with the [Markdown syntax](http://daringfireball.net/projects/markdown/). We use the [PHP Markdown](http://michelf.com/projects/php-markdown/) version of Markdown.

## Functions


### parse_markdown($markdown)

Parse a block of markdown and get HTML back.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>markdown</td>
			<td></td>
			<td>Yes</td>
			<td>A <strong>Markdown</strong> formatted string</td>
		</tr>
	</tbody>
</table>

	// usage
	parse_markdown("Let's convert this _text_ to **Markdown**.");
	
	// output
	"<p>Let's convert this <em>text</em> to <strong>Markdown</strong>.</p>"