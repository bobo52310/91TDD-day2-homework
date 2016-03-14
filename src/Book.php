<?php

namespace Tdd91;


class Book
{
    protected $series_id;
    protected $price;

    /**
     * Book constructor.
     * @param array $array
     */
    public function __construct(Array $arg)
    {
        $this->series_id = $arg['series_id'];
        $this->price = $arg['price'];
    }

    public function getSeriesId()
    {
        return $this->series_id;
    }
}