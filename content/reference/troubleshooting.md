# Troubleshooting

Before you hit the forums, check out our list of some common issues and their solutions.

</div>
<div class="doc_content">

## Emails Are Not Being Sent

If you are trying to send email via PyroCMS (via the contact plugin, or any other method) and no emails are being sent, the first step is to check the settings of whatever mail method you are using. You can find those settings in <samp>Settings</samp>, undert the <samp>Email</samp> tab.

If you are sure your settings are correct, there might be an isse with line endings in your email. The majority of server mail software is fine with using <code>PHP_EOL</code> for line endings, but some software (like qmail) might need you to set your line endings to <code>\r\n</code>.

To do this, go into <samp>system/cms/libraries/MY_Email.php</samp> and change:

    $config['crlf']    = PHP_EOL;
    $config['newline']  = PHP_EOL;

to:

    $config['crlf']    = "\r\n";
    $config['newline']  = "\r\n";