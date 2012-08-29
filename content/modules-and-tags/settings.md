# Settings Tags

The _settings_ tag allows access to site settings.

	{{ noparse }}{{ settings:<em>setting</em> }}{{ /noparse }}
	
Returns a setting value. Most are simply text strings edited via the settings tab in PyroCMS. Some, however, are boolean and use 1 for true and 0 for false.

## Available Settings

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Setting</th>
			<th>Notes</th>
		</tr>
		<tr>
			<td width="300">activation_email</td>
			<td>1 or 0. Send out an e-mail when a user signs up with an activation link</td>
		</tr>
		<tr>
			<td>akismet_api_key</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>comment_order</td>
			<td>ASC (Oldest First) or DESC (Newest First)</td>
		</tr>
		<tr>
			<td>contact_email</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>currency</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>dashboard_rss</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>dashboard_rss_count</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>default_theme</td>
			<td>Folder name of the default theme</td>
		</tr>
		<tr>
			<td>enable_profiles</td>
			<td>1 or 0</td>
		</tr>
		<tr>
			<td>frontend_enabled</td>
			<td>1 or 0</td>
		</tr>
		<tr>
			<td>ga_email</td>
			<td>Google Analytics email</td>
		</tr>
		<tr>
			<td>ga_password</td>
			<td>Google Analytics password</td>
		</tr>
		<tr>
			<td>ga_profile</td>
			<td>Google Analytics profile ID</td>
		</tr>
		<tr>
			<td>ga_tracking</td>
			<td>Google Analytics tracking ID</td>
		</tr>
		<tr>
			<td>mail_protocol</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>mail_sendmail_path</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>mail_smtp_host</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>mail_smtp_pass</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>mail_smtp_port</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>mail_smtp_user</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>meta_topic</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>moderate_comments</td>
			<td>1 or 0</td>
		</tr>
		<tr>
			<td>records_per_page</td>
			<td>Number</td>
		</tr>
		<tr>
			<td>require_lastname</td>
			<td>1 or 0</td>
		</tr>
		<tr>
			<td>rss_feed_items</td>
			<td>Number</td>
		</tr>
		<tr>
			<td>server_email</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>site_name</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>site_slogan</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>twitter_cache</td>
			<td>Number</td>
		</tr>
		<tr>
			<td>site_slogan</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>twitter_consumer_key</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>twitter_consumer_key_secret</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>twitter_feed_count</td>
			<td>Number</td>
		</tr>
		<tr>
			<td>twitter_blog</td>
			<td>1 or 0</td>
		</tr>
		<tr>
			<td>twitter_username</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>unavailable_message</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>version</td>
			<td>Current version of PyroCMS</td>
		</tr>
	</tbody>
</table>