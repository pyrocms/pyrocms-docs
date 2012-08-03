# Developing Widgets

Widgets are quite similar to <a href="/docs/glossary#plugins">Plugins</a> in the way they are inserted into content, but they are a little more clever. They allow even your least experienced client or administrator to manage chunks of intelligent content on their site without needing to learn loads of tags, HTML or call you in to help.

<a href="/docs/glossary#widget-areas">Widget Areas</a> can be defined (header, sidebar, blog page footers, etc) then Widget Instances can be added in them. Available Widgets currently include HTML blocks, Twitter Feeds, RSS Feeds, Google Maps and Social Bookmarks. More will be included over time, and you can make your own very easily.

##Where do i put my widgets?

Widgets can be stored directly in three places

* the /addons/&lt;site-ref&gt;/widgets/*&lt;widget-name&gt;* folder
* or the /addons/shared_addons/widgets/*&lt;widget-name&gt;* folder
* or inside a module folder for example: /addons/modules/*&lt;module-name&gt;/widgets/&lt;widget-name&gt;*

## What are the main components of a widget

The main components of a widget are:

* the widget class.
* views/form.php &ndash; a view that will be rendered in the widget admin interface.
* views/display.php &ndash; a view that will be used to render output in the frontend site content.

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
    }

If you have made it this far and have read the comments in the above code that should pretty much get you on the right path to creating your first widget. However I would like to point out one thing before moving on.

The widget class name should be in the following format: "**Widget\_Awesome\_sauce**" and must extend the "**Widgets**" core class.

### The view files

Not much to be said here other than the view files should be partial views only. The views should not include html, body, head elements. The view files must also be named **form.php** and **display.php** respectively.

## Example usage

All you need to do for this to work is open up a theme layout or page layout and enter:

    {{ noparse }}
{{ pyro:widgets:area slug="sidebar" }}
    {{ /noparse }}