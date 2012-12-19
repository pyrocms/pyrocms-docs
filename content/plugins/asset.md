# Asset Plugin

The _asset_ plugin gives you access to various functions that interact with the {{ link title="Assets Library" uri="developers/tools/assets" }}.

<div class="tip"><strong>NOTE:</strong> Using <em>asset</em> plugin functions will still require proper namespace usage. Please see {{ link title="Paths and namespacing" uri="developers/tools/assets#paths-and-namespacing" }}.</div>

## asset:css

	{{ noparse }}{{ asset:css file="theme::styles.css" file_min="theme::styles.min.css" group="global" }}{{ /noparse }}
	
Adds a stylesheet to a specific group. Returns empty.

### Attributes

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
			<td>The <code>namespace::filename.css</code> of the file</td>
		</tr>
		<tr>
			<td width="100">file_min</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>The <code>namespace::filename.css</code> for the minified version of the file, if available.</td>
		</tr>
		<tr>
			<td width="100">group</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>The group you wish to add the file to. If empty, it will be added and rendered with the <strong>global</strong> group.</td>
		</tr>
	</tbody>
</table>

### Example

#### Adding a new file to a specific group

	{{ noparse }}{{ asset:css file="theme::products.css" group="page" }}{{ /noparse }}

Returns:

	(empty) Adds the stylesheet to the 'page' group which will need to be rendered later.


## asset:css_inline

	{{noparse}}{{ asset:css_inline }}
	#content { background: red }
{{ /asset:css_inline }}{{/noparse}}

Add inline CSS to be output later. Inline CSS is not grouped so everything will be added to the same global group. Also, inline CSS is not output automatically like the rest of the assets. You will need to use <a href="plugins/asset#asset-render_css_inline"><code>asset:render\_css\_inline</code></a> to output the CSS.

<div class="tip"><strong>NOTE:</strong> Inline CSS is automatically wrapped in a <code>&lt;style&gt;</code> tag so you do not need to include it. </div>

## asset:css_url

	{{ noparse }}{{ asset:css_url file="theme::styles.css" }}{{ /noparse }}
	
Returns the full file URL to a CSS asset.

### Attributes

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
			<td>The <code>namespace::filename.css</code> of the file</td>
		</tr>
	</tbody>
</table>

### Example

#### Returning the full file URL

	{{ noparse }}{{ asset:css_url file="theme::styles.css" }}{{ /noparse }}

Returns:

	http://www.domain.com/system/cms/themes/default/css/style.css


## asset:css_path

	{{ noparse }}{{ asset:css_path file="theme::styles.css" }}{{ /noparse }}
	
Returns the file path to a CSS asset.

### Attributes

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
			<td>The <code>namespace::filename.css</code> of the file</td>
		</tr>
	</tbody>
</table>

### Example

#### Returning the file path

	{{ noparse }}{{ asset:css_path file="theme::styles.css" }}{{ /noparse }}

Returns:

	/system/cms/themes/default/css/style.css



## asset:js

	{{ noparse }}{{ asset:js file="core::actions.js" file_min="core::actions.min.js" group="global" }}{{ /noparse }}
	
Adds a JavaScript file to a specific group. Returns empty.

### Attributes

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
			<td>The <code>namespace::filename.js</code> of the file</td>
		</tr>
		<tr>
			<td width="100">file_min</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>The <code>namespace::filename.js</code> for the minified version of the file, if available.</td>
		</tr>
		<tr>
			<td width="100">group</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>The group you wish to add the file to. If empty, it will be added and rendered with the <strong>global</strong> group.</td>
		</tr>
	</tbody>
</table>

### Example

#### Adding a new JS file to a specific group

	{{ noparse }}{{ asset:js file="theme::rotator.js" group="effects" }}{{ /noparse }}

Returns:

	(empty) Adds the JavaScript file to the 'effects' group which will need to be rendered later.


## asset:js_inline

	{{noparse}}{{ asset:js_inline }}
	alert('Welcome to our site');
{{ /asset:js_inline }}{{/noparse}}

Add inline JS to be output later. Inline JS is not grouped so everything will be added to the same global group. Also, inline JS is not output automatically like the rest of the assets. You will need to use <a href="plugins/asset#asset-render_js_inline"><code>asset:render\_js\_inline</code></a> to output the JS.

<div class="tip"><strong>NOTE:</strong> Inline JS is automatically wrapped in a <code>&lt;script&gt;</code> tag so you do not need to include it. </div>


## asset:js_url

	{{ noparse }}{{ asset:js_url file="theme::rotator.js" }}{{ /noparse }}
	
Returns the full file URL to a JavaScript asset.

### Attributes

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
			<td>The <code>namespace::filename.js</code> of the file</td>
		</tr>
	</tbody>
</table>

### Example

#### Returning the full file URL

	{{ noparse }}{{ asset:js_url file="theme::actions.js" }}{{ /noparse }}

Returns:

	http://www.domain.com/system/cms/themes/default/js/actions.js


