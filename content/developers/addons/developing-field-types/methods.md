# Methods

The following methods can be placed in your field type file and will be run by PyroStreams at various times. The only truly required method is **form_output**, the rest are optional.

* {{ docs:id_link title="Basic Data Formatting" }}
* {{ docs:id_link title="Alternative Formatting" }}
* {{ docs:id_link title="Constructs/Destructs" }}

{{ docs:header }}Basic Data Formatting{{ /docs:header }}
 
The following functions are available for data formatting and saving and make up the core of what you can do with PyroStreams field types.

### form\_output<span>($data, $entry\_id, $field)</span>
 
<p>The only required method. This should return the form output for this field. It takes the following parameters:</p>

<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead>
	<tr> 
		<th width="200">Parameter</th>
		<th width="80">Type</th> 
		<th>Description</th> 
	</tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td>data</td> 
   <td>array</td>
   <td>An array of data on the field.</td> 
  </tr> 
  <tr> 
   <td>entry_id</td> 
   <td>int</td>
   <td>The current entry id. This is <code>null</code> if not being used in an editing entry context.</td> 
  </tr> 
  <tr> 
   <td>field</td> 
   <td>object</td>
   <td>Object of field data.</td> 
  </tr> 
</tbody> 
</table>
 

<p>The <strong>$data</strong> parameter contains the following values:</p> 
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead>
	<tr> 
		<th width="200">Parameter</th> 
		<th>Description</th> 
	</tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td>form\_slug</td> 
   <td>The slug of the form input. Usually is used as the "name" attribute.</td> 
  </tr> 
  <tr> 
   <td>value</td> 
   <td>The current value of the input. Left blank if there is no value.</td> 
  </tr> 
  <tr> 
   <td>custom</td>
   <td>Contains an associative array of the custom parameter values for your field. IE: max_length.</td> 
  </tr> 
</tbody> 
</table>

Example:

    public function form_output($data)
    {
        $options['name']  = $data['form_slug'];
        $options['id']    = $data['form_slug'];
        $options['value'] = $data['value'];

        return form_input($options);
    }

### pre_output<span>($input, $data)</span> 
 
<p>When data needs a singular display, you can use this plugin to provide it. For instance, in the encrypt field type, the `pre_output` function is used to unencrypt the data before it is displayed. If you use the `pre_output_plugin` function (see below) to return multiple variables to be used in a plugin context, you can use `pre_output` to return a canonical display for places where there is no opportunity to choose which variables to display. For instance, in the Date/Time field type, the `pre_ouput` function formats the date according to the site's date formatting setting.</p> 

<p>This plugin takes the following parameters:</p> 
 
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
   <td>input</td> 
   <td>The value stored in the database. A string.</td> 
  </tr> 
  <tr> 
   <td>data</td> 
   <td>An associative array of the custom parameter values for your field. IE: max_length.</td> 
  </tr> 
</tbody> 
</table> 

Example:

    public function pre_output($input)
    {
        $this->CI->load->library('encrypt');
        
        return $this->CI->encrypt->decode($input);
    }
 
<p class="note">When being used in a plugin, this method will be overridden by the <strong>pre\_output\_plugin</strong> method, if it exists.</p> 
 
### pre\_output\_plugin<span>($input, $params, $row_slug)</span>
 
<p>Sometimes you need to return multiple pieces of data for a single field. For instance, the image field returns separate variable for the image filename, the full path, the mime type, and more. If you do return an array of variables using `pre_output_plugin`, they can be accessed like this:</p> 
 
    {{ noparse }}{{ field_slug:array_key }}{{ /noparse }} 
 
<p>This is only really needed on the plugin side, however, as on the back end you just need one string that represents the data point in your table (which is what <strong>pre_output</strong> can be used for).</p> 
 
<p>The `pre_output_plugin` method takes the following parameters:</p> 
 
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
   <td>input</td> 
   <td>The value stored in the database. A string.</td> 
  </tr> 
  <tr> 
   <td>params</td> 
   <td>An associative array of the custom parameter values for your field. IE: max\_length.</td>
  </tr> 
  <tr> 
   <td>field_slug</td> 
   <td>String - the field slug.</td> 
  </tr> 
</tbody> 
</table> 
 
Example:

    public function pre_output_plugin($input)
    {
        if ($input == 'a')
        {
            return array('choice' => 'you chose a!', 'a_was_chosen' => true);
        }
        else
        {
            return array('choice' => 'you did not choose a', 'a_was_chosen' => false);

        }
    }

 <p class="tip">You can also return a string with the <code>pre_output_plugin</code> method if you'd like.</p>

<h3>pre_save<span>($input, $field, $stream, $row_id)</span></h3> 
 
