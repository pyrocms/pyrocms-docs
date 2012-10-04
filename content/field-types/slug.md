# Slug Field Type
 
The slug field type allows you to automatically generate a slug from another text field. A slug is a URL-safe string that represents another string. So if you have a text field called "Title", and a slug field called "Slug" that is set to create a slug for title, you'll get the following outcome:

	Title: 	Sample Title
	Slug: 	sample-title
 
<h3>Parameters</h3> 
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="100">Parameter</th> 
			<th>Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td>Space Type</td> 
			<td>Allows you to choose the character that replaces whitespace. The options are **dash** and **underscore**.</td> 
		</tr> 
		<tr> 
			<td>Slug Field</td> 
			<td>The field that we should create a slug for.</td> 
		</tr> 
</tbody> 
</table> 
 
<h3>Output</h3> 
 
<p>The user field returns the slug.</p> 