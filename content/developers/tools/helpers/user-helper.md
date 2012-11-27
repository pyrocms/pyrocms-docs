# User Helper

A collection of helper functions included with the Users module.

## Functions


### is\_logged\_in()

Checks if the user is logged in. Returns bool.


### group\_has\_role($module, $role)

Checks if the current users group has a specific role. Returns bool.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>module</td>
			<td></td>
			<td>Yes</td>
			<td>Module slug</td>
		</tr>
		<tr>
			<td>role</td>
			<td></td>
			<td>Yes</td>
			<td>The role to test against</td>
		</tr>
	</tbody>
</table>

	// usage
	group_has_role('pages', 'put_live');


### role\_or\_die($module, $role, $redirect\_to = 'admin', $message = '')

Tests if the current user has a specific role or redirects with a flashdata message.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="80">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>module</td>
			<td></td>
			<td>Yes</td>
			<td>Module slug</td>
		</tr>
		<tr>
			<td>role</td>
			<td></td>
			<td>Yes</td>
			<td>The role to test against</td>
		</tr>
		<tr>
			<td>redirect_to</td>
			<td>admin</td>
			<td>No</td>
			<td>The URL to redirect to if no access</td>
		</tr>
		<tr>
			<td>message</td>
			<td><code>lang('cp_access_denied')</code></td>
			<td>No</td>
			<td>The flashdata message to display if no access</td>
		</tr>
	</tbody>
</table>

	// usage
	role_or_die('pages', 'edit', 'admin/dashboard', 'Sorry, you can\'t edit pages.')


### user_displayname($user, $linked = true)

Return a users display name based on settings.

<div class="tip"><strong>Note:</strong> If no <code>display_name</code> is set, this function will return the <code>username</code> instead.</div>

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th width="100">Name</th>
			<th width="100">Default</th>
			<th width="100">Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>user</td>
			<td></td>
			<td>Yes</td>
			<td>The ID of the user</td>
		</tr>
		<tr>
			<td>linked</td>
			<td>true</td>
			<td>No</td>
			<td>Include a link to the users profile?</td>
		</tr>
	</tbody>
</table>