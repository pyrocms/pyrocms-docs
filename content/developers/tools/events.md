# Events

Events allow you add your own functionality to the PyroCMS core by hooking into preset points in the code called triggers. There are several triggers already in place in the PyroCMS core that allow you to do things within your code when other parts of PyroCMS run.

## Using Events in your modules

Create an events.php file in the root of your module (it will be autoloaded when PyroCMS starts to run). Below is an example file from a module named &quot;Sample&quot;:</p>

<script src="https://gist.github.com/1373989.js?file=gistfile1.aw"></script>

In the above example, the Events&#95;Sample registers the function 'run' to run when the 'public_controller' trigger is called in PyroCMS.

It is important to note that some triggers pass data that you can use in your function as well.

## PyroCMS Triggers

PyroCMS includes the following event triggers:

<table>
<tr>
<td>Events::trigger(&#39;public_controller&#39;)</td>
<td>This is triggered when the Public_Controller begins to run.</td>
</tr>
<tr>
<td>Events::trigger(&#39;email&#39;, $data, &#39;array&#39;)</td>
<td>This is used to send an email. The second parameter is the data to send along, third parameter is the type of response you expect. The sending is done by an event registered in system/cms/modules/templates/events.php but can be triggered from anywhere in the application.</td>
</tr>
<tr>
<td>Events::trigger(&#39;post_user_login&#39;)</td>
<td>This is triggered immediately after a user successfully logs in via domain.com/users/login</td>
</tr>
<tr>
<td>Events::trigger(&#39;post_user_register&#39;, $id)</td>
<td>This is triggered immediately after a user registers. The newly created user id is passed along.</td>
</tr>
<tr>
<td>Events::trigger(&#39;post_user_activation&#39;, $id)</td>
<td>Triggered when a user successfully activates by following the activation link in the welcome email. The user&#39;s id is passed to your event.</td>
</tr>
<tr>
<td>Events::trigger(&#39;pre_user_logout&#39;)</td>
<td>Triggered right before the user&#39;s session is destroyed.</td>
</tr>
<tr>
<td>Events::trigger(&#39;post_user_update&#39;)</td>
<td>Runs after a user&#39;s profile edits have been saved.</td>
</tr>
</table>