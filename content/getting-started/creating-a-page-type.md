# Creating a Page Type

Page types are a powerful and flexible way to organize your site's content. In this step, we'll show you how to set up a basic page type for a staff directory where each staff member has their own page.

</div>
<div class="doc_content">

## Create a New Page Type

A <dfn>page type</dfn> allows you to create different types of pages that have different structures. For instance, we want each of our staff members to have their own page, but we have very specific data we want to show for each member. For this example, we want to have a short bio and an email address, but we could have all sorts of needs like images, etc.

To create a page type, go to <samp>Content &rarr; Pages</samp> and select <samp>Page Types</samp> in the sub section menu.

{{ asset:img file="docs/ptsubmenu.png" alt="Page Types Sub Menu" class="doc_image" }}

Click on <samp>New Page Type</samp> in the top right hand corner. We're going to make a new <samp>Staff</samp> page type, so in the form that comes up, name it "Staff":

{{ asset:img file="docs/namestaff.png" alt="Name Page Type" class="doc_image" }}

Don't worry about what all the other options are on the site, just click over to the <samp>Layout</samp> tab. This is where we define the markup for our page. (This is wrapped in our theme layout so we don't need to worry about things like the header and footer).

We are going to create two fields:

* Bio
* Email Address

Our page type layout is where we define how our page type fields are displayed, so we put the tag syntax in there for them: Add this into the layout textarea:

    {{ noparse }}&lt;h2>{{ title }}&lt;/h2>

{{ bio }}

{{ email:safe_mailto_link }}{{ /noparse }}

Basically, this says to display the title of the page, then the bio, and then the safe mailto link that is a feature of the {{ link title="email field type" uri="field-types/email" }}.

## Add Custom Fields

Now we're going to actually add some custom fields to our page type. After you create your page type, you'll land on the page type field page, where it'll tell you that you don't have any fields yet. To solve that, create one by clicking <samp>+ New Field</samp> at the top right hand side. You'll get a new field form. To start, let's create our bio field by entering <kbd>Bio</kbd> for the name.

{{ asset:img file="docs/gs/choosewysiwyg.png" alt="Name Page Type" class="doc_image" }}

You'll get some options that are unique to the WYSIWYG field type. Set them like we have in the image below:

{{ asset:img file="docs/gs/fieldconfig.png" alt="Name Page Type" class="doc_image" }}

Do the same for your <samp>Email</samp> field (using the email field type), and you'll have a list of fields set up for your page type!

{{ asset:img file="docs/gs/ptfields.png" alt="Name Page Type" class="doc_image" }}

## Add a New Staff Page

Now we're ready to create a new <samp>Staff Page</samp>. Go to the page tree under <samp>Content &rarr; Pages</samp>, and choose <samp>+ New Page</samp> from the top right hand corner. This time, since we have more than one page type, you can choose which type of page you'd like to create!

{{ asset:img file="docs/gs/choosetype.png" alt="Name Page Type" class="doc_image" }}

Choose <samp>Staff</samp>, and you'll get your new page form, but under our <samp>Page Content</samp> tab, we'll have our page type custom fields, complete with our instructions and all!

{{ asset:img file="docs/gs/custfields.png" alt="Name Page Type" class="doc_image" }}

Create your staff page, and then visit it on the front end. PyroCMS will use the layout we set in our page type to display our custom fields the way we want to.

This is a great way to allow clients to create pages themselves while making sure that you have control over the markup and display of the content. You can add as many fields as you like, and they range from simple fields like text and textareas, to images, dates, and more!

<hr>

{{ link title="Next Steps" uri="getting-started/next-steps" }}