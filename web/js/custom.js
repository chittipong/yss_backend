/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Hide Message------------------------
function hideMessage(el) {
    setTimeout(function () {
        //$(el).fadeOut('slow');
        $(el).slideUp('fast');
    }, 3000);
}
//Hide Modal--------------------------
function hideModal(el) {
    $(el).modal('hide');
}
//Reset Form--------------------------
function resetForm(form) {
    $(':input', form).not(':button, :submit, :reset, :hidden').val('').removeAttr('checked').removeAttr('selected');
}
//Redirect function-------------------
function redirect(url) {
    window.location = url;
}

//Set Center--------------------------
function setCenter(el) {
    $(el).css("position", "absolute");
    $(el).css("z-index", 99999);
    $(el).css("margin", "auto");
}

//Set Message Center------------------
function setMsgCenterPage(msg) {
    var winW = window.innerWidth;								//get window Width
    var winH = window.innerHeight;							//get window Height
    var pcW = $(msg).css("width");
    var pcH = $(msg).css("height");
    pcW = pcW.replace("px", "");							//Remove string 'px'
    pcH = pcH.replace("px", "");							//Remove string 'px'

    //Set Position	message to Center page----------------
    pcTop = ((winH - pcH) / 2) + "px";
    pcLeft = ((winW - pcW) / 2) + "px";

    $(msg).css("position", "fixed");
    $(msg).css("z-index", 99999);
    $(msg).css("margin", "auto");
    $(msg).css("top", pcTop);					//set position Top
    $(msg).css("left", pcLeft);					//set position Left
}//end function***

function setCenter2(el) {
    $(el).css("position", "fixed");
    $(el).css("z-index", 99999);
    $(el).css("width", "70%");
    $(el).css("left", "15%");
    $(el).css("top", "40%");
}

function showLoading() {
    $("body").prepend("<div id='loadingCn'><img src='images/ajax-loader.gif'/></div>");
    $("#loadingCn").css("position", "fixed");
    $("#loadingCn").css("z-index", 99999);
    $("#loadingCn").css("width", "66px");
    $("#loadingCn").css("height", "66px");
    $("#loadingCn").css("left", "45%");
    $("#loadingCn").css("top", "40%");
}

function hideLoading() {
    $("#loadingCn").fadeOut(500);
}

