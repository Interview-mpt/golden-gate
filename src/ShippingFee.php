<?php


namespace MrMinh\GoldenGate;


trait ShippingFee
{
    /**
     * get fee by dimension
     * @return float
     */
    public function feeByDimension(): float
    {
        return Common::round(
            $this->getWidth() * $this->getHeight() * $this->getDepth() * $this->getDimensionCoefficient()
        );
    }

    /**
     * Get fee by weight
     * @return float
     */
    public function feeByWeight(): float
    {
        return Common::round($this->getProductWeight() * $this->getWeightCoefficient());
    }

    /**
     * Get max shipping by action start with feeBy..
     * @return float
     */
    public function getShippingFees(): float
    {
        $fees = [];
        foreach (get_class_methods($this) as $action) {
            if (!str_starts_with($action, 'feeBy')) {
                continue;
            }
            array_push($fees, Common::round($this->{$action}()));
        }
        return max($fees);
    }
}