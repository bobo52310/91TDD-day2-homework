<?php

namespace Tdd91;


class PotterShoppingCart
{
    protected $books = [];

    protected $total_price = 0;

    protected $discount = [
        1 => 1.0,
        2 => 0.95,
        3 => 0.9,
        4 => 0.8,
        5 => 0.75,
    ];

    public function add(Book $book, $buy_n)
    {
        for ($i = 1; $i <= $buy_n; $i++) {
            $this->books[] = $book->getSeriesId();
        }
    }

    public function checkOut()
    {
        // 將 books 進行分群組
        $book_grouped = $this->groupBooks($this->books);

        // 分組計算折扣金額
        foreach ($book_grouped as $books) {
            $this->getDiscountByBookCount($books);
        }
    }

    /**
     * ex. 將 $books = [1,2,2,3,3,3] 分組成以下3組，方便分別計算折扣金額
     * $book_unique = [
     *      [1, 2, 3],
     *      [2, 3],
     *      [3],
     * ];
     * @param $books
     * @return array
     */
    private function groupBooks($books)
    {
        $book_unique = [];
        while ($books != array_unique($books)) {
            $book_unique[] = array_unique($books);
            $last_key = count($book_unique) - 1;

            $books = array_diff_key($books, $book_unique[$last_key]);
        }

        $book_unique[] = $books;
        return $book_unique;
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
        $group_price *= $this->discount[$count_books];

        $this->total_price += $group_price;
    }
}