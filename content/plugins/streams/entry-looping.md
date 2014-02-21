# Entry Display

One of the most fundamental functions of streams is displaying the entries that you can collected in your stream. The page outlines the various tools available to you to display your entries.

* {{ docs:id_link title="The Loop Cycle" }}
* {{ docs:id_link title="Parameters" }}
* {{ docs:id_link title="The Where Parameter" }}
* {{ docs:id_link title="Extra Loop Variables" }}
* {{ docs:id_link title="Restrict by User" }}
* {{ docs:id_link title="Nested Variables" }}
* {{ docs:id_link title="Pagination" }}
* {{ docs:id_link title="Controlling the Pagination Markup" }}
* {{ docs:id_link title="Switching Namespaces" }}
* {{ docs:id_link title="Separating Results into Sets" }}

</div>
<div class="doc_content">

## The Loop Cycle

The most basic and common way of interacting with PyroStreams data is looping through it using the <em>cycle</em> plugin function. Here's a very simple example where we display five entries from a stream called "bands":
 
	{{ noparse }}{{ streams:cycle stream="bands" limit="5" }}

    &lt;h2>{{ name }}&lt;/h2>

{{ /streams:cycle }}{{ /noparse }}

Inside the tags, you have access to all of the fields you set up when you created your streams. There are a lot of options to customize what entries are returned, which are outlined below.

<h3 id="short-syntax">Short Syntax</h3>

Instead of specifying a stream with the stream="stream_slug" parameter, you can use it in the place of "cycle". For instance, if the tag code below is functionally equivalent to our first example above:

    {{ noparse }}{{ streams:bands limit="5" }}

    &lt;h2>{{ name }}&lt;/h2>

{{ /streams:bands }}{{ /noparse }}

There is no real advantage to using the short syntax, except for saving some paramter space, which may come in handy if you have a lot of parameters.

## Filtering by Date

The cycle function contains a number of functions for filtering by date. For instance, you can specify a **year**, **month**, and **day**. Each of these should be a numerical value:

    {{ noparse }}{{ streams:events year="2013" month="01" day="14" }}{{ /noparse }}

You can also restrict the entries shown by telling the cycle plugin to show or not show entries before or after the current date by using **show_upcoming** and **show_past**. Both of these are set to **yes** by default, so if you wanted to display a list of events that are upcoming you could do it like this:

    {{ noparse }}{{ streams:events show_past="no" }}{{ /noparse }}

The parameters above need a field to filter the dates by, and this is the **created_by** column by default. However, if you have another field that you want to use instead, you can specify that with **date_by**:

    {{ noparse }}{{ streams:events date_by="event_start" year="2013" month="01" day="14" }}{{ /noparse }}

## Parameter Reference

The following are basic parameters that restrict or modify the returned data in some way:

