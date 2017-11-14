<?php
/* SiteFacade controller to take care of site functionality
 * 1) set ticker data file path upon creation of new SiteFacade Object
 * 2) readFiletoJsonObj - read ticker data file from the set path
 * 3) setTickerArray - create TickerArray of Ticker Objects
 * 4) showTicker - show Ticker Table based on Ticker Array of Ticker Objects

 * 5) runFacade - runs everything together at once readFiletoJsonObj, setTickerArray, and showTicker
 */

class SiteFacade
{
    private $display; 
    private $tickerPath;
    private $tickerJsonObj;
    private $tickerArray;
    
    /**
     * 1) set ticker data file path upon creation of new SiteFacade Object
     * @return void
     */
    function __construct($datafilePath)
    {
        $this->display = true; // Display table on showTicker method
        $this->tickerPath = $datafilePath;
    }

    /**
     * 2) readFiletoJsonObj - read ticker data file from the set path
     * @return void
     */
    protected function readFiletoJsonObj() 
    {
        if(($this->tickerPath === null) || ($this->tickerPath == ''))
        {
            // TODO: Error Handling
            echo "tickerPath Not Set!";
            return;
        }
        $this->tickerJsonObj = json_decode(file_get_contents($this->tickerPath));
    }

    /**
     * 3) setTickerArray - create TickerArray of Ticker Objects
     * @return array - TickerArray of Ticker Obj
     */
    protected function setTickerArray()
    {
        if(is_object($this->tickerJsonObj))
        {
            foreach($this->tickerJsonObj as $itemName => $jsonObj)
            {
                $tickerObj = new tickerClass($itemName);
                $tickerObj->setTickerValues($jsonObj);
                $this->tickerArray[] = $tickerObj;
            }
            return $this->tickerArray;
        } else {
            return array();
        }
    }

    /**
     * 4) showTicker - show Ticker Table based on Ticker Array of Ticker Objects
     * - $this->display used to determine whether this method does the display also (default is true)
     * @return string - Ticker Table HTML code
     */
    protected function showTicker()
    {
        $templateHeader = 'library/templates/tickerTableHeader.tpl';
        $templateItems = 'library/templates/tickerTableItem.tpl';
        $templateFooter = 'library/templates/tickerTableFooter.tpl';
        ob_start();
        if (is_array($this->tickerArray) && count($this->tickerArray) > 0)
        {
            include $templateHeader;
            foreach($this->tickerArray as $tickerItem)
            {
                $tickerItems = $tickerItem->getTickerValues();
                foreach ($tickerItems as $key => $value) {
                    ${$key} = $value;
                }
                include $templateItems;
            }
            include $templateFooter;
        } else {

        }
        $templateDisplay = ob_get_clean();
        if($this->display)
        {
            echo $templateDisplay;
        }
        return $templateDisplay;
    }

    /**
     * 5) runFacade - runs everything together at once readFiletoJsonObj, setTickerArray, and showTicker
     * @input boolean - used to determine whether showTicker does the display also (default is true)
     * @return string - Ticker Table HTML code
     */
    public function runFacade($display = true) {
        $this->display = $display;
        $this->readFiletoJsonObj();
        $this->setTickerArray();
        return $this->showTicker();
    }
}