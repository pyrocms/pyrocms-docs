# PyroCMS Versions

PyroCMS is in constant active development, so it helps to know a little bit about how PyroCMS is developed from a version number standpoint.

## The Latest Stable Version

The download button on the [home page](http://www.pyrocms.com) will always download the latest stable version. The latest stable release is the last version that the PyroCMS community has tested and stamped out as many bugs as possible in.

## Branches

All development for PyroCMS is done on the PyroCMS [GitHub Page](https://github.com/pyrocms/pyrocms). Git allows for different versions of software to exist via branches, and PyroCMS uses branches to create development versions that you can download and use if you'd like to test out new features.

If you would like to test out features that are being developed for the next release of PyroCMS, fork the [PyroCMS GitHub repo](https://github.com/pyrocms/pyrocms) following the [instructions on GitHub](https://help.github.com/articles/fork-a-repo) and pull down the latest changes from the current development branch. Branches are designated by their release, so for instance, PyroCMS 2.1-2.1.4 were developed on the PyroCMS *2.1/develop* branch, while 2.2 is being developed on PyroCMS *2.2/develop*.

## Release Types

Aside from the obvious big releases (PyroCMS 2, PyroCMS 3, etc), it's important to know what type of release means based on its release number. Below is a table of the types of releases of PyroCMS and what each means. 

<table class="table table-striped">
	<thead>
	<tr>
		<th width="200">Release Type</th>
		<th>Example</th>
		<th>Notes</th>
	</tr>
	<thead>
	<tbody>
	<tr>
		<td>Feature Release</td>
		<td><strong>2.1</strong>
		<td>Any release that has two numbers is a new feature release. These are releases of PyroCMS that typically have new features and may require you to update your site to comply with non backwards compatible syntax chagnes. It is important to read the <a href="">update guide documentation</a> when upgradign to a feature reelase.</td>
	</tr>
	<tr>
		<td>Maintenance Release</td>
		<td><strong>2.1.3</strong>
		<td>Any release with a third number (3 in this case) is a release that mostly contains bug fixes and optimization of existing functionality. Although new features are not released on these versions, it is still recommended to upgrade when these versions are released as they can have important fixes.</td>
	</tr>
	</tbody>
</table>

### Note on Beta Stability

Beware that beta versions of PyroCMS may have some bugs and other problems you'll run into. To report issues, use GitHub's [Issue Tracker](https://github.com/pyrocms/pyrocms/issues). You can report issues and get feedback and confirmation form the developers when the problem has been fixed.
