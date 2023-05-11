<?php


namespace MrMinh\GoldenGate;


interface Product
{
    public function getAmazonPrice(): float;

    public function getProductWeight(): float;

    public function getWidth(): float;

    public function getHeight(): float;

    public function getDepth(): float;
}