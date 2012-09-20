# Variables

The _variables_ module you to create variables that are accessible throughout your PyroCMS code. They are a good way to set small bits of text that you or other admins may want to change later. For instance, you can create a variable for the site's official Twitter handle. If it ever changes, it can be easily changable via the variables module. 

## Creating Variables

To create a new variable, go into the Admin Panel, and select *Variables* from the *Content* menu.

## Using Variables in Templates

	{{ noparse }}{{ variables:variable_slug }}{{ /noparse }}

Returns the value of your custom variable. Replace variable with the name you assigned it in the Control Panel.

## Example

If you create a variable called _twitter\_handle_, you can display it in your site like this:

	{{ noparse }}Follow us on Twitter at @{{ variables:twitter_handle }}!{{ /noparse }}

You can also check the value using an if statement:

	{{ noarpse }}{{ if twitter_handle }}We are on Twitter!{{ endif }}

<div class="tip">For more information on PyroCMS tags, please visit the <a href="">PyroCMS tags</a> documentation page.</div>