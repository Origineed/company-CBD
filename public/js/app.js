/*$(function(){
    $(".option").on('click',function(){
    $(".option").removeClass("active");
    $(this).addClass("active");
    }
 )});*/

 function readMore() {
    var expandInfo = document.getElementById(".more-info-js");
    var mainHeadings = document.getElementById(".main-headings-js");

    mainHeadings.style.transform = "scale(0.7)";
    expandInfo.style.height = "350px";
  } 