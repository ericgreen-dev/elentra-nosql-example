<?php

namespace App\Modules\MongoDB\Models;

use Jenssegers\Mongodb\Eloquent\Model;


class Document extends Model {
    
    /**
     * @var string The connection name
     */
    protected $connection = 'mongodb';

    /**
     * @var string The collection name
     */
    protected $collection = 'documents';

    /**
     * @var string Mass-assignable attributes
     */
    protected $fillable = [
        'title',
        'content',
        'version'
    ];

}
