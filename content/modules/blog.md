# The Blog Module

The blog module allows you to easily setup a blog at www.yoursite.com/blog. It supports features like custom post fields, post previews, draft posts, blog categories, blog tags, blog keywords, and blog comment expiration. This section discusses how to create and manage a blog on PyroCMS.

{{docs:anchormenu}}
	Blogging Basics
	Basic Blog Fields
	Custom Blog Fields
	Blog Previews
	URLs
	Blog RSS Feed
	Customizing Blog Display
	Blog Widgets
	Blog Tags
{{/docs:anchormenu}}

</div>
<div class="doc_content">

## Blogging Basics

You can find the blog content controls under <samp>Content &rarr; Blog</samp>. This lists all of your posts, their post status, author, and category. It also has an option to publish one or more posts in draft status.

To create a new post, click <samp>+ Add Post</samp> in the top right corner.

This will bring up the blog post form, which has three tabs:

* Content
* Custom Fields
* Options

## Basic Blog Fields

The blog comes with some basic fields that are the core fields that the blog relies on to function.

Under the <samp>Content</samp> tab, the following fields are available:

<table>
	<tr>
		<th width="25%">Field</th>
		<th width="20%">Default Value</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Title</td>
		<td></td>
		<td>This is the title of the post.</td>
	</tr>
	<tr>
		<td>Slug</td>
		<td></td>
		<td>The URL segment identifying the post. This is auto-generated, but you can edit it. For example, your title is "My favorite Animals", the slug will be "my-favorite-animals".</td>
	</tr>
	<tr>
		<td>Introduction</td>
		<td></td>
		<td>A shorter version of your blog post that appears on the blog index pages.</td>
	</tr>
	<tr>
		<td>Content</td>
		<td></td>
		<td>The full blog post.</td>
	</tr>
</table>

Under the <samp>Options</samp> tab, the following fields are available:

<table>
	<tr>
		<th width="25%">Field</th>
		<th width="20%">Default Value</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Category</td>
		<td></td>
		<td>A single category for the blog post. If you need to create a new category, you do so right there by clicking <samp>Add a Category</samp>.</td>
	</tr>
	<tr>
		<td>Keywords</td>
		<td></td>
		<td>Keywords for the blog post.</td>
	</tr>
	<tr>
		<td>Date</td>
		<td>Current date/time</td>
		<td>Date/time of the publication of the blog post. This will not affect when the blog post is visible - only the draft/live status affects whether the post is live.</td>
	</tr>
	<tr>
		<td>Comments Enabled</td>
		<td>Three Months</td>
		<td>Whether or not to enable comments on this post. This allows you to set a timeframe that you'd like users to submit new comments within. This ranges from <samp>One Date</samp> to <samp>Three Months</samp>. You can also set this to <samp>No</samp> to turn comments off for this post, as well as <samp>Always</samp> to leave comments on indefinitely. PyroCMS calculates whether or not posts should be shown or not based on your post date value.</td>
	</tr>
</table>

## Custom Blog Fields

Blogs sometimes need extra functionality beyond just the basic blog post body and title. That's why you can extend the functionality of the blog module but adding custom blog fields.

To add new fields, click on <samp>Custom Fields</samp> on the module sub navigation. By default, PyroCMS adds an <samp>Introduction</samp> {{ link title="WYSIWYG" uri="field-types/wysiwyg" }} field. If you don't need an introduction field, you can simply remove this.

