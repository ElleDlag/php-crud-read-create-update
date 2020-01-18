function init(){
    getConfig();
    $('#descrizione').focus(function (e) { 
            $(this).val('');
    });
    $('#formPushData').submit(pushConfig);
}
function containerReset(){
    $(".result").html("");
}
function pushConfig() {
    var newStanza = $(this);
    //console.log(newPagante.serialize());

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "03_setTBConfigurazioni.php",
            data:newStanza.serialize(),
            success: function (dataResp) {
                if(dataResp){
                    getConfig()
                } 
            },
            error:function(err) {
                console.log("error", err);
            }
        });

    //prevent refresh of page
    return false
}
function printIndex(print){
    containerReset()
    var template = Handlebars.compile($("#box-template").html())
    
    print.forEach(function(el){
        $(".result").append(template(el))
        //console.log(el);
    });

} 
function getConfig(){
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "02_getTBConfigurazioni.php",
        success: function (dataResp) {
            //console.log(dataResp);
            printIndex(dataResp);
            
        },
        error:function(err) {
            console.log("error", err);
        }
    });
}

$(function() {
    init();
}) 