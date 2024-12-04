<?php

namespace App\Utils;

use JasonGrimes\Paginator;

class PaginatorFactory{
    public static function create(int $total_items, int $items_per_page, int $current_page, string $url_pattern) : Paginator
    {
        return new Paginator($total_items, $items_per_page, $current_page, $url_pattern);
    }
}