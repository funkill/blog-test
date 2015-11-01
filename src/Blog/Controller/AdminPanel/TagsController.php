<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 01.11.15
 * Time: 0:21
 */

namespace Blog\Controller\AdminPanel;

use Blog\Exception\InvalidFormException;
use Blog\Model\TagInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class TagsController extends \BaseController
{

    /**
     * @return TagInterface
     */
    private function getModel()
    {
        return App::make('tag');
    }

    public function tags()
    {
        $tags = $this
            ->getModel()
            ->getPage()
        ;

        return View::make('admin/tag/tags', [
            'tags' => $tags,
        ]);
    }

    public function createTag()
    {
        try {
            $this
                ->getModel()
                ->createTag(Input::all())
            ;

        } catch (InvalidFormException $IFE) {
            $errors = $IFE->getErrors();

            return Redirect::route('admin_tags')->withErrors($errors);
        }

        return Redirect::route('admin_tags');
    }

    public function updateTag($tagId)
    {
        try {
            $this
                ->getModel()
                ->updateTag($tagId, Input::all())
            ;
        } catch (InvalidFormException $IFE) {
            $result = $IFE->getErrors();

            return Redirect::route('admin_tags')->withErrors($result);
        }

        return Redirect::route('admin_tags');
    }

    public function deleteTag($tagId)
    {
        if (!$this->getModel()->deleteTag($tagId)) {
            return JsonResponse::create(['result' => 'fail']);
        }

        return JsonResponse::create(['result' => 'success']);
    }

}