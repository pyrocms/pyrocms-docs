# Translating Language Files

PyroCMS is built to have a fully multi-lingual interface, which means you can switch between different languages, and if your language is not supported you can easily translate from one of the existing languages into yours.

## Currently Supported

If your language is listed below then you do not need to translate anything, but keep in mind that the only officially supported language is English. Every other language is provided and maintained by the community. They could potentially be out of date or contain incorrect text.

* English
* Arabic
* Brazilian
* Chinese (Traditional)
* Czech
* Dutch
* Finnish
* French
* German
* Greek
* Hebrew
* Italian
* Lithuanian
* Polish
* Russian
* Slovenian
* Spanish

### Step #1: Translate or Download a CodeIgniter language pack

CodeIgniter has a large community of developers in many languages, so a quick check of the [CodeIgniter Translations Wiki](http://codeigniter.com/wiki/Language_Translation/) or Google may provide you with a language pack. Keep in mind that PyroCMS is running CodeIgniter Reactor v2.0.x so if you install v1.7.x or older you will most likely find that language lines are missing or incorrect.

Either way, install your language pack to system/codeigniter/languages/*&lt;language-name&gt;*

### Step #2: Translate PyroCMS language pack

PyroCMS language files exist both in the main application folder and inside each module. This is a list of all folders that contain language files:

1. system/cms/language/*&lt;language-name&gt;*/
2. system/cms/modules/*&lt;module-name&gt;*/language/*&lt;language-name&gt;*/
3. addons/modules/*&lt;module-name&gt;*/language/*&lt;language-name&gt;*/

To get these new folders, just copy the **english** folder, rename it and translate all of the English text into your language.

### Step #3: Add language to each modules details.php

Each module has a details.php file that contains details about the module such as versions, installation information, names and descriptions. Each name and description needs to be translated into your current language based on the [ISO_3166-2](http://en.wikipedia.org/wiki/ISO_3166-2) 2-letter code. For example, English is "en" and French is "fr".

### Step #4: Add language to config

Open up system/cms/config/languages.php and add your language to the array with the same two digit code used in Step 3. Once this is done you will see your language available in the dropdown menu in the Control Panel.

That should be it! If you get any language related errors when you switch to your new language and want to switch back to English then just add ?lang=en to any URL.

When you have confirmed that it everything looks correct you could consider contributing the language pack changes back to the core of PyroCMS via <a href="/docs/manuals/developers/contributing-changes-to-pyrocms ">forking with Git</a>. This way it can be contributed to the next major version and others will not have to spend time translating PyroCMS themselves.