<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 14:14
 */


App::bind('post', \Blog\Handler\PostHandler::class);
App::bind('user', \Blog\Handler\UserHandler::class);
App::bind('tag', \Blog\Handler\TagHandler::class);