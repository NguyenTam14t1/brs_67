<?php

namespace App\Repositories\MySQL;

use Auth;
use App\Models\RequestBook;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Exception;

class MySQLRepository extends BaseRepository implements MySQLInterface
{
    /**
    * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RequestBook $requestBook)
    {
        $this->model = $requestBook;
    }

    /**
    * function getProduct.
     *
     * @return imageName
     */
    public function getConnection()
    {
        echo "get connect MySQL success! ";
    }

    
}