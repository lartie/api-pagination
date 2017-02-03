<?php

namespace App\Core;

use Illuminate\Support\Collection;

/**
 * Class ApiPagination
 * @package App\Core
 */
final class ApiPagination
{
    /**
     * Determine if there are more items in the data source.
     *
     * @return bool
     */
    private $hasMore;

    /**
     * Create a new paginator instance.
     *
     * @param Collection $items
     * @param int $perPage
     */
    public function __construct(Collection $items, int $perPage)
    {
        $this->perPage = $perPage;
        $this->items = $items;

        $this->checkForMorePages();
    }

    /**
     * Check for more pages. The last item will be sliced off.
     *
     * @return void
     */
    private function checkForMorePages()
    {
        $this->hasMore = count($this->items) > $this->perPage;

        $this->items = $this->items->slice(0, $this->perPage);
    }

    /**
     * Determine if there are more items in the data source.
     *
     * @return bool
     */
    public function hasMorePages()
    {
        return $this->hasMore;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'items' => $this->items,
            'hasNextPage' => $this->hasMorePages(),
        ];
    }

    /**
     * @return Collection
     */
    public function toCollection() : Collection
    {
        return new Collection($this->toArray());
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }
}