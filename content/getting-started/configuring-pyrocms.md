# Configuring PyroCMS

Once you've installed PyroCMS, it's a good idea to set some configuration values so they are specific to your project. This step will walk you through some basic configurations.

</div>
<div class="doc_content">

## Your Base URL

Good news! PyroCMS automatically detects your base URL. That means you can move PyroCMS between your development, staging, and production servers without having to keep different configuration files for each.

Obviously PyroCMS can't detect your database, but you can set your environments to use the right database using {{ link title="environments" uri="guides/environments" }}.

## Setting Your Site's Name

In your site's admin, select <samp>Settings</samp> from the top menu. This is where all of your site's settings are. Some of these you probably won't need to touch, but some of them you'll want to change. You can start off by changing your site's name:

{{ asset:img file="docs/settings.png" alt="Settings" class="doc_image" }}

You'll learn more about how to use tags later, but you can now access your site's name in layouts and template like this:

    {{ noparse }}{{ settings:site_name }}{{ /noparse }}

## Changing Your Theme

In the admin area, go into <samp>Add-ons &rarr; Themes</samp>. There, you'll find a list of the currently available themes with "Default" selected.

{{ asset:img file="docs/themes.png" alt="Page Tabs" class="doc_image" }}

Select the radio button next to a theme (for example, try changing your theme to <samp>Minimal</samp>, a very basic theme that comes with PyroCMS), click <samp>Save</samp> and your site's entire front-end theme has changed.

PyroCMS is theme-based, so all of your site's assets go into a theme folder (CSS, JS, layouts, etc). Whether you create a custom theme or download one from the [PyroCMS add-ons directory](https://www.pyrocms.com/store), this is where you tell PyroCMS what theme to use.

## Creating a Custom Theme

Your project will most likely require a custom theme. To learn how to create a custom theme for your project, visit our {{ link uri="guides/themes" title="theming guide" }}. Creating a theme is simple and you do not need to have PHP skills in order to do it.

<hr>

{{ link uri="getting-started/creating-a-new-page" title="Next: Creating a New Page" }}