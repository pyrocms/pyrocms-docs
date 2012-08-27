# Contact

This tag displays a contact form so that visitors can email you without seeing your email address

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
				wildcard</td>
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
                The size in kb of file attachments to allow.
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
        <tr>
			<td width="100">
				button</td>
			<td width="100">
				Send</td>
			<td width="100">
				No</td>
			<td>
                The text to display on the submit button.
            </td>
		</tr>
        <tr>
			<td width="100">
				template</td>
			<td width="100">
				contact</td>
			<td width="100">
				No</td>
			<td>
                Email template slug to use for sending the contact email.
            </td>
		</tr>
        <tr>
			<td width="100">
				lang</td>
			<td width="100">
				en</td>
			<td width="100">
				No</td>
			<td>
                Email template language version to use for
                this instance of the contact form.
            </td>
		</tr>
        <tr>
			<td width="100">
				to</td>
			<td width="100">
				Site Contact Email</td>
			<td width="100">
				No</td>
			<td>
                The email address to send to. Defaults to the contact
                email found in CP > Settings.
            </td>
		</tr>
        <tr>
			<td width="100">
				from</td>
			<td width="100">
				Site Server Email</td>
			<td width="100">
				No</td>
			<td>
                This address will show as the "from" email address.
            </td>
		</tr>
        <tr>
			<td width="100">
				sent</td>
			<td width="100">
				Translated string found in lang file</td>
			<td width="100">
				No</td>
			<td>
                This message is shown to the user after they
                have sent a message. Use this to set a custom
                message.
            </td>
		</tr>
        <tr>
			<td width="100">
				error</td>
			<td width="100">
				Translated string found in lang file</td>
			<td width="100">
				No</td>
			<td>
                Set a custom error message here. It will display if
                there is a server error when sending the email.
            </td>
		</tr>
        <tr>
			<td width="100">
				success-redirect</td>
			<td width="100">
				Current Page</td>
			<td width="100">
				No</td>
			<td>
                Set url segments here if you want the user to be sent to
                a different page after a successful send.
            </td>
		</tr>
		<tr>
			<td width="100">
				auto-reply
			</td>
			<td width="100">
				None
			</td>
			<td width="100">
				No
			</td>
			<td>
				If you provide a valid email template slug here it will be used to send 
				an automatic reply email to the user that submitted the form. The same data is available
				in the auto-reply template as in the regular contact template.
			</td>
		</tr>
    </tbody>
</table>

### Example

    {{ noparse }}{{ contact:form
    name = &quot;text|required&quot;
    email = &quot;text|required|valid_email&quot;
    subject = &quot;dropdown|required|hello=Say Hello|support=Support Request|Something Else&quot;
    message = &quot;textarea|required&quot;
    attachment = &quot;file|jpg|png|zip&quot;
}}
    {{ name }}
    {{ email }}
    {{ subject }}
    {{ message }}
    {{ attachment }}
{{ /contact:form }}{{ /noparse }}

### Advanced Example

    {{ noparse }}{{ contact:form
    name = &quot;text|required&quot;
    email = &quot;text|required|valid_email&quot;
    subject = &quot;dropdown|required|hello=Say Hello|support=Support Request|Something Else&quot;
    message = &quot;textarea|required&quot;
    attachment = &quot;file|jpg|png|zip&quot;
    max_size = &quot;10000&quot;
    reply-to = &quot;visitor@somewhere.com&quot; * Read note below *
    button = &quot;send&quot;
    template = &quot;contact&quot;
    lang = &quot;en&quot;
    to = &quot;contact@site.com&quot;
    from = &quot;server@site.com&quot;
    sent = &quot;Your message has been sent. Thank you for contacting us&quot;
    error = &quot;Sorry. Your message could not be sent. Please call us at 123-456-7890&quot;
    success-redirect = &quot;home&quot;
}}
    {{ name }}
    {{ email }}
    {{ subject }}
    {{ message }}
    {{ attachment }}
{{ /contact:form }}{{ /noparse }}

If there is an "email" field in the form, it will be used for the reply-to address. Your form should have a
reply-to address set or else contain an "email" field in the form.