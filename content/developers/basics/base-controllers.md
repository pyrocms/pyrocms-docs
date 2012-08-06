# Base Controllers

PyroCMS comes with several base controllers to extend that allow you to tap into existing functionality. You can extend the PyroCMS base controllers by extending the controller class in your controllers:

	class Blog extends Public_Controller
	{
		public function __construct()
		{


## MY\_Controller

MY\_Controller is what the controllers below extend, so if you are using Public\_Controller or Admin_Controller, the functionality of MY\_Controller is already included. MY\_Controller does the following:

* Checks for the SITE_REF constant to make sure the site is set up
* Sets the dbprefix to the SITE_REF
* Makes sure migrations are current
* Defines the CURRENT_LANGUAGE constant
* Loads the user login system
* Collects data about the current user into $this->current_user
* Handles permissions based on the module and user
* Sets the output profiler based on the preference

## Public\_Controller

Used for front-end controllers, the Public\_Controller class will run the following processes before your controller:

* Runs redirects from the redirect module
* Calls the public_controller event
* Checks to see if the site is disabled, and puts up the site disabled setting in the mean time
* Loads the site theme and sets the theme paths
* Sets up the APPPATH\_URI and BASE\_URI javascript variables
* Sets a canonical URL link in the header metadata
* Sets RSS blog link in the header if the blog module exists
* Loads variables from the variable module
* Loads theme options

## Admin\_Controller

Used for all admin controllers. Will do the following:

* Checks to see if the user has control panel access
* Sets request to HTTPS if desired
* Sets the admin theme and loads the necessary paths
* Sets the template enable_parser option to false. Set this back to true to use PyroCMS tags in your admin views.