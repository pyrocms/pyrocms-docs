<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * URL Plugin
 *
 * @package		Fizl
 * @author		Adam Fairholm (@adamfairholm)
 * @copyright	Copyright (c) 2011-2012, Parse19
 * @license		http://parse19.com/fizl/docs/license.html
 * @link		http://parse19.com/fizl
 */
class Url extends Plugin {

	/**
	 * Current URL
	 */
	public function current_url()
	{
		get_instance()->load->helper('url');
	
		return current_url();
	}	

}