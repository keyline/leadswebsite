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
        $order_by = [['field' => 'blogs.created_at', 'type' => 'DESC']];

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
        $order_by = [['field' => 'blogs.created_at', 'type' => 'DESC']];

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
        die('hello test');
        $data                       = [];

        $title                      = 'Home';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'index';

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

        $title                      = 'Home';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'about';

        $data['footsteps']          = $this->common_model->find_data('footsteps', 'array');

        echo $this->front_layout($title, $page_name, $data);
    }


    public function blog()
    {

        $title                      = 'Blog';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'blog-list';

        $data['recentBlog']         = $this->getNewBlogs(3);

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
                                <span class="ps-2"><?= (new \DateTime($blog->created_at))->format('M j, Y') ?></span> | <span class="ps-2"><?= $blog->post_by ?></span> | <span class="pe-2"><?= (new \DateTime($blog->created_at))->format('h.m A') ?></span>
                            </p>
                            <h3><?= $blog->title ?></h3>
                            <p class="shortdes"><?= truncateText($blog->description); ?></p>
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

        $data['contents']           = !is_null($data['blog']) ? $this->common_model->find_data('blog_contents', 'array', ['blog_id' => $data['blog']->id]) : [];

        echo $this->front_layout($title, $page_name, $data);
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



    public function corporate_travel()

    {

        $data                       = [];

        $title                      = 'Corporate Travel';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'corporate-travel';

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



    public function holiday_package()

    {

        $data                       = [];

        $title                      = 'Holiday Package';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'holiday-package';

        $condition = ['published' => 1, 'category_id !=' => 3];

        $orderBy[0] = ['field' => 'created_at', 'type' => 'DESC'];

        $packageDtl = $this->common_model->find_data('package', 'array', $condition, '*', '', '', $orderBy);



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



    public function luxury()

    {

        $data                       = [];

        $title                      = 'Luxury';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'luxury';

        echo $this->front_layout($title, $page_name, $data);
    }



    public function mice()

    {

        $data                       = [];

        $title                      = 'Mice';

        $this->common_model         = new CommonModel();

        $postData['common_model']   = $this->common_model;

        $page_name                  = 'mice';

        echo $this->front_layout($title, $page_name, $data);
    }

    public function contact_us()
    {

        if ($this->request->getMethod() === 'post') {

            $expirationTime = 6;

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
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
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
                    return redirect()->back()->withInput()->with('success_message', 'Request sent successfully');
                }
            } else {
                return redirect()->back()->withInput()->with('error_message', 'reCAPTCHA verification failed. Please try again.');
            }
        }
    }



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

    public function mailTest()
    {
        $to = 'shubhasinha77@gmail.com';
        $toName = 'Shubha';
        $subject = 'Here is the subject +++++++';
        $body = 'This is the HTML message body <b>in bold!</b>';


        try {
            // Attempt to send the email
            if (SmtpMail::send($to, $toName, $subject, $body)) {
                echo 'Message has been sent';
            } else {
                echo 'Message could not be sent';
            }
        } catch (\Exception $e) {
            // Catch and handle any exceptions
            echo 'An error occurred while sending the email: ' . $e->getMessage();
        }
    }
}
