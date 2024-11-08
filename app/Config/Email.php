<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
	/**
	 * @var string
	 */
	public $fromEmail;

	/**
	 * @var string
	 */
	public $fromName;

	/**
	 * @var string
	 */
	public $recipients;

	/**
	 * The "user agent"
	 *
	 * @var string
	 */
	public $userAgent = 'CodeIgniter';

	/**
	 * The mail sending protocol: mail, sendmail, smtp
	 *
	 * @var string
	 */
	public $protocol = 'SMTP';

	/**
	 * The server path to Sendmail.
	 *
	 * @var string
	 */
	public $mailPath = '/usr/sbin/sendmail';

	/**
	 * SMTP Server Address
	 *
	 * @var string
	 */
	// public $SMTPHost = 'mail.mitrask.com';
	//public $SMTPHost = 'pledge.ecoex.market';
	// public $SMTPHost = 'smtp-relay.sendinblue.com';
	// 	public $SMTPHost = 'smtp-relay.brevo.com';
	public $SMTPHost = 'smtp-relay.brevo.com';


	/**
	 * SMTP Username
	 *
	 * @var string
	 */
	// public $SMTPUser = 'noreply@mitrask.com';
	//public $SMTPUser = 'no-reply@pledge.ecoex.market';
	// public $SMTPUser = 'info@ecoex.market';
	// 	public $SMTPUser = 'no-reply@pledge.ecoex.market';
	public $SMTPUser = 'victoriatravelskdpl@gmail.com';

	/**
	 * SMTP Password
	 *
	 * @var string
	 */
		// public $SMTPPass = 'fbZewgNMA)Ev';
		//public $SMTPPass = '@pledge.ecoex.market';
		// public $SMTPPass = 'x6fbc5NEX7VPyHtS';

	public $SMTPPass = 'My5XaC1cn2EpP8Is';

	/**
	 * SMTP Port
	 *
	 * @var integer
	 */
	//public $SMTPPort = 465;
	public $SMTPPort = 587; // 587;

	/**
	 * SMTP Timeout (in seconds)
	 *
	 * @var integer
	 */
	public $SMTPTimeout = 60;

	/**
	 * Enable persistent SMTP connections
	 *
	 * @var boolean
	 */
	public $SMTPKeepAlive = true;

	/**
	 * SMTP Encryption. Either tls or ssl
	 *
	 * @var string
	 */
	public $SMTPCrypto = 'tls';

	/**
	 * Enable word-wrap
	 *
	 * @var boolean
	 */
	public $wordWrap = true;

	/**
	 * Character count to wrap at
	 *
	 * @var integer
	 */
	public $wrapChars = 76;

	/**
	 * Type of mail, either 'text' or 'html'
	 *
	 * @var string
	 */
	public $mailType = 'html';

	/**
	 * Character set (utf-8, iso-8859-1, etc.)
	 *
	 * @var string
	 */
	public $charset = 'UTF-8';

	/**
	 * Whether to validate the email address
	 *
	 * @var boolean
	 */
	public $validate = false;

	/**
	 * Email Priority. 1 = highest. 5 = lowest. 3 = normal
	 *
	 * @var integer
	 */
	public $priority = 1;

	/**
	 * Newline character. (Use “\r\n” to comply with RFC 822)
	 *
	 * @var string
	 */
	public $CRLF = "\r\n";

	/**
	 * Newline character. (Use “\r\n” to comply with RFC 822)
	 *
	 * @var string
	 */
	public $newline = "\r\n";

	/**
	 * Enable BCC Batch Mode.
	 *
	 * @var boolean
	 */
	public $BCCBatchMode = false;

	/**
	 * Number of emails in each BCC batch
	 *
	 * @var integer
	 */
	public $BCCBatchSize = 200;

	/**
	 * Enable notify message from server
	 *
	 * @var boolean
	 */
	public $DSN = true;
}
