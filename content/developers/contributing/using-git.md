# Using Git

<p>
	<a href="http://git-scm.com/" target="_blank">Git</a> is a distributed version control system we use to manage development of PyroCMS itself, but the <a href="http://github.com/pyrocms/pyrocms/">repository</a> is publicly available on GitHub for people to use to upgrade their sites easily and to contribute changes. No matter how good any open-source project is, each new developer using the system has the potential to make it better, fix bugs or add new features. You can do this by &quot;forking&quot; the repository.</p>
<p>
	If you use PyroCMS you do not <em>need </em>to understand Git or contribute anything, but if you want to and you have no experience with Git then you might want to read through some of the <a href="http://help.github.com/">Help.GitHub Guides</a> to get an understanding of how it all works.</p>
<p>
	Once you are ready to contribute you need to pick your work-flow:</p>

### Workflow #1: Creating a fork

Go to out <a href="http://github.com/pyrocms/pyrocms/" target="_blank">GitHub Repository</a> and click &quot;Fork&quot;.

You will be set up with a new repository which is a copy of ours. That means you can work on your copy of our repository without us needing to give you access to anything. You can use the following command to get a copy on your computer in your current directory. Best to put this into htdocs (or somewhere you have a server/domains&#39;s document root set).

	$ git clone git@github.com:yourusername/pyrocms.git -b 2.0/develop

Now you can edit away on the source code and everything is tracked. When you commit your work <em>please</em> commit carefully and do not send use your config.php or database.php files in the changes.

### Workflow #2: Using an external repository

You can use your own Git repository if you <em>really</em> need to, but make sure you set up a read-only address for us to use. Then just email <a href="mailto:support@pyrocms.com?subject=Git%20Changes%20in%20a%20Private%20Repo">support@pyrocms.com</a> your URL and a description of what you have actually done.

### Committing your changes

When stuff is done, find out what files are changed, add / remove the correct files and commit.</p>

	$ git status
	$ git add somefile
	$ git add somefolder/ 
	$ git rm afile andanotherfile
	$ git rm -r wholefolder/
	$ git commit -m &quot;bug: I fixed something"

When you have committed this, it doesn&#39;t actually go anywhere. You have to push your work for that to happen. This means you can &ldquo;commit&rdquo; lots of work, but only send it all off when you are ready. Means multiple commits to secure what you have done, but the rest of the world isn&rsquo;t lumbered with incomplete work until you are ready!

	$ git push origin 2.0/develop

If that says &ldquo;rejected&rdquo; anywhere it is most likely that your copy is out of date. This will only happen if anyone else is working on your fork or external repository. Pull the latest copy, then try again.</p>

	$ git pull origin 2.0/develop
	
If you have anything to &ldquo;revert&rdquo; (meaning undo back to how it was before you edited it) then you can do this:

	$ git checkout -- filepath/filename.php
	
### Pulling PyroCMS updates

Even if you have a copy of our repository then you are basically taking a snapshot of our repository as it is at the time. If we push new commits you will miss out entirely unless you add us as another remote (this works for either workflow).

	$ git remote add pyrocms git://github.com/pyrocms/pyrocms.git
	$ git pull pyrocms 2.0/develop
	$ git push origin 2.0/develop

That will take any new commits from the main PyroCMS repository and push them to your own repository.

If you start spotting any messages about &quot;CRLF line endings bla bla bla&quot;, make sure you have your <a href="http://help.github.com/dealing-with-lineendings/" target="_blank" title="Set up Git to use correct line endings">line endings set up correctly</a>. If you do not have your line endings set up to use Unix line endings when committed to the server then we&#39;ll ignore your commits as it will mark pretty much every file as changed and mask your actual changes.