<p>This method allows you to modify the form input data in some way before it is saved to the database. It takes four parameters:</p> 
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="200">Parameter</th> 
   <th width="100">Type</th>
   <th>Description</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td>input</td>
   <td>mixed</td>
   <td>The value from the form input, to be saved into the database.</td> 
  </tr> 
  <tr> 
   <td>field</td> 
   <td>object</td>
   <td>An object containing the field slug, field\_name, and an associative array of custom mateter values under "field\_data". Used like `$field->field_slug` or `$field->field_data['max_length']`.</td> 
  </tr> 
  <tr> 
   <td>stream</td>
   <td>object</td>
   <td>An object of stream data. IE: `$stream->stream_slug`.</td> 
  </tr> 
  <tr> 
   <td>row_id</td>
   <td>int</td>
   <td>The id of the current row. Is `null` if this is a new entry and it hasn't been saved yet.</td> 
  </tr> 
</tbody> 
</table>

Example:

    public function pre_save($input)
    {
        $this->CI->load->library('encrypt');
        
        return $this->CI->encrypt->encode($input);
    }
 
### event($field)
 
<p>This function is called before any other field function is called, allowing you to do things like add metadata to the admin pages, for example. This is where you can put the {{# TODO: link to correct page #}}{{ link uri="developers/addons/developing-field-types/structure#cssjs-files" title="CSS/JS" }} functions:</p>

    public function event($field)
    {
        $this->CI->type->add_css('datetime', 'datepicker.css');
    }

{{ docs:header }}Alternative Formatting{{ /docs:header }}

The above functions assume that we want to store a value in the database, but that isn't always the case. For instance, for the multiple relationship field type, we never store anything in the database &ndash; all data is stored in a separate binding table. Having an actual column in the database would be unecessary and a waste of space.

To deal with special cases like this, streams has provisions for alternative functionality that breaks away from the one-to-one data in column model. The following functions override other basic functions to give you flexibility in how you field type works.

### Setting your Field Type to alt_process

If you want to tap into the alt process functionality, you first need to add a class variable to your field type that tells streams to treat your field type as an alternate process field type:

    public $alt_process = true;

After that, you are free from having to store values in the database. You can use the constructs/destructs to do whatever actions you'd like. For instance, on the multiple relationship field, there is a separate plugin that is used to display related entries using the binding table create and maintained separately from the normal field processes.

However, you need to have a way to display data from this field on the back end if the user wants to. To display data on the back end, you should use the `alt_pre_output` plugin below.

### alt\_pre\_output(<span>$row\_id, $params, $field\_type, $stream</span>)

The `alt_pre_output` method will be called in lieu of `pre_output` on the back end. It allows users to show a canonical data display when viewing entry data on the back end.

<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="200">Parameter</th> 
   <th width="100">Type</th>
   <th>Description</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td>row_id</td>
   <td>int</td>
   <td>The id of the current row. Is <code>null</code> if this is a new entry and it hasn't been saved yet.</td> 
  </tr> 
  <tr> 
   <td>params</td> 
   <td>array</td>
   <td>An associative array of the custom parameter values for your field. IE: max_length.</td> 
  </tr> 
  <tr> 
   <td>field_type</td>
   <td>object</td>
   <td>The actual field type object.</td> 
  </tr> 
  <tr> 
   <td>stream</td>
   <td>object</td>
   <td>An object of stream data. IE: <code>$stream->stream_slug</code></td> 
  </tr> 
</tbody> 
</table> 

{{ docs:header }}Constructs/Destructs{{ /docs:header }}

Construct/destruct functions tap into streams functionality when data and field assignments are created and destoryed.

### field\_assignment\_construct(<span>$field, $stream</span>)

Called right before a field is added to a stream.

<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="200">Parameter</th> 
   <th width="100">Type</th>
   <th>Description</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td>field</td>
   <td>object</td>
   <td>Object of the field that is being added to the stream.</td> 
  </tr> 
  <tr> 
   <td>stream</td> 
   <td>object</td>
   <td>Object of the stream that the field is being added to.</td> 
  </tr> 
</tbody> 
</table> 

### field\_assignment\_destruct(<span>$field, $stream</span>)

Identical to `field_assignment_construct` only called right before a field assignment is removed.

### entry_destruct(<span>$entry, $field, $stream</span>)

Called right before an entry is deleted.

<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="200">Parameter</th> 
   <th width="100">Type</th>
   <th>Description</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td>entry</td>
   <td>object</td>
   <td>Object of the entry that is being deleted.</td> 
  </tr> 
  <tr> 
   <td>field</td>
   <td>object</td>
   <td>Object of the field that is being deleted.</td> 
  </tr> 
  <tr> 
   <td>stream</td> 
   <td>object</td>
   <td>Object of the stream that the field is being deleted.</td> 
  </tr> 
</tbody> 
</table>

<p class="tip">Wondering where <code>entry_construct</code> is? You can use <code>pre_save</code> for that.</p> 

