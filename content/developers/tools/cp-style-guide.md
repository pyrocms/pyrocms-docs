# Control Panel GUI Guidelines

To keep the user experience seamless throughout the back end from module to module, the following control panel tools and guidelines have been developed to serve as a guide when deciding on UI elements. They exist in order to provide a consistent back end experience, so if you need to bend these a little for your module, please keep the goal of consistency in mind.

## Buttons

Buttons on the PyroCMS back-end come in two flavors: the smaller, gray buttons (secondary buttons) and the larger buttons (primary) that can be colored.

Secondary buttons require a class of _button_. Primary buttons require a class of _btn_ and a color class, such as _blue_ or _gray_.

### Color Options

Use of the color primary buttons should generally following these meanings:

* Blue: Save, Save & Exit
* Gray: Cancel
* Orange: Neutral link (such as edit or another non-action link)

### List Buttons

Buttons in table views should generally be secondary buttons. In some special cases, these can be primary buttons (see the blog module).

List buttons should be flush right in a separate column. The column should not have an "Actions" heading as in previous versions of PyroCMS.

### Action Buttons

Action buttons such as Save, Save & Close, Cancel, etc. should be primary buttons and follow the color guidelines above.

### Misc. Button Guidelines

* Buttons on the same line should be of the same size (ie: don't mix primary and secondary buttons next to each other).

## Sections

Sections are the main building block of the PyroCMS 1.4 interface. They consist of a section title and a section item:

	<section class="title"><h4>Title</h4></section>
	<section class="item">Content</section>

### Section Titles

* Section titles should only be used for titles, not instructions, filtering controls, or other content.
* Section titles should contain a single h4 tag with the title inside.
* Section titles should not be empty. Empty states should be left to empty state messages.
* Section titles should be nouns ("Variables" instead of "List Variables").

## Data Listings

### Empty States

Indexes of data with no entries should have a simple line of text indicating there is no data to be displayed. Optionally, a link  

### Inactive State

To be determined.

### Filtering and Searching

Filtering and search functionality should be located above data listings. Filtering and searching tools should not be located in the section header.

## Forms