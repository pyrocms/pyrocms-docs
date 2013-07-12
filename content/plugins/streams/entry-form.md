# Entry Form

<p>PyroStreams gives you tools to allow for modification of data through PyroCMS page templates, so you can build data interactions without having to give users access to your control panel.</p>
	
* {{ docs:id_link title="The Entry Form" }}
* {{ docs:id_link title="Form Parameters" }}
* {{ docs:id_link title="Fields Tag Pair" }}
* {{ docs:id_link title="Showing Individual Fields" }}
* {{ docs:id_link title="Other Tags" }}
* {{ docs:id_link title="Form Assets" }}
* {{ docs:id_link title="Overriding Success/Failure Messages" }}
* {{ docs:id_link title="Using reCAPTCHA" }}
* {{ docs:id_link title="Email Notifications" }}
* {{ docs:id_link title="CSRF" }}

## The Entry Form
 
<p>PyroStreams allows you to display a create or edit form using the PyroCMS tag system. Forms are generated using the following format:</p>

	{{ noparse }}{{ streams:form stream="concerts" mode="new" }}

	{{ form_open }}

	&lt;table>

	{{ fields }}

	&lt;tr class="{{ odd_even }}">
	&lt;td width="250">{{ input_title }}{{ required }} &lt;small>{{ instructions }}&lt;/small>&lt;/td>
	&lt;td>{{ error }}{{ input }}&lt;/td>
	&lt;/tr>

	{{ /fields }}

	&lt;/table>

	{{ form_submit }}

	{{ form_close }}

{{ /streams:form }}{{ /noparse }}

## Form Parameters

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="100">Parameter</th> 
			<th width="250">Default</th> 
			<th>Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td>stream</td> 
			<td>&nbsp;</td> 
			<td>Required. Stream slug for the stream we are editing or creating data for.</td> 
		</tr> 
		<tr> 
			<td>mode</td> 
			<td>new</td> 
			<td>Either <em>new</em> or <em>edit</em>, depending on if you are creating or editing data..</td> 
		</tr> 
		<tr> 
			<td> 
				edit_id</td> 
			<td> 
				&nbsp;</td> 
			<td> 
				Required if editing an entry. ID of the entry to edit.</td> 
		</tr> 
		<tr> 
			<td>where</td> 
			<td>&nbsp;</td> 
			<td>Allows you to specify a where parameter using the following structure: <em>field_slug==value</em>.</td> 
  		</tr> 
		<tr> 
			<td> 
				required</td> 
			<td> 
				&lt;span class="required"&gt;* required&lt;/span&gt;</td> 
			<td> 
				String that populates the required variable if the field is required.</td> 
		</tr> 
		<tr> 
			<td> 
				return</td> 
			<td> 
				current url</td> 
			<td> 
				Where to redirect to to when the form action is done. Use -id- to designate the insert id for when using the new mode. This will set a flash success/error message and redirect, so make sure the page you redirect to does not have a redirect itself, otherwise the flash message wil be lost between the two redirects.</td> 
		</tr> 
		<tr> 
			<td>error_start</td> 
			<td>&lt;span class="error"&gt;</td> 
			<td>String that prepends error messages.</td> 
		</tr> 
		<tr> 
			<td>error_end</td> 
			<td>&lt;/span&gt;</td> 
			<td>String that appends error messages.</td> 
		</tr> 
		<tr> 
			<td>include</td> 
			<td>&nbsp;</td> 
			<td>Fields to include in the form, separated by pipe characters (|). If you specify fields here, all other fields (excluding default columns) will be excluded.</td> 
		</tr> 
		<tr> 
			<td>exclude</td> 
			<td>&nbsp;</td> 
			<td>Fields to exclude from the form, separated by pipe characters (|).</td> 
		</tr> 
		<tr> 
			<td>use_recaptcha</td> 
			<td>no</td> 
			<td>Activates reCAPTCHA. See documentation below.</td> 
		</tr> 
		<tr> 
			<td>creator_only</td> 
			<td>no</td> 
			<td>When using the form in edit mode, setting this to yes will only show the form and allow editing of an entry if the creator_id matches the logged in user's id.</td> 
		</tr> 
	</tbody> 
</table>

## Fields Tag Pair

