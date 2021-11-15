<?php declare(strict_types = 1);
namespace noxkiwi\money;

use DateTime;

/**
 * I am THE Exchange object.
 * An exchange object consists of both currencies it exists for,
 * next to the exchange rate represented by a float value.
 *
 * Also there is a DateTime object that marks the timestamp when the rate was derived.
 *
 * @package      noxkiwi\money
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
final class Exchange
{
    /** @var \noxkiwi\money\Currency I am the source Currency the Exchange is valid for. */
    private Currency $source;
    /** @var \noxkiwi\money\Currency I am the target Currency the Exchange is valid for. */
    private Currency $target;
    /** @var \DateTime I am the timestamp when the Exchange rate was calculated. */
    private DateTime $timestamp;
    /** @var float I am the exchange rate. */
    private float $rate;
    /** @var string I am the source that is responsible for the given rate. */
    private string $author;

    /**
     * I will solely construct the Exchange object.
     *
     * @param \noxkiwi\money\Currency $from     I am the source Currency the Exchange is valid for.
     * @param \noxkiwi\money\Currency $target   I am the target Currency the Exchange is valid for.
     * @param \DateTime               $dateTime I am the timestamp when the Exchange rate was calculated.
     * @param float                   $rate     I am the exchange rate.
     * @param string                  $source   I am the source that is responsible for the given rate.
     */
    public function __construct(Currency $from, Currency $target, DateTime $dateTime, float $rate, string $source)
    {
        $this->source    = $from;
        $this->target    = $target;
        $this->timestamp = $dateTime;
        $this->rate      = $rate;
        $this->author    = $source;
    }

    /**
     * I will return the rate.
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * I will return the DateTime obejct when the exchange was gathered.
     * @return \DateTime
     */
    public function getTimestamp(): DateTime
    {
        return $this->timestamp;
    }

    /**
     * I will return the target Currency.
     * @return \noxkiwi\money\Currency
     */
    public function getTarget(): Currency
    {
        return $this->target;
    }

    /**
     * I will return the source Currency.
     * @return \noxkiwi\money\Currency
     */
    public function getSource(): Currency
    {
        return $this->source;
    }

    /**
     * I will return who generated the Exchange.
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }
}
