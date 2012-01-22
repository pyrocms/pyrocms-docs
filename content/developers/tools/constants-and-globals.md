# Constants and Globals

A number of constants and properties are made available across PyroCMS.

## PHP Constants

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>
				Name</th>
			<th>
				Outputs</th>
			<th>
				Description</th>
		</tr>
		<tr>
			<td width="100">
				ADDONPATH</td>
			<td>
				addons/default/</td>
			<td>
				The path to third-party addons.&nbsp;</td>
		</tr>
		<tr>
			<td width="100">
				APPPATH</td>
			<td>
				system/pyrocms/</td>
			<td>
				The path to the application folders.</td>
		</tr>
		<tr>
			<td width="100">
				APPPATH_URI</td>
			<td>
				/system/pyrocms/</td>
			<td>
				The path to the application folders but with a leading slash.</td>
		</tr>
		<tr>
			<td width="100">
				BASE_URL</td>
			<td>
				http://site.com</td>
			<td>
				The equivalent to CodeIgniter&#39;s base_url(). Does not change with or without mod_rewrite.</td>
		</tr>
		<tr>
			<td width="100">
				BASE_URI</td>
			<td>
				/</td>
			<td>
				The relative root.</td>
		</tr>
		<tr>
			<td width="100">
				CURRENT_LANGUAGE</td>
			<td>
				en</td>
			<td>
				Outputs the two digit language code of the currently selected language.</td>
		</tr>
		<tr>
			<td width="100">
				FCPATH</td>
			<td>
				/var/www/site_folder/</td>
			<td>
				The path to index.php</td>
		</tr>
		<tr>
			<td width="100">
				<strong>Since v1.3.0</strong></td>
			<td>
				&nbsp;</td>
			<td>
				&nbsp;</td>
		</tr>
		<tr>
			<td width="100">
				ADMIN_THEME</td>
			<td>
				pyrocms</td>
			<td>
				Outputs the slug of the admin theme that is currently in use.</td>
		</tr>
		<tr>
			<td width="100">
				SHARED_ADDONPATH</td>
			<td>
				addons/shared_addons/</td>
			<td>
				The path to add-ons that are shared between all sites. Add-ons are also available to the default site in the free version.</td>
		</tr>
		<tr>
			<td width="100">
				SITE_REF</td>
			<td>
				default</td>
			<td>
				Can be used to find which site is currently running. Cannot be used inside module install or uninstall logic as it will break in multi-site. Use $this-&gt;site_ref there for complete compatibility.</td>
		</tr>
		<tr>
			<td width="100">
				UPLOAD_PATH</td>
			<td>
				uploads/default/</td>
			<td>
				The path to the current site&#39;s uploads. Cannot be used inside module install or uninstall logic as it will break in multi-site. Use $this-&gt;upload_path there for complete compatibility.</td>
		</tr>
	</tbody>
</table>

## PHP Global Variables

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>
				Name</th>
			<th>
				Outputs</th>
			<th>
				Description</th>
		</tr>
		<tr>
			<td width="100">
				$this-&gt;controller</td>
			<td>
				admin, blog, rss, etc</td>
			<td>
				The name of the current controller.</td>
		</tr>
		<tr>
			<td width="100">
				$this-&gt;method</td>
			<td>
				index, create, etc</td>
			<td>
				The name of the current method.</td>
		</tr>
		<tr>
			<td width="100">
				$this-&gt;module</td>
			<td>
				blog</td>
			<td>
				The slug of the current module or an empty string if the current page is the dashboard, login, etc.</td>
		</tr>
		<tr>
			<td width="100">
				$this-&gt;permissions</td>
			<td>
				array</td>
			<td>
				A list of modules that the user is allowed to access. If roles are defined for a module it will contain an object of role permissions.</td>
		</tr>
		<tr>
			<td width="100">
				$this-&gt;current_user</td>
			<td>
				an object</td>
			<td>
				All user information (groups, users, and profiles tables) of the current user or an empty array if not logged in.</td>
		</tr>
		<tr>
			<td width="100">
				$this-&gt;theme_options</td>
			<td>
				an object</td>
			<td>
				All theme options for the current admin theme. Can be used like $this-&gt;theme_options-&gt;news_feed. Professional version only.</td>
		</tr>
		<tr>
			<td width="100">
				$this-&gt;site_ref</td>
			<td>
				default</td>
			<td>
				<strong>This is available only in a module&#39;s details.php file.</strong> Elsewhere in your module use SITE_REF</td>
		</tr>
		<tr>
			<td width="100">
				$this-&gt;upload_path</td>
			<td>
				uploads/default/</td>
			<td>
				<strong>This is available only in a module&#39;s details.php file.</strong> Elsewhere in your module use UPLOAD_PATH</td>
		</tr>
	</tbody>
</table>

## JavaScript Global Variables

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>
				Name</th>
			<th>
				Outputs</th>
			<th>
				Available</th>
			<th>
				Description</th>
		</tr>
		<tr>
			<td width="100">
				APPPATH_URI</td>
			<td>
				/system/pyrocms/</td>
			<td>
				admin and front-end</td>
			<td>
				The path to the system folder</td>
		</tr>
		<tr>
			<td width="100">
				BASE_URI</td>
			<td>
				/</td>
			<td>
				admin and front-end</td>
			<td>
				The relative root.</td>
		</tr>
		<tr>
			<td width="100">
				BASE_URL</td>
			<td>
				http://site.com</td>
			<td>
				admin</td>
			<td>
				The site address. Unaffected by mod_rewrite.</td>
		</tr>
		<tr>
			<td width="100">
				DEFAULT_TITLE</td>
			<td>
				Un-named Website</td>
			<td>
				admin</td>
			<td>
				The site name.</td>
		</tr>
		<tr>
			<td width="100">
				DIALOG_MESSAGE</td>
			<td>
				Are you sure you want to delete this? It cannot be undone.</td>
			<td>
				admin</td>
			<td>
				The delete warning message in the current language. If you add your own message to the button&#39;s title attribute it will be used instead.</td>
		</tr>
		<tr>
			<td width="100">
				SITE_URL</td>
			<td>
				http://site.com or http://site.com/index.php</td>
			<td>
				admin</td>
			<td>
				Changes depending on mod_rewrite settings. Identical to CodeIgniter&#39;s site_url()</td>
		</tr>
		<tr>
			<td width="100">
				UPLOAD_PATH</td>
			<td>
				uploads/default/</td>
			<td>
				admin</td>
			<td>
				The path to the current site&#39;s uploaded files.</td>
		</tr>
	</tbody>
</table>
<p>
	&nbsp;</p>
