/*=========================================================================================
    File Name: datatables-basic.js
    Description: Basic Datatable
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function() {

/****************************************
*       js of zero configuration        *
****************************************/

$('.zero-configuration').DataTable({
    searching: true,
    responsive: true,
    paging: true,
    info: false,
    processing: false,
    ordering: true,
    //serverSide: true,
    lengthMenu: [
        [5, 10, 15, -1],
        ['5', '10', '15', 'الكل']
    ],
    language: {
        "search": "بحث : ",
        "lengthMenu": "مشاهدة _MENU_ السجلات",
        "zeroRecords": "نأسف! لا يوجد أي نتائج للبحث",
        "info": "عدد النتائج _TOTAL_",
        "infoEmpty": "لا توجد سجلات متاحة",
        "infoFiltered": "",
        "decimal": "",
        "emptyTable": "لا توجد بيانات متاحة في الجدول",
        "infoPostFix": "",
        "thousands": ",",
        "loadingRecords": "انتظار...",
        "processing": "عمليات...",
        "paginate": {
            "first": "بداية",
            "last": "نهاية",
            "next": "التالي",
            "previous": "السابق"
        },
    }
});

/**************************************
*       js of default ordering        *
**************************************/

$('.default-ordering').DataTable( {
    "order": [[ 3, "desc" ]]
} );

/************************************
*       js of multi ordering        *
************************************/

$('.multi-ordering').DataTable( {
    columnDefs: [ {
        targets: [ 0 ],
        orderData: [ 0, 1 ]
    }, {
        targets: [ 1 ],
        orderData: [ 1, 0 ]
    }, {
        targets: [ 4 ],
        orderData: [ 4, 0 ]
    } ]
} );

/*************************************
*       js of complex headers        *
*************************************/

$('.complex-headers').DataTable();

/*************************************
*       js of dom positioning        *
*************************************/

$('.dom-positioning').DataTable( {
    "dom": '<"top"i>rt<"bottom"flp><"clear">'
} );

/************************************
*       js of alt pagination        *
************************************/

$('.alt-pagination').DataTable( {
    "pagingType": "full_numbers"
} );

/*************************************
*       js of scroll vertical        *
*************************************/

$('.scroll-vertical').DataTable( {
    "scrollY":        "200px",
    "scrollCollapse": true,
    "paging":         false
} );

/************************************
*       js of dynamic height        *
************************************/

$('.dynamic-height').DataTable( {
    scrollY:        '50vh',
    scrollCollapse: true,
    paging:         false
} );

/***************************************
*       js of scroll horizontal        *
***************************************/

$('.scroll-horizontal').DataTable( {
    "scrollX": true
} );

/**************************************************
*       js of scroll horizontal & vertical        *
**************************************************/

$('.scroll-horizontal-vertical').DataTable( {
    "scrollY": 200,
    "scrollX": true
} );

/**********************************************
*       Language - Comma decimal place        *
**********************************************/

$('.comma-decimal-place').DataTable( {
    "language": {
        "decimal": ",",
        "thousands": "."
    }
} );


});
