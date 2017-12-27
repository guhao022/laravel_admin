<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/14
 * Time: 下午5:45
 */

namespace Modules\Admin\Controllers;

use Modules\Admin\Models\Joke;

class JokeController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $jokes = Joke::all();

        return admin_view("joke.index", ["jokes" => $jokes]);
    }

}