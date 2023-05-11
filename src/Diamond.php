<?php


namespace MrMinh\GoldenGate;


use JetBrains\PhpStorm\Pure;

class Diamond extends Item
{
    #[Pure] public function __construct(array $info)
    {
        parent::__construct($info);
    }

    /**
     * Fee Product type
     * @return float
     */
    public function feeByProductType(): float
    {
        return Common::round($this->getProductWeight() * Coefficient::DiamondWeightCoefficient);
    }


}