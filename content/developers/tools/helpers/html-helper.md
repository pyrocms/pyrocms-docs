# HTML Helper

This helper adds functionality not available in the [CodeIgniter HTML Helper](http://ellislab.com/codeigniter/user-guide/helpers/html_helper.html).

## Functions


### tree_builder($items, $html)

Helps build the HTML for a UI Tree element.

<div class="tip"><strong>Note:</strong> This function only created the HTML for the UI Tree element. You will still need to include the script on your own. This may or may not be done for you in the admin theme.</div>

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>items</td>
			<td></td>
			<td>Yes</td>
			<td>An array of items that may or may not have children (under a key named <code>children</code> for each appropriate array entry). See example format below.</td>
		</tr>
		<tr>
			<td>html</td>
			<td></td>
			<td>Yes</td>
			<td>The HTML string to parse. See example below.</td>
		</tr>
	</tbody>
</table>

#### Example

This is taken from the Pages module which has the UI Tree for sorting pages.

	// example format of $items array
	Array
	(
	    [0] => Array
	        (
	            [id] => 1
	            [parent_id] => 0
	            [title] => Home
	        )
	
	    [1] => Array
	        (
	            [id] => 2
	            [parent_id] => 0
	            [title] => Page missing
	        )
	
	    [2] => Array
	        (
	            [id] => 2
	            [parent_id] => 0
	            [title] => Contact Us
	        )
	
	    [3] => Array
	        (
	            [id] => 3
	            [parent_id] => 0
	            [title] => Search
	            [children] => Array
	                (
	                    [0] => Array
	                        (
	                            [id] => 4
	                            [parent_id] => 3
	                            [title] => Results
	                        )
	                        												
	                    [1] => Array
	                        (
	                            [id] => 5
	                            [parent_id] => 3
	                            [title] => No Results
	                        )
	
	                )
	
	        )
	)
	
	// example format of $html string
	{{noparse}}<li id="{{ id }}"><a href="#">{{ title }}</a>{{ children }}</li>{{/noparse}}