# Tables <small>Powerful tables without breaking a sweat.</small>

The `Anomaly\Streams\Platform\Ui\Table\TableBuilder` class is responsible for helping you build tables. Let us take a look at how this service is used and what it can do for you!

* {{ docs:id_link title="Introduction" }}
* {{ docs:id_link title="Streams Usage" }}
* {{ docs:id_link title="Non-Streams Usage" }}
* {{ docs:id_link title="Further Configuration" }}


## Introduction

Typically, this class is extended in your addon and uses simple properties to define your table. For any given table, there are a number of concepts that can be used as needed.

Below is an example of how you might inject your own builder into a controller and return a rendered table:

	class ExampleController extends AdminController
	{
		public function index(ExampleTableBuilder $table)
		{
			return $table->render();
		}
	}

That's all there is to it!

## Streams Usage

Building a streams powered table is extremely simple. Streams takes care of most of the work for you. Most tables will follow this example.

### Creating A Table

As mentioned above, the TableBuilder class should be extended in your addon like so:

	class ExampleTableBuilder extends TableBuilder
	{
		//
	}

{{ segment:green text="To follow best practices, the table builder should go in your entities Table namespace like this: `FooBarModule\Example\Table\ExampleTableBuilder`" }}

Now that we have our `ExampleTableBuilder` class we can start building the actual table. Below is a list of properties that can be used to customize and build your table **components**.

### Table Components

### `$model = 'YourVendor\ExampleModule\Example\ExampleModel'`

The table model determines what kind of entries you will be displaying. The model should be a valid class path to your entry model. For more information on entry models and best practices please see the [streams entry](streams/entries) section.

{{ segment:purple text="If no model is defined, the table builder will attempt to locate a matching model.<br><br>For example:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableBuilder`<br>Will attempt to use:<br>`YourVendor\ExampleModule\Example\ExampleModel`" }}

### `$columns = ['first_name', 'last_name']`

The table columns define the stream fields you want to display in your table. Each array value should be a valid [column definition](definitions/table_columns).

By default, the field name will be used as the column heading. If the field is considered sortable then the sortable flag for the column will also be set automatically.

In most cases the field slug will suffice. However you may override streams information and define more parameters here as well:

	$columns = [
		'first_name',
		'email' => [
			'heading' => 'Company Email',
			'value'   => 'entry.email.mailto'
		]
	];

For a full list of possible parameters please see [column definitions](definitions/table_columns).

You may also use a handler instead of an array of columns. This is helpful when you have a lot of overriding logic or want to use closures for column parameters. For example:

`$columns = 'YourVendor\ExampleModule\Example\Table\ExampleTableColumns@handle';`

The builder instance will be passed to the handle method in this case:

	class ExampleTableColumns
	{
		public function handle(ExampleTableBuilder $builder)
		{
			$builder->setColumns(['first_name', 'last_name']);
		}
	}

{{ segment:purple text="If no columns are defined but a matching columns handler class exists, it will be used automatically.<br><br>For example:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableBuilder`<br>Will attempt to use:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableColumns`<br><br>If no class exists then only the id, created_at and title column fields will be displayed." }}

### `$actions = ['save'];`

The actions property defines the table's available mass actions. An example of a mass action would be "Delete". Some shortcut actions are predefined for you but you can make an action for anything you want. When actions are available the table will be rendered with a checkbox at the beginning of each row.

Each array value should be an [action definition](definitions/table_actions). Below are some properties available for actions.

	'my_action' => [
		'button'   => 'orange',
		'text'     => 'Move',
		'handler'  => 'YourVendor\ExampleModule\Example\Table\Action\Move@handle'
	]

The handler's handle method will be passed the selected IDs and the table instance.

You may also use a handler instead of an array of actions. This is helpful when you have large definitions or want to use closures for action parameters. For example:

`$actions = 'YourVendor\ExampleModule\Example\Table\ExampleTableActions@handle';`

The builder instance will be passed to the handle method in this case:

	class ExampleTableActions
	{
		public function handle(ExampleTableBuilder $builder)
		{
			$builder->setActions(['save']);
		}
	}

