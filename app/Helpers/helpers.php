<?php


function asset_url($asset = '', $hasLocale = false): string
{
    return $hasLocale
        ? asset(sprintf('dash/assets/%s/%s', trim($asset, '/')))
        : asset(sprintf('dash/assets/%s', trim($asset, '/')));
}

function asset_front_url($asset = '', $hasLocale = false): string
{
    return $hasLocale
        ? asset(sprintf('frontend/dist/assets/%s/%s', trim($asset, '/')))
        : asset(sprintf('frontend/dist/assets/%s', trim($asset, '/')));
}



function route_is($pattern = null, $success = '', $fail = '')
{
    return $pattern
        ? (request()->routeIs($pattern) ? $success : $fail) : false;
}

function router($path, $parameters = [])
{
    // Start with the locale parameter
    // $routeParams = ['locale' => getCurrentLocale()];
    // $routeParams = [];
    $routeParams = [];

    // Merge the additional parameters into $routeParams
    if ($parameters) {
        $routeParams = array_merge($routeParams, $parameters);
    }

    if (!empty($routeParams)) {
        return route($path, $routeParams);
    } else {
        return route($path);
    }
}

function redirectLive($path)
{
    return  redirect()->to('/' . 'dash' . '/' . $path);

    // return  redirect()->to('/' . getCurrentLocale() . '/' . 'dash' . '/' . $path);
}



function uploadImage($model, $img, $collectshion)
{
    // Check if there's an existing image, and delete it if it exists
    if ($model->hasMedia($collectshion)) {
        $model->getMedia($collectshion)->each(function ($media) {
            $media->delete();
        });
    }
    // Add the new image with its original name
    $model->addMedia($img->getRealPath())
        ->usingFileName($img->getClientOriginalName())
        ->toMediaCollection($collectshion);
}

function deleteImage($model, $collectshion)
{
    // Check if there's an existing image, and delete it if it exists
    if ($model->hasMedia($collectshion)) {
        $model->getMedia($collectshion)->each(function ($media) {
            $media->delete();
        });
    }
}

function getCurrentLocale()
{
    //   return LaravelLocalization::getCurrentLocale();
    return app()->getLocale() ?? 'en';
}





function getDirection()
{
    return  getCurrentLocale() == 'ar' ? 'rtl' : "ltr";
}

function prepareLocalizedData($ar, $en)
{
    return json_encode(['ar' => $ar, 'en' => $en], JSON_UNESCAPED_UNICODE);
}
