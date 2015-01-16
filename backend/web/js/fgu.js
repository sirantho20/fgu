jQuery( document ).ready(function() {
         jQuery('#report-dates').daterangepicker(
                {
                    ranges: {
                       'Today': [moment(), moment()],
                       'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                       'Last 7 Days': [moment().subtract('days', 6), moment()],
                       'Last 30 Days': [moment().subtract('days', 29), moment()],
                       'This Month': [moment().startOf('month'), moment().endOf('month')],
                       'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                    },
                    startDate: moment().subtract('days', 29),
                    endDate: moment(),
                    applyClass: 'btn-primary glyphicon glyphicon-check',
                    separator: ' to ',
                    format: 'YYYY-MM-DD',
                    cancelClass: 'btn-warning glyphicon glyphicon-ban-circle',
                    showDropdowns: true,
                    showWeekNumbers: true,
                    minDate: moment().subtract('years', 2),
                    maxDate: moment()
              }
                );
        
    $('#genset-id').change(function(){ 
     
     // Genset tank updates
     $.getJSON('/siteactions/mctankprops?genset='+this.value,function( data ){
        $('#genProps').html('Tank: <a href="#">'+data.height+' x '+data.width+' x '+data.bredth+'</a> | Type: <a href="#">'+data.tank+'</a>');
     });
     
    });
    
     // Meter type updates
     $('#site-id').change(function(){
        $.getJSON('/siteactions/meterprops','site='+this.value,function(data){
            
            $('#meterProps').html('Meter Type : <a href="#">'+ data.type +'</a>'); 
            
        });
         
     });

    // Download upload output
    $('#output-download-button').click(function(){
        $('#upload-output-table').table2CSV();
    });
    });
  
    
