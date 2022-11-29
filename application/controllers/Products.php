<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Products extends CI_Controller
    {
        /*
            DOCU: This function set the specific page of user and admin
            Showing product dashboard.
            Owner: Ron Santos
        */
        public function index()
        {
            $products = $this->product->get_all_products();
            $product_list = array(
                'lists' => $products
            );
            
            $current_user_id = $this->session->userdata('user_id');
            if($current_user_id == 1){
                $this->load->view('templates/admin_header');
                $this->load->view('products/admin_dashboard', $product_list);
            }else{
                $this->load->view('templates/user_header');
                $this->load->view('products/admin_dashboard', $product_list);
            }
            
            
        }

        /*
            DOCU: Show the new product page if add new button triggered.
            Owner: Ron Santos
        */
        public function new()
        {
            $current_user_id = $this->session->userdata('user_id');
            if($current_user_id == 1){
                $this->load->view('templates/admin_header');
            }else{
                $this->load->view('templates/user_header');
            }
            
            $this->load->view('products/new');
        }

        /*
            DOCU: This function collect inputs from forms when clicked.
            Validates inputs and go to page depends on validation process.
            Owner: Ron Santos
        */

        public function create()
        {
            $product = $this->input->post('product_name');
            $result = $this->product->validate_registration($product);
            if($result != null){
                $this->session->set_flashdata('input_errors', $result);
                redirect('products/new');
            }else{
                $form_data = $this->input->post();
                $this->product->create_product($form_data);
                redirect('/dashboard');
            }
        }

        public function show($id){
            $current_user_id = $this->session->userdata('user_id');
            if($current_user_id == 1){
                $this->load->view('templates/admin_header');
            }else{
                $this->load->view('templates/user_header');
            }

            $product = $this->product->get_product($id);
            $this->load->view('products/show', $product);

        }
    }
?>