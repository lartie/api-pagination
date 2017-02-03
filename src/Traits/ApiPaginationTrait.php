<?php

namespace App\Traits;

use App\Core\ApiPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Class ApiPaginatorTrait
 * @package App\Traits
 */
trait ApiPaginationTrait
{
    /**
     * Scope a query to only include popular users.
     *
     * @param Builder $query
     * @param int $limit
     * @param int $offset
     * @return Collection
     */
    public function scopeApiPaginate(Builder $query, int $limit = 5, int $offset = 0) : Collection
    {
        $query->skip($offset)->take($limit + 1);

        $pagination = new ApiPagination($query->get(), $limit);

        return $pagination->toCollection();
    }
}