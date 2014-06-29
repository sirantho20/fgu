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
    $.getJSON('http://fgu/api/gensetbysupplier',function(data){
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

});


