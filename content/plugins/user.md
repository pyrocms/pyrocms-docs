# User Tags

The <em>user</em> plugin gives you access to user data and logic.

## user:logged_in

	{{ noparse }}{{ user:logged_in }}{{ /noparse }}

Checks if a user is logged in or not. Can be used as a tag pair to limit display of certain code to logged in users, or a single tag that returns TRUE or FALSE depending on whether the user is logged in.

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
			<td width="100">No</td>
			<td>Group slug. Check if a user is not only logged in, but also a member of the specified group.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ if user:logged_in }}
	&lt;p&gt;This is just for logged in users.&lt;/p&gt;
{{ endif }}{{ /noparse }}

## user:not\_logged\_in

	{{ noparse }}{{ user:not_logged_in }}{{ /noparse }}

Identical to the previous function, but instead checks to see if a user is NOT logged in. Also takes the _group_ parameter. Must be used in a tag pair.</p>

## Single User Profile Variables

The user plugin also gives you access to various user variables using the following syntax:

	{{ noparse }}{{ user:<em>variable</em> }}{{ /noparse }}

These calls default to the current logged in user, but you may also specify a user's ID with the optional <em>user_id</em> parameter:

	{{ noparse }}{{ user:<em>variable</em> user_id="4" }}{{ /noparse }}

If you are using custom stream fields that return multiple records, you can access the values within as a tag pair:

	{{ noparse }}{{ user:country }}{{ name }} {{ /user:country }}{{ /noparse }}

Below is a table of variables that are hard-coded into the system and always available.

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Variable</th>
			<th>Notes</th>
		</tr>
		<tr>
			<td width="200">id</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200">group_id</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200">ip_address</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200">active</td>
			<td>1 or 0.</td>
		</tr>
		<tr>
			<td width="200">activation_code</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200">created_on</td>
			<td>Unix epoch format.</td>
		</tr>
		<tr>
			<td width="200">last_login</td>
			<td>Unix epoch format.</td>
		</tr>
		<tr>
			<td width="200">username</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200">display_name</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200">forgotten_password_code</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200">remember_code</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="200">group</td>
			<td>Group slug.</td>
		</tr>
		<tr>
			<td width="200">group_description</td>
			<td>Group name.</td>
		</tr>
	</tbody>
</table>

## user:profile

Aside from accessing user profile fields individually, you can also access them using the profile function. Inside the tag pair, you can access any of the user profile variables, including your custom fields.

	{{ noparse }}{{ user:profile }}

	{{ display_name }}

	{{ custom_field }}

	{{ custom_field:sub_value }}

{{ /user:profile }}{{ /noparse }}

The profile tag also takes an optional user_id value.

	{{ noparse }}{{ user:profile user_id="4" }}{{ /noparse }}

## user:profile\_fields

In the event you want to just show all user profile data in a list, you can do so with this function. Each piece of user data can be accessed via the following variables:

<table>
	<tr>
		<td>value</td>
		<td>Field value. For user profile fields that return multiple values, this will be the alternate canonical display that field types can and should provide.</td>
	</tr>
	<tr>
		<td>name</td>
		<td>Field name.</td>
	</tr>
	<tr>
		<td>slug</td>
		<td>Field slug.</td>
	</tr>
</table>

	{{ noparse }}{{ user:profile_fields }}

	&lt;p>&lt;strong>{{ name }}: {{ value }}&lt;/strong>&lt;/p>

{{ /user:profile_fields }}{{ /noparse }}
