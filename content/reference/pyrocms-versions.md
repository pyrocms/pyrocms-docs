# PyroCMS Versions

PyroCMS is in constant active development, so it helps to know a little bit about how PyroCMS is developed from a version number standpoint.

## The Latest Stable Version

The download button on the [home page](http://www.pyrocms.com) will always download the latest stable version. The latest stable release is the last version that the PyroCMS community has tested and stamped out as many bugs as possible in.

## Branches

All development for PyroCMS is done on the PyroCMS [GitHub Page](https://github.com/pyrocms/pyrocms). Git allows for different versions of software to exist via branches, and PyroCMS uses branches to create development versions that you can download and use if you'd like to test out new features.

If you would like to test out features that are being developed for the next release of PyroCMS, fork the [PyroCMS GitHub repo](https://github.com/pyrocms/pyrocms) following the [instructions on GitHub](https://help.github.com/articles/fork-a-repo) and pull down the latest changes from the current development branch. Branches are designated by their release, so for instance, PyroCMS 2.1-2.1.5 were developed on the PyroCMS 2.1/develop branch, while 2.2 is being developed on the 2.2/develop branch.

## Release Types

Aside from the obvious big releases (PyroCMS 2, PyroCMS 3, etc), it's important to know what type of release means based on its release number. Below is a table of the types of releases of PyroCMS and what each means.

{{docs:table header="Release Type|Example|Notes"  colwidth="140" class="table table-striped"}}

Feature Release | __2.1__ | Any release that has two numbers is a new feature release. These are releases of PyroCMS that typically have new features and may require you to update your site to comply with non backwards compatible syntax chagnes. It is important to read the <a href="">update guide documentation</a> when upgradign to a feature reelase.

Maintenance Release | __2.1.3__ | Any release with a third number (3 in this case) is a release that mostly contains bug fixes and optimization of existing functionality. Although new features are not released on these versions, it is still recommended to upgrade when these versions are released as they can have important fixes.

{{/docs:table}}

### Beta Stability

Beware that beta versions of PyroCMS may have some bugs and other problems you'll run into. To report issues, use GitHub's [Issue Tracker](https://github.com/pyrocms/pyrocms/issues). You can report issues and get feedback and confirmation form the developers when the problem has been fixed.
