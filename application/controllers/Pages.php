<?php

defined('BASEPATH') OR exit('No direct script access allowed');    

class Pages extends CI_Controller{
        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title'] = ucfirst($page);
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/footer');
        }

        public function master_session(){
            
            if (!$this->input->is_ajax_request()) {
                echo 'No direct script is allowed';
                die;
            }
            $phoneno = $this->input->post('phoneno');
            $this->load->library('session');
            $this->session->set_userdata('phoneno',$phoneno);
            $result['status'] = 'success';
            $result['message'] = 'Yeah! You have successfully logged in.';
            $result['redirect_url'] = base_url('pages/master_home');

            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($result));
            $string = $this->output->get_output();


        }

        public function master_home(){
            $this->load->library('session');
            if(isset($_SESSION['phoneno'])){
            $data['phoneno'] = $this->session->userdata('phoneno');
            $this->load->view('pages/master_home',$data);
            }else{
                echo "<script>alert('Not an correct way to come in. Please login first')</script>";
                redirect('home', 'refresh');
            }
        }
    

        public function master_newuser(){

            // $db_debug = $this->db->db_debug;
            // $this->db->db_debug = false;
            if(isset($_POST['submit'])){

            $uname = $this->input->post('uname');
            $ucontact = $this->input->post('ucontact');
            $data = array(
                'userno' => $ucontact,
                'username' => $uname
                );
            
            if($this->user_data->user_exists($ucontact)){
                echo "<script>alert('User with such credientials already exists')</script>";
                redirect('pages/master_home', 'refresh');
            }

            try{
                $qres = $this->db->insert('user', $data);
                $err = $this->db->error();
                if(!$qres){
                    throw new Exception('Error has occurred ! ; Error: '. $err['message']);
                }
                echo "<script>alert('Succeffully added ".$uname." as an User.')</script>";
                redirect('pages/master_home', 'refresh'); 
            }catch(Exception $e){
                $msg = str_replace("'", '', $e->getMessage());
                echo "<script>alert('".$msg."')</script>";
                redirect('pages/master_home', 'refresh');
            }
            
            // $this->db->db_debug = $db_debug;
        }
        }
        
        public function master_logout(){
            $this->load->library('session');
            echo('hi');
            $this->session->unset_userdata('phoneno');
            $this->session->sess_destroy();
            echo "<script>alert('Are you sure you want to logout?')</script>";
            redirect('home', 'refresh');
        }
        
        public function check_user(){
            if(!$this->input->is_ajax_request()){
                echo 'No direct script is allowed';
                die;
            }
            $phoneno = $this->input->post('phoneno');
            if($this->user_data->user_exists($phoneno)){
                $result['status'] = 'success';
                $result['message'] = 'User exists';
                
            }else{
                $result['status'] = 'failure';
                $result['message'] = 'User does not exist';
            }

            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($result));
            $string = $this->output->get_output();
        }


        public function user_session(){
            if (!$this->input->is_ajax_request()) {
                echo 'No direct script is allowed';
                die;
            }

            $phoneno = $this->input->post('phoneno');
            $this->load->library('session');
            $this->session->set_userdata('phoneno',$phoneno);
            $result['status'] = 'success';
            $result['message'] = 'Yeah! You have successfully logged in.';
            $result['redirect_url'] = base_url('pages/user_home');

            $target_dir="./user_data/".$phoneno."/";
            if(!file_exists($target_dir)){
                mkdir($target_dir,0777);
            }

            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($result));
            $string = $this->output->get_output();
        }

        public function user_home(){
            $this->load->library('session');
            if(isset($_SESSION['phoneno'])){
            $data['phoneno'] = $this->session->userdata('phoneno');
            $res = $this->user_data->get_user($data['phoneno']);
            $data['username'] = $res[0]['username'];
            $this->load->helper('directory');
            $map = directory_map('./user_data/'.$data['phoneno'], 1);
            $data['files'] = $map;

            $this->load->view('pages/user_home',$data);
            }else{
                echo "<script>alert('Not an correct way to come in. Please login first')</script>";
                redirect('home', 'refresh');}
        }

        public function user_upload(){
            
                $this->load->library('session');
                $phoneno = $this->session->userdata('phoneno');
                $file_name = $this->input->post('docdet');
                $target_dir="./user_data/".$phoneno."/";
                if(!file_exists($target_dir)){
                    mkdir($target_dir,0777);
                }
                $config['upload_path'] = $target_dir;
                $config['file_name'] = $file_name;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 10000;
        
                $this->load->library('upload', $config);
        
                if (!$this->upload->do_upload('docupload')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>alert('Unable to upload the file. ".strip_tags($this->upload->display_errors())."')</script>";
                    redirect('pages/user_home', 'refresh');
                } else {
                    echo "<script>alert('Document Succeffully Uploaded')</script>";
                    redirect('pages/user_home', 'refresh');
                }
            }

            public function viewpdf($filename){
                $this->load->library('session');
                $phoneno = $this->session->userdata('phoneno');
                $path = 'user_data/'.$phoneno.'/'.$filename;
        
                header('Content-Length: '.filesize($path));
                header("Content-type: application/pdf");
                header("Content-disposition: inline; filename=$filename");
                readfile($path);
            }

            public function deletepdf($filename){
                $this->load->library('session');
                $phoneno = $this->session->userdata('phoneno');
                $path = 'user_data/'.$phoneno.'/'.$filename;

                $this->load->helper("file");
                // delete_files($path);
                if(unlink($path)) {
                    echo "<script>alert('Document Succeffully Deleted')</script>";
                redirect('pages/user_home', 'refresh');
               }
               else {
                echo "<script>alert('Unable to delete document')</script>";
                redirect('pages/user_home', 'refresh');
               }
                
            }

            public function user_logout(){
                $this->load->library('session');
                $this->session->unset_userdata('phoneno');
                $this->session->sess_destroy();
                echo "<script>alert('Are you sure you want to logout?')</script>";
                redirect('userlogin', 'refresh');
            }


        }

        
        
    
?>