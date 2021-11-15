<?php declare(strict_types = 1);
namespace noxkiwi\money;

/**
 * I am a Currency object.
 *
 * I consist of a code and a symbol.
 *
 * @package      noxkiwi\money
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
final class Exchanged
{
    /** @var \noxkiwi\money\Exchange I am the exchange rate conversion object that was responsible for the calculation. */
    private Exchange $exchange;
    /** @var \noxkiwi\money\Money I am the Money object of the original money. */
    private Money $source;
    /** @var \noxkiwi\money\Money I am the Money object that was calculated. */
    private Money $target;

    /**
     * Exchanged constructor.
     *
     * @param \noxkiwi\money\Money    $source   I am the Money object of the original money.
     * @param \noxkiwi\money\Money    $result   I am the Money object that was calculated.
     * @param \noxkiwi\money\Exchange $exchange I am the exchange rate conversion object.
     */
    public function __construct(Money $source, Money $result, Exchange $exchange)
    {
        $this->exchange = $exchange;
        $this->source   = $source;
        $this->target   = $result;
    }

    /**
     * I will return the target Money of the object.
     * @return \noxkiwi\money\Money
     */
    public function getTarget(): Money
    {
        return $this->target;
    }

    /**
     * I will return the source Money of the object.
     * @return \noxkiwi\money\Money
     */
    public function getSource(): Money
    {
        return $this->source;
    }

    /**
     * I will return the Exchange of the object.
     * @return \noxkiwi\money\Exchange
     */
    public function getExchange(): Exchange
    {
        return $this->exchange;
    }
}