{{ segment:purple text="If no actions are defined but a matching actions handler class exists, it will be used automatically.<br><br>For example:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableBuilder`<br>Will attempt to use:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableActions`<br><br>If no class exists then no actions will be displayed." }}

### `$buttons = [];`

The buttons property defines table buttons displayed in each row. Table buttons behave like simple links. Possible table buttons could be "Edit", "Delete", or "View". Some shortcut buttons are predefined for you but you can make a table button for anything you want.

Each array value should be a [table button definition](definitions/table_buttons). Below are some properties available for buttons.

	[
		'button'   => 'blue',
		'text'     => 'Preview',
		'href'     => 'admin/example/show/{entry.id}'
	]

You may also use a handler instead of an array of buttons. This is helpful when you have large definitions or want to use closures for button parameters. For example:

`$buttons = 'YourVendor\ExampleModule\Example\Table\ExampleTableButtons@handle';`

The builder instance will be passed to the handle method in this case:

	class ExampleTableButtons
	{
		public function handle(ExampleTableBuilder $builder)
		{
			$builder->setButtons(['edit']);
		}
	}

{{ segment:purple text="If no buttons are defined but a matching buttons handler class exists, it will be used automatically.<br><br>For example:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableBuilder`<br>Will attempt to use:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableButtons`<br><br>If no class exists then no buttons will be displayed." }}

### `$filters = [];`

The filters property defines table filters displayed for the table. Table filters let users filter table results. Filters are usually defined by field_slug and the field type for the field handles the rest. However, you may define custom filters and handlers to filter in any way you need.

Each array value should be a [filter definition](definitions/filters). Below are some properties available for custom filters.

	[
		'filter'   => 'select',
		'label'    => 'Status',
		'handler'  => 'YourVendor\ExampleModule\Example\Table\Filter\FooBar@handle'
	]

The handler for the above filter will be passed the Filter object and the query builder object:

	class FooBar
	{
	    public function handle(Builder $query, FilterInterface $filter)
	    {
	        $query->where('foo_bar', 'LIKE', "%foo%");
	    }
	}

You may also use a handler instead of an array of filters. This is helpful when you have large definitions or want to use closures for filter parameters. For example:

`$filters = 'YourVendor\ExampleModule\Example\Table\ExampleTableFilters@handle';`

The builder instance will be passed to the handle method in this case:

	class ExampleTableFilters
	{
		public function handle(ExampleTableBuilder $builder)
		{
			$builder->setFilters(['first_name']);
		}
	}

{{ segment:purple text="If no filters are defined but a matching filters handler class exists, it will be used automatically.<br><br>For example:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableBuilder`<br>Will attempt to use:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableFilters`<br><br>If no class exists then no filters will be displayed." }}

### `$views = [];`

The views property defines table views available for the table. Table views let you modify properties of the table and modify the query before entries are fetched. Some potential views might be "All", "Recently Created", or "Deleted". Some shortcut views are predefined for you but you can make a table view for anything you want.

Each array value should be a [view definition](definitions/views). Below are some properties available for custom views.

	[
		'title'    => 'Awesome View',
		'handler'  => 'YourVendor\ExampleModule\Example\Table\View\FooBar@handle'
	]

The handler for the above view will be passed the Table instance and the query builder object:

	class FooBar
	{
	    public function handle(Table $table, Builder $query)
	    {
	        $query->orderBy('created_at', 'desc')->where('foo', 'bar');
	    }
	}

You may also use a handler instead of an array of views. This is helpful when you have large definitions or want to use closures for view parameters. For example:

`$views = 'YourVendor\ExampleModule\Example\Table\ExampleTableViews@handle';`

The builder instance will be passed to the handle method in this case:

	class ExampleTableViews
	{
		public function handle(ExampleTableBuilder $builder)
		{
			$builder->setViews(['all', 'recently_created']);
		}
	}

{{ segment:purple text="If no views are defined but a matching views handler class exists, it will be used automatically.<br><br>For example:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableBuilder`<br>Will attempt to use:<br>`YourVendor\ExampleModule\Example\Table\ExampleTableViews`<br><br>If no class exists then no views will be displayed." }}


## Non-Streams Usage

Coming Soon


## Further Configuration

Coming Soon