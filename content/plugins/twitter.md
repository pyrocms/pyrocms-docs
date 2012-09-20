# Twitter Plugin

The Twitter plugin is available to help you work with Twitter posts for anyone who has their tweets public. It is similar in function to the Twitter Widget, but of course using Plugins you have much more control over the output.

## twitter:feed

Display a number of blog posts from a specific Twitter user.
	
	{{ noparse }}{{ twitter:feed }}{{ /noparse }}

### Attributes

<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Default</th>
			<th>Required</th>
			<th>Description</th>
		</tr>
		<tr>
			<td width="100">username</td>
			<td width="100">None</td>
			<td width="100">Yes</td>
			<td>Which Twitter username should be used to find the tweets.</td>
		</tr>
		<tr>
			<td width="100">limit</td>
			<td width="100">5</td>
			<td width="100">No</td>
			<td>Limit the number of displayed tweets.</td>
		</tr>
	</tbody>
</table>

### Example

	{{ noparse }}
    {{ twitter:feed username="stephenfry" limit="1" }}
        <div class="tweet">
            <p>{{ text }}</p>
            <p>Posted: {{ timespan }}</p>
        </div>
    {{ /twitter:feed }}{{ /noparse }}

