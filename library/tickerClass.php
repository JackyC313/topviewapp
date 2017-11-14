<?php
/* TickerClass Class to hold data for each ticker
 * 1) set ticker name upon creation of new TickerClass Object
 * 2) setTickerValues - parse JSON Object to create Ticker Object
 * 3) getTickerValues - return Array of Ticker members
 */
class TickerClass
{
    private $name;
    private $fifteenm;
    private $last;
    private $buy;
    private $sell;
    private $symbol;
    
    /**
     * 1) set ticker name upon creation of new TickerClass Object
     * @return void
     */
    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * 2) setTickerValues - parse JSON Object to create Ticker Object
     * @param JSON object - JSON Object structured data read in from JSON data file
     * @return void
     */
    public function setTickerValues($tickerObj)
    {
        if (is_object($tickerObj))
        {
            foreach ($tickerObj as $itemName => $itemValue)
            {
                switch ($itemName)
                {
                    case "15m":
                        $this->fifteenm = $itemValue;
                    break;
                    case "last":
                        $this->last = $itemValue;
                    break;
                    case "buy":
                        $this->buy = $itemValue;
                    break;
                    case "sell":
                        $this->sell = $itemValue;
                    break;
                    case "symbol":
                        $this->symbol = $itemValue;
                    break;
                }
            }
        }
    }

    /**
     * 3) getTickerValues - return Array of Ticker members
     * @return array - Array of Ticker members
     */
    public function getTickerValues()
    {
        return array(
            'name' => $this->name,
            'fifteenm' => $this->fifteenm,
            'last' => $this->last,
            'buy' => $this->buy,
            'sell' => $this->sell,
            'symbol' => $this->symbol,
        );
    }

}