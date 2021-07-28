<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Posts_api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function posts_get()
    {   
        $user_id = $this->input->get('user');
        $posts = $this->posts_model->get_posts($user_id);
        if ( $posts === array() )
        {
            $this->response( [
                'status' => false,
                'message' => 'No such user found'
            ], 404 );
        }
        else
        {   
            $this->response( $posts, 200 );
        }
    }
    public function posts_delete($post_id)
    {   
        $posts = $this->posts_model->delete_post($post_id);
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
}