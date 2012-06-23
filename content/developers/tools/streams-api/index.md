# Streams Core API

Starting with PyroCMS 2.1, the core of PyroStreams is now a module in PyroCMS called Streams Core. This means that all modules in PyroCMS can now take advantage of streams functions. To make this easy, a Streams API has benn developed in order to make working with Streams Core simple.

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

"Streams" is essentially a database abstraction layer.

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

_Our module is a simple FAQ module. Users add FAQs and view them in a list. Our only stream is a faq stream and our namespace is streams_sample._

FAQ Stream module sources can be found at https://github.com/pyrocms/streams-enabled-module-sample