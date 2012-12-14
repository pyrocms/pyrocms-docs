# Files Plugin

The _files_ plugin allows users to list files inside a folder, display paths to images, create download links, and display resized images

## files:listing

	{{ noparse }}{{ files:listing }}{{ /noparse }}

Creates a list of files within the specified folder.

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
			<td width="100">folder</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Required. The folder to display files from. Can be an ID (123) or a path (images/blog/kittens).</td>
		</tr>
		<tr>
			<td>limit</td>
			<td>10</td>
			<td>No</td>
			<td>Maximum number of files to return.</td>
		</tr>
		<tr>
			<td>offset</td>
			<td></td>
			<td>No</td>
			<td>Skip this many files. Usually used together with limit.</td>
		</tr>
		<tr>
			<td>type</td>
			<td></td>
			<td>No</td>
			<td>Only return files of this type. Valid values: a, v, d, i, o. (audio, video, document, image, other)</td>
		</tr>
		<tr>
			<td>fetch</td>
			<td>None</td>
			<td>No</td>
			<td>Return the files in the subfolders specified. Separate multiple folders with the pipe character: <code>blog|pages</code></td>
		</tr>
		<tr>
			<td>order-by</td>
			<td>id</td>
			<td>No</td>
			<td>Database column to order pages by.</td>
		</tr>
	</tbody>
</table>


### Image Usage

This example would create a list of thumbnails 200px wide by 150px tall:

	{{ noparse }}
	{{ files:listing folder=&quot;5&quot; }}
		&lt;img src="{{ url:site }}files/thumb/{{ id }}/200/150" alt="{{ description }}"/>
	{{ /files:listing }}

	Available Variables:
	{{ id }}
	{{ file_id }}
	{{ folder_id }}
	{{ user_id }}
	{{ type }}
	{{ name }}
	{{ filename }}
	{{ description }}
	{{ extension }}
	{{ mimetype }}
	{{ width }}
	{{ height }}
	{{ filesize }}
	{{ date_added }}{{ /noparse }}
	
Returns:

	<img src="http://pyrocms.com/files/thumb/1/200/150" alt="foo description"/>
	<img src="http://pyrocms.com/files/thumb/2/200/150" alt="bar description"/>
	<img src="http://pyrocms.com/files/thumb/3/200/150" alt="baz description"/>

### File Usage

You can could also create a list of file download links:

	{{ noparse }}
	{{ files:listing folder=&quot;5&quot; }}
		&lt;a href="{{ url:site }}files/download/{{ id }}">Download {{ name }}&lt;/a>
	{{ /files:listing }}

	Available Variables:
	{{ id }}
	{{ folder_id }}
	{{ user_id }}
	{{ type }}
	{{ name }}
	{{ filename }}
	{{ description }}
	{{ extension }}
	{{ mimetype }}
	{{ filesize }}
	{{ date_added }}{{ /noparse }}
	
Returns:

	<a href="http://pyrocms.com/files/thumb/1/200/150">Download foo description</a>
	<a href="http://pyrocms.com/files/thumb/2/200/150">Download bar description</a>
	<a href="http://pyrocms.com/files/thumb/3/200/150">Download baz description</a>

## files:folder_exists

	{{ noparse }}{{ files:folder_exists slug="sample_folder" }}{{ /noparse }}

Check if the specified folder really does exist. Returns boolean.

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
			<td>Required. The folder slug to check for.</td>
		</tr>
	</tbody>
</table>

## files:exists

	{{ noparse }}{{ files:exists id="45" }}{{ /noparse }}

Check if the specified file really does exist. Returns boolean.

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
			<td>The file id to check for</td>
		</tr>
	</tbody>
</table>

## files:path

	{{ noparse }}{{ files:path id="45" }}{{ /noparse }}

Returns the filesystem path to the file.

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
			<td>The file id that you want the path for</td>
		</tr>
	</tbody>
</table>

## files:url

	{{ noparse }}{{ files:url id="45" }}{{ /noparse }}

Returns the url to the file.

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
			<td>The file id that you want the URL for</td>
		</tr>
	</tbody>
</table>

## files:image_path

	{{ noparse }}{{ files:image_path id="45" }}{{ /noparse }}

Returns the filesystem path to the image.

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
			<td>Required. The file id of the image.</td>
		</tr>
	</tbody>
</table>

## files:image_url

	{{ noparse }}{{ files:image_url id="45" }}{{ /noparse }}

Returns the url to the image.

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
			<td>The file id of the image</td>
		</tr>
	</tbody>
</table>

## files:image

	{{ noparse }}{{ files:image id="45" width="100" height="100" mode="fill" }}{{ /noparse }}

Returns an image tag for the specified image.

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
			<td>The file id of the image</td>
		</tr>
		<tr>
			<td>width</td>
			<td>100</td>
			<td>No</td>
			<td>For images specify the desired width in pixels for it to be resized to.</td>
		</tr>
		<tr>
			<td>height</td>
			<td>100</td>
			<td>No</td>
			<td>For images specify the desired height in pixels for it to be resized to.</td>
		</tr>
		<tr>
			<td>size</td>
			<td>None</td>
			<td>No</td>
			<td>For images specify the desired width/height. Shorthand for the width and height attributes above. <code>size="200/150"</code></td>
		</tr>
		<tr>
			<td>mode</td>
			<td>None</td>
			<td>No</td>
			<td>The resize mode to use when resizing an image. May be either "fit" or "fill".</td>
		</tr>
	</tbody>
</table>