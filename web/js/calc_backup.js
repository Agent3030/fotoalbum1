
/* $(document).ready(function(){ 
    
     var totalPrice = 0;
     var addPages =0;
     var addPrice = 0;
    $(document).on('click','#step-2', function() {
        $.ajax({
         type: "POST",
         url: "/calculator/default/step2",      
         success: function(data){
            $('#calc-next').html(data);
         }
        });
        
    });
     

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
    
    
});*/
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
};
$(document).ready(function(){
    var prices = {};
    totalPrice =0;
    calc = new Calculator("20X37", "standart");
    
    $('#step-2').on('click', function() {
        $.ajax({
         type: "POST",
         url: "/calculator/default/step2",      
         success: function(data){
            $('#calc-next').html(data);
         
        }
    });
    });
    
    $(document).on("change", "#size", function() {
        var size =  $('#size :selected').text()
        calc.setSize(size);
         
        $.ajax({
            type: "POST",
            url:"/calculator/default/size-select-img",
            data: {size: size},
            success: function(data) {
                $("#img-container").html(data);
                $("#lamination :first").attr("selected", "selected");
                
            }
        });
       
        
        
     });
    
   
    
     $(document).on("change", "#lamination", function() {
     
        var lam = $('#lamination :selected').text();
        calc.setLam(lam);
        
     });
     
      
           $(document).on('change', '#range-select', function() {
         $('#number-select').val($('#range-select').val());
     });
      $(document).on('change', '#number-select', function() {
         $('#range-select').val($('#number-select').val());
         
       });
   // $("#confirm-qty").on ('click', function() {
        calc.setAddQty(1);
   // });
    calc.getPrices("/calculator/default/get-price-ajax")
        .done(function(a){ calc.price = a.price;
                           calc.price_pp = a.price_pp;
                            totalPrice = calc.calculate();
                          $("#total-price").text(calc.totalPrice);
                          console.log(calc);
                         });
                           
    //console.log(calc);                      
    alert(calc.price);
    totalPrice = calc.calculate();
   // console.log(calc.totalrice);
    $("#total-price").text(calc.totalPrice);
    
    });

    
    
        
