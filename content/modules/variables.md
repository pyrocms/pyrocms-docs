# Variables

The _variables_ module you to create variables that are accessible throughout your PyroCMS code. They are a good way to set small bits of text that you or other admins may want to change later. For instance, you can create a variable for the site's official Twitter handle. If it ever changes, it can be easily changable via the variables module. 

## Creating Variables

To create a new variable, go into the Admin Panel, and select *Variables* from the *Content* menu. Click **+ Add Variables** and create a slug and a value for your variable. The slug is what you'll use to refer to the variable in your layouts.

{{ asset:img file="docs/variables/vars.png" alt="Variables" class="doc_image" }}

Once variables are created, you can edit them inline by clicking **Edit**.

{{ asset:img file="docs/variables/var\_editing.png" alt="Editing a Variable" class="doc_image" }}

## Using Variables in Templates

To see how to use variables in layouts, see the {{ link title="variables plugin docs" uri="plugins/variables" }}.