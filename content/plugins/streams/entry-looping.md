# Entry Looping

* {{ docs:id_link title="The Loop Cycle" }}
* {{ docs:id_link title="Parameters" }}
* {{ docs:id_link title="The Where Parameter" }}
* {{ docs:id_link title="Extra Loop Variables" }}
* {{ docs:id_link title="Restrict by User" }}
* {{ docs:id_link title="Nested Variables" }}
* {{ docs:id_link title="Pagination" }}
* {{ docs:id_link title="Controlling the Pagination Markup" }}

{{ docs:header }}The Loop Cycle{{ /docs:header }}

The most basic and common way of interacting with PyroStreams data is looping through it using the <em>cycle</em> plugin function. For example:
 
	{{ noparse }}{{ streams:cycle stream="bands" limit="5" }}

	<p>{{ total }} entries returned.</p>

	{{ entries }}

		<h2>{{ name }}</h2>

	{{ /entries }}

	{{ pagination }}

{{ /streams:cycle }}{{ /noparse }}

Inside the tags, you have several variables to use as well as the <strong>entries</strong> tag pair, which you can use to access the returned entries.

<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="150"> 
    Tag</th> 
   <th> 
    Description</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
	<td>{{&nbsp;entries&nbsp;}}&nbsp;{{&nbsp;/entries&nbsp;}}</td> 
    <td>Tag pair that cycles through all of the entries that were returned.</td> 
  </tr> 
  <tr> 
	<td>{{&nbsp;total&nbsp;}}</td> 
    <td>Counts the total number of entries returned, regardless of pagination.</td> 
  </tr> 
  <tr> 
	<td>{{&nbsp;pagination&nbsp;}}</td> 
    <td>The pagination HTML if pagination is on.</td> 
  </tr> 
</tbody>
</table>

PyroStreams comes with a lot of parameters to help you customize what data is being displayed. Below is a guide to those parameters and how to use them.

<h3 id="short-syntax">Short Syntax</h3>

Instead of specifying a stream with the stream="stream_slug" parameter, you can use it in the place of "cycle". For instance, if you have a stream called dogs, you can loop through them like this:

  {{ noparse }}{{ streams:dogs limit="10" }}{{ /noparse }}

<h3 id="entries-tags">Omitting the Entries Tags</h3>

Since PyroStreams 2.1.3, if you are not using the {{&nbsp;total&nbsp;}} or {{&nbsp;pagination&nbsp;}} variables, you can omit the {{&nbsp;entries&nbsp;}}{{&nbsp;/entries&nbsp;}} tags:

    {{ noparse }}{{ streams:cycle stream="bands" limit="5" }}

&lt;h2>{{ name }}</h2>

{{ /streams:cycle }}{{ /noparse }}

{{ docs:header }}Parameters{{ /docs:header }}

The following are basic parameters that restrict or modify the returned data in some way.

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
    <td>Allows you to restrict results. See <a href="">The Where Parameter</a> for more information.</td> 
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
    Allows separation of results into separate segments. See <a href="pyrostreams/docs/showing-data/looping#sets">Separating Results into Sets</a> for more information.</td> 
  </tr> 
 </tbody> 
</table> 

{{ docs:header }}The Where Parameter{{ /docs:header }}

If you need to restrict your results, a handy way to do that is with the where parameter.

### Where Syntax - 2.1.3 and above

The syntax for the where parameter in PyroStreams 2.2 allows you to specify more advanced where statements. All you need to do is wrap the field name in backticks and your value in single quotes.

This gives you the freedom to do some advanced where clauses:

    where="`field_slug`='value'"

    where="`one_field_slug`>='value' AND `another_field_slug`!='another_value'"

    where="`one_field_slug`>='value' AND (`another_field_slug`!='another_value' OR `yet_another_field_slug`='yet_another_value')" 

### Where Syntax - 2.1.2 and below

In PyroStreams 2.1.4, the where parameter can specify one parameter using the following syntax - the field slug and value separated by '==':

    where="field_slug==value"

<div class="tip"><strong>Note:</strong> The where clause is directly mapped to the where clause in MySQL, so you are limited in the values that you can restrict by. For instance, if you have a Choice dropdown field with a key and value, the key is stored in the database. So, if you want to restrict by that field, you need to restrict by the choice key and not the value.</div>

{{ docs:header }}Extra Loop Variables{{ /docs:header }}

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

{{ docs:header }}Restrict by User{{ /docs:header }}

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
 
{{ docs:header }}Nested Variables{{ /docs:header }}
 
<p>Some variables return an array of values, such as a variable from a related field. Each of these values can be accessed with a colon between the field name and the sub variable you want to access.</p>

<p>For example, if you have a user field, named 'person', you can access their id like this:</p> 
 
    {{ noparse }}{{ person:id }}{{ /noparse }}
 
<p>Variables from relationships can be accessed in the same way:</p> 
 
     {{ noparse }}{{ band:name }}{{ /noparse }}
 
<p>And sub variables within relationships can be accessed this way:</p> 
 
     {{ noparse }}{{ band:email:email_link }}{{ /noparse }}

{{ docs:header }}Pagination{{ /docs:header }}
 
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
  
## Controlling the Pagination Markup
 
<p>You can control the markup of the pagination with the following parameters. These are taken directly from the CodeIgniter <a href="http://codeigniter.com/user_guide/libraries/pagination.html">pagination markup parameters</a>.</p>

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

{{ docs:header }}Separating Results into Sets{{ /docs:header }}

Sometimes you don't want to show all of your stream entry results at the same time. The most common use case for this is separating results into equal columns.

PyroStreams has a built-in feature to take care of this, and can be called using the <strong>partial</strong> parameter. The <strong>partial</strong> parameter will take input like this:

    partial="1of3"

This will separate your results into three segments and only return the first. So, if you wanted to separate your results into two columns, you could do this:

    {{ noparse }}{{ streams:cycle stream="sample" partial="1of2" }}
{{ /streams:cycle }}<br />
{{ streams:cycle stream="sample" partial="2of2" }}
{{ /streams:cycle }}{{ /noparse }}

<div class="tip"><strong>Note:</strong> Other parameters do not affect the partial parameter, so if you have a limit/offset, the partial feature will take its segment from the entries already filtered by the limit/offset.</div>