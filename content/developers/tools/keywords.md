# Keywords

Keywords are the same as what other systems would call Tags. We have Tags already, so we call them Keywords. They are used in the core to add META Keywords to your pages and to add Keywords to blog articles.

## Using Keywords in your modules

Simply add a **char(32)** field to your database. This stored the MD5 string that represents the combination of keywords that were used.

<script src="https://gist.github.com/1777448.js?file=gistfile1.aw"></script>

In the above example, <kdb>Keywords::process('foo, bar, baz')</kdb> takes a comma separated string of keywords and converts them into a MD5 string, which is a unique hash for the combination of keywords being used.

## Schema

Each keyword will be taken and stored in a table called "default\_keywords", which makes the table smaller and makes counting popular words easier.

	+-------+------------------+------+-----+---------+----------------+
	| Field | Type             | Null | Key | Default | Extra          |
	+-------+------------------+------+-----+---------+----------------+
	| id    | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
	| name  | varchar(50)      | NO   |     | NULL    |                |
	+-------+------------------+------+-----+---------+----------------+

They will then be linked in "default\_keywords\_applied" with the keyword hash as a unique identifier against each keyword_id.

	+------------+------------------+------+-----+---------+----------------+
	| Field      | Type             | Null | Key | Default | Extra          |
	+------------+------------------+------+-----+---------+----------------+
	| id         | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
	| hash       | char(32)         | NO   |     | NULL    |                |
	| keyword_id | int(10) unsigned | NO   |     | NULL    |                |
	+------------+------------------+------+-----+---------+----------------+
	
## Displaying Keywords

In your public controller you can use the following to build a list of keyword links in a string.

	Keywords::get_links($hash, 'blog/tagged')
	
You can also return an array or a string with the following methods:

	Keywords::get_array($hash);
	Keywords::get_string($hash);

For more on usage see the [API Documentation: Keywords](/2.1/api/classes/Keywords.html).