/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 1.6.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.6/admin/
*/var handleDataTableFixedColumns=function(){"use strict";if($("#data-table").length!==0){var e=$("#data-table").DataTable({scrollY:"320px",scrollX:"100%",scrollCollapse:true,paging:false});new $.fn.dataTable.FixedColumns(e)}};var TableManageFixedColumns=function(){"use strict";return{init:function(){handleDataTableFixedColumns()}}}()