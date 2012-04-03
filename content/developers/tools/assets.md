# Asset

Asset management is handled by a PHP library called Asset written by Antony Male. It is an easy-to-use asset management library which boasts the following features:

- Specify which assets to use for a particular page in your view/controller, and print them in your template.
- Collect your assets into groups, either pre-defined or on-the-fly.
- Enable/disable specific groups from your view/controller.
- Minify your groups and combine into single files to reduce browser requests and loading times.
- Define JS/CSS in your view/controller to be included in your template.
- Namespace your assets.

Basic usage
-----------

JS and CSS files are handled the same way, so we'll just consider JS. Just substitude 'js' with 'css' for css-related functions.

Javascript files can be added using the following, where **myfile.js** and **myfile2.js** are the javascript files you want to include,
and are located at **assets/js/myfile.js** and **assets/js/myfile2.js** (configurable).

	Asset::js('myfile.js');
	Asset::js('myfile2.js');

By default, Asset will minify both of these files and combine them into a single file (which is written to **assets/cache/&lt;md5 hash&gt;.js**).
To include this file in your page, use the following:

	echo Asset::render_js();

Returns something like

	<script type="text/javascript" src="http://localhost/assets/cache/d148a723c710760bc62ca3ecc8c50206.js?1307384477"></script>

If you've got minification turned off (see the section at the bottom of this guide), you'll instead get:

	<script type="text/javascript" src="http://localhost/site/assets/js/myfile.js"></script>
	<script type="text/javascript" src="http://localhost/site/assets/js/myfile2.js"></script>

If you have a specific file **myfile.min.js** which you want Asset to use, rather than generating its own minified version, you
can pass this as the second argument:

	Asset::js('myfile.js', 'myfile.min.js');

Some folks like css and js tags to be together. 

**Asset::render()** is a shortcut which calls **Asset::render_css()** and then **Asset::render_js()**.

Images
------

Although the original Asset library provided groups, etc, for dealing with images, I couldn't see the point.

Therefore image handling is somewhat simpler, and can be summed up by the following line, where the third argument is an optional array of attributes:

	echo Asset::img('test.jpg', 'alt text', array('width' => 200));

You can also pass an array of images (which will all have to same attributes applied to them):

	echo Asset::img(array('test.jpg', 'test2.jpg'), 'Some thumbnails');

This function has more power when you consider namespacing, detailed later.


Groups
------

Groups are collections of js/css files.
A group can be defined in the config file, or on-the-fly. They can be enabled and disabled individually, and rendered individually.

CSS and JS have their own group namespaces, so feel free to overlap.

Specific groups can be rendered using eg 
	
	Asset::render_js('group_name')
	
If no group name is passed, **all** groups will be rendered.  


<div class="tip"><strong>Note:</strong> When a group is rendered, it is disabled. See the "Extra attributes" section for an application of this behaviour.</div>

Files can be added to a group by passing the group name as the third argument to **Asset::js** or **Asset::css**, respectively:

	Asset::js('myfile.js', 'myfile.min.js', 'group_name');
	Asset::css('myfile.css', false, 'group_name');

<div class="tip"><strong>Note:</strong> As an aside, you can pass any non-string value instead of 'false' in the second example, and Asset will behave the same: generate your minified file for you.</div>

If the group name doesn't exist, the group is created, and enabled.

You can also add groups on-the-fly using **Asset::add\_group($group\_type, $group\_name, $files, $options)**, where **$options** is an array with **any** of the following keys:

	$options = array(
		'enabled' => true/false,
		'min' => true/false,
		'combine' => true/false,
		'inline' => true/false,
		'attr' => array(),
		'deps' => array(),
	);

This method is provided merely for convenience when adding lots of files to a group at once.
You don't have to create a group before adding files to it - the group will be created it it doesn't exist.

You can change any of these options on-the-fly using 

	Asset::set_group_option($type, $group, $key, $value)
	
Or the CSS- and JS- specific versions

	Caset::set_js_option($group, $key, $value)
	Asset::set_css_option($group, $key, $value)
	
**$group** has some special values: an empty string is a shortcut to the 'global' group (to which files are added if a group is not specified), and '\*' is a shortcut to all groups.


Multiple group names can also be specified, using an array.

Examples:

	
	// Add a dep to the my_plugin group
	Asset::set_js_option('my_plugin', 'deps', 'jquery');

	// Make all files added to the current page using Asset::add_css() display inline:
	Asset::set_css_option('', 'inline', true);

	// Turn off minification for all groups, regardless of per-group settings, for the current page:
	AssetLLset_js_option('*', 'min', false);
	

When you call **Asset::render()** (or the js- and css-specific variants), the order that groups are rendered is determined by the order in which they were created, with groups present in the config file appearing first.

Similarly (for JS files only), the order in which files appear is determined by the order in which they were added.

This allows you a degree of control over what order your files are included in your page, which may be necessary when satisfying dependencies.

If this isn't working for you, or you want something a bit more explicit, try this: If file A depends on B, add B to its own group and explicitly render it first.

<div class="tip"><strong>NOTE:</strong> Calling <strong>Asset::js('file.js')</strong> will add that file to the "global" group. Use / abuse as you need!</div>

<div class="tip"><strong>NOTE:</strong> The arguments for <strong>Asset::add_group</strong> used to be different. Backwards compatibility is maintained (for now), but you are encouraged to more to the new syntax.</div>


Paths and namespacing
---------------------

The Asset library searches through all of the items in the 'paths' config key until it finds the first matching file.
However, this approach was undesirable, as it means that if you had the directory structure below, and tried to include 'index.js', the file that was included would be determined by the order of the entries in the paths array.

	themes/
		theme_name/
			css/
			js/
				index.js
		  img/

