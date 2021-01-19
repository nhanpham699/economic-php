//hightlightproduct
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
////filter
$("#price_range").slider({
  range : true,
  min: 300000,
  max: 9100000,
  values: [300000, 9100000],
  step: 500,
  stop: function(event, ui){
    $("#price_show").html(Intl.NumberFormat('de-DE').format(ui.values[0]) + 'đ - ' + Intl.NumberFormat('de-DE').format(ui.values[1]) + 'đ');
    $("#hidden_minimum_price").val(ui.values[0]);
    $("#hidden_maximum_price").val(ui.values[1]);
    filter();
  }
});
function filter(){
     var brand_color = brand('brand_color');
     var max_price = $("#hidden_maximum_price").val();
     var min_price = $("#hidden_minimum_price").val();
    $.ajax({
           url : 'processingFilter.php',
           type : 'post',
           data : { 
             'brand_color' : brand_color,
             'max_price' : max_price,
             'min_price' : min_price
           },
           success : function(data){ 
              $("#right-content").load("index.php?view=filter #main_brand");
           }

        });
    function brand(x) {
        var a = document.getElementsByClassName(x);
        var brand = [];
        for(var i = 0; i < a.length ;i++){
           if(a[i].checked){
            brand.push(a[i].value);
           } 
        }   
        return brand;  
    }
    console.log(brand_price);
    console.log(brand_color);
}

//show modal
function order(){
   $('#Order').modal();
}

function showSwapPassword(){
   $('#swapPassword').modal();
}

function showDetailOrders(idorder){
   $("#showDetailOrders_"+idorder).modal();
}

$(function(){
      $("#shoppinguser").click(function(){
          $("#dn").modal();
          $("#signinDesign").show();
           $("#dk").modal('hide');
      });
   });

$(function(){
      $("#signupButton").click(function(){
          $("#dk").modal();
          $("#signupDesign").show();
          $("#dn").modal('hide');
          $("#signinDesign").hide();
      });
   });

//processing order from admin

 function status(id){
    var a = document.getElementById('status_' + id);
    var status = a.options[a.selectedIndex].value;
    $.post('status.php',{'status' : status, 'id' : id},function(data){
       alert("Thay đổi trang thái đơn hàng thành công!")
    });  
 } 

// don't buy
function outofstock(){
   Swal.fire("Xin lỗi!", "Sản phẩm đã hết hàng", "warning");
}
function dontaddCart(){
   Swal.fire("Xin lỗi!", "Vui lòng đăng nhập để mua sản phẩm", "warning").then((result)=>{
     if(result.value){
       $("#dn").modal();
       $("#signinDesign").show();
     }
   });
}
function dontCart(){
   Swal.fire("Xin lỗi!", "Vui lòng đăng nhập để xem giỏ hàng", "warning").then((result)=>{
     if(result.value){
       $("#dn").modal();
       $("#signinDesign").show();
     }
   });
}
//
//logout

function logout(){
   $.post('logout.php',{'logout' : 1},function(data){
           location.reload(true);    
        }); 
  }
 // up and down Quantily 
function downNum(){
   var a = $("#slg").val();
   if(a>1){
   var b = Number(a)-1;
   }else{
     b = a;
   }
   $("#slg").val(b);
}

function upNum(){
   var a = $("#slg").val();
   var b = Number(a)+1;
   $("#slg").val(b);
}

function downSize(){
   var a = $("#size").val();
   if(a>38){
   var b = Number(a)-1;
   }else{
     b = a;
   }
   $("#size").val(b);
}

function upSize(){
   var a = $("#size").val();
   if(a<43){
   var b = Number(a)+1;
   }else{
      b = a; 
   }
   $("#size").val(b);
}
//
// adding products
function addCart(id){ 
    var radios = document.getElementsByName("radio"); 
   //size   
    if(document.getElementById("size").innerText[0] == 'S'){
        for (var i = 0, length = radios.length; i < length; i++) {
           if (radios[i].checked) {
              size = radios[i].value;
              break;
            }
          }
      }else{
          size = $("#size").val();
        }
    //        
    var num = Number($("#slg").val());
		$.post('addCart.php', {'id': id , 'num' : num, 'size' : size}, function(data){
         $("#inforImage").attr({
             'src' : $("#anhsp").attr("src")
         });  
         $("#inforColor").text($("#mausp").text());
      //size
         if(document.getElementById("size").innerText[0] == 'S'){
            for(var i = 0, length = radios.length; i < length; i++) {
              if(radios[i].checked) {
                 $("#inforSize").text(radios[i].value);
                 break;
               }
             }
         }else{
             $("#inforSize").text($("#size").val());
          }
       //         
         $("#inforName").text($("#tensp").text());
         $("#inforNum").text($("#slg").val());
         $("#inforPrice").text($("#giasp").text());
         Swal.fire({
            position: 'top',
            icon: 'success',
            title: 'Thêm sản phẩm vào giỏ',
            showConfirmButton: false,
            timer: 1000
          }).then((result) => {
                  $('#infoProduct').modal();
             });
         var a = Number($("#numCart").text());
         a += num;
         $("#numCart").html(a);
		});
	}
  //updating products
