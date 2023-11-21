// xử lý nút đăng nhập ở index
document.addEventListener('DOMContentLoaded', function () {
document.getElementById('Login').addEventListener('click',function() {     
      var Loginform = document.getElementById('login');   
      var modal = document.getElementById('modal_1');
      var loginDisplay = window.getComputedStyle(Loginform).getPropertyValue('display');
      var modalDisplay = window.getComputedStyle(modal).getPropertyValue('display');

        if(loginDisplay === 'none' && modalDisplay  === 'none' ){    
         Loginform.style.display = 'block';
         modal.style.display = 'flex';

        }
           
     });
    });
    // xử lý nút chuyển qua đăng ký của form đăng nhập
    document.addEventListener('DOMContentLoaded', function () {
      document.getElementById('moveRegister').addEventListener('click',function() {     
            var Loginform = document.getElementById('login');   
            var Registerform = document.getElementById('register'); 
            var loginDisplay = window.getComputedStyle(Loginform).getPropertyValue('display');
            var RegisterDisplay = window.getComputedStyle(Registerform).getPropertyValue('display');
              if(loginDisplay === 'block'  && RegisterDisplay === 'none' ){    
               Loginform.style.display = 'none';
               Registerform.style.display = 'block';
              }              
           });
          });
    
  // xử lý nút đăng ký ở index
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('Register').addEventListener('click',function() {     
          var Registerform = document.getElementById('register');   
          var modal = document.getElementById('modal_1');
          var RegisterDisplay = window.getComputedStyle(Registerform).getPropertyValue('display');
          var modalDisplay = window.getComputedStyle(modal).getPropertyValue('display');
    
            if(RegisterDisplay === 'none' && modalDisplay  === 'none' ){    
              Registerform.style.display = 'block';
             modal.style.display = 'flex';
            }               
         });
        });
          // xử lý nút chuyển qua đăng nhập của form đăng ký
    document.addEventListener('DOMContentLoaded', function () {
      document.getElementById('moveLogin').addEventListener('click',function() {     
            var Loginform = document.getElementById('login');   
            var Registerform = document.getElementById('register'); 
            var loginDisplay = window.getComputedStyle(Loginform).getPropertyValue('display');
            var RegisterDisplay = window.getComputedStyle(Registerform).getPropertyValue('display');
              if(loginDisplay === 'none'  && RegisterDisplay === 'block' ){    
               Loginform.style.display = 'block';
               Registerform.style.display = 'none';
              }              
           });
          });

     // xử lý nút đăng nhập
     document.getElementById('btn-login').addEventListener('click', function() {
         document.getElementById('login').submit();
     });
     // xử lý nút trở lại trong đăng nhập 
     document.getElementById('come-back').addEventListener('click',function(){
      window.location.href = "index.php";
    //  window.history.back();
     });
    // xử lý trở về trong đăng ký
     document.getElementById('come-back__register').addEventListener('click',function(){
      window.location.href = "index.php";
     });
    // xử lý ấn vào sản phẩm



