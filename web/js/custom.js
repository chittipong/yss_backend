/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    $("#product-code").blur(function(){
   //alert($("#product-code").val()); 
    var pCode=$("#product-code").val();
    var code=pCode.split("-"); 

    var pGroup= code[0].substring(0, 1);       //Get Product Group
    var pType=code[0].substring(1, 2);         //Get Product Type
    var piston=code[0].substring(2, 4);        //Get Piston
    var shaft=(code[0].substring(4, 5));       //Get Shaft
    var sLenght=code[1].substring(0,3)         //Get Shock Lenght
    console.log(code[1]);

      //กรณีที่ shaft มีค่าเท่ากับ 8 จะไม่บวก 1 ข้างหน้าเพราะ shaft มีค่าสูงสุดแค่ 16 mm.
        if(shaft!=8){
           var shaft=1+(code[0].substring(4, 5));       //Get Shaft
        }

      //ถ้าเป็น Shaft รถยนต์จะไม่มี +1 แต่จะ substring เพิ่มอีก 1 หลักแทน---
        if(code[0].length>5){
           var shaft=code[0].substring(4, 6);           //Get Shaft
        }
        
    //SET VALUE TO INPUT FORM----------------------
        $("#product-product_group").val(pGroup);             //Set Product Group
        $("#product-product_type").val(pType);               //Set Product Type
        $("#product-piston").val(piston);                    //Set Piston
        $("#product-shaft").val(shaft);                      //Set Shaft
        $("#product-length").val(sLenght);                   //Set Shock Lenght
            

     //Example Product Code: MG5022-315TRWL-49I Feature is: TRWL -----
     //var feature=code[1].substring(3,code[1].length);      
     var feature=code[1]; 
     console.log('feature: '+feature[1]);
     
     //SET PRELOAD OPTION-------------
        if(feature.search('P')>(-1)){
           $("#product-preload").val('P');
        }
        if(feature.search('T')>(-1)){
           $("#product-preload").val('T');
        }
        if(feature.search('H')>(-1)){
           $("#product-preload").val('H');
        }
        if(feature.search('H1')>(-1)){
           $("#product-preload").val('H1');
        }

     //END SET PRELOAD----------------
        
     //SET REBOUND--------------------
        if(feature.search('R')>(-1)){
            var rb=$("#product-rebound input");                       
                rb[0].setAttribute('checked','checked');              
        }
        
     //SET COMPRESSION---------------
        if(feature.search('C')>(-1)){
            var compress='C';
            $("#product-compression").val(compress);                   
        }
        if(feature.search('W')>(-1)){
            var compress='W';
            $("#product-compression").val(compress);                   
        }
        if(feature.search('C(AB)')>(-1)){
            var compress='C(AB)';
            $("#product-compression").val(compress);                   
        }
        
     //SET LENGHT ADJUST-------------
        if(feature.search('L')>(-1)){
            var lenghtAdjust='L';
            var la=$("#product-length_adjuster input");             
            la[0].setAttribute('checked','checked');              
        }
        
    });
});