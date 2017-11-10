$(document).ready(function()
{

    var selected_dates = new Array();
        // get all the events from the database using AJAX
        selected_dates = getSelectedDates();
    
    var hovered_date = getHoveredDate();
    
/*    tried this to add an individual class to each <td> hoping that we could then rettrieve this information on hover
    and thence retrieve information from the mysql events table to show in the dialog box

    $('#date').datepicker({
    beforeShowDay: function(date) {
        var dateString = 'date-'+date.getDate()+'-'+date.getMonth()+'-'+date.getFullYear();  
        return [true, dateString, ''];
    }
});    */

    $('#datepicker').datepicker({
        dateFormat: 'yy-m-d',
        inline: true,
    /* onSelect freezes the dialog box and populates with a link
        want to populate the dialog on hover and then freeze so that link can be followed*/    
        onSelect: function(date) {
            $('#dialog').dialog({ autoOpen: false });
            //var detail = $(".ui-state-default.ui-state.hover").html();
            $('#dialog').attr('title', "changed");
            $('#dialog').html( '<a href="http://www.xxx/addoreditevent.php?id=1">' + "<span style='color: #7f7fff; font-weight: lighter;'>" + '(edit)  ' + '</span>' + selected_dates +'</a>');
            //make sure we have same functionality when dialog is closed by refreshing the page
            $('#dialog').dialog({
                close: function(event, ui) {
                location.reload();    
                }
            });
            //now open the dialog
            $('#dialog').dialog('open');
            }
            
    });
    



   $('#dialog').attr('title', hovered_date);
    $('#dialog').html( '<a href="http://www.xxx/addoreditevent.php?id=2">' + "<span style='color: #7f7fff; font-weight: lighter;'>" + '(edit)  ' + '</span>' + selected_dates +'</a>');
        
    var dlg = $('#dialog').dialog({
        autoOpen: false,
        draggable: false,
        resizable: false,
        width: 350
    });    


    $("a").mouseover(function() {
      dlg.dialog("open");
    }).mousemove(function(event) {
      dlg.dialog("option", "position", {
        my: "left top",
        at: "right bottom",
        of: event,
        offset: "20 20"
      });
    }).mouseout(function() {
        dlg.dialog("close");
    });


        function getSelectedDates()
    {
        /* following code does retrive information from mysql - have commented out for testing
        
        var the_selected_dates = new Array();
        $.ajax(
        {
        url: 'calendarevents.php',
        dataType: 'json',
        async: false,
        success: function(data)
        {
                $.each(data, function(n, val)
            {
            the_selected_dates[val.dateevent] = val;
            });
        }
        });
        return the_selected_dates;*/
        return "event ng malupit";
    }
    
    function getHoveredDate()
    {
        
        return "sample event";
    }

});
