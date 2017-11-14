# TopView App

## Project Description
Develop a simple table of values presenting data from https://blockchain.info/ticker  

Back-end: Using Object Oriented PHP, fetch and display the data. Provide the user with options to limit the number of results.  

Front-end: Once the data is displayed, the table should be able to refresh without a full page reload, for example to change the number of results to be displayed. The content displayed should be responsive for mobile and desktop.
Provide access to the see the code and a link to see the program running.

## Summary of Development

###Ticker Class
```
    Name
    fifteenm
    last
    buy
    sell
    symbol
```

1. Create Ticker Class to:
    * set ticker name upon creation of new TickerClass Object
    * setTickerValues - create Ticker Object based on 
    * getTickerValues - return Array of Ticker members

2. Create SiteFacade Class to:
    * set ticker data file path upon creation of new SiteFacade Object
    * readFiletoJsonObj - read ticker data file from the set path
    * setTickerArray - create TickerArray of Ticker Objects
    * showTicker - show Ticker Table based on Ticker Array of Ticker Objects
    * run it all together in a nice neat package

3. Use jQuery to 
    * display Ticker Items in Table format
    * allow user to change number of results

4. Added some Error Handling for (invalid/missing source file)

5. Added Table Responsive (No More Tables found @ https://elvery.net/demo/responsive-tables/)

## Developer Notes
This probably would have been done easier using purely front end code, something like a JS Framework to read directly from the JSON data file, and manipulate display also with data binding to input fields to update display also w/o refreshing the page. However, this was coded with PHP in this way to specifically address what I thought the Project Description was asking for (using PHP to get data, store into objects, and display on the page, and THEN use front end JS to manipulate display limit) .
