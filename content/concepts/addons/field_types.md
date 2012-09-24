# Field Types

PyroCMS's core data system, {{ link title="Streams" uri="" }}, handles setting up custom data structures, and field types represent the types of data you can add to a stream. They contain all the logic regarding getting data in and out of the database and formatted correctly.

An example of a very simple field type is the Text field type. It allows you to create a simple text input. There are also field types for date/time, a list of countries, custom select/radio/checkbox inputs, and more.

## Installing Field Types

Plugins have no installation procedure. Just upload them to _addons/shared\_addons/field\_types_ or _addons/[site-ref]/pfield\_types_ and they are ready for use!

## System-Wide

One unique feature of field types is that they can be used system-wide by any add-on that is streams-enable. For example, you can add a field type to your PyroCMS installation, and it will not only be available in the Streams module, but also in the Users module, where you can add custom fields for users.

## Field Type Resources

* {{ link title="Core Field Type Widget Docs" uri="field-types" }}
* {{ link title="Developing Field Types - PyroCMS Developer Docs" uri="developers/addons/developing-field-types" }}
* [Field Types on the PyroCMS Store](https://www.pyrocms.com/store/categories/field_types)