<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="100"> 
    Parameter</th> 
   <th width="100"> 
    Default</th> 
   <th> 
    Description</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td> 
    stream</td> 
   <td> 
    &nbsp;</td> 
   <td> 
    Slug of the stream you want to cycle through.</td> 
  </tr> 
    <tr> 
      <td>namespace</td> 
      <td>streams</td> 
      <td>Streams works off the core streams namespace, but you can change this to use the cycle function with other namespaced streams.</td> 
    </tr> 
  <tr> 
   <td> 
    limit</td> 
   <td> 
    &nbsp;</td> 
   <td> 
    Number to limit the results to.</td> 
  </tr> 
  <tr> 
   <td> 
    offset</td> 
   <td> 
    &nbsp;</td> 
   <td> 
    Number to offset the results by.</td> 
  </tr> 
  <tr> 
   <td> 
    order_by</td> 
   <td> 
    created</td> 
   <td> 
    Specify a field to order by.</td> 
  </tr> 
  <tr> 
   <td> 
    sort</td> 
   <td> 
    desc</td> 
   <td> 
    Specify to the sort order. Ascending (<em>asc</em>), descending (<em>desc</em>), or <em>random</em>.</td> 
  </tr> 
  <tr> 
   <td> 
    date_by</td> 
   <td> 
    created</td> 
   <td> 
    The field to run date parameters through.</td> 
  </tr> 
  <tr> 
   <td> 
    year</td> 
   <td> 
    &nbsp;</td> 
   <td> 
    Restrict results to a year (in the date_by field).</td> 
  </tr> 
  <tr> 
   <td> 
    month</td> 
   <td> 
    &nbsp;</td> 
   <td> 
    Restrict results to a month (in the date_by field).</td> 
  </tr> 
  <tr> 
   <td> 
    day</td> 
   <td> 
    &nbsp;</td> 
   <td> 
    Restrict results to a day (in the date_by field).</td> 
  </tr> 
  <tr> 
   <td> 
    show_upcoming</td> 
   <td> 
    yes</td> 
   <td> 
    Choose yes or no to show entries dated in the future (in the date_by field).</td> 
  </tr> 
  <tr> 
    <td>show_past</td> 
    <td>yes</td> 
    <td>Choose yes or no to show entries dated in the past (in the date_by field).</td> 
  </tr> 
  <tr> 
    <td>where</td> 
    <td>&nbsp;</td> 
    <td>Allows you to restrict results. See {{ link title="The Where Parameter" uri="plugins/streams/entry-looping#the-where-parameter" }} for more information.</td> 
  </tr> 
  <tr> 
   <td> 
    exclude</td> 
   <td> 
    &nbsp;</td> 
   <td> 
    IDs of entries to exclude separated by a pipe character (|).</td> 
  </tr> 
  <tr> 
   <td> 
    exclude_called</td> 
   <td> 
    no</td> 
   <td> 
    Set to 'yes' to limit entries to ones not already displayed on the same page. Ex: An image gallery with a featured image. Use exclude_called="yes" on the rest of the images to not display the currently selected image..</td> 
  </tr> 
  <tr> 
   <td> 
    include</td> 
   <td> 
    &nbsp;</td> 
   <td>Value to include in a where= clause. Used with <strong>include_by</strong> to filter by a single data point.</td> 
  </tr> 
  <tr> 
   <td> 
    include_by</td> 
   <td>id</td> 
   <td>The field to use when using the <strong>include</strong> parameter. </td> 
  </tr> 
		<tr> 
			<td>disable</td> 
			<td></td> 
			<td>Allows you to disable fields and their formatting. You can specify multiple fields by separating them with a pipe character (|).</td> 
		</tr> 
  <tr> 
   <td> 
    no_results</td> 
   <td> 
    No results</td> 
   <td> 
    Message that displays when no results are found.</td> 
  </tr> 
  <tr> 
   <td>partial</td> 
   <td></td> 
   <td> 
    Allows separation of results into separate segments. See {{ link title="Separating Results into Sets" uri="plugins/streams/entry-looping#separating-results-into-sets" }} for more information.</td> 
  </tr> 
 </tbody> 
</table> 

## The Where Parameter

If you need to restrict your results, a handy way to do that is with the where parameter.

    where="`field_slug`='value'"

    where="`one_field_slug`>='value' AND `another_field_slug`!='another_value'"

    where="`one_field_slug`>='value' AND (`another_field_slug`!='another_value' OR `yet_another_field_slug`='yet_another_value')" 

<div class="note"><p><strong>Note:</strong> The where clause is directly mapped to the where clause in MySQL, so you are limited in the values that you can restrict by. For instance, if you have a Choice dropdown field with a key and value, the key is stored in the database. So, if you want to restrict by that field, you need to restrict by the choice key and not the value.</div>

## Extra Loop Variables

<p>Aside from the field tags that are returned when you loop through entries, you can also access some automatically generated tags.</p>

<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="100">Tag</th> 
   <th>Description</th> 
  </tr> 
 </thead> 
 <tbody>
 	<tr>
 		<td>{{&nbsp;count&nbsp;}}</td>
 		<td>A numerical auto increment of the posts returned. This is different than the id and resets on different pages of pagination. Starts at 1.</td>	
 	</tr>
 	<tr>
 		<td>{{&nbsp;odd_even&nbsp;}}</td>
 		<td>Returns 'odd' or 'even' alternately, starting with odd.</td>	
 	</tr>
 	<tr>
 		<td>{{&nbsp;last&nbsp;}}</td>
 		<td>Returns '1' if the item is the last in the returned set, or '0' if it is not.</td>	
 	</tr>
 </tbody>
</table>

## Restrict by User

<p>PyroStreams gives you the option of restricting a to a specific user. Each stream automatically tracks which user created an entry using the <strong>created_by</strong> field that is automatically added. Turning on user restricting means that only the entries created by the specified user will be returned.</p>

