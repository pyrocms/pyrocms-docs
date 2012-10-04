# The Blog Module

* {{ docs:id_link title="Blogging Basics" }}
* {{ docs:id_link title="URLs" }}
* {{ docs:id_link title="Blog RSS Feed" }}
* {{ docs:id_link title="Customizing the Blog" }}
* {{ docs:id_link title="Blog Widgets" }}
* {{ docs:id_link title="Blog Tags" }}

The blog module allows you to easily setup a blog at www.yoursite.com/blog. It supports the following features:

* Post Previews
* Live/Draft post status
* Blog Categories
* Blog Intro Text
* Blog Keywords
* Commenting on/off control

{{ docs:header }}Blogging Basics{{ /docs:header }}

You can find the blog content controls under **Content &rarr; Blog**. This lists all of your posts, their post status, and has an option to publish them right there if they are in draft status.

{{ asset:img file="docs/blogposts.png" alt="Blog Post Screen" class="doc_image" }}

To create a new post, click **+ Add Post** in the top right corner.

This will bring up the Add Post screen, which has two tabs:

* Content
* Options

{{ asset:img file="docs/blogpost.png" alt="Blog Post Screen" class="doc_image" }}

Under the **Content** tabs, the following fields are availab;e:

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
		<td>Status</td>
		<td>Draft</td>
		<td>Draft posts can be previewed, but will not show up on the site. Set this to "Live" to publish your post.</td>
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

Under the **Options** tab, the following fields are available:

<table>
	<tr>
		<th width="25%">Field</th>
		<th width="20%">Default Value</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>Category</td>
		<td></td>
		<td>A single category for the blog post.</td>
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
		<td>Enabled</td>
		<td>Whether or not to enable comments on this post.</td>
	</tr>
</table>

{{ docs:header }}URLs{{ /docs:header }}

The blog module has its front-facing view at:

	/blog

Each post shows up in the following format:

	/blog/{year}/{month number}/{post slug}

Category archives can be viewed at:

	/blog/category/{category slug}

Keyword archives can be viewed at:

	/blog/tagged/{tag}

{{ docs:header }}Blog RSS Feed{{ /docs:header }}

You can find you blog rss feed at:

	http://www.yoursite.com/blog/rss

The blog module will also add an application/rss+xml link tag to the header of all pages of your site if the blog module is enabled.

{{ docs:header }}Customizing the Blog{{ /docs:header }}

The blog can be customized via {{ link title="view overloading" uri="" }} in your theme. There you can adapt the code to suit your display needs.

{{ docs:header }}Blog Widgets{{ /docs:header }}

The blog module has a lot of handy widgets. A common practice is to create a blog widget area to show on the left/right hand side of the blog indexes.

* {{ link title="Blog Archive Widget" uri="" }}
* {{ link title="Blog Categories Widget" uri="" }}
* {{ link title="Latest Blog Posts Widget" uri="" }}

{{ docs:header }}Blog Tags{{ /docs:header }}

You can access blog tags from the {{ link uri="plugins/blog" title="blog plugin" }}.