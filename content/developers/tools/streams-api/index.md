# Streams Core API

Starting with PyroCMS 2.1, the core of PyroStreams is now a module in PyroCMS called Streams Core. This means that all modules in PyroCMS can now take advantage of streams functions. The Streams API has been developed as a singular way to manipulate and use streams.

* {{ docs:id_link title="API Basics" }}
* {{ docs:id_link title="Streams Overview" }}
* {{ docs:id_link title="Namespacing" }}
* {{ docs:id_link title="Prefixing" }}
* {{ docs:id_link title="Documentation Example" }}
* {{ docs:id_link title="Drivers" }}

</div>
<div class="doc_content">

## API Basics

The Streams API is a driver, so it is loaded like so:

	$this->load->driver('Streams');
	
Once the API has been loaded, you can use each driver like this:

	$this->streams->driver_name->function();

Individual drivers do not need to be loaded, they can simply be used.

## The $stream Variable

Whenever you see <var>$stream</var> variable being used as a parameter in the API, you are free to pass either a <dfn>string</dfn>, stream <dfn>object</dfn>, or stream <dfn>id</dfn>. This way, you can pass whatever information about your stream that you have handy, and the API will do the rest. Because of this, the <var>$namespace</var> parameter is only necessary when passing a <dfn>string</dfn>, since bother <dfn>object</dfn> and <dfn>id</dfn> will have namespace data associated with it.

## Streams Overview

In a progamming sense, the streams concept is essentially a database abstraction layer. When you create a stream, you create a database table - there can be no stream without a database table. When you create a field and assign it, you are creating a new column in that database. It gets more complex than that, but the basic idea is that streams helps with data handling by abstracting it into streams, field types, and field assignments.

You can of course use database interactions however you'd like in your modules, but Streams core gives you access to some big time savers and benefits:

* You no longer have to write CRUD validation - the API takes care of this for you.
* You allow your users to customize data structures to their needs using field types.
* You get an easy to use, abstracted way to install and uninstall your modules.

Streams are a great way to 

## Namespacing

In order to prevent naming conflicts between tables, streams can be namespaced and prefixed. For example, the users module has the namespace of **users**. That way, a field called _first\_name_ can exist for both the Users module and another module, without a naming conflict.

## Prefixing

In addition, you might want to also prefix you tables in some cases. The prefix is in addition to the **SITE\_REF** prefix used by PyroStreams, and helps lessen the chance of table name conflict. For instance, if you have a table named <samp>products</samp> in your module, you might want to set a prefix so the actual table that is created is named <samp>mymodule_products</samp>.

## Documentation Example

For the purposes of our documentation, we have an example module that all of our examples stem from. In this case, our example is a simple FAQ module, powered by streams.

The FAQ module source can be found at [https://github.com/pyrocms/streams-enabled-module-sample](https://github.com/pyrocms/streams-enabled-module-sample/).

## Drivers

The following drivers are available for the Streams API:

{{ nav:auto start="developers/tools/streams-api" }}
