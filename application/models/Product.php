<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Product extends CI_Model
    {
        /*
            DOCU: this function determine if there is existing product in database.
            Owner: Ron Garcia Santos
        */
        function get_product_by_name($name){
            $query = "SELECT * FROM products WHERE product_name=?";
            return $this->db->query($query, $this->security->xss_clean($name))->result_array();
        }

        /*
            DOCU: this function validates every input in form.
            Owner: Ron Garcia Santos
        */
        function validate_registration($product)
        {
            $this->form_validation->set_error_delimiters('<div>', '</div>');
            $this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('inventory_count', 'Inventory Count', 'required');

            if(!$this->form_validation->run()){
                return validation_errors();
            }else if($this->get_product_by_name($product)){
                return "Product already taken";
            }
        }

        /*
            DOCU: Create new product and save.
            Owner: Ron Garcia Santos
        */
        function create_product($product)
        {
            $query = "INSERT INTO products(product_name, description, price, inventory_count, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
            $values = array(
                $this->security->xss_clean($product['product_name']),
                $this->security->xss_clean($product['description']),
                $this->security->xss_clean($product['price']),
                $this->security->xss_clean($product['inventory_count'])
            );
            return $this->db->query($query, $values);
        }

        /*
            DOCU: Getting the lists of all product stored.
            Retrieve certain information specify.
            Owner: Ron Garcia Santos
        */
        function get_all_products()
        {
            $query =    "SELECT products.id AS id, product_name AS name, inventory_count AS count, sales.qty_sold AS qty_sold
                        FROM products LEFT JOIN sales ON product_id = products.id";
            return $this->db->query($query)->result_array();
        }

        /*
            DOCU: retrieve the information of product.
            Owner: Ron Garcia Santos
        */
        function get_product($id)
        {
            $query = "SELECT products.*, sales.qty_sold AS qty_sold FROM products 
            LEFT JOIN sales ON product_id = products.id WHERE products. id=?";
            return $this->db->query($query, $this->security->xss_clean($id))->row_array();
        }

        function validate_product($product)
        {
            $this->form_validation->set_error_delimiters('<div>', '</div>');
            $this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('inventory_count', 'Inventory Count', 'required');

            if(!$this->form_validation->run()){
                return validation_errors();
            }

        }

        function update_product($product, $id){
            $query = "UPDATE products SET product_name=?, products.description=?, price=?, inventory_count=?, updated_at= NOW() WHERE id=?";
            $values = array(
                $this->security->xss_clean($product['product_name']),
                $this->security->xss_clean($product['description']),
                $this->security->xss_clean($product['price']),
                $this->security->xss_clean($product['inventory_count']),
                $this->security->xss_clean($id)
            );
            return $this->db->query($query, $values);
        }

        function destroy_product($id)
        {
            $query = "DELETE FROM products WHERE id=?";
            return $this->db->query($query, $id);
        }
    }
?>