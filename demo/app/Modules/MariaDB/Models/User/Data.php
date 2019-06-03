<?php

namespace App\Modules\MariaDB\Models\User;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Data extends Model {

    /**
     * @var string The table name
     */
    protected $table = 'user_data';

    /**
     * @var array Mass-assignable attributes
     */
    protected $fillable = [
        'user_id',
        'data'
    ];

    /**
     * @var array Define casts for data types
     */
    protected $casts = [
        'data'    => 'array',
        'user_id' => 'integer'
    ];

    /**
     * Scope data by a particular user
     *
     * @param Builder $builder
     * @param User    $user
     *
     * @return Builder
     */
    public function scopeUser(Builder $builder, User $user) : Builder {
        return $builder->where('user_id', '=', $user->id);
    }

    /**
     * Delete a JSON path from the data object
     *
     * @param string $path
     *
     * @return bool
     */
    public function deleteKey($path) : bool {
        return DB::table($this->table)->update(['data' => DB::raw('JSON_REMOVE(data, "$.' . $path . '")')]) > 0;
    }

    /**
     * Resolve dot notation paths to object paths
     *
     * Eg. data.contact.phone => data->contact->phone
     *
     * @param $path
     * @param string $separator
     *
     * @return string
     */
    public static function path($path, $separator = '.') : string {
        return 'data->' . str_replace($separator, '->', $path);
    }

}