Asset brings decent namespacing to the rescue!
For the above example, you can specify the following in your config file:

	'paths' => array(
		'core' => 'assets/',
		'admin' => 'assets/admin/',
	),


You can also add paths on-the-flow using **Asset::add\_path($key, $path)**:

	Asset::add_path('admin', 'assets/admin/');

Which path to use is then decided by prefixing the asset filename with the key of the path to use. Note that if you omit the path key, the current default path key (initially 'core') is used.


	Asset::js('index.js');
	// Or
	Asset::js('module::index.js');
	// Will add assets/js/index.js

	Asset::js('admin::index.js');
	// Will add assets/admin/js/index.js

	echo Asset::img('test.png', 'An image');
	// <img src="...assets/img/test.png" alt="An image" />

	echo Asset::img('admin::test.png', 'An image');
	// <img src="...assets/admin/img/test.png" alt="An image" />


If you wish, you can change the current default path key using **Asset::set\_path('path_key')**. This can be useful if you know that all of the assets in a given file will be from a given path. For example:

	Asset::set_path('admin');
	Asset::js('index.js');
	// Will add assets/admin/js/index.js

The "core" path can be restored by calling **Asset::set\_path()** with no arguments (or calling **Asset::set\_path('core')**).

You can also namespace the files listed in the config file's 'groups' section, in the same manner.
Note that these are loaded before the namespace is changed from 'core', so any files not in the core namespace will have to by explicitely prepended with the namespace name.

In addition, you can override the config options **js\_path**, **css\_path** and **img_path** on a per-path basis. In this case, the element of the 
**paths** config array takes the following form,
where each of **js\_path**, **css\_path** and **img\_path** are optional. If they are not specified, the defaults will be used.

	array (
		'some_key' => array(
			'path' => 'more_assets/',
			'js_dir' => 'javascript/',
			'css_dir' => 'styles/',
			'img_dir' => 'images/',
			),
		),
	),

This can be particularly useful when you're using some third-party code, and don't have control over where the assets are located.

Note also that you can add an asset which uses a path which isn't yet defined.
Asset only requires that the path is defined by the time the file is rendered.

Globbing
--------

As well as filenames, you can specify [glob patterns](http://php.net/glob). This will act exactly the same as if each file which the glob matches had been added individually.  
For example:


	Asset::css('*.css');
	// Runs glob('assets/css/*.css') and adds all matches.

	Asset::css('admin::admin_*.css');
	// (Assuming the paths configuration in the "Paths and namespacing" section)
	// Executes glob('adders/admin/css/admin_*.css') and adds all matches

	Asset::js('*.js', '*.js');
	// Adds all js files in assets/js, ensuring that none of them are pre-minified.


An exception is thrown when no files can be matched.

Minification and combining
--------------------------

Minification uses libraries from Stephen Clay's [Minify library](http://code.google.com/p/minify/).

The **min** and **combine** config file keys work together to control exactly how Asset operates:

**Combine and minify:**
When an enabled group is rendered, the files in that group are minified (or the minified version used, if given, see the second parameter of eg **Asset::js()**),
and combined into a single cache file in **assets/cache** (configurable).

**Combine and not minify:**
When an enabled group is rendered, the files in that group are combined into a a single cache file in **assets/cache** (configurable). The files are not minified.

**Not combine and minify:**
When an enabled group is rendered, a separate &lt;script&gt; or &lt;link&gt; tag is created for each file.
If a minified version of a file has been given, it will be linked to. Otherwise, the non-minified version is linked to.
NOTE THAT THIS MIGHT BE UNEXPECTED BEHAVIOUR. It is useful, however, when linking to remote assets. See the section on remote assets.

**Not combine and not minify**
When an enabled group is rendered, a separate  &lt;script&gt; or &lt;link&gt; tag is created for each file.
The non-minified version of the file is used in each case.

You can choose to include a comment above each  &lt;script&gt; or &lt;link&gt; tag saying which group is contained with that file by setting the **show\_files** key to true in the config file.
Similarly, you can choose to put comments inside each minified file, saying which origin file has ended up where - set **show\_files\_inline** to **true**.

You can control whether Asset minifies or combines individual groups, see the groups section.

When minifying CSS files, urls are rewritten to take account of the fact that your css file has effectively moved into **assets/cache**.

With both CSS and JS files, when a cache file is used, changing the order in which files were added to the group will re-generate the cache file, with the files in their new positions.
This is because the order of files can be important, as dependancies may need to be satisfied.
Bear this in mind when adding files to groups dynamically - if you're changing the order of files in an otherwise identical group, you're not allowing
the browser to properly use its cache.

<div class="tip"><strong>NOTE:</strong> If you change the contents of a group, and a cache file is used, a new cache file will be generated. However the old one will not be removed (groups are mutable,
so Asset doesn't know whether a page still uses the old cache file).
Therefore an occasional clearout of <strong>assets/cache/</strong> is recommended. See the section below on clearing the cache.</div>


Clearing the cache
------------------
Since cache files are not automatically removed (Asset has no way of knowing whether a cache file might be needed again), a few methods have been provided to remove cache files.

**Asset::clear\_cache()** will clear all cache files, while **Asset::clear\_js\_cache()** and **Asset::clear\_css\_cache()** will remove just JS and CSS files respectively.  
All of the above functions optionally accept an argument allowing you to only delete cache files last modified before a certain time. This time is specified as a
[strtotime](http://php.net/strtotime)-formatted string, for example "2 hours ago", "last Tuesday", or "20110609".  
For example:

	Asset::clear_js_cache('2 hours ago');
	// Removes all js cache files last modified more than 2 hours ago

	Asset::clear_cache('yesterday');
	// Removes all cache files last modified yesterday
