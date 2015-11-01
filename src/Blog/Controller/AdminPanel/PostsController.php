<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 01.11.15
 * Time: 0:21
 */

namespace Blog\Controller\AdminPanel;

use Blog\Exception\InvalidFormException;
use Blog\Model\PostInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        $posts = $this
            ->getModel()
            ->getPage()
        ;

        return View::make('admin/post/posts', [
            'posts' => $posts,
        ]);
    }

    public function post($postId)
    {
        $post = $this
            ->getModel()
            ->getPost($postId)
        ;

        return View::make('admin/post/post', [
            'post' => $post,
        ]);
    }

    public function newPost()
    {
        return View::make('admin/post/post');
    }

    public function createPost()
    {
        try {
            $postId = $this
                ->getModel()
                ->createPost(Auth::id(), Input::all())
            ;

        } catch (InvalidFormException $IFE) {
            return Redirect::route('admin_post_create_page')->withErrors($IFE->getErrors());
        }

        return Redirect::route('admin_post', ['post' => $postId]);
    }

    public function updatePost($postId)
    {
        try {
            $this
                ->getModel()
                ->updatePost($postId, Input::all())
            ;
        } catch (InvalidFormException $IFE) {
            return Redirect::route('admin_post', ['post' => $postId])->withErrors($IFE->getErrors());
        }

        return Redirect::route('admin_post', ['post' => $postId]);
    }

    public function deletePost($postId)
    {
        if (!$this->getModel()->deletePost($postId)) {
            return JsonResponse::create(['result' => 'fail']);
        }

        return JsonResponse::create(['result' => 'success']);
    }

}