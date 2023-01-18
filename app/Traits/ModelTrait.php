<?php
declare (strict_types = 1);

namespace App\Traits;

use App\Traits\Literate;
use Illuminate\Support\Str;

trait ModelTrait
{
    use Literate;

    protected $guarded_ = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
        '_token',
        '_next',
    ];

    public static function findOrFail_(int $user_id)
    {
        return self::where('user_id', $user_id)->first();
    }

    public static function latest_(string $column = 'created_at')
    {
        return self::latest($column)->first();
    }

    public static function limit_(int $limit = 10)
    {
        return self::orderBy('id', 'desc')->limit($limit)->get();
    }

    public static function limit__(int $limit = 10)
    {
        return self::limit_($limit)->toArray();
    }

    public static function paginate_(int $limit = 25)
    {
        return self::orderBy('id', 'desc')->paginate($limit);
    }

    public static function paginate__(int $limit = 25)
    {
        return self::paginate_($limit)->toArray();
    }

}
