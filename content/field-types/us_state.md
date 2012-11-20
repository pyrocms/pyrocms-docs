# US State Field Type
		
The US State field type creates a dropdown list of US states to choose from. 
 
## Parameters
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="100"> 
    Parameter</th> 
   <th width="100"> 
    Example</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td>State Display</td> 
   <td>Allows you to choose between showing the full state name (ex: Florida) or the abbreviated version (ex: FL). You can still display the full name or abbreviation in your layouts, this is just what displays in the dropdown.</td> 
  </tr> 
</tbody> 
</table> 
 
## Output 
 
The state field allows you to display the abbreviation or full version of the state using the following parameters:.

<table cellpadding="0" cellspacing="0" class="docs_table"> 
  <thead> 
    <tr> 
      <th width="100">Parameter</th>
      <th>Description</th> 
    </tr> 
  </thead> 
  <tbody> 
    <tr> 
      <td>{{&nbsp;field_slug:abbr&nbsp;}}</td> 
      <td>The state abbreviation. Ex: FL.</td> 
    </tr> 
    <tr> 
      <td>{{&nbsp;field_slug:full&nbsp;}}</td> 
      <td>The full state name. Ex: Florida.</td> 
    </tr> 
</tbody> 
</table> 
