# Global

The _global_ plugin gives you access to most constants and global variables listed in [Constants & Globals](http://pyrocms.com/docs/2.0/manuals/developers/developer-tools/constants-globals/)

The global plugin's slug is **global**, so it can be used like so:

    {{ noparse }}{{ global:constant }}{{ /noparse }}

### Constants

Constants are automatically converted to uppercase by the plugin so you may type the constant name
just like you would the rest of the tag.

*Example:*

    {{ noparse }}{{ global:addonpath }}{{ /noparse }}

Outputs:

    {{ noparse }}{{ addons/default/ }}{{ /noparse }}


### Global Variables

All global variables that are a string can be accessed with this plugin also.

*Example:*

    {{ noparse }}{{ global:module }}{{ /noparse }}

Outputs:

    {{ noparse }}{{ blog }}{{ /noparse }}