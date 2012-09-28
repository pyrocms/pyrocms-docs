# Events

Events allow you add your own functionality to the PyroCMS core by hooking into preset points in the code called triggers. There are several triggers already in place in the PyroCMS core that allow you to do things within your code when other parts of PyroCMS run.

## Using Events in your modules

Create an events.php file in the root of your module (it will be autoloaded when PyroCMS starts to run). Below is an example file from a module named "Sample":

<script src="https://gist.github.com/1373989.js?file=gistfile1.aw"></script>

In the above example, the **Events\_Sample** registers the function 'run' to run when the **public\_controller** trigger is called in PyroCMS.

It is important to note that some triggers pass data that you can use in your function as well.

## PyroCMS Triggers

PyroCMS includes the following event triggers:

### System Triggers (In places other than modules)

<table>
<tr>
<td class="one_third">Events::trigger('<b>public_controller</b>')</td>
<td>This is triggered when the Public_Controller begins to run.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>admin_controller</b>')</td>
<td>This is triggered when the Admin_Controller runs.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>admin_notification</b>')</td>
<td>Fired when error, notice or success messages are displayed in the Admin area.</td>
</tr>
</table>

### Blog Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>post_created</b>', $id)</td>
<td>Fired when a blog post is saved for the first time.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_updated</b>', $id)</td>
<td>Fired when a blog post re-saved.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_published</b>', $id)</td>
<td>Fired when a blog post has been published.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_deleted</b>', $deleted_ids)</td>
<td>Fired when a one or more blog posts have been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>blog_category_created</b>', $id)</td>
<td>Fired when a blog category has been created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>blog_category_updated</b>', $id)</td>
<td>Fired when a blog category has been updated.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>blog_category_deleted</b>', $deleted_ids)</td>
<td>Fired when one or more categories have been deleted.</td>
</tr>
</table>

### Contact Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>email</b>', $data, 'array')</td>
<td>This is used to send an email. The second parameter is the data to send along and the Email Template to use, third parameter is the type of response you expect. The sending is done by an event registered in system/cms/modules/templates/events.php but can be triggered from anywhere in the application.</td>
</tr>
</table>

### Comments Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>comment_approved</b>', $comment)</td>
<td>Fired when a comment has been approved.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>comment_deleted</b>', $comments)</td>
<td>Fired when one or more comments were deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>comment_unapproved</b>', $id)</td>
<td>Fired when a comment has been unapproved.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>comment_updated</b>', $id)</td>
<td>Fired when a comment has been updated.</td>
</tr>
</table>

### Files Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>file_deleted</b>', $deleted)</td>
<td>Fired when one or more files have been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>file_updated</b>', $id)</td>
<td>Fired when a file has been updated.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>file_uploaded</b>', $data)</td>
<td>Fired when a file has been uploaded to a folder.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>file_folder_created</b>', $id)</td>
<td>Fired when a new folder has been created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>file_folder_deleted</b>', $deleted_ids)</td>
<td>Fired when one or more folders have been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>file_folder_updated</b>', $id)</td>
<td>Fired when a folder has been updated.</td>
</tr>
</table>

### Groups Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>group_created</b>', $id)</td>
<td>Fired when a new group has been created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>group_deleted</b>', $id)</td>
<td>Fired when a group has been updated.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>group_updated</b>', $id)</td>
<td>Fired when a group has been deleted.</td>
</tr>
</table>

### Keywords Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>keyword_created</b>', $id)</td>
<td>Fired when a new keyword has been added.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>keyword_deleted</b>', $id)</td>
<td>Fired when a keyword has been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>keyword_updated</b>', $id)</td>
<td>Fired when a keyword has been updated.</td>
</tr>
</table>

### Modules Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>module_disabled</b>', $slug)</td>
<td>Fired when a module has been disabled, uninstalled or deleted (by clicking <em>disable</em>, <em>uninstall</em> or <em>delete</em> through the Modules' admin area).</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>module_enabled</b>', $slug)</td>
<td>Fired when a module has been uploaded, installed or enabled (by clicking <em>install</em> or <em>enable</em> through the Modules' admin area).</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>module_upgraded</b>', $slug)</td>
<td>Fired when a module has been upgraded.</td>
</tr>
</table>

