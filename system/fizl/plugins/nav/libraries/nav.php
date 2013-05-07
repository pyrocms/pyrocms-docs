<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Nav Plugin
 *
 * Allows you to easily define a nav list.
 *
 * @package		Fizl
 * @author		Adam Fairholm (@adamfairholm)
 * @copyright	Copyright (c) 2011-2012, Parse19
 * @license		http://parse19.com/fizl/docs/license.html
 * @link		http://parse19.com/fizl
 */
class Nav extends Plugin {

	public $level;
	public $depth = 1;
	public $segs = array();
	public $seg_depth = 1;

	/**
	 * Parse the nav list
	 */
	public function nav()
	{
		$this->CI = get_instance();
	
		if(!$content = trim($this->tag_content)) return;
	
		// Break into lines
		$lines = explode("\n", $content);
		
		// We are going to put things into an
		// an array first
		$nav_arr = array();
		
		$this->level = 0;
		
		$html = '<ul class="'.$this->get_param('ul_class', 'nav').'">'."\n";
		
		foreach($lines as $key => $line):

			$line = trim($line);

			if($line[0] == '-'):
	
				// Get the data
				$items = explode(" ", trim($line), 2);
				
				// This has some sort of sub level
				$tmp_level = substr_count(trim($items[0]), '-');
				$link_data = $items[1];
				
			else:
			
				// This is a top level item
				$tmp_level = 0;
				$link_data = $line;
			
			endif;
							
			// Set the level. Has it changed?
			if($this->level < $tmp_level):
			
				// We are stepping into a deeper level.
				// We need to not close off the LI and
				// start a new ul
				$html .= "\n<ul>\n";
								
			endif;

			if($this->level > $tmp_level):
				
				// We are stepping into a shallower level.
				// Close off the ul and the li and 
				$html .= "</li>\n</ul>\n";
				
			endif;
			
			$html .= '<li class="';
			
			// Looks like we just a single item
			$pieces = explode('|', trim($link_data), 2);
			
			// Get the current string
			$uri_segs = explode('/', $pieces[0]);
			
			$popped_uri = array_slice($this->CI->uri->segment_array(), 0, count($uri_segs));
			
			// Is the current link?
			if($pieces[0] == implode('/', $popped_uri)):
			
				$html .= trim($this->get_param('current_class', 'current')).' ';
			
			endif;
			
			// Create link
			$html .= 'level_'.$tmp_level.'"><a href="';
						
			if(strpos($pieces[0], 'http://')!==FALSE or strpos($pieces[0], 'https://')!==FALSE):
			
				$html .= $pieces[0];
			
			else:
			
				$html .= site_url($pieces[0]);
			
			endif;

			$html .= '">'.$pieces[1].'</a>';
			
			// Does is the next l
			if(isset($lines[$key+1]) and trim($lines[$key+1][0]) != '-') 
				$html .= "</li>\n";

			$this->level = $tmp_level;
							
		endforeach;
		
		return $html .= "</li>\n</ul>";
	}

	function run_level($map)
	{
		$html = null;

		// See if we have an order.txt
		if(in_array('order.txt', $map)):

			// get the order
			$this->CI->load->helper('file');
			$order = trim(read_file(FCPATH.$this->CI->vars['site_folder'].'/'.implode('/', $this->segs).'/order.txt'));
			
			// chop it up
			$ord = explode("\n", $order);
		else:

			$order = directory_map(FCPATH.$this->CI->vars['site_folder'].'/'.implode('/', $this->segs), 1);

			$ord = array();

			foreach($order as $o)
			{
				$ord[] = str_replace('.md', '', $o);
			}

		endif;

		$html .= '<ul class="unstyled depth_'.$this->depth.'">'."\n";
		
		foreach($ord as $order_string):
					
			$pieces = explode('|', $order_string);
			
			if(count($pieces) == 2)
			{
				$file = trim($pieces[0]);
				$name = trim($pieces[1]);
			}
			else
			{
				$file = trim($order_string);
				$name = $this->guess_name($file);
			}

			if (in_array($file.'.md', $map))
			{
				$html .= '<li><a href="'.site_url(implode('/', $this->segs).'/'.$file).'">'.$name. '</a></li>';
			}
			elseif (array_key_exists($file, $map))
			{
				$html .= '<li><a href="'.site_url(implode('/', $this->segs).'/'.$file).'">'.$name.'</a>';

				$this->depth++;
				$this->seg_depth++;
				$this->segs[] = $file;

				$html .= $this->run_level($map[$file]);

				$this->depth--;
				$this->seg_depth--;
				array_pop($this->segs);

				$html .= '</li>';
			}

		endforeach;

		$html .= '</ul>';	
				
		return $html;
	}

