# Control Panel GUI

PyroCMS comes with a wide range of tools to make developing module UI interfaces easy and streamlined. The following outlines the various GUI tools and standards for the PyroCMS control panel.

To keep things consistent, this page also contains notes on GUI guidelines - from button naming and placement to phrasing. We strongly recommend following these guidelines, but if you need to ignore some of them, please keep a consistent user experience in mind.

* {{ docs:id_link title="Basic Module Page" }}
* {{ docs:id_link title="Buttons" }}
* {{ docs:id_link title="Data Tables" }}
* {{ docs:id_link title="Forms" }}
* {{ docs:id_link title="Columns" }}
* {{ docs:id_link title="Confirmation Messages" }}

</div>
<div class="doc_content">

## Basic Module Page

A basic module page, containing a single box element with a grey header bar and white body, would be marked up like this: 

	<section class="title">
		<h4>Title</h4>
	</section>
	
	<section class="item">
		<section class="content">
		Your module section content.
		</div>
	</section>

As you can see, we have two section elements: <samp>title</samp> and <samp>item</samp>. For a padded buffer inside of the <samp>item</samp> section, use a div with a class of <samp>content</samp>. All of your module content can go inside the item section.

### Section Title Guidelines

* Section titles should only be used for titles, not instructions, filtering controls, or other content.
* Section titles should contain a single h4 tag with the title inside. No other elements should be included (filters, etc.).
* Section titles should not be empty. Empty states should be left to empty state messages.
* Section titles should be nouns ("Variables" instead of "List Variables").

## Buttons

Buttons on the PyroCMS admin area come in two flavors: the smaller, gray buttons (secondary buttons) and the larger buttons (primary) that can be colored.

Secondary buttons require a class of <samp>button</samp>. Primary buttons require a class of <samp>btn</samp> and a color class, such as <samp>blue</samp> or <samp>gray</samp>.

### Color Guidelines

Use of the color primary buttons should generally following these meanings:

* Blue: Save, Save & Exit
* Gray: Cancel
* Orange: Neutral link (such as edit or another non-action link)

### Action Buttons

Action buttons such as Save, Save & Close, Cancel, etc. should be primary buttons and follow the color guidelines above.

### Misc. Button Guidelines

