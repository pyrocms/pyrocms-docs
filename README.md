# PyroCMS Documentation v2.2.0-dev

This repo is home to the PyroCMS documentation source. 

* [PyroCMS Documentation](http://docs.pyrocms.com/)

## Doc Versions

The documentation tags mirror the x.y release tags of PyroCMS, so the v2.2.0 documentation is on branch `2.2`, and so on. Once a new version of PyroCMS is in development, a new branch of documentation will be available on this repo. Please make sure when you are contributing a documentation change you are using the appropriate branch.

## Contributing to the Docs

To contribute to the PyroCMS docs, fork this repo to your local environment. The PyroCMS docs run off of [Fizl](https://github.com/parse19/Fizl), which is a flat-file based CMS written in CodeIgniter. It doesn't need a database to run, so you should be able to load up the docs easily.

The actual doc files are contained in the **content** folder, and the folder structure mirrors the URL structure. Each page is a markdown file which either has a matching URI name, such as **constants-and-globals.md**, or in a folder like **page-subsection/index.md**. For instance, the **Core Plugins** file is at **plugins/index.md**.
## Helping Grow the Docs

Right now the following are high needs areas for the docs:

* Spotting and fixing broken internal doc links
* Porting over tag reference pages
* Documenting modules
* Checking docs for spelling, grammar, and clarity

If you have doc feedback, please feel free to use the GitHub inline code commenter.

## Docs Style Guide

### Format

All doc files must be .md files and written in Markdown (except for HTML tables which can be written in plain HTML).

Internal doc links should be formatting using Fizl's link plugin. Here's an example:

	{{ link uri="general/basics/organization" title="Organization" }}
	
The yellow "tip" boxes (as seen on such pages as the Lex Parser developer guide) should follow this HTML structure:

	<div class="tip"><strong>Note:</strong> Content Here</div>
	
These boxes should be used when there is important information the user should take note of that may get lost in a general paragraph.

### Organization

The docs are organized into multiple categorized sections:

* About PyroCMS (About)
* Installing & Upgrading (Setup)
* Important Concepts (Concepts)
* Theming Guide (Themes)
* Modules, Plugins, Widgets, Field Types (for Core)
* Developer Docs (More in-depth how to)
* PyroCMS Pro (Pro features)

Within these sections are sub sections separated into columns.

If you are creating a new page, it should fit reasonably within one of the existing sections. If you think we need a new section, or want to suggest some organizational changes, please email [adam@pyrocms.com](mailto:adam@pyrocms.com).