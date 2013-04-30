# Theme Plugin

The _theme_ plugin gives you access to theme assets and partials. It is a critical and extremely useful plugin for building your sites with PyroCMS.

The theme plugin's slug is __theme__, so it can be used like so:

	{{ noparse }}{{ theme:function }}{{ /noparse }}

## theme:options

Displays an option for the current theme. To read more about this tag and its usage refer to the {{ link uri="concepts/themes" title="theme documentation" }}.</a>

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">option</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Option slug to request from theme.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; if theme:options:layout == 'full-width' &#125;&#125;{{ /noparse }}

		{{ noparse }}&lt;div class="full-width"&gt;{{ /noparse }}

			{{ noparse }}{{ template:body }}{{ /noparse }}

		{{ noparse }}&lt;/div&gt;{{ /noparse }}

	{{ noparse }}{{ endif }}{{ /noparse }}

## theme:partial

Loads partial from the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">name</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name slug of the theme to be loaded.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:partial name="header" &#125;&#125;{{ /noparse }}

## theme:css

Generates a `<link>` to a css file in the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">file</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of the css file.</td>
		</tr>
		<tr>
			<td width="100">type</td>
			<td width="100">text/css</td>
			<td width="100">No</td>
			<td>The type attribute.</td>
		</tr>
		<tr>
			<td width="100">title</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>The title attribute.</td>
		</tr>
		<tr>
			<td width="100">media</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>The media attribute.</td>
		</tr>
		<tr>
			<td width="100">rel</td>
			<td width="100">stylesheet</td>
			<td width="100">No</td>
			<td>The rel attribute.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:css file="style.css" &#125;&#125;{{ /noparse }}

Returns:

	{{ noparse }}&lt;link href="/addons/shared_addons/themes/default/css/style.css" type="text/css" rel="stylesheet" /&gt;{{ /noparse }}

## theme:css_path

Generates an absolute web path to a CSS file in the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">file</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of the CSS file.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:css_path file="style.css" &#125;&#125;{{ /noparse }}

Returns:

	{{ noparse }}/addons/shared_addons/themes/default/css/style.css{{ /noparse }}

## theme:css_url

Generates an absolute URL to a CSS file in the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">file</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of the CSS file.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:css_url file="style.css" &#125;&#125;{{ /noparse }}

Returns:

	{{ noparse }}http://example.com/addons/shared_addons/themes/default/css/style.css{{ /noparse }}

## theme:image

Generates an `<img>` tag for an image in the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">file</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of the image file.</td>
		</tr>
		<tr>
			<td width="100"><em>misc</em></td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>This function will take any other attributes and turn them into img HTML attributes.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:image file="fun.jpg" alt="Fun!" &#125;&#125;{{ /noparse }}

Returns:

	{{ noparse }}&lt;img src="/addons/shared_addons/themes/default/img/fun.jpg" alt="Fun!" /&gt;{{ /noparse }}

## theme:image_path

Generates an absolute web path for an image in the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">file</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of the image file.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:image_path file="fun.jpg" &#125;&#125;{{ /noparse }}

Returns:

	{{ noparse }}/addons/shared_addons/themes/default/img/fun.jpg{{ /noparse }}

## theme:image_url

Generates an absolute web URL for an image in the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">file</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of the image file.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:image_url file="fun.jpg" &#125;&#125;{{ /noparse }}

Returns:

	{{ noparse }}http://example.com/addons/shared_addons/themes/default/img/fun.jpg{{ /noparse }}

## theme:js

Generates a `<script>` link for a javascript file in the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">file</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of the javascript file.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:js file="extra.js" &#125;&#125;{{ /noparse }}

Returns:

	{{ noparse }}&lt;script type="text/javascript" src="/addons/shared_addons/themes/default/js/extra.js"&gt;&lt;/script&gt;{{ /noparse }}

## theme:js_path

Generates an absolute web path for a javascript file in the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">file</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of the javascript file.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:js_path file="extra.js" &#125;&#125;{{ /noparse }}

Returns:

	{{ noparse }}/addons/shared_addons/themes/default/js/extra.js{{ /noparse }}

## theme:js_url

Generates an asbolute web path for a javascript file in the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">file</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of the javascript file.</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:js_url file="extra.js" &#125;&#125;{{ /noparse }}

Returns:

	{{ noparse }}http://example.com/addons/shared_addons/themes/default/js/extra.js{{ /noparse }}

## theme:favicon

Generates a `<link>` tag for a favicon file in the current theme.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>file</td>
			<td>favicon.ico</td>
			<td>No</td>
			<td>Favicon file.</td>
		</tr>
		<tr>
			<td>rel</td>
			<td>shortcut icon</td>
			<td>No</td>
			<td>Favicon rel.</td>
		</tr>
		<tr>
			<td>type</td>
			<td>image/x-icon</td>
			<td>No</td>
			<td>Favicon type.</td>
		</tr>
		<tr>
			<td>xhtml</td>
			<td>true</td>
			<td>No</td>
			<td>Need a W3C valid link tag xhtml? Enter false if you use HTML5.</td>
		</tr>
		<tr>
			<td>base</td>
			<td>path</td>
			<td>No</td>
			<td>"path" or "url".</td>
		</tr>
	</tbody>
</table>

**Example:**

	{{ noparse }}&#123;&#123; theme:favicon file="favicon.png" &#125;&#125;{{ /noparse }}

Returns:

	{{ noparse }}&lt;link href="/system/cms/themes/default/img/favicon.png" rel="shortcut icon" type="imagem/x-icon"&gt;{{ /noparse }}

## theme:variables

Sets or retrieves a variable for the theme of your choosing. Variables can be set in a layout and be used anywhere thereafter.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">name</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Name of variable.</td>
		</tr>
		<tr>
			<td width="100">value</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>Value to set. Leave blank to retrieve a previously set variable.</td>
		</tr>
	</tbody>
</table>

**Example (Variable Setting - nothing displayed):**

	{{ noparse }}{{ theme:variables name="day_or_night" value="day" }}{{ /noparse }}

**Example (Variable Retrieval):**

	{{ noparse }}{{ theme:variables name="day_or_night" }}{{ /noparse }}

Returns:

	day

## theme:lang

Displays a language string from the current language for the theme of you choosing. Language files are typically stored in the theme folder.

**Attributes**
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">line</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>The array key of the language string that you wish to display.</td>
		</tr>
		<tr>
			<td width="100">lang</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>The language file that you wish to load. The file should store under <dfn>/themes/[theme folder]/languages/[language code]/[language file]</dfn></td>
		</tr>
		<tr>
			<td width="100">default</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>The default value will be displayed when the language line returns <code>false</code>.</td>
		</tr>
	</tbody>
</table>

**Example (Displaying a line "theme_title" from language "theme" file):**

	{{ noparse }}{{ theme:lang lang="theme" line="theme_title" default="PyroCMS" }}{{ /noparse }}

