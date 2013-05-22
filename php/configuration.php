<?php
class JConfig {
	/* Site Settings */
	public $offline = '0';
	public $offline_message = 'This site is down for maintenance.<br /> Please check back again soon.';
	public $display_offline_message = '1';
	public $offline_image = '';
	public $sitename = 'OpenShift Example Joomla Installation';	// Name of Joomla site
	public $editor = 'tinymce';
	public $captcha = '0';
	public $list_limit = '20';
	public $root_user = '42';
	public $access = '1';

	/* Database Settings */
	public $dbtype = 'mysqli';					// Normally mysqli
	public $host = 'localhost';					// This is normally set to localhost
	public $user = '';						// DB username
	public $password = '';						// DB password
	public $db = '';						// DB database name
	public $dbprefix = 'dkdso_';					// Do not change unless you need to!

	/* Server Settings */
	public $secret = 'lSddQsAcF7eJbDXA'; 				// Change this to something more secure
	public $gzip = '0';
	public $error_reporting = 'default';
        public $helpurl = 'http://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help{major}{minor}:{keyref}';
	public $ftp_host = '';
	public $ftp_port = '';
	public $ftp_user = '';
	public $ftp_pass = '';
	public $ftp_root = '';
	public $ftp_enable = '';
	public $tmp_path = '/tmp';
	public $log_path = '/var/logs';
	public $live_site = ''; 					// Optional, Full url to Joomla install.
	public $force_ssl = 0;						// Force areas of the site to be SSL ONLY.  0 = None, 1 = Administrator, 2 = Both Site and Administrator

	/* Locale Settings */
	public $offset = 'UTC';

	/* Session settings */
	public $lifetime = '15';					// Session time
	public $session_handler = 'database';

	/* Mail Settings */
	public $mailer = 'mail';
	public $mailfrom = 'admin@admin.com';
	public $fromname = 'OpenShift Example Joomla Installation';
	public $sendmail = '/usr/sbin/sendmail';
	public $smtpauth = '0';
	public $smtpuser = '';
	public $smtppass = '';
	public $smtphost = 'localhost';

	/* Cache Settings */
	public $caching = '0';
	public $cachetime = '15';
	public $cache_handler = 'file';

	/* Debug Settings */
	public $debug = '0';
	public $debug_lang = '0';

	/* Meta Settings */
	public $MetaDesc = 'Joomla! - the dynamic portal engine and content management system';
	public $MetaKeys = 'joomla, Joomla';
	public $MetaTitle = '1';
	public $MetaAuthor = '1';
	public $MetaVersion = '0';
	public $robots = '';

	/* SEO Settings */
	public $sef = '1';
	public $sef_rewrite = '0';
	public $sef_suffix = '0';
	public $unicodeslugs = '0';

	/* Feed Settings */
	public $feed_limit = 10;
	public $feed_email = 'author';

	public function __construct() {
		$this->host = getenv("OPENSHIFT_MYSQL_DB_HOST").":".getenv("OPENSHIFT_MYSQL_DB_PORT");
		$this->user = getenv("OPENSHIFT_MYSQL_DB_USERNAME");
		$this->password = getenv("OPENSHIFT_MYSQL_DB_PASSWORD");
		$this->db = getenv("OPENSHIFT_APP_NAME");
		$this->log_path = getenv("OPENSHIFT_LOG_DIR");
		$this->tmp_path = getenv("OPENSHIFT_TMP_DIR");
	}
}
