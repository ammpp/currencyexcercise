<?php

namespace App\Entity;

use App\Repository\TransactionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionsRepository::class)
 */
class Transactions extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    protected $paymentMethod;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $transactionDeposit;

    /**
     * @ORM\Column(type="bigint")
     */
    protected $timestamp;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=2)
     */
    protected $baseAmount;

    /**
     * @ORM\Column(type="string", length=3)
     */
    protected $baseCurrency;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=2)
     */
    protected $targetAmount;

    /**
     * @ORM\Column(type="string", length=3)
     */
    protected $targetCurrency;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=6)
     */
    protected $exchangeRate;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $clientIp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function isTransactionDeposit(): ?bool
    {
        return $this->transactionDeposit;
    }

    public function setTransactionDeposit(bool $transactionDeposit): self
    {
        $this->transactionDeposit = $transactionDeposit;

        return $this;
    }

    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }

    public function setTimestamp(string $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getBaseAmount(): ?string
    {
        return $this->baseAmount;
    }

    public function setBaseAmount(string $baseAmount): self
    {
        $this->baseAmount = $baseAmount;

        return $this;
    }

    public function getBaseCurrency(): ?string
    {
        return $this->baseCurrency;
    }

    public function setBaseCurrency(string $baseCurrency): self
    {
        $this->baseCurrency = $baseCurrency;

        return $this;
    }

    public function getTargetAmount(): ?string
    {
        return $this->targetAmount;
    }

    public function setTargetAmount(string $targetAmount): self
    {
        $this->targetAmount = $targetAmount;

        return $this;
    }

    public function getTargetCurrency(): ?string
    {
        return $this->targetCurrency;
    }

    public function setTargetCurrency(string $targetCurrency): self
    {
        $this->targetCurrency = $targetCurrency;

        return $this;
    }

    public function getExchangeRate(): ?string
    {
        return $this->exchangeRate;
    }

    public function setExchangeRate(string $exchangeRate): self
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    public function getClientIp(): ?string
    {
        return $this->clientIp;
    }

    public function setClientIp(string $clientIp): self
    {
        $this->clientIp = $clientIp;

        return $this;
    }
}
