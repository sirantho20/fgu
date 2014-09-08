/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    
// DO NOT REMOVE : GLOBAL FUNCTIONS!
pageSetUp();

// bar graph color
if ($('#updating-chart').length) {
    $.getJSON(window.location.pathname + 'api/gensetbysupplier',function(data){
            Morris.Bar({
            element : 'updating-chart',
            data : data,
            xkey : 'supplier',
            ykeys : ['gensets'],
            labels : ['supplier'],
            barColors : function(row, series, type) {
                    if (type === 'bar') {
                            var red = Math.ceil(150 * row.y / this.ymax);
                            return 'rgb(' + red + ',0,0)';
                    } else {
                            return '#000';
                    }
            }
    });
    }); 

}
if($('#fgu-fuel-on-site').length) {
$.getJSON(window.location.pathname + 'api/weeklyfuelstock',function(data){

        Morris.Area({
                element : 'fgu-fuel-on-site',
                data : data,
                xkey : 'week',
                ykeys : ['fuel_on_site','fuel_theft','fuel_consumed'],
                labels : ['Fuel Stock', 'Stolen', 'Consumed'],
                parseTime: false
        });

});
}

if($('#test-delivery').length) {
$.getJSON(window.location.pathname + 'api/weeklyfueldelivery',function(data2){

        Morris.Area({
                element : 'test-delivery',
                data : data2,
                xkey : 'week',
                ykeys : ['fuel_delivered'],
                labels : ['Fuel Delivered'],
                parseTime: false
        });

});
}


if($('#theft-trend').length) {
$.getJSON(window.location.pathname + 'api/weeklyfuelstock',function(data){

        Morris.Bar({
                element : 'theft-trend',
                data : data,
                xkey : 'week',
                ykeys : ['fuel_theft'],
                labels : ['Fuel Theft'],
                parseTime: false
        });

});
}

if($('#consumption-trend').length) {
$.getJSON(window.location.pathname + 'api/weeklyfuelstock',function(data){

        Morris.Line({
                element : 'consumption-trend',
                data : data,
                xkey : 'week',
                ykeys : ['fuel_consumed'],
                labels : ['Fuel Consumed'],
                parseTime: false
        });

});
}

});


