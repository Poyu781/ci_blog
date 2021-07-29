<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Posts_api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function posts_get($post_id)
    {   
        $user_id = $this->input->get('user');
        if ($user_id != null){
            $posts = $this->posts_model->get_posts_by_user($user_id);
        }
        else{
            $posts = $this->posts_model->get_post($post_id);
        }
        if ( $posts === array() ){
            $this->response( [
                'status' => false,
                'message' => 'No such user found'
            ], 200 );
        }
        else{   
            $this->response( $posts, 200 );
        }
    }

    public function posts_delete($post_id)
    {  
        $posts = $this->posts_model->delete_posts($post_id);
        if ( $posts === TRUE ){
            $this->response( [
                'status' => TRUE,
                'message' => 'Successful delete'
            ], 200 );
        }
        else{
            $this->response( [
                'status' => false,
                'message' => 'No such post_id found'
            ], 404 );
        }
    }

    public function posts_put($post_id)
    {   
        $request_post_data = $this->input->raw_input_stream;
        $json_data = json_decode($request_post_data, true);
        $this->posts_model->put_posts($post_id,$json_data);
        $this->response( [
            'status' => TRUE,
            'message' => 'update'
        ], 200 );
    }
    
    public function posts_post()
    {   
        $request_post_data = $this->input->raw_input_stream;
        $json_data = json_decode($request_post_data, true);
        $this->posts_model->post_posts($json_data);
        $this->response( [
            'status' => TRUE,
            'message' => 'insert'
        ], 200 );
    }
}