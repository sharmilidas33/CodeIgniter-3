<?php

class Home extends CI_Controller
{
    public function index(){

        // $data['name']='Sharmili Das';
        // $data['city']='Kolkata';
        // $data['role']='Developer';

        // $this->load->view("home",$data);

        // $this->load->model('ModHome');
        // $abc= array();
        // $abc['key']='value';
        // $abc['key2']=2;
        // $this->ModHome->addUser($abc);
        
        // redirect(uri: 'Home/anotherMethod');
        // echo site_url(uri: 'home/admin');
        // echo base_url(uri: 'assets/images/image.jpg');
        // echo anchor(uri:'home', title: 'Go to Home', attributes: 'class="one"');
        // echo anchor_popup(uri:'home', title: 'Go to Home', attributes: 'class="one"');

        // $this->load->helper('form');

        //Captcha Helper
        // $this->load->helper('url');
        // $this->load->helper('captcha');

        // $captchaArr = array(
        //     'word' => 'Random Word',
        //     'img_path' => APPPATH.'../assets/captcha/',
        //     'img_url' => base_url('assets/captcha/'),
        //     'img_width' => 100,
        //     'img_height' => 50,
        //     'expiration' => 72000,
        //     'word_length' => 8,
        //     'font_size' => 16,
        //     'img_id' => 'Imageid',
        //     'colors' => array(
        //         'background' => array(122, 200, 234),
        //         'border' => array(123, 234, 255),
        //         'text' => array(0, 0, 0),
        //         'grid' => array(255, 20, 77)
        //     )
        // );
        // // phpinfo();
        // // echo "<pre>";
        // // print_r($captchaArr);
        // $returnCaptcha= create_captcha($captchaArr);
        // var_dump($returnCaptcha);

        //HTML Helper
        // $this->load->helper('html');
        // $this->load->helper('url');
        // $list = array('mango','apple','banana');

        // echo ul($list);

        // echo link_tag(base_url('assets/css/style.css'), 'stylesheet', 'text/css');

        // echo heading(
        //     data: 'Here is my data',
        //     h: 3,
        //     attributes: 'class="one"' 
        // );
        

        // $myimg= array(
        //     'src'=> base_url(uri:'assets\captcha\1718176075.3122.jpg'),
        //     'alt'=>'img',
        //     'class'=>'img1'
        // );
        // echo img($myimg);

        // String Helper (or Text Helper almost same)
        // $this->load->helper('string');
        // echo random_string('alnum', 16);

        // $string = "http://example.com//index.php";
        // echo reduce_double_slashes($string);

        // $str = array(
        //     'question'  => 'Is your name O\'reilly?',
        //     'answer' => 'No, my name is O\'connor.'
        // );
        
        // $str = strip_slashes($str);
        // print_r($str);

        //Inflector Helper
        // $this->load->helper('inflector');
        // echo singular(str: 'dogs');
        // echo plural(str: 'cat');
        // echo camelize("String_Her_For_Me");
        // echo underscore("some text here");
        // echo humanize("some text here");

        //Benchmark Library
        // $this->benchmark->mark('code_start');
        // for($i=0;$i<1000000000;$i++){
        //     $i;
        // }
        // $this->benchmark->mark('code_end');
        // echo $this->benchmark->elapsed_time('code_start','code_end');

        //Calendering Class Library
        // $this->load->library('calendar');
        // $myArray= array(
        //     12=>'https://sharmili-s-portfolio.vercel.app/'
        // );
        // echo $this->calendar->generate(2003,1,$myArray);

        //Shopping Cart Class Library
        // $this->load->library('cart');
        // $product= array(
        //     'id'=>'sh_123',
        //     'qty'=>2,
        //     'price'=>39.88,  
        //     'name'=>'Shoes',
        //     'options'=>array('size'=>'Large','Color'=>'Small')
        // );
        // $this->cart->insert($product);

        //Encryption Library
        // $this->load->library('encryption');
        // $string= $this->encryption->encrypt('Sharmili');
        // echo $this->encryption->decrypt($string);

        // $data['allUser'] =$this->modHome->getAllRecords();
        // echo "<pre>";
        // var_dump($data->result());

        // foreach($data->result() as $user) {
        //     echo $user->id . '<br>';
        //     echo $user->fullname . '<br>';
        //     echo $user->email . '<br>';
        //     echo $user->password . '<br>';
        //     echo $user->date . '<br>';
        // }        

        // $data['allUser']= $this->modHome->mixup();
        // $data['allUser']= $this->modHome->getFunc();
        // $data['allUser']= $this->modHome->myagri();
        // $data['allUser']= $this->modHome->myWhereIn();
        // $data['allUser']= $this->modHome->myLike('J');
        // $data['allUser']= $this->modHome->myOrderBy();

        // $arrayData= array(
        //     array(
        //     'fullname'=>'Pam',
        //     'age'=>38,
        //     'email'=>'pam@hotmail.in',
        //     'password'=>'apm123',
        //     'date'=>date("Y-m-d H:i:s") 
        // ),
        // array(
        //     'fullname'=>'Tom',
        //     'age'=>34,
        //     'email'=>'tom@hotmail.in',
        //     'password'=>'tome123',
        //     'date'=>date("Y-m-d H:i:s") 
        // ),
        // array(
        //     'fullname'=>'Pam',
        //     'age'=>38,
        //     'email'=>'pam@hotmail.in',
        //     'password'=>'apm123',
        //     'date'=>date("Y-m-d H:i:s") 
        // )
        // );
        // $data= $this->modHome->insertData($arrayData);
        // var_dump($data->result());
        // $this->load->view('home',$data);

        // $myArray= array(
        //     'fullname'=>'Marissa Smith',
        //     'age'=>24,
        //     'email'=>'mar@hotmail.in',
        //     'password'=>'marie120987',
        //     'date'=>date("Y-m-d H:i:s") 
        // );
        // $data= $this->modHome->updateData($myArray,14);
        // $data= $this->modHome->deleteData(14);
        // $data= $this->modHome->myReturnId($arrayData);
        // $data= $this->modHome->myLastQuery();
        // var_dump($data);

        // Check if user is logged in
        $userId = $this->session->userdata('uId');

        // Initialize content and latestBlogs
        $content = [];
        $latestBlogs = [];
        $isLoggedIn = false;

        // Fetch content based on user login status
        if ($userId) {
            // User is logged in, check if their ID is in the appearance table
            $userAppearance = $this->modAdmin->getUserAppearance($userId);
    
            if ($userAppearance) {
                // User's appearance data exists, fetch personalized content
                $content = $this->modAdmin->getContentByUserId($userId);
                $isLoggedIn = true;
            } else {
                // User's appearance data does not exist, fetch default content
                $content = [
                    'logo_name' => 'BlogSpot',
                    'nav_items' => json_encode([
                        ['name' => 'Home', 'link' => base_url('Home')],
                        ['name' => 'About', 'link' => base_url('Home/about')],
                        ['name' => 'Blog', 'link' => base_url('/blog')],
                        ['name' => 'SignUp', 'link' => base_url('signup')],
                    ]),
                    'banner_line' => 'Welcome to Our Blog Site',
                    'banner_image' => '', 
                    'banner_button_name' => 'Learn More',
                    'facebook_link' => '#',
                    'twitter_link' => '#',
                    'linkedin_link' => '#',
                    'instagram_link' => '#',
                    'footer_email' => 'contact@example.com',
                    'footer_number' => '123-456-7890'
                ];
            }
        } else {
            // User is not logged in, fetch default content
            $content = [
                'logo_name' => 'BlogSpot',
                'nav_items' => json_encode([
                    ['name' => 'Home', 'link' => base_url('Home')],
                    ['name' => 'About', 'link' => base_url('Home/about')],
                    ['name' => 'Blog', 'link' => base_url('/blog')],
                    ['name' => 'SignUp', 'link' => base_url('signup')],
                ]),
                'banner_line' => 'Welcome to Our Blog Site',
                'banner_image' => '', 
                'banner_button_name' => 'Learn More',
                'facebook_link' => '#',
                'twitter_link' => '#',
                'linkedin_link' => '#',
                'instagram_link' => '#',
                'footer_email' => 'contact@example.com',
                'footer_number' => '123-456-7890'
            ];
        }

        // Fetch latest blogs
        $latestBlogs = $this->modAdmin->fetchLatestBlogs(4);

        // Prepare data to pass to view
        $data['content'] = $content;
        $data['latestBlogs'] = $latestBlogs;
        $data['isLoggedIn'] = $isLoggedIn;

        // Load views
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navigation', $data); // Pass $data to navigation view
        $this->load->view('content/home', $data);
        $this->load->view('footer/footer', $data);
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }


