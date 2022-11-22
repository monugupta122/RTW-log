<?php
    class Users extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->model("Users_model");
            $this->load->helper('url');
        }
        // public function index(){
        //     echo "Hello World";
        // }
        public function about(){
            $this->load->view("about");
        }
        public function insert(){

            //validating form inputs
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Name','required|max_length[50]|trim',
            array('required' => 'Name is required.','max_length' => 'Max length of name should not exceed 50 characters.'));
            
            $this->form_validation->set_rules('username','Username','required|max_length[50]|callback_ifuserexists|trim',
            array('required' => 'Username is required.','max_length' => 'Max length of username should not exceed 50 characters.','ifuserexists' => 'Username already exits.'));
            
            $this->form_validation->set_rules('email','E-mail','required|valid_email|max_length[50]|trim',
            array('required' => 'E-mail is required.','max_length' => 'Max length of email should not exceed 50 characters.','valid_email' => 'Invalid email.'));
            
            $this->form_validation->set_rules('contact','Contact','required|max_length[50]|trim',
            array('required' => 'Contact is required.','max_length' => 'Max length of contact should not exceed 10 characters.'));
            
            $this->form_validation->set_rules('address','Address','max_length[255]|trim',
            array('required' => 'address is required.','max_length' => 'Max length of contact should not exceed 255 characters.'));

            if($this->form_validation->run() == FALSE){
                $this->load->view('register');
            }
            else{
                //after validating form input calling user model to register user
                if($this->input->post("register")){
                    // var_dump($this->input->post());
                    // exit;
                    $name=$this->input->post('name');
                    $username=$this->input->post('username');
                    $email=$this->input->post('email');
                    $contact=$this->input->post('contact');
                    $address=$this->input->post('address');

                    $this->Users_model->insertUser($name,$username,$email,$contact,$address);
                    redirect('Users/view');
                }
            }
        }

        public function view(){
            $data['user'] = $this->Users_model->getUsers();
            // var_dump($data).exit;
            $this->load->view('viewUsers',$data);
        }

        public function delete(){      
            $id = $this->input->get('id');
            $this->Users_model->deleteUser($id);
            // redirect('Users/view');
        }

        public function update(){
            $id = $this->input->get('id');
            
            //validating form inputs
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Name','required|max_length[50]|trim',
            array('required' => 'Name is required.','max_length' => 'Max length of name should not exceed 50 characters.'));
            
            $this->form_validation->set_rules('username','Username','required|max_length[50]|callback_ifuserexists|trim',
            array('required' => 'Username is required.','max_length' => 'Max length of username should not exceed 50 characters.','ifuserexists' => 'Username already exits.'));
            
            $this->form_validation->set_rules('email','E-mail','required|valid_email|max_length[50]|trim',
            array('required' => 'E-mail is required.','max_length' => 'Max length of email should not exceed 50 characters.','valid_email' => 'Invalid email.'));
            
            $this->form_validation->set_rules('contact','Contact','required|max_length[50]|trim',
            array('required' => 'Contact is required.','max_length' => 'Max length of contact should not exceed 10 characters.'));
            
            $this->form_validation->set_rules('address','Address','max_length[255]|trim',
            array('required' => 'address is required.','max_length' => 'Max length of contact should not exceed 255 characters.'));

            if($this->form_validation->run() == FALSE){
                $data['user'] = $this->Users_model->getUserById($id);
                // var_dump($data).exit;
                $this->load->view('updateUser',$data);
            }
            else{
                if($this->input->post("update")){
                    // var_dump($this->input->post());
                    // exit;
                    $name=$this->input->post('name');
                    $username=$this->input->post('username');
                    $email=$this->input->post('email');
                    $contact=$this->input->post('contact');
                    $address=$this->input->post('address');

                    $this->Users_model->updateUserById($id,$name,$username,$email,$contact,$address);
                    redirect('Users/view');
                }
            }
        }

        public function ifuserexists($str){
            $result = $this->Users_model->ifuserexists($str);
            if($result)
                return FALSE;
            return TRUE;
        }
    }
?>