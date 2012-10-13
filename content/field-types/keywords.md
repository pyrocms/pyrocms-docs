# Keywords Field Type
		
The keywords field type allows you to enter keywords or tags for your entries. 
 
## Parameters
 
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
			<td>return_type</td> 
			<td>string</td> 
			<td>Allows you to return the keywords as a __string__ or __array__. See formats below.</td> 
		</tr> 
</tbody> 
</table> 
 
## Output
 
Depending on your __Return Type__, you will have different outputs. Your two possible outputs are a __string__ or an __array__.

A string output will comma separate each keyword. You will only need to call your keywords with a single var tag like normal. Here is the example format for a string:

	{{ noparse }}# Keywords: keyword_1, keyword_2, keyword_3

// template
<div class="keywords">
	<p>{{ keywords }}</p>
</div>

// output
<div class="keywords">
	<p>keyword_1, keyword_2, keyword_3</p>
</div>{{ /noparse }}

Returning your keywords as an array allows for more flexibility to customize the output. Arrays will be printed out with open and closing tags like so:

	{{ noparse }}# Keywords: keyword_1, keyword_2, keyword_3

// template
<div class="keywords">
	<p>
		{{ keywords }}
		<a href="/tagged/{{ keyword }}">{{ keyword }}</a>{{ if !is_last }}, {{ endif }}
		{{ /keywords }}
	</p>
</div>

// output
<div class="keywords">
	<p>
		<a href="/tagged/keyword_1">keyword_1</a>, 
		<a href="/tagged/keyword_2">keyword_2</a>, 
		<a href="/tagged/keyword_3">keyword_3</a>
	</p>
</div>{{ /noparse }}

You can see how much more customized this output is. This allows you do almost what ever you please. In addition to the `keyword` and `is_last` vars you have in the example above, you also have a few others. This is what gets returned with each keyword:

	keyword, count, total, is_first, is_last

Here is one more quick example of how to create a keyword list with total keywords:

	{{ noparse }}# Keywords: Shopping, Electronics, Technology

// template
{{ keywords }}
	{{ if is_first }}
	<h3>{{ total }} Keywords</h3>
	<ol>
	{{ endif }}
		<li><a href="/tagged/{{ keyword }}">{{ keyword }}</a></li>
	{{ if is_last }}
	</ol>
	{{ endif }}
{{ /keywords }}

// output
<h3>3 Keywords</h3>
<ol>
	<li><a href="/tagged/Shopping">Shopping</a></li>
	<li><a href="/tagged/Electronics">Electronics</a></li>
	<li><a href="/tagged/Technology">Technology</a></li>
</ol>{{ /noparse }}

