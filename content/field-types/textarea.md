# Textarea Field Type
		
The textarea field type allows you to enter blocks of text into a textarea box. 
 
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
			<td>Default Value</td> 
			<td></td> 
			<td>The default value of the field, if you'd like it to have one.</td> 
		</tr> 
		<tr> 
			<td>Allow Lex Tags</td> 
			<td>No</td> 
			<td>If set to <samp>Yes</samp> any PyroCMS tags in the textarea content will be parsed before output. If set to <samp>No</samp> any PyroCMS tags will be converted to entities before output.</td> 
		</tr> 
		<tr> 
			<td>Content Type</td> 
			<td>Plain Text</td> 
			<td>If set to <samp>Plain Text</samp> HTML will be converted to entities. If set to <samp>HTML</samp>, HTML will be allowed. If set to <samp>Markdown</samp>, the content will be processed as markdown content.</td> 
		</tr> 
</tbody> 
</table> 
 
## Output
 
The textarea field type outputs the contents of your textarea box based on the values of the <samp>Allow Lex Tags</samp> and <samp>Content Type</samp> parameters above.