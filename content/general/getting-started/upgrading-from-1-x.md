# Upgrading to 2.0 from 1.x

{{ noparse }}To update your PyroCMS installation you will need to do a little bit of work. We've made it as easy as possible but 2.0 brings lots of new features and changes the way a few things work. We feel that the only way the upgrade could be easier is if we did not change anything, which is not how the PyroCMS team roll.

## Step 1: Backup your config and addons

Copy the following files and folders to a safe location:

* addons/
* system/cms/config/database.php
* uploads/
* index.php
* .htaccess

## Step 2: Replace files

Replace the following files and folders with the new content from the zip you downloaded:

* addons/
* system/
* index.php
* .htaccess

If you had any changes in your index.php (if you had customised any locations of system, application or addon folders for example) then please recreate these changes.

If you had custom addons in there please be careful you do not delete them. Also if you are upgrading PyroCMS Professional and had purchased Newsletter module by Jerel Unruh or the Streams module by Adam Fairholm then please delete them as they are now included in the system folder of PyroCMS Professional 2.0. 

The Galleries module is no longer bundled with PyroCMS but you may download it from the store or from [its repository on GitHub](http://pyrocms.com/pyrocms/galleries). Simply place it back into the addons folder and it will continue operating as usual. 

## Step 3: Re-apply database config

Open your backed-up system/cms/config/database.php file and re-apply the config settings. The file looks different now, but simply copy all "local" settings to "development" and "live" settings to "production". This is to allow more technical users to run a copy of their website on their development machines and have the real website online using different database settings.

## Step 4: Set the PYRO_ENV variable on your production server

In previous versions of PyroCMS the "environment" would be defined by the URL which was rather inflexible. In 2.0 the environment can be set by server configuration or in the .htaccess.

If you are uploading straight to the production (or live site) with FTP or similar than edit the .htaccess file and change this line:

    # SetEnv PYRO_ENV production

to:

    SetEnv PYRO_ENV production

This will let PyroCMS know which database connection group to use.

## Step 5: Make the following folders writable:

* system/cms/logs/
* system/cms/cache/
* system/cms/cache/default/simplepie/
* system/cms/config/
* uploads/
* addons/


## Step 6: Upgrade your themes

You may be using a third-party theme. If so go to the Add-on Store and see if it has been upgraded to 2.0. Otherwise you'll need to upgrade this theme to use the new Lex Parser - which is a slightly different and greatly improved Tag system added in 2.0.

This is not a list of all of the new features of Lex, it is simply a guide for upgrading your templates to work with Lex.

### New Tags

_For a comprehensive look at the new PyroCMS tag system, see the [PyroCMS tag guide](/docs/2.0/basics/pyrocms-tags)._

The delimiters in Lex are two (2) braces "{{ }}", not one (1) "{ }".  You will need to change all of your tags to use the new style.

Example:

    {{name}}

### Whitespace in Tags

You can now put whitespace in your tags before and after the delimiters. ***The whitespace is optional.***

Example

    {{ name }}

### Variables in Conditionals

Variables in conditionals do not, and should not, be wrapped in delimiters.

Likewise, if the variable returns a string, you do not have to surround it with quotes.

**Old style:**

    {if '{name}' == 'Dan'}

**New style:**

    {{ if name == 'Dan' }}

_Note that you can use the whitespace in conditional tags as well._

### Callback Tags in Conditionals

Using a callback tag in a conditional is simple.  Use it just like any other variable except for one exception.  When you need to provide attributes for the callback tag, you are required to surround the tag with a ***single*** set of braces (you can optionally use them for all callback tags).

**Examples**

    {{ if user:logged_in }} {{ endif }}

    {{ if user:logged_in and {user:logged_in group="admin"} }} {{ endif }}

## Step 7: Upgrade your modules

Check out the [Add-on Store](/store) to see if the modules you use have been upgraded to be compatible PyroCMS 2.0.
{{ /noparse }}