* Buttons on the same line should be of the same size (ie: don't mix primary and secondary buttons next to each other).

## Data Tables

Sections are the main building block of the PyroCMS 2.0 interface. They consist of a section title and a section item:

### Tables

Listing data in a table format is a common module need. To create a basic table listing, use the following table tag:

	<table class="table-list" border="0" cellspacing="0">

### Action Buttons

Many table rows need a column of action buttons (such as Edit, Delete, etc.). These should be put into a column with a class of **actions**. This will float the buttons right. Action buttons should generally take the secondary button class.

	<td class="actions">
		<?php echo
			anchor('sample', lang('global:view'), 'class="button" target="_blank"').' '.
			anchor('admin/sample/edit/'.$item->id, lang('global:edit'), 'class="button"').' '.
			anchor('admin/sample/delete/'.$item->id, lang('global:delete'), 'class="button"');
		?>
	</td>
	
The column heading for the actions column does not need a title. It can be left blank.
	
### Empty States

Indexes of data with no entries should have a simple line of text indicating there is no data to be displayed inside of a div with a class of **no_data**:

	<div class="no_data">
		<?php echo lang('sample:no_items'); ?>
	</div>
	
### Batch Actions

Some data listings need the ability to affect multiple items in the list via a checkbox for each row. There are a few pieces to this. The first, is adding a checkbox to each row, which can be done like so:

	<td><?php echo form_checkbox('action_to[]', $item->id); ?></td>
	
After switching out **$item->id** to whatever variable you want to send to the controller in the action\_to array, this will give you a checkbox on every row.

In the header, you may wish to have a checkbox that, when checked, checks all of the rows in the table. This can be done with a checkbox with the class of **check-all**:

	<th><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>

Finally, PyroCMS has built-in logic to disable/enable table batch action buttons based on whether or not any rows in the database are checked. You can use this logic by wrapping your batch action buttons in a div with a class of **table\_action\_buttons**:

	<div class="table_action_buttons">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete'))); ?>;
	</div>
	
### Filtering and Searching

If you would like to add filtering and searching capabilities to your table, the markup is as follows:

	<fieldset id="filters">
		
		<legend><?php echo lang('global:filters'); ?></legend>
		
		<?php echo form_open(); ?>
	
		<?php echo form_hidden('f_module', $module_details['slug']); ?>
			<ul>  
				<li>
	        		<?php echo lang('blog_status_label', 'f_status'); ?>
	        		<?php echo form_dropdown('f_status', array(0 => lang('global:select-all'), 'draft'=>lang('blog_draft_label'), 'live'=>lang('blog_live_label'))); ?>
	    		</li>
			
				<li>
	        		<?php echo lang('blog_category_label', 'f_category'); ?>
	        		<?php echo form_dropdown('f_category', array(0 => lang('global:select-all')) + $categories); ?>
	    		</li>
				
				<li><?php echo form_input('f_keywords'); ?></li>
				<li><?php echo anchor(current_url() . '#', lang('buttons.cancel'), 'class="cancel"'); ?></li>
			</ul>
		<?php echo form_close(); ?>
	</fieldset>

Obviously the filters can be anything you want, but this should give you a general idea.

### Pagination

Pagination is an important part of any data table, and PyroCMS has a built-in pagination generation function that has all of the PyroCMS pagination styles preset.

	create_pagination($uri, $total_rows, $limit = NULL, $uri_segment = 4, $full_tag_wrap = TRUE)
	
Example usage:

	$this->data->pagination = create_pagination(
									'admin/sample/index',
									$total_items,
									$this->settings->item('records_per_page'),
									4);

## Forms

Here is an example of form markup:

	<div class="form_inputs">
	
	<ul>
		<li>
			<label for="name"><?php echo lang('sample:name'); ?> <span>*</span></label>
			<div class="input"><?php echo form_input('name', set_value('name', $name)); ?></div>
		</li>
	
		<li>
			<label for="slug"><?php echo lang('sample:slug'); ?> <span>*</span></label>
			<div class="input"><?php echo form_input('slug', set_value('slug', $slug)); ?></div>
		</li>
	</ul>
	
	</div><!-- /.form_inputs -->
	
	<div class="buttons">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
	</div><!-- /.buttons -->

<div class="tip"><strong>Note:</strong> PyroCMS handles the display of all flash messages (such as errors), so as long as you are using the Form Validation class in CodeIgniter, you do not need to worry about showing inline error messages in forms.</div>

## Columns
Any element of an admin page may be split into as many as four columns using the CSS classes <samp>one\_quarter</samp>, <samp>one\_half</samp>, <samp>three\_quarters</samp>, and <samp>one\_full</samp>. For instance, three columns with the leftmost using half the parent's width:

	<div class="one_half">
		...
	</div>
	
	<div class="one_quarter">
		...
	</div>
	
	<div class="one_quarter">
		...
	</div>

Columns will float below as necessary, as when using two columns followed by one full-width column:
	
	<div class="one_half">
		...
	</div>
	
	<div class="one_half">
		...
	</div>
	
	<div class="one_full">
		...
	</div>

The <samp>last</samp> class may be applied to float a class right instead of left. This is useful in ensuring that the right edge of the last column aligns with the right edge of the parent element.

<div class="tip"><strong>Note:</strong> Sections using the <samp>item</samp> or <samp>title</samp> classes cannot be directly turned into columns. You must wrap the section in a div which can then be styled as a column.</div>

## Tabs

PyroCMS uses the jQuery UI for tabs on admin pages. Use the <samp>tabs</samp> and <samp>tab-menu</samp> classes as follows:

	<div class="tabs">
		<ul class="tab-menu">
			<li><a href="#panel1"><span>First Panel</span></a></li>
			<li><a href="#panel2"><span>Second Panel</span></a></li>
		</ul>
		<div id="panel1">
			...
		</div>
		<div id="panel2">
			...
		</div>
	</div>

## Confirmation Messages

A class of <samp>confirm</samp> can be added to links and buttons to create a confirmation Javascript modal appear before any action is taken.