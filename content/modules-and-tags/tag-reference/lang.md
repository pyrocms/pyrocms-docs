# Lang Tags

The _lang_ tag allows access to the language settings for the current logged in user. If no user is logged in, the default site language is used.

## lang:name

	{{ noparse }}{{ lang:name }}{{ /noparse }}

Returns the full name of the current language.

### Example Output:

	English

## lang:folder

	{{ noparse }}{{ lang:folder }}{{ /noparse }}

Returns the folder anme of the current language.

### Example Output:

	english
	
## lang:code

Returns the language code of the current language.

	{{ noparse }}{{ lang:code }}{{ /noparse }}

### Example Output:

	en
	
## lang:direction

Returns the language direction of the current language.

	{{ noparse }}{{ lang:direction }}{{ /noparse }}

### Example:

	ltr