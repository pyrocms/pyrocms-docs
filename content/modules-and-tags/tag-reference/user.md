# User Tags

The <em>user</em> plugin gives you access to user data and logic.

## user:logged_in

	{{ noparse }}{{ user:logged_in }}{{ /noparse }}

Checks if a user is logged in or not. Can be used as a variable pair to display data only to logged in users, and a single tag to return TRUE or FALSE whether or not the user is logged in.

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
			<td>Group slug. Used to check if a user is not only logged in, but part of a particular group.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}{{ if user:logged_in }}
	&lt;p&gt;This is just for logged in users.&lt;/p&gt;
{{ endif }}{{ /noparse }}

## user:not\_logged\_in

	{{ noparse }}{{ user:not_logged_in }}{{ /noparse }}

Identical to the function above, but checks to see if a user is not logged in. Also takes the <em>group</em> parameter. Must be used as a tag pair.</p>

## Single User Profile Variables

The user plugin also gives you access to various user variables using the following syntax:

	{{ noparse }}{{ user:<em>variable</em> }}{{ /noparse }}

These calls default to the current logged in user, but you can also specify a user's ID with an optional user_id parameter:

	{{ noparse }}{{ user:<em>variable</em> user_id="4" }}{{ /noparse }}

If you are using custom streams fields that return multiple values, you can access the values within as a tag pair:

	{{ noparse }}{{ user:country }}{{ name }} {{ /user:country }}{{ /noparse }}

<p>Below is a table of available variables that are always available and are hard-coded into the system. Addtionally, you can </p>

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
			<td>Unix format.</td>
		</tr>
		<tr>
			<td width="200">last_login</td>
			<td>Unix format.</td>
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
		<td>The value of the field. For user profile fields that return multiple values, this will be the alternate canonical display that field types can and should provide.</td>
	</tr>
	<tr>
		<td>name</td>
		<td>Name of the field.</td>
	</tr>
	<tr>
		<td>slug</td>
		<td>The sluf of the field.</td>
	</tr>
</table>

	{{ noparse }}{{ user:profile_fields }}

	&lt;p>&lt;strong>{{ name }}: {{ value }}&lt;/strong>&lt;/p>

{{ /user:profile_fields }}{{ /noparse }}
