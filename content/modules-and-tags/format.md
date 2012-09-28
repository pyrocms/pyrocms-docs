# Format Tags

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