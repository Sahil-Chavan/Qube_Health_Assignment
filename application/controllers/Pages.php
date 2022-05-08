<?php

    class Pages extends CI_Controller{
        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            // if($page=='home'){
            //     $this->load->view('pages/'.$page);
            //     return;
            // }

            $data['title'] = ucfirst($page);
            // $data['posts'] = $this->user_data->get_post(8104557876);
            // print_r($data['posts']);
            
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/footer');
        }

        // public function master_login(){
        //     $data['phoneno'] = $this->input->post('phoneno');
        //     // print_r($data);
        //     $this->load->view('templates/header');
        //     $this->load->view('pages/master_otp',$data);
        //     $this->load->view('templates/footer');

        // }
        public function master_home(){
            // $data['phoneno'] = $this->input->post('phoneno');
            // print_r($data);
            // $this->load->view('templates/header');
            $this->load->view('pages/master_home');
            // $this->load->view('templates/footer');

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

    }

?>