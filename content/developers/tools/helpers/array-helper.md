# Array Helper

This helper adds functionality not available in the [CodeIgniter Array Helper](http://ellislab.com/codeigniter/user-guide/helpers/array_helper.html).

## Functions


### array\_object\_merge(&$object, $array)

Merge an array or an object into another object. Returns the merged object.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>object</td>
			<td></td>
			<td>Yes</td>
			<td>The Object to merge into. Passed by reference.</td>
		</tr>
		<tr>
			<td>array</td>
			<td></td>
			<td>Yes</td>
			<td>The Array or Object to merge</td>
		</tr>
	</tbody>
</table>

### array\_for\_select(args)

Reformat an array to be ready for the HTML Select helper or other shenanigans.

This function can behave in different ways based on how you pass in your arguments. Please refer to one of the following formats:

#### array\_for\_select($array, $keys\_key, $values\_key)

This is the most common usage and will reformat your array so that the <var>$keys\_key</var> will be the new array keys and the <var>$values\_key</var> will be the new values. See code example below.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>array</td>
			<td></td>
			<td>Yes</td>
			<td>The Array of data. See format below.</td>
		</tr>
		<tr>
			<td>keys_key</td>
			<td></td>
			<td>Yes</td>
			<td>The <em>key</em> to the new keys value</td>
		</tr>
		<tr>
			<td>values_key</td>
			<td></td>
			<td>Yes</td>
			<td>The <em>key</em> to the new values value</td>
		</tr>
	</tbody>
</table>

	// input array
	$array = array(
		array('id' => 1, 'title' => 'One'),
		array('id' => 2, 'title' => 'Two'),
		array('id' => 3, 'title' => 'Three')
	);
	
	// usage
	$result = array_for_select($array, 'id', 'title');
	
	// $result
	Array
	(
		[1] => One
		[2] => Two
		[3] => Three
	);


#### array\_for\_select($array, $values\_key)

This is used when you have key / value pairs and want to preserve the keys. This will reformat your array so that the <var>$array</var>'s key will be the new array keys and the <var>$values\_key</var> will be the new values. See code example below.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>array</td>
			<td></td>
			<td>Yes</td>
			<td>The Array of data. See format below.</td>
		</tr>
		<tr>
			<td>values_key</td>
			<td></td>
			<td>Yes</td>
			<td>The <em>key</em> to the new values value</td>
		</tr>
	</tbody>
</table>

	// input array
	$array = array(
		'item_1' => array('id' => 1, 'title' => 'One'),
		'item_2' => array('id' => 2, 'title' => 'Two'),
		'item_3' => array('id' => 3, 'title' => 'Three')
	);
	
	// usage
	$result = array_for_select($array, 'title');
	
	// $result
	Array
	(
		[item_1] => One
		[item_2] => Two
		[item_3] => Three
	);


#### array\_for\_select($array)

This is used when you have a collection of values that need the same keys and values. This will reformat your array so that the <var>$array</var>'s key will be the new array key and value. See code example below.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>array</td>
			<td></td>
			<td>Yes</td>
			<td>The Array of data. See format below.</td>
		</tr>
	</tbody>
</table>

	// input array
	$array = array(
		'One',
		'Two',
		'Three'
	);
	
	// usage
	$result = array_for_select($array);
	
	// $result
	Array
	(
		[One] => One
		[Two] => Two
		[Three] => Three
	);



### assoc\_array\_prop(array &$arr = null, $prop = 'id')

Reformat an array so the keys are `$prop`'s value and preserve each items data.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>array</td>
			<td></td>
			<td>Yes</td>
			<td>The Array of data. Assigned by reference.</td>
		</tr>
		<tr>
			<td>prop</td>
			<td>id</td>
			<td>No</td>
			<td>The <em>key</em> to the new keys value</td>
		</tr>
	</tbody>
</table>

	// data
	$array = array(
		array('id' => 1, 'title' => 'One', 'order' => 2),
		array('id' => 3, 'title' => 'Three', 'order' => 1),
		array('id' => 4, 'title' => 'Four', 'order' => 3)
	);
	
	// reformat
	assoc_array_prop($array, 'id');
	
	// result
	Array
	(
		[1] => Array
			(
				[id] => 1
				[title] => One
				[order] => 2
			)
	
		[3] => Array
			(
				[id] => 3
				[title] => Three
				[order] => 1
			)
	
		[4] => Array
			(
				[id] => 4
				[title] => Four
				[order] => 3
			)

	)