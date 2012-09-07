# PyroFilter - JQuery Plugin

The pyrofilter plugin is the backbone to the filter interface used in many of the core modules (comments, users, ..etc). It can also be used in third-party modules as well.

### Parameters
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Default</th>
			<th>Type</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>filter\_onload</td>
			<td>Filter results when the page loads</td>
			<td>true</td>
			<td>Boolean</td>
		</tr>
		<tr>
			<td>content</td>
			<td>A selector that specifies what element is holding the data</td>
			<td>#filter-stage</td>
			<td>String</td>
		</tr>
		<tr>
			<td>module</td>
			<td>the module we are filtering, we can also use 'module\_query' to extract the value from a form element (see below)</td>
			<td>n/a</td>
			<td>String</td>
		</tr>
		<tr>
			<td>module\_query</td>
			<td>A selector for the form element holding the module name</td>
			<td>input[name="f_module"]</td>
			<td>String</td>
		</tr>
	</tbody>
</table>

<div class="tip"><strong>NOTE:</strong> You must specify the <I>module</i> or <i>module_query</i> selector if your interface does not match the default setup.</div>


### Default Options

	$.fn.pyroFilter.defaultsOptions = {
	    filter_onload: 	true,
	    content: 		'#filter-stage',
	    module: 		'',
	    module_query: 	'input[name="f_module"]'
	};


Methods
----------

#### do_filter(form\_data, url)
Used for custome filter calls.

#### refresh
Helper function that calls do_filter without any parameters

#### getInstance
Get filter object instance


Basic usage
-----------

#### Override global default options
	$.fn.pyroFilter.defaultsOptions.filter_onload = true;

#### Initialize the plugin
	$('#filters form').pyroFilter({filter_onload:false});

#### Refresh filter results (trigger change)
	$('#filters form').pyroFilter('refresh');

#### Custom filter call
	var form_data = {};
	$('#filters form').pyroFilter('do_filter', form_data, url);

#### Get filter instance
	var instance = $('#filters form').pyroFilter('getInstance');

#### Filter instance usage

	instance.refresh();
	instance.do_filter(form_data, url);
<div class="tip"><strong>NOTE:</strong> The example above is assuming 'instance' is a variable thats holding the filter instance.</div>



Interface Example
---------
	<fieldset id="filters">
		
		<legend>Filters</legend>
		
		<?php echo form_open('admin/blogs/ajax_filter'); ?>

		<?php echo form_hidden('f_module', $module_details['slug']); ?>
			<ul>  
				<li>
	        	<?php echo lang('blogs_status_label', 'f_status'); ?>
	        	<?php echo form_dropdown('f_status', array(0 => 'All', 'draft'=>'Draft')); ?>
	    		</li>
			
				<li>
        		<?php echo lang('blogs_category_label', 'f_category'); ?>
        		<?php echo form_dropdown('f_category', array(0 => 'All') + $categories); ?>
	    		</li>
				
				<li><?php echo form_input('f_keywords'); ?></li>
				<li><?php echo anchor(current_url() . '#', 'Cancel', 'class="cancel"'); ?></li>
			</ul>
		<?php echo form_close(); ?>
	</fieldset>

	<div id="filter-stage">
		<table>
		...
		</table>
	</div>


Admin Controller Example
---------

	class Admin extends Admin_Controller
	{
		public function ajax_filter()
		{
			$category = $this->input->post('f_category');
			$status = $this->input->post('f_status');
			$keywords = $this->input->post('f_keywords');

			$post_data = array();

			if ($status == 'live' OR $status == 'draft')
			{
				$post_data['status'] = $status;
			}

			if ($category != 0)
			{
				$post_data['category_id'] = $category;
			}

			//keywords, lets explode them out if they exist
			if ($keywords)
			{
				$post_data['keywords'] = $keywords;
			}
			$results = $this->blogs_m
							->where($post_data)
							->get_all();

			//set the layout to false and load the view
			$this->template
				->set_layout(FALSE)
				->set('blogs', $results)
				->build('admin/tables/posts');
		}
	}