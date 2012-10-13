# The Navigation Module

* {{ docs:id_link title="Navigation Groups" }}
* {{ docs:id_link title="Adding a Link to a Group" }}
* {{ docs:id_link title="Ordering Navigation Links" }}
* {{ docs:id_link title="Navigation Tags" }}

The navigation module allows you to create navigation groups and use them in your layouts.

## Navigation Groups

All links belong to a **navigation group**. This allows you to create navigation groups like "header" and "footer" so you can organize your links.

PyroCMS comes with some navigation groups by default, but to create a new group, click **Add a Group**. You can give your group a name and a slug.

{{ asset:img file="docs/nav\_module/new\_group.png" alt="File Details" class="doc_image" }} 

## Adding a Link to a Group

Once your group is created, you can add links to it by clicking **Add Link** in the group header bar.

{{ asset:img file="docs/nav\_module/group\_interface.png" class="doc_image" }}

When you create a link, you've got a few options that you can choose.

{{ asset:img file="docs/nav\_module/link\_editor.png" class="doc_image" }}

Once you choose a title for your link, then select the group that you wish for it to display in. Link types are as follows:

<table>
	<tr>
		<th>Link Type</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>URL</td>
		<td>An external link - Ex: http://google.com.</td>
	</tr>
	<tr>
		<td>Site Link</td>
		<td>A link within your site - Ex: galleries/portfolio-pictures.</td>
	</tr>
	<tr>
		<td>Module</td>
		<td>Takes a visitor to the index page of a module.</td>
	</tr>
	<tr>
		<td>Page</td>
		<td>Link to a page within your site.</td>
	</tr>
</table>

**Target** specifies if this link should open in a new browser window or tab. (Tip: use New Window sparingly to avoid annoying your site visitors.)

**Restricted To** allows you to restrict the visibility of a navigation link to a specific group or groups. If you specify a group or groups in this field, any other group or non logged in user won't be able to see the link in the navigation group. This does't protect the page it goes to, but it does protect the link visibity.

{{ asset:img file="docs/nav\_module/user\_group.png" class="doc_image" }}

The **Class** field allows you to add a css class to a single link.

## Ordering Navigation Links

The order of your links in the admin panel are reflected on the website front-end. To change the order that they appear simply drag and drop them until they are in the order that you like.

## Navigation Tags

You can find the tag syntax to display navigation groups and data in your layouts in the {{ link title="navigation plugin docs" uri="plugins/navigation" }}.