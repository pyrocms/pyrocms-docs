<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Var Plugin
 *
 * Allows you to embed templates
 *
 * @package		Fizl
 * @author		Adam Fairholm (@adamfairholm)
 * @copyright	Copyright (c) 2011-2012, Parse19
 * @license		http://parse19.com/fizl/docs/license.html
 * @link		http://parse19.com/fizl
 */
class Variables extends Plugin {

	/**
	 * Return a parsed embedded template
	 */
	public function set()
	{
		$value = ($this->tag_content) ? $this->tag_content : $this->get_param('value');

		if ($this->get_param('regex'))
		{
			// We are going to match our provided regex and
			// grab the first match as our value.
			preg_match('/'.$this->get_param('regex').'/', $value, $matches);

			if (isset($matches[0]))
			{
				$value = $matches[0];
			}

			// Hack for Pyro docs.
			$value = str_replace('# ', '', $value);
		}

		get_instance()->vars[$this->get_param('name')] = $value;
	}

	public function get_var()
	{
		return get_instance()->vars[$this->get_param('name')];
	}
	
}