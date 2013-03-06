# git Workflow

If you are using git to build your site and watch to keep up to date with PyroCMS, try this git workflow.

</div>
<div class="doc_content">

## Step 1: Fork or Clone PyroCMS

If you just want to pull down changes from the PyroCMS repo on GitHub, you don't need to fork the PyroCMS Repo, you can just clone it like you would any other PyroCMS repo:

    git clone git@github.com:pyrocms/pyrocms.git

If you want to push your changes back to PyroCMS as pull requests, you'll need to fork our PyroCMS community repo, which can be found [here](https://github.com/pyrocms/pyrocms). Simply click the <samp>Fork</samp> button and you'll have your very own forked repo of PyroCMS on your account!

Then you'll clone that forked repo to your dev environment. Using the terminal, find the folder you want to clone your repo into, and use this command, replacing <samp>your-name</samp> with you GitHub user name.

    git clone git@github.com:your-name/pyrocms.git

## Step 2: Add Pyro as a Remote

We want to be able to pull in changes from the PyroCMS repo, so we can add it as a remote named <samp>upstream</samp>:

    git remote add upstream git://github.com/pyrocms/pyrocms.git

That's it! You now have your own repository on your account and on your local environment that has PyroCMS as a remote. To pull down changes from PyroCMS, simply run this command, where <samp>2.2/develop</samp> is the PyroCMS branch you want to use:

    git pull upstream 2.2/develop

You can use git as you would in any other repo, so you can even create a different branch for your site:

    git branch mysite
    git checkout mysite