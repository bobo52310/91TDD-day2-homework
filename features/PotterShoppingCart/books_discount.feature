Feature: PotterShoppingCart
  In order to 提供最便宜的價格給來買書的爸爸媽媽
  As a 佛心的出版社老闆
  I want to 設計一個哈利波特的購物車

  Scenario: 第一集買了一本，其他都沒買，價格應為100*1=100元
    Given 第一集買了 1 本
    And 第二集買了 0 本
    And 第三集買了 0 本
    And 第四集買了 0 本
    And 第五集買了 0 本
    When 結帳
    Then 價格應為 100 元

  Scenario: 第一集買了一本，第二集也買了一本，價格應為100*2*0.95=190
    Given 第一集買了 1 本
    And 第二集買了 1 本
    And 第三集買了 0 本
    And 第四集買了 0 本
    And 第五集買了 0 本
    When 結帳
    Then 價格應為 190 元