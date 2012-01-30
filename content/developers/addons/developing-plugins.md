# Developing Plugins

One of the central concepts of PyroCMS's functionality is tags. If you are familiar with PyroCMS you've definitely seem them. Here's an example of a simple tag that returns the current URL:

	{{ noparse }}{{ url:current }}{{ /noparse }}
	
The code behind tags like these is called a plugin. Plugins are special PHP files that have the ability to be called via PyroCMS tags, and have the ability to do things like grab tag parameters. They are simple to write and make incorporating complex functionality into PyroCMS layouts clean and organized.

## Modular vs. Standalone Plugins

Although they are identical in structure, a plugin can either be standalone file, or be a plugin.php file within a larger module. 

A plugin inside a module would be something that compliments a custom module you have built, while a standalone plugin would be something general like a Google Maps plugin or a way to list out Tweets in your own syntax. A standalone plugin does not need a larger module structure - it can be used on its own.

## Example Plugin

This is the Session plugin which can be found in <def>system/pyrocms/plugins/session.php</def>.

	<?php defined('BASEPATH') or exit('No direct script access allowed');
	/**
	 * Session Plugin
	 *
	 * Read and write session data
	 *
	 * @package		PyroCMS
	 * @author		PyroCMS Dev Team
	 * @copyright	Copyright (c) 2008 - 2012, PyroCMS
	 *
	 */
	class Plugin_Session extends Plugin
	{ 
		/**
		 * Data
		 *
		 * Loads a piece of session data
		 *
		 * Usage:
		 * {{ noparse }}{{ session:data name=&quot;foo&quot; }}{{ /noparse }}
		 *
		 * @param	array
		 * @return	array
		 */
		function data()
		{ 
			$name = $this->attribute('name');
			$value = $this->attribute('value');
	
			// Mo vaue? Just getting
			if ($value !== NULL)
			{
				$this->session->set_userdata($name, $value);
				return;
			 }
	
			return $this->session->userdata($name);
		}
	
		/**
		 * Flash
		 *
		 * Loads a piece of flashdata
		 *
		 * Usage:
		 * {{ noparse }}{{ session:flash name="foo" }}{{ /noparse }}
		 *
		 * @param	array
		 * @return	array
		 */
		function flash()
		{
			$name = $this->attribute('name');
			$value = $this->attribute('value');
	
			// No value? Just getting
			if ($value !== NULL)
			{
				$this->session->set_flashdata($name, $value);
				return;
			 }
	
			return $this->session->flashdata($name);
		}
	}

	/* End of file theme.php */
	
In the above code, please note a new important items:

* The class name is **Plugin_** followed by the plugin name in all lowercase.
* The plugin class extend the class **Plugin**.
* Each tag function corresponds directly to a class function.
* The data of each function is returned, not echoed.
	
## Getting Plugin Tag Attributes

What makes tags really powerful is they can take attributes that give you the freedom to modify the tag output based on input data. Here is an example:

	{{ noparse }}{{ session:data name="foo" }}{{ /noparse }}

In the above code, we can access the name parameter within the data function like this:

	$this->attribute('name');

In the case that no attribute is set, you can specify a default value:

	$this->attribute('name', 'a default value');
	
If no value has been specified, $this->attribute will use the default value.

## Tag Pairs

Tags aren't always just one line that returns a simple string. Tags can also be pairs, meaning they have an opening and closing tag and content between them.

Plugins have some features built into them in order to easily handle tag pairs. Here's an example - the blog:posts tag: 

	{{ noparse }}{{ blog:posts limit="5" order-by="title" }}
	&lt;h2>{{ title }}&lt/h2>
	Written by: &lta href="/users/profile/{{ author_id }}">{{ author_name }}&lt/a>&lt/p>
{{ /blog:posts  }}{{ /noparse }}

As you can see, the top tag takes parameters, and there is a bottom closing tag. Inside the tag are variables that we need to replace with data, so obviously just returning a string won't cut it.

In cases like these, we can return an associative array data, and the variables will be replaced with the data we send. In this case, we can return an array of blog entries to this tag from the plugin file will cause the tag parser to loop through each array node (each blog post in our case) and replace the variables between the opening and closing tags with the variables you've defined.

Here's an example of what we would return:

	return array(
		array(
			'title'			=> 'First Blog Post',
			'author_id'		=> 1,
			'author_name'	=> 'Phil Sturgeon',
		),
		array(
			'title'			=> 'Second Blog Post',
			'author_id'		=> 2,
			'author_name'	=> 'Jerel Unruh',
		)
	);

Obviously you'd want to query the database to get the right blog posts, but that's the general idea.

You can even send variables that are associative arrays and these can be looped through in within the tags:

	{{ noparse }}{{ categories }}
	{{ category_name }}
{{ /categories}}{{ /noparse }}

### Tag Pair Raw Content

You can also get and use the full content between the tags in a plugin by calling this in your plugin file:

	$this->content();
	
If you need to modify the tag pair content before you parse it, you can do so by calling up the Lex parser itself and returning a string:

	$parser = new Lex_Parser();
	$parser->scope_glue(':');
	
	return $parser->parse($this->content(), $data = array(), array($this->parser, 'parser_callback'));