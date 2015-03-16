# Streams

Streams is a concept introduced to PyroCMS in 2012 that has since evolved into the core of PyroCMS.

* {{ docs:id_link title="Streams Concept" }}
* {{ docs:id_link title="Why use streams?" }}
* {{ docs:id_link title="Streams Distribution" }}

</div>
<div class="doc_content">

## Streams Concept

Every site requires defining structures of data. For instance, your site may need a list of events, or a roster of bands. Each of these requires a data structure and a way to create, read, update, and delete entries. Streams is a way of handling this data.

### What are streams?

Streams are simply structures of data that you can store information in. Anything that can be defined can be a stream.

On a technical level, streams are simply database tables (every stream represents a database table).

### Fields

Fields represent the attributes of the stream. If the stream is a list of events, the fields might be things like starting date and time, ending date and time, title, description and maybe an image representing the event.

### Field Types

Every field for a stream needs some way to input and handle the information. Field types are responsible for exactly that. Rendering the input, validation, accessing / handling the value(s), and storing and filtering the values are some examples of how field types can interact with streams data.

For instance, if you need to add a textarea to a stream, there is a textarea field type. There is an image field type, a WYSIWYG field type, and even a relationship field type, which allows you to related entries of different streams. For a list of all the field types that come with PyroCMS, check out the Core Field Types documentation. You can also find third party field types on the PyroCMS add-ons listing.

## Why use streams?

Streams is a standardized pattern and API. This means that each component of a stream, be it the stream itself, a field, field type or any related API is assured to work the same all of the time. Streams offers a robust API but also very reliable and repeatable development environment.

Because streams and it's components handle all the work, all that is left to do is implement and use streams. No creating tables, models, validation rules, presenters, decorators, table HTML, form HTML or anything. Simply use the streams API and extend or override as needed.

## Streams Distribution

PyroCMS and Streams are considered "distributions". Both products are powered by the ***exact same*** Streams Platform and are ***nearly identical in every way***. The only difference between the two is the addons they ship with. Streams comes with only the addons needed to run. PyroCMS comes with addons specifically built for developing websites.

### Why Distributions?

Because the Streams Platform is great for building web applications of *any* kind, distributions let vendors and developers custom tailor their own distributions specific to their needs to be rolled out quickly, ready to go.

## What is a Stream?

More coming..