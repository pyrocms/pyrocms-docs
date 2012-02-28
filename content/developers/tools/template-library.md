# Template Library

The template library powers all out the output on the PyroCMS public and admin pages. The template is auto-loaded, so there is no need to load it in your controllers.

## Method Reference

### title(<var>$title1, [$title2, $title3, …]</var>)

Sets the title of the page. You can send as many title parameters as you'd like, although the first one is required. Your titles will be imploded with the title string separator.

#### Example:

	$this->template->title('The Current Page');

### build(<var>$view, [$data]</var>)

The build function is what builds the output for the browser in PyroCMS and is used in lieu of simply loading a view. It will take the theme data, layout, and build those elements automatically, so your view file only needs to contain the actual page content. 

#### Example:

	$this->template->build('form', $this->data);

### set(<var>$var_name, $var_value</var>)

Sets data that can be used in your views. You can provide two strings or an array.

#### Example:

Two strings of data:

	$this->template->set('foo', $bar);
	
Array of data:	
	
	$this->template->set(array('foo' => $bar, 'foo2' => $bar2));
	
### prepend_metadata(<var>$string</var>)

Adds a string to the start of the auto-generated metadata output.

#### Example:

	$this->template->prepend_metadata('<script src="/js/jquery.js"></script>');
	
### append_metadata(<var>$string</var>)

Adds a string to the end of the auto-generated metadata output.

#### Example:

	$this->template->append_metadata('<script src="/js/jquery.flot.js"></script>');
	
### set\_layout(<var>$layout\_name</var>)

Allows you to set a layout from your **your_theme/views/layouts** folder.

#### Example:

	// This will use your_theme/views/layouts/two_col.html
	// as the page layout.
	$this->template->set_layout('two_col');
	
<div class="tip"><strong>Note:</strong> When using Public\_Controller and Admin\_Controller, the layout is already set. However, in some cases, you may prefer to override this function or use set a layout outside of the PyroCMS base controllers.</div>

### set\_theme(<var>$theme\_name</var>)

Allows you to set a theme.

#### Example:

	$this->template->set_layout('my_theme');
	
<div class="tip"><strong>Note:</strong> As with set_layout, the theme is already set when extending either the Public\_Controller and Admin\_Controller.</div>

### enable\_parser(<var>bool</var>)

This allows you to enable the PyroCMS Lex tag parser. When the tag parser is off, PyroCMS tags will not work in your views.

#### Example

	$this->template->enable_parser(true);

### enable_minify(<var>bool</var>)

Enables/disables the minification of assets added via the template library.

#### Example

	$this->template->enable_minify(true);

### get\_theme\_path()

Returns the path of the current theme.

## Chaining

The template library methods are frequently chained in PyroCMS, so you may see the functions called like this:

	$this->template
		->title($this->module_details['name'], lang('keywords:add_title'))
		->set('keyword', $keyword)
		->build('admin/form', $this->data);