### Navigation Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>navigation_group_created</b>', $id)</td>
<td>Fired when a new navigation group has been created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>navigation_group_deleted</b>', $deleted_ids)</td>
<td>Fired when one or more navigation groups have been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_navigation_create</b>', $input)</td>
<td>Fired when a new navigation item has been created.</td>
</tr>
<tr>
<tr>
<td class="one_third">Events::trigger('<b>post_navigation_delete</b>', $deleted_ids)</td>
<td>Fired when one or more navigation items have been deleted.</td>
</tr>
<td class="one_third">Events::trigger('<b>post_navigation_edit</b>', $input)</td>
<td>Fired when a new navigation item has been edited.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_navigation_order</b>', array($order, $group))</td>
<td>Fired when a navigation item has been reordered within a group.</td>
</tr>
</table>

### Pages Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>post_page_create</b>', $input)</td>
<td>Fired when a page has been created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_page_edit</b>', $input)</td>
<td>Fired when a page has been edited.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_page_delete</b>', $deleted_ids)</td>
<td>Fired when one or more pages have been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_page_order</b>', array($order, $root_pages))</td>
<td>Fired when pages have been reordered.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>page_layout_created</b>', $id)</td>
<td>Fired when a page layout has been created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>page_layout_updated</b>', $id)</td>
<td>Fired when a page layout has been updated.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>page_layout_deleted</b>', $deleted_ids)</td>
<td>Fired when a page layout(s) have been deleted.</td>
</tr>
</table>

### Permissions Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>permissions_saved</b>', array($group_id, $modules, $roles))</td>
<td>Fired when permissions have been saved.</td>
</tr>
</table>

### Redirect Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>redirect_created</b>')</td>
<td>Fired when a new redirect is created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>redirect_updated</b>', $id)</td>
<td>Fired when a redirect is updated.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>redirect_deleted</b>', $ids)</td>
<td>Fired when redirect(s) are deleted.</td>
</tr>
</table>

### Settings Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>settings_updated</b>', $settings_stored)</td>
<td>Fired when settings are updated.</td>
</tr>
</table>

### Templates Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>email_template_created</b>', $id)</td>
<td>Fired when a new email template has been created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>email_template_deleted</b>', $id)</td>
<td>Fired when an email template has been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>email_template_updated</b>', $id)</td>
<td>Fired when an email template has been updated.</td>
</tr>
</table>

### Themes Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>theme_deleted</b>', $deleted_names)</td>
<td>Fired when one or more themes have been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>theme_options_updated</b>', $options_array)</td>
<td>Fired when theme options have been updated.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>theme_set_default</b>', $theme)</td>
<td>Fired when a default theme has been set.</td>
</tr>
</table>

### Users Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>post_user_activation</b>', $id)</td>
<td>Triggered when a user successfully activates by following the activation link in the welcome email. The user's id is passed to your event.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_user_login</b>')</td>
<td>This is triggered immediately after a user successfully logs in via domain.com/users/login</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_admin_login</b>')</td>
<td>This is triggered immediately after a user successfully logs in via domain.com/admin/login</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_user_register</b>', $id)</td>
<td>This is triggered immediately after a user registers. The newly created user id is passed along.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>post_user_update</b>')</td>
<td>Runs after a user's profile edits have been saved.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>pre_user_logout</b>')</td>
<td>Triggered right before the user's session is destroyed.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>user_created</b>', $user_id)</td>
<td>Fired when a new user has been created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>user_deleted</b>', $deleted_ids)</td>
<td>Fired when one or more users have been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>user_updated</b>', $id)</td>
<td>Fired when a user has been updated.</td>
</tr>
</table>

### Widgets Triggers

<table>
<tr>
<td class="one_third">Events::trigger('<b>widget_area_created</b>')</td>
<td>Fired when a widget area has been created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>widget_area_deleted</b>', $id)</td>
<td>Fired when a widget area has been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>widget_area_updated</b>', $id)</td>
<td>Fired when a widget area has been updated.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>widget_disabled</b>', $ids)</td>
<td>Fired when one or more widget instances have been disabled.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>widget_enabled</b>', $ids)</td>
<td>Fired when one or more widget instances have been enabled.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>widget_instance_created</b>', $id)</td>
<td>Fired when a widget instance has been created.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>widget_instance_deleted</b>', $id)</td>
<td>Fired when a widget instance has been deleted.</td>
</tr>
<tr>
<td class="one_third">Events::trigger('<b>widget_instance_updated</b>', $id)</td>
<td>Fired when a widget instance has been updated.</td>
</tr>
</table>