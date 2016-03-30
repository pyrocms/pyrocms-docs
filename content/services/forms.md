# Forms <small>Effortlessly build simple or complex forms.</small>

The `Anomaly\Streams\Platform\Ui\Form\FormBuilder` class is responsible for helping you build forms. Let us take a look at how this service is used and what it can do for you!

* {{ docs:id_link title="Introduction" }}
* {{ docs:id_link title="Streams Usage" }}
* {{ docs:id_link title="Non-Streams Usage" }}
* {{ docs:id_link title="Further Configuration" }}


## Introduction

Typically, this class is extended in your addon and uses simple properties to define your form. For any given form, there are a number of concepts that can be used as needed.

Below is an example of how you might inject your own builder into a controller and return a rendered form:

	class ExampleController extends AdminController
	{
		public function create(ExampleFormBuilder $form)
		{
			return $form->render();
		}
		
		public function edit(ExampleFormBuilder $form, $id)
		{
			return $form->render($id);
		}
	}

That's all there is to it!

## Streams Usage

Building a streams powered form is extremely simple. Streams takes care of most of the work for you. Most forms will follow this example.

### Creating A Form

As mentioned above, the FormBuilder class should be extended in your addon like so:

	class ExampleFormBuilder extends FormBuilder
	{
		//
	}

{{ segment:green text="To follow best practices, the form builder should go in your entities Form namespace like this: `FooBarModule\Example\Form\ExampleFormBuilder`" }}

Now that we have our `ExampleFormBuilder` class we can start building the actual form. Below is a list of properties that can be used to customize and build your form **components**.

### Form Components

### `$model = 'YourVendor\ExampleModule\Example\ExampleModel'`

The form model determines what kind of entry you will be creating or editing. The model should be a valid class path to your entry model. For more information on entry models and best practices please see the [streams entry](streams/entries) section.

{{ segment:purple text="If no model is defined, the form builder will attempt to locate a matching model.<br><br>For example:<br>`YourVendor\ExampleModule\Example\Form\ExampleFormBuilder`<br>Will attempt to use:<br>`YourVendor\ExampleModule\Example\ExampleModel`" }}

### `$fields = ['first_name', 'last_name']`

The form fields define the stream fields you want to use and display in your form. Each array value should be a valid [field definition](definitions/fields).

By default, the assignment label will be used as the input label. If no label is defined the field name will be used. Instructions and placeholder text will also be taken from the stream, field, and assignment information.

In most cases the field slug will suffice. However you may override streams information and supplement the field and it's field type with more parameters here as well:

	$fields = [
		'name' => [
			'instructions' => 'Enter the company's name.',
			'config' => [
				'default_value' => 'Acme Company'
			],
			'rules' => [
				'max:50'
			]
		]
	];

For a full list of possible parameters please see [field definitions](definitions/fields).

You may also use a handler instead of an array of fields. This is helpful when you have a lot of overriding logic or want to use closures for field parameters. For example:

`$fields = 'YourVendor\ExampleModule\Example\Form\ExampleFormFields@handle';`

The builder instance will be passed to the handle method in this case:

	class ExampleFormFields
	{
		public function handle(ExampleFormBuilder $builder)
		{
			$builder->setFields(['name']);
		}
	}

{{ segment:purple text="If no fields are defined but a matching fields handler class exists, it will be used automatically.<br><br>For example:<br>`YourVendor\ExampleModule\Example\Form\ExampleFormBuilder`<br>Will attempt to use:<br>`YourVendor\ExampleModule\Example\Form\ExampleFormFields`<br><br>If no class exists then all fields will be displayed, ordered by their assignment's sort_order value." }}

### `$actions = ['save'];`

The actions property defines post actions displayed in the form. Possible form actions could be "Save", "Save & Continue", "Save & Exit", or "Save & Add More". Some shortcut actions are predefined for you but you can make an action for anything you want.

Each array value should be an [action definition](definitions/form_actions). Below are some properties available for actions.

	'my_action' => [
		'button'   => 'green',
		'text'     => 'Do something cool',
		'redirect' => 'admin/example/cool_thing/{entry.id}'
	]

You may also use a handler instead of an array of actions. This is helpful when you have large definitions or want to use closures for action parameters. For example:

`$actions = 'YourVendor\ExampleModule\Example\Form\ExampleFormActions@handle';`

The builder instance will be passed to the handle method in this case:

	class ExampleFormActions
	{
		public function handle(ExampleFormBuilder $builder)
		{
			$builder->setActions(['save']);
		}
	}

{{ segment:purple text="If no actions are defined but a matching actions handler class exists, it will be used automatically.<br><br>For example:<br>`YourVendor\ExampleModule\Example\Form\ExampleFormBuilder`<br>Will attempt to use:<br>`YourVendor\ExampleModule\Example\Form\ExampleFormActions`<br><br>If no class exists then only a simple save action will be used." }}

### `$buttons = [];`

The buttons property defines form buttons displayed in the form. Form buttons float right from the form actions and behave like simple links. Possible form buttons could be "Cancel", "Delete", or "View". Some shortcut buttons are predefined for you but you can make a form button for anything you want.

Each array value should be an [form button definition](definitions/form_buttons). Below are some properties available for buttons.

	[
		'button'   => 'blue',
		'text'     => 'Preview',
		'href'     => 'admin/preview/{entry.id}',
		'attributes' => [
			'data-modal' => 'standard'
		]
	]

You may also use a handler instead of an array of buttons. This is helpful when you have large definitions or want to use closures for button parameters. For example:

`$buttons = 'YourVendor\ExampleModule\Example\Form\ExampleFormButtons@handle';`

The builder instance will be passed to the handle method in this case:

	class ExampleFormButtons
	{
		public function handle(ExampleFormBuilder $builder)
		{
			$builder->setButtons(['cancel', 'delete']);
		}
	}

{{ segment:purple text="If no buttons are defined but a matching buttons handler class exists, it will be used automatically.<br><br>For example:<br>`YourVendor\ExampleModule\Example\Form\ExampleFormBuilder`<br>Will attempt to use:<br>`YourVendor\ExampleModule\Example\Form\ExampleFormButtons`<br><br>If no class exists then no buttons will be displayed." }}


## Non-Streams Usage

Coming Soon


## Further Configuration

Coming Soon