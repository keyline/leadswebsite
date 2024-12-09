<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\MainModel;
use App\Services\EmailService;
use DB;
use Config\Services;
use App\Helpers\SmtpMail;

class Frontend extends BaseController
{
    protected $emailService;

    public function __construct()
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $this->emailService = new EmailService();
    }

    private function getCategoryNamesByIds($mainArray, $idArray)
    {

        $names = [];

        // Loop through each id in the idArray
        foreach ($idArray as $id) {
            // Search for the object with the matching id in the mainArray
            foreach ($mainArray as $item) {
                if ($item->id == $id) {
                    // Add the name to the names array
                    $names[] = $item->name;
                    break; // Stop looping once the id is found
                }
            }
        }

        // Return the array of names
        return $names;
    }


    private function findKeyBySlug($array, $slug)
    {
        foreach ($array as $key => $value) {
            if (stripos($value, $slug) !== false) {
                return $key;
            }
        }
        return null; // Return null if no match is found
    }


    private function getNewBlogs($limit = 0, $category_id = 0, $blogId = 0)
    {

        $join = [
            [
                'table' => 'blog_category',
                'table_master' => 'blogs',
                'field' => 'id',  // blog_categories.id
                'field_table_master' => 'blog_category',  // blogs.category_id
                'type' => 'inner'
            ]
        ];
        // Initialize conditions array
        $conditions = ['status' => 1];

        // Apply category filter if provided
        if ($category_id) {
            $conditions['blog_category'] = $category_id;
        }

        // Exclude specific blog ID if provided
        if ($blogId) {
            $conditions['blogs.id !='] = $blogId; // Exclude this blog ID
        }
        $select = 'blogs.*, blog_category.name AS category_name';
        $order_by = [['field' => 'blogs.content_date', 'type' => 'DESC']];

        $latestBlogs = $this->common_model->find_data(
            'blogs',             // Table name
            'array',             // Return type as array
            $conditions,                  // No specific conditions (get all)
            $select,             // Select columns
            $join,               // Join with blog_categories table
            '',                  // No grouping
            $order_by,           // Order by created_at in descending order
            $limit               // Limit to last 3 entries
        );

        // Display the result
        return $latestBlogs;
        // dd($latestBlogs);
    }

    private function getBlogBySlug($slug)
    {
        $join = [
            [
                'table' => 'blog_category',
                'table_master' => 'blogs',
                'field' => 'id',  // blog_category.id
                'field_table_master' => 'blog_category',  // blogs.category_id
                'type' => 'inner'
            ]
        ];

        // Set conditions to filter by blog ID and status
        $conditions = ['blogs.slug' => $slug, 'status' => 1];
        $select = 'blogs.*, blog_category.name AS category_name';
        $order_by = [];
        $limit = 1; // Limit to 1 entry

        // Retrieve the blog by ID
        $blog = $this->common_model->find_data(
            'blogs',             // Table name
            'row',               // Return type as a single row
            $conditions,        // Conditions to filter blogs
            $select,            // Select columns
            $join,              // Join with blog_category table
            '',                 // No grouping
            $order_by,          // No ordering
            $limit              // Limit to 1 entry
        );

        // Return the result
        return $blog; // This will return a single blog row or null if not found
    }

    private function moreBlogs($offset = 0, $limit = 6, $category_id = null, $blogId = null)
    {
        $join = [
            [
                'table' => 'blog_category',
                'table_master' => 'blogs',
                'field' => 'id',  // blog_category.id
                'field_table_master' => 'blog_category',  // blogs.category_id
                'type' => 'inner'
            ]
        ];

        $conditions = ['status' => 1];

        if ($category_id) {
            $conditions['blogs.blog_category'] = $category_id;
        }

        if ($blogId) {
            $conditions['blogs.id !='] = $blogId;
        }

        $select = 'blogs.*, blog_category.name AS category_name';
        $order_by = [['field' => 'blogs.content_date', 'type' => 'DESC']];

        $latestItems = $this->common_model->find_data(
            'blogs',
            'array',
            $conditions,
            $select,
            $join,
            '',
            $order_by,
            $limit,
            $offset
        );

        return $latestItems;
    }



    public function index()
    {
        $data                       = [];

        $title                      = 'Home';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'index';
        $order_by[0]                = array('field' => 'sort', 'type' => 'asc');
        $data['product_category']   = $this->common_model->find_data('product_category', 'array', ['published' => 1], '', '', '', $order_by);
        //  pr($data['product_category']);

        $data['blogs']              = $this->getNewBlogs(3);

        $condition = ['published' => 1, 'show_on_frontend' => 1];

        $orderBy[0] = ['field' => 'created_at', 'type' => 'DESC'];

        $packageDtl = $this->common_model->find_data('package', 'array', $condition, '*', '', '', $orderBy, 9);


        $data['homepageBlogs']      = count($data['blogs']) ? view('front/elements/homepageBlogs', $data) : '';


        foreach ($packageDtl as $pkg) {

            $additionalImg = [];

            $additional_images = json_decode($pkg->additional_images_titles);

            /* add img path for additional images */

            foreach ($additional_images as $images)

                $additionalImg[] = base_url() . '/uploads/package/' . $images;



            $data['packages'][] = [

                'package_id'          => $pkg->id,

                'package_name'        => $pkg->package_name,

                'feature_img'         => base_url() . '/uploads/package/' . $pkg->feature_image,

                'banner_image'        => base_url() . '/uploads/package/' . $pkg->banner_image,

                'day_night'           => $pkg->day_night,

                'person'              => $pkg->person,

                'price'               => number_format($pkg->package_price),

                'heading_one'         => $pkg->description_heading,

                'heading_two'         => $pkg->description2_heading,

                'heading_one_points'  => json_decode($pkg->description_points),

                'heading_two_points'  => json_decode($pkg->description2_points),

                'additional_img_title' => $additionalImg,

                'country_name'        => $pkg->country_name,

            ];
        }



        // endforeach;



        echo $this->front_layout($title, $page_name, $data);
    }



    public function about()
    {

        $title                      = 'About';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'about';

        $data['certificates']          = $this->common_model->find_data('certificate_images', 'array', ['published' => 1]);
        $data['setting']          = $this->common_model->find_data('about_setting', 'row');

        echo $this->front_layout($title, $page_name, $data);
    }

    public function distributor()
    {

        $title                      = 'Become A Distributor';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'become_a_distributor';
        $data['productcat']         = $this->common_model->find_data('product_category', 'array', ['published' => 1]);
        $data['file']             = $this->common_model->find_data('download', 'row', ['name' => 'E-catalog Download']);
        echo $this->front_layout($title, $page_name, $data);
    }

    public function distributorenquiry()
    {

        if ($this->request->getMethod() === 'post') {

            $postData = $this->request->getPost();

            $rules = [
                'name'    => 'required|min_length[3]|max_length[255]|alpha_space',
                'phone_number'  => 'required|numeric|min_length[10]|max_length[15]|regex_match[/^[0-9]+$/]',
                'email'   => 'required|valid_email',
                // 'city'    => 'required|min_length[3]|max_length[255]|alpha_space',
                // 'message' => 'required|min_length[3]|max_length[1000]|regex_match[/^(?!.*<script.*>).*$/i]',
                'page_name' => 'required',
                'recaptcha_token' => 'required',
                'g-recaptcha-response' => 'required',
            ];

            if (!$this->validate($rules)) {
                // return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
                return $this->response->setStatusCode(200) // Bad Request
                    ->setJSON(['status' => false, 'message' => 'Enter valid inputs', 'errors' => $this->validator->getErrors()]);
            } else if ($this->verifyRecaptcha($_POST['recaptcha_token'])) {

                $this->common_model = new CommonModel();

                $data = [
                    'name' => $postData['name'],
                    'email' => $postData['email'],
                    'phone' => $postData['phone_number'],
                    'city' => $postData['city'],
                    'business_name' => $postData['business_name'],
                    'product_interest' => $postData['product_interest'],
                    'comment' => $postData['message'],
                    'organisation' => $postData['page_name'],
                ];

                $insert_id = $this->common_model->save_data('sms_contact_enquiry', $data);

                if ($insert_id) {
                    return $this->response->setStatusCode(201) // Created
                        ->setJSON(['status' => true, 'message' => 'Request sent successfully']);
                }
            } else {
                return $this->response->setStatusCode(200) // Created
                    ->setJSON(['status' => false, 'message' => 'reCAPTCHA verification failed. Please try again.']);
            }
        }
    }

    public function returnPolicy()
    {
        $title                      = 'Return Policy';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'return_policy';
        $data['setting']          = $this->common_model->find_data('about_setting', 'row');
        echo $this->front_layout($title, $page_name, $data);
    }
    public function amcPolicy()
    {
        $title                      = 'AMC Policy';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'amc_policy';
        $data          = [];
        echo $this->front_layout($title, $page_name, $data);
    }

    public function blog()
    {

        $title                      = 'Blog';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'blog-list';

        $data['recentBlog']         = $this->getNewBlogs(3);
        $data['Blog_count']         = $this->getNewBlogs();

        echo $this->front_layout($title, $page_name, $data);
    }

    public function product($category)
    {
        $title                      = 'Product';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'product-list';
        $data['productCat']         = $this->common_model->find_data('product_category', 'row', ['slug' => $category]);

        $offset = $this->request->getPost('offset') ?? 0;
        $limit = 4;
        $orderBy[0] = ['field' => 'regular_price', 'type' => 'DESC'];
        $data['product'] = $this->common_model->find_data('product', 'array', ['published' => 1, 'product_category' => $data['productCat']->id], '', '', '', $orderBy, $limit, $offset,);
        $data['product_count'] = $this->common_model->find_data('product', 'array', ['published' => 1, 'product_category' => $data['productCat']->id]);

        foreach ($data['product'] as &$product) {
            $product->others_images = $this->common_model->find_data('product_others_image', 'array', ['published!=' => 3, 'product_id' => $product->id]);
        }
        // Uncomment to check the results

        // Return products in JSON format if AJAX request
        if ($this->request->isAJAX()) {
            //  pr(json_encode($data['product']));
            return json_encode($data['product']);
        }
        echo $this->front_layout($title, $page_name, $data);
    }

    public function product_details($slug)
    {

        $title                      = 'Product';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'product-details';
        $data['product']         = $this->common_model->find_data('product', 'row', ['slug' => $slug]);
        $limit = 5; // Number of products per batch
        $data['relatedProduct']  = $this->common_model->find_data('product', 'array', ['published' => 1, 'id!=' => $data['product']->id, 'product_category' => $data['product']->product_category], '', '', '', '', $limit);
        $data['productCat']         = $this->common_model->find_data('product_category', 'row', ['id' => $data['product']->product_category]);
        //   pr($data['product'] );
        $data['others_images'] = $this->common_model->find_data('product_others_image', 'array', ['published!=' => 3, 'product_id' => $data['product']->id]);
        //  pr($data['others_images'] );        

        echo $this->front_layout($title, $page_name, $data);
    }



    public function loadMoreBlog()
    {
        $page = $this->request->getGet('page');
        $perPage = 3; // Number of items to load per request
        $offset = ($page - 1) * $perPage;

        // Fetch data from the database
        $data = $this->moreBlogs($offset, $perPage);

        // Start output buffering
        ob_start();

        foreach ($data as $blog) { ?>
            <div class="col-md-4">
                <div class="blog_list_item">
                    <a href="<?= base_url('blog-details/' . $blog->slug); ?>">
                        <div class="blogitem_img">
                            <img src="<?= base_url('uploads/') ?>/blogs/<?= $blog->image ?>" alt="Professional Career Counseling: Advancing in Your Career" style="height: 300px;">
                        </div>
                        <div class="blogitem_detials">
                            <ul class="blogitem_cat">
                                <li><?= $blog->category_name ?></li>
                            </ul>
                            <p class="u-text-p8 u-mb-sm u-mt-md u-text-gray-700">
                                <span class="ps-2"><?= (new \DateTime($blog->content_date))->format('M j, Y') ?></span> | <span class="ps-2"><?= $blog->post_by ?></span> | <span class="pe-2"><?= (new \DateTime($blog->created_at))->format('h.m A') ?></span>
                            </p>
                            <h3><?= truncateText($blog->title, 50) ?></h3>
                            <p class="shortdes"><?= truncateText($blog->short_description, 70) ?></p>
                            <a href="<?= base_url('blog-details/' . $blog->slug); ?>">Read More</a>
                        </div>
                    </a>
                </div>
            </div>
<?php }

        // Get the contents of the buffer and clean it
        $html = ob_get_clean();


        // Prepare the response
        return $this->response->setJSON([
            'status' => !empty($html),
            'html' => $html
        ]);
    }




    public function blog_details($slug)
    {

        $title                      = 'Blog Details';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'blog-details';

        $data['blog']               = $this->getBlogBySlug($slug);

        $data['recentBlog']         = $this->getNewBlogs(6);

        $data['relatedBlogs']         = $this->getNewBlogs(0, $data['blog']->blog_category, $data['blog']->id);

        $data['blog_contents']           = !is_null($data['blog']) ? $this->common_model->find_data('blog_contents', 'array', ['blog_id' => $data['blog']->id]) : [];

        echo $this->front_layout($title, $page_name, $data);
    }




    private function getMediaFiles($category_id = 0, $media_id = null)
    {
        // Initialize the join condition array
        $join = [
            [
                'table' => 'media_file',              // The table to join
                'table_master' => 'media',            // The main table
                'field' => 'media_id',                // media_file.media_id
                'field_table_master' => 'id',         // media.id
                'type' => 'inner'
            ]
        ];

        // Initialize conditions array
        $conditions = ['media.published' => 1];

        $returnType = 'array';

        // Apply category filter if provided
        if ($category_id) {
            $conditions['media.category_id'] = $category_id; // Filter by category_id if given
            $returnType = 'array';
        }

        // Apply media_id filter if provided
        if ($media_id) {
            $conditions['media.id'] = $media_id; // Filter by media.id if given
            $returnType = 'row';
        }

        // Define the fields you want to select
        $select = 'media.*, media_file.file, media_file.youtube_link';

        // Define the order by field
        $order_by = [['field' => 'media.added_on', 'type' => 'DESC']];

        // Fetch the data using the common_model
        $mediaFiles = $this->common_model->find_data(
            'media',             // Table name
            $returnType,             // Return type as array
            $conditions,         // Conditions for filtering
            $select,             // Select columns
            $join,               // Join with categories and media_file
            '',                  // No grouping
            $order_by
        );

        // Return the result
        return $mediaFiles;
    }


    public function media($slug)
    {

        $slug                       = htmlspecialchars($slug, ENT_QUOTES, 'UTF-8');

        $data['category_id']        = $this->findKeyBySlug(MEDIA_CATEGORIES, $slug);

        $data['title']              = !is_null($data['category_id']) ? MEDIA_CATEGORIES[$data['category_id']] : 'Media';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'media-list';

        $data['mediaList']               = $this->getMediaFiles($data['category_id']);

        echo $this->front_layout($data['title'], $page_name, $data);
    }


    public function page($slug)
    {

        $slug                       = htmlspecialchars($slug, ENT_QUOTES, 'UTF-8');

        $data['content']            = $this->common_model->find_data('content_page', 'row', ['slug' => $slug]);

        $data['title']              = $data['content']->title;

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'content-page';

        echo $this->front_layout($data['title'], $page_name, $data);
    }


    public function career()
    {


        $data['title']              = 'Career';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'career-list';

        $data['vacancy']          = $this->common_model->find_data('sms_career', 'array', ['published' => 1]);

        echo $this->front_layout($data['title'], $page_name, $data);
    }


    public function allied_services()

    {

        $data                       = [];

        $title                      = 'Allied services';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'allied-services';

        echo $this->front_layout($title, $page_name, $data);
    }





    public function privacypolicy()

    {

        $data                       = [];

        $title                      = 'Mice';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'privacypolicy';

        echo $this->front_layout($title, $page_name, $data);
    }




    public function contact_us()
    {
        $data                       = [];

        $title                      = 'Contact Us';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'contact-us';

        echo $this->front_layout($title, $page_name, $data);
    }

    public function enquiry()
    {

        if ($this->request->getMethod() === 'post') {

            $postData = $this->request->getPost();

            $rules = [
                'name'    => 'required|min_length[3]|max_length[255]|alpha_space',
                'number'  => 'required|numeric|min_length[10]|max_length[15]|regex_match[/^[0-9]+$/]',
                'email'   => 'required|valid_email',
                'city'    => 'required|min_length[3]|max_length[255]|alpha_space',
                'message' => 'required|min_length[3]|max_length[1000]|regex_match[/^(?!.*<script.*?>).*$/i]',
                'page_name' => 'required',
                'recaptcha_token' => 'required',
                'g-recaptcha-response' => 'required',
            ];

            if (!$this->validate($rules)) {
                // return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
                return $this->response->setStatusCode(200) // Bad Request
                    ->setJSON(['status' => false, 'message' => 'Enter valid inputs', 'errors' => $this->validator->getErrors()]);
            } else if ($this->verifyRecaptcha($_POST['recaptcha_token'])) {

                $this->common_model = new CommonModel();

                $data = [
                    'name' => $postData['name'],
                    'email' => $postData['email'],
                    'phone' => $postData['number'],
                    'city' => $postData['city'],
                    'comment' => $postData['message'],
                    'organisation' => $postData['page_name'],
                ];

                $insert_id = $this->common_model->save_data('sms_contact_enquiry', $data);

                if ($insert_id) {
                    return $this->response->setStatusCode(201) // Created
                        ->setJSON(['status' => true, 'message' => 'Request sent successfully']);
                }
            } else {
                return $this->response->setStatusCode(200) // Created
                    ->setJSON(['status' => false, 'message' => 'reCAPTCHA verification failed. Please try again.']);
            }
        }
    }


    public function job_apply()
    {
        if ($this->request->getMethod() === 'post') {

            $postData = $this->request->getPost();


            $rules = [
                'fname' => [
                    'rules' => 'required|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'First Name'
                ],
                'lname' => [
                    'rules' => 'required|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Last Name'
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'label' => 'Email Address'
                ],
                'phone' => [
                    'rules' => 'required|numeric|regex_match[/^[0-9]+$/]',
                    'label' => 'Phone Number'
                ],
                'qualification' => [
                    'rules' => 'required|min_length[3]|max_length[255]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Qualification'
                ],
                'experience' => [
                    'rules' => 'regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Experience'
                ],
                'job' => [
                    'rules' => 'required',
                    'label' => 'Job Position'
                ],
                // 'file' => [
                //     'rules' => 'required',
                //     'label' => 'CV'
                // ],
                'recaptcha_token' => 'required',
                'g-recaptcha-response' => 'required',
            ];

            if (!$this->validate($rules)) {
                return $this->response->setStatusCode(200) // Bad Request
                    ->setJSON(['status' => false, 'message' => 'Enter valid inputs', 'errors' => $this->validator->getErrors()]);
            } else if ($this->verifyRecaptcha($_POST['recaptcha_token'])) {
                /* pdf upload */
                $file = $this->request->getFile('file');
                $originalName = $file->getClientName();
                $fileMimeType = $file->getClientMimeType();
                $fieldName = 'file';
                if (($fileMimeType == 'application/pdf') && $originalName != '') {
                    $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'applicantCv', 'pdf');
                    if ($upload_array['status']) {
                        $applicantCv = $upload_array['newFilename'];
                    } else {
                        return $this->response->setStatusCode(200)
                            ->setJSON(['status' => false, 'message' => $upload_array['message']]);
                    }
                } else {
                    return $this->response->setStatusCode(200) // Created
                        ->setJSON(['status' => false, 'message' => 'Please upload a pdf file']);
                }

                /* pdf upload */

                $this->common_model = new CommonModel();

                $data = [
                    'first_name' => $postData['fname'],
                    'last_name' => $postData['lname'],
                    'email' => $postData['email'],
                    'phone' => $postData['phone'],
                    'qualification' => $postData['qualification'],
                    'experience' => $postData['experience'],
                    'job_id' => $postData['job'],
                    'cv_file' => $applicantCv,
                ];

                $insert_id = $this->common_model->save_data('job_applicant', $data);

                if ($insert_id) {

                    $body = view('Views/front/mail_template/jobapply-templete', $data);

                    $this->sendToAdmin('Job apply', $body, 'admin', 'Leadsindia');

                    return $this->response->setStatusCode(201) // Created
                        ->setJSON(['status' => true, 'message' => 'Apply successfully']);
                }
            } else {
                return $this->response->setStatusCode(200) // Created
                    ->setJSON(['status' => false, 'message' => 'reCAPTCHA verification failed. Please try again.']);
            }
        }
    }



    public function service_request()
    {

        $data                       = [];

        $title                      = 'Service Request';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'service-request';

        $data['productCategory']    = $this->common_model->find_data('product_category', 'array', ['published' => 1]);


        if ($this->request->getMethod() === 'post') {

            $postData = $this->request->getPost();

            $rules = [
                'name' => [
                    'rules' => 'required|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Name'
                ],
                'address' => [
                    'rules' => 'required|min_length[3]|max_length[255]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Address'
                ],
                'landmark' => [
                    'rules' => 'permit_empty|min_length[3]|max_length[255]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Landmark'
                ],
                'district' => [
                    'rules' => 'max_length[100]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'District'
                ],
                'state' => [
                    'rules' => 'max_length[100]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'State'
                ],
                'phone' => [
                    'rules' => 'required|numeric|regex_match[/^[0-9]{10,15}$/]',
                    'label' => 'Phone Number'
                ],
                'product_category_id' => [
                    'rules' => 'required',
                    'label' => 'Product Category'
                ],
                'model_name' => [
                    'rules' => 'required|min_length[2]|max_length[100]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Model Name'
                ],
                'serial_no' => [
                    'rules' => 'required|permit_empty|regex_match[/^[\w\-]+$/]',
                    'label' => 'Serial Number'
                ],
                'installation_date' => [
                    'rules' => 'required|valid_date[Y-m-d]',
                    'label' => 'Installation Date'
                ],
                'purchase_date' => [
                    'rules' => 'required|valid_date[Y-m-d]',
                    'label' => 'Purchase Date'
                ],
                'dealer_name' => [
                    'rules' => 'permit_empty|min_length[2]|max_length[255]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Dealer Name'
                ],
                'dealer_phone' => [
                    'rules' => 'permit_empty|numeric|regex_match[/^[0-9]{10,15}$/]',
                    'label' => 'Dealer Phone Number'
                ],
                'work_as' => [
                    'rules' => 'permit_empty',
                    'label' => 'Work As'
                ],
                'comments' => [
                    'rules' => 'permit_empty|max_length[1000]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Comments'
                ],
            ];


            if (!$this->validate($rules)) {
                $this->session->setFlashdata('errors', $this->validator->getErrors());
                // return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            } else if ($this->verifyRecaptcha($_POST['recaptcha_token'])) {
                $this->common_model = new CommonModel();

                $formData = [
                    'name' => $postData['name'],
                    'address' => $postData['address'],
                    'landmark' => $postData['landmark'],
                    'district' => $postData['district'],
                    'state' => $postData['state'],
                    'phone' => $postData['phone'],
                    'product_id' => json_encode($postData['product_category_id']),
                    'model_name' => $postData['model_name'],
                    'serial_no' => $postData['serial_no'],
                    'installation_date' => $postData['installation_date'],
                    'purchase_date' => $postData['purchase_date'],
                    'dealer_name' => $postData['dealer_name'],
                    'dealer_phone' => $postData['dealer_phone'],
                    'comments' => $postData['comments'],
                    'interested' => $postData['work_as'] ?? '',
                ];

                $insert_id = $this->common_model->save_data('service_request', $formData);

                if ($insert_id) {

                    $formData['products'] = $this->getCategoryNamesByIds($data['productCategory'], $postData['product_category_id']);

                    $body = view('Views/front/mail_template/equerry-templete', $formData);

                    $this->sendToAdmin('Service Request', $body, 'service', 'Leadsindia');

                    $this->session->setFlashdata('success_message', 'Request send successfully');
                }
            } else {
                $this->session->setFlashdata('error_message', 'reCAPTCHA verification failed. Please try again.');
            }
        }



        echo $this->front_layout($title, $page_name, $data);
    }


    public function amc_request()
    {

        $data                       = [];

        $title                      = 'AMC Request';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'amc-request';

        $data['productCategory']    = $this->common_model->find_data('product_category', 'array', ['published' => 1]);

        if ($this->request->getMethod() === 'post') {

            $postData = $this->request->getPost();

            $rules = [
                'name' => [
                    'rules' => 'required|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Name'
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'label' => 'Email'
                ],
                'product_id' => [
                    'rules' => 'required',
                    'label' => 'Product'
                ],
                'comments' => [
                    'rules' => 'permit_empty|max_length[1000]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Comments'
                ],
            ];


            if (!$this->validate($rules)) {
                $this->session->setFlashdata('errors', $this->validator->getErrors());
                // return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

            } else if ($this->verifyRecaptcha($_POST['recaptcha_token'])) {
                $this->common_model = new CommonModel();

                $formData = [
                    'name'           => $postData['name'],
                    'email'          => $postData['email'],
                    'special_enquiry' => $postData['product_id'],
                    'comment'        => $postData['comments'],
                    'enquiry_type'   => 'ENQUIRY'
                ];

                $insert_id = $this->common_model->save_data('sms_contact_enquiry', $formData);

                if ($insert_id) {
                    $this->session->setFlashdata('success_message', 'Request send successfully');
                }
            } else {
                $this->session->setFlashdata('error_message', 'reCAPTCHA verification failed. Please try again.');
            }
        }

        echo $this->front_layout($title, $page_name, $data);
    }


    public function amc_submit()
    {
        if ($this->request->getMethod() === 'post') {

            $postData = $this->request->getPost();

            $rules = [
                'name' => [
                    'rules' => 'required|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Name'
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'label' => 'Email'
                ],
                'product_id' => [
                    'rules' => 'required',
                    'label' => 'Product'
                ],
                'comments' => [
                    'rules' => 'required|permit_empty|max_length[1000]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Comments'
                ],
            ];

            if (!$this->validate($rules)) {
                return $this->response->setStatusCode(200) // Bad Request
                    ->setJSON(['status' => false, 'message' => 'Enter valid inputs', 'errors' => $this->validator->getErrors()]);
            } else if ($this->verifyRecaptcha($_POST['recaptcha_token'])) {

                $this->common_model = new CommonModel();

                $formData = [
                    'name'           => $postData['name'],
                    'email'          => $postData['email'],
                    'special_enquiry' => $postData['product_id'],
                    'comment'        => $postData['comments'],
                    'enquiry_type'   => 'ENQUIRY'
                ];

                $insert_id = $this->common_model->save_data('sms_contact_enquiry', $formData);

                if ($insert_id) {

                    // $body = view('Views/front/mail_template/jobapply-templete', $formData);

                    // $this->sendToAdmin('Job apply', $body, 'admin', 'Leadsindia');

                    return $this->response->setStatusCode(201) // Created
                        ->setJSON(['status' => true, 'message' => 'Request send successfully']);
                }
            } else {
                return $this->response->setStatusCode(200) // Created
                    ->setJSON(['status' => false, 'message' => 'reCAPTCHA verification failed. Please try again.']);
            }
        }
    }


    public function get_products()
    {
        $postData = $this->request->getPost();
        $products = [];

        if ($postData['product_id'] != '') {
            $products    = $this->common_model->find_data('product', 'array', ['product_category' => $postData['product_id']], ['id', 'product_title']);
        }
        // Prepare the response
        return $this->response->setJSON([
            'status' => true,
            'product' => $products
        ]);
    }


    public function product_registration()
    {

        $data                       = [];

        $title                      = 'Product Registration';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'product_registration';

        $order_by = [['field' => 'sort', 'type' => 'ASC']];

        $data['productCategory']    = $this->common_model->find_data('product_category', 'array', ['published' => 1], '', '', '', $order_by);


        if ($this->request->getMethod() === 'post') {

            $postData = $this->request->getPost();

            $rule = [
                'full_name' => [
                    'rules' => 'required|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Name'
                ],
                'email_address' => [
                    'rules' => 'required|valid_email|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Email'
                ],
                'phone_number' => [
                    'rules' => 'required|numeric|regex_match[/^[0-9]{10,15}$/]',
                    'label' => 'Phone Number'
                ],
                'street_address' => [
                    'rules' => 'permit_empty|min_length[3]|max_length[255]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Street Address'
                ],
                'city' => [
                    'rules' => 'permit_empty|min_length[3]|max_length[255]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'City'
                ],
                'state' => [
                    'rules' => 'permit_empty|max_length[100]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'State'
                ],
                'zip_code' => [
                    'rules' => 'permit_empty|min_length[6]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Zip code'
                ],
                'country' => [
                    'rules' => 'permit_empty|min_length[2]|max_length[100]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Country'
                ],
                'product_type' => [
                    'rules' => 'permit_empty',
                    'label' => 'Product type'
                ],
                'model_number' => [
                    'rules' => 'permit_empty',
                    'label' => 'Model number'
                ],
                'serial_number' => [
                    'rules' => 'required',
                    'label' => 'Serial Number'
                ],
                'date_of_purchase' => [
                    'rules' => 'permit_empty|valid_date[Y-m-d]',
                    'label' => 'Purchase Date'
                ],
                'place_of_purchase' => [
                    'rules' => 'permit_empty|min_length[2]|max_length[255]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Dealer Name'
                ],
                'invoice_number' => [
                    'rules' => 'permit_empty|min_length[2]|max_length[255]|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Invoice Number'
                ],

                'purchase_invoice' => [
                    'rules' => 'max_size[purchase_invoice,1024]|mime_in[purchase_invoice,application/pdf,image/jpg,image/jpeg,image/png]',
                    'label' => 'Purchase Invoice'
                ],
                'barcode_photo' => [
                    'rules' => 'max_size[barcode_photo,1024]|mime_in[barcode_photo,image/jpg,image/jpeg,image/png]',
                    'label' => 'Barcode Photo'
                ]

                // 'recaptcha_token' => [
                //     'rules' => 'required',
                //     'label' => 'Captcha token'
                // ],
            ];

            if (!$this->validate($rule)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
                // 
            } else if ($this->verifyRecaptcha($_POST['recaptcha_token'])) {
                $this->common_model = new CommonModel();
                $purchase_invoice = $barcode_photo = null;

                /* image upload */

                $purchase_invoice =  $this->uploadFile('purchase_invoice', 'purchase_invoice');

                $barcode_photo = $this->uploadFile('barcode_photo', 'barcode_photo');

                /* image upload */

                $formData = [
                    'full_name' => $postData['full_name'],
                    'email_address' => $postData['email_address'],
                    'phone_number' => $postData['phone_number'],
                    'street_address' => $postData['street_address'],
                    'city' => $postData['city'],
                    'state' => $postData['state'],
                    'zip_code' => $postData['zip_code'],
                    'country' => $postData['country'],
                    'product_type' => $postData['product_type'],
                    'model_number' => $postData['model_number'],
                    'serial_number' => $postData['serial_number'],
                    'date_of_purchase' => $postData['date_of_purchase'],
                    'place_of_purchase' => $postData['place_of_purchase'],
                    'invoice_number' => $postData['invoice_number'],
                    'purchase_invoice_file' => $purchase_invoice,
                    'barcode_photo_file' => $barcode_photo
                ];

                $insert_id = $this->common_model->save_data('product_registration', $formData);

                if ($insert_id) {
                    foreach ($data['productCategory'] as $item) {
                        if ($item->id == $postData['product_type']) {
                            $formData['products'] = $item->name;
                            break;
                        }
                    }

                    $body = view('Views/front/mail_template/registration-templete', $formData);

                    $this->sendToAdmin('Registration Request', $body, 'service', 'Leadsindia');

                    $this->session->setFlashdata('success_message', 'Request send successfully');
                }
            } else {
                $this->session->setFlashdata('error_message', 'reCAPTCHA verification failed. Please try again.');
            }
        }

        echo $this->front_layout($title, $page_name, $data);
    }

    public function offer()
    {

        $data                       = [];

        $title                      = 'Offer';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'offer';

        if ($this->request->getMethod() === 'post') {

            $postData = $this->request->getPost();
            // pr($postData);        

            $rule = [
                'full_name' => [
                    'rules' => 'required|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Name'
                ],
                'email_address' => [
                    'rules' => 'required|valid_email|regex_match[/^(?!.*<script.*?>).*$/i]',
                    'label' => 'Email'
                ],
                'phone_number' => [
                    'rules' => 'required|numeric|regex_match[/^[0-9]{10,15}$/]',
                    'label' => 'Phone Number'
                ]                

                // 'recaptcha_token' => [
                //     'rules' => 'required',
                //     'label' => 'Captcha token'
                // ],
            ];

            if (!$this->validate($rule)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
                // 
            } else if ($this->verifyRecaptcha($_POST['recaptcha_token'])) {
                $this->common_model = new CommonModel();
                /*promocode generate*/
                // Generate a random 6-character alphanumeric string
                $random_str = strtoupper(bin2hex(random_bytes(3)));
                // Combine prefix and random string
                $promo_code = 'Lead' . $random_str;
                /*promocode generate*/

                $formData = [
                    'full_name' => $postData['full_name'],
                    'email_address' => $postData['email_address'],
                    'phone_number' => $postData['phone_number'] ,
                    'promo_code'   => $promo_code                   
                ];
                pr($formData);

                $insert_id = $this->common_model->save_data('product_registration', $formData);

                if ($insert_id) {
                    foreach ($data['productCategory'] as $item) {
                        if ($item->id == $postData['product_type']) {
                            $formData['products'] = $item->name;
                            break;
                        }
                    }

                    $body = view('Views/front/mail_template/registration-templete', $formData);

                    $this->sendToAdmin('Registration Request', $body, 'service', 'Leadsindia');

                    $this->session->setFlashdata('success_message', 'Request send successfully');
                }
            } else {
                $this->session->setFlashdata('error_message', 'reCAPTCHA verification failed. Please try again.');
            }
        }

        echo $this->front_layout($title, $page_name, $data);
    }



    private function uploadFile($fieldName, $folder)
    {
        // Get the uploaded file from the request dynamically using the provided field name
        $file = $this->request->getFile($fieldName);

        // Check if the file is valid (uploaded)
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $originalName = $file->getClientName(); // Get the original name of the file

            // Determine the file type based on the file's MIME type or extension
            $fileType = 'image'; // Default to image
            $mimeType = $file->getMimeType();

            if ($mimeType === 'application/pdf' || strtolower($file->getExtension()) === 'pdf') {
                $fileType = 'pdf'; // If the file is a PDF, set the type to pdf
            }

            // Call your custom method to handle file upload, passing dynamic parameters
            $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, $folder, $fileType);

            if ($upload_array['status']) {
                // File uploaded successfully, return the new file name
                return $upload_array['newFilename'];
            } else {
                // Upload failed, set an error message in the session
                $this->session->setFlashdata('error_message', $upload_array['message']);
                return redirect()->to(current_url()); // Redirect back with error message
            }
        } else {
            return null;
            // If no file was uploaded or there's a problem with the file, set an error
            // $this->session->setFlashdata('error_message', 'No file was uploaded or the file is invalid.');
            // return redirect()->to(current_url()); // Redirect back with error message
        }
    }



    // _________________________________________ end __________________________________________

    public function promos_details($id)

    {

        $data                       = [];

        $title                      = 'Promos Details';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'promos-details';

        $id = decoded($id);



        $orderBy[0] = ['field' => 'created_at', 'type' => 'DESC'];

        $packageDtl = $this->common_model->find_data('package', 'array', ['id' => $id], '*', '', '', $orderBy);

        $category_id = 0;

        foreach ($packageDtl as $pkg) {

            $category_id = $pkg->category_id;

            $additionalImg = [];

            $additional_images = json_decode($pkg->additional_images);

            /* add img path for additional images */

            foreach ($additional_images as $images)

                $additionalImg[] = base_url() . '/uploads/package/' . $images;

            $data['package'] = [

                'package_id'          => $pkg->id,

                'package_name'        => $pkg->package_name,

                'feature_img'         => base_url() . '/uploads/package/' . $pkg->feature_image,

                'banner_image'        => base_url() . '/uploads/package/' . $pkg->banner_image,

                'day_night'           => $pkg->day_night,

                'person'              => $pkg->person,

                'price'               => number_format($pkg->package_price),

                'heading_one'         => $pkg->description_heading,

                'heading_two'         => $pkg->description2_heading,

                'heading_one_points'  => json_decode($pkg->description_points),

                'heading_two_points'  => json_decode($pkg->description2_points),

                'additional_imgs'     => $additionalImg,

                'country_name'        => $pkg->country_name,

            ];
        }





        // more package



        $data['packages'] = [];



        $condition = ['published' => 1, 'category_id' => $category_id, 'id!=' => $id];



        $packageDtl = $this->common_model->find_data('package', 'array', $condition);



        foreach ($packageDtl as $pkg) {



            $additionalImg = [];

            $additional_images = json_decode($pkg->additional_images_titles);



            /* add img path for additional images */

            foreach ($additional_images as $images)

                $additionalImg[] = base_url() . '/uploads/package/' . $images;



            $data['packages'][] = [

                'package_id'          => $pkg->id,

                'package_name'        => $pkg->package_name,

                'feature_img'         => base_url() . '/uploads/package/' . $pkg->feature_image,

                'banner_image'        => base_url() . '/uploads/package/' . $pkg->banner_image,

                'day_night'           => $pkg->day_night,

                'person'              => $pkg->person,

                'price'               => number_format($pkg->package_price),

                'heading_one'         => $pkg->description_heading,

                'heading_two'         => $pkg->description2_heading,

                'heading_one_points'  => json_decode($pkg->description_points),

                'heading_two_points'  => json_decode($pkg->description2_points),

                'additional_img_title' => $additionalImg,

                'country_name'        => $pkg->country_name,

            ];
        }





        echo $this->front_layout($title, $page_name, $data);
    }



    public function promos()
    {

        $data                       = [];

        $title                      = 'Promos';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'promos';



        $select_columns = ['id', 'name'];

        $data['categories'] = $this->common_model->find_data('package_category', 'array', ['published' => 1], $select_columns);

        // get all list

        foreach ($data['categories'] as $category) :

            $data['packages'][$category->id] = [];

            $condition = ['category_id' => $category->id, 'published' => 1, 'show_on_promos' => 1];

            $orderBy[0] = ['field' => 'created_at', 'type' => 'DESC'];

            $packageDtl = $this->common_model->find_data('package', 'array', $condition, '*', '', '', $orderBy);



            if (count($packageDtl))

                foreach ($packageDtl as $pkg) {

                    $data['packages'][$category->id][] = [

                        'package_id'          => $pkg->id,

                        'package_name'        => $pkg->package_name,

                        'feature_img'         => base_url() . '/uploads/package/' . $pkg->feature_image,

                        'banner_image'        => base_url() . '/uploads/package/' . $pkg->banner_image,

                        'day_night'           => $pkg->day_night,

                        'person'              => $pkg->person,

                        'price'               => number_format($pkg->package_price),

                        'heading_one'         => $pkg->description_heading,

                        'heading_two'         => $pkg->description2_heading,

                        'heading_one_points'  => json_decode($pkg->description_points),

                        'heading_two_points'  => json_decode($pkg->description2_points),

                        'country_name'        => $pkg->country_name,

                    ];
                }

        endforeach;

        echo $this->front_layout($title, $page_name, $data);
    }



    public function social_functions()

    {

        $data                       = [];

        $title                      = 'Social Functions';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'social-functions';

        echo $this->front_layout($title, $page_name, $data);
    }







    public function bookEnquire()
    {

        $response                   = [];

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        if ($this->request->getMethod() == 'post') {

            // $formData = $this->request->getPost();

            $response['isError'] = 0;

            $postData =  json_decode(json_encode($this->request->getJSON()), true);



            foreach ($postData as $key => $val)

                $postData[$key] = htmlspecialchars(trim($val));



            if ($postData['fname'] == '') {

                $response['message'] = 'First name is required';

                $response['isError'] = 1;
            }

            if ($postData['lname'] == '') {

                $response['message'] = 'Last name is required';

                $response['isError'] = 1;
            }

            if ($postData['email'] == '') {

                $response['message'] = 'Email is required';

                $response['isError'] = 1;
            }

            if ($postData['phone'] == '') {

                $response['message'] = 'Phone number is required';

                $response['isError'] = 1;
            }

            if ($postData['destination'] == '') {

                $response['message'] = 'Destination is required';

                $response['isError'] = 1;
            }



            if ($postData['month'] == '') {

                $response['message'] = 'Please select your month';

                $response['isError'] = 1;
            }





            if ($postData['vacation_type'] == '') {

                $response['message'] = 'Please select vacation type';

                $response['isError'] = 1;
            }



            if ($postData['pax'] == '')
                $postData['pax'] = 0;



            if (!$response['isError']) {


                $data = [

                    'first_name' => $postData['fname'],

                    'last_name' => $postData['lname'],

                    'email' => $postData['email'],

                    'phone' => $postData['phone'],

                    'destination' => $postData['destination'],

                    'month' => $postData['month'],

                    'pax' => $postData['pax'],

                    'vacation_type' => $postData['vacation_type'],

                    'package_id' => $postData['pkg_id'] != 0 ? $postData['pkg_id'] : null

                ];


                $insert_id = $this->common_model->save_data('booking_enquire', $data);


                if ($insert_id)
                    $response['message'] = 'Request send successfully';
            }

            // Return success response with JSON
            return $this->response->setJSON($response);
        }
    }



    // public function saveEnquire()

    // {

    //     if ($this->request->getMethod() == 'post') {

    //         $validation = \Config\Services::validation();



    //         $rules = [

    //             'name' => 'required|min_length[3]|max_length[255]',

    //             'email' => 'required|valid_email|is_unique[employees.email]',

    //             'designation' => 'required|min_length[3]|max_length[255]',

    //         ];



    //         if ($this->validate($rules)) {



    //         }else{

    //             return view('employees/create', ['validation' => $validation]);

    //         }







    //         $data = [

    //             'name' => $this->request->getPost('name'),

    //             'email' => $this->request->getPost('email'),

    //             'designation' => $this->request->getPost('designation'),

    //         ];

    //         $model->insert($data);





    //     }

    // }



    public function getPromos()

    {

        $response                   = [];

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;



        if ($this->request->getMethod() == 'post') {

            $response['packages'] = [];

            $response['isError'] = 0;

            $postData =  json_decode(json_encode($this->request->getJSON()), true);



            foreach ($postData as $key => $val)

                $postData[$key] = htmlspecialchars(trim($val));





            if ($postData['category_id'] == '') {

                $response['message'] = 'Please send category id';

                $response['isError'] = 1;
            }





            if (!$response['isError']) {



                $condition = ['category_id' => $postData['category_id'], 'published' => 1, 'show_on_promos' => 1];

                $orderBy[0] = ['field' => 'created_at', 'type' => 'DESC'];



                $packageDtl = $this->common_model->find_data('package', 'array', $condition, '*', '', '', $orderBy);



                foreach ($packageDtl as $pkg) {

                    $additionalImg = [];

                    $additional_images = json_decode($pkg->additional_images_titles);

                    /* add img path for additional images */



                    $response['packages'][] = [

                        'package_id'          => $pkg->id,

                        'package_name'        => $pkg->package_name,

                        'feature_img'         => base_url() . '/uploads/package/' . $pkg->feature_image,

                        'banner_image'        => base_url() . '/uploads/package/' . $pkg->banner_image,

                        'day_night'           => $pkg->day_night,

                        'person'              => $pkg->person,

                        'price'               => number_format($pkg->package_price),

                        'heading_one'         => $pkg->description_heading,

                        'heading_two'         => $pkg->description2_heading,

                        'heading_one_points'  => json_decode($pkg->description_points),

                        'heading_two_points'  => json_decode($pkg->description2_points),

                        'country_name'        => $pkg->country_name,

                    ];
                }
            }



            // Return success response with JSON

            return $this->response->setJSON($response);
        }
    }





    public function subscribe()

    {

        $response                   = [];

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        if ($this->request->getMethod() == 'post') {



            $response['isError'] = 0;

            $postData =  json_decode(json_encode($this->request->getJSON()), true);




            foreach ($postData as $key => $val)

                $postData[$key] = htmlspecialchars(trim($val));



            if ($postData['email'] == '') {

                $response['message'] = 'Email is required';

                $response['isError'] = 1;
            }

            if (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $postData['email'])) {

                $response['message'] = 'Email is invalid';

                $response['isError'] = 1;
            }



            if (!$response['isError']) {



                $data = [

                    'email' => $postData['email']

                ];



                $insert_id = $this->common_model->save_data('subscribe', $data);



                if ($insert_id) {

                    $to = $data['email'];

                    $subject = 'New Subscriber';

                    $body = '<div style="padding: 20px;">
                            <div style="text-align: center;"><img style="max-width: 250px;" src="https://victoriatravels.com/uploads/1702639700header-logo.webp" alt=""></div>
                            
                            <div style="font-family: Arial; text-transform: uppercase; font-weight: 600; text-align: center; margin: 40px auto; font-size: 20px; padding: 15px; display: table; color: #2879bf; border-radius: 10px;">Thank you for your subscription!</div>
                            
                            <div style="text-align: center; font-family: Arial; margin: 10px auto; padding: 20px; font-weight: 600; display: table; background: #f47a27; color: #fff; font-size: 22px; border-radius: 10px;">Click here to download <strong><a href="#" target="_blank" style="color: #fff; text-transform: uppercase;">e-Brochure</a></strong></div>
                            
                        </div>
                        <div style="background: #ddd; padding: 15px 0;">
                            <div style="text-align: center; font-family: Arial; margin-bottom: 10px;">
                                <strong>Address:</strong> 124 A Rashbehari Avenue, Kolkata –700029, India.
                            </div>
                            <div style="text-align: center; font-family: Arial; margin-bottom: 10px;">
                                <strong>MICE & Social Events :</strong> +91 98197 14082 ,
                                <strong>Holidays :</strong> +91 98305 33729 ,
                                <strong>Corporate Travel/ Ticketing/ Allied Services :</strong> +91 98302 00102
                            </div>
                            <div style="text-align: center; font-family: Arial;"><strong>Email:</strong> info@victoriatravels.net</div>
                        </div>';

                    // Send Email

                    $this->emailService->sendEmail($to, $subject, $body);

                    //$this->session->setFlashdata('success_mag', 'Request sent successfully');

                    $response['message'] = 'Subscription Successfully';
                }
            }





            // Return success response with JSON



            return $this->response->setJSON($response);
        }
    }





    public function mailSend()
    {
        $response                   = [];

        // $this->common_model         = new CommonModel();

        // $postData['common_model']   = $this->common_model;

        if ($this->request->getMethod() == 'post') {


            $response['isError'] = 0;

            $postData =  json_decode(json_encode($this->request->getJSON()), true);



            foreach ($postData as $key => $val)
                $postData[$key] = htmlspecialchars(trim($val));

            if (!count($postData)) {
                $response['message'] = 'data not found';
                $response['isError'] = 1;
            }




            if (!$response['isError']) {

                $date = \DateTime::createFromFormat('!m', $postData['month']);

                $monthName =  $date->format('F');

                /* 
                        $condition = ['id' => $postData['pkg_id']];

                        $package = $this->common_model->find_data('package', 'row-array', $condition, 'package_name');
                        */
                $to = CLIENT_MAIL;

                $subject = 'New enquiry lead';

                $body =         "Name: {$postData['fname']} {$postData['lname']}<br>

                                Phone: {$postData['phone']}<br>

                                Email: {$postData['email']}<br>

                                Destination: {$postData['destination']}<br>

                                Month of travel:{$monthName}<br>

                                Pax:{$postData['pax']}<br>

                                Holiday type: " . HOLIDAY_TYPES[$postData['vacation_type']] . " <br>";

                /* if (count($package))
                            $body .= "package type: " . $package['package_name'] . " <br>";*/



                $response['message'] = $this->emailService->sendEmail($to, $subject, $body);

                // if ($this->emailService->sendEmail($to, $subject, $body))
                //     $response['message'] = 'Mail send successfully';
            }

            // Return success response with JSON
            return $this->response->setJSON($response);
        }
    }


    //_________________________________________________________________________________


    private  function sendToAdmin($subject = '', $body = '', $sendTo = 'admin', $toName = 'Admin')
    {
        $this->common_model         = new CommonModel();

        $select_columns = ['service_email', 'site_email', 'admin_email'];

        $data['email'] = $this->common_model->find_data('sms_site_settings', 'row', ['published' => 1], $select_columns);
        $send_email = $sendTo == 'admin' ? $data['email']->admin_email : $data['email']->service_email;

        try {
            return $this->send($send_email, $toName, $subject, $body);
        } catch (\Exception $e) {
            // Catch and handle any exceptions
            error_log('An error occurred while sending the email: ' . $e->getMessage());
            return false;
        }
    }






    public function mailTest()
    {
        $to = 'shubhasinha77@gmail.com';
        $toName = 'Shubha';
        $subject = 'Here is the subject new';
        $body = 'This is the HTML message body <b>in bold!</b>';

        try {
            return $this->send($to, $toName, $subject, $body);
        } catch (\Exception $e) {
            // Catch and handle any exceptions
            echo 'An error occurred while sending the email: ' . $e->getMessage();
        }
    }
}
