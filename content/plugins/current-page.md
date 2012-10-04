# Current Page Plugin

The _page_ plugin allows you to access information about the current page. This is different from the _pages_ plugin which allows you to access information about pages in general.

## page:id

Displays the unique id for the page

	{{ noparse }}{{ page:id }}{{ /noparse }}

## page:slug

Displays the page's slug. "home" for example

	{{ noparse }}{{ page:slug }}{{ /noparse }}

## page:title

The page title visible in the admin panel. "Home" for the default home page.

	{{ noparse }}{{ page:title }}{{ /noparse }}

## page:uri

The uri that the page is accessible at. For child pages of "home" this would be "home/child-slug"

	{{ noparse }}{{ page:uri }}{{ /noparse }}

## page:parent_id

The unique page id of this page's parent

	{{ noparse }}{{ page:parent_id }}{{ /noparse }}

## page:layout_id

Displays the id of the Page Layout that this page is assigned to

	{{ noparse }}{{ page:layout_id }}{{ /noparse }}

## page:rss_enabled

Displays a 1 if this page is displayed as an RSS feed. (Child pages are treated as entries).

	{{ noparse }}{{ page:rss_enabled }}{{ /noparse }}

## page:comments_enabled

Displays a 1 if commenting is turned on for this page.

	{{ noparse }}{{ page:comments_enabled }}{{ /noparse }}

## page:status

Will either be "live" or "draft". In draft mode only admins may view the page.

	{{ noparse }}{{ page:status }}{{ /noparse }}

## page:created_on

The epoch time when the page was created. Wrap this with the date helper to format it for humans: {{ helper:date timestamp=page:created_on }}

	{{ noparse }}{{ page:created_on }}{{ /noparse }}

## page:updated_on

This is the same as {{ noparse }}{{ page:created_on }}{{ /noparse }} except that it displays the epoch time when the page was updated.

	{{ noparse }}{{ page:updated_on }}{{ /noparse }}

## page:is_home

Displays a 1 if the page is set as the default (home) page. There can only be one page with this set.

	{{ noparse }}{{ page:is_home }}{{ /noparse }}

## page:strict_uri

Displays a 1 if the URI must match exactly. If set to 0 child segments will be ignored if the child pages do not exist. For example "site.com/home/child" will resolve to "home" if "child" doesn't exist.

	{{ noparse }}{{ page:strict_uri }}{{ /noparse }}
