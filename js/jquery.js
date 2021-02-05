 /*-----For Search Bar-----------------------------*/
 $(document).on('click','.search',function(){
  $('.search-bar').addClass('search-bar-active')
});

$(document).on('click','.search-cancel',function(){
  $('.search-bar').removeClass('search-bar-active')
});
/*---For Login and Sign-up----------------------------*/

$(document).on('click','.user,.already-account',function(){
  $('.form').addClass('login-active').removeClass('sign-up-active')
});

$(document).on('click','.sign-up-btn',function(){
  $('.form').addClass('sign-up-active').removeClass('login-active')
});

$(document).on('click','.form-cancel',function(){
  $('.form').removeClass('login-active').removeClass('sign-up-active')
});

/*--For-make-Menu-responsive------------*/
$(document).ready(function(){
  $('.toggle').click(function(){
      $('.toggle').toggleClass('active')
      $('.navigation').toggleClass('active')
  })
});



// -----------------contact us js -----------------

const inputs = document.querySelectorAll(".input");

function focusFunc() {
let parent = this.parentNode;
parent.classList.add("focus");
}

function blurFunc() {
let parent = this.parentNode;
if (this.value == "") {
  parent.classList.remove("focus");
}
}

inputs.forEach((input) => {
input.addEventListener("focus", focusFunc);
input.addEventListener("blur", blurFunc);
});

// java script for productDetail page for image preview
var productImg = document.getElementById('productImg');
var smallImg = document.getElementsByClassName('small-img');

if(smallImg[0]!=null){
  smallImg[0].onclick = function () {
      productImg.src = smallImg[0].src;
  }
}
if(smallImg[1]!=null){
  smallImg[1].onclick = function () {
      productImg.src = smallImg[1].src;
  }
}

if(smallImg[2]!=null){
  smallImg[2].onclick = function () {
      productImg.src = smallImg[2].src;
  }
}
if(smallImg[3]!=null){
  smallImg[3].onclick = function () {
      productImg.src = smallImg[3].src;
  }
}





//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
e.preventDefault();

fieldName = $(this).attr('data-field');
type      = $(this).attr('data-type');
var input = $("input[name='"+fieldName+"']");
var currentVal = parseInt(input.val());
if (!isNaN(currentVal)) {
    if(type == 'minus') {
        
        if(currentVal > input.attr('min')) {
            input.val(currentVal - 1).change();
        } 
        if(parseInt(input.val()) == input.attr('min')) {
            $(this).attr('disabled', true);
        }

    } else if(type == 'plus') {

        if(currentVal < input.attr('max')) {
            input.val(currentVal + 1).change();
        }
        if(parseInt(input.val()) == input.attr('max')) {
            $(this).attr('disabled', true);
        }

    }
} else {
    input.val(0);
}
});
$('.input-number').focusin(function(){
$(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {

minValue =  parseInt($(this).attr('min'));
maxValue =  parseInt($(this).attr('max'));
valueCurrent = parseInt($(this).val());

name = $(this).attr('name');
if(valueCurrent >= minValue) {
    $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
} else {
    alert('Sorry, the minimum value was reached');
    $(this).val($(this).data('oldValue'));
}
if(valueCurrent <= maxValue) {
    $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
} else {
    alert('Sorry, the maximum value was reached');
    $(this).val($(this).data('oldValue'));
}


});
$(".input-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
         // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) || 
         // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});





       


      