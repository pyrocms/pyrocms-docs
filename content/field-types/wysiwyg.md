# WYSIWYG Field Type

The WYSIWYG field type creates a PyroCMS WYSIWYG text editor using the CKEditor.

</div>
<div class="doc_content">
 
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
			<td>Advanced</td> 
			<td>You can choose between a simple or advanced editor. The settings for each editor are available in <dfn>Settings &rarr; WYSIWYG</dfn></td> 
		</tr> 
		<tr> 
			<td>Allow Tags</td> 
			<td>No</td> 
			<td>If set to <samp>Yes</samp> any PyroCMS tags in the WYSIWYG content will be parsed before output. If set to <samp>No</samp> any PyroCMS tags will be converted to entities before output.</td> 
		</tr> 
</tbody> 
</table> 
 
## Output
 
The WYSIWYG field outputs the requested WYSIWYG editor. See the <samp>Allow Tags</samp> parameter above, which dictates if tags will be parsed or not.
 
## Entry Form Usage 
 
To use the WYSIWYG field type on your site using the entry form, you must provide the proper assets to be able to load the editor. The {{ link title="streams plugin" uri="plugins/streams" }} makes this easy by providing a tag that generates this data. To call the WYSIWYG editor assets, use this tag somewhere in your code:
 
	{{ noparse }}{{ streams:form_assets fields="wysiwyg" }}{{ /noparse }}