# Coding Standards

These standards for code formatting and documentation must be followed by anyone contributing to PyroCMS. Any contributions that do not meet these guidelines will not be accepted.

## File Formatting

### Closing PHP Tag

Files containing only PHP code should always omit the closing PHP tag `?>`. This prevents many of the elusive white screens of death.

### Indentation

All indentation should be done using real tabs, NOT spaces.<br />
But aligning things after the indentation should be done using spaces, NOT tabs.

	// indented 2 tabs
	$var       = 'something';  // indented with tabs and aligned value &amp; comments
	$variable  = 'else';       // with those above/below using spaces

### Line Endings

Line endings should be Unix-style LF.

### File Naming

All file names must be all lower case. No exceptions.

### Encoding

Files should be saved with UTF-8 encoding and the BOM should not be used.

## Naming Conventions

### Classes

Class names should use underscores to separate words, and each word in the class name should begin with a capital letter. The use of camelcase is discouraged but cannot be prevented in some cases.

	class Theme
	{

	}

 or 

	class Theme_Bubbles extends Theme
	{

	}

### Methods

Like class names, method names should use underscores to separate words, not CamelCase. Method names should
	also be all lower case. Visibility should always be included (public, protected, private).<br />
	An underscore can be used at the beginning of the name to make it clear the method is protected/private or
	to signify it should be considered as such when you need it public.

	class Session
	{
		public function get_flash($name, $data)
		{
			// Some code here
		}
	}

or

	class View
	{

		// Array of global view data
		protected $_global_data = array();

		protected function capture($view_filename, array $view_data)
		{
			// Some code here
		}

	}

### Variables

Variable names should be concise and contain only lower case letters and underscores. Loop iterators should
	be short, preferably a single character.

	$first_name
	$buffer
	for ($i = 0; $i &lt; $max; $i++)

### Constants

Constants follow the same guide lines as variables with the exception that constants should be all upper
	case.

	MY_CONSTANT
	TEMPLATE_PATH
	TEXT_DEFAULT

## Keywords

Keywords such as <kbd>true</kbd>, <kbd>false</kbd>, <kbd>null</kbd>, <kbd>as</kbd>, etc should be all lower case, as upper case is reserved for
	constants. Same goes for primitive types like <kbd>array</kbd>, <kbd>integer</kbd>, <kbd>string</kbd>.

	$var = true;
	$var = false;
	$var = null;
	foreach ($array as $key => $value)
	public function my_function(array $array)
	function my_function($arg = null)

## Control Structures

The structure keywords such as <kbd>if</kbd>, <kbd>for</kbd>, <kbd>foreach</kbd>, <kbd>while</kbd>, <kbd>switch</kbd> should be followed by a space as should parameter/argument lists and values. Braces should be placed on a new line, and <kbd>break</kbd> should have the same tab as its case.

	if ($arg === true)
	{
		//do something here
	}
	elseif ($arg === null)
	{
		//do something else here
	}
	else
	{
		//catch all do something here
	}
	foreach ($array as $key => $value)
	{
		//loop here
	}
	for ($i = 0; $i < $max; $i++)
	{
		//loop here
	}
	while ($i < $max)
	{
		//loop here
	}
	switch ($var)
	{
		case 'value1':
		//do something here
		break;
		default :
		//do something here
		break;
	}

## Alternative if statements

In some cases, a full <kbd>if</kbd> statement is a bit too much code for a simple conditional assignment or function
	call. In those cases, you can use PHP's execution logic to use a shorter boolean-operator based syntax.
	Using <kbd>and</kbd> means the second part only gets evaluated if the first part were true, using
	<kbd>or</kbd> means the second part only gets executed if the first part were false.<br />
	Don't use this when both <kbd>if</kbd> and <kbd>else</kbd> are needed, just in cases like single conditional statements.

	// instead of if (isset($var)) { Config::set('var', $var); }
	isset($var) and Config::set('var', $var);

	// instead of if ( ! isset($var)) { $var = Config::get('var'); }
	isset($var) or $var = Config::get('var');

	// DON'T DO THIS
	$this->uri->segment(3) and $var = $this->uri->segment(3);
	$this->uri->segment(3) or $var = 'default';

	// This is better:
	if ($this->uri->segment(3))
	{
		$var = $this->uri->segment(3);
	}
	else
	{
		$var = 'default';
	}

	// Or this:
	$var = $this->uri->segment(3) ? $this->uri->segment(3) : 'default';

