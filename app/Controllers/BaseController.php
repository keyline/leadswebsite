<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\CommonModel;
use App\Models\Menu;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['common_helper'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		$this->common_model = new CommonModel;
		$this->session = \Config\Services::session();
		$this->uri = new \CodeIgniter\HTTP\URI();
	}
	public function layout_after_login($title, $page_name, $data)
	{
		$data['session'] = \Config\Services::session();
		$data['common_model'] = new CommonModel;


		$data['site_setting'] = $this->common_model->find_data('sms_site_settings', 'row');

		$conditions = array('notification_access' => 1, 'published' => 0);
		$order_by[0] = array('field' => 'notification_id ', 'type' => 'desc');
		$data['new_notifications'] = $this->common_model->find_data('sms_notification_list', 'array', $conditions, '', '', '', $order_by, 3);

		// $conditions = array('notification_access'=>1,'published'=>1);
		// $data['new_notifications'] = $this->common_model->find_data('sms_notification_list','array',$conditions,'','','','',2);


		$data['title'] = $title . '-' . $data['site_setting']->site_name;
		$data['page_header'] = $title;

		$data['head'] = view('admin/elements/head', $data);
		$data['header'] = view('admin/elements/header', $data);
		$data['left_sidebar'] = view('admin/elements/left-sidebar', $data);
		$data['maincontent'] = view('admin/maincontents/' . $page_name, $data);
		return view('admin/layout-after-login', $data);
	}
	public function front_layout($title, $page_name, $data)
	{
		$data['session'] 			= \Config\Services::session();
		$data['common_model'] 		= new CommonModel;
		$data['uri'] 				= new \CodeIgniter\HTTP\URI();
		$data['site_setting'] 		= $this->common_model->find_data('sms_site_settings', 'row');
		$data['metadetails'] 		= $this->common_model->find_data('metadetails', 'array');
		$data['title'] 				= $title . '-' . $data['site_setting']->site_name;
		$data['page_header'] 		= $title;

		/** testimonials & accreditations **/

		// $orderBy[0] = ['field' => 'created_at', 'type' => 'DESC'];
		$data['testimonials'] 		= $this->common_model->find_data('sms_testimonials', 'array', ['published' => 1]);
		$data['accreditations']     = $this->common_model->find_data('accreditations', 'array', ['published' => 1]);
		/** testimonials & accreditations **/
		$orderBy[0] 				= ['field' => 'id', 'type' => 'DESC'];
		$data['blogs']              = $this->common_model->find_data('blogs', 'array', ['status' => 1], '', '', '', $orderBy);
		$data['clients']            = $this->common_model->find_data('sms_client', 'array', ['published' => 1]);
		$data['testimonials']       = $this->common_model->find_data('sms_testimonials', 'array', ['published' => 1]);
		$data['commodities']        = $this->common_model->find_data('commodities', 'array', ['published' => 1]);
		$data['countries']        	= $this->common_model->find_data('sms_countries', 'array', ['published' => 1]);
		// pr($data['countries']);


		$data['head'] 				= view('front/elements/head', $data);
		$data['menu'] 				= view('front/elements/menu', $data);
		$data['header'] 			= view('front/elements/header', $data);
		$data['testimonialbox'] 	= view('front/elements/testimonialbox', $data);
		$data['clientbox'] 			= view('front/elements/clientbox', $data);
		$data['feature'] 			= view('front/elements/features', $data);
		$data['enquiry'] 			= view('front/elements/enquiry', $data);
		$data['footer'] 			= view('front/elements/footer', $data);
		$data['maincontent'] 		= view('front/pages/' . $page_name, $data);

		return view('front/layout-front', $data);
	}
	public function layout_after_login_front($title, $page_name, $data)
	{
		$data['session'] = \Config\Services::session();
		$data['common_model'] = new CommonModel;

		$data['uri'] = new \CodeIgniter\HTTP\URI();
		if ($this->request->uri->getSegment(1) == 'provider') {
			$data['provider'] = $this->request->uri->getSegment(2);
		} else {
			$data['provider'] = "";
		}

		$data['site_setting'] = $this->common_model->find_data('sms_site_settings', 'row');
		$data['title'] = $title . '-' . $data['site_setting']->site_name;
		$data['page_header'] = $title;

		$order_by[0]  = array('field' => 'category_name', 'type' => 'asc');
		$conditions = array('parent_id' => 0, 'published' => 1);
		$data['main_cats'] = $this->common_model->find_data('sms_category', 'array', $conditions, '', '', '', $order_by);

		$order_by[0]  = array('field' => 'category_name', 'type' => 'asc');
		$conditions = array('parent_id>' => 0, 'published' => 1);
		$data['sub_cat_footers'] = $this->common_model->find_data('sms_category', 'array', $conditions, '', '', '', $order_by);

		$data['head'] = view('front/elements/head', $data);
		$data['header'] = view('front/elements/header', $data);
		$data['left_sidebar'] = view('front/elements/left-sidebar', $data);
		$data['footer'] = view('front/elements/footer', $data);
		$data['maincontent'] = view('front/pages/' . $page_name, $data);
		return view('front/layout-after-login-front', $data);
	}
	public function alert_success_message($sessionParam)
	{
		$session = \Config\Services::session();
		$msg = $session->getFlashdata('success_message');
		$return_msg = '<div class="alert alert-success">' . $msg . '</div>';
		return $return_msg;
	}
	public function alert_error_message($sessionParam)
	{
		$session = \Config\Services::session();
		$msg = $session->getFlashdata('error_message');
		$return_msg = '<div class="alert alert-danger">' . $msg . '</div>';
		return $return_msg;
	}


	public function sendEmail($email, $subject, $body)
	{
		$email = \Config\Services::email();
		$email->setTo($email);
		$email->setFrom('website@victoria.keylines.net.in', 'Victoria Travels');
		$email->setSubject($subject);
		$email->setMessage($body);

		// Send Email
		if ($email->send()) {
			return true;
			// echo 'Email sent successfully';
		} else {
			return false;
			// echo $email->printDebugger();
		}
	}


	function verifyRecaptcha($recaptchaToken)
	{
		// Initialize cURL session
		$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');

		// Set cURL options
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, [
			'secret' => SECRET_KEY,
			'response' => $recaptchaToken,
		]);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Execute cURL session
		$result = curl_exec($ch);

		// Close cURL session
		curl_close($ch);

		// Decode JSON response
		$response = json_decode($result, true);

		// Return verification result
		return isset($response['success']) ? $response['success'] : false;
	}


	protected function send()
	{
		// Include Composer's autoloader
		// require 'vendor/autoload.php';

		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp-relay.brevo.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'victoriatravelskdpl@gmail.com';                     //SMTP username
			$mail->Password   = 'My5XaC1cn2EpP8Is';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('no-replay@victoriatravels.com', 'Victoria Travels');
			$mail->addAddress('shubhasinha77@gmail.com', 'shubha');     //Add a recipient
			// $mail->addAddress('ellen@example.com');               //Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}
