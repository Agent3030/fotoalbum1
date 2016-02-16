
/* $(document).ready(function(){ 
    
     var totalPrice = 0;
     var addPages =0;
     var addPrice = 0;
    
     

    $(document).on('change','#size', function() {
      var prices = {};
        $.ajax({
            type: "POST",
            url:"/calculator/default/size-select-img",
            data: {size: $('#size :selected').text()},
            success: function(data) {
                $("#img-container").html(data);
            }
        });
         $(document).on('change','#lamination', function() {
      
        $.ajax({
            type: "POST",
            url:"/calculator/default/get-price-ajax",
            data: {type: $('#lamination :selected').text(),
                  size: $('#size :selected').text() },
             success: function(data) {
                 
                 prices = data;
                 
                 
                 }
         
        });
         $(document).on('change', '#range-select', function() {
         $('#number-select').val($('#range-select').val());
     });
      $(document).on('change', '#number-select', function() {
         $('#range-select').val($('#number-select').val());
         
              
     });
        $('#total-price').text(prices.price+prices.price_pp*parseInt($('#number-select').val()));
             
        console.log($('#number-select').val());
        console.log(prices);     
      
    });
          
    
    });
    
    
});
function Calculator(startSize, startLamination) {
    this.size= startSize;
    this.lamination = startLamination;
    this.addQty = 1;
    this.totalPrice = 0;
   
}
Calculator.prototype.setSize= function(size) {
    this.size = size;
                           
};
Calculator.prototype.getSize = function() {
    return this.size;
                           
};
Calculator.prototype.setLam= function(lam){
    this.lamination = lam;
                           
};
Calculator.prototype.getlam = function() {
    return this.lamination;
                           
};


Calculator.prototype.getPrices = function(path) {
    
  return $.ajax({
            type: "POST",
            url:path,
            data: {type: this.lamination,
                  size: this.size },
            
        });
    
};
           
Calculator.prototype.setAddQty= function(qty){
        this.addQty = parseFloat(qty);
    };
    
Calculator.prototype.getAddQty = function() {
    return this.addQty;
};

Calculator.prototype.calculate = function() {
   
    this.totalPrice = this.price + this.price_pp*this.addQty;
    return this.totalPrice
};
Calculator.prototype.setResultToServer = function(path) {
    
    $.ajax({
            type: "POST",
            url: path,
            data: {type: this.lam,
                  size: this.size,
                  price: this.price,
                  price_pp: this.price_pp,
                  Qty: this.addQty,               
                  total_price: this.totalPrice, 
                  }
           
             
        });
};*/
function addCostForLam(kLam, costSize) {
    
    var costLamStd = costSize * 1;
    var costLam = costSize*parseFloat(kLam);
    var costAdd = parseInt(costLam - costLamStd);
    if(costAdd) {
        return "+"+costAdd;
    } else {
        return costAdd;
    }
   
}
$(document).ready(function(){
    
    
     var step1 =  $("#step-1");
     var step2 =  $("#step-2");
     var step3 =  $("#step-3");
     var stdQty = 10;
     var size = "20x37";
     //var cover = $("cover-select:selected").text();;
     $("#calc-next").html(step1);  
      var kitName = "#kit-name";
    
      var kitId = $(".kit-desc h4").html();

      $("#kit-id").append(kitId);
    $(".calc-body-main").on("click", "#kit-choice", function() {
         kitId = $(this).find(kitName).text();
         $(".calc-body-main").find(".kit-desc").removeClass("kit-desc-active");
         $(this).find(".kit-desc").toggleClass("kit-desc-active");
         $("#kit-id").html(kitId);
       
         
        });
     $("#to-step-2").on("click", function () {
         $("#calc-next").html(step2);
         $("#btn-block").html($("#btn-block-2"));
         
          $.ajax({
            type: "POST",
            url:"/calculator/default/select-price",
            data: {kit: kitId},
            success: function(data){
                 $('#select-size').html(data);
               var cost = $('#size :selected').val();
                $("#cost-size").html(cost);  
                
            
            var kLam =  $('#lamination :selected').val();
            $("#cost-lam").html(0);
            $("#cost-pages").html(0);
            $("#total-qty").html(stdQty);
            var costSize = $("#cost-size").text();
            var costLam =  $("#cost-lam").text();
            costLam = costLam.substring(1, costLam.length);    
            var costPages = $("#cost-pages").text();
            costPages = costPages.substring(1, costPages.length);
            var totalCost = costSize+costLam+costPages;
            $("#total-price").html(totalCost);    
         }
        });
     });
       
  $(document).on("change", "#size", function() {
        size = $('#size :selected').text();
        var cost = $('#size :selected').val();
   
         $("#cost-size").html(cost);
        var kLam =  $('#lamination :selected').val();
            $("#cost-lam").html(addCostForLam(kLam,cost));
      $('#range-select').val(0)
     $('#number-select').val(0);

     $("#cost-pages").html($('#range-select').val());
     $("#cost-pages").html($('#number-select').val());
        var costSize = parseInt($("#cost-size").text());
        
        var costLam =  $("#cost-lam").text();
        
        costLam = parseInt(costLam.substring(1, costLam.length));
       
        var costPages = $("#cost-pages").text();
        costPages = parseInt(costPages.substring(1, costPages.length));
        
        var totalCost = costSize+costLam+costPages;
        $("#total-price").html(totalCost);   
    $.ajax({
            type: "POST",
            url:"/calculator/default/select-size",
            data: {size: size},
            success: function(data){
            $('#select-lam').empty().html(data);
            var kLam =  $('#lamination :selected').val();    
            $("#cost-lam").html(addCostForLam(kLam,cost));
                
         }    
  });
});
 $(document).on("change", "#lamination", function() {
     var cost = $('#size :selected').val();
     var kLam =  $('#lamination :selected').val();
     $("#cost-lam").html(addCostForLam(kLam,cost));
     $('#range-select').val(0)
     $('#number-select').val(0);

     $("#cost-pages").html($('#range-select').val());
     $("#cost-pages").html($('#number-select').val());
     
      var costSize = parseInt($("#cost-size").text());
        var costLam =  $("#cost-lam").text();
        costLam = parseInt(costLam.substring(1, costLam.length));    
        var costPages = $("#cost-pages").text();
        costPages = parseInt(costPages.substring(1, costPages.length));
        var totalCost = costSize+costLam+costPages;
        $("#total-price").html(totalCost);   
 });
      $(document).on('change', '#range-select', function() {
         $('#number-select').val($('#range-select').val());
          var addQty = $('#range-select').val();
          
          var totalQty = stdQty + parseInt(addQty);
          $("#total-qty").html(totalQty);
          var size = $('#size :selected').text();
          var addPrice = parseInt($("#"+size).text());
          var addTotalPrice = addPrice * addQty;
          $("#cost-pages").html(addTotalPrice);
          
           var costSize = parseInt($("#cost-size").text());
          
        var costLam =  $("#cost-lam").text();
        if(costLam > 0) {
        costLam = parseInt(costLam.substring(1, costLam.length));
        } else {
        costLam = 0;    
        }
            
        var costPages = $("#cost-pages").text();
        if(costPages > 0) {
        costPages = parseInt(costPages.substring(1, costPages.length));
        } else {
         costPages = 0;    
        }  
        
        var totalCost = costSize+costLam+costPages;
        $("#total-price").html(totalCost);   
     });
      $(document).on('change', '#number-select', function() {
         $('#range-select').val($('#number-select').val());
          var addQty = $('#range-select').val();
          var totalQty = stdQty + parseInt(addQty);
          $("#total-qty").html(totalQty);
          var size = $('#size :selected').text();
          var addPrice = parseInt($("#"+size).text());
          var addTotalPrice = addPrice * addQty;
          $("#cost-pages").html(addTotalPrice);
          
          var costSize = parseInt($("#cost-size").text());
        var costLam =  $("#cost-lam").text();
       if(costLam > 0) {
        costLam = parseInt(costLam.substring(1, costLam.length));
        } else {
        costLam = 0;    
        }
            
        var costPages = $("#cost-pages").text();
        if(costPages > 0) {
        costPages = parseInt(costPages.substring(1, costPages.length));
        } else {
         costPages = 0;    
        }  
        var totalCost = costSize+costLam+costPages;
        $("#total-price").html(totalCost);   
     });
   $("#to-step-3").on("click", function () {
         $("#calc-next").html(step3);
         $("#btn-block").html($("#btn-block-3"));
         
         
        $.ajax({
            type: "POST",
            url:"/calculator/default/select-cover",
            success: function(data){
                 $('#select-cover').html(data);
                
            }
         
     });
   });
    
$(document).on('change', '#cover-select', function() {
    var cover = $("#cover-select :selected").text();
     console.log(cover);
    $.ajax({
            type: "POST",
            url:"/calculator/default/select-cover-model",
            data: {size: size, cover: cover},
            success: function(data){
                 $('#select-cover-model').html(data);
                
            }
         
     });
   });
$(document).on('change', '#cover-model-select', function() {
    var coverModel = $("#cover-model-select :selected").text();
     var cover = $("#cover-select :selected").text();
     console.log(cover);
     console.log(coverModel);
    $.ajax({
            type: "POST",
            url:"/calculator/default/select-cover-model-img",
            data: {cover_model: coverModel, cover: cover},
            success: function(data){
                 $("#model-img").html(data);
                $("#img-carousel").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });
                
            }
         
     });
   });    
  $("#img-carousel").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });
   
});    
    
   
    
   
    
        
