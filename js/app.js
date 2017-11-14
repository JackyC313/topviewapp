$(function() {
    // Handle User Defined Limit, Prevent Form Submission as there is no need for page reload
    $("#limitForm").submit(function( event ) {
        limitForm();
        event.preventDefault();
    });

    // Run limitForm to limit initial display
    limitForm();
});

/* limitForm function
 *
 * Uses JQuery to look through DOM to:
 * 1) Get default Ticker Limit
 * 2) Count number of Ticker Items
 * 3) Loop through already loaded Ticker Table
 * 4) and finally add a Hidden class to hide all other entries past limit
 */
function limitForm() {
    var rowLimit = $('#tickerLimit').val();
    var rowCount = $('#tickerTable > tbody > tr').length;
    console.log('rowLimit is ' + rowLimit + ' rowCount is ' + rowCount);
    $('#tickerTable > tbody > tr').each(function(counter){
        $this = $(this);
        if(counter >= rowLimit)
        {
            console.log('Add @ ' + counter + ' ' + rowLimit);
            $this.addClass('hidden');
        } else {
            console.log('Remove @ ' + counter + ' ' + rowLimit);
            $this.removeClass('hidden');
        }
        counter++;
    });

}