function reductionNumInCart(id,price){
   var a = $("#quantum_"+id).val(); 
   if(a>1){
   var b = Number(a)-1;
   }else{
     b = a;
   }
   $("#quantum_"+id).val(b);
   var cart = Number($("#numCart").text());
      if(a>1){
       cart -= 1; 
       $("#numCart").html(cart);
     }
      // changeTotal(id, price,'minus',a);
   // $("#updateCart").click(function(){
     updateCart(id);
   // })
  
}

function increaseNumInCart(id,price){
   var a = $("#quantum_"+id).val();
   var b = Number(a)+1;
   $("#quantum_"+id).val(b); 
   var cart = Number($("#numCart").text());
   cart += 1;
   $("#numCart").html(cart);
   
   // changeTotal(id, price,'plus',a);
   // $("#updateCart").click(function(){
     updateCart(id);
   // })
   
}
function changeTotal(id, price,operator,a){
      var num = $("#quantum_"+id).val();
      var total1 = (Number(num) * Number(price));
      var total2 = Intl.NumberFormat('de-DE').format(total1)+'đ';
      $("#total-price_"+id).html(total2);
      var Total1 = Number(document.getElementById("total").innerText.slice(11).replace('.','').replace('.','').replace('đ',''));
      if(operator == 'plus'){
        Total1  += price;
      }else if(operator == 'minus'){
        if(a != 1){
          Total1 -= price;
        }
      }
      var Total2 =  Intl.NumberFormat('de-DE').format(Total1)+'đ'; 
      $("#total").html('<b>Tổng cộng: </b>' +Total2);

}
function updateCart(id){
      var num = $("#quantum_"+id).val();    
    $.post('updateCart.php', {'id' : id, 'num' : num}, function(data){   
          $("#shopping-cart").load("index.php?view=cart #maincart"); 
          // $(document).load(function () {
             
           // });
      });
  }  
//deleting products
function deleteCart(id){
var num = $("#quantum_"+id).val(); 
  var cart = Number($("#numCart").text());
       cart -= num; 
       $("#numCart").html(cart);
	$.post('deleteCart.php', {'id' : id}, function(data){
			// alert('Đã xóa sản phẩm khỏi giỏi hàng');
	    $("#shopping-cart").load("index.php?view=cart #maincart");
		    });
	}