    public function about() {
        // Check if user is logged in
        $userId = $this->session->userdata('uId'); 
    
        // Initialize content and latestBlogs
        $content = [];
        $latestBlogs = [];
        $isLoggedIn = false;
    
        // Fetch content based on user login status and appearance status
        if ($userId) {
            // User is logged in, check if their ID is in the appearance table
            $userAppearance = $this->modAdmin->getUserAppearance($userId);
    
            if ($userAppearance) {
                // User's appearance data exists, fetch personalized content
                $content = $this->modAdmin->getContentByUserId($userId);
                $isLoggedIn = true;
            } else {
                // User's appearance data does not exist, fetch default content
                $content = [
                    'logo_name' => 'BlogSpot',
                    'nav_items' => json_encode([
                        ['name' => 'Home', 'link' => base_url('Home')],
                        ['name' => 'About', 'link' => base_url('Home/about')],
                        ['name' => 'Blog', 'link' => base_url('/blog')],
                        ['name' => 'SignUp', 'link' => base_url('signup')],
                    ]),
                    'about_image' => '',
                    'about_us' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus soluta repudiandae voluptates rerum deleniti dolore blanditiis iure ipsum, amet atque. Consequuntur possimus esse exercitationem perspiciatis optio! Nihil enim illo neque!'
                ];
            }
        } else {
            // User is not logged in, fetch default content
            $content = [
                'logo_name' => 'BlogSpot',
                'nav_items' => json_encode([
                    ['name' => 'Home', 'link' => base_url('Home')],
                    ['name' => 'About', 'link' => base_url('Home/about')],
                    ['name' => 'Blog', 'link' => base_url('/blog')],
                    ['name' => 'SignUp', 'link' => base_url('signup')],
                ]),
                'about_image' => '',
                'about_us' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus soluta repudiandae voluptates rerum deleniti dolore blanditiis iure ipsum, amet atque. Consequuntur possimus esse exercitationem perspiciatis optio! Nihil enim illo neque!'
            ];
        }
    
        // Fetch latest blog
        $latestBlogs = $this->modAdmin->fetchLatestBlogs(1); // Fetching 1 latest blog for the about section
    
        // Prepare data to pass to view
        $data['content'] = $content;
        $data['latestBlogs'] = $latestBlogs;
        $data['isLoggedIn'] = $isLoggedIn;
    
        // Load views
        $this->load->view('header/header', $data);
        $this->load->view('header/css');
        $this->load->view('header/navigation',$data);
        $this->load->view('content/about', $data); // Pass $data to about view
        $this->load->view('footer/footer', $data);
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }
    
    

