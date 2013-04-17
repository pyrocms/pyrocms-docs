# WYSIWYG Field Type
 
The WYSIWYG field type creates a PyroCMS WYSIWYG text editor.
 
## Parameters
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="100"> 
				Parameter</th> 
			<th width="100"> 
				Default</th> 
			<th> 
				Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td>Editor Type</td> 
			<td>simple</td> 
			<td>You can choose between a simple or advanced editor.</td> 
		</tr> 
</tbody> 
</table> 
 
## Output
 
The WYSIWYG field outputs the requested WYSIWYG editor.
 
## Entry Form Usage 
 
To use the WYSIWYG field type on your site using the entry form, you must provide the proper assets to be able to load the editor. PyroStreams makes this easy by providing a tag that generates this data. To call the WYSIWYG editor assets, use this tag somewhere in your code:
 
	{{ noparse }}{{ streams:form_assets fields="wysiwyg" }}{{ /noparse }}
