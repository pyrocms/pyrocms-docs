# Settings Plugin

The _settings_ plugin allows access to site settings.

	{{ noparse }}{{ settings:setting }}{{ /noparse }}
	
Returns a setting value. Most are simply text strings edited via the settings tab in PyroCMS. Some, however, are boolean and use 1 for true and 0 for false.

For example, if you want to retrieve the `mail_protocol` setting value, you can use:

	{{ noparse }}{{ settings:mail_protocol }}{{ /noparse }}

## Available Settings

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Setting</th>
			<th>Notes</th>
		</tr>
		<tr>
			<td width="210">activation_email</td>
			<td>1 or 0. Send out an e-mail when a user signs up with an activation link</td>
		</tr>
		<tr>
			<td>addons_upload</td>
			<td>1 or 0. Allow upload of Addons through admin.</td>
		</tr>
		<tr>
			<td>admin_force_https</td>
			<td>1 or 0</td>
		</tr>
		<tr>
			<td>admin_theme</td>
			<td>Theme slug</td>
		</tr>
		<tr>
			<td>api_enabled</td>
			<td>1 or 0. For PyroCMS Pro version only.</td>
		</tr>
		<tr>
			<td>api_user_keys</td>
			<td>1 or 0. Allow users to sign up for API keys (if the API is Enabled). For PyroCMS Pro version only.</td>
		</tr>
		<tr>
			<td>auto_username</td>
			<td>1 or 0</td>
		</tr>
		<tr>
			<td>cdn_domain</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>ckeditor_config</td>
			<td>JavaScript format</td>
		</tr>
		<tr>
			<td>comment_markdown</td>
			<td>1 (Markdown) or 0 (Text only)</td>
		</tr>
		<tr>
			<td>comment_order</td>
			<td>ASC (Oldest First) or DESC (Newest First)</td>
		</tr>
		<tr>
			<td>contact_email</td>
			<td><strong>From</strong> email address on outgoing messages</td>
		</tr>
		<tr>
			<td>currency</td>
			<td>Currency symbol</td>
		</tr>
		<tr>
			<td>dashboard_rss</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>dashboard_rss_count</td>
			<td>Number</td>
		</tr>
		<tr>
			<td>date_format</td>
			<td>PHP Date format</td>
		</tr>
		<tr>
			<td>default_theme</td>
			<td>Theme slug</td>
		</tr>
		<tr>
			<td>enable_comments</td>
			<td>1 or 0</td>
		</tr>
		<tr>
			<td>enable_profiles</td>
			<td>1 or 0</td>
		</tr>
		<tr>
			<td>enable_registration</td>
			<td>1 or 0</td>
		</tr>
		<tr>
			<td>files_cache</td>
			<td>Number</td>
		</tr>
		<tr>
			<td>files_enabled_providers</td>
			<td>Comma separated provider list</td>
		</tr>
		<tr>
			<td>files_s3_geographic_location</td>
			<td>US or EU</td>
		</tr>
		<tr>
			<td>files_s3_url</td>
			<td>Bucket URL with <code>bucket<code> parameter</td>
		</tr>
		<tr>
			<td>files_upload_limit</td>
			<td>Number, in MB.</td>
		</tr>
		<tr>
			<td>frontend_enabled</td>
			<td>1 or 0</td>
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
			<td>registered_email</td>
			<td>1 or 0. Notify users on register?</td>
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
			<td>site_lang</td>
			<td>Country code</td>
		</tr>
		<tr>
			<td>site_name</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>site_public_lang</td>
			<td>Comma separated Country codes. Publicly supported languages.</td>
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
			<td>twitter_feed_count</td>
			<td>Number</td>
		</tr>
		<tr>
			<td>twitter_username</td>
			<td>Twitter user handle without @</td>
		</tr>
		<tr>
			<td>unavailable_message</td>
			<td>Site maintenance message</td>
		</tr>
	</tbody>
</table>