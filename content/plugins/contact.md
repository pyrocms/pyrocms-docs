# Contact Plugin

* {{ docs:id_link title="Setting Up Fields" }}
* {{ docs:id_link title="Available Field Types" }}
* {{ docs:id_link title="Available Field Validation Rules" }}
* {{ docs:id_link title="Creating an Email Template" }}
* {{ docs:id_link title="Form Attributes" }}
* {{ docs:id_link title="Examples" }}

The contact plugin allows you to easily customize and display a form that sends an email upon submission. You can create text, textarea, file, hidden, and dropdown fields in your form, and customize the email content.

	{{ noparse }}{{ contact:form }}{{ /noparse }}

{{ docs:header }}Setting Up Fields{{ /docs:header }}

You can customize which fields you want by creating a parameter with the desired name of your field, followed by some data about that field. Each piece of data is separated by a pipe character (|). Along with some special values, you can specify form validation rules (available validation rules are listed below).

Your field will be available to display as a variable between the form tag pair. So, for insance, if you want to create a required text field called "name", you can add this as a parameter:

	name="text|required"

You can now display this input field with a variable:

	{{ noparse }}{{ name }}{{ /noparse }}

{{ docs:header }}Available Field Types{{ /docs:header }}

The following field types are available to be used with the contact form. (Not to be confused with Streams field types, which are separate and for use with streams, not the contact form).

### Text

A simple text input.

	name="text|required"

### Textarea

The same as text above, but a textarea.

	name="textarea|required|alpha_numeric"

### Hidden

A hidden input. Takes the name of the hidden element should appear in the 2nd space with an equals sign in front of it.

	name="hidden|=my_value|required"

### File

A file upload input. Since required is the only real validation rule that can be applied to a file input, you can specify the file types allowed with the input:

	attachment="file|required|jpg|png|gif"

You can also opt to not require the file input:

	attachment="file|pdf|doc"

File attachments will automatically be put into a folder called 'contact_attachments' in your file upload folder. If it doesn't exist, it will be created.

### Dropdown

Creates a select dropdown element. Since required is the only real validation rule that can be applied to a dropdown, the rest are each of the dropdown values that you want in a *key=value* or just *value* format:

	best_time_to_call="dropdown|required|Morning|Afternoon|Evening|Night"

If you want to specify keys, you can:

	subject="dropdown|required|support=Support Request|complimet=Compliment"

{{ docs:header }}Available Field Validation Rules{{ /docs:header }}

The following rules are available, and are reproduced here from the CodeIgniter validation rules.

<table cellpadding="0" cellspacing="1" border="0" style="width:100%" class="tableborder">
	<tr>
		<th>Rule</th>
		<th>Description</th>
		<th>Example</th>
	</tr>

	<tr>
		<td class="td"><strong>required</strong></td>
		<td class="td">Returns FALSE if the form element is empty.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>matches</strong></td>
		<td class="td">Returns FALSE if the form element does not match the one in the parameter.</td>
		<td class="td">matches[form_item]</td>
	</tr>

	<tr>
		<td class="td"><strong>min_length</strong></td>
		<td class="td">Returns FALSE if the form element is shorter then the parameter value.</td>
		<td class="td">min_length[6]</td>
	</tr>

	<tr>
		<td class="td"><strong>max_length</strong></td>
		<td class="td">Returns FALSE if the form element is longer then the parameter value.</td>
		<td class="td">max_length[12]</td>
	</tr>

	<tr>
		<td class="td"><strong>exact_length</strong></td>
		<td class="td">Returns FALSE if the form element is not exactly the parameter value.</td>
		<td class="td">exact_length[8]</td>
	</tr>

	<tr>
		<td class="td"><strong>greater_than</strong></td>
		<td class="td">Returns FALSE if the form element is less than the parameter value or not numeric.</td>
		<td class="td">greater_than[8]</td>
	</tr>

	<tr>
		<td class="td"><strong>less_than</strong></td>
		<td class="td">Returns FALSE if the form element is greater than the parameter value or not numeric.</td>
		<td class="td">less_than[8]</td>
	</tr>

	<tr>
		<td class="td"><strong>alpha</strong></td>
		<td class="td">Returns FALSE if the form element contains anything other than alphabetical characters.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>alpha_numeric</strong></td>
		<td class="td">Returns FALSE if the form element contains anything other than alpha-numeric characters.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>alpha_dash</strong></td>
		<td class="td">Returns FALSE if the form element contains anything other than alpha-numeric characters, underscores or dashes.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>numeric</strong></td>
		<td class="td">Returns FALSE if the form element contains anything other than numeric characters.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>integer</strong></td>
		<td class="td">Returns FALSE if the form element contains anything other than an integer.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>decimal</strong></td>
		<td class="td">Returns FALSE if the form element is not exactly the parameter value.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>is_natural</strong></td>
		<td class="td">Returns FALSE if the form element contains anything other than a natural number: 0, 1, 2, 3, etc.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>is_natural_no_zero</strong></td>
		<td class="td">Returns FALSE if the form element contains anything other than a natural number, but not zero: 1, 2, 3, etc.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>valid_email</strong></td>
		<td class="td">Returns FALSE if the form element does not contain a valid email address.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>valid_emails</strong></td>
		<td class="td">Returns FALSE if any value provided in a comma separated list is not a valid email.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>valid_ip</strong></td>
		<td class="td">Returns FALSE if the supplied IP is not valid. Accepts an optional parameter of "IPv4" or "IPv6" to specify an IP format.</td>
		<td class="td">&nbsp;</td>
	</tr>

	<tr>
		<td class="td"><strong>valid_base64</strong></td>
		<td class="td">Returns FALSE if the supplied string contains anything other than valid Base64 characters.</td>
		<td class="td">&nbsp;</td>
	</tr>


