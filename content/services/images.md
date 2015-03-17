# Images <small>Powerful image management and manipulation for addons.</small>

The `Anomaly\Streams\Platform\Image\Image` class provides a very simple API for adding images to your views from various locations in your project.

* {{ docs:id_link title="Introduction" }}
* {{ docs:id_link title="Paths" }}
* {{ docs:id_link title="Manipulation " }}
* {{ docs:id_link title="Usage" }}
* {{ docs:id_link title="Plugin" }}


## Introduction

Your addons may utilize images. Normally, Laravel requires you to publish images along with your assets. The Image service let's you effortlessly manipulate and include your addon's images without publishing.

The image service is a wrapper for the popular [Intervention](https://github.com/Intervention/image) package. You can modify images in a number of ways and include the resulting image.

{{ segment:blue text='Addon images are stored in the `resources` folder of your addon and use namespaces. For more on addon development, paths, and namespaces see the [development section](http://docs.local:8888/development/introduction).' }}

{{ segment:green text="The image service automatically publishes the resulting image if needed and will return the published file path for future request. It is encouraged to leverage the image class in order to consolidate image requests and let developers and designers manipulate images as desired without batching images from software." }}


## Paths

The Image service uses namespaces in order to hint paths to your files.

	$image->url('namespace::img/logo.jpg');

### streams::

This is the path hint for the Streams Platform's resources folder in `vendor/anomaly/streams-platform/resources`

### theme::

This is the path hint for the "active" theme during any given request. If you are in the control panel this will be the active admin theme. Otherwise this will be the active standard theme.

### module::

This is the path hint for the "active" module. The active module is determined by the URI slug in the control panel.

{{ segment:red text="The active module is not always available and this namespace should be used sparingly." }}

### vendor.type.slug::

All addons are namespaced using the addon's vendor, addon type and addon slug.

For example, the blog module would be `anomaly.module.blog::` and points to `the-addon-path/resources`.

### bower::

Bower comes packaged with the Streams Platform. This is the path hint for the bower component files in `bin/bower_components`

### Adding Paths

You may add paths at anytime by using resolving or injecting the `\AnomalyStreams\Platform\Image\ImagePaths` class and adding the path by it's namespace.

	app('Anomaly\Streams\Platform\Image\ImagePaths')->addPath('s3', 'https://s3-us-west-2.amazonaws.com/my-public-bucket');

{{ segment:blue text="Remote paths (where the path starts with http) can be used but images will be included as is." }}

You may also add paths to your streams.php config file. The path array should be a key value array where the namespace is the key and the value is the path.

	'image_paths' => ['neat_images' => 'my/neat/images/path']


## Manipulation 

You can manipulate images by chaining methods on the image instance. Below is an overview of what each filter does and how to use them.

You can manipulate an image by chaining commands:

	$image->make('theme::img/logo.jpg')
		->crop(int $width, int $height, [int $x, int $y])
		->greyscale()
		->url();

You can define different output methods by changing the output method:

	$image->make('theme::img/logo.jpg')->path();
	$image->make('theme::img/logo.jpg')->image();

### attr($attribute, $value)

Add an attribute to the resulting image tag when using image() output.

### blur($pixels)

Apply a blur effect to the image.

### brightness($level)

Adjust the image brightness from -100 to 100.

### colorize($red, $green, $blue)

Adjust the levels of RGB by -100 to 100.

### contrast($level)

Adjust the image contrast from -100 to 100.

### crop($width, $height, $x = null, $y = null)

Crop the image to a width and height from an optional x/y starting point.

### fit($width, $height = null)

Fit the image to the desired width and optional height.

### flip($direction)

Flip the image direction (h = horizontal and v = vertical).

### gamma($level)

Adjust the image's gamma level from -100 to 100.

### greyscale() / grayscale()

Convert the image to grayscale.

### heighten($height)

Adjust the image's height without modifying the width.

### widen($width)

Adjust the image's width without modifying the height.

### invert()

Invert the image's colors.

### limitColors($count, $matte = null)

Limit the colors used in the image.

### pixelate($size)

Pixelate the image.

### opacity($opacity)

Adjust the image's opacity from 0 to 100.

### quality($quality)

Adjust the quality of the resulting image.

### resize($width, $height)

Force resize the image to the given width and height.

### rotate($angle, $background = null)

Rotate the image and optionally fill the resulting background space.


## Usage

The Image and ImagePaths classes are a singletons. This means you will want to resolve them form the IoC container by using `app('Anomaly\Streams\Platform\Image\ImagePaths')` or by letting Laravel automatically inject it.

Here is an example of injecting the class into your controller, adding echo'ing a simple URL:

	class ExampleController extends AdminController
	{
	    public function example(Image $image)
	    {
			echo $image->make('module::img/something.png')->blur(10)->url();
	    }
	}


## Plugin

There are a few functions that are added to Twig with the Image plugin. They closely follow the API methods:

	{{ image('theme::img/logo.jpg').attr('class', 'logo').resize(100, 200)|raw }}

You may also use image\_url and image\_path functions the same way. The plugin functions allow you to chain the modification methods just like with the API.