<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="100"> 
    Parameter</th> 
   <th width="100"> 
    Default</th> 
   <th> 
    Description</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
   <td> 
    restrict_user</td> 
   <td> 
    no</td> 
   <td> 
    Setting this to a value will enable user restricting. Setting it to <em>current</em> will use the current logged in user. This parameter can also take a user id and a username to restrict to.</td> 
  </tr> 
 </tbody> 
</table> 
<p>

<div class="tip"><strong>Note:</strong> If no user is logged in or the user id/username is invalid, user restricting is subsequently turned off.</div>
 
## Nested Variables
 
<p>Some variables return an array of values, such as a variable from a related field. Each of these values can be accessed with a colon between the field name and the sub variable you want to access.</p>

<p>For example, if you have a user field, named 'person', you can access their id like this:</p> 
 
    {{ noparse }}{{ person:id }}{{ /noparse }}
 
<p>Variables from relationships can be accessed in the same way:</p> 
 
     {{ noparse }}{{ band:name }}{{ /noparse }}
 
<p>And sub variables within relationships can be accessed this way:</p> 
 
     {{ noparse }}{{ band:email:email_link }}{{ /noparse }}

## Pagination
 
<p>Very often you'll want to paginate large data sets. PyroStreams allows you to do this quickly and easily. The following parameters are used in the <strong>cycle</strong> function for creating pagination.</p> 
 
<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="100"> 
				Parameter</th> 
			<th width="100"> 
				Default</th> 
			<th> 
				Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td> 
				paginate</td> 
			<td> 
				no</td> 
			<td> 
				Setting this to yes will enable pagination.</td> 
		</tr> 
		<tr> 
			<td> 
				pag_segment</td> 
			<td> 
				2</td> 
			<td> 
			The URI segment to take the pagination offset from.</td> 
		</tr> 
</table> 
 
<div class="tip"><strong>Note:</strong> Turning on pagination will automatically set the limit to 25. You can override this by setting a limit parameter.</div>

### Pagination URI Segments

Pagination works by adding a page number onto the end of the URI of your page. So if you have a URI like this:

    /products/list

Pagination will add a number like this:

     /products/list/10

For this reason, you need to go into the page that you have streams pagination on, and uncheck <strong>Require an exact URI match?</strong> under the <strong>Options</strong> tab. This means that when accessing a page like /products/list/10, it will not look for a page with a slug of '10' under 'lists', but will ignore that segment.
  
## Controlling the Pagination Markup
 
<p>You can control the markup of the pagination with the following parameters. These are taken directly from the CodeIgniter <a href="http://ellislab.com/codeigniter/user-guide/libraries/pagination.html">pagination markup parameters</a>.</p>

<table cellpadding="0" cellspacing="0" class="docs_table"> 
<thead> 
	<tr> 
		<th width="100">Parameter</th> 
		<th width="100">Default</th> 
		<th>Description</th> 
	</tr>
