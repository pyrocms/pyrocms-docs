# Sitemap Module

The sitemap module automatically outputs an XML sitemap for use with Google's [Webmaster Tools](http://www.google.com/webmasters/tools/) and other similar services. 

The sitemap is located at:

	/sitemap.xml

It will map not only your site pages (via the Pages module), but also modules that support the PyroCMS sitemap protocol, such as the Blogs module.

## Example

Create a sitemap for your custom module is very easy, you can do it with few lines of code. 

Let's see how to create it in a custom module called "**News**" and assume that your DB table looks like this:

<table>
	<tr>
		<th width="30%">Column</th>
		<th>Notes</th>
	</tr>
	<tr>
		<td>id</td>
		<td>News ID.</td>
	</tr>
	<tr>
		<td>title</td>
		<td>The news title.</td>
	</tr>
	<tr>
		<td>slug</td>
		<td>The news slug that will be used as link.</td>
	</tr>
	<tr>
		<td>content</td>
		<td>The news body.</td>
	</tr>
	<tr>
		<td>created_on</td>
		<td>Date and time that indicate when the news has been created.</td>
	</tr>
</table>

All you need to do to hook your module to the Sitemap module is create a new file in your controllers folder and named it "**sitemap.php**". This file will be call as soon as someone, user or crawler, will request the sitemap.xml file.

In the "**sitemap.php**" file you need to create a "**xml**" function that will get the entries from the news table and print it in xml.

Here you can find a complete example:

	<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Sitemap extends Public_Controller
	{
		public function xml()
		{
			$this->load->model('news_m');
			
			//Get all the news in the DB
			$all_news = $this->news_m->get_all_news();
			
			$doc = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" />');
			
			//Fetch all the news
			foreach($all_news as $news)
			{
				$node = $doc->addChild('url');
				
				//This will create a link to the news usign the slug
				$loc = site_url('news/show/'.$news->slug);
	
				$node->addChild('loc', $loc);
	
				$node->addChild('lastmod', date(DATE_W3C, $news->created_on));
				
			}
			
			
			$this->output
				->set_content_type('application/xml')
				->set_output($doc->asXML());
		}
	}