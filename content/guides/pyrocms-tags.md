# PyroCMS Tags

One of the unique features of PyroCMS is Tags, powered by the [Lex Parser](https://github.com/happyninjas/lex). Tags allow you to tap into more advanced functionality using simple syntax right inside your layouts, page layouts, and even pages themselves. Tags can allow you to do some really powerful things without crowding your layouts with messy PHP code.

The following guide will teach you the basics of tags and how to use them in your layouts.

* {{ docs:id_link title="Basic Tags" }}
* {{ docs:id_link title="Comments" }}
* {{ docs:id_link title="Tag Attributes" }}
* {{ docs:id_link title="Tag Pairs" }}
* {{ docs:id_link title="Tag Conditionals" }}

</div>
<div class="doc_content">

## Basic Tags

At their very basic form, tags are simply a variable:

    {{ noparse }}{{ my_var }}{{ /noparse }}

When you put that in your markup, it will be replaced by some value. Pretty simple!

<div class="note"><p>The white-space inside the curly braces is optional, but does help with aesthetics and readability.</p></div>

Now let's take the example of a common concept in PyroCMS: a tag with two words separated by a colon:

    {{ noparse }}{{ settings:site_name }}{{ /noparse }}

This tag has some basic parts: two curly braces on either site, and two text strings separated by a colon. This format tells PyroCMS that we want to access a plugin's function or plugin's variable. The first string, **settings** in this case, tells the tag what plugin to reference, and then the second string, **site_name** in this case, tells the tag what function or variable to call.

So if we put the above tag in our layout, and our {{ link uri="plugins/settings" title="site_name variable" }} was set to "Bill's Bagels", then it would return:

     Bill's Bagels

## Comments

If you'd like to comment out section of code or content, you can wrap them inside **&#123;&#123;#** and **#&#125;&#125;**. Ex: **&#123;&#123;# This is a comment #&#125;&#125;**. 
This has the advantage over conventional [HTML comment tags](http://www.w3.org/TR/html4/intro/sgmltut.html#h-3.2.4) that it won't be visible to users viewing your website's source code.

<div id="attributes"></div>

## Tag Attributes

What makes tags really powerful is they can take attributes that give you the freedom to modify the tag output based on input data. Here is an example:

     {{ noparse }}{{ url:segments segment="1" }}{{ /noparse }}

In the above example, we are calling the {{ link title="url plugin" uri="plugins/url" }} which has a **segments** function. This is all well and good, but we can also pass the tag parameters in order to modify the output. In this case, we are telling the tag to get the first segment. So if your URL was _http://www.example.com/bills/bagels_, this tag would return:

     bills

You can have multiple parameters as well. So, for example, the **segments** function allows you to specify a default value via a second parameter:

     {{ noparse }}{{ url:segments segment="1" default="home" }}{{ /noparse }}

If the first segment is empty, the tag will return "home".

<div class="note"><p>Some parameters are required and some are optional. Make sure to check the {{ link uri="plugins" title="plugins section" }} to make sure you are passing all of the right parameters, and if there are any optional ones that will give you added functionality you need.</p></div>

## Using Tags and Variables In Tag Parameters

_inside quotes, PyroCMS cannot parse curly braces_. So, for instance, if you wanted to pass the value of the slug from the page plugin, this **will not work**:

    {{ noparse }}{{ url:segments segment="1" default="{{ page:slug }}" }}{{ /noparse }}

However, you can pass a plugin function's output value or variable by eliminating the curly braces. So, **this will work**:

    {{ noparse }}{{ url:segments segment="1" default=page:slug }}{{ /noparse }}

You can also use tag parameters in functions that are being used as a tag parameter by using a single curly brace with no spaces, and no quotes:

    {{ noparse }}{{ url:segments segment="1" default={foo:bar value="baz"} }}{{ /noparse }}

Although this is an easy solution for single functions and variables, for more complex logic within tag paramters, you can use square braces instead of curly braces, like this:

    {{ noparse }}{{ url:segments segment="1" default="[[ page:slug ]]" }}{{ /noparse }}

PyroCMS parses each parameter separately for square brackets, so you can even do logic within your paramters:

    {{ noparse }}{{ url:segments segment="1" default="[[ if global:environment == 'development' ]]dev_home[[ else ]]home[[ endif ]]" }}{{ /noparse }}

<div id="pairs"></div>

## Tag Pairs

Another powerful feature of PyroCMS tags is the ability to use data between tags. Take this example of a blog posts tag:

    {{ noparse }}{{ blog:posts limit="2" order-by="title" order-dir="desc" }}
     &lt;h2>{{ title }}&lt;/h2>
{{ /blog:posts }}{{ /noparse }}

As you'll notice, we have an opening and closing tag here. In this case, the {{ link uri="modules/blog" title="blog" }} **posts** function will repeat and parse the content between our tag pair for each blog post that matches the criteria we set up with our tag parameters. So for this tag, we might get this output:

    <h2>Blog Post One&lt</h2>
    <h2>Blog Post Two</h2>

Tag pairs don't necessarily loop through content, however. For example, we can simply use the content between the tags like we would a parameter, like in the format plugin:

    {{ noparse }}{{ format:markdown }}Let's _convert_ this to **HTML**.{{ /format:markdown }}{{ /noparse }}

### Single Variable Loops

Occasionally, single tags can act as arrays of data that you can loop through. You can do so using a similar tag pair syntax:

    {{ noparse }}{{ images }}
     &lt;img src="{{ url }}" />
{{ /images }}{{ /noparse }}

<div id="conditionals"></div>

## Tag Conditionals

Many times in your layouts you will want to show something under certain conditions. For instance, if a user is logged in or if a url segment has a certain value. PyroCMS tags allow you to do that with an if/else tag syntax.

<div class="note"><p>Undefined variables in Conditionals are evaluated to be null.  This allows you to do things like {{ noparse }}{{ if foo }}{{ /noparse }} to check if a variable exists.</p></div>

### Basic Conditionals

Here is a simple example of a conditional tag statement:

    {{ noparse }}{{ if user:logged_in }}
     &lt;p>You are logged in.&lt;/p>
{{ endif }}{{ /noparse }}

This general structure will look very familiar if you are acquainted with [conditionals in languages like PHP](http://php.net/manual/en/control-structures.if.php). The first tag checks if the value of **user:logged_in** is true, and returns what is between that tag and the **endif** tag.

### Conditional Operators

You can use operators to compare values in an if statement. These used to compare two values. Here's an example:

    {{ noparse }}{{ if {url:segments segment="2"} == 'categories' }}
    &lt;p>Looks like you are in the categories section.&lt;/p>
{{ endif }}{{ /noparse }}

<div class="note"><p>PyroCMS function tags can be used in conditionals, but must be wrapped in single curly braces if they have one or more parameter, as in the above example.</p></div>

<div class="note"><p>When using function tags wrapped in curly braces in conditionals, the space after the opening curly brace and before the closing curly brace must be omitted. The tag will not render properly otherwise. Ex: <strong> {{ noparse }}{url:segments segment="2"}{{ /noparse }}</strong>.</p></div>

Here are the available conditional operators:

<table class="table">
    <tr>
        <th width="20%">Operator</th>
        <th>Notes</th>
    </tr>
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

You can also use the **!** or the **not** logical operator:

    {{ noparse }}{{ if !user:logged_in }}
    &lt;p>You are not logged in.&lt;/p>
{{ endif }}{{ /noparse }}

    {{ noparse }}{{ if not user:logged_in }}
    &lt;p>You are not logged in.&lt;/p>
{{ endif }}{{ /noparse }}

<div class="note"><p><strong>!</strong> and <strong>not</strong> are interchangeable.  The only requirement is that <strong>not</strong> must have a space on both sides.</p></div>

#### Checking if a Variable Exists

To check if a variable exists in a conditional, you use the `exists` keyword.

**Examples**

    {{ noparse }}{{ if exists foo }}
        Foo Exists
{{ elseif not exists foo }}
        Foo Does Not Exist
{{ endif }}{{ /noparse }}

You can also combine it with other conditions:

    {{ noparse }}{{ if exists foo and foo !== 'bar' }}
        Something here
{{ endif }}{{ /noparse }}

The expression `exists foo` evaluates to either `true` or `false`.  Therefore something like this works as well:

    {{ noparse }}{{ if exists foo == false }}
{{ endif }}{{ /noparse }}

### Multiple Conditionals

You can have multiple conditionals for some more advanced conditional statements:

    {{ noparse }}{{ if variables:custom_var == 'foo' }}
    &lt;p>Looks like a foo.&lt;/p>
{{ elseif variables:custom_var == 'bar' }}
    &lt;p>Looks like a bar.&lt;/p>
{{ else }}
    &lt;p>Neither foo nor bar.&lt;/p>
{{ endif }}{{ /noparse }}

### Logical Operators

You can also use logical operators like so:

    {{ noparse }}{{ if variables:custom_var != 'foo' and variables:custom_var != 'bar' }}
     &lt;p>No foos and no bars!&lt;/p>
{{ endif }}{{ /noparse }}

The logical operators available are:

* and / &amp;&amp;
* or / ||