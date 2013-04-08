# Troubleshooting

Before you hit the forums, check out our list of some common issues and their solutions.

* {{ docs:id_link title="Installation Problems on GoDaddy" }}
* {{ docs:id_link title="Emails Are Not Being Sent" }}


</div>
<div class="doc_content">

## Installation Problems on GoDaddy

If you are trying to install PyroCMS on GoDaddy servers, you may need to make some adjustments:

First add an .htaccess to the install directory:

    RewriteEngine on
    RewriteBase /installer/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?/$1 [L]

Then, in <samp>installer/config/config.php</samp>, change the <var>$config['index_page']</var>:

    $config['index_page'] = "index.php?";

In the same file, change <var>$config['uri_protocol']</var>:

    $config['uri_protocol'] = "QUERY_STRING";

## Emails Are Not Being Sent

If you are trying to send email via PyroCMS (via the contact plugin, or any other method) and no emails are being sent, the first step is to check the settings of whatever mail method you are using. You can find those settings in <samp>Settings</samp>, undert the <samp>Email</samp> tab.

If you are sure your settings are correct, there might be an isse with line endings in your email. The majority of server mail software is fine with using <code>PHP_EOL</code> for line endings, but some software (like qmail) might need you to set your line endings to <code>\r\n</code>.

To do this, go into <samp>system/cms/libraries/MY_Email.php</samp> and change:

    $config['crlf']    = PHP_EOL;
    $config['newline']  = PHP_EOL;

to:

    $config['crlf']    = "\r\n";
    $config['newline']  = "\r\n";