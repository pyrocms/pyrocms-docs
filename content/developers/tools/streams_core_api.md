# Streams Core API

Starting with PyroCMS 2.1, the core of PyroStreams is now a module in PyroCMS called Streams Core. This means that all modules in PyroCMS can now take advantage of streams functions. To make this easy, a Streams API has developed in order to make working with Streams Core simple.

## API Basics

### Loading the API

The Streams API is a driver, so it is loaded like so:

	$this->load->driver('Streams');
	
Once the API has been loaded, you can use each driver like this:

	$this->streams->driver_name->function();
	
### API Drivers

The Streams API has five drivers:

* Streams
* Fields
* Entries
* CP
* Utilities

We'll go into depth about what each of these drivers does, but first, an overview of Streams in general.

## Streams Overview

Streams is essentially a database abstraction layer. Streams are 

### Namespacing and Prefixing

Since modules can now use streams for data interactions, in order to prevent naming conflicts between tables, Streams can be namespaced and prefixed. For example, the users module can prefix all of its fields and streams with **users**. That way, a field called _first\_name_ can exist for both the Users module and another module.

In some cases, you might want to also prefix you tables. This prefix is in addition to the SITE_REF prefix used by PyroStreams. This is useful if you want to make sure you do not have any table name collisions.

### Streams Core vs. PyroStreams

PyroStreams is still sold as a separate add-on on top of PyroCMS (although it comes with PyroCMS Pro), so what's the difference? PyroStreams now sits on top of the streams core and provides a GUI to create data structures. It also includes the PyroStreams plugin for outputting data. It is basically a free-form data creation tool now running on Streams core, where with the API you can create more set data structures needed for your module.

### Why Use the Streams API?

You can of course use database interactions however you'd like in your modules, but Streams core gives you access to some big time savers and benefits:

* You no longer have to write CRUD validation - the API takes care of this for you.
* You can use field type and integrate their functionality into your module.
* You get an easy to use, abstracted way to install and uninstall your modules.

## Our Example

It will be clearer to have an example thread that runs through these docs, so here is our example:

_Our module is a simple recipe-keeping module. Users add recipes and view them in a list. Our only stream is a recipe stream._

## Streams Driver

The streams driver is used to create and manipulate streams. Streams represent tables of data in the database.

You can call the streams driver like this:

	$this->streams->streams->function();
	
### Preset Fields

When you create a stream, the following fields are created automatically.

<table>
	<tr>
		<td width="25%"><strong>id</strong>
		<td>An auto-incrementing standard primary key ID.</td>
	</tr>
	<tr>
		<td><strong>created</strong>
		<td>A MySQL datetime field of when an entry was created.</td>
	</tr>
	<tr>
		<td><strong>updated</strong>
		<td>A MySQL datetime field of the last time an entry was updated.</td>
	</tr>
	<tr>
		<td><strong>created_by</strong>
		<td>ID of the user who initially created the entry.</td>
	</tr>
	<tr>
		<td><strong>ordering_count</strong>
		<td>Incrementing numerical ordering count.</td>
	</tr>
</table>

### add_stream()

	$this->streams->streams->add_stream($stream_name, $stream_slug, $namespace, $prefix = NULL, $about = NULL);

The **add_stream** function allows you to create a stream.
	
#### Parameters

<table>
	<tr>
		<td width="25%"><strong>stream_name</strong>
		<td>The full name of the stream.</td>
	</tr>
	<tr>
		<td><strong>stream_slug</strong>
		<td>The stream slug.</td>
	</tr>
	<tr>
		<td><strong>namespace</strong>
		<td>A namespace for your stream.</td>
	</tr>
	<tr>
		<td><strong>prefix</strong>
		<td>Optional. A stream prefix. Will be used in the stream database table name.</td>
	</tr>
	<tr>
		<td><strong>about</strong>
		<td>Optional. A short blurb about the stream.</td>
	</tr>
</table>

#### Example:

In this example we add the recipe stream. Since the module is also called "recipes", our namespace is called "recipes". We are not providing a prefix in this case, so our table will be created a **default_recipes**. If we had a prefix, let's say 'rec_', it would be **default\_rec\_recipes**.

	$this->streams->streams->add_stream('Recipes', 'recipes', 'recipes', NULL, 'Our recipes');

### get_stream()

	$this->streams->streams->get_stream($stream_slug, $namespace);

Gets data about a stream. It does not retrieve entries, just the stream metadata.
	
#### Example:

	$this->streams->streams->get_stream('recipes', 'recipes');
	
### delete_stream()

	$this->streams->streams->delete_stream($stream_slug, $namespace);

Deletes a stream. This will delete all the entries associated with this stream as well, as well as run all of the field destruct functions for fields assigned to this stream.

This streams returns TRUE or FALSE, based on whether the streams was successfully deleted.
		
#### Example:

	$this->streams->streams->delete_stream('recipes', 'recipes');
