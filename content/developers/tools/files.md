# Files

The files module is a central place to store any kind of file that you will use in your site content. It manages 
uploads and also integrates with cloud providers. It has a powerful library that takes care of all the 
complicated things for addon developers. It takes your input and returns a standardized array as the result.

To use the library you must first load it using <kbd>$this->load->library('files/files');</kbd> You are then ready to start using it in your module.

*Note that you must set up your cloud provider credentials in CP > Settings > Files before you can interact with a cloud location*

## Results

The first thing you should know is that every action performed by the Files library will return an array. It will be in this format:

	array('status' => true, 'message' => 'A message string in the current language', 'data' => $any_available_data);

## Creating a folder

#### Usage

	Files::create_folder($parent_id, $folder_name);

#### Parameters

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Required</th>
			<th>Type</th>
		</tr>
		<tr>
			<td>$parent_id</td>
			<td>The id of the folder that this should be a child of. Use 0 to set this folder as top level.</td>
			<td>Yes</td>
			<td>Integer</td>
		</tr>
		<tr>
			<td>$folder_name</td>
			<td>The name to give this folder. Defaults to 'Untitled Folder'</td>
			<td>No</td>
			<td>String</td>
		</tr>
		<tr>
			<td>$location</td>
			<td>The location (local, rackspace-cf, or amazon-s3). Defaults to local</td>
			<td>No</td>
			<td>String</td>
		</tr>
		<tr>
			<td>$remote_container</td>
			<td>If the location is a cloud provider then you must specify the bucket/container name.</td>
			<td>No</td>
			<td>String</td>
		</tr>
	</tbody>
</table>

## Uploading a file

#### Usage

To upload a file you must have a form in your view so that the user can select the file they wish to upload. It must be a multipart form.

	< ?php echo form_open_multipart('your-module/upload');? >
		<input type="file" name="userfile" />
	< ?php echo form_close(); ? >

Now in your controller:

	Files::upload($folder_id, $name);

Here's the cool part: if the folder that you are uploading to has its location set to a cloud provider the 
file will be uploaded to the cloud with no extra effort on your part.

#### Parameters

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Required</th>
			<th>Type</th>
		</tr>
		<tr>
			<td>$folder_id</td>
			<td>The id of the folder to upload to.</td>
			<td>Yes</td>
			<td>Integer</td>
		</tr>
		<tr>
			<td>$name</td>
			<td>The name to give the file. Defaults to the uploaded file's filename.</td>
			<td>No</td>
			<td>String</td>
		</tr>
		<tr>
			<td>$field</td>
			<td>The input field name. Default is 'userfile'.</td>
			<td>No</td>
			<td>String</td>
		</tr>
		<tr>
			<td>$width</td>
			<td>If you wish to resize the image while uploading you can pass the desired width.</td>
			<td>No</td>
			<td>Integer</td>
		</tr>
		<tr>
			<td>$height</td>
			<td>If you wish to resize the image while uploading you can pass the desired height.</td>
			<td>No</td>
			<td>Integer</td>
		</tr>
		<tr>
			<td>$ratio</td>
			<td>If resizing the image should the resizer try to keep the same width to height ratio?</td>
			<td>No</td>
			<td>Boolean</td>
		</tr>
		<tr>
			<td>$allowed_types</td>
			<td>A string of allowed types for uploading, separated by pipe characters. Ex: png|jpg. Defaults to the file type of the file being uploaded.</td>
			<td>No</td>
			<td>String</td>
		</tr>
		<tr>
			<td>$alt</td>
			<td>Value for the 'alt_attribute' column for files. Useful for photos.</td>
			<td>No</td>
			<td>String</td>
		</tr>
		<tr>
			<td>$replace_file</td>
			<td>If you want to update a file on the server, pass a file row object in this parameter. It will update the file instead of creating a new one, preserving the filename, name, description, and alt_attribute fields.</td>
			<td>No</td>
			<td>Mixed</td>
		</tr>

	</tbody>
</table>

#### Array Returned

Files::upload returns the following:

* id
* folder_id
* user_id
* type
* name
* path
* description
* filename
* extension
* mimetype
* filesize
* width
* height
* date_added

#### Example Usage

	$results = Files::upload($folder_id = 1);
	
	if ($results['status']) {
		$data = $results['data'];
	} else {
		$this->session->set_flashdata($results['status'] ? 'success' : 'notice', $results['message']);
	}


## Available Methods

    // create a virtual folder
    create_folder($parent = 0, $name = 'Untitled Folder', $location = 'local', $remote_container = '')
    // check if a container is available in a cloud location
    check_container($name, $location)
    // create a container at a cloud location
    create_container($container, $location, $folder_id = 0)
    // get the contents of a folder
    folder_contents($folder_id = 0)
    // get a multidimensional array of all virtual folders
    folder_tree()
    // rename a virtual folder
    rename_folder($id = 0, $name)
    // delete a virtual folder
    delete_folder($id)
    // upload a file
    upload($folder_id, $name = FALSE, $field = 'userfile', $width = FALSE, $height = FALSE, $ratio = FALSE)
    // rename a local file (default) or move between local and cloud locations or between cloud providers
    move($file_id, $new_name = FALSE, $location = FALSE, $new_location = 'local', $container = '')
    // get a file by filename or id
    get_file($identifier = 0)
    // get all files records recorded in the database
    get_files($location = 'local', $container = '')
    // list all physical files. Does not depend on database records
    list_files($location = 'local', $container = '')
    // refresh the database records for this folder. Fetches new files from the cloud and deletes db records if file no longer exists.
    synchronize($folder_id)
    // rename a file both in the database and on the filesystem if it's a local file. Only changes the record for cloud files
    rename_file($id = 0, $name)
    // deletes a file 
    delete_file($id = 0)
    // searches folders and files for the term. Returns [limit] of each
    search($search = '', $limit = 5)