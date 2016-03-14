<?php

class PotterShoppingCartContext extends FeatureContext
{
    protected $PotterShoppingCart;

    public function __construct()
    {
        // Arrange
        $this->PotterShoppingCart = new PotterShoppingCart();
    }

    /**
     * @Given /^第一集買了 (\d+) 本$/
     */
    public function 第一集買了N本($buy_n)
    {
        $this->PotterShoppingCart->add(
            new Book(['series_id' => 1, 'price' => 100]),
            $buy_n
        );
    }

    /**
     * @Given /^第二集買了 (\d+) 本$/
     */
    public function 第二集買了N本($buy_n)
    {
        $this->PotterShoppingCart->add(
            new Book(['series_id' => 2, 'price' => 100]),
            $buy_n
        );
    }

    /**
     * @Given /^第三集買了 (\d+) 本$/
     */
    public function 第三集買了N本($buy_n)
    {
        $this->PotterShoppingCart->add(
            new Book(['series_id' => 3, 'price' => 100]),
            $buy_n
        );
    }

    /**
     * @Given /^第四集買了 (\d+) 本$/
     */
    public function 第四集買了N本($buy_n)
    {
        $this->PotterShoppingCart->add(
            new Book(['series_id' => 4, 'price' => 100]),
            $buy_n
        );
    }

    /**
     * @Given /^第五集買了 (\d+) 本$/
     */
    public function 第五集買了N本($buy_n)
    {
        $this->PotterShoppingCart->add(
            new Book(['series_id' => 5, 'price' => 100]),
            $buy_n
        );
    }

    /**
     * @When /^結帳$/
     */
    public function 結帳()
    {
        $this->PotterShoppingCart->checkOut();
    }

    /**
     * @Then /^價格應為 (\d+) 元$/
     */
    public function 驗證價格($expected_price)
    {
        // Act
        $actual_price = $this->PotterShoppingCart->getTotal();

        // Assert
        PHPUnit_Framework_Assert::assertEquals($expected_price, $actual_price);
    }
}
