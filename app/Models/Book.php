<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'publisher',
        'author',
        'url',
        'code',
        'price,'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, UserBook::class);
    }

    public function scopeByCode(Builder $builder, $code)
    {
        return $builder
            ->where('code', $code)
            ->first();
    }

    public function scopeGetLatest(Builder $builder, $limit = 5)
    {
        return $builder
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public function scopeSearch(Builder $builder, string $word = null)
    {
        if (is_null($word)) {
            return collect([]);
        }

        $search_columns = $this->fillable;
        foreach ($search_columns as $column) {
            // https://www.php.net/manual/ja/function.reset.php
            $where = $column === reset($search_columns) ? 'where' : 'orWhere';
            $builder->$where($column, 'iLike', "%$word%");
        }

        return $builder->get();
    }
}
