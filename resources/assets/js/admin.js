import DataTable from 'datatables.net-dt';

$(document).ready(function(){

    //Desktop code for header and sidebar
    if($(window).width() > 993) {
        //Sidebar Toggler
        $('.sidebarToggler').click(function(){
            $(this).find('i').toggleClass('fa-times fa-bars');
            $('.mainAdminSidebar').toggleClass('show', 1000);
            $('main.adminMain').toggleClass('full', 1000);
        });
    };

    //Mobile code for header and sidebar
    if($(window).width() < 993){
        $('.mainAdminSidebar').removeClass('show');
        $('main.adminMain').addClass('full');
        $('.sidebarToggler').click(function(){
            $(this).find('i').toggleClass('fa-bars fa-times');
            $('.mainAdminSidebar').toggleClass('show', 500);
        });
    }


    //Datatables initial config
    let table = new DataTable('.dataTablesTable', {
        responsive: true
    });

    //Confirm Delete button with SA
    $('.confirm-delete-btn').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            dangerMode: true,
            closeOnEsc: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });

});