    public function fullBlog($blogId) {
        $userId = $this->session->userdata('uId'); // Replace with your actual session variable name
    
        // Initialize content and latestBlogs
        $content = [];
        $latestBlogs = [];
        $isLoggedIn = false;
    
        if ($userId) {
            // User is logged in, check if their ID is in the appearance table
            $userAppearance = $this->modAdmin->getUserAppearance($userId);
    
            if ($userAppearance) {
                // User's appearance data exists, fetch personalized content
                $content = $this->modAdmin->getContentByUserId($userId);
                $isLoggedIn = true;
            } else {
                // User's appearance data does not exist, fetch default content
                $content = [
                    'logo_name' => 'BlogSpot',
                    'nav_items' => json_encode([
                        ['name' => 'Home', 'link' => base_url('Home')],
                        ['name' => 'About', 'link' => base_url('Home/about')],
                        ['name' => 'Blog', 'link' => base_url('/blog')],
                        ['name' => 'SignUp', 'link' => base_url('signup')],
                    ]),
                ];
            }
        } else {
            // User is not logged in, fetch default content
            $content = [
                'logo_name' => 'BlogSpot',
                'nav_items' => json_encode([
                    ['name' => 'Home', 'link' => base_url('Home')],
                    ['name' => 'About', 'link' => base_url('Home/about')],
                    ['name' => 'Blog', 'link' => base_url('/blog')],
                    ['name' => 'SignUp', 'link' => base_url('signup')],
                ]),
            ];
        }
    
        // Fetch full blog details from the model
        $blog = $this->modBlog->getBlogById($blogId);
    
        // Prepare data to pass to view
        $data['content'] = $content;
        $data['blog'] = $blog;
        $data['isLoggedIn'] = $isLoggedIn;
    
        // Load views
        $this->load->view('header/header', $data);
        $this->load->view('header/css');
        $this->load->view('header/navigation', $data);
        $this->load->view('blog/fullBlog', $data);
        $this->load->view('footer/footer', $data);
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }
       
    

    // public function contactus(){
    //     $this->load->view('header/header');
    //     $this->load->view('header/css');
    //     $this->load->view('header/navigation');
    //     $this->load->view('content/contactUs');
    //     $this->load->view('footer/footer');
    //     $this->load->view('footer/js');
    //     $this->load->view('footer/endhtml');
    // }



    //for session
    public function mysession(){
        // Loading session library (if not autoloaded)
        $this->load->library('session');
        
        // Data to be stored in session
        $array = array(
            'name' => 'Sharmili',
            'role' => 'Developer'
        );
    
        // Set session data
        $this->session->set_userdata($array);
    
        // Get session data
        $abc = $this->session->userdata();
    
        // Print all session data
        print_r($abc);
    
        // Check if the data is stored in the session
        if ($this->session->userdata('name') === 'Sharmili' && 
            $this->session->userdata('role') === 'Developer') {
            echo "Stored in the session";
        } else {
            echo "Not stored";
        }
    }

    public function destroy()
    {
        // Loading session library (if not autoloaded)
        $this->load->library('session');
        
        // Destroy the session
        $this->session->sess_destroy();
        
        echo "Session destroyed";
    }

    
    public function user(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');

        if($this->form_validation->run()==false){
            $this->index();
        }
        else{
            echo "fine";
        }
    }

    public function showProduct(){
        $this->load->library('cart');
        foreach($this->cart->contents() as $myproduct){
            echo $myproduct['id'].'<br>';
            echo $myproduct['qty'].'<br>';
            echo $myproduct['price'].'<br>';
            echo $myproduct['name'].'<br>';
        }
    }

    public function login(){
        echo $this->input->post('myname',true);
        // if(is_ajax request){
        //     echo 'Ajax here';
        // } else{
        //     echo 'not Ajax';
        // }
    }

    public function anotherMethod(){
         echo "Another Method";
    }
}