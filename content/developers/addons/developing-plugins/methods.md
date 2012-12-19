# Plugin Methods

When you are creating a plugin, you have a few helpful methods attached to the Plugin class. You can use these to do common tasks such as getting the tags attributes or contents, parsing your attributes to allow for dynamic content, loading theme or module views, and more.
{{#
* {{ docs:id_link title="Core Methods" }}
* {{ docs:id_link title="Usage Examples" }}
#}}

## Core Methods

These are all of the basic methods used in Plugins. Because your plugins are extending this class, be careful not to override any of these functions accidentally.



### content()<span style="display:none">*</span>

This function will return the contents between a tag pair. This is only needed when using a tag pair and will return empty when used with a single tag.

#### Example

Content:

	{{noparse}}{{ navigation:links }}
	<!-- any content here will be included in content() -->
	<li>{{ title }}</li>
{{ /navigation:links }}{{/noparse}}

### attribute($param, $default = null)

Gets the value of an attribute on the tag. You can also optionally pass in a default value to return if the attribute does not exist.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>param</td>
			<td></td>
			<td>Yes</td>
			<td>The attribute name</td>
		</tr>
		<tr>
			<td>default</td>
			<td>null</td>
			<td>No</td>
			<td>The default value to return if the attribute is not set</td>
		</tr>
	</tbody>
</table>

#### Example

	{{noparse}}// plugin method
public function current_date() {
  $format = $this->attribute('format', 'M j Y');
  $date = $this->attribute('date', time());
  
  return date($format, $date);
}


// template code
{{ plugin_name:current_date format="D, M j, Y" }}


// output
Tue, Jan 1, 2013
{{/noparse}}



### attributes()

This will run the `attribute()` function for all available attributes. Returns as an associative array.

#### Example

	{{noparse}}// template code
{{ plugin_name:person id="4" first_name="Jack" last_name="Donaghy" }}


// plugin code
public function person() {
  $person = $this->attributes();
  
  // and more
}


// value of $person
array(
  'id'         => '4',
  'first_name' => 'Jack',
  'last_name'  => 'Donaghy'
);{{/noparse}}




### parse\_parameter($value, $data = array())

This function will allow you to parse your parameter value for dynamic data such as `[[ segment_2 ]]` or `[[ username ]]`. Some values are pre-populated automatically. However, you can include your own values to parse with the <var>$data</var> array if you wish. All values are parsed with the LEX Parser but using the `[[` `]]` as the delimiters instead.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>value</td>
			<td></td>
			<td>Yes</td>
			<td>The String to parse through</td>
		</tr>
		<tr>
			<td>data</td>
			<td>array()</td>
			<td>No</td>
			<td>Additional variables to include in parsing</td>
		</tr>
	</tbody>
</table>

__Turning on / off Parameter Parsing__

You can turn on or off parameter parsing on any tag call with the `parse_params` attribute. If `parse_params` is set to `yes`, we will run the parsing automatically. If it is set to anything else, we will not. By default, we assume you want to parse parameters for variables so we set it to `yes` if the attribute doesn't exist.

	// turn off parameter parsing
	{{noparse}}{{ plugin_name:show_script text="Hello, my name is [[ your name ]]." parse_params="no" }}{{/noparse}}
	
	// outputs
	Hello, my name is [[ your name ]].

Or to use parameter parsing to your advantage:

	// using parameter parsing (default)
	{{noparse}}{{ plugin_name:show_script text="Hello, my name is [[ username ]]." }}{{/noparse}}
	
	// outputs
	Hello, my name is PhillySturgeon.

__Pre-populated Values__

These variables are already set and available for you to use. However, you can override these if you wish.

	// uri_segments
	segment_1
	segment_2
	segment_3
	segment_4
	segment_5
	segment_6
	segment_7
	
	// user info (if logged in)
	user_id
	username

#### Example

Adding your own data to be parsed:

	// plugin code
	public function ask_question() {
	  $question = $this->attribute('text', '[[ color ]], really?');
	  $color = $this->attribute('color', 'red');
	  
	  $replace = array(
	    'color' => $color
	  );
	  
	  return $this->parse_parameter($question, $replace);
	}
	
	
	// template code
	{{noparse}}{{ plugin_name:ask_question text="Is [[ color ]] your favorite color?" color="red" }}{{/noparse}}
	
	
	// output
	Is red your favorite color?


### theme\_view($view, $vars = array(), $parse\_output = true)

You can use this function to load a theme view into your plugin for output. This is helpful if you have the need to dynamically load a view file. This function will __always__ return the view content. Nothing gets written to the page automatically.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>view</td>
			<td></td>
			<td>Yes</td>
			<td>Path to the view file</td>
		</tr>
		<tr>
			<td>vars</td>
			<td>array()</td>
			<td>No</td>
			<td>Pass data to the view for parsing</td>
		</tr>
		<tr>
			<td>parse_output</td>
			<td>true</td>
			<td>No</td>
			<td>Parse output with LEX Parser?</td>
		</tr>
	</tbody>
</table>

#### Example

Load an upsell box and pass it dynamic data:

	// plugin method
	public function upsell() {
	  $name = $this->attribute('name', 'default');
	  $data = array(
	    'title'   => 'Others Also Bought',
	    'item_id' => 10
	  );
	  
	  return $this->theme_view('partials/upsells/'.$name, $data);
	}


### module\_view($module, $view, $vars = array(), $parse\_output = true)

This is similar to the `theme_view()` function but looks in a module's folder instead. This function will __always__ return the view content. Nothing gets written to the page automatically.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>module</td>
			<td></td>
			<td>Yes</td>
			<td>The module to look in</td>
		</tr>
		<tr>
			<td>view</td>
			<td></td>
			<td>Yes</td>
			<td>Path to the view file</td>
		</tr>
		<tr>
			<td>vars</td>
			<td>array()</td>
			<td>No</td>
			<td>Pass data to the view for parsing</td>
		</tr>
		<tr>
			<td>parse_output</td>
			<td>true</td>
			<td>No</td>
			<td>Parse output with LEX Parser?</td>
		</tr>
	</tbody>
</table>

#### Example

Load a default search form with a filter applied:

	// plugin method
	public function search_form() {
	  $type = $this->attributes('type', 'all');
	  $data = array(
	    'filter' => $type
	  );
	  
	  return $this->module_view('recipes', 'partials/search_form', $data);
	}
