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

        }
        public function master_home(){
            // $data['phoneno'] = $this->input->post('phoneno');
            // print_r($data);
            $this->load->view('templates/header');
            $this->load->view('pages/master_home');
            $this->load->view('templates/footer');

        }

    }

?>