$(function () {
    //FOR PRODUCT===============================
    $("#product-code").blur(function () {
        //alert($("#product-code").val()); 
        var pCode = $("#product-code").val();
        var code = pCode.split("-");

        var pGroup = code[0].substring(0, 1);       //Get Product Group
        var pType = code[0].substring(1, 2);         //Get Product Type
        var piston = code[0].substring(2, 4);        //Get Piston
        var shaft = (code[0].substring(4, 5));       //Get Shaft
        var sLenght = code[1].substring(0, 3)         //Get Shock Lenght
        console.log(code[1]);

        //กรณีที่ shaft มีค่าเท่ากับ 8 จะไม่บวก 1 ข้างหน้าเพราะ shaft มีค่าสูงสุดแค่ 16 mm.
        if (shaft != 8) {
            var shaft = 1 + (code[0].substring(4, 5));       //Get Shaft
        }

        //ถ้าเป็น Shaft รถยนต์จะไม่มี +1 แต่จะ substring เพิ่มอีก 1 หลักแทน---
        if (code[0].length > 5) {
            var shaft = code[0].substring(4, 6);           //Get Shaft
        }

        //SET VALUE TO INPUT FORM----------------------
        $("#product-product_group").val(pGroup);             //Set Product Group
        $("#product-product_type").val(pType);               //Set Product Type
        $("#product-piston").val(piston);                    //Set Piston
        $("#product-shaft").val(shaft);                      //Set Shaft
        $("#product-length").val(sLenght);                   //Set Shock Lenght

        //SET NEW LENGTH WHEN THERE IS LENGTH ADJUSTMENT----------
        if (code[1].search('L') > (-1)) {
            var lenght2 = parseInt(sLenght) + 10;
            $("#product-length").val(sLenght + '-' + lenght2);      //Example: 325-335
        }

        //Example Product Code: MG5022-315TRWL-49I Feature is: TRWL -----
        //var feature=code[1].substring(3,code[1].length);      
        var feature = code[1];
        console.log('feature: ' + feature[1]);

        //SET PRELOAD OPTION-------------
        if (feature.search('P') > (-1)) {
            $("#product-preload").val('P');
        }
        if (feature.search('T') > (-1)) {
            $("#product-preload").val('T');
        }
        if (feature.search('H') > (-1)) {
            $("#product-preload").val('H');
        }
        if (feature.search('H1') > (-1)) {
            $("#product-preload").val('H1');
        }

        //END SET PRELOAD----------------

        //SET REBOUND--------------------
        if (feature.search('R') > (-1)) {
            var rb = $("#product-rebound input");
            rb[0].setAttribute('checked', 'checked');
        }

        //SET COMPRESSION---------------
        if (feature.search('C') > (-1)) {
            var compress = 'C';
            $("#product-compression").val(compress);
        }
        if (feature.search('W') > (-1)) {
            var compress = 'W';
            $("#product-compression").val(compress);
        }
        if (feature.search('C(AB)') > (-1)) {
            var compress = 'C(AB)';
            $("#product-compression").val(compress);
        }

        //SET LENGHT ADJUST-------------
        if (feature.search('L') > (-1)) {
            var lenghtAdjust = 'L';
            var la = $("#product-length_adjuster input");
            la[0].setAttribute('checked', 'checked');
        }
    });

    //FOR APPLICATION LIST===============================
    $("#applist-product_code").blur(function () {
        //alert($("#product-code").val()); 
        var pCode = $("#applist-product_code").val();
        var code = pCode.split("-");

        var pGroup = code[0].substring(0, 1);       //Get Product Group
        var pType = code[0].substring(1, 2);         //Get Product Type
        var piston = code[0].substring(2, 4);        //Get Piston
        var shaft = (code[0].substring(4, 5));       //Get Shaft
        var sLenght = code[1].substring(0, 3)         //Get Shock Lenght
        console.log(code[1]);

        //กรณีที่ shaft มีค่าเท่ากับ 8 จะไม่บวก 1 ข้างหน้าเพราะ shaft มีค่าสูงสุดแค่ 16 mm.
        if (shaft != 8) {
            var shaft = 1 + (code[0].substring(4, 5));       //Get Shaft
        }

        //ถ้าเป็น Shaft รถยนต์จะไม่มี +1 แต่จะ substring เพิ่มอีก 1 หลักแทน---
        if (code[0].length > 5) {
            var shaft = code[0].substring(4, 6);           //Get Shaft
        }

        //SET VALUE TO INPUT FORM----------------------
        $("#applist-product_group").val(pGroup);             //Set Product Group
        $("#applist-product_type").val(pType);               //Set Product Type
        $("#applist-piston").val(piston);                    //Set Piston
        $("#applist-shaft").val(shaft);                      //Set Shaft
        $("#applist-length").val(sLenght);                   //Set Shock Lenght

        //SET NEW LENGTH WHEN THERE IS LENGTH ADJUSTMENT----------
        if (code[1].search('L') > (-1)) {
            var lenght2 = parseInt(sLenght) + 10;
            $("#applist-length").val(sLenght + '-' + lenght2);      //Example: 325-335
        }


        //Example Product Code: MG5022-315TRWL-49I Feature is: TRWL -----
        //var feature=code[1].substring(3,code[1].length);      
        var feature = code[1];
        console.log('feature: ' + feature[1]);

        //SET PRELOAD OPTION-------------
        if (feature.search('P') > (-1)) {
            $("#applist-preload").val('P');
        }
        if (feature.search('T') > (-1)) {
            $("#applist-preload").val('T');
        }
        if (feature.search('H') > (-1)) {
            $("#applist-preload").val('H');
        }
        if (feature.search('H1') > (-1)) {
            $("#applist-preload").val('H1');
        }

        //END SET PRELOAD----------------

        //SET REBOUND--------------------
        if (feature.search('R') > (-1)) {
            var rb = $("#applist-rebound input");
            rb[0].setAttribute('checked', 'checked');
        }

        //SET COMPRESSION---------------
        if (feature.search('C') > (-1)) {
            var compress = 'C';
            $("#applist-compression").val(compress);
        }
        if (feature.search('W') > (-1)) {
            var compress = 'W';
            $("#applist-compression").val(compress);
        }
        if (feature.search('C(AB)') > (-1)) {
            var compress = 'C(AB)';
            $("#applist-compression").val(compress);
        }

        //SET LENGHT ADJUST-------------
        if (feature.search('L') > (-1)) {
            var lenghtAdjust = 'L';
            var la = $("#applist-length_adjust input");
            la[0].setAttribute('checked', 'checked');
        }

        //SET LENGTH-------------------
    });


//TEST INSERT BY AJAX=======================================
    $("#submit-TestForm").click(function () {
        showLoading();
        var url = $("#testForm").attr('action');
        $.post(url, $("#testForm").serialize(),
                function (data, status) {
                    hideLoading();
                    if (data.trim() == "done") {
                        //Set Message display-------------
                        var msg = "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Successfully</strong> Insert complete!</div>";

                        $("body").append("<div id='output'></div>");
                        $("#output").html(msg);
                        setCenter2("#output");
                        $("#output").fadeIn("fast");

                        hideMessage("#output");						//hide message after 3 second

                    } else {
                        //Set Message display-------------
                        var msg = "<div class='alert alert-error fade in'><button type='button' class='close' data-dismiss='alert'>×</button><strong>Error!</strong>" + "Data: " + result + "\nStatus: " + status + "</div>";

                        $("body").append("<div id='output'></div>");
                        $("#output").html(msg);
                        setCenter2("#output");
                    }

                    //alert("Data: " + data + "\nStatus: " + status);

                    resetForm("#testForm");
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                    
                });
    });
    


    //Page Create Modal-------------------
        $('#pageCreate-btn').click(function(){
            $('#modal').modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'));
        });
        
    //News detail Create Modal-------------------
        $('#newsdetailCreate-btn').click(function(){
            $('#modal').modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'));
        });
        
     //News Create Modal-------------------
        $('#newsCreate-btn').click(function(){
            $('#modal').modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'));
        });  
        
        
        //News Create Modal-------------------
        $('#applistCreate-btn').click(function(){
            $('#modal').modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'));
        });  
        

    //Test Modal----------------------
        $('#modalButton-test').click(function(){
            $('#modal').modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'));
        });
});