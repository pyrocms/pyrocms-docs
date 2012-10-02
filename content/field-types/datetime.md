# Date/Time Field Type
		
The date/time field type stores date and time information. You can choose to just store the date, or store the date plus the time.
 
## Parameters
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="100"> 
				Parameter</th> 
			<th width="100"> 
				Values</th> 
			<th> 
				Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td>Use Time</td> 
			<td>Yes / No</td> 
			<td>Whether or not to use and record time with the date.</td> 
		</tr> 
		<tr> 
			<td>Start Restriction</td>
			<td>Format Strong</td>
			<td>Takes numerical offset from current date (Ex: -20) or numerical offset for days (D), months (M), and years (Y). Ex: +1D +2Y<.</td> 
		</tr> 
		<tr> 
			<td>End Restriction</td> 
			<td>Format String</td> 
			<td>Takes numerical offset from current date (Ex: -20) or numerical offset for days (D), months (M), and years (Y). Ex: +1D +2Y<</td> 
		</tr> 
		<tr> 
			<td>Storage Format</td> 
			<td>MySQL Datetime, UNIX time</td> 
			<td>Sets the column type to use for data storage.</td> 
		</tr> 
		<tr> 
			<td>Input Type</td> 
			<td>Datepicker, Dropdown</td> 
			<td>You can either have a set of HTML selects to the input the date/time, or a jQuery datepicker.</td> 
		</tr> 
	</tbody> 
</table> 
  
## Formatting Date/Time Output
 
The date/time field type can be formatted one of two ways. The first and most common way is by formatting it with the date helper. The formatting follows <a href="http://php.net/manual/en/function.date.php">PHP's date formatting guidelines</a>.

Example:

	{{ noparse }}{{ helper:date format="d/m/Y" timestamp=start_on }}{{ /noparse }}