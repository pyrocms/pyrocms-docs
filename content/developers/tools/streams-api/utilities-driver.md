# Streams API Utilities Driver

The utilities driver is used to run uncommon streams functions that usually have to do with data setup and teardown.

You can call the entries driver like this:

	$this->streams->utilities->function();

## remove\_namespace(<var>$namespace\_slug</var>)

The **remove\_namespace()** function with destroy all data associated with a namespace. This includes:

* Streams metadata in the namespace
* Fields metadata in the namespace
* Streams tables in the namespace

Obviously, this should be used with caution!

## convert\_table\_to\_stream(<var>$table\_slug, $namespace\_slug, $prefix, $stream\_name, $about = NULL, $title\_column = NULL, $view\_options = array('id', 'created')</var>)

The **convert\_table\_to\_stream()** function takes an existing table and creates the streams metadata for it based on the given parameters.

This will add each of the four standard streams fields:

* created
* updated
* created_by
* ordering_count

<div class="tip"><strong>Note:</strong> The table you are converting to a stream needs to have an id field that is a primary key and auto incremented.</div> 

<div class="tip"><strong>Note:</strong> This function does not deal with the actual table columns. You'll need to do that in another fucntion.</div> 