# Streams Core API

Starting with PyroCMS 2.1, the core of PyroStreams is now a module in PyroCMS called Streams Core. This means that all modules in PyroCMS can now take advantage of streams functions. The Streams API has been developed as a singular way to manipulate and use streams.

## Driver Documentation

{{ nav:auto start="developers/tools/streams-api" }}

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

"Streams" is essentially a database abstraction layer. When you create a stream, you create a database table. When you create a field and assign it, you are creating a new column in that database. It gets more complex than that, but the basic idea is that Streams helps with data handling by abstracting it into streams, field types, and fields.

### Namespacing and Prefixing

Since modules can now use streams for data interactions, in order to prevent naming conflicts between tables, Streams can be namespaced and prefixed. For example, the users module has the namespace of **users**. That way, a field called _first\_name_ can exist for both the Users module and another module, without a naming conflict.

In addition, you might want to also prefix you tables in some cases. The prefix is in addition to the **SITE\_REF** prefix used by PyroStreams, and helps lessen the chance of table name conflict. For instance, if you have a table named 'products' in your module, you might want to set a prefix so the actual table that is created is named 'mymodule_products'.

### Streams Core vs. PyroStreams

PyroStreams is still sold as a separate add-on on top of PyroCMS (although it comes with PyroCMS Pro), so what's the difference? PyroStreams now sits on top of the streams core and provides a GUI to create data structures. It also includes the PyroStreams plugin for outputting data. It is basically a free-form data creation tool now running on Streams core, where with the API you can create more set data structures needed for your module.

### Why Use the Streams API?

You can of course use database interactions however you'd like in your modules, but Streams core gives you access to some big time savers and benefits:

* You no longer have to write CRUD validation - the API takes care of this for you.
* You allow your users to customize data structures to their needs using field types.
* You get an easy to use, abstracted way to install and uninstall your modules.

## Our Example

It will be clearer to have an example thread that runs through these docs:

_Our module is a simple FAQ module. Users add FAQs and view them in a list. Our only stream is a faq stream and our namespace is faq\_._

FAQ Stream module sources can be found at [https://github.com/pyrocms/streams-enabled-module-sample](https://github.com/pyrocms/streams-enabled-module-sample/blob/master/details.php).