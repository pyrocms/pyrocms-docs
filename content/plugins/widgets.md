# Widgets Plugin

The _widgets_ plugin displays widgets data as defined in the **Content &gt; Widgets** section of the control panel.

## widgets:area

	{{ noparse }}{{ widgets:area }}{{ /noparse }}

Displays all widgets in a widget area.</p>

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
			<td width="100">slug</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Slug for the widget area as defined in CP &gt; Content &gt; Widgets</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ widgets:area slug="sidebar" }}{{ /noparse }}

## widgets:instance

	{{ noparse }}{{ widgets:instance }}{{ /noparse }}

Displays a specific widget instance.

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
			<td width="100">id</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>ID of the widget instance given to you after installing a widget in CP &gt; Content &gt; Widgets.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ widgets:instance id="5" }}{{ /noparse }}
