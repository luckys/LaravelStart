<?php

use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

if (!function_exists('upload_image')) {
    /**
     * Upload image and get image filename.
     *
     * @param UploadedFile $file
     * @param string       $path
     * @param string       $event
     *
     * @return string
     */
    function upload_image($file, $path, $event = 'image.uploaded')
    {
        if (!is_null($file)) {
            $filename = sha1(time().$file->getClientOriginalName()).'.'.strtolower($file->getClientOriginalExtension());

            $file->move(public_path($path), $filename);

            event($event, [$path.$filename]);

            return $filename;
        }

        return;
    }
}

if (!function_exists('set_active')) {
    /**
     * Set active to specified selector.
     *
     * @param array|string $paths
     * @param string       $class
     *
     * @return string
     */
    function set_active($paths, $class = 'active')
    {
        foreach ((array) $paths as $path) {
            if (Request::is($path)) {
                return $class;
            }
        }
    }
}

if (!function_exists('flash')) {
    /**
     * Flash message.
     *
     * @require "laracasts/flash:~1.3"
     *
     * @param string|null $message
     *
     * @return string|object
     */
    function flash($message = null)
    {
        $flash = app('flash');

        if (is_null($message)) {
            return $flash;
        }

        return $flash->success($message);
    }
}

if (!function_exists('error_for')) {
    /**
     * Show validation for the specified field.
     *
     * @param string $field
     * @param object $errors
     *
     * @return string
     */
    function error_for($field, $errors, $template = '<div class="text-danger">:message</div>')
    {
        return $errors->first($field, $template);
    }
}

if (!function_exists('gravatar')) {
    /**
     * Gravatar URL from Email address.
     *
     * @param string $email   Email address
     * @param string $size    Size in pixels
     * @param string $default Default image [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $rating  Max rating [ g | pg | r | x ]
     *
     * @return string
     */
    function gravatar($email, $size = 60, $default = 'mm', $rating = 'g')
    {
        return 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($email)))."?s={$size}&d={$default}&r={$rating}";
    }
}

if (!function_exists('markdown')) {
    /**
     * Markdown.
     *
     * @param string $text
     *
     * @return string
     */
    function markdown($text)
    {
        return (new ParsedownExtra())->text($text);
    }
}
