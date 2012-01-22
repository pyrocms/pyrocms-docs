# The Lex Parser

At the core of how PyroCMS outputs data is the Lex tag parser, which is new to PyroCMS 2.0 and replaces the old tag parser. For designers and front-end developers, tags are a simple syntax to display content and perform basic logic operations. For developers, tags are the way in which you can get your data into layouts.

## Tags 101

If you aren't familiar with tags, you can think of them as abstraction that allows designers, developers, and everyone in between to easily access functionality. Here is a very simple example:

	{{ noparse }}{{ settings:site_name }}{{ /noparse }}

<div class="tip"><strong>Note:</strong> The white-space inside the brackets is optional and is mainly there for readability. You can leave it out if you wish.</div>

This single tag is calling the settings plugin and the site&#95;name function. The plugin name and function name are separated by a colon (:). The site&#95;name functor

## Tag Attributes

What makes tags really powerful is they can take attributes that give you the freedom to modify the tag output based on input data. Here is an example:

	{{ noparse }}{{ template:partial name="sidebar" }}{{ /noparse }}

In the above code, the partial function in the template plugin can access the parameter like this:

	$this->attribute('name');

In the case that no attribute is set, you can specify a default value:

	$this->attribute('name', 'header');

A full exploration of how to interface with tags within the plugin system can be found in the <a href="">plugins documentation section</a>.

## Looping Tags

Another powerful feature of tags is the ability to use data between tags. Take this example of a blog posts tag:

	{{ noparse }}{{ blog:posts limit="5" order-by="title" }}
	&lt;h2>{{ title }}&lt/h2>
	Written by: &lta href="/users/profile/{{ author_id }}">{{ author_name }}&lt/a>&lt/p>
{{ /blog:posts  }}{{ /noparse }}

Sending an array of blog entries to this tag from the plugin file will cause the tag parser to loop through each blog post and replace the variables between the opening and closing tags with the variables you've defined.

You can also get and use the full content between the tags in a plugin by calling this in your plugin file:

	$this->content();

## Full Lex Documentation

You can find full Lex documentation on the Lex parser github repo <a href="https://github.com/happyninjas/lex">here</a>. We'll be updating this section soon with some more advanced Lex techniques as ewel..

