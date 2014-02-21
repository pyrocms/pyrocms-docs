# Encrypt Field Type
		
The encrypt field type stores a string as encrypted data in the database and decrypts it for output. It uses CodeIgniter's [Encryption Class](http://ellislab.com/codeigniter/user-guide/libraries/encryption.html). This should not be used to store passwords.
 
## Parameters
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="200"> 
				Parameter</th> 
			<th> 
				Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td>Hide Typing on Input</td> 
			<td>Allows you to set if you'd like to hide typing on input (with a password input type).</td> 
		</tr> 
</tbody> 
</table> 
 
## Output 
 
The encrypt field type outputs the decrypted string.