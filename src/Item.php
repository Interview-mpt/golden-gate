<?php


namespace MrMinh\GoldenGate;


use JetBrains\PhpStorm\Pure;

class Item implements Product
{
    use ShippingFee;

    public const AmazonPrice = 'amazonPrice';
    public const ProductWeight = 'productWeight';
    public const Width = 'width';
    public const Height = 'Height';
    public const Depth = 'Depth';

    private array $_info;

    public function __construct(array $info)
    {
        $this->_info = $info;
    }

    public function getProductWeight(): float
    {
        return $this->_info[self::ProductWeight] ?? 0;
    }

    public function getWidth(): float
    {
        return $this->_info[self::Width] ?? 0;
    }

    public function getHeight(): float
    {
        return $this->_info[self::Height] ?? 0;
    }

    public function getDepth(): float
    {
        return $this->_info[self::Depth] ?? 0;
    }

    #[Pure] public function getDimensionCoefficient(): float
    {
        return Coefficient::DimensionCoefficient;
    }

    #[Pure] public function getWeightCoefficient(): float
    {
        return Coefficient::WeightCoefficient;
    }

    public function getAmazonPrice(): float
    {
        return $this->_info[self::AmazonPrice] ?? 0;
    }

    public function getGrossPrice(): float
    {
        $shippingFee = $this->getShippingFees() + $this->getAmazonPrice();
        return Common::round($shippingFee);
    }
}