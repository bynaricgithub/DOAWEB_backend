/*footer slider realted code*/
$(document)
  .ready(function () {
    $(".customer-logos").slick({
      slidesToShow: 10,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 3000,
      arrows: true,
      dots: false,
      pauseOnHover: false,
      prevArrow: '<i class="slick-prev fas fa-angle-left"></i>',
      nextArrow: '<i class="slick-next fas fa-angle-right"></i>',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 5,
          },
        },
        {
          breakpoint: 520,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 912,
          settings: {
            slidesToShow: 5,
          },
        },
      ],
    });
  })
  .on("setPosition", function (event, slick) {
    slick.$slides.css("height", slick.$slideTrack.height() + "px");
  });

/*set height for menu*/
function SetHeight() {
  console.log(7777);
  document.getElementById("heightNav").style.height = "150px";
  // document.getElementById("navbarCollapse").style.backgroundColor='red';
  document.getElementById("navbarCollapse").style.overflow = "scroll";
}
/* display image and video gallery*/

function myFunctionforphoto() {
  document.getElementById("carouselExampleControls").style.display = "block";
  document.getElementById("carouselExampleControls1").style.display = "none";
  console.log(999);
}

function myFunctionforvideo() {
  document.getElementById("carouselExampleControls1").style.display = "block";
  document.getElementById("carouselExampleControls").style.display = "none";
}

/*translate language hindi english marathi*/
// function googleTranslateElementInit() {
//   new google.translate.TranslateElement(
//     { pageLanguage: "en" },
//     "google_translate_element"
//   );
// }

//read more leass
// function myFunction() {
//   console.log(7878)
//   var dots = document.getElementById("dots");
//   var moreText = document.getElementById("more");
//   var btnText = document.getElementById("myBtn");

//   if (dots.style.display === "none") {
//     dots.style.display = "inline";
//     btnText.innerHTML = "Read more";
//     moreText.style.display = "none";
//   } else {
//     dots.style.display = "none";
//     btnText.innerHTML = "Read less";
//     moreText.style.display = "inline";
//   }
// }

//w3c logo new window funstions
jQuery(document).ready(function () {
  var linkclass = jQuery(".footerlogo");

  findid = linkclass.find("#Xhtml");

  findid.click(function (event) {
    if (
      confirm(
        "This link will take you to an external website.यह लिंक आपको बाहरी वेबसाइट पर ले जाएगा।  हा दुवा आपल्याला एका बाह्य वेबसाइटवर घेऊन जाईल."
      )
    ) {
      window.open("https://www.w3.org/WAI/WCAG2AA-Conformance", "_blank"); //This will open the website in a new tab
    }
  });
});

jQuery(document).ready(function () {
  var linkclass = jQuery(".footerlogo");

  findid = linkclass.find("#WACG");

  findid.click(function (event) {
    if (
      confirm(
        "This link will take you to an external website.यह लिंक आपको बाहरी वेबसाइट पर ले जाएगा।  हा दुवा आपल्याला एका बाह्य वेबसाइटवर घेऊन जाईल."
      )
    ) {
      window.open(
        "https://validator.w3.org/check?uri=https%3A%2F%2Fmsbte.org.in%2F&charset=%28detect+automatically%29&doctype=Inline&group=0",
        "_blank"
      ); //This will open the website in a new tab
    }
  });
});

jQuery(document).ready(function () {
  var linkclass = jQuery(".footerlogo");

  findid = linkclass.find("#CSS");

  findid.click(function (event) {
    if (
      confirm(
        "This link will take you to an external website.यह लिंक आपको बाहरी वेबसाइट पर ले जाएगा।  हा दुवा आपल्याला एका बाह्य वेबसाइटवर घेऊन जाईल."
      )
    ) {
      window.open(
        "https://jigsaw.w3.org/css-validator/check/referer",
        "_blank"
      ); //This will open the website in a new tab
    }
  });
});
//background color change header footer
function chngebackgroundpink() {
  // console.log("pink")
  document.getElementById("headerfix").style.backgroundColor = "#367DA8";
  document.getElementById("fixfooter").style.backgroundColor = "#367DA8";
  document.getElementById("imgbackground").style.backgroundColor = "white";
  // document.getElementsByClassName("footertext").style.color = "white";
  for (i = 0; i <= 20; i++) {
    document.getElementsByClassName("footertext")[i].style.color = "white";
  }
}
function chngebackgroundblack() {
  // console.log("black")
  document.getElementById("headerfix").style.backgroundColor = "black";
  document.getElementById("fixfooter").style.backgroundColor = "black";
  document.getElementById("imgbackground").style.backgroundColor = "white";
  document.getElementById("textlogo").style.color = "white";
  document.getElementById("textlogo1").style.color = "white";
  for (i = 0; i <= 20; i++) {
    document.getElementsByClassName("footertext")[i].style.color = "white";
  }
}

// zoom in zoom out
//     var zoom = 1;

// 	$('.zoom').on('click', function(){
// zoom += 0.1;
// 		$('.target').css('transform', 'scale(' + zoom + ')');
// 	});
// 	$('.zoom-init').on('click', function(){
// 		zoom = 1;
// 		$('.target').css('transform', 'scale(' + zoom + ')');
// 	});
// 	$('.zoom-out').on('click', function(){
// 		zoom -= 0.1;
// 		$('.target').css('transform', 'scale(' + zoom + ')');
// 	});

