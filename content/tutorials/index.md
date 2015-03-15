## Tutorial Introduction

As you likely know by now PyroCMS is built on Laravel and utilizes composer.  The file structure for Add-ons now resembles composer, if you're converting a module from a previous version of PyroCMS, you'll need to read below carefully.


## Where to install your Add-on

An Add-on can be installed in several directories.  The most common, non-core, directories are `/addons/shared/` and `/addons/[SITE-REF]/`.  You may need to create theses directories.

## Naming your Add-on

Whether you're creating a theme, module, or any other Add-on (also called "Package" below) you must name them in a composer-like way. 

First, you must have (or decide) on a Vendor name.  If you've been digging in the core you'll notice the core Add-ons are in a folder called `Anomaly`.  That is the 'vendor' name.
 It's often best to create a github account and use your username as the vendor.

The last thing you need to add is what type of Add-on it is.  IE: 'theme', 'module', etc.  This appends to the Add-on/Package name with a dash (-).

For a short example, we'll use 'Example' as our Vendor name, 'Super' as our Add-on/Package name which is a 'theme' and place it in the 'shared' folder.  

    /addons/shared/example/super-theme

Another might be:
    
    /addon/shared/foo/super_awesome-module

You may have any number of Add-ons in your 'Vendor' Folder.

<div class="note"><strong>Note:</strong> See Namespaces for considerations while using an underscore in your folder names for Add-ons</div>


## Namespaces

Now that you have a Vendor name and named your Add-on, you're done with namespaces too.

For the examples in 'Naming your add-on':

    <?php namespace Example\SuperTheme;

and

    <?php namespace Foo\SuperAwesomeTheme;

You'll notice the underscore and dash is omitted and the first letter of the word after the underscore or dash is capitalized.

<div class="note"><strong>Note:</strong> Namespace declarations must be declared before anything else.  It's a good habit to declare it immediately after the opening PHP tag.</div>

## Add-on File Structure

As we continue to follow a composer-like system, the Add-on folder structure will look very different from previous PyroCMS Add-ons.

A basic Theme Add-on could look something like this:

    /addons/shared/example/super-theme
      |
      |- .git
      |- composer.json
      |- LICENSE.md
      |- README.md
      |- src
            |- SuperTheme.php
            |- SuperThemeRouteProvider.php
            |- SuperThemeServiceProvider.php
      |- resources
         |
         |- css  //folder
         |- fonts //folder
         |- img  //folder
         |- js  //folder
         |- lang   
            |- en 
                |- addon.php
         |-views
            |- hello.twig
            |- layouts
                  |- default.twig  
            |- partials
                   |- header.twig
                   |- footer.twig
                   |- metadata.twig
                   |- messages.twig


Any specific differences will be discussed in the relevant tutorial.  It is worth mentioning you have great flexibility in the `resources` folder for the folders created.  It will be up to you to call those resources in your views.
          