//search in addmin
function Search() {
  var a = document.getElementsByClassName("table")[0].children[0].children;
  var c = document.getElementById("search").value.toLowerCase();
  if(c === ""){
  for (var i=2 ; i <= a.length ; i++){
       a[i].style.display = null;
    }
  }else{
    for (var i=2 ; i<= a.length ; i++){
    if(a[i].children[1].innerText.toLowerCase().search(c) == -1){
      a[i].style.display = "none";
    }else{
      a[i].style.display = null;
    }
   }
  } 
}
////////////////////////////
// checking register
function checkExist(temp,x){
  var error = 0;
  var flag = true;
  var a = $(x).val();
  for( var i=0; i < array_checkexist.length-1; i+=2){
     if(array_checkexist[i+temp] === a){
         error++;
      }
     if(error == 0){
        flag =true; 
     }else{
        flag = false;
     }
   }  
  return flag; 
}
// register
$(function(){
     $("#errorU").hide();
     $("#errorPass").hide();
     $("#errorEPass").hide();
     $("#errorE").hide();
     $("#errorP").hide();
     $("#errorN").hide();

     var error_username = false;
     var error_password = false;
     var error_email = false;
     var error_enterpassword = false;
     var error_phone = false;
     var error_name = false;

     $("#Username").focusout(function(){
          testUsername();
     });

     $("#Password").focusout(function(){
          testPassword();
     });

     $("#enterpassword").focusout(function(){
          testEnterpassword();
     });

     $("#Email").focusout(function(){
          testEmail();
     });

     $("#Phone").focusout(function(){
          testPhone();
     });
     $("#name").focusout(function(){
          testName();
     });

         function testUsername(){
             var username_length = $("#Username").val().length;
             if(username_length < 5 || username_length >20) {
               $("#errorU").html('<i class="fa fa-exclamation-circle"></i>Hãy nhập tên đăng nhập từ 5-20 ký tự');
               $("#errorU").show();
               error_username = true;
            }else if(!checkExist(0,"#Username")){
                $("#errorU").html('<i class="fa fa-exclamation-circle"></i>Tên đăng nhập đã tồn tại');
                $("#errorU").show();
                error_username = true;
             }else{
              $("#errorU").hide();
             }
         }
         function testPassword(){
             var password_length = $("#Password").val().length;
             if(password_length < 8){
              $("#errorPass").html('<i class="fa fa-exclamation-circle"></i>Hãy nhập mật khẩu từ 8 ký tự trở lên');
              $("#errorPass").show();
              error_password = true;
             }else{
              $("#errorPass").hide();
             }
         }
          function testEnterpassword(){
             var p1 = $("#Password").val()
             var p2 = $("#enterpassword").val()
             if(p1 != p2){
               $("#errorEPass").html('<i class="fa fa-exclamation-circle"></i>Mật khẩu không khớp');
               $("#errorEPass").show();
              error_enterpassword = true;
             }else{
              $("#errorEPass").hide();
             }
         }
         function testEmail(){
              var e = $("#Email").val();
              var testEmail = /^\w+@[a-zA-Z]{3,}\.com$/i;
               if(!testEmail.test(e)){
                  $("#errorE").html('<i class="fa fa-exclamation-circle"></i>Email không hợp lệ');
                  $("#errorE").show();
                  error_email = true;
               }else if(!checkExist(1,"#Email")){ 
                  $("#errorE").html('<i class="fa fa-exclamation-circle"></i>Email đã tồn tại');
                  $("#errorE").show();
                  error_email = true;
                }else{
                  $("#errorE").hide();
                 }
         }
          function testPhone(){
              var p = $("#Phone").val();
              var testPhone = /^\d{10}$/;
               if(!testPhone.test(p)){
                  $("#errorP").html('<i class="fa fa-exclamation-circle"></i>Số điện thoại không hợp lệ');
                  $("#errorP").show();
                  error_phone = true;
               }else{
                  $("#errorP").hide();
                 }
         }
         function testName(){
           var name = $("#name").val();
           if( name == ''){
               $("#errorN").html('<i class="fa fa-exclamation-circle"></i>Vui lòng nhập họ tên');
               $("#errorN").show();
               error_name = true;
           }else if(name.length < 6){
               $("#errorN").html('<i class="fa fa-exclamation-circle"></i>Họ tên không hợp lệ');
               $("#errorN").show();
               error_name = true;
           }else{
               $("#errorN").hide();
           } 
         }
         $('#signupDesign').keyup(function(event){
            if(event.keyCode===13){
              processingRegister();
            }
          })
         $("#submit").click(function(){
             processingRegister();
          });
        function processingRegister(){
          error_username = false;
          error_password = false;
          error_email = false;
          error_enterpassword = false;
          error_phone = false;
          error_name = false;

          testUsername();
          testPassword();
          testEnterpassword();
          testEmail();
          testPhone();
          testName();
          
          if( error_username == false &&
              error_password == false &&
              error_email == false &&
              error_enterpassword == false &&
              error_phone == false &&
              error_name == false){
             var username = $("#Username").val();
             var pass = $("#Password").val();
             var email = $("#Email").val();
             var phone = $("#Phone").val();
             var name = $("#name").val();  
             $.ajax({
                  url : 'register.php',
                  type : 'post',
                  async : false,
                  data : {
                     'username' : username,
                     'pass' : pass,
                     'email': email,
                     'phone' : phone,
                     'name' : name
                  },
                  success: function(data){
                       $("#dk").modal('hide');
                        Swal.fire({
                          icon: 'success',
                          title: 'CHÚC MỪNG!',
                          text: 'Đăng ký thành công!'  
                        }).then((result) => {
                                  if(result.value){ 
                                     location.reload(true);
                                }
                             });
                        }
                });
          }else{
             Swal.fire("Đăng ký thất bại!", "vui lòng kiểm tra lại", "error");
            }  
         }  
});
///
//checking login
function checklogin(){
  var flag = true;
  var a = $("#username").val();
  var b = md5($("#password").val());
  if(a == "" || b == "" ){
     flag = false;
  }
  if(array_checklogin.length != 0){
    for( var i=0; i < array_checklogin.length-1; i+=2){
       if(array_checklogin[i] === a && array_checklogin[i+1] === b){
           flag = true;
        }else{
           flag = false;
          } 
       if(flag == true){
            break;
          }       
    }
  }else{
    flag = false;
  }
  return flag; 
}
   
