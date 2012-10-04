# Variables Plugin

The _variables_ plugin allows you to display variables created in the {{ link uri="modules/variables" title="variables module" }}.

You can use a variable in your layouts like this:

	{{ noparse }}{{ variables:variable_slug }}{{ /noparse }}

### Example

If you create a variable called _twitter\_handle_, you can display it in your site like this:

	{{ noparse }}Follow us on Twitter at @{{ variables:twitter_handle }}!{{ /noparse }}

You can also check the value using an if statement:

	{{ noparse }}{{ if twitter_handle }}We are on Twitter!{{ /noparse }}