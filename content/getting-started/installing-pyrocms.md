# Installing PyroCMS

PyroCMS is simple to download and install - all you need is a basic development environment and you're ready to go! This page will walk you through the installation process.

</div>
<div class="doc_content">

## Download PyroCMS

Once you have an environment that meets {{ link uri="reference/server-requirements" title="the requirements" }}, you'll need to download PyroCMS. The latest stable version of PyroCMS is available for download on the <a href="http://pyrocms.com">PyroCMS home page</a>.

If you are familiar with [git](http://git-scm.com/), you can clone the latest version of PyroCMS from our [GitHub repo](https://github.com/pyrocms/pyrocms):

    git clone https://github.com/pyrocms/pyrocms

Make sure you are using the correct branch - the {{ link title="PyroCMS versions guide" uri="reference/pyrocms-versions" }} explains the difference between branches. If you are using git to pull down changes from PyroCMS, check out our {{ link title="example git workflow" uri="guides/git-workflow" }}.

## Open the Installer

Download and extract the PyroCMS files into your development folder of choice. Next, visit the URL where your install is. For example, if we extracted PyroCMS into a folder called <strong>pyro</strong> on our development environment, we'd visit:

    http://localhost/pyro/

The installer will load an walk you throught the necessary steps to install PyroCMS.

<div class="note"><p>Installation troubles? Check out some troubleshooting tips in our <a href="reference/troubleshooting">Troubleshooting Guide</a>.</p></div>

Once it's done, you'll have a link to your PyroCMS site as well as the admin area so you can log in. The admin panel is always located at /admin, in our **pyro** folder example, you can find your admin panel at:

    http://localhost/pyro/admin

<div class="note"><p>Once you log into your admin panel for the first time, PyroCMS may prompt you to delete your installation folder if it wasn't able to do so autmoatically. <strong>It's very important to delete your install folder!</strong></p></div>

Go ahead and log into PyroCMS for the first time with the account you created during the installation process. You're now ready to get started!

<hr>

{{ link uri="getting-started/configuring-pyrocms" title="Next: Configuring PyroCMS" }}