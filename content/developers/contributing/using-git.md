# Using Git

<a href="http://git-scm.com/" target="_blank">Git</a> is a distributed version control system we use to manage development of PyroCMS itself, but the [repository](http://github.com/pyrocms/pyrocms/) is publicly available on GitHub for people to use to upgrade their sites easily and to contribute changes. No matter how good any open-source project is, each new developer using the system has the potential to make it better, fix bugs or add new features. You can do this by "forking" the repository.

If you use PyroCMS you do not *need* to understand Git or contribute anything, but if you want to and you have no experience with Git then you might want to read through some of the [Help.GitHub Guides](http://help.github.com/) to get an understanding of how it all works.

Once you are ready to contribute you need to pick your work-flow:

### Workflow #1: Creating a fork

Go to out [GitHub Repository](http://github.com/pyrocms/pyrocms/) and click "Fork".

You will be set up with a new repository which is a copy of ours. That means you can work on your copy of our repository without us needing to give you access to anything. You can use the following command to get a copy on your computer in your current directory. Best to put this into htdocs (or somewhere you have a server/domains's document root set).

	git clone git@github.com:yourusername/pyrocms.git -b 2.0/develop

Now you can edit away on the source code and everything is tracked. When you commit your work *please* commit carefully and do not send use your config.php or database.php files in the changes.

### Workflow #2: Using an external repository

You can use your own Git repository if you *really* need to, but make sure you set up a read-only address for us to use. Then just email <a href="mailto:support@pyrocms.com?subject=Git%20Changes%20in%20a%20Private%20Repo">support@pyrocms.com</a> your URL and a description of what you have actually done.

### Committing your changes

When stuff is done, find out what files are changed, add/remove the correct files and commit.

	git status
	git add somefile
	git add somefolder/ 
	git rm afile andanotherfile
	git rm -r wholefolder/
	git commit -m &quot;bug: I fixed something"

When you have committed this, it does not actually go anywhere. It only gets commited to your local copy of the repository. You need to push your work to the github repository (also known as a remote repository). This means you can "commit" lots of work, but only send it all off when you are ready. Means multiple commits to secure what you have done, but the rest of the world is not lumbered with incomplete work until you are ready!

	git push origin 2.0/develop

If that says "rejected" anywhere it is most likely that your copy is out of date. This will only happen if anyone else is working on your fork or external repository. Pull the latest copy, then try again.

	git pull origin 2.0/develop
	
If you have anything to "revert" (meaning undo back to how it was before you edited it) then you can do this:

	git checkout -- filepath/filename.php
	
### Pulling PyroCMS updates

Even if you have a copy of our repository then you are basically taking a snapshot of our repository as it is at the time. If we push new commits you will miss out entirely unless you add us as another remote (this works for either workflow).

	git remote add pyrocms git://github.com/pyrocms/pyrocms.git
	git pull pyrocms 2.0/develop
	git push origin 2.0/develop

That will take any new commits from the main PyroCMS repository and push them to your own repository.

If you start spotting any messages about &quot;CRLF line endings bla bla bla&quot;, make sure you have your [line endings set up correctly](http://help.github.com/dealing-with-lineendings/). If you do not have your line endings set up to use Unix line endings when committed to the server then we will ignore your commits as it will mark pretty much every file as changed and mask your actual changes.