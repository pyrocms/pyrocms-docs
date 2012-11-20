<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Format Plugin
 *
 * Allows you to format text with:
 *
 * - Markdown
 * - Textile
 *
 * @package		Fizl
 * @author		Adam Fairholm (@adamfairholm)
 * @copyright	Copyright (c) 2011-2012, Parse19
 * @license		http://parse19.com/fizl/docs/license.html
 * @link		http://parse19.com/fizl
 */
class Format extends Plugin {

	/**
	 * Markdown the content
	 */
	public function format()
	{
		$this->CI = get_instance();

		$this->CI->load->helper('url');

		$method = $this->get_param('method', 'markdown');
		
		// Prep our content
		$content = trim($this->tag_content);
		
		switch($method):
		
			// Textile
			case 'textile':
				$this->CI->load->library('Textile');
				$html = $this->CI->textile->TextileThis($content);
				return $this->html_dom($html);
				break;
		
			// Default is markdown
			default:
				require_once('markdown.php');
				$html = Markdown($content);
				return $this->html_dom($html);
				break;
		
		endswitch;
	}

	// Automates the formating of specific HTML elements
	private function html_dom($html) {

		require_once('simple_html_dom.php');
		
		$html_dom = str_get_html($html, false, false, DEFAULT_TARGET_CHARSET, false);
		
		// Get elements. Similar to using jQuery selectors
		$headings = $html_dom->find('h1,h2,h3,h4,h5,h6');
		
		$h_innertexts = array();

		foreach ($headings as $key => $h) {
		
			// Generate an array of heading inner texts
			$h_innertexts[] = $h->innertext;

			// Verify repeated instances
			$instances = array_keys($h_innertexts, $h->innertext, true);

			// If there is more of the same, make the slug unique by adding the count
			$make_unique = count($instances) > 1 ? '-'.count($instances) : '';

			$slug = url_title($h->plaintext, 'dash', true).$make_unique;
			
			// Add the slug to id to keep compatibility with docs plugin {{ docs:id_link title="Example" }}
			$h->id = $slug;

			// Set the top link for all headings after the first
			$link_top = $key > 0 ? '<a class="anchor-top hidden" href="'.current_url().'#top">&uarr;</a>' : '';

			// Set the anchor link for all headings after the first
			$link_anchor = $key > 0 ? '<a name="'.$slug.'"class="anchor hidden" href="'.current_url().'#'.$slug.'"></a>' : '';
			
			// Add everythig together and overwrite the innertext property
			$h->innertext = $link_anchor.$h->innertext.$link_top;
		
		}
		
		// Returns the newly formatted html
		return $html_dom->save();
	}

}