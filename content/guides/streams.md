# Streams

Every site requires defining structures of data. For instance, your site may need a list of events, or a roster of bands. Each of these requires a data structure and a way to create, read, update, and delete entries. Streams is PyroCMS way of handling this data, and it is baked into the structure of how PyroCMS works. This page explains what streams are, how you can use them, and where to find out more information on various streams-related topics.

* {{ docs:id_link title="What Are Streams?" }}
* {{ docs:id_link title="Field Types" }}
* {{ docs:id_link title="The Streams Core" }}
* {{ docs:id_link title="The Streams API" }}
* {{ docs:id_link title="The Streams Module" }}

</div>
<div class="doc_content">

## What Are Streams?

Streams are simply structures of data that you can store data in. Almost anything can be a stream. For instance, the Blog Module has standard fields like <samp>Category</samp>, but the blog posts data structure is a stream, so you can easily add a custom field to it. Need to have an image for every blog post? You can add that as a custom field and display it alongside the other blog fields.

## Field Types

Every piece of data added to a stream needs some basic things defined. What kind of form input do we use to get the information into the database? Does this data need special validation? It is accessed in templated with just one variable, or are there several to choose from? Field types have the answers to all those questions, and they represent a type of data that can be aded to a structure.

For instance, if you need to add a textarea to a stream, there is a {{ link uri="field-types/textarea" title="textarea field type" }}. There is an {{ link uri="field-types/image" title="image field type" }} type, a {{ link uri="field-types/textarea" title="textarea field type" }}, and even a Relationship field type, which allows you to related entries of different streams. For a list of all the field types that come with PyroCMS, check out the  {{ link title="Core Field Types documentation" uri="concepts/addons/field_types" }}. You can also find third party field types on the <a href="https://www.pyrocms.com/store/categories/field_types">PyroCMS addons listing</a>.

## The Streams Core

The Streams Core module comes with the free Community version of PyroCMS and contains all the core logic needed for streams to function. The Pages module, the Blog module, and the Users module all use the Streams Core in the community edition. The only thing you can't do is create your own Streams using a GUI interface. For that, you'll need the Streams Manager.

You can find more information on the Streams Core module <a href="">here</a>.

## The Streams 