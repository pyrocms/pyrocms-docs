# Plugin Development

When editing content through the Control Panel (like pages and blog articles) or building themes, there will be certain tags available to the user and designer. These are called <a href="/docs/glossary#plugins">Plugins</a> and can represent data or be a way to add extra functionality to the page, like inserting <a href="/docs/glossary#widget-areas">Widget areas</a>, displaying settings or user details.

## Modular vs. Standalone Plugins

Although they are identical in structure, a plugin can either be standalone file, or be a plugin.php file within a larger module. 

A plugin inside a module would be something that compliments a custom module you have built, while a standalone plugin would be something general like a Google Maps plugin or a way to list out Tweets in your own syntax. A standalone plugin does not need a larger module structure - it can be used on its own.

## Plugins vs. Widgets

A Plugin is pure syntax, a <a href="/docs/glossary#widgets">Widget</a> is entirely self contained. That means you can drag and drop Widgets into an area and it will know exactly what to do by itself. Plugins give people a lot more freedom if they know how to use them and are capable of editing HTML.

## Example Plugin

This is the Session plugin which can be found here <def>system/pyrocms/plugins/session.php</def>

For an explanation of plugin functions such as **get_attribute**, please see the {{ link title="Lex Documentation" uri="developers/tools/the-lex-parser" }}.

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

## Example Usage

All you need to do for this to work is open up a theme, page, article, etc and enter:</p>

	{{ noparse }}{{ session:data name="foo" value="bar" }}{{ /noparse }}

Then somewhere else you could do this:

	{{ noparse }}{{ session:data name="foo" }}{{ /noparse }}
<p>
	That will display bar on your page. Obviously this is a very simple example, but with plugins, you can do things from very simple to much more complex.</p>

## Installing? Loading?

Nope! You don't need to install Plugins, or worry about loading them. Just use them and whatever is returned by the plugin method will replace the tag in your theme, page, article, etc.
