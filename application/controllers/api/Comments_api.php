<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Comments_api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function comments_get()
    {   

        $post_id = $this->input->get('posts');
        // $comments = $this->posts_model->get_posts($post_id);
        $comments = $this->comments_model->get_comments($post_id);
        $this->response( $comments, 200 );

    }
    public function posts_delete($post_id)
    {   
        var_dump($this->input->post());

        $posts = $this->posts_model->delete_posts($post_id);
        if ( $posts === TRUE )
        {
            $this->response( [
                'status' => TRUE,
                'message' => 'Sucessful delte'
            ], 200 );
        }
        else
        {
            $this->response( [
                'status' => false,
                'message' => 'No such post_id found'
            ], 404 );
        }
    }
    public function posts_post($post_id)
    {   
        $request_post_data = $this->input->raw_input_stream;
        $json_data = json_decode($request_post_data, true);
        $this->posts_model->post_posts($post_id,$json_data);
        $this->response( [
            'status' => TRUE,
            'message' => 'update'
        ], 200 );
    }
}