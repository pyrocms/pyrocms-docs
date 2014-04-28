# Search

The Search module allows you to search for anything, anything at all. The way this works is by building up an "index" of searchable items 
in a "Search index". This index contains fields that can linked back to specific "entries" with some information about what they are called, 
and what URL the entry can be found on. 

## Manipulating the Search Index in your add-ons

To work with the search index there is a [Search index model][searchindex] available to you.

	// Load the search index model
	$this->load->model('search/search_index_m');

Adding an entry is as simple as calling <kdb>$this->search\_index\_m->index()</kdb> which contains all the information require to store it in the index table:

	$this->search_index_m->index(
		'blog', 
		'blog:post', 
		'blog:posts', 
		$id,
		'blog/'.date('Y/m/', $post->created_on).$post->slug,
		$post->title,
		$post->intro, 
		array(
			'cp_edit_uri' 	=> 'admin/blog/edit/'.$id,
			'cp_delete_uri' => 'admin/blog/delete/'.$id,
			'keywords' 		=> $post->keywords,
		)
	);

For a full breakdown of what these parameters are read the [api documentation][index-method]. It's worth noting for the `'keywords'` field that you can send it an array of Keywords, or you can send it a MD5 hash - which is explained in the [Keywords][keywords] documentation.

Removing items from the index is even easier:

	$this->search_index_m->drop_index('blog', 'blog:post', $id);

This will remove a blog post. The singular language key is used to make sure they the correct type of entry is removed from the module being used, 
as there could be multiple types of entry for each module.

## Schema

Each entry will be stored in a table called "default\_search\_index" which contains fulltext fields to allow for searching, a keywords hash (and 
or plain-text keywords if the module does not use the [Keywords][keywords] system) and entry informaiton.

	+---------------+------------------+------+-----+---------+----------------+
	| Field         | Type             | Null | Key | Default | Extra          |
	+---------------+------------------+------+-----+---------+----------------+
	| id            | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
	| title         | char(255)        | NO   | MUL | NULL    |                |
	| description   | text             | YES  |     | NULL    |                |
	| keywords      | text             | YES  |     | NULL    |                |
	| keyword_hash  | char(32)         | YES  |     | NULL    |                |
	| module        | varchar(40)      | YES  | MUL | NULL    |                |
	| entry_key     | varchar(100)     | YES  |     | NULL    |                |
	| entry_plural  | varchar(100)     | YES  |     | NULL    |                |
	| entry_id      | varchar(255)     | YES  |     | NULL    |                |
	| uri           | varchar(255)     | YES  |     | NULL    |                |
	| cp_edit_uri   | varchar(255)     | YES  |     | NULL    |                |
	| cp_delete_uri | varchar(255)     | YES  |     | NULL    |                |
	+---------------+------------------+------+-----+---------+----------------+
	
## Search Results with PHP

You can access search results in a few ways. One is to use the [search()][search-method] method, which when combined with [filter()][filter-method]
can limit search results to specific modules, or even specific types of entry within a module.

	$query = $this->input->get('q');
	$filter = $this->input->get('filter');

	$total = $this->search_index_m
		->filter($filter)
		->count($query, $filter);

	$pagination = create_pagination($uri, $total, $limit, $segment);
	
	$results = $this->search_index_m
		->limit($pagination['limit'])
		->filter($this->input->get('filter'))
		->search($query);

This is how PyroCMS handles the data-interaction and pagination inside the search plugin. Filter is a multidimentional array, which looks like this:

	$this->search_index_m->filter(array(
		'blog' => 'blog:posts'
	));

Or you can search for multiple types of entry:

	$this->search_index_m->filter(array(
		'blog' => 'blog:posts',
		'ecommerce' => array('products', 'downloads')
	));

## Search Results with Tags

Create a search form with the Search plugin using double-tag syntax.

	{{ noparse }}{{ search:form class="search-form" }} 
	&lt;input name="q" placeholder="Search terms..." /&gt;
{{ /search:form }}{{ /noparse }}

On the results page you can use the following syntax to loop through the entries and even display pagination:

	{{ noparse }}{{ search:results }}
	{{ total }} results for "{{ query }}".
	&lt;hr /&gt;
	{{ entries }}
		&lt;article&gt;
			&lt;h4&gt;{{ singular }}: &lt;a href="{{ url }}"&gt;{{ title }}&lt;/a&gt;&lt;/h4&gt;
			&lt;p&gt;{{ description }}&lt;/p&gt;
		&lt;/article&gt;
	{{ /entries }}
	{{ pagination }}
{{ /search:results }}{{ /noparse }}

The URL for this results page will most likely be:

> /search/results?q=Search%20terms%20for%20modules&filter[blog]=blog:posts

You can create links that re-use the search term and modify the filter variable to create "Filter By" links:

	{{ noparse }}&lt;a href="/search/results?q={{ url:get key='q' }}&amp;filter[blog]=blog:posts"&gt;
	Blog posts
&lt;/a&gt;{{ /noparse }}

For more on usage see the [API Documentation: Search](/2.2/api/classes/Search.html).

  [searchindex]: /2.2/api/classes/Search_index_m.html
  [search-method]: /2.2/api/classes/Search_index_m.html#search
  [filter-method]: /2.2/api/classes/Search_index_m.html#filter
  [index-method]: /2.2/api/classes/Search_index_m.html#index
  [keywords]: /2.2/manual/index.php/developers/tools/keywords
