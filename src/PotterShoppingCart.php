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

        for ($i = 1; $i <= $buy_n ; $i++) {
            $this->books[] = $book->getSeriesId();
        }
    }

    public function checkOut()
    {
        // 將 books 進行分群組
        $book_grouped = $this->groupBooks($this->books);

        foreach ($book_grouped as $books) {
            $this->getDiscountByBookCount($books);
        }
    }

    private function groupBooks($arr)
    {
        $arr_unique = [];
        while ($arr != array_unique($arr)) {
            $arr_unique[] = array_unique($arr);
            $last_key = count($arr_unique) - 1;

            // 移除掉已經 unique 出來的元素
            foreach ($arr_unique[$last_key] as $del_val) {
                if(($key = array_search($del_val, $arr)) !== false) {
                    unset($arr[$key]);
                }
            }
        }

        $arr_unique[] = $arr; // 已經完成分組
        return $arr_unique;
    }
    public function getTotal()
    {
        return $this->total_price;
    }

    /**
     * @param $books
     */
    protected function getDiscountByBookCount($books)
    {
        $count_books = count($books);
        $group_price = 100 * $count_books;
        if (2 == $count_books) {
            $group_price *= 0.95;
        } elseif (3 == $count_books) {
            $group_price *= 0.9;
        } elseif (4 == $count_books) {
            $group_price *= 0.8;
        } elseif (5 == $count_books) {
            $group_price *= 0.75;
        }
        $this->total_price += $group_price;
    }
}