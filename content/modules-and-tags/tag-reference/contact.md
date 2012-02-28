# Contact

This tag displlays a contact form so that visitors can email you without seeing your email address

	{{ noparse }}{{ contact:form }}{{ /noparse }}
    
### Attributes

<table cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
			<th>
				Name</th>
			<th>
				Default</th>
			<th>
				Required</th>
			<th>
				Description</th>
		</tr>
        <tr>
			<td width="100">
				*wildcard</td>
			<td width="100">
				None</td>
			<td width="100">
				No</td>
			<td>
				You must specify the field names that you
                want in the form. They must be in the following
                format: field-name="type|rules".
                Valid types are: text, textarea, file, and dropdown.
            </td>
		</tr>
        <tr>
			<td width="100">
				max-size</td>
			<td width="100">
				None</td>
			<td width="100">
				No</td>
			<td>
                The size in kb of file attachments to allow
            </td>
		</tr>
        <tr>
			<td width="100">
				reply-to</td>
			<td width="100">
				None</td>
			<td width="100">
				No</td>
			<td>
                The email address to use for the reply to
                field. If an email field is added to the form it
                will be used instead.
            </td>
		</tr>
    </tbody>
</table>
