# Dashboard <small>Build module dashboards with ease.</small>

The dashboard helps you build flexible module dashboards without recreating the wheel. The module comes packaged with 2 powerful graphing libraries; Highcharts and Highmaps.

* {{ docs:id_link title="How To Build A Dashboard" }}
* {{ docs:id_link title="How To Build A Widget" }}


## How To Build A Dashboard

A dashboard is build in very much the same way as a form or a table by extending the `Anomaly\DashboardModule\Dashboard\DashboardBuilder` class with your own.

### Dashboard Components

Dashboards, like forms and tables are composed of components. In this case only one component is available.

### `$widgets = null;`

The widgets property defines the widgets to be loaded and made available to the dashboard view by addon namespace.

	class ExampleDashboardBuilder extends DashboardBuilder
	{
		$widgets = [
			'anomaly.extension.recent_news_widget'
		];
	}

{{ segment:purple text="If the widgets property is left as `null` then all widget extensions providing widgets for the active module will be loaded automatically.<br><br>For example:<br>`$provides = 'anomaly.module.blog::widget.*'`<br>Will all be loaded for the blog module." }}

### Dashboard Options

By default, the dashboard view in your active module located at `resources/views/admin/dashboard.twig` will be used.

You may override this default option by manually setting the dashboard's `dashboard_view` option.

### Rendering A Widget

To render a widget that has been loaded for a dashboard, simply refer to it in your dashboard's view like this:

	<div class="ui horizontal segment basic">

		{{ widgets.example_widget|raw }}

	</div>
	
You can refer to any widget loaded or loop through them instead.


## How To Build A Widget

Widgets are highly automated. All widgets must be an extension that extends the `Anomaly\DashboardModule\Dashboard\Component\Widget\WidgetExtension`. For convenience, you may wish to define what widget your extension provides.

	class ExampleWidgetExtension extends WidgetExtension
	{
	    protected $provides = 'anomaly.module.dashboard::widget.example';
	}

The only other class required is a handler class that is named after your extension. This handler class will be passed a widget object so that you may set options, data and more that will be available in the widget view later.

	class RecentNewsWidgetHandler
	{
		public function handle(Widget $widget)
	   {
			$widget->setOption('foo', 'bar');

	   		$widget->addData('foo', 'bar');
		}
	}

### Widget Options

By default, the widget's content view located at `resources/views/content.twig` will be used.

You may override this default option by manually setting the widget's `content_view` option.