<p>The <strong>fields</strong> tag pair loops through each input row and makes data available via variables that allows you to mark up your form in any way you&#39;d like using the following tags:</p> 

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="120">Parameter</th> 
			<th>Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td> 
				&#123;&#123;&nbsp;input_title&nbsp;}}</td> 
			<td> 
				The field title.</td> 
		</tr> 
		<tr> 
			<td> 
				&#123;&#123;&nbsp;input_slug&nbsp;}}</td> 
			<td> 
				The field slug.</td> 
		</tr> 
		<tr> 
			<td> 
				&#123;&#123;&nbsp;instructions&nbsp;}}</td> 
			<td> 
				The field instructions.</td> 
		</tr> 
		<tr> 
			<td> 
				&#123;&#123;&nbsp;input&nbsp;}}</td> 
			<td> 
				The field input element.</td> 
		</tr> 
		<tr> 
			<td> 
				&#123;&#123;&nbsp;required&nbsp;}}</td> 
			<td> 
				If field is required, displays a required message. Blank if field is not required.</td> 
		</tr> 
		<tr> 
			<td> 
				&#123;&#123;&nbsp;odd_even&nbsp;}}</td> 
			<td> 
				Displays <em>odd</em> or <em>even</em> based on the field count.</td> 
		</tr> 
	</tbody> 
</table>

Example:

	{{ noparse }}{{ fields }}

&lt;label for="{{ input_slug }}">{{ title }}&lt;/label>
{{ if instructions }}&lt;p>{{ instructions }}&lt;/p>{{ endif }}
&lt;p>{{ input }}&lt;/p>

{{ /fields }}{{ /noparse }}

## Showing Individual Fields

If you want a finer-grain control over your form inputs, you can access various form variables with single tags. For instance, if you had a name field with a slug of 'your\_name', you could display the input element by using {{ your\_name:input }}.

The following variables are available for each input:

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="120">Parameter</th> 
			<th>Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td>label</td> 
			<td>The name of the field.</td> 
		</tr> 
		<tr> 
			<td>slug</td> 
			<td>The slug of the field.</td> 
		</tr> 
		<tr> 
			<td>instructions</td> 
			<td>The instructions that you entereded when assigning the field.</td> 
		</tr> 
		<tr> 
			<td>input</td> 
			<td>The field form input.</td> 
		</tr> 
		<tr> 
			<td>error</td> 
			<td>The error for the field if there is one. If you have error_start and error_end specificied, the error will be wrapped in those variables.</td> 
		</tr> 
		<tr> 
			<td>is_required</td> 
			<td>Returns true/false based on whether the fireld is required or not.</td> 
		</tr> 
		<tr> 
			<td>required</td> 
			<td>The string to show if a field is required.</td> 
		</tr> 
	</tbody>
</table>

Example:

	{{ noparse }}{{ title:label }} {{ if title:is_required }}Make sure to fill this in!{{ endif }}

{{ if title:instructions }}&lt;p>{{ title:instructions }}&lt;/p>{{ endif }}

&lt;p>{{ title:input }}&lt;/p>
{{ /noparse }}

## Other Tags

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="120">Tag</th> 
			<th>Description</th> 
		</tr> 
	</thead> 
	<tbody> 
<tr> 
	<td>&#123;&#123;&nbsp;form_open&nbsp;}}</td> 
	<td>Creates the opening form tag that submits to the current URL. It is highly recommended that you use this tag instead of using your own form opening tag, since this tag adds important hidden fields that some field types may rely on.</td> 
</tr> 
<tr> 
	<td>&#123;&#123;&nbsp;form_submit&nbsp;}}</td> 
	<td>Creates a form submit button.</td> 
</tr> 
<tr> 
	<td>&#123;&#123;&nbsp;form_reset&nbsp;}}</td> 
	<td>Creates a form reset button.</td> 
</tr> 
<tr> 
	<td>&#123;&#123;&nbsp;form_close&nbsp;}}</td> 
	<td>Creates a form close tag.</td> 
</tr>
</table>

## Form Assets

Many fields have CSS or Javascript that needs to be loaded. Depending on your theme, the assets may not be automatically added to your page, breaking some fields. In this case, you can add them manually with the **form_assets** function. Just place this below your form tags:

	{{ noparse }}{{ streams:form_assets }}{{ /noparse }}

<div class="tip"><strong>Note:</strong> You should already have jQuery loaded before the form_assets tag is used.</div>

## Overriding Success/Failure Messages

