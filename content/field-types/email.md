# Email Field Type
		
The email field type is similar to the {{ link title="text field type" uri="field-types/text" }}, but adds validation for a valid email address and uses the HTML5 email input type that optimizes email input for mobile devices.</p>

## Parameters

_There are no parameters for the email field type._ 

## Output

The email field type outputs some handy email address variables.
 
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
   <td>{{&nbsp;field\_slug:email\_address&nbsp;}}</td> 
   <td>The email address</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:mailto\_link&nbsp;}}</td> 
   <td>Generates a mailto link.</td> 
  </tr> 
  <tr> 
   <td>{{&nbsp;field\_slug:safe\_mailto\_link&nbsp;}}</td> 
   <td>Generates a mailto link that is obscured by javascript.</td> 
  </tr> 
</tbody> 
</table>