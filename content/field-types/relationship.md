# Relationship Field Type
		
The relationship field type gives you the ability to link streams together by allowing you to choose an entry from another stream as an input, and have access to all the data from the connected entry on the front end.

For instance, if you have an events stream, it might look like this:

	Events:
		- Event Name
		- Description
		- Start Date and Time

 Maybe you have a set of locations that your events are always at. If you put your address fields into your events stream, you'd have to enter in the same data over and over. Instead, you can create a Locations stream, and add your address fields and addresses in there:

 	Locations:
 		- Street
 		- State
 		- Zip Code

 Then you create a **location** field and choose Locations as the linked stream. You can now add it to your Events stream, and when you add a new event, you'll get a drop down of locations to choose from. You can then access the location data from the selected entry in your layouts.

 	Events:
		- Event Name
		- Description
		- Start Date and Time
		- Location (relationship field type, liked to Locations)

 	Locations:
 		- Street
 		- State
 		- Zip Code

 
## Parameters 
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="150"> 
				Parameter</th> 
			<th width="100"> 
				Default</th> 
			<th> 
				Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td>Relationship Stream</td> 
			<td></td> 
			<td>The stream to pull the relationship entry from.</td> 
		</tr> 
</tbody> 
</table> 
 
## Output 
 
The relationship field type makes variables from the related entry available as nested variables. So if you have a stream of states, and your relationship field is called **capital** and is pulling from a stream of Cities, you could access the name field of the cities entry like so:
 
	{{ noparse }}{{&nbsp;capital:name&nbsp;}}{{ /noparse }}

<p>You can also access deep variables like this:</p>

	{{ noparse }}{{&nbsp;capital:email:email_address&nbsp;}}{{ /noparse }}
