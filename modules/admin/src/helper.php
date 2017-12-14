<?php

if (!function_exists('admin_asset')) {

    /**
     * @param $url
     *
     * @param bool $secure
     *
     * @return string
     */
    function admin_asset($url, $secure = false)
    {
        return asset('packages/admin/' . config('admin.theme') . $url, $secure);
    }
}

if (! function_exists('admin_view')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string  $view
     * @param  array   $data
     * @param  array   $mergeData
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function admin_view($view = null, $data = [], $mergeData = [])
    {
        return view('admin::' . config('admin.theme') . '.' . $view, $data, $mergeData);
    }
}

if (!function_exists('admin_url')) {

    /**
     * Get admin url.
     *
     * @param string $path
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function admin_url($path = '')
    {
        return url(admin_base_path($path));
    }
}

if (!function_exists('admin_base_path')) {
    /**
     * Get admin base url.
     *
     * @param string $path
     *
     * @return string
     */
    function admin_base_path($path = '')
    {
        $prefix = '/'.trim(config('admin.route.prefix'), '/');

        $prefix = ($prefix == '/') ? '' : $prefix;

        return $prefix.'/'.trim($path, '/');
    }
}
