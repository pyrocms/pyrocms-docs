# Parameter Variables

<p>As a convenience feature, PyroStreams allows you to pass commonly-used variables in parameters using a special bracket syntax. For example, if you wanted to use the third URI segment in a parameter, you could use the <strong>[segment_3]</strong> plugin variable like this:</p>

<pre class="prettify"><code class="language-html">{{ streams:single stream="bands" id="[segment_3]" }}</code></pre>

<p>Below is a list of variables available for use:</p>

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr>
			<th width="150">Variable</th>
			<th>Default</th> 
		</tr> 
	</thead> 
	<tbody> 
	<tr> 
 		<td>[segment_1]</td> 
		<td>Value in the first URI segment.</td> 
	</tr>
	<tr> 
 		<td>[segment_2]</td> 
		<td>Value in the second URI segment.</td> 
	</tr>
	<tr> 
 		<td>[segment_3]</td> 
		<td>Value in the third URI segment.</td> 
	</tr>
	<tr> 
 		<td>[segment_4]</td> 
		<td>Value in the fourth URI segment.</td> 
	</tr>
	<tr> 
 		<td>[segment_5]</td> 
		<td>Value in the fifth URI segment.</td> 
	</tr>
	<tr> 
 		<td>[segment_6]</td> 
		<td>Value in the sixth URI segment.</td> 
	</tr>
	<tr> 
 		<td>[segment_7]</td> 
		<td>Value in the seventh URI segment.</td> 
	</tr>
	<tr> 
 		<td>[user_id]</td> 
		<td>Currently logged in user's id.</td> 
	</tr>
	<tr> 
 		<td>[username]</td> 
		<td>Currently logged in user's username.</td> 
	</tr>
</table>