<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Docs Plugin
 *
 * For the PyroCMS Docs
 *
 * @package		Fizl
 * @author		Adam Fairholm (@adamfairholm)
 * @copyright	Copyright (c) 2011-2012, Parse19
 * @license		http://parse19.com/fizl/docs/license.html
 * @link		http://parse19.com/fizl
 */
class Docs extends Plugin {

	public function id_link()
	{
		return '<a href="'.current_url().'#'.url_title($this->get_param('title'), 'dash', true).'">'.$this->get_param('title').'</a>';
	}

	public function header()
	{
		$title = ($this->tag_content) ? $this->tag_content : $this->get_param('title');

		return '<h2 id="'.url_title($title, 'dash', true).'">'.$title.' <a href="'.current_url().'#top">^</a></h2>';
	}

}