// on scroll zoom out in

//zoom in zoom out text

// const textContent= document.getElementById("textContent");
// const btnZoomIn= document.getElementById("zoomIn");
// const btnZoomOut= document.getElementById("zoomOut");
// const btnzoomNormal= document.getElementById("btnzoomNormal");

// let zoomLevel = 1;

// btnZoomIn.addEventListener("click", () => {
//   if (zoomLevel < 2) {
//     zoomLevel = zoomLevel + 0.1;
//     textContent.style.zoom = `${zoomLevel}`;
//   }
// });
// btnZoomOut.addEventListener("click", () => {
//   if (zoomLevel > 1) {
//     zoomLevel = zoomLevel - 0.1;
//     textContent.style.zoom = `${zoomLevel}`;
//   }
// });
// btnzoomNormal.addEventListener("click", () => {
//   if (zoomLevel = 1) {
//     zoomLevel = 1;
//     textContent.style.zoom = `${zoomLevel}`;
//   }
// });

/*document.addEventListener("DOMContentLoaded", function(){
  // make it as accordion for smaller screens
  if (window.innerWidth < 992) {
  
    // close all inner dropdowns when parent is closed
    document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
      everydropdown.addEventListener('hidden.bs.dropdown', function () {
        // after dropdown is hidden, then find all submenus
          this.querySelectorAll('.submenu').forEach(function(everysubmenu){
            // hide every submenu as well
            everysubmenu.style.display = 'none';
          });
      })
    });
  
    document.querySelectorAll('.dropdown-menu a').forEach(function(element){
      element.addEventListener('click', function (e) {
          let nextEl = this.nextElementSibling;
          if(nextEl && nextEl.classList.contains('submenu')) {	
            // prevent opening link if link needs to open dropdown
            e.preventDefault();
            if(nextEl.style.display == 'block'){
              nextEl.style.display = 'none';
            } else {
              nextEl.style.display = 'block';
            }
  
          }
      });
    })
  }
});*/

$("#font-setting-buttons").easyView({
  container: "#imageMainHomePage",
  increaseSelector: ".increase-me",
  decreaseSelector: ".decrease-me",
  normalSelector: ".reset-me",
  contrastSelector: ".change-me",
});
$("#font-setting-buttons").easyView({
  container: "#imagemain",
  increaseSelector: ".increase-me",
  decreaseSelector: ".decrease-me",
  normalSelector: ".reset-me",
  contrastSelector: ".change-me",
});
$("#font-setting-buttons").easyView({
  container: "#imagemain1",
  increaseSelector: ".increase-me",
  decreaseSelector: ".decrease-me",
  normalSelector: ".reset-me",
  contrastSelector: ".change-me",
});

// captcha code login page
(function () {
  const fonts = ["cursive", "sans-serif", "serif", "monospace"];
  let captchaValue = "";
  function generateCaptcha() {
    let value = btoa(Math.random() * 1000000000);
    value = value.substr(0, 5 + Math.random() * 5);
    captchaValue = value;
  }
  function setCaptcha() {
    let html = captchaValue
      .split("")
      .map((char) => {
        const rotate = -20 + Math.trunc(Math.random() * 30);
        const font = Math.trunc(Math.random() * fonts.length);
        return `<span 
        style="
          transform:rotate(${rotate}deg);
          font-family:${fonts[font]}
        "
      >${char}</span>`;
      })
      .join("");
    document.querySelector(".login-form .captcha .preview").innerHTML = html;
  }
  function initCaptcha() {
    document
      .querySelector(".login-form .captcha .captcha-refresh")
      .addEventListener("click", function () {
        generateCaptcha();
        setCaptcha();
      });
    generateCaptcha();
    setCaptcha();
  }
  initCaptcha();

  document
    .querySelector(".login-form #login-btn")
    .addEventListener("click", function () {
      let inputCaptchaValue = document.querySelector(
        ".login-form .captcha input"
      ).value;
      if (inputCaptchaValue === captchaValue) {
        swal("", "Logging In!", "success");
      } else {
        swal("Invalid captcha");
      }
    });
})();

// feedback form captcha
$(function () {
  $("#subForm").ebcaptcha();
});

(function ($) {
  jQuery.fn.ebcaptcha = function (options) {
    var element = this;
    var input = this.find("#ebcaptchainput");
    var label = this.find("#ebcaptchatext");
    $(element).find("button[type=submit]").attr("disabled", "disabled");

    var randomNr1 = 0;
    var randomNr2 = 0;
    var totalNr = 0;

    randomNr1 = Math.floor(Math.random() * 10);
    randomNr2 = Math.floor(Math.random() * 10);
    totalNr = randomNr1 + randomNr2;
    var texti = "What is " + randomNr1 + " + " + randomNr2;
    $(label).text(texti);

    $(input).keyup(function () {
      var nr = $(this).val();
      if (nr == totalNr) {
        $(element).find("button[type=submit]").removeAttr("disabled");
      } else {
        $(element).find("button[type=submit]").attr("disabled", "disabled");
      }
    });

    $(document).keypress(function (e) {
      if (e.which == 13) {
        if (element.find("button[type=submit]").is(":disabled") == true) {
          e.preventDefault();
          return false;
        }
      }
    });
  };
})(jQuery);
