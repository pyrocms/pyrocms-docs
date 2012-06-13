# Multi-Site Manager

If you are using PyroCMS Professional you can go to http://example.com/sites to log in and add or edit your websites. You can access it via any domain you like and initially you will log in with whatever your main admin account is.

<div class="tip"><strong>Note:</strong> The installer and upgrade procedure will just clone your main admin account(s) but they are NOT the same account. If you change your admin password or delete a user it will be gone from /admin but will still exist in /sites and vice-versa. The users in the two areas have no actual relationship to each other, as an admin for one site may not be an admin in another. This is done for security and is not a bug.</div>

## Creating a Site

To create a site simply point your domain or sub-domain to your server by modifying the DNS settings. You can add a CNAME record to &quot;alias&quot; your main domain or point the A record to the same IP.

Then you need to make sure your web-server (probably Apache) knows how to respond to this URL.

With the server setup done you can just go to http://whatever.com/sites and &quot;Create a New Site&quot;. Follow the wizard through and add a site ref. This site ref is important and will be used in the folder structure and as the prefix for your sites database tables.

<a class="iframe" href="http://www.pyrocms.com/files/large/23"><img alt="Multi-Site Manager" class="pyro-image" src="http://pyrocms.com/files/thumb/24/700/450" style="float: none; width: 550px;" /></a>

## Add-on Management

Sites by default are just like any other PyroCMS installation and will be able to do anything a normal single-site installation could do. If you are providing these sites to various different admins, reselling accounts, etc then you need to strip down what these sites can do.

One of the most important things is to disable Add-on uploading. A site administrator could - either intentiionally or unintentionally - upload a malicious module, theme, plugin or widget which could not only mess with their site but potentially destroy, manipulate or gain access to their information. You can disable uploading addons right from the main page.

Going further you can upload, install, upgrade, uninstall and delete modules for each or every site right from this interface.

<a class="iframe prettyPhoto" href="http://www.pyrocms.com/files/large/23"><img alt="Multi-Site Add-On Manager" class="pyro-image" src="http://pyrocms.com/files/thumb/23/700/450" style="float: none; width: 550px;" /></a>