# Admin Menu

In PyroCMS, the admin menu can be manipulated by modules, so your module can have its own admin menu, or even multiple admin items in different menus.

* {{ docs:id_link title="Standard Admin Menu" }}
* {{ docs:id_link title="Anatomy of the Admin Menu" }}
* {{ docs:id_link title="Admin Menu Customization" }}

</div>
<div class="doc_content">

## Standard Admin Menu

By default, all modules can have a single admin link in a preset admin menu section. See the {{ link title="module dev docs" link="" }} for more information. Basically, though, your module details.php file contains information about where your module will sit in the admin menu:

In the array that the <samp>info()</samp> function returns, you indicate that PyroCMS should create an admin link by adding this:

    'backend' => true,
    'menu' => 'content'

This will place a link (with the name of your module) in the admin menu. This is probably all you need for most projects, but there are available methods for more customization.

## Anatomy of the Admin Menu

The admin menu is simply an array, and to manipulate it, you need to know what it looks like. Here's an example:

    Array
    (
        [lang:cp:nav_addons] => Array
            (
                [lang:cp:nav_modules] => admin/addons
                [lang:global:themes] => admin/addons/themes
                [lang:global:plugins] => admin/addons/plugins
                [lang:global:widgets] => admin/addons/widgets
                [lang:global:field_types] => admin/addons/field-types
            )

        [lang:cp:nav_content] => Array
            (
                [Blog] => admin/blog
                [Comments] => admin/comments
                [Files] => admin/files
                [Pages] => admin/pages
                [Streams] => admin/streams
                [Widgets] => admin/widgets
            )
    )

As you can see, the keys are either language keys, or plain strings (the menu parser will figure out which is which). The following functions give you the ability to modify this array before it is rendered into the admin menu.

## Admin Menu Customization

Your **details.php** file in your module loads on every page load in the admin, so it's a great place to manipulate the menu. PyroCMS will look for a function called <samp>admin_menu</samp> and it takes a single parameter by reference, <var>&$menu</var>. It's important that you take this variable by reference, otherwise you will not be manipulating the actual menu array.

Here's a sample <samp>admin_menu</samp> function from the Add-ons module:

    public function admin_menu(&$menu)
    {
        $menu['lang:cp:nav_addons'] = array(
            'lang:cp:nav_modules'           => 'admin/addons',
            'lang:global:themes'            => 'admin/addons/themes',
            'lang:global:plugins'           => 'admin/addons/plugins',
            'lang:global:widgets'           => 'admin/addons/widgets',
            'lang:global:field_types'       => 'admin/addons/field-types'
        );
    }

As you can see, we are creating a new section based on a language key, and then adding sections for each of our add-ons.

You can use any string as a section key, so this would work:

        $menu['lang:cp:nav_addons'] = array(

As well as this (this would place all the links in the <samp>Content</samp> menu area):

        $menu['Content'] = array(

### Working with Admin Menu Placement

Since we don't know how many admin sections there will be on any give interface, the best we can do is try to place the admin section where we want it to go. For this, you can use the <samp>add\_admin\_menu\_place</samp> function. Just tell it what main level section you want to place where. In this case, we want to place our newly-created Add-ons menu in the 6th admin slot:

    add_admin_menu_place('lang:cp:nav_addons', 6);