## asset:js_path

	{{ noparse }}{{ asset:js_path file="theme::actions.js" }}{{ /noparse }}
	
Returns the file path to a JavaScript asset.

### Attributes

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
			<td>The <code>namespace::filename.js</code> of the file</td>
		</tr>
	</tbody>
</table>

### Example

#### Return the file path

	{{ noparse }}{{ asset:js_path file="theme::actions.js" }}{{ /noparse }}

Returns:

	/system/cms/themes/default/js/actions.js



## asset:image

	{{ noparse }}{{ asset:image file="theme::icon.png" alt="Icon Image" }}{{ /noparse }}
	
Outputs an `<img>` tag for the specified file.

### Attributes

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
			<td>The <code>namespace::filename.ext</code> of the file</td>
		</tr>
		<tr>
			<td width="100">alt</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>The <code>alt</code> attribute for the image tag</td>
		</tr>
		<tr>
			<td width="100"><em>attribute</em>="<em>value</em>"</td>
			<td width="100">None</td>
			<td width="100">No</td>
			<td>Allows you to have additional attributes, passed in like so: <code>class="something" id="content"</code></td>
		</tr>
	</tbody>
</table>

### Example

#### Adding an image to the page

	{{ noparse }}{{ asset:image file="theme::logo.jpg" alt="Company Logo" }}{{ /noparse }}

Returns:

	<img src="http://www.domain.com/system/cms/themes/default/img/logo.jpg" alt="Company Logo" />


#### Adding an image with additional attributes

	{{ noparse }}{{ asset:image file="theme::george.jpg" alt="George Costanza" id="george_costanza" class="person_img" }}{{ /noparse }}

Returns:

	<img id="george_costanza" class="person_img" src="http://www.domain.com/system/cms/themes/default/img/logo.jpg" alt="George Costanza" />


## asset:image_url

	{{ noparse }}{{ asset:image_url file="theme::under_construction.gif" }}{{ /noparse }}
	
Returns the full file URL to an image asset.

### Attributes

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
			<td>The <code>namespace::filename.ext</code> of the file</td>
		</tr>
	</tbody>
</table>

### Example

#### Returning a full file URL

	{{ noparse }}{{ asset:image_url file="theme::foobar.gif" }}{{ /noparse }}

Returns:

	http://www.domain.com/system/cms/themes/default/img/foobar.gif


## asset:image_path

	{{ noparse }}{{ asset:image_path file="theme::flame.png" }}{{ /noparse }}
	
Returns the file path to an image asset.

### Attributes

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
			<td>The <code>namespace::filename.ext</code> of the file</td>
		</tr>
	</tbody>
</table>

### Example

#### Returning a file path

	{{ noparse }}{{ asset:image_path file="theme::flame.png" }}{{ /noparse }}

Returns:

	/system/cms/themes/default/img/flame.png




## asset:render

	{{ noparse }}{{ asset:render group="global" }}{{ /noparse }}
	
Renders the requested group (CSS and JS) and returns the output tags.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">group</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>The group name</td>
		</tr>
	</tbody>
</table>

### Example

#### Rendering CSS and JS of custom group

	{{ noparse }}{{ asset:render group="effects" }}{{ /noparse }}

Returns:

	(HTML tags for CSS & JS of 'effects' group)


## asset:render_css

	{{ noparse }}{{ asset:render_css group="modal" }}{{ /noparse }}
	
Renders the requested group CSS and returns the output tags.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">group</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>The group name</td>
		</tr>
	</tbody>
</table>

### Example

#### Rendering CSS of custom group

	{{ noparse }}{{ asset:render_css group="modal" }}{{ /noparse }}

Returns:

	(HTML tags for CSS 'modal' group)



## asset:render\_css\_inline

	{{noparse}}{{ asset:render_css_inline }}{{/noparse}}

Render any inline CSS previously set with `asset:css_inline` or `Asset::css_inline()`.

<div class="tip"><strong>NOTE:</strong> Inline CSS is automatically wrapped in a <code>&lt;style&gt;</code> tag so you do not need to include it.</div>


## asset:render_js

	{{ noparse }}{{ asset:render_js group="validation" }}{{ /noparse }}
	
Renders the requested group JS and returns the output tags.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">group</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>The group name</td>
		</tr>
	</tbody>
</table>

### Example

#### Rendering JS of custom group

	{{ noparse }}{{ asset:render_js group="validation" }}{{ /noparse }}

Returns:

	(HTML tags for CSS 'validation' group)


<div class="tip"><strong>NOTE:</strong> Once a group is rendered, it cannot be rendered again. Please see {{ link title="Assets Library" uri="developers/tools/assets" }} for more information.</div>


## asset:render\_js\_inline

	{{noparse}}{{ asset:render_js_inline }}{{/noparse}}

Render any inline JS previously set with `asset:js_inline` or `Asset::js_inline()`.

<div class="tip"><strong>NOTE:</strong> Inline JS is automatically wrapped in a <code>&lt;script&gt;</code> tag so you do not need to include it.</div>