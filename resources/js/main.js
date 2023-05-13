// sidebar comportamento
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
}


let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
});


// accordion zona revisore
(function() {
    var d = document;
    var accordionToggles = d.querySelectorAll('.js-accordionTrigger');
    var setAriaAttr;
    var setAccordionAria;
    var switchAccordion;
    var touchSupported = ('ontouchstart' in window);
    var pointerSupported = ('pointerdown' in window);
    var skipClickDelay = function(e) {
      e.preventDefault();
      e.target.click();
    };
  
    setAriaAttr = function(el, ariaType, newProperty) {
      el.setAttribute(ariaType, newProperty);
    };
  
    setAccordionAria = function(el1, el2, expanded) {
      switch(expanded) {
        case "true":
          setAriaAttr(el1, 'aria-expanded', 'true');
          setAriaAttr(el2, 'aria-hidden', 'false');
          break;
        case "false":
          setAriaAttr(el1, 'aria-expanded', 'false');
          setAriaAttr(el2, 'aria-hidden', 'true');
          break;
        default:
          break;
      }
    };
  
    switchAccordion = function(e) {
      console.log("triggered");
      e.preventDefault();
      var thisAnswer = e.target.parentNode.nextElementSibling;
      var thisQuestion = e.target;
      if(thisAnswer.classList.contains('is-collapsed')) {
        setAccordionAria(thisQuestion, thisAnswer, 'true');
      } else {
        setAccordionAria(thisQuestion, thisAnswer, 'false');
      }
      thisQuestion.classList.toggle('is-collapsed');
      thisQuestion.classList.toggle('is-expanded');
      thisAnswer.classList.toggle('is-collapsed');
      thisAnswer.classList.toggle('is-expanded');
      thisAnswer.classList.toggle('animateIn');
    };
  
    for (var i = 0, len = accordionToggles.length; i < len; i++) {
      if(touchSupported) {
        accordionToggles[i].addEventListener('touchstart', skipClickDelay, false);
      }
      if(pointerSupported){
        accordionToggles[i].addEventListener('pointerdown', skipClickDelay, false);
      }
      accordionToggles[i].addEventListener('click', switchAccordion, false);
    }
  })();
  