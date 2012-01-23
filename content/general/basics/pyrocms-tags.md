# PyroCMS Tags

One of the unique features of PyroCMS is PyroCMS tags, powered by the Lex Parser. Tags allow you to tap into more advanced functionality using a syntax system right inside your layouts, page layouts, and even pages themselves. Tags can allow you to do some really powerful things without crowding your layouts with messy PHP code.

The following guide will teach you the basics of tags and how to use them in your layouts.

<ul id="doc_sub_nav">
<li><a href="#basic">Basic Tags</a></li>
<li><a href="#attributes">Tag Attributes</a></li>
<li><a href="#pairs">Tag Pairs</a></li>
<li><a href="#conditionals">Tag Conditionals</a></li>
</ul>

<div id="basic"></div>

## Basic Tags

Let's start with a very simple example, a tag that returns one of our site settings:

    {{ noparse }}{{ settings:site_name }}{{ /noparse }}

<div class="tip"><strong>Side note:</strong> The white-space inside the curly braces is optional and is mainly there for aesthetics and readability. You can leave them out if you wish.</div>

This tag has some basic parts: two curly braces on either site, and two text strings separated by a colon. The first string, **settings** in this case, tells the tag what plugin to reference, and then the second string, **site_name** in this case, tells the tag what function or variable to call.

So if we put the above tag in our layout, and our site_name variable was set to "Bill's Bagels", then it would return:

     Bill's Bagels

## Comments

If you'd like to comment out section of code or content, you can wrap them inside **&#123;&#123;#** and **#&#125;&#125;**. Ex: **&#123;&#123;# This is a comment #&#125;&#125;**.

<div id="attributes"></div>

## Tag Attributes

What makes tags really powerful is they can take attributes that give you the freedom to modify the tag output based on input data. Here is an example:

     {{ noparse }}{{ url:segments segment="1" }}{{ /noparse }}

In the above example, we are calling the **url** plugin which has a **segments** function. This is all well and good, but we can also pass the tag parameters in order to modify the output. In this case, we are telling the tag to get the first segment. So if your URL was _http://www.example.com/bills/bagels_, this tag would be replaced with:

     bills

You can have multiple parameters as well. So, for example, the **segments** function allows you to specify a default value via a second parameter:

     {{ noparse }}{{ url:segments segment="1" default="home" }}{{ /noparse }}

If the first segment is empty, the tag will return "home".

<div class="tip"><strong>Tip:</strong> Some parameters are required and some are optional. Make sure to check the <a href="">tag reference</a> to make sure you are passing all of the right parameters, and if there are any optional ones that will give you added functionality you need.</div>

<div id="pairs"></div>

## Tag Pairs

Another powerful feature of PyroCMS tags is the ability to use data between tags. Take this example of a blog posts tag:

    {{ noparse }}{{ blog:posts limit="5" order-by="title" order-dir="desc" }}
     
     &lt;h2>{{ title }}&lt;/h2>

{{ /blog:posts }}{{ /noparse }}

As you'll notice, we have an opening and closing tag in this case. In this case, the blog **posts** function will loop through the content between the tags for each blog post matching the parameters we've provided, and replace the tags in between with blog post data like the titles.

Tag pairs don't necessarily loop through content, however. Take the example of a tag that surrounds a block of text and restricts the output of that text to a certain number of words. In this case the text between the tags is simply acting as another parameter - albeit a larger and more flexible one.

### Variable Loops

Occasionally, tags will contain arrays of data that you can loop through. You can do so using a similar tag pair syntax:

    {{ noparse }}{{ images }}
     
     &lt;img src="{{ url }}" />
     
{{ /images }}{{ /noparse }}

## Conditional Tags

Many times in your layouts you will want to show something under certain conditions. For instance, if a user is logged in or if a url segment has a certain value. PyroCMS tags allow you to do that with an if/else tag syntax.

### Basic Conditionals

Here is a simple example of a conditional tag statement:

    {{ noparse }}{{ if user:logged_in }}
     
     &lt;p>You are logged in.&lt;/p>

{{ endif }}{{ /noparse }}

This general structure will look very familiar if you are acquainted with conditionals in languages like PHP. The if tag checks if the value of **user:logged_in** is true, and returns what is between that tag and the **endif** tag.

<div id="conditionals"></div>

### Conditional Operators

You can use operators to compare values in an if statement. These used to compare two values. Here's an example:

   {{ noparse }}{{ if {url:segments segment="2"} == 'categories' }}
    
   &lt;p>Looks like you are in the categories section.&lt;/p>
    
{{ endif }}{{ /noparse }}

<div class="tip"><strong>Note:</strong> PyroCMS function tags can be used in conditionals, but must be wrapped in single curly braces if they have one or more parameter, as in the above example.</div>

Here are the available conditional operators:

<table>
<tr>
<td>==</td>
<td>Equals. Values equal each other.</td>
</tr>
<tr>
<td>!=</td>
<td>Does not equal. Values do not equal each other.</td>
</tr>
<tr>
<td>===</td>
<td>Values equal each other in value and type. For instance, if one value is a true boolean value, the other value must also be in order to fufill this operator.</td>
</tr>
<tr>
<td>!==</td>
<td>Same concept as above but checks that values do not equal each other and are not the same type.</td>
</tr>
<tr>
<td>></td>
<td>Greater than</td>
</tr>
<tr>
<td><</td>
<td>Less than</td>
</tr>
<tr>
<td>>=</td>
<td>Greater than or equal to</td>
</tr>
<tr>
<td><=</td>
<td>Less than or equal to</td>
</tr>
</table>

You can also use the **!** logical operator:

    {{ noparse }}{{ if !user:logged_in }}
     
    &lt;p>You are not logged in.&lt;/p>
     
{{ endif }}{{ /noparse }}

### Multiple Conditionals

You can have multiple conditionals for some more advanced conditional statements:

    {{ noparse }}{{ if variables:custom_var == 'foo' }}
     
    &lt;p>Looks like a foo.&lt;/p>

{{ elseif variables:custom_var == 'bar' }}
     
    &lt;p>Looks like a bar.&lt;/p>
     
{{ endif }}{{ /noparse }}

### Logical Operators

You can also use logical operators like so:

    {{ noparse }}{{ if variables:custom_var != 'foo' and variables:custom_var != 'bar' }}
     
     &lt;p>No foos and no bars!&lt;/p>
     
{{ endif }}{{ /noparse }}

The logical operators available are:

<table>
<tr><td>and / &&</td></tr>
<tr><td>or / ||</td></tr>
</table>