# Methods

The following methods can be placed in your field type file and will be run by Streams at various times. The only truly required method is **formInput**, the rest are optional.

* {{ docs:id_link title="Basic Data Formatting" }}
* {{ docs:id_link title="Alternative Formatting" }}
* {{ docs:id_link title="Constructs/Destructs" }}

## Basic Data Formatting
 
The following functions are available for data formatting and saving and make up the core of what you can do with Streams field types.

### formInput<span>()</span>
 
<p>The only required method. This should return the form output for this field.</p>

Example:

    public function formInput()
    {
        $options['name']  = $this->getFormSlug();
        $options['id']    = $this->getFormSlug();
        $options['value'] = $this->value;

        return form_input($options);
    }

### stringOutput<span>()</span>
 
<p>When data needs a displayed as a string, you can use this method to provide it.</p>

Example:

    public function stringOutput()
    {
        ci()->load->helper('text');

        return escape_tags($this->value);
    }
 
### pluginOutput<span>()</span>
 
<p>When data needs a displayed using tags, you can use this method to provide it.</p>
 
    {{ noparse }}{{ field_slug:array_key }}{{ /noparse }} 
 
<p>This is only really needed on the plugin side, however, as on the back end you just need one string that represents the data point in your table (which is what <strong>stringOutput</strong> can be used for).</p>
 
Example:

    public function pluginOutput()
    {
        $data = array();

        $data['email_address']		= $this->value;
        $data['mailto_link']			= mailto($this->value, $this->value);
        $data['safe_mailto_link']	= safe_mailto($this->value, $this->value);

        return $data;
    }

<p class="tip">You can also return a string with the <code>pluginOutput</code> method if you'd like.</p>

### dataOutput<span>()</span>

<p>When data needs used in native PHP, you can use this method to provide it.</p>

    echo $myEntry->email->email_address;


Example:

    public function dataOutput()
    {
        $data = new \stdClass;

        $data->email_address       = $this->value;
        $data->mailto_link         = mailto($this->value, $this->value);
        $data->safe_mailto_link    = safe_mailto($this->value, $this->value);

        return $data;
    }

<p class="tip">You can also return a string with the <code>dataOutput</code> method if you'd like.</p>

<h3>preSave<span>()</span></h3>
 
<p>This method allows you to modify the form input data in some way before it is saved to the database.</p>
 
Example:

    public function preSave()
    {
        $this->CI->load->library('encrypt');

        return $this->CI->encrypt->encode($this->value);
    }
 
### event()
 
<p>This function is called before any other field function is called, allowing you to do things like add metadata to the admin pages, for example. This is where you can put the {{# TODO: link to correct page #}}{{ link uri="developers/addons/developing-field-types/structure#cssjs-files" title="CSS/JS" }} functions:</p>

    public function event()
    {
        $this->css('datepicker.css');
    }

## Alternative Formatting

The above functions assume that we want to store a value in the database, but that isn't always the case. For instance, for the multiple relationship field type, we never store anything in the database &ndash; all data is stored in a separate binding table. Having an actual column in the database would be unecessary and a waste of space.

To deal with special cases like this, streams has provisions for alternative functionality that breaks away from the one-to-one data in column model. The following functions override other basic functions to give you flexibility in how you field type works.

### Setting your Field Type to alt_process

If you want to tap into the alt process functionality, you first need to add a class variable to your field type that tells streams to treat your field type as an alternate process field type:

    public $alt_process = true;

After that, you are free from having to store values in the database. You can use the constructs/destructs to do whatever actions you'd like. For instance, on the multiple relationship field, there is a separate plugin that is used to display related entries using the binding table create and maintained separately from the normal field processes.

However, you need to have a way to display data from this field on the back end if the user wants to. To display data on the back end, you should use the `alt_pre_output` plugin below.

## Constructs/Destructs

Construct/destruct functions tap into streams functionality when data and field assignments are created and destoryed.

### fieldAssignmentConstruct(<span></span>)

Called right before a field is added to a stream.

### fieldAssignmentDestruct(<span></span>)

Identical to `fieldAssignmentConstruct` only called right before a field assignment is removed.
