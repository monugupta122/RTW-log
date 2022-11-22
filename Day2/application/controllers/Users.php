<?php
    class Users extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->model("Users_model");
            $this->load->helper('url');
        }
        public function index(){
            echo "Hello World";
        }
        public function about(){
            $this->load->view("about");
        }
        public function insert(){
            $this->load->view("register");
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

        public function view(){
            $data['user'] = $this->Users_model->getUsers();
            // var_dump($data).exit;
            $this->load->view('viewUsers',$data);
        }

        public function delete(){      
            $id = $this->input->get('id');
            $this->Users_model->deleteUser($id);
            redirect('Users/view');
        }

        public function update(){
            $id = $this->input->get('id');
            $data['user'] = $this->Users_model->getUserById($id);
            // var_dump($data).exit;
            $this->load->view('updateUser',$data);

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
?>