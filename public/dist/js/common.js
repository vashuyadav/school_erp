// 

(function ($) {
  
})(jQuery)

function deleteRow(element)
{
    var rowId = $(element).data("id");
    var isDelete = confirm("Do you want to delete this record ?");
    if(isDelete){
        document.getElementById('delete-form-'+rowId).submit();
    }
}
