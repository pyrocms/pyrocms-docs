# Modular Routing

Routing is a powerful tool and allows developers to create a custom URL which does not have to directly match the modules/[controller/]method/parameter pattern of standard modules. Route configuration files can be placed into each module to help route URL&#39;s within a module, but PyroCMS only knows to use a routes.php from a module if the module name is the first URI segment.

For example:

	/artists/top-10
	
This URL will tell PyroCMS to load /addons/modules/artists/config/routes.php.

	/top-10-artists

Trying to route this URL does not suggest which module is in use, so the route would need to be in system/pyrocms/config/routes.php

Editing the main PyroCMS main route file may seem like a bad idea, but if it is backed up along with config.php and database.php when upgraded there is no downside here. Routing is done this way because if every single routes.php was loaded in every module before each page load then performance would be heavily effected.
