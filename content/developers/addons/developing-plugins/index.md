# Developing Plugins

One of the central PyroCMS functionality concepts is tags. If you are familiar with PyroCMS you have definitely seem them before. Here is an example of a simple tag that returns the current URL:

	{{ noparse }}{{ url:current }}{{ /noparse }}

The code behind tags like these is called a plugin. Plugins are special PHP files that have the ability to be called via PyroCMS tags, and can do things like grab tag parameters. They are simple to write and make incorporating complex functionality into PyroCMS layouts clean and organized.

## Modular vs Standalone Plugins

Although they are identical in structure, a plugin can either be standalone file, or be a <dfn>plugin.php</dfn> file within a larger module.

A plugin inside a module would be something that compliments a custom module you have built, while a standalone plugin would be something general like a Google Maps plugin or a way to list out Tweets in your own syntax. A standalone plugin does not need a larger module structure; it can be used on its own.

## Example Plugin

This is the Session plugin which can be found in <dfn>system/pyrocms/plugins/session.php</dfn>.

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

			// If we have a value, let's set it.
			if ($value)
			{
				$this->session->set_userdata($name, $value);
				return;
			 }

			// Otherwise, we need to retrieve the value.
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

			// If we have a value, let's set it.
			if ($value)
			{
				$this->session->set_flashdata($name, $value);
				return;
			 }

			// Otherwise, we need to retrieve the value.
			return $this->session->flashdata($name);
		}
	}

	/* End of file theme.php */

In the above code, please note a few important items:

* The class name is **Plugin_** followed by the plugin name (lowercase with the first letter in uppercase).
* The plugin class extend the class **Plugin**.
* Each tag function corresponds directly to a class function.
* The data of each function is returned, not echoed.

## Getting Plugin Tag Attributes

What makes tags really powerful is they can take attributes that give you the freedom to modify the tag output based on input data. Here is an example:

	{{ noparse }}{{ session:data name="foo" }}{{ /noparse }}

In the code above, we can access the name parameter within the data function like this:

	$this->attribute('name');

In case no attribute is set, you can specify a default value:

	$this->attribute('name', 'a default value');

If no value has been specified, $this->attribute will use the default value.

## Tag Pairs

Tags are not always just one line that returns a simple string. Tags can also be pairs, meaning they have an opening and closing tag and content between them.

Plugins have some features built into them in order to easily handle tag pairs. For example, here is the `blog:posts` tag:

    {{ noparse }}
{{ blog:posts limit="5" order-by="title" }}
    &lt;h2>{{ title }}&lt;/h2>
    &lt;p>Written by: &lt;a href="/users/profile/{{ author_id }}">{{ author_name }}&lt;/a>&lt;/p>
{{ /blog:posts }}{{ /noparse }}

The top tag takes parameters, and there is a bottom closing tag. Inside the tag, there are variables that we need to replace with multiple sets of data.

In cases like these, we can return an associative array data structure from our plugin function, and the variables will be replaced with the data we send. In this case, we can return an array of blog entries to this tag from the plugin file will cause the tag parser to loop through each array node (each blog post in our case) and replace the variables between the opening and closing tags with the variables you have defined.

Here is an example of what we could return:

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

It is possible to even send variables that are associative arrays and these can be looped through in within the tags:

	return array(
		array(
			'title'			=> 'First Blog Post',
			'author_id'		=> 1,
			'author_name'	=> 'Phil Sturgeon',
			'categories'	=> array(
						array('category_name' => 'PyroCMS'),
						array('category_name' => 'Phil Sturgeon')
					)
		),
		array(
			'title'			=> 'Second Blog Post',
			'author_id'		=> 2,
			'author_name'	=> 'Jerel Unruh',
			'categories'	=> array(
						array('category_name' => 'PyroCMS'),
						array('category_name' => 'Jerel Unruh')
					)
		)
	);

You can use the extra categories array we have added here like this:

    {{ noparse }}
{{ blog:posts limit="5" order-by="title" }}
    &lt;h2>{{ title }}&lt;/h2>
    &lt;p>Written by: &lt;a href="/users/profile/{{ author_id }}">{{ author_name }}&lt;/a>&lt;/p>
	{{ categories }}
		{{ category_name }}
	{{ /categories}}
{{ /blog:posts }}{{ /noparse }}

### Tag Pair Raw Content

You can also get and use the full content between the tags in a plugin by calling this in your plugin file:

	$this->content();

If you want to parse the content between your tags with the Lex parser, the tag pair content can be modified before parsing by running it through a parser instance:

	$parser = new Lex_Parser();
	$parser->scope_glue(':');

	return $parser->parse($this->content(), $data = array(), array($this->parser, 'parser_callback'));