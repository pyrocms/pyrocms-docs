# Streams

Many sites require data that is not in a page format. For instance – dates of live shows, lists of bands, or lists of pets. Each of these requires a data structure and a way to create, read, update, and delete entries.

Streams is the underlying system in PyroCMS that allows you to setup those data structures. In Streams, each "list" of data is known as a "stream". So, a list of bands would be a stream. A list of live shows would be a stream.

In those streams, each field is defined by its field type. {{ link title="Field types" uri="concepts/addons/field_types" }} can be anything from a plain text field, to a date/time field, to a point on a map. PyroCMS comes with a set of core field types, and you can create your own or download ones from the store.

## Where Streams Can Be Used

PyroCMS Community comes with a Streams Core module, a number of core field types, and the Streams API. Between these tools, developers can create modules that use streams to make their data sets customizable. For instance, the Users module in PyroCMS is streams-enabled, so a site admin can set up the exact fields that the site they are building needs. If users need to fill out of a Twitter handle, they can add that field.

Developers can also just use Streams for basic data functions, to standardize the code and eliminate the tedious process of writing CRUD functionliaty.

## Streams in Pro

The Streams module, which allows you to set up free-form data structures and display that data in your templates via the Streams plugin, is only available in PyroCMS Pro or as a standalone module. This does not affect the ability for streams-enabled modules to function in PyroCMS Community, however. In fact, the Streams module uses the streams core module (which is part of PyroCMS community) to operate. 