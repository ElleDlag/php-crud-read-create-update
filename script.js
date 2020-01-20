function init(){
    getConfig();
    $('#descrizione').focus(function (e) { 
            $(this).val('');
    });
    $('#formPushData').submit(pushConfig);
    $('body').on('click','.del-id',delConfig);
    $('body').on('click','.upd-id',updConfig);
}
function containerReset(){
    $(".result").html("");
}
function printIndex(print){
    containerReset()
    var template = Handlebars.compile($("#box-template").html())
    
    print.forEach(function(el){
        $(".result").append(template(el))
        //console.log(el);
    });

}
function delConfig() {
    var delID = $(this).data('id');
    //console.log(delID)
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "04_delTBConfigurazioni.php",
        data: {
            id: delID
        },
        success: function (dataResp) {
            if(dataResp){
                getConfig()
            }
            //console.log(dataResp);
        },
        error:function(err) {
            console.log("error", err);
        }
    });
    return false
}
function updConfig() {
    var updID = $(this).data('id');
    //console.log(delID)
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "05_updTBConfigurazioni.php",
        data: {
            id: updID,
            title: prompt(),
            description:prompt(),
        },
        success: function (dataResp) {
            if(dataResp){
                getConfig()
            }
            //console.log(dataResp);
        },
        error:function(err) {
            console.log("error", err);
        }
    });
    return false
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