</thead> 
<tbody> 
	<tr> 
		<td>full_tag_open</td> 
 		<td>&lt;p&gt;</td> 
		<td>The opening tag placed on the left side of the entire result.</td> 
	</tr>
	<tr> 
		<td>full_tag_close</td> 
 		<td>&lt;/p&gt;</td> 
		<td>The closing tag placed on the right side of the entire result.</td> 
	</tr>
	<tr> 
		<td>first_link</td> 
 		<td>First</td> 
		<td>The text you would like shown in the "first" link on the left. If you do not want this link rendered, you can set its value to FALSE.</td> 
	</tr>
	<tr> 
		<td>first_tag_open</td> 
 		<td>&lt;div&gt;</td> 
		<td>The opening tag for the "first" link.</td> 
	</tr>
	<tr> 
		<td>first_tag_close</td> 
 		<td>&lt;/div&gt;</td> 
		<td>The closing tag for the "first" link.</td> 
	</tr>
	<tr> 
		<td>last_link</td> 
 		<td>Last</td> 
		<td>The text you would like shown in the "last" link on the right. If you do not want this link rendered, you can set its value to FALSE.</td> 
	</tr>
	<tr> 
		<td>last_tag_open</td> 
 		<td>&lt;div&gt;</td> 
		<td>The opening tag for the "last" link.</td> 
	</tr>
	<tr> 
		<td>last_tag_close</td> 
 		<td>&lt;/div&gt;</td> 
		<td>The closing tag for the "last" link.</td> 
	</tr>
	<tr> 
		<td>next_link</td> 
 		<td>Next</td> 
		<td>The text you would like shown in the "next" page link.  If you do not want this link rendered, you can set its value to FALSE.</td> 
	</tr>
	<tr> 
		<td>next_tag_open</td> 
 		<td>&lt;div&gt;</td> 
		<td>The opening tag for the "next" link.</td> 
	</tr>
	<tr> 
		<td>next_tag_close</td> 
 		<td>&lt;/div&gt;</td> 
		<td>The closing tag for the "next" link.</td> 
	</tr>
	<tr> 
		<td>prev_link</td> 
 		<td>&amplt;</td> 
		<td>The text you would like shown in the "next" page link. If you do not want this link rendered, you can set its value to FALSE.</td> 
	</tr>
	<tr> 
		<td>prev_tag_open</td> 
 		<td>&lt;div&gt;</td> 
		<td>The opening tag for the "previous" link.</td> 
	</tr>
	<tr> 
		<td>prev_tag_close</td> 
 		<td>&lt;/div&gt;</td> 
		<td>The closing tag for the "previous" link.</td> 
	</tr>
	<tr> 
		<td>cur_tag_open</td> 
 		<td>&lt;span&gt;</td> 
		<td>The opening tag for the "current" link.</td> 
	</tr>
	<tr> 
		<td>cur_tag_close</td> 
 		<td>&lt;/span&gt;</td> 
		<td>The closing tag for the "current" link.</td> 
	</tr>
	<tr> 
		<td>num_tag_open</td> 
 		<td>&lt;div&gt;</td> 
		<td>The opening tag for the "digit" link.</td> 
	</tr>
	<tr> 
		<td>num_tag_close</td> 
 		<td>&lt;/div&gt;</td> 
		<td>The closing tag for the "digit" link.</td> 
	</tr>
</tbody> 
</table>

### Pagination Example

    {{ noparse }}{{ streams:cycle stream="bands" limit="5" paginate="yes" pag_segment="2" limit="10" }}
    &lt;p>{{ total }} entries returned.&lt;/p>
    {{ entries }}
      &lt;h2>{{ name }}&lt;/h2>
    {{ /entries }}
    {{ pagination }}
{{ /streams:cycle }}{{ /noparse }}

## Switching Namespaces

Streams namespaces (not to be confused with [PHP namespaces](http://php.net/manual/en/language.namespaces.php)) allow modules to have their own sets of streams without worrying about naming conflicts. For instance, the Streams module can have a streams with <samp>products</samp> as the slug, and a store module can have a stream with <samp>products</samp> as the slug as well since each module has a difference namespace.

The default namespace for the streams module is <samp>streams</samp>, so you don't have to set that using the streams plugin. However, you can switch streams by adding a <samp>namespace</samp> parameter. This allows you to display data from streams from anywhere in the system, as long as you know the namespace.

For example if you wanted to display blog posts using the streams plugin (although there is a {{ link title="plugin" uri="plugins/blog" }} for that), you could do this:

    {{ noparse }}{{ streams:cycle stream="blog" namespace="blogs" }}{{ /noparse }}

<div class="note">
  <p>It's important to remember, however, that many modules use streams in unique ways, so using the streams plugin may only get you so far. For example, in the Pages module, the pages table contains page data like the title, slug, parent page, etc., and then each page has the ID of the stream entry it is associated with. So, you can only get the page entry data - and not the pages table data - only the entries of the associated page type stream.</p>

  <p>Your best bet is to use the respective plugins for each module, which often will contain extra data. For example, you can use the {{ link title="pages plugin" uri="plugins/pages#pages-children" }} to properly display lists of pages and their metadata.</p>
</div>

## Separating Results into Sets

Sometimes you don't want to show all of your stream entry results at the same time. The most common use case for this is separating results into equal columns.

PyroStreams has a built-in feature to take care of this, and can be called using the <strong>partial</strong> parameter. The <strong>partial</strong> parameter will take input like this:

    partial="1of3"

This will separate your results into three segments and only return the first. So, if you wanted to separate your results into two columns, you could do this:

    {{ noparse }}{{ streams:cycle stream="sample" partial="1of2" }}
{{ /streams:cycle }}<br />
{{ streams:cycle stream="sample" partial="2of2" }}
{{ /streams:cycle }}{{ /noparse }}

<div class="tip"><strong>Note:</strong> Other parameters do not affect the partial parameter, so if you have a limit/offset, the partial feature will take its segment from the entries already filtered by the limit/offset.</div>