</table>

{{ docs:header }}Creating an Email Template{{ /docs:header }}

If you would like to send an email using a template, you can do so by editing the default contact template or creating your own. To see how to create your own email templates, please see the documentation on the {{ link title="email template module" uri="modules/email-templates" }}.

The contact form comes with a basic contact email template already set up, which you can edit in the {{ link title="email template module" uri="modules/email-templates" }} and is set as the default for the *template* form parameter. The following fields are available for use:

<table cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
			<th>Name</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>sender_agent</td>
			<td>The form submitter's browser name and version.</td>
		</tr>
		<tr>
			<td>sender_ip</td>
			<td>The form submitter's IP address.</td>
		</tr>
		<tr>
			<td>slug</td>
			<td>The template slug.</td>
		</tr>
		<tr>
			<td>reply-to</td>
			<td>The email reply to address.</td>
		</tr>
		<tr>
			<td>to</td>
			<td>The value in the 'to' field for this email.</td>
		</tr>
		<tr>
			<td>from</td>
			<td>The value in the 'from' field for this email.</td>
		</tr>
		<tr>
			<td>reply-to</td>
			<td>The email reply to address.</td>
		</tr>
	</tbody>
</table>

We also have access to all of the fields we put in the contact form in the email template. Attachments will be automatically attached to the email.

### Example Email Template:

	This message was sent via the contact form on with the following details:
	<hr />
	IP Address: {{ sender_ip }}
	OS {{ sender_os }}
	Agent {{ sender_agent }}
	<hr />
	{{ message }}
	{{ name }},
	{{ email }}
    
{{ docs:header }}Form Attributes{{ /docs:header }}

The following attributes can be used to customize your form. None of these attributes are required.

<table cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
			<th>Name</th>
			<th>Default</th>
			<th>Description</th>
		</tr>

        <tr>
			<td width="100">
				max-size</td>
			<td width="100">
				None</td>
			<td>
                The size in kb of file attachments to allow.
            </td>
		</tr>
        <tr>
			<td width="100">
				reply-to</td>
			<td width="100">
				None</td>
			<td>
                The email address to use for the reply to
                field. If a form input named 'email' is found and you have not specified a reply-to address, the 'email' input will be used.
            </td>
		</tr>
        <tr>
			<td width="100">
				button</td>
			<td width="100">
				Send</td>
			<td>
                The text to display on the submit button. Defaults to 'Send'. The first letter in the button will always be capitalized.
            </td>
		</tr>
        <tr>
			<td width="100">
				template</td>
			<td width="100">
				contact</td>
			<td>
                Email template slug to use for sending the contact email.
            </td>
		</tr>
        <tr>
			<td width="100">
				lang</td>
			<td width="100">
				en</td>
			<td>
                Email template language version to use for this instance of the contact form.
            </td>
		</tr>
        <tr>
			<td width="100">
				to</td>
			<td width="100">
				Site Contact Email</td>
			<td>
                The email address to send to.
            </td>
		</tr>
        <tr>
			<td width="100">
				from</td>
			<td width="100">
				Site Server Email</td>
			<td>
                This address will show as the "from" email address. 
            </td>
		</tr>
        <tr>
			<td width="100">
				sent</td>
			<td width="100">
				Translated string found in lang file</td>
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
			<td>
				If you provide a valid email template slug here it will be used to send 
				an automatic reply email to the user that submitted the form. The same data is available
				in the auto-reply template as in the regular contact template. This is useful if you want to send the user an email message along the lines of "thank for you filling out this form". Make sure to include an input called 'email' - this is where the email will be sent.
			</td>
		</tr>
    </tbody>
</table>

{{ docs:header }}Examples{{ /docs:header }}

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