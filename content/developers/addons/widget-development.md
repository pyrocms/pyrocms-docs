# Wdiget Development

Widgets are quite similar to <a href="/docs/glossary#plugins">Plugins</a> in the way they are inserted into content, but they are a little more clever. They allow even your least experienced client or administrator to manage chunks of intelligent content on their site without needing to learn loads of tags, HTML or call you in to help.</p>
<p>
	<a href="/docs/glossary#widget-areas">Widget Areas</a> can be defined (header, sidebar, blog page footers, etc) then Widget Instances can be added in. Available Widgets currently include HTML blocks, Twitter Feeds, RSS Feeds, Google Maps and Social Bookmarks. More will be included over time, and you can make your own very easily.</p>
<h3>
	Where do i put my widgets?</h3>
<p>
	Widgets can be stored directly in the /addons/widgets folder /addons/widgets/<em>&lt;widget-name&gt;</em> or inside a module folder i.e. /addons/modules/<em>&lt;module-name&gt;/widgets/&lt;widget-name&gt;</em></p>
<h3>
	What are the main components of a widget</h3>
<p>
	The main components of a widget are:</p>
<ul>
	<li>
		the widget class.</li>
	<li>
		form.php &ndash; a view that will be rendered in the widget admin interface.</li>
	<li>
		display.php &ndash; a view that will be used to render output in the frontend site content.</li>
</ul>
<h3>
	How should a widget be structured?</h3>
<p>
	For example, lets say we want to create a widget called &ldquo;awesome_sauce&rdquo;. Our structure would be as such:</p>
<ul>
	<li>
		awesome_sauce (folder)
		<ul>
			<li>
				awesome_sauce.php (widget class)</li>
			<li>
				views (folder)
				<ul>
					<li>
						form.php (admin view)</li>
					<li>
						display.php (frontend view)</li>
				</ul>
			</li>
		</ul>
	</li>
</ul>
<p>
	We will now explain each component in more detail:</p>
<h4>
	The widget class file</h4>
<p>
	Please take this opportunity to read through the code below and make note of the comments.</p>
<pre>
<code>
&lt;?php if (!defined(&#39;BASEPATH&#39;)) exit(&#39;No direct script access allowed&#39;);

class Widget_Awesome_sauce extends Widgets
{{ 
	// The widget title,  this is displayed in the admin interface
	public $title = &#39;Awesome Sauce&#39;;

	//The widget description, this is also displayed in the admin interface.  Keep it brief.
	public $description = &#39;Display sauce that is awesome.&#39;;

	//duh
	public $author = &#39;Some Guy&#39;;

	//duh
	public $website = &#39;http://example.com/&#39;;

	//current version of your widget
	public $version = &#39;1.0&#39;;

	/**
	 * $fields array fore storing widget options in the database.
	 * values submited through the widget instance form are serialized and
	 * stored in the database.
	 */
	public $fields = array(
		array(
			&#39;field&#39;   =&gt; &#39;field_name&#39;,
			&#39;label&#39;   =&gt; &#39;field_label&#39;,
			&#39;rules&#39;   =&gt; &#39;required&#39;
		)
	);

	/**
	 * the $options param is passed by the core Widget class.  If you have
	 * stored options in the database,  you must pass the paramater to access
	 * them.
	 */
	public function run($options)
	{
		if(empty($options[&#39;field_name&#39;]))
		{
			//return an array of data that will be parsed by views/display.php
			return array(&#39;output&#39; =&gt; &#39;&#39;);
		 }}

		// Store the feed items
		return array(&#39;output&#39; =&gt; $options[&#39;html&#39;]);
	}

        /**
	 * form() is used to prepare/pass data to the widget admin form
	 * data returned from this method will be available to views/form.php
	 */
	public function form()
	{{ 
		$stuff = $this-&gt;db-&gt;get_stuff();

		return array(&#39;stuff&#39; =&gt; $stuff);
	 }}
}
/* End of file awesome_sauce.php */

</code></pre>
<p>
	If you have made it this far and have read the comments in the above code that should pretty much get you on the right path to creating your first widget. However I would like to point out one thing before moving on.</p>
<p>
	The widget class name should be in the following format: &ldquo;<strong>Widget_Awesome_sauce</strong>&rdquo; and must extend &ldquo;<strong>Widgets</strong>&rdquo; the core class.</p>
<h4>
	The view files</h4>
<p>
	Not much to be said here other than the view files should be partial views only. The views should not include html, body, head elements. The view files must also be named <strong>form.php</strong> and <strong>display.php</strong> respectively.</p>
<h3>
	Example usage</h3>
<p>
	All you need to do for this to work is open up a theme layout or page layout and enter:</p>
<pre>
<code class="html">{{  pyro:widgets:area slug=&quot;sidebar&quot; }}</code></pre>
<p>
	&nbsp;</p>