## Comparisons, Logical operators

Comparing function/method returns and variables should be type aware, for example some functions may return
	<kbd>false</kbd>, and when comparing this return the type sensitive operators such as <kbd>===</kbd> or <kbd>!==</kbd>. Additionally, use of
	<kbd>and</kbd> or <kbd>or</kbd> is preferred over <kbd>&&</kbd> or <kbd>||</kbd> for readability. In some cases, this cannot be avoided and the use of
	<kbd>&&</kbd> or <kbd>||</kbd> as its required may be used. The <kbd>!</kbd> should have spaces on both sides when used.

	if ($var == false and $other_var != 'some_value')
	if ($var === false or my_function() !== false)
	if ( ! $var)

## Class/Interface Declarations

Class/interface declarations have the opening brace on the following line:

	class Session
	{

	}

## Function/Method Declarations

The function/method opening brace must always begin on a new line and have the same indentation as its
	structure.

	class Session
	{
		public static function get_flash($name, $data)
		{
			// Some code here
		}
	}

### Variables

When initializing variables, one variable should be declared per line. To enhance code readability, these
	should each be on a separate line. Align values and comments when appropriate.

	$var        = ''; // do each on its own line
	$other_var  = ''; // do each on its own line

## Brackets and Parenthesis

No space should come before or after the initial bracket/parenthesis. There should not be a space before closing bracket/parenthesis.

	$array = array(1, 2, 3, 4);
	$array['my_index'] = 'something';
	for ($i = 0; $i < $max; $i++)

### String quotation

Single quotes are preferred over double quotes.

### Concatenation

String concatenation should not contain spaces around the joined parts.

	//yes
	$string = 'my string '.$var.' the rest of my string';

	//no
	$string = 'my string ' . $var . ' the rest of my string';

### Operators

	$var = 'something';
	if ($var == 'something') //space before and after logical operator
	$var = $some_var + $other_var; //space before and after math operator
	$var++; // no space before increment
	++$var; //no space after increment
	
## Documentation
Having a good API documentation is a vital requirement for any successful project. When building your module, please take the time to document its code or even write help articles on it (but that is a different story). 

Most of PyroCMS' core components [are documented](http://docs.pyrocms.com/2.1/api/) and add-ons are actually expected to keep up by at least having each of their files declare the respective package they belong to. Anything can be documented except for views. Classes and functions should be documented using the standard PHPDoc format. 

The actual API Documentation is being generated by [DocBlox](http://www.docblox-project.org/). This gives the ability to reflect the HMVC approach used in building PyroCMS into the actual API documentation. This is how the API Documentation packages are structured in PyroCMS:

	* External libraries use their respective packages (none of our business)
	* Everything related to PyroCMS is under the *PyroCMS* package.
	* Inside the *PyroCMS* package there are two distinct subpackages:
	  * *Core*, everything that comes with the PyroCMS release
	  * *Addon*, 3rd party modules, themes, etc.
	* Each of *Core* & *Addon* have can possibly have the following subpackages:
	  * *Controllers*
	  * *Models*
	  * *Modules*
	  * *Libraries*
	  * *Plugins* 
	  * *Widgets*
	* Furthermore *Modules* can have:
	  * *Controllers*
	  * *Models*
	  * *Libraries*
	  * *Plugins*
	  * *Widgets*

In the PyroCMS distribution you will find a configuration file to actually generate the API Documentation locally and review your work. Remember, you can always refer to the PyroCMS source to see how things are done.