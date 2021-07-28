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
}