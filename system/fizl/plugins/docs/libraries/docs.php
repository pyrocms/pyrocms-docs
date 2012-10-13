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

	public function table()
	{

		$header = $this->get_param('header', '');

		$colwidth = $this->get_param('colwidth', '');

		$colclass = $this->get_param('colclass', '');

		$colstyle = $this->get_param('colstyle', '');

		$header_arr = explode('|', $header);

		$colwidth_arr = explode('|', $colwidth);

		$colclass_arr = explode('|', $colclass);

		$colstyle_arr = explode('|', $colstyle);

		$table_class = $this->get_param('class', '');

		$table_class = $table_class != '' ? 'class="'.$table_class.'" ' : null;
		
		$table = '<table cellpadding="0" cellspacing="0" '.$table_class.' >';
		
		if ($header != '') {

			$ths = '';

			foreach ($header_arr as $title) {
			
				$ths .= '<th>'.trim($title).'</th>';
			
			}

			$table .= '<thead><tr>'.$ths.'</tr></thead>';

		}

		if(!$content = trim($this->tag_content)) return;

		$rows = explode("\n", $content);

		foreach ($rows as $key => $row) {

			$remove = array('<p>','</p>','<pre class="brush: lex">','</pre>');
			
			$row = str_replace($remove, '', $row);

			if ($row !== '') {

				$columns = explode($this->get_param('coldelimiter', '|'), $row);

				$tds = '';

				foreach ($columns as $k => $col_text) {
					
					$width = $colwidth != '' ? 'width="'.$colwidth_arr[$k].'" ' : null;

					$class = $colclass != '' ? 'class="'.$colclass_arr[$k].'" ' : null;

					$style = $colstyle != '' ? 'style="'.$colstyle_arr[$k].'" ' : null;

					$tds .= '<td '.$width.$class.$style.' >'.$col_text.'</td>';
				
				}

				$odd_even = $key % 2 ? 'odd' : 'even';

				$table .= '<tr class="'.$odd_even.'" >'.$tds.'</tr>';

			}
		
		}

		return '<tbody>'.$table.'</tbody></table>';

	}

}