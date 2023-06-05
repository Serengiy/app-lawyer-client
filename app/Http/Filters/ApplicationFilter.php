<?php

namespace App\Http\Filters;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ApplicationFilter extends AbstractFilter
{
    public const DATE_FROM = 'date_from';
    public const DATE_TO = 'date_to';
    public const BY_EMAIL = 'content';
    public const BY_CATEGORY = 'category_id';


    protected function getCallbacks(): array
    {
        return [
            self::DATE_FROM => [$this, 'dateFrom'],
            self::DATE_TO => [$this, 'dateTo'],
            self::BY_EMAIL => [$this, 'content'],
            self::BY_CATEGORY => [$this, 'category'],
        ];
    }


    public function dateFrom(Builder $builder, $value)
    {
        $builder->where('created_at', '>=', Carbon::parse($value));
    }

    public function dateTo(Builder $builder, $value)
    {
        $builder->where('created_at', '<=', Carbon::parse($value));
    }

    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', '%' . $value . '%');
    }

    public function category(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

    public function newFirst(Builder $builder)
    {
        $builder->orderBy('created_at', 'desc');
    }

    public function oldFirst(Builder $builder)
    {
        $builder->orderBy('created_at', 'asc');
    }

    public function author(Builder $builder, $value)
    {
        $builder->where('user_id', $value);
    }
}

