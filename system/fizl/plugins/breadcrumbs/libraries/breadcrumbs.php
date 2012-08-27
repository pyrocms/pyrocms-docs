<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Breacrumbs Plugin
 *
 * Allows you to generate links
 *
 * @package		Fizl
 * @author		Adam Fairholm (@adamfairholm)
 * @copyright	Copyright (c) 2011-2012, Parse19
 * @license		http://parse19.com/fizl/docs/license.html
 * @link		http://parse19.com/fizl
 */
class Breadcrumbs extends Plugin {

	/**
	 * Simple anchor link
	 */
	public function crumbs()
	{
		$this->CI = get_instance();

		$sections = $this->CI->uri->segment_array();

		$links = array('<a href="">Home</a>');

		$count = 1;
		foreach ($sections as $section)
		{
			$links[] = '<a href="'.site_url(implode('/', array_slice($sections, 0, $count))).'">'.ucwords(str_replace('-', ' ', $section)).'</a>';
		
			$count++;
		}

		return implode(' > ', $links);
	}

}