Many PyroCMS themes have built-in displays for flash data (that is, data that is only available on the next page refresh, and usually contains a message about the success/failure of the previous action). You can control what these messages say with these two parameters:

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="100">Parameter</th> 
			<th width="250">Default</th> 
			<th>Description</th> 
		</tr> 
	</thead> 
	<tbody> 
		<tr> 
			<td>success_message</td> 
			<td>&nbsp;</td> 
			<td>Overrides flash success message content.</td> 
		</tr> 
		<tr> 
			<td>failure_message</td> 
			<td>&nbsp;</td> 
			<td>Overrides flash failure message content.</td> 
		</tr>
	</tbody>
</table>

## Using reCAPTCHA

reCAPTCHA is a simple and high quality CAPTCHA tool, and PyroStreams makes it easy to implement. To start, get your public and private keys from <a href="http://www.google.com/recaptcha">reCAPTCHA</a>. Then, add those keys into the reCAPTCHA config file, located in <strong>streams/config/recaptcha.php</strong>.

After that, all you need to do is add <strong>use_recaptcha="yes"</strong> in your form tag, and add the following tags:

	{{ noparse }}{{ recaptcha }}{{ /noparse }}

This is the actual reCAPTCHA box. It takes a parameter of <strong>theme</strong>, which is set to "red" by default. This can be changed to "clean", "white", or "blackglass" to fix your design.

	{{ noparse }}{{ recaptcha_error }}{{ /noparse }}

This displays the reCAPTCHA error. If obeys the form&#39;s error parameters so it will fit in with the rest of your form.

## Email Notifications

When an entry form is submitted and processed successfully, you can set the form to send an email.

The entry form email notification feature hooks into PyroCMS native email template module, so to get started, you'll need to go to <strong>Design &rarr; Email Templates</strong> and create a new template. Aside from all the normal variables and functions you can access in a layout, the following special email variables are available to you:

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="120">Tag</th> 
			<th>Description</th> 
		</tr> 
	</thead> 
	<tbody> 
<tr> 
	<td>&#123;&#123;&nbsp;sender_ip&nbsp;}}</td> 
	<td>The IP address of the sender.</td> 
</tr> 
<tr> 
	<td>&#123;&#123;&nbsp;sender_os&nbsp;}}</td> 
	<td>The operating system of the sender.</td> 
</tr> 
<tr> 
	<td>&#123;&#123;&nbsp;sender_agent&nbsp;}}</td> 
	<td>Full user agent of the sender.</td> 
</tr> 
<tr> 
	<td>&#123;&#123;&nbsp;entry&nbsp;}} &#123;&#123;&nbsp;/entry&nbsp;}}</td> 
	<td>The data for the newly submitted or updated form entry. All normal variables are available.</td> 
</tr>
</table>

<div class="tip"><strong>Note:</strong> These variables are also available in the email template subject field.</div>

Once you've created your template, you can add the necessary variables to the form entry tag. The entry form supports sending two notifications - a and b. Each have their own set of variables. The variables below use {ID} as a replacement for either a or b.

<table cellpadding="0" cellspacing="0" class="docs_table"> 
	<thead> 
		<tr> 
			<th width="120">Tag</th> 
			<th>Description</th> 
		</tr> 
	</thead> 
	<tbody> 
<tr> 
	<td>notify_{ID}</td> 
	<td>The email address (or addresses) to send the notification to. Multiple addresses can be separated by a pipe (|) character. You can also use form input values here, so if you have a field called <em>your_email_address</em>, you can use <em>your_email_address</em> as an email value and it will send it to the user's input.</td> 
</tr> 
<tr> 
	<td>notify_template_{ID}</td> 
	<td>The slug of the email template to use.</td> 
</tr> 
<tr> 
	<td>notify_from_{ID}</td> 
	<td>Optional custom from email. This can be a single email address or an email address and name separated by a pipe (|) character. If no value is provided, PyroStreams will use your admin email and site name as the from value.</td> 
</tr> 
</table>

When you put it all together, you entry tag may look like this:

	{{ noparse }}{{ streams:form stream="messages" mode="new" notify_a="admin@example.com|email_field" notify_template_a="new_feedback" notify_from_a="noreply@example.com|Example" }}{{ /noparse }}

## CSRF

If you need to use CSRF, the necessary hidden elements will be added when you use the form_open tag that is available in the form function.

However, if you can't use the form_open tag, you can add the CSRF elements by adding:

	{{ noparse }}{{ streams:form_csrf }}{{ /noparse }}