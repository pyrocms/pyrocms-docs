# User Tags

The <em>user</em> plugin gives you access to user data and logic.

## user:logged_in

	{{ noparse }}{{ user:logged_in }}{{ /noparse }}

Checks if a user is logged in or not. Can be used as a variable pair to display data only to logged in users, and a single tag to return TRUE or FALSE whether or not the user is logged in.

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>
				Name</th>
			<th>
				Default</th>
			<th>
				Required</th>
			<th>
				Description</th>
		</tr>
		<tr>
			<td width="100">
				group</td>
			<td width="100">
				None</td>
			<td width="100">
				No</td>
			<td>
				Group slug. Used to check if a user is not only logged in, but part of a particular group.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ if user:logged_in }}
	&lt;p&gt;This is just for logged in users.&lt;/p&gt;
{{ /user:logged_in }}{{ /noparse }}

## user:not\_logged\_in

	{{ noparse }}{{ user:not_logged_in }}{{ /noparse }}

Identical to the function above, but checks to see if a user is not logged in. Also takes the <em>group</em> parameter. Must be used as a tag pair.</p>

### Variables

The user plugin also gives you access to various user variables using the following syntax:

	{{ noparse }}{{ user:<em>variable</em> }}{{ /noparse }}
<p>
	Below is a table of available variables.</p>
<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>
				Variable</th>
			<th>
				Notes</th>
		</tr>
		<tr>
			<td width="200">
				id</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				group_id</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				ip_address</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				active</td>
			<td>
				1 or 0.</td>
		</tr>
		<tr>
			<td width="200">
				activation_code</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				created_on</td>
			<td>
				Unix format.</td>
		</tr>
		<tr>
			<td width="200">
				last_login</td>
			<td>
				Unix format.</td>
		</tr>
		<tr>
			<td width="200">
				username</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				display_name</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				forgotten_password_code</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				remember_code</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				group</td>
			<td>
				Group slug.</td>
		</tr>
		<tr>
			<td width="200">
				group_description</td>
			<td>
				Group name.</td>
		</tr>
		<tr>
			<td width="200">
				first_name</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				last_name</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				company</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				phone</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				lang</td>
			<td>
				Language code (ie: &quot;en&quot; for English).</td>
		</tr>
		<tr>
			<td width="200">
				bio</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				dob</td>
			<td>
				Date of birth. Unix format.</td>
		</tr>
		<tr>
			<td width="200">
				gender</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				mobile</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				address_line1</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				address_line2</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				address_line3</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				postcode</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				website</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				msn_handle</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				aim_handle</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				yim_handle</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				gtalk_handle</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="200">
				gravatar</td>
			<td>
				&nbsp;</td>
		</tr>
	</tbody>
</table>