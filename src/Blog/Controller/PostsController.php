<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.11.15
 * Time: 14:38
 */

namespace Blog\Controller;


use Blog\Model\PostInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class PostsController extends \BaseController
{

    /**
     * @return PostInterface
     */
    private function getModel()
    {
        return App::make('post');
    }

    public function posts()
    {
        $Post = $this->getModel();
        $page = $Post->getPage();

        return View::make('posts_list', [
            'posts' => $page
        ]);
    }

    public function post($postId)
    {
        $Post = $this->getModel();
        $page = $Post->getPost($postId);

        return View::make('post', [
            'post' => $page,
        ]);
    }

}