	function is_current($segs)
	{
		if (implode('/', $segs) == $this->CI->uri->uri_string())
		{
			
		}
	}

	/**
	 * Attempts to create a nav from
	 * the directory tree.
	 */
	function auto()
	{
		$this->CI = get_instance();

		$start = $this->get_param('start');
		$depth = $this->get_param('depth', 2);
		
		// We need a start
		if(!$start) return;
		
		$this->segs = explode('/', $start);
		$this->seg_depth = count($this->segs)+1;
				
		$this->CI->load->helper('directory');
								
		$map = directory_map(FCPATH.$this->CI->vars['site_folder'].'/'.implode('/', $this->segs), 3);
		
		if(!$map) return;

		return $this->run_level($map);
	}

	function create_ul($tree)
	{
		$this->depth++;
	
		$this->html .= '<ul class="unstyled depth_'.$this->depth.'">'."\n";
		
	    foreach($tree as $key => $item):
	    
	        if (is_array($item)):
	        	
	        	$this->stack[] = $key;

	        	$item = $this->order_items($item);	        	
	        	
	        	if(is_numeric($key))
	        	{
	        		$this->html .= '<li>'.$this->guess_name($key)."\n";
	        	}
	        	else
	        	{
	        		$this->html .= '<li>'.$key."\n";
	        	}
	        	
	            $this->create_ul($item);
	            
	            $this->html .= '</li>';
	            
	        	array_pop($this->stack);
	            
	        else:

	    		$this->stack[] = $this->remove_extension($item);
	        
	            $this->html .= "\t".'<li><a href="'.site_url(implode('/', $this->stack)).'">';
	            
				if(is_numeric($key))
				{
	           		 $this->html .= $this->guess_name($item);
	            }
	            else
	            {
	            	$this->html .= $key;
	            }
	            
	            $this->html .= '</a></li>'."\n";

	        	array_pop($this->stack);
	        
	        endif;
	        
	    endforeach;

		$this->html .= '</ul>'."\n\n";

		$this->depth--;
	}
	
	function guess_name($name)
	{
		$name = $this->remove_extension($name);
	
		$name = str_replace('-', ' ', $name);
		$name = str_replace('_', ' ', $name);
		//$name = str_replace('.', ' ', $name);
		
		return ucwords($name);
	}
	
	function remove_extension($file)
	{
		$segs = explode('.', $file, 2);
		
		if(count($segs) > 1):
			array_pop($segs);
			$file = implode('.', $segs);
		endif;
		
		return $file;
	}
	
	function order_items($arr)
	{	
		// Do we have an order txt file?
		if(!in_array('order.txt', $arr)):
		
			return $arr;
		
		endif;
		
		// If so, remove it and break it down into an array.
		$key = array_search('order.txt', $arr);
		unset($arr[$key]);
		
		$loc = array_merge(array(FCPATH.$this->CI->vars['site_folder'].'/'.$this->start), $this->stack);
		
		$path = implode('/', $loc);
		
		if(!is_file($path.'/order.txt')) return $arr;
		
		$this->CI->load->helper('file');
		
		$order = trim(read_file($path.'/order.txt'));
		
		if(!$order) return $arr;
		
		// Break it down
		$ord = explode("\n", $order);
		
		// Go through and create a new array
		$new_arr = array();
		
		foreach($ord as $o):
		
			$new_arr[] = $o.'.html';
		
		endforeach;
		
		return $new_arr;
	}
		
}

/* End of file nav.php */