$(function(){  
    // processing login 
    function processingLogin(){   
      if(checklogin()){
         var name = $("#username").val();
         var pass = md5($("#password").val());
         $.ajax({
              url : 'login.php',
              type : 'post',
              async : false,
              data : {
                   'name' : name,
                   'pass' : pass
              },
              success: function(data){
                $("#dn").modal('hide');
                 Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'Đăng nhập thành công',
                    showConfirmButton: false,
                    timer: 1000
                  }).then((result) => {
                          location.reload(true);
                     });
                  }
             }); 
       }else{     
            Swal.fire("Đăng nhập thất bại!", "vui lòng kiểm tra lại!", "error");
         }  
      }
    //Enter event
    $('#signinDesign').keyup(function(event){
        if(event.keyCode===13){
          processingLogin();
        }
    });
    // Click event
    $("#submit1").click(function(){
          processingLogin();
    });  
});
// orders
$("#successOrders").click(function(){  
    var name = $("#recipient-name").val();
    var address = $("#recipient-address").val(); 
    var phone = $("#recipient-phone").val(); 
    var note = $("#message-text").val(); 
    $.ajax({
       url : 'processingOrders.php',
       type : 'post',
       data : {
          'name' : name,
          'address' : address,
          'phone' : phone,
          'note' : note
       },
       success: function(data){
            Swal.fire({
              icon: 'success',
              title: 'Đặt hàng thành công!',
              text: 'Hãy kiểm tra đơn hàng của bạn ở mục đơn hàng'  
            }).then((result) => {
                    if(result.value){ 
                       window.location.href = "index.php?view=orders";
                  }
               });;
           $('#Order').modal('hide'); 
       }
    });
});
// swap password
$(function(){
     $("#errorOldpassword").hide();
     $("#errorNewpassword").hide();
     $("#errorEnterNewpassword").hide();

     var errorOP = false;
     var errorNP = false;
     var errorENP = false;

     $("#oldpassword").focusout(function(){
          testOP();
     });

     $("#newpassword").focusout(function(){
          testNP();
     });

     $("#enternewpassword").focusout(function(){
          testENP();
     });

     function testOP(){
         var b = md5($("#oldpassword").val()); 
        if(oldpassword != b){
           $("#errorOldpassword").html('<i class="fa fa-exclamation-circle fas"></i>Mật khẩu không đúng!!');
           $("#errorOldpassword").show();
           errorOP = true;
        }else{
          $("#errorOldpassword").hide();
        }
     }
     function testNP(){
             var password_length = $("#newpassword").val().length;
             if(password_length < 8){
              $("#errorNewpassword").html('<i class="fa fa-exclamation-circle fas"></i>Hãy nhập mật khẩu từ 8 ký tự trở lên');
              $("#errorNewpassword").show();
              errorNP = true;
             }else{
              $("#errorNewpassword").hide();
             }
         }
     function testENP(){
        var a = $("#newpassword").val();
        var b = $("#enternewpassword").val();
        if(a != b){
           $("#errorEnterNewpassword").html('<i class="fa fa-exclamation-circle fas"></i>Mật khẩu không khớp !!');
           $("#errorEnterNewpassword").show();
           errorENP = true;
        }else{
          $("#errorEnterNewpassword").hide();
        }
     }
     $("#successSwap").click(function(){
         errorOP = false;
         errorNP = false;
         errorENP = false;

         testOP();
         testNP();
         testENP();

         if(errorOP == false && errorNP == false && errorENP == false){
             var newpassword = $("#newpassword").val();
             $.ajax({
               url : 'swapPassword.php',
               type : 'POST',
               async : false,
               data : { 'newpassword' : newpassword },
               success: function(data){
                  $("#swapPassword").modal('hide');
                        Swal.fire({
                          icon: 'success',
                          title: 'CHÚC MỪNG!',
                          text: 'Đổi mật khẩu thành công!'  
                        }).then((result) => {
                                  if(result.value){ 
                                     location.reload(true);
                                }
                             });
                          }
             });
         }     
     });
});







