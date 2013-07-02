# Basic Search

The streams plugin allows you to set up a basic search for your data and display the results on another page. You can select the fields to search, and also paginate the results.

It's important to note that this search only searches what is in the streams table itself. So, for instance, the image field type only stores the foreign key of the image record in the files table, so you cannot search for image metadata through this search method.
	
## The Search Form 
 
The streams plugin search form allows you to set up some of the basic bits of info about your search. Here is an example form:

	{{ noparse }}
	
		{{ streams:search_form stream="artists" fields="name|bio" results_page="search" }}
	  
		{{ form_open }}
	 
			<p>{{ search_input }}</p>
	 
			<p>{{ form_submit }}</p>
	 
		{{ form_close }}
	 
		{{ /streams:search_form }}
	
	{{ /noparse }}

### Parameters

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
	<td>stream</td>
	<td></td>
    <td>Stream to search.</td> 
  </tr> 
  <tr> 
	<td>fields</td>
	<td></td>
    <td>Fields in the stream to search separated by a pipe character (|).</td> 
  </tr> 
  <tr> 
	<td>search_type</td>
	<td>full_phrase</td>
    <td>The type of search to preform. Values can be <em>full_phrase</em> or <em>keywords</em>. A full phrase search will perform a LIKE search for the full search term, and the keywords search will break the search term down into keywords and search for them separately.</td> 
  </tr> 
  <tr> 
	<td>results_page</td>
	<td></td>
    <td>URI where you want to display the results. This should be a page with the search_results tag.</td> 
  </tr> 
</tbody>
</table>

### Tags
	
<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="200">Tag</th> 
   <th>Description</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
	<td>{{&nbsp;form_open&nbsp;}}</td>
    <td>Form open tag.</td> 
  </tr> 
  <tr> 
	<td>{{&nbsp;form_close&nbsp;}}</td>
    <td>Form close tag.</td> 
  </tr> 
  <tr> 
	<td>{{&nbsp;search_input&nbsp;}}</td>
    <td>The search input.</td> 
  </tr> 
  <tr> 
	<td>{{&nbsp;form_submit&nbsp;}}</td>
    <td>The search from submit.</td> 
  </tr> 
</tbody>
</table>

## Search Results
 
 The search results tag allows you to display search results from your search_form input.

	{{ noparse }}{{ streams:search_results per_page="10" cache_segment="2" }}
	  
	&lt;p>Your search for {{ search_term }} returned {{ total_results }} results.&lt;/p>
	 
	{{ results }}
	  
	&lt;h2>{{ name }}&lt;/p>
	  
	{{ /results }}
	 
	{{ pagination }}
	  
{{ /streams:search_results }}{{ /noparse }}

### Parameters

<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="200">Parameter</th> 
   <th width="100">Default</th>
   <th>Description</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
	<td>paginate</td>
	<td>no</td>
    <td>Should we paginate the results? Yes or no.</td> 
  </tr> 
  <tr> 
	<td>per_page</td>
	<td>25</td>
    <td>Number of items per page with pagination.</td> 
  </tr> 
  <tr> 
	<td>cache_segment</td>
	<td>3</td>
    <td>Each search has a cache id in the url. You can specify the segment in this parameter. The segment after this should be clear for pagination offsets if need be.</td> 
  </tr> 
  <tr> 
	<td>per_page</td>
	<td>25</td>
    <td>Number of items per page with pagination.</td> 
  </tr> 
</tbody>
</table>

### Tags
	
<table cellpadding="0" cellspacing="0" class="docs_table"> 
 <thead> 
  <tr> 
   <th width="200">Tag</th> 
   <th>Description</th> 
  </tr> 
 </thead> 
 <tbody> 
  <tr> 
	<td>{{&nbsp;results&nbsp;}} {{&nbsp;/results&nbsp;}}</td>
    <td>Tag pair to loop through results.</td> 
  </tr> 
  <tr> 
	<td>{{&nbsp;pagination&nbsp;}}</td>
    <td>Pagination, if you are paginating results.</td> 
  </tr> 
  <tr> 
	<td>{{&nbsp;search_term&nbsp;}}</td>
    <td>The search term that was submitted.</td> 
  </tr> 
  <tr> 
	<td>{{&nbsp;total_results&nbsp;}}</td>
    <td>The total number of results returned.</td> 
  </tr> 
</tbody>
</table>

## The Results Page URI

Your results page should have room in the URI for the cache segment and pagination offset (if necessary). To accomplish this, you should create a page with strict URI matching turned off, so PyroCMS will ignore the segment where the cache key segment is placed.
