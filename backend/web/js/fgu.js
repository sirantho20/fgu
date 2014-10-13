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
        
        alert(this.value); 
    
    });
    
    });
  
    
