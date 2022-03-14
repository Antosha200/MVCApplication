$(document).ready(function(){
    $("#productType").on('change', function(){
        $(".data").hide();
        $("#" + $(this).val()).fadeIn(700);

    }).change();
});

$("#productType").on('change', function(){
    var $selectOption=$('#productType').val();

    if ($selectOption === "dvd") {

        $( "#size" ).rules( "add", {
            required: true,
            number: true,
            messages: {
                required: "Please, submit size",
                number: "Please, provide the data of indicated type",
            }
        });

        $( "#height" ).rules( "remove" );
        $( "#width" ).rules( "remove" );
        $( "#length" ).rules( "remove" );
        $( "#weight" ).rules( "remove" );

    } else if ($selectOption === "book") {

        $( "#weight" ).rules( "add", {
            required: true,
            number: true,
            messages: {
                required: "Please, submit weight",
                number: "Please, provide the data of indicated type",
            }
        });

        $( "#height" ).rules( "remove" );
        $( "#width" ).rules( "remove" );
        $( "#length" ).rules( "remove" );
        $( "#size" ).rules( "remove" );

    } else if ($selectOption === "furniture") {

        $( "#height" ).rules( "add", {
            required: true,
            number: true,
            messages: {
                required: "Please, submit height",
                number: "Please, provide the data of indicated type",
            }
        });

        $( "#width" ).rules( "add", {
            required: true,
            number: true,
            messages: {
                required: "Please, submit width",
                number: "Please, provide the data of indicated type",
            }
        });

        $( "#length" ).rules( "add", {
            required: true,
            number: true,
            messages: {
                required: "Please, submit length",
                number: "Please, provide the data of indicated type",
            }
        });

        $( "#size" ).rules( "remove" );
        $( "#weight" ).rules( "remove" );

    } else {

        jQuery('#product_form').validate({
            rules:{
                sku:{
                    required:true,
                    minlength:3,
                },
                name:{
                    required:true,
                    minlength:3,
                },
                price:{
                    required:true,
                    number: true,
                },
            },messages:{
                sku:{
                    required:"Please, submit sku",
                    minlength:"Sku length minimum 3 characters",
                },
                name:{
                    required:"Please, submit name",
                    minlength:"Name length minimum 3 characters",
                },
                price:{
                    required:"Please, submit price",
                    number: "Please, provide the data of indicated type",
                },
            },
            submitHandler:function(form){
                form.submit();
            }
        });

    }
});
