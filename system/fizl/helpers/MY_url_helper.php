<?php

function anchor_format($string, $separator = 'dash', $lowercase = false) {
	
	$replace = ($separator == 'dash') ? '-' : '_';

	$custom = array(
		', [' => '[,', // optional params
		', ]' => ']', // end optional params
		', $' => ',', // remove $ from params and vars
		', ' => $replace, // shrink up param space
		'+' => 'and', // hope we meant 'and'
		'array()' => 'array', // remove array parens
		':' => $replace, // replace standalone colon
		' = \'\'' => '', // remove blank params
		' = \"\"' => '', // remove blank params
		'/' => $replace, // for and/or
		'. ' => $replace, // multi-sentence
		'.' => '_', // filename support: index_php
	);
	
	# safe characters
	$safe = 'a-z0-9\-\._\(\):,\[\]\&'; // anchors can take more than normal chars
	
	// url_title() original
	$trans = array(
		'\s*=\s*'        => ':', // param values
		'&\#\d+?;'       => '', // html digit entities; gets decoded
		'&\S+?;'         => '', // html entities; gets decoded
		'\s+'            => $replace, // multiple spaces
		'[^'.$safe.']'   => '', // convert non-safe chars
		$replace.'+'     => $replace, // multiple-replace to one
		$replace.'$'     => '', // trim replace
		'^'.$replace     => '', // trim replace
		'\.+$'           => ''  // periods at end
	);
	
	// convert our custom matches to safe characters first
	$string = str_replace(array_keys($custom),array_values($custom),$string);
	
	// then convert everything else
	foreach ($trans as $key => $val)
	{
		if (preg_match('#^&#i', $key))
		{
			// convert HTML entities back to crazy chars
			if ( ! function_exists('_hed')) {
				function _hed($matches) {
					return html_entity_decode($matches[0]);
				}
			}
			$string = preg_replace_callback("#".$key."#i", '_hed', $string);
		}
		else
		{
			$string = preg_replace("#".$key."#i", $val, $string);
		}
	}

	if ($lowercase === true)
	{
		$string = strtolower($string);
	}

	return trim(stripslashes($string));
}