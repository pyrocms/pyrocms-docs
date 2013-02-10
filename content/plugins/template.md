# Template Plugin

The _template_ plugin gives flexibility to change template data at a later time in the page.


## template:title

Get the title generated or set for the template.

	{{noparse}}{{ template:title }}{{/noparse}}

<div class="tip"><strong>NOTE:</strong> Use this instead of <code>page:title</code> because this will be shown on all pages while <code>page:title</code> is only specific to the Pages module.</div>

## template:set_title

Sets the page title to the passed in value. You can separate multiple sections with commas. Each call to this method will replace any prior title text.

	{{noparse}}{{ template:set_title value="My Custom Page Title, Another Segment" }}{{/noparse}}

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>value</td>
			<td></td>
			<td>Yes</td>
			<td>Comma separated string for title segments</td>
		</tr>
	</tbody>
</table>


## template:set_metadata

Set metadata for various meta tags. This will overwrite any existing tags set with the same name.

	{{noparse}}{{ template:set_metadata name="description" value="My Description" type="meta" }}{{/noparse}}

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>name</td>
			<td></td>
			<td>Yes</td>
			<td>Meta tag <code>name</code> attribute</td>
		</tr>
		<tr>
			<td>value</td>
			<td></td>
			<td>Yes</td>
			<td>Meta tag <code>value</code> attribute</td>
		</tr>
		<tr>
			<td>type</td>
			<td>meta</td>
			<td>No</td>
			<td><code>meta</code>, <code>link</code>, or <code>og</code></td>
		</tr>
	</tbody>
</table>


## template:set_breadcrumb

Add items to the breadcrumb or replace all and start over.

	{{noparse}}{{ template:set_breadcrumb name="My Page" uri="some-page" reset="true" }}{{/noparse}}

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>name</td>
			<td></td>
			<td>Yes</td>
			<td>Text to display in the breadcrumb segment</td>
		</tr>
		<tr>
			<td>uri</td>
			<td></td>
			<td>Yes</td>
			<td>Full URI path to the page for this item. Set to an empty string <code>""</code> if this is the current page.</td>
		</tr>
		<tr>
			<td>reset</td>
			<td>false</td>
			<td>No</td>
			<td>Reset or clear and previous breadcrumbs</td>
		</tr>
	</tbody>
</table>


## template:partial

Load a template partial previously set with `$this->template->set_partial()` or `$this->template->inject_partial()`.

	{{noparse}}{{ template:partial name="sidebar" }}{{/noparse}}

<div class="tip"><strong>NOTE:</strong> If you want to load a partial file from your theme on-the-fly, use {{ link uri="plugins/theme#theme-partial" title="<code>theme:partial</code>" }} instead.</div>

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>name</td>
			<td></td>
			<td>Yes</td>
			<td>Name you previously set the partial under</td>
		</tr>
	</tbody>
</table>


## template:has_partial

Check if a template partial exists. If it does, parse the content inside the tags where `{{noparse}}{{ partial }}{{/noparse}}` will be the partials contents. Template partials are set with `$this->template->set_partial()` or `$this->template->inject_partial()`.

	{{noparse}}{{ template:has_partial name="sidebar" }}
  <h2>Sidebar</h2>
  {{ partial }}
{{ /template:has_partial }}{{/noparse}}

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>name</td>
			<td></td>
			<td>Yes</td>
			<td>Name you previously set the partial under</td>
		</tr>
	</tbody>
</table>


## template:has_breadcrumbs

Check if the template has breadcrumbs set.

	{{noparse}}{{ if {template:has_breadcrumbs} }}
  {{ template:breadcrumbs }}
  {{ if uri }}
    {{ url:anchor segments=uri title=name }}
  {{ else }}
    {{ name }}
  {{ endif }}
  {{ /template:breadcrumbs }}
{{ endif }}{{/noparse}}


## template:metadata

Get the meta tags of the page, in a string.

	{{noparse}}{{ template:metadata }}{{/noparse}}

<div class="tip"><strong>NOTE:</strong> This will only return the metadata set in the <em>header</em> group.</div>
