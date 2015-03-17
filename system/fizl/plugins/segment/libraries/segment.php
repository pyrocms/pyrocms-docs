<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Segment extends Plugin {

	/**
	 * Render a note
	 */
	public function __call($method, $arguments)
	{
        require_once(__DIR__ . '/../../format/libraries/markdown.php');
        
        return Markdown('<div class="ui segment '.$this->get_param('type', $method).'"><strong>'.$this->get_param('title', 'Note').':</strong> '.$this->get_param('text').'</div>');
	}
			
}
