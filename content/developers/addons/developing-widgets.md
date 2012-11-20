# Developing Widgets

Widgets are quite similar to {{ link title="Plugins" uri="concepts/addons/plugins" }} in the way they are inserted into content, but they are a little more clever. They allow even your least experienced client or administrator to manage chunks of intelligent content on their site without needing to learn loads of tags, HTML or call you in to help.

{{ link title="Widget Areas" uri="concepts/addons/widgets" }} can be defined (header, sidebar, blog page footers, etc.) then Widget Instances can be added in them. Available Widgets currently include HTML blocks, Twitter Feeds, RSS Feeds, Google Maps and Social Bookmarks. More will be included over time, and you can make your own very easily.

## Where do I put my widgets?

Widgets can be stored directly in three places

* the <dfn>/addons/&lt;site-ref&gt;/widgets/*&lt;widget-name&gt;*</dfn> folder
* or the <dfn>/addons/shared\_addons/widgets/*&lt;widget-name&gt;*</dfn> folder
* or inside a module folder for example: <dfn>/addons/modules/*&lt;module-name&gt;/widgets/&lt;widget-name&gt;*</dfn>

## What are the main components of a widget

The main components of a widget are:

* the widget class
* <dfn>views/form.php</dfn> &ndash; a view that will be rendered in the widget admin interface.
* <dfn>views/display.php</dfn> &ndash; a view that will be used to render output in the frontend site content.

## How should a widget be structured?

For example, lets say we want to create a widget called "awesome_sauce". Our structure would be as such:

    - awesome_sauce (folder)
      * awesome_sauce.php (widget class)
      - views (folder)
          * form.php (admin view)
          * display.php (frontend view)

We will now explain each component in more detail:

### The widget class file

Please take this opportunity to read through the code below and make note of the comments.

    <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Widget_Awesome_sauce extends Widgets
    {
	    // The widget title,  this is displayed in the admin interface
	    public $title = 'Awesome Sauce';

	    //The widget description, this is also displayed in the admin interface.  Keep it brief.
	    public $description =  'Display sauce that is awesome.';

	    // The author's name
	    public $author = 'Some Guy';

	    // The authors website for the widget
	    public $website = 'http://example.com/';

	    //current version of your widget
	    public $version = '1.0';

    	/**
    	 * $fields array fore storing widget options in the database.
	     * values submited through the widget instance form are serialized and
	     * stored in the database.
	     */
	    public $fields = array(
		    array(
		    	'field'   => 'field_name',
		    	'label'   => 'field_label',
		    	'rules'   => 'required'
		    )
	    );

	    /**
	     * the $options param is passed by the core Widget class.  If you have
	     * stored options in the database,  you must pass the paramater to access
	     * them.
	     */
	    public function run($options)
	    {
		    if(empty($options['field_name']))
    		{
	    		//return an array of data that will be parsed by views/display.php
                return array('output' => '');
	        }

            // Store the feed items
		    return array('output' => $options['html']);
	    }

        /**
	     * form() is used to prepare/pass data to the widget admin form
	     * data returned from this method will be available to views/form.php
	     */
	    public function form()
	    {
	        $stuff = $this->db->get_stuff();
            return array('stuff' => $stuff);
	    }

        /**
	     * save() is used to alter submited data before their insertion in database
	     */
	    public function save($options)
	    {
		   if(isset($options['foo']) && !isset($options['bar']){
		       $options['bar'] = $options['foo'];
		   }
		   return $options;
	    }
    }

If you have made it this far and have read the comments in the above code that should pretty much get you on the right path to creating your first widget. However I would like to point out one thing before moving on.

The widget class name should be in the following format: "**Widget\_Awesome\_sauce**" and must extend the "**Widgets**" core class.

### The view files

Not much to be said here other than the view files should be partial views only. The views should not include html, body, head elements. The view files must also be named **form.php** and **display.php** respectively.

## Example usage

All you need to do for this to work is open up a theme layout or page layout and enter:

    {{ noparse }}{{ widgets:area slug="sidebar" }}{{ /noparse }}