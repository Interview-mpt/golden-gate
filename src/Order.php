<?php


namespace MrMinh\GoldenGate;


use JetBrains\PhpStorm\ArrayShape;

class Order
{
    public function items()
    {
        $items = [
            new Diamond($this->initItemInfo(100, 2)),
            new Item(
                $this->initItemInfo(150, 4, 2, 2, 2)
            )
        ];

        echo "Gross Price:: ". Common::currencyFormat($this->getGrossPrice($items));
        echo "\nThank you so much!\n";
    }

    #[ArrayShape([
        Item::AmazonPrice => "float",
        Item::ProductWeight => "float",
        Item::Width => "float|int",
        Item::Height => "float|int",
        Item::Depth => "float|int"
    ])] public function initItemInfo(
        float $amazonPrice,
        float $productWeight,
        ?float $width = 0,
        ?float $height = 0,
        ?float $dept = 0
    ): array {
        return [
            Item::AmazonPrice => $amazonPrice,
            Item::ProductWeight => $productWeight,
            Item::Width => $width ?? 0,
            Item::Height => $height ?? 0,
            Item::Depth => $dept ?? 0
        ];
    }

    /**
     * Get Gross Price from init
     * @param  array  $items
     * @return float
     */
    public function getGrossPrice(array $items): float
    {
        $price = 0;
        foreach ($items as $key => $item) {
            /** @var Item $item */
            $price += $result = $item->getGrossPrice();
            echo "Item Price $key:: " . Common::currencyFormat($result) . "\n";
        }
        return $price;
    }

}
