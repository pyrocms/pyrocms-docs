# Users Module

* {{ docs:id_link title="Creating a New User" }}
* {{ docs:id_link title="Managing User Groups and Permissions" }}
* {{ docs:id_link title="Customizing Profile Fields" }}
* {{ docs:id_link title="User Module URLs" }}
* {{ docs:id_link title="Using User Data in Layouts" }}

The users module is where you manage your sites users. To start, go to **Users &rarr; Manage Users**. You'll see a paginated list of your current users.

{{ asset:img file="docs/users/users.png" alt="List of Users" class="doc_image" }}

You can search and filter them using the filter tools. Typing into the text box will search names and usernames of users. The results are populated via AJAX.

## Creating a New User

To register a new user on your site, click on **+ Add User** and fill out the user form. At the very least, you need to provide an email address, username, password, display name, and whatever profile fields you have set to required. The display name is what will be used when the system needs to display the proper name of the user.

{{ asset:img file="docs/users/add\_user.png" alt="Add New User" class="doc_image" }}

## Managing User Groups and Permissions

By default, PyroCMS comes with two user groups:

* **Administrators** - These are admins of your site and have access to everything on the back end.
* **Users** - These are basic users of your site and only have access to the front end.

These two groups cannot be deleted, however you can add additional groups by going to **Users &rarr; Groups** and clicking on **+ Add Group**. You'll be asked to simply name your group and give it a slug.

{{ asset:img file="docs/users/add\_group.png" alt="Add New User Group" class="doc_image" }}

Once you have created a new group, you can go to **Users &rarr; Permissions** and click on **Edit Permissions** for the group you just created. On the edit permissions page, you'll see a lot of permissions options. Here you can exclude users from having access to particular modules, as well as give them granular permissions in modules that support them.

{{ asset:img file="docs/users/permissions.png" alt="User Permissions" class="doc_image" }}

<div class="tip"><strong>Note:</strong> You can edit permissions for the default User group if you'd like to.</div>

## Customizing Profile Fields

PyroCMS comes with a preset slate of user fields, but these can be easily changed. To manage your user profile fields, go to **Users &rarr; Manage Users** and click on the **Profile Fields** section menu.

{{ asset:img file="docs/users/menu.png" alt="Profile Fields Section Menu" class="doc_image" }}

There you'll see a list of all the profiles fields. Simply delete, edit, and add as necessary. Profile fields run off of {{ linke title="streams field types" uri="" }} so you can use any core field types or third party field types you've installed.

{{ asset:img file="docs/users/fields.png" alt="Profile Fields" class="doc_image" }}

To make a profile field show up on the register page, simply make it required when you create a new field. 

{{ asset:img file="docs/users/new\_field.png" alt="New Profile Field form" class="doc_image" }}

## User Module URLs

The Users module uses the following public URLs:

	/register // Register page if you have user registration turned on)
	/user/{user_id} // User public profile page
	/my-profile // User's own public profile page
	/edit-profile // Page for a user to edit their own profile

To customize these pages, see {{ link title="module view overloading" uri="theming/overloading-module-views" }}.

## Using User Data in Layouts

To see how to use settings values in layouts, see the {{ link title="user plugin docs" uri="plugins/user" }}.