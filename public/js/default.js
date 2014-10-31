function isInt(n) {
   return n % 1 === 0;
}
$(document).ready(function(){
    
     $(".field_sort").inputmask("integer");

    //Delete
    $(".delete").click(function(){
        var url=$(this).attr('href');
        bootbox.confirm("Do you confirm to delete this record?", function(result) {
          if(result)
            {
                $.ajax({
                    url: url,
                    context: document.body,
                    success: function(){
                        bootbox.alert("Delete success", function() {
                            window.location.reload();
                        });
                    },
                    error: function(msg)
                    {
                        bootbox.alert("Delete false", function() {
                        });
                    }
                });
            }
        });
        return false;
    });

    $(".bt-update-status").click(function(){
        var thiselement=$(this);
        var myController= $(this).attr('myController');
        var myid=$(this).attr('myid');
        var mystatus=$(this).attr('mystatus');
        var img= $(this).children('img');
        var newstatus=1-parseInt(mystatus);
        var newImg= $(img).attr("src").replace(mystatus+".png",newstatus+".png");

        var field={"id":myid,"status":newstatus};
        $.ajax({
                type: 'post',
                url: webRoot+"/admin/"+ myController+ '/updatestatus',
                data:   field,
                success: function(msg){
                    $("#ajax_loading").addClass("none");
                    $(img).attr('src', newImg);
                    $(thiselement).attr('mystatus', newstatus);
                    /*bootbox.alert("Update success", function() {

                    });*/
                },
                error: function(msg)
                {

                    $("#ajax_loading").addClass("none");
                    bootbox.alert("Update false", function() {

                    });
                }
            });
    });

     //Update sort
    $(".updatesort").click(function(){
         var reg = new RegExp(/^[-]?[0-9]+[\.]?[0-9]+$/);
         var err=0;
         var myController= $(this).attr('myController');
        $('.field_sort').each(function(){
            if(!isInt($(this).val()))
            {
                err++;
            }
        });
        if(err>0)
        {
            bootbox.alert("The sort field not number", function() { });
            return false;
        }
        else
            {
            $("#ajax_loading").removeClass("none");
            var field=$('.field_sort').serializeArray();
            $.ajax({
                type: 'post',
                url: webRoot+"/admin/"+"/"+ myController+ '/updatesort',
                data:   {data:field},
                success: function(msg){

                    $("#ajax_loading").addClass("none");
                    bootbox.alert("Update success", function() {
                        window.location.reload();
                    });
                },
                error: function(msg)
                {
                    $("#ajax_loading").addClass("none");
                    bootbox.alert("Update false", function() {
                        window.location.reload();
                    });
                }
            });
        }
        return false;
    });
});
