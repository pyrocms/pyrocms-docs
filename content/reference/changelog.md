# Changelog

</div>
<div class="doc_content">

## 2.2.4 - April 28, 2014

### Improvements

- Fixed [#2846](https://github.com/pyrocms/pyrocms/issues/2846): Config class does not overload the core - Config class
- Fixed [#2857](https://github.com/pyrocms/pyrocms/issues/2857): Child pages with duplicate slugs now handled..
- Fixed [#2921](https://github.com/pyrocms/pyrocms/issues/2921) & [#2964](https://github.com/pyrocms/pyrocms/issues/2964): Error in navigation with ob_clean. 
- Fixed [#2961](https://github.com/pyrocms/pyrocms/issues/2961): Changed uninitialized var time to - thumb_modified
- Fixed [#2974](https://github.com/pyrocms/pyrocms/issues/2974): Wrong notification on permissions page
- Fixed [#3084](https://github.com/pyrocms/pyrocms/issues/3084): Cannot use a stdObject as an array
- Fixed [#3115](https://github.com/pyrocms/pyrocms/issues/3115): Fix for breadcrumb logic loading and - 'executing' all the parent pages
- Fixed [#3118](https://github.com/pyrocms/pyrocms/issues/3118): Removed two erroneous assignments by reference
- Fixed [#3276](https://github.com/pyrocms/pyrocms/issues/3276): Automatically sets encryption keys for on - install so users don't need to
- Add a link to MaxCDNs PyroCMS Partnership Page. 
- Fixed: Added check to see if an admin user is attempting to search via ajax in the control panel.
- Fix double home page bug
- Fix for pages:url plugin loading and 'executing' the page it links to
- Updated Brazilian and Swedish translations
- Check if file ID exists before inserting into DB

### Security

- Fixed [#3278](https://github.com/pyrocms/pyrocms/issues/3278): SQL Injection in CodeIgniter used by PyroCMS
- Limit the scope of plugin data
- Clean form inputs if they fail validation
- Escape Lex tags in user settings

## 2.2.3 - August 13, 2013

### Improvements

- Removed a flag in the WYSIWYG field type that was incompatible with php 5.3 and older
- Fixed a migration filename that could cause the last migration to fail on some systems

## 2.2.2 - August 6, 2013

### Improvements

- Added new Lithuanian language translations
- Fixes a bug for `parse_param` plugin attribute being passed to tag generators (img)
- Altered options field in the settings table to allow for larger option strings
- Fixed CKEditor moono-dark theme width in Safari
- fixed vertical alignment of "+" on admin shortcut buttons
- After delete, show message in files manager on error, not just success
- Fixing issue with editing stream relationship fields
- Drastically improved speed on large paginated stream results.
- Validate input type in choices field
- Fixing name variable issue with admin user preview
- Fixing missing recaptcha config load.
- Don't add the js/css files for the image field type multiple times.
- Fixes streams field.choice form dropdown value - Issue #2729
- Adding parent class to the navigation plugin.
- Added 'filesize' to File Field Type
- Adding alternator to list of allowed functions
- Updated spanish translations, translated remain items
- Treat 0 or '0' as nonempty values in Lex
- Allow get_stream_fields to prefix the field slugs.
- Update filters partial for Blog admin
- Fixing Overzealous Caching in the Pages module
- When saving keywords, delete existing applied keywords first
- Adding query caching for streams row model.
- Changing the way theme details classes are spawned
- Add indexes for quick DB queries
- Fixes html entities when validation fails. Fixes #2614, #2476, #2787
- Fixes #2741, First Name and Last Name are now undeletable.
- Fixes #2787. WYSIWYG would strip characters when decoding on some systems
- Add ob_end_clean to a few places that need it in order for the admin to work correctly when gzip is enabled
- RSS feeds were being double parsed. This was forcing the <?xml declarations to get escaped funny, and provided no obvious benefit.
- Try to set the mysql charset *before* mysql_real_escape_string is used
- Fixes #2548. Page type creation failed if title field was chinese characters
- Fixing issue with date verification and drop downs.

## 2.2.1 - April 24, 2013

### Features

- Added "Parse" option for {{ link title="Textarea Field Type" uri="field-types/textarea" }} which allows the text to be parsed as HTML, plain text, or markdown. Plain text will strip all HTML tags. The default is HTML.
- Adding a timespan function to the helper plugin.
- Added a {{ noparse }}{{ url:redirect to="some/page" }}{{ /noparse }} {{ link title="function" uri="plugins/url#url-redirect" }}.
- Added Folder contents listing to files plugin.
- Added noindex,nofollow to the admin login screen.
- Added a subtle indicator (italic title) that a page is draft on the pages index.
- Add keyword searching to Files module search pane.
- Add Robots: nofollow and Robots: noindex options to the Pages metadata tab.
- Made "Remember Me" checked by default in the admin login screen.
- Files can now be marked as "hidden" when storing them from a third-party module.
- Email line endings now have a setting in the Settings are. Defaults to \r\n.
- Added rtl support for admin panel.

### Improvements

- Fixed the blog edit form which populated the "Written By" field as the currently logged in user, rather than the author of the post.
- Added the missing offset attribute to pages:children. Limit was there but not offset
- Re-added IP v6 support for fresh installs. We added a migration back in september to make installs IP v6, but the installer was not updated.
- Added class support for entries\_table buttons.
- Fixed site active/inactive toggle in the MSM.
- Fixed bug where activation email sent upon registration even when Setting is "No activation".
- Fixed installer undefined variable warnings.
- Adding the ability to overload the page template.
- Updated the page module parse order to fix issues with parsing WYSIWYG and Textarea content.
- Fixed issue with related fields not showing up with pages.
- Added .dropdown class for navigation plugin.
- Fixed pagination error with assignments Streams API CP function.
- Fixed a bug where an "unknown index 'user\_id'" error appeared while adding a comment as a guest we have no 'user\_id' index for.
- Fixed #2604. Plugin docs did not allow an integer value of 0 as default value.
- Fixed #2603. Chinese and English translations for Variables help was transposed
- Fixed a bug with default attributes in {{ blog:posts }}.
- Fixed #2599. Removed the default limit of 10 from pages, files, and blog. Unlimited now unless specified which is the expected behavior.
- Fixed #2596. Parse the blog's rss feed in case Lex tags are used in intro.
- Clarified the activation settings label to say "Instant Activation".
- Fixed #2592. If pages already had a keyword hash migration 98 would double hash.
- Fixed issue with ajax error continually trying to show empty error messages.
- Updated the router, this requires updates to index.php and config.php.
- Moved installation of email templates module before other modules in case the email templates are needed for installation.
- Adding {{ noparse }}{{ comment\_count }}{{ /noparse }} variable to the blog index.
- Fixed issues with login widget redirecting to wrong URL.
- Fixed pagination for variables module.
- Updated the regex for mysql version detection in installer.
- Added condition status='live' tagged blog stream.
- Fixed #2636: Page Type model was not always loaded when needed.
- Added svg extension to files uploads.
- Fixed issue streams class cache would sometimes be outdated.
- Fixed variable typo in the installer library.
- Fixed instances of relative URLs in blog.
- Replaced login slide down animation with shorter fade in and bounce.
- Removed old setting for require\_lastname. This is now all handled in the profile.
- Removed unused twitter settings.
- Fixed issue where duplicating pages would result in incomplete page data in copy.
- Removed Cufon from themes.
- Resolved conflict in the datetime field's default input\_type.
- Optimized get\_tagged method.
- Optimized $.ajaxSetup code and oddities.
- Added ability to set a stream in the template library.
- Fixed issue with search result not being highlighted in Files.
- Switched file library to initialize separate from class load for uploading from multiple file inputs in one request.
- Added first\_url to streams API config for pagination.
- Fixed #2663. There can now be multiple keyword fields on a single page.
- Fixed issues with menu in admin theme for IE.
- Fixed template plugin functions set\_template and set\_title.
- Added an event and a server log for monitoring failed login attempts.
- Fixed an issue with adding files keywords when the site isn't using mod\_rewrite.
- Added reuse\_query\_string as param for pagination.
- Added the analytics tag to the Minimal theme.

## 2.2.0 - March 7, 2013

### Features

- Page layouts have been replaced by page types, which can have custom fields added to them.
- Custom Fields can be added to the Blog module using field types.
- Control panel search has been added for quick access to areas of the control panel.
- Comments are now integreated with Akismet.
- Added a "comment blacklist" to stop spammers from using the same email.
- Blog comments can be configured to expire after X amount of time.
- Modular Search allows you to search content from the frontend via a new "/search" page.
- New Admin Menu System lets module developers control the main menu.
- Improved the reset password system to use email OR username, not require both.
- Profiles can be accessed at /user/{username} instead of /user/{id}.
- Added {{ noparse }}{{ blog:categories }} and {{ blog:tags }}{{ /noparse }} to generate a list of available categories and a list of tags.
- Added the ability to save page type layouts, css, and javascript as flat files.
- Upgraded to latest CodeIgniter 3.0.
- Updating jQuery to 1.8.3.
- Upgrading to Ckeditor 3.6.4.
- Added jQuery miniColors option to Theme Options.
- Translated to Brazilian.
- Translated to Simplified Chinese.

### Improvements

- Increased extension length from 5 to 10 because of 'pages' and 'numbers' valid file extensions.
- Updating the users module to use the new configurable cancel button.
- Patched output library for new improved minificaiton.
- Adding an OpenGraph `"og"` option to the Template metadata.
- Adding Facebook OG Data to the blog.
- Only link to users profile in comments if enable_profies is enabled.
- Adding support for multiple forms in the Streams Core.
- Added a password strength indicator to the installer password. 
- Added encrypted upload file name by default.
- Allow blog category slugs to be entered manually.
- Added {{ noparse }}`{{ asset:render_js }}` and `{{ asset:render_css }}`{{ /noparse }} to Assets Plugin.
- Added Format Plugin.
- Adding optional entry re-ordering with Streams API in entry listing CP page.
- Added file_min to asset:js.
- Adding DB space for IPv6 in PyroCMS tables.
- Added Uhoh by Dan Horrigan for Improved errors.
- Removed password and salt data from the user plugin.
- Added improved support for .docx/.xlsx/.pptx.
- Added "filter by tags" to the file plugin.
- Moved "Control Panel" to the end of the meta title
- Added support for hidden dashboard items if the module is disabled.
- Added connection close when work is done in upload().
- Added ability to set file 'alt' attribute on image upload.
- Changed Ion Auth profile update to not require setting the display name (when not set, it uses the existing - profile data).
- Set variables to be ordered by name in admin panel list.
- Adding in support for making single admin menu items the top link.
- Creating a plugins add-on section.
- Allow mailto link in navigation.
- Date can now be added after 12:00 pm and before 1:00 am in a datetime field type
- Changed page_children's default sort to "order" instead of alphabetically by "title". Fixes #2431
- Sending any attributes to theme:partial will make them available in the view.
- Fixed a bug in the installer where Step 4 could white screen with no errors output
- Fixed a grammar error that only showed when no streams exist
- Added a check to the Themes admin so it doesn't error if a theme doesn't return any options
- Updated the Image & File field types' message when no folders are available to select
- Converting tags to entities for several text inputs where tags are not necessary.
- Setting textarea/wysiwyg parsing to no by default.
- Upgraded Google Analytics API to v2.4.

### Developers

- Adding the ability to control the cancel button on the Streams API field form.
- Added the CodeIgniter unit tests, which will sit alongside our own tests soon.
- Redirects Events added.
- Removing the `MY_Controller::$data` property. If you use `$this->data`, then just use `$data` instead.
- Removed deprecated `standard_date()` usage in Blog RSS controller.
- Allowing limit/offset to be set for the get_streams API function.
- Adding `get_stream_metadata` function to the Streams API.
- Fix multiple form support using Streams Plugin
- Updates for E\_STRICT and E\_DEPRECATED errors (meaning PHP 5.4 support is greatly improved).
- Set iPad as a "full-browser" device. If you like it as mobile, move it back in system/cms/config/user_agents.php.
- Support minify function in default theme.
- Added .datepicker class instead of just having a datepicker id
- Add sizes attribute to favicon
- Add alt and description attribute to the image field.
- Allow tags on the pages default body field.
- Fixes BTREE screwing with MySQL installs below 5.0.5.
- Return success as false if remote file container is not found

## 2.1.5 - November 1, 2012

### New Features and Improvements:

- Added offset parameter and count variable to the blog plugin.
- Changed default input for textbox field type a text box input instead of a text input.
- Added default value options for the following field types: year, country, US state, and country.
- Updated the image and file field types to work with cloud files (as set in the Files module).
- Added a Save/Save & Exit to page layouts.
- Added a ability to have multiple entry and delete forms on the same page with Streams.
- Updated the Twitter regex for more accurate link formatting.

### Bug Fixes

- Fixed issue #1513, where sorting for Streams would not work for non-admin users given permission to access the streams module on the back end.
- Fixed issue with permission interface where access to the module without any special permissions could not be granted.
- Fixed issue where analytics graph would not be resized based on browser size.
- Fixed issue where alternative process field types would not work with user fields.
- Fixed an issue where buttons stayed bound to the click event in the file description modal.
- Added a system cron that can clean the user sessions table.
- Fixing typo that blocked access to character\_limiter helper function.
- Fixing wrong function calls in assets plugin.
- Fixed bug where unsafe stream slugs could pass validation.
- Various small bug fixes, including PHP 5.4 fixes.


### Developers

- Added a is\_logged\_in() function to the user helper. Returns bool.
- Added column display and entry sorting to the Streams API CP Driver.
- Added a redirect override to the form builder function in Streams.
- Fixed error where pre\_save was not being run for field types when there was no $\_POST data for it.

## 2.1.4 - August 31, 2012

### Improvements

* Added Scott to the Team
* Disabled persistent db connection in the installer as some hosts disallow that.
* Updated reference to pyrocms.com to use HTTPS
* Replacing mysql\_escape\_string with mysql\_real\_escape\_string in installer.
* Removing unnecessary database calls for the image, file, and relationship field types.
* Corrected the admin form layout for additional page chunks
* Added events call when calling build\_forms
* PHP Version check in the installer was always showing as acceptable
* Redirect after login now works on the admin in addition to the front. Fixes #1778
* Split category slugs on the pipe character in the blog:posts tag so multiple categories can be selected
* Removed duplicate pagination view in the blog module
* Got rid of the <ProgressEvent> has no method 'initProgressEvent' error in the uploader

### Bug Fixes

* Fixing fatal error when duplicating pages.
* Fixed non-object error on pages display plugin
* Fixes a typo in the Ion\_Auth library that kept user activation emails from sending
* Fixes #1733. The file insert dialogue was looking for the "files" controller instead of "files\_wysiwyg"
* Fixed #1726. Pagination was missing from blog admin index page
* Fixes #1718. Duplicated pages were set to "home" and could end up at the wrong level.
* Fixing naming conflict with streams\_m runtime cache.
* Fixed Lex bug where 0 would be output as an empty string. Read https://www.pyrocms.com/forums/topics/view/19686
* Fixing NULL variables not parsing correctly in Lex.
* Fixed issue 1785: IE font bug
* Fixed filtering in the blog module admin panel. Refactored views to fit
* Fixed PHP 5.4 E\_STRICT issues.

## 2.1.3 - August 9, 2012

### Improvements

* Made Page Chunks use sections and id + classes. Before page chunks were getting a bit div happy and that made me sad. Now each chunk is a section, with id="{{ noparse }}{{ slug }}{{ /noparse }}" and a new box has been created for classes. This will allow much more flexible content, with more semantic meaning.
* Improved user registration. User registration was confusing as it either sent activation emails or let users register freely. Now it either sends an activation email or it waits for an admin to activate (like it said it was doing before but actually didn't). Additionally when creating users from the admin panel you can set them as Inactive, Active, or Send Activation Email and let them activate. You can also send the activation email later when editing a user
* Added basic logic for domain aliasing to the core.
* Removed some deprecated methods and tag attributes
* Followed up on the deprecation of Settings::item().
* Folloed up on deprecation of Settings::set\_item(). Some code formatting and docblock fixes in theme\_m.php.
* Switched Keywords in blog to an array. No more Keywords::get\_links() as it was stupid, now just using Keywords::get() and a loop.
* Added a preview hash field to blogs table and generate a random hash for preview link
* Added Keywords field type to streams\_core
* Added missing cycle param variables to the streams API entries driver
* Added the namespace variable to parameter functions in Streams Core.
* Added Streams Core plugin with field function
* Added assignment\_exists function to the fields model in streams core.
* User defined templates not shown in modal
* If your site name ended with 'admin', CSRF protection was enabled on every page, because the regexp found it. Now it only matches '/admin/' at the end, so it works as intended.
* Changed Google Analytic password field to be a password type.
* Don't try to validate a contact form just because the page is post. By checking for the specific contact form button name it can only run if THAT form was submitted.
* Only link to users profile in comments if enable\_profiles is enabled.
* Refined the Streams Core pagination.
* Trigger post\_admin\_login event after login via admin controller
* Updated Akismet to contain our user agent.
* PHP 5.4 fixes.
* Stopped literal \n's from showing in the comment notification.
* Updated REST\_Controller to latest version.
* Added events to the admin files controller
* Added the ID to both folder and file details pane in Files manager
* Added a config option to Files for encrypting file names on upload
* Added rel attribute support for theme:css
* Added 'insert\_data' into stream\_post\_insert\_entry event.
* Removed the requirement for the website field in the comments module.

### Bug Fixes

* Fixed #1685. Assets will now be cleared before the 404 page is shown. Cleared up the terminology and docs around the show\_404 method
* Fixed #1650. MySQL port was saved to the config file as 3306 regardless of installer value.
* Fixed #1521. Files was incorrectly maintaining ratio on all uploads and returning the original image dimensions
* Fixed a bug with base\_url. Affects https logins
* Fixed #1626. Moving files from remote storage to local via third-party API calls was broken
* Fixed form validation in MY\_Model::insert\_many()
* Fixed an issue that made it impossible to use EU regions in Amazon S3.
* Fixed layout of the editor switcher on Pages
* Fixes #1661. Removed query when reset pass was submitted with an empty form. Also fixes another small issue with resets
* Fixes #1524. Uploading two different file types via third-party code would result in one file being rejected as "file type not allowed" due to the allowed types only being set when the library was first loaded
* Fixes #1646 and #1665. Keywords were not working with latin characters. Thanks @stewones
* Fixed bug for parsing attribute contents with escaped quotes. Orig: https://github.com/happyninjas/lex/commit/ff9aa30554fce47a8bfb6dc7c94143afc2fd8f93
* Fixed ReCAPTCHA Support in streams core.
* Fixed #1511 show\_404() was not working properly
* Fixed bug where admins were shown their own profile data when editing other user's
* Fixed #1581. File's mimetype column was too short (at 50 chars) for some ridiculously long mime types
* Fixed #1518: This redirect was killing off AJAX POST's when index.php was in the url
* Fixed a bug with {{ noparse }}{{ files:image\_url }}{{ /noparse }}. Also closes #1478
* Fixed warning with the navigation widget.
* Fixed a bug where problems could be caused when a "name" field was added to Profiles
* Fixed a bug where full\_name was being used in the Users module user list instead of display\_name.
* Fixed an error in streams core where editing the slug of an unassigned field would result in an error.

## 2.1.2 - June 4, 2012

### Security Patches

* Fixed minor XSS issue in blog categories module
* Patched a XSS hole where redirect\_to could contain a malicious URL

### Bug Fixes

* Fixed bug with admin menu where Manage Users only showed when on the Users page.
* Fixed bug where username became foo123 instead of foo3
* Fixed a bug where the Publish and Delete buttons didn't work on the blog index page
* Make error reporting be always true, just HIDE errors in production.
* Added cookie prefix config to the installer. __Note:__ If you've recently installed from develop you may want to update your config file
* Fixed issue where if a page was loaded in HTTPS it would set the cache and other users would be sent to HTTPS, which lead to unexpected behaviour
* The Files library wasn't returning all pertinant information when moving files to the cloud
* Set the email length to 60 in the database for new installs
* Fixes ordering of javascript assets in the wysiwyg picker
* Fixed a bug in the wysiwyg controller that only showed to non-admins
* Added image ID to output for those who like to use built-in files resizing

## 2.1.1 - May 4, 2012

### Improvements

* Updated the widgets area boxes with a friendly little hand
* Add support to slug field\_type to select fields. Slugifies on\_change
* Non admins with permissions to edit users cannot edit admin user accounts
* Added order-by attribute to {{ noparse }}{{ files:listing }}{{ /noparse }} to allow sorting list
* Added expiration attribute to the integration plugin

### Bugs 

* Fixing WYSIWYG assets for the front end entry form
* Fixing old variable call in Streams core fields library
* Fixed a bug with the {{ noparse }}{{ pages:chunk }}{{ /noparse }} tag when used with markdown
* Fixed the non-english string showing in the Groups module description
* Fixed a bug in the files module that showed when the last item was deleted
* Fixed #1386. Support for less/sass in the {{ noparse }}{{ theme:css }}{{ /noparse }} tag

## 2.1.0 - April 23, 2012

### Features

* Added modular REST API system, only available for Professional.
* Re-built Files module with Cloud Storage and new interface.
* Upgraded jQuery to 1.7.1.
* Upgraded CodeIgniter to latest 3.0-dev.
* Upgraded Curl library to Curl Spark v1.2.1.
* Added a post count plugin for the blog
* Started adding a feature to make CKEditor configurable via the Control Panel
* Added a tag: {{ noparse }}{{ helper:config item="default\_language" }}{{ /noparse }}
* Added TwitterOAuth and OAuth library. This should really only be a temporary measure until a worker Twitter library with a nice abstract interface matching Facebook and other providers is developed. There's talk of it happening from a few people, but for now we have this. Be careful about building modules around it.
* Disable user registration from settings
* Implemented Asset minification and combination for the Control Panel. 
* Added the asset cache folder. Dont forget to chmod.
* Use display\_name instead of first + last on profile
* Added Slovenian translation
* Added 42 triggers, passed ids or data where applicable
* Adding some more greek characters in the foreign\_chars.php Added the greek characters in the Javascript Regexp test string so that they can be caught in it and the slug creation can be triggered.
* Removed Google CDN jQuery from themes and Control Panel, not a good default.
* Added Module::install\_tables() so that every table installation logic can be handled more centrally.
* Allow admins to see profiler if they set ?debug=1 on any page.
* Converted modules to install using CodeIgniters DBForge. 
* Added download counter to Files.
* Hide Google Analytics message on Dashboard unless settings have been added.
* Removed duplication of views in Blog module. Lists of Blog posts (index.php or cateogry.php) now delegate to posts.php for the list of posts.
* Large update to datetime field type to allow drop down data intake of month/day/year. Still needs testing and more updates.
* Page Chunks can now be sorted.
* Added portuguese translation.
* Added an option to widgets so that a widget title can be hidden via the interface.
* Added ajax login/logout capability.
* Redirects will now have 301 or 302 dropdown in redirects. Redirects will now support \* wildcard in from field and optionally $1,$2... in to field.

#### Bugs

* Redirecting logged in users to home page when they try to access the registration page. Closes #1154.
* Fixed warnings with no tweets in the widget
* Fixed issue #1121: Upgraded CKEditor to 3.6.2 Also "fixed" random breaking
* Fixed issue where adding a category in blog would change the blog slug in the form
* Fixed issue #1248: Comments were not being deleted when a blog post or page was removed
* Removed strtolower on Keywords as it was causing problems for Greek characters. Closes #1064
* Closes #1072. Decode url encoded characters in blog tags. Closes #1252
* Closes #616. Pyrocache now creates separate cache files for each aliased domain
* Allow for more than one Google Maps per page.
* Fixed a bug with user profile viewing that caused the user's profile to not be displayed when using alternate routes
* Corrected the default user group to the singular form.
* Changed user profile view to hide information like email addresses by default
* Fixed the widget area views in the widgets module
* Updates admin user edit form to multipart. Closes #1319
* Fixed item placement when dragging widget instances in a long list. Closes #1308
* Removed unused pyro.lang.delete as it was causing IE to pitch a fit
* Removed iPad from the mobile array of the user\_agent config file. It will now load the full version of a site as our documentation states it will.

## 2.0.4 - June 04, 2012

### Security Patches

* Fixed minor XSS issue in blog categories module
* Patched a XSS hole where redirect\_to could contain a malicious URL

### Improvements

* Allow admins to see profiler, not just locally

## 2.0.3 - March 06, 2012

### Improvements

* Added inner\_tag attribute to the navigation plugin
* Added a padding div to the page chunk
* Reduce unnecessary DB queries
* correct the wording in sl language
* When using the Fit option when creating thumbnails it made a black border around the thumb. Corrected so the crop is perfect
* Changed Pro Newsletters version number to match the stand-alone version
* Moved the theme options out of the modal and into a full page
* Turned off XSS filtering for Email Templates so that inline styles can be used
* Added "admin" option in navigation
* Removed the confirm password field to match the way the installer and user management does it
* Also shorted the site ref length requirement to 1 instead of 4
* Fixed incorrect salt object
* Update Spanish translations
* Update German translations
* Fix typo in users/language/german/user\_lang.php
* Update UTF8 strings and files to UTF8 without BOM
* Fixed incorrect profile edit message and a bug when an admin edited another user's profile
* Teach ckeditor to handle the template vars url:base and url:site in img src
* Change SITE\_URL to {{ noparse }}{{ site:url }}{{ /noparse }} when inserting files and images into ckeditor
* Updated PyroStreams to 2.1.3.
* Add ID to field generated by the contact module
* Rescued an Italian translation pull request
* Added a small delay to keep pages and navigation from being sorted accidentally on click
* Fix broken string interpolation in exception message

### Bug Fixes

* Fixed glob issue with installer
* Fixed the registration errors
* Corrected the overflow of analytics wrapper
* Fixed a bug in Newsletters where a fatal error could occur if Settings array was empty
* changed code style and division by zero
* Removed base="url" from the default theme favicon
* {{ noparse }}{{ pages:children }}{{ /noparse }} now handles page chunks properly
* Added missing permission check to Blog delete permissions
* Blog post author's display name is now selected when getting tagged posts
* Fix "Top" link in the footer of the default theme


## 2.0.2 - February 08, 2012

### Improvements

* Improved IE8 compatibility.
* Use display\_name instead of first + last on profile
* Updated Dutch language

### Bug Fixes

* Fixed the display method to properly return the $pages data array as an index within another array.
* Fixed issue #1073: Folder drop-down is cut off when more than 3 folders exist.
* Fixed issue #1063: Database port number was not being sent in the installer ajax check
* Fixed issue #1113: Issue on install where some servers return FALSE from glob instead of an empty array.
* Made a few tweaks for better Social Integration support.
* Fixed a bug in the contact form where multiple drop-downs would end up with their values appended to the next one.
* Fixed issue #1089 to fix admin navigation bug with Users menu

## 2.0.1 - January 26, 2012

### New Features

* Added Indonesian Language

### Bug Fixes

* Fixed issue where a user's session would be randomly dropped 
* Fixed column display issue for Widgets module
* Fixed some display issues for IE8
* Fixed some positioning and subfolder dropdown style issues in the Files module
* Fixed PHP notices when the navigation plugin is used as a tag pair
* Fixed a bug where a user with permission to access the Newsletters module and not the Users module, would see a "Manage Users" link in the CP nav bar
* [Pro] Fixed an issue with the MSM that didn't record the correct migration version when creating a new site
* [Pro] Removed incorrect line in license that stated you could not remove the PyroCMS logo from PyroCMS Professional

### For Developers

* Added HTML5 Shim to the control panel
* Removed users\_m in favor of user\_m in the Users module
* Disabled persistent database connections by default
