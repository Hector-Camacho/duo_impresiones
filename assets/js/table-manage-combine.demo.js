/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 1.6.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.6/admin/
*/var handleDataTableCombinationSetting=function(){"use strict";if($("#data-table").length!==0){if($(window).width()>=767){var e=$("#data-table").DataTable({ajax:"assets/plugins/DataTables/json/scroller-demo.json",dom:'TRC<"clear">lfrtip',tableTools:{sSwfPath:"assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"},lengthMenu:[20,40,60]});new $.fn.dataTable.FixedHeader(e);new $.fn.dataTable.KeyTable(e);new $.fn.dataTable.AutoFill(e,{mode:"both",complete:function(e){var t=e[e.length-1];$.gritter.add({title:'Table Column Updated <i class="fa fa-check-circle text-success m-l-3"></i>',text:e.length+' cells were altered in this auto-fill. The value of the last cell altered was: <span class="text-white">'+t.oldValue+'</span> and is now <span class="text-white">'+t.newValue+"</span>",sticky:true,time:"",class_name:"my-sticky-class"})}})}else{var e=$("#data-table").DataTable({ajax:"assets/plugins/DataTables/json/scroller-demo.json",dom:'<"clear">frtip',lengthMenu:[20,40,60]})}}};var TableManageCombine=function(){"use strict";return{init:function(){handleDataTableCombinationSetting()}}}()