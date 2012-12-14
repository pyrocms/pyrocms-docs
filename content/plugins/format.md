# Format Plugin

The _format_ plugin allows you to format content with a specific processor, such as [Markdown](http://daringfireball.net/projects/markdown/syntax) or [Textile](http://www.textism.com/tools/textile/).


## format:markdown

	{{ noparse }}{{ format:markdown }}Let's _convert_ this to **HTML**.{{ /format:markdown }}{{ /noparse }}
	
Sends your content through the Markdown processor. 


### Example

#### Markdown formatting

	{{ noparse }}{{ format:markdown }}
_Format_ allows you to send your content through the **Markdown** processor.

Find out more about **Markdown** formatting on their website &lt;http://daringfireball.net/projects/markdown/syntax&gt;
{{ /format:markdown }}{{ /noparse }}

Returns:

	<p><em>Format</em> allows you to send your content through the <strong>Markdown</strong> processor.</p>

	<p>Find out more about <strong>Markdown</strong> formatting on their website <a href="http://daringfireball.net/projects/markdown/syntax">http://daringfireball.net/projects/markdown/syntax</a></p>




## format:textile

	{{ noparse }}{{ format:textile }}Let's _convert_ this to *HTML*.{{ /format:textile }}{{ /noparse }}
	
Sends your content through the Textile processor. 

### Example

#### Textile formatting

	{{ noparse }}{{ format:textile }}
_Format_ allows you to send your content through the *Textile* processor.

Find out more about *Textile* formatting on their website "http://www.textism.com/tools/textile/":http://www.textism.com/tools/textile/
{{ /format:textile }}{{ /noparse }}

Returns:

	<p><em>Format</em> allows you to send your content through the <strong>Textile</strong> processor.</p>
	
	<p>Find out more about <strong>Textile</strong> formatting on their website <a href="http://www.textism.com/tools/textile/">http://www.textism.com/tools/textile/</a></p>
	
	
## format:url_title

	{{ noparse }}{{ format:url_title string="Some Long Post Title" separator="-" lowercase="true" }}{{ /noparse }}
	
A shortcut to the [CodeIgniter URL Helper](http://codeigniter.com/user_guide/helpers/url_helper.html) `url_title($string, $separator, $lowercase)` function.

### Attributes

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
			<td>The string to process</td>
		</tr>
		<tr>
			<td>separator</td>
			<td>dash</td>
			<td>No</td>
			<td>Replace spaces or other special characters with this.</td>
		</tr>
    <tr>
			<td>lowercase</td>
			<td>false</td>
			<td>No</td>
			<td>Do you want to convert it to lowercase as well?</td>
		</tr>
	</tbody>
</table>

<p class="tip"><strong>Important:</strong> The params have to be in the correct order for this function to work. This function will act like the <code>{{noparse}}{{ helper:function }}{{/noparse}}</code> methods.</p>

### Example

#### Title to URL Safe conversion

	{{ noparse }}{{ format:url_title string="Some Long Post Title" separator="-" lowercase="true" }}{{ /noparse }}

Returns:

	"some-long-post-title"
