# Upgrading v2.1.x to v2.2.0

Any version of 2.1.x can be upgraded to 2.2.0 by following these instructions.

## Step 1: Download PyroCMS v2.2.0

You can download PyroCMS v2.2.0 [from GitHub](https://github.com/pyrocms/pyrocms/zipball/v2.2.0).

If you are using git, you can get the latest copy by running:

     git pull git://github.com/pyrocms/pyrocms.git 2.2/master

Incidentally, if you are using Git to upgrade this is probably the last step you need to make - unless you have custom 
addons.

## Step 2: Backup Your Add-ons and database.php

We're going to replace the entire system, so you'll need to back up any files you've modified. Most likely, this is just 
the <dfn>database.php</dfn> file, which is stored in <dfn>system/cms/config/database.php</dfn> and contains your database connection details.  

If you are using a GUI, take care you don't miss any "hidden" files like <dfn>.htaccess</dfn> when copying.

Additionally, you'll want to back up any addons that you've added to the addons directory. We'll be replacing this entire 
folder, so back those up.

## Step 3: Replace the addons/system folders and update database.php

Delete the system and addons folders, then replace/upload the new versions.

Replace/upload your backed up <dfn>database.php</dfn>.

Replace/upload your addons.

## Step 4: Update your database.php

At the bottom of this file, change:

	$active_record = true;
	// to
	$query_builder = true;

## Step 5: Replace index.php with a the new version

This is not usually the case, but occasionally there will be changes to the root <dfn>index.php</dfn> file, so make sure you have 
the latest one.

## Step 6: Ensure config/pagination.php is present

In all of this folder moving, you may be missing a new file: <dfn>system/cms/config/pagination.php</dfn>. Make sure that is in your 
config folder.

## Step 7: Make sure the following folders are writable

These folders need to be writable (chmod 777) or "Writable by Everyone", and may have had their permissions reset when 
you uploaded them to your server. Make sure they are still writable, along with all of their contents.

* assets/cache
* system/cms/logs
* system/cms/cache
* system/cms/config
* uploads

## Step 8: Update your Addons (Developers)

CodeIgniter has been updated to v3.0 so you will need to take a look at the changelog.

In your modules, if you have been checking for an exact match to `false`, you will need to change it to this:

	// Old
	$this->input->post('something') !== false

	// New
	$this->input->post('something') !== null

If your modules refer to either of the follow two hooks then you will need to change your code to use 
{{ link uri="developers/tools/events" title="Events" }} instead.

	$this->hooks->call_hook('post_user_login');
	$this->hooks->call_hook('post_user_activation');

If you were using the MySQL or MySQLi drivers and your modules use `$this->dbforge->drop_table()` on tables that may or 
may not exist, you will need to change the code like so:

	// from
	$this->dbforge->drop_table('sometable');
	// to
	$this->dbforge->drop_table('sometable', true);
	
The <dfn>comment\_helper.php</dfn> has been removed, meaning `display_comments()` is gone. Normally we try to deprecate things nicely, 
but this just had to go. Instead of calling just that function now you have more control over whether or not to show the 
existing comments and the form itself separately. Here is an example of the blog module:

	<?php if (Settings::get('enable_comments')): ?>
		<div id="comments">
			<div id="existing-comments">
				<h4><?php echo lang('comments:title') ?></h4>
				<?php echo $this->comments->display() ?>
			</div>
			<?php if ($form_display): ?>
				<?php echo $this->comments->form() ?>
			<?php else: ?>
				<?php echo sprintf(lang('blog:disabled_after'), strtolower(lang('global:duration:'.str_replace(' ', '-', $post->comments_enabled)))) ?>
			<?php endif ?>
		</div>
	<?php endif ?>

Notice the two class methods, instead of the one function call. 

Instead of loading the helper in your controller, load it like so:

	$this->load->library('comments/comments', array(
		'entry_id'    => $post->id,
		'entry_title' => $post->title,
		'module'      => 'blog',
		'singular'    => 'blog:post',
		'plural'      => 'blog:posts',
	));

This `entry_title`, singular and plural logic matches the Keywords structure, where you pass a language key 
or just an arbitrary string like "Chicken" to help identify multiple types of data within the same module.

## Rejoice

Done! You are now running the latest, shiniest version of PyroCMS!

This upgrade was bigger than usual - especially for people with custom addons - but it's because we added a lot of awesome 
stuff.

Remember, if you use Git this is WAY quicker. All database changes are handled automatically (by 'migrations') the next 
time you load up the control panel. 
