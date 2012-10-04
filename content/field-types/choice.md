# Choice Field Type
		
The choice field type allows you to create a field with any number of choices. The input of this can take the form of a drop down, radio buttons, or check boxes. 
 
## Parameters
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="100"> 
				Parameter</th> 
			<th> 
				Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td>Type of Display</td> 
			<td>Radio buttons, drop down, or check boxes.</td> 
		</tr> 
		<tr> 
			<td>Choice Data</td> 
			<td>This is where you specify the choice data, one per each line. See the next section, <strong>Choice Data Form</strong> for more info.</td> 
		</tr> 
</tbody> 
</table> 

### Choice Data

You can specify the choices you want to be available in your input by putting them each on a separate line:

	Vanilla
	Chocolate
	Strawberry

If you need to, you can specify a 'key' for each line of data. This is what will be stored in the database if you use it. To create a key for each data line, add the key before the value, separating the two with a colon surrounded by two spaces:

	l : Live
	d : Draft 
 
In the tag output, there is a 'key' tag available. If you do not use the key feature, the key just ouputs the value.

## Tag Ouput

The tag output for the choice field type differs based on the type of form output you've selected;

### Radio Button/Drop Down Output
 
For radio button and drop down inputs, there is only one value that can be selected, so the output is simply that key or value.

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="100"> 
				Parameter</th> 
			<th> 
				Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td>{{&nbsp;field_slug:key&nbsp;}}</td> 
			<td>The option key.</td> 
		</tr> 
		<tr> 
			<td>{{&nbsp;field_slug:value&nbsp;}}</td> 
			<td>The option value.</td> 
		</tr> 
</tbody> 
</table> 

<h3>Checkboxes Output</h3> 

<p>Since checkbox values have multiple values, you can cycle through them using atag page. The key and value are represented by 'key' and 'value' variables.</p>

	{{ noparse }}{{&nbsp;field_slug&nbsp;}}
&nbsp;&nbsp;&nbsp;{{&nbsp;key&nbsp;}} - {{&nbsp;value&nbsp;}}
{{&nbsp;/field_slug&nbsp;}}{{ /noparse }}