You can use any of your {{ link title="core" uri="field-types" }} and [add-on](http://pyrocms.com/store) field types as blog fields. After adding them, you'll need to display them by {{ link title="overloading" uri="guides/themes/overloading-module-views" }} the basic blog templates.

## Blog Previews

Blog posts need a way to represent themselves on things like post lists/archives, and RSS feeds. When displaying posts, PyroCMS first looks for a custom field with a slug called <samp>intro</samp>. If it can't find that, it will use the entire blog post body.

You can always override this in your overloaded blog views in your theme, but by default, PyroCMS will use the logic above.

## URLs

The blog module has its front-facing view at:

	/blog

Each post shows up in the following format:

	/blog/{year}/{month number}/{post slug}

Category archives can be viewed at:

	/blog/category/{category slug}

Keyword archives can be viewed at:

	/blog/tagged/{tag}

## Blog RSS Feed

You can find you blog rss feed at:

	/blog/rss

The blog module will also add an application/rss+xml link tag to the header of all pages of your site if the blog module is enabled.

## Customizing Blog Display

The blog can be customized via {{ link title="view overloading" uri="guides/themes/overloading-module-views" }} in your theme. There you can adapt the code to suit your display needs.

The views available for overloading are:

<table>
	<tr>
		<th width="25%">View</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>archive.php</td>
		<td>View used for category and keyword archives.</td>
	</tr>
	<tr>
		<td>posts.php</td>
		<td>View used for the main posts listing.</td>
	</tr>
	<tr>
		<td>view.php</td>
		<td>View used for displaying a single blog post.</td>
	</tr>
	<tr>
		<td>rss.php</td>
		<td>View used for the RSS feed.</td>
	</tr>
</table>

The <samp>archive</samp>, <samp>posts</samp>, and <samp>view</samp> views all use {{ link title="PyroCMS tags" uri="guides/pyrocms-tags" }}.

The following tags are available to use by default in the post tags.

### {{ noparse }}{{ pagination }}{{ /noparse }}

A string of auto-generated pagination for the blog posts.

### {{ noparse }}{{ posts }}{{ /posts }} or {{ post }}{{ /post }}{{ /noparse }}

A tag pair containing either a list of posts (like in <samp>archive.php</samp> and <samp>posts.php</samp>) or a single post (like in <samp>view.php</samp>). Available inside this tag pair are the following tags:

#### {{ noparse }}{{ title }}{{ /noparse }}

The blog post title.

#### {{ noparse }}{{ slug }}{{ /noparse }}

The blog post slug.

#### {{ noparse }}{{ url }}{{ /noparse }}

A link to the full blog URL (Only available in the {{ noparse }}{{ posts }}{{ /noparse }} loop).

#### {{ noparse }}{{ keywords }}{{ /noparse }}

Any keywords associate with this post.

	{{ noparse }}{{ keywords }}
    &lt;a href="blog/tagged/{{ keyword }}">{{ keyword }}&lt;/a>
{{ /keywords }}{{ /noparse }}

#### {{ noparse }}{{ category }}{{ /noparse }}

The category associated with the blog post. Two variables are available for this tag: <var>slug</var> and <var>title</var>.

	{{ noparse }}&lt;a href="blog/category/{{ category:slug }}">{{ category:title }}&lt;/a>{{ /noparse }}

#### {{ noparse }}{{ body }}{{ /noparse }}

The blog post body.

#### {{ noparse }}{{ preview }}{{ /noparse }}

An automatic preview of blog post. PyroCMS first looks for a custom field with a slug called <samp>intro</samp>. If it can't find that, it will <samp>{{ noparse }}{{ body }}{{ /noparse }}</samp>.

#### {{ noparse }}{{ created_on }}{{ /noparse }}

A unix timestamp of when this blog post was created. It is usually used in conjection with the {{ link title="date helper" uri="plugins/helper#helper-date" }}.

	{{ noparse }}{{ helper:date timestamp=created_on format="F j, Y" }}{{ /noparse }}

#### {{ noparse }}{{ created_by }}{{ /noparse }}

The ID of the author of the post. This is usually used in conjunction with the {{ link title="user plugin" uri="plugins/user" }} to retrieve profile data about the user.

	{{ noparse }}{ user:display_name user_id=created_by }}{{ /noparse }}

## Blog Widgets

The blog module has a lot of handy widgets. A common practice is to create a blog widget area to show on the left/right hand side of the blog indexes.

* {{ link title="Blog Archive Widget" uri="widgets/blog-archive" }}
* {{ link title="Blog Categories Widget" uri="widgets/blog-categories" }}
* {{ link title="Latest Blog Posts Widget" uri="widgets/blog-latest-posts" }}

## Blog Plugin

You can also access blog posts with the {{ link uri="plugins/blog" title="blog plugin" }}.