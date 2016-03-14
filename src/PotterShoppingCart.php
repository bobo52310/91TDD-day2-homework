<?php

namespace Tdd91;


class PotterShoppingCart
{
    protected $books = [];

    protected $total_price = 0;

    /**
     * PotterShoppingCart constructor.
     */
    public function __construct()
    {
    }

    public function add(Book $book, $buy_n)
    {
        if (0 == $buy_n) return false;

        for ($i = 1; $i <= $buy_n; $i++) {
            $this->books[] = $book;
        }
    }

    public function checkOut()
    {
        $count_books = count($this->books);
        $this->total_price = 100 * $count_books;
        if (2 == $count_books) {
            $this->total_price *= 0.95;
        }
    }

    public function getTotal()
    {
        return $this->total_price;
    }
}