# Overloading Module Views

PyroCMS is written intended to be styled mainly by CSS, but as designers you want full control over how your site looks. We understand that, so PyroCMS will let you replace any module view with a view inside your theme. Let&#39;s say you want to replace the main blog listing page. Simply copy:

	system/cms/modules/blog/views/index.php

to:

	addons/<site-ref>/themes/<theme-name>/views/modules/blog/index.php

Now you can edit that view however you like and upgrade PyroCMS knowing your customized views are safe.</p>

## Syntax in overloaded views

You can still use PHP in these overloaded views. This means you can just copy whatever is there exactly and change it. In later versions we may be removing this as there is always the possibility that themes can contain malicious PHP if downloaded from a third-party site, but we will likely make this a setting.

Either way, you can use Tag syntax and this is most likely the safest, but can be more complicated for converting.
