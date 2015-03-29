# Definitions <small>Why build classes when you can simply describe them?</small>

Definitions are a standardized way to provide information to PyroCMS so that it can build the various classes needed to do things.

* {{ docs:id_link title="Introduction" }}
* {{ docs:id_link title="Acessing" }}
* {{ docs:id_link title="Resolving" }}
* {{ docs:id_link title="Evaluating" }}
* {{ docs:id_link title="Normalizing" }}
* {{ docs:id_link title="Guessing" }}
* {{ docs:id_link title="Constructing" }}


## Introduction

The idea of definitions in PyroCMS was developed to create a huge shortcut for developers in an OOP environment. Instead of creating and constructing classes yourself and providing them all for PyroCMS, definitions let you provide the bare minimum (or full) definition used to build the class.

A simple, bare bones example of definitions would be just like this:

	class ExampleClass
	{
		protected $property = ['foo', 'bar'];
	}

Definitions are used in a way loosely related to the builder pattern and they *all* go through the same exact set of processing and play by the same rules.


## Accessing

All definitions will have a setter and getter method. If the definition is for fields the setter and getter will be `setFields($fields)` and `getFields()`.


## Resolving

All definitions are resolved first. Resolving means that instead of an array you can provide a handler or closure to handle setting the definitions on whatever object you are working with.

	class ExampleClass
	{
		protected $fields = 'Anomaly\ExampleModule\Example\ExampleFields@handle';
		
		public function getFilters()
		{
			return function (Request $request) {
				return $request->get('foo') == 'bar' ? ['foo'] : ['bar'];
			}
		}
	}
	
	class ExampleFields
	{
		public function handle(ExampleClass $builder)
		{
			$builder->setFields(['foo', 'bar']);		
		}
	}

When using a resolving method or closure, the builder or parent class is generally passed along for you to use as well as other pertinent objects.

Closures and handlers are resolved using the IoC container which means along with the passed object you can also automatically inject objects into the construct and handle method as desired.


## Evaluating

Is is common to provide a closure as a property value. The evaluation process evaluates all closures. Closures are passed pertinent objects and are called through the IoC container so other classes can be automatically injected.

Here is a real snippet of code demonstrating the closure as a property value in a handler that is setting table buttons (displayed for each entry's row). In this case the button is not displayed if the table row (a user) holds an admin role.

    class UserTableButtons
    {

    /**
     * Handle the table buttons.
     * 
     * @param UserTableBuilder $builder
     */
        public function handle(UserTableBuilder $builder)
        {
            $builder->setButtons(
                [
                    'edit', // This is a preregistered button.
                    [
                        'href'    => 'admin/users/permissions/{entry.id}',
                        'text'    => 'Permissions',
                        'icon'    => 'icon lock',
                        'button'  => 'blue',
                        'enabled' => function (UserInterface $entry) {
                        	return !$entry->hasRole('admin');
                        }
                    ]
                ]
            );
        }
    }


## Normalizing

The whole idea of definitions is to minimize the work required by a developer to build something. Normalizing takes minimum accepted input and "fluffs" it up a little so that PyroCMS has a common base input to work with. For example, when building a table and you provide an array of field slugs for columns, normalizing converts that into an array of column definitions with the field slug as the heading and value since those two are common minimum requirements.

**Example**

	$columns = ['foo'];

Is normalized to:

	$columns = [
		[
			'heading' => 'foo',
			'value' => 'foo'
		]
	];

### Pre-registered Definitions

Part of normalizing is taking a simple string like 'edit' and converting it into the full definition for an edit button. There are many pre-registered definitions for various objects.

Let's assume that the 'edit' button is pre-registered (which it is):

**Example**

	$buttons = ['edit'];

Is normalized to:

    $buttons = [
        [
            'text' => 'streams::button.edit',
            'icon' => 'icon write',
            'type' => 'orange'
        ]
    ];

{{ segment:green text="You can also pass additional parameters to override parts of a registered definition. If defining a button, just include `'button' => 'edit'` in the button definition to include it's pre-registered properties." }}

{{ segment:blue text="For a full list of pre-registered definitions, normalization behavior, and guessing behavior see the various definitions documented in the definition section." }}


## Guessing

Directly after normalizing definitions are generally put through a guessing process. For instance table buttons might not provide a URL so they will be guessed based on the type of button. If only the field slug is provided for a form field that uses a stream based model then the field type, placeholder, label, instructions, rules, etc will all be guessed based on the assignment if any.

**Example**

	// Assume the URL is foobar.com/admin/pages
	$buttons = [
        [
            'text' => 'streams::button.edit',
            'icon' => 'icon write',
            'type' => 'orange'
        ]
    ];

The URL for edit buttons is guessed like this:

	$buttons = [
        [
            'text' => 'streams::button.edit',
            'icon' => 'icon write',
            'type' => 'orange',
            'href' => 'http://foobar.com/admin/pages/edit/{entry.id}'
        ]
    ];

**Example**

	$fields = ['slug'];

Is the form uses streams and the stream has a field called slug that is assigned:

	$fields = [
        [
            'field' => 'slug',
            'type' => 'anomaly.field_type.slug',
            'label' => 'anomaly.module.example::field.slug.label',
            'instructions' => 'anomaly.module.example::field.slug.instructions',
            'placeholder' => 'anomaly.module.example::field.slug.placeholder',
            'rules' => [
            	'required'
            ]
        ]
    ];


## Constructing

Lastly the actual classes are constructed and usually pushed into a collection of others on the final class that is being built. For example field definitions from the form builder are constructed then pushed onto the form instance's field collection.

In some cases you may wish to have the factory use your own custom class to build the object. To do so you can usually include a property named after the definition type (button, action, field, etc):

	$filters = [
		[
			'placeholder' => 'Example Filter',
			'filter' => 'Anomaly\ExampleModule\ExampleFilter'
		]
	];

{{ segment:red text="Be careful, the custom class property is also used for pre-registered definitions." }}