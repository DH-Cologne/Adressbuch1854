function selView(n, litag) {
    var tab1 = "none";
    var tab2 = "none";
    var tab3 = "none";
    var tab4 = "none";
    switch(n) {
      case 1:
        tab1 = "inline";
        break;
      case 2:
        tab2 = "inline";
        break;
      case 3:
        tab3 = "inline";
        break;
      case 4:
        tab4 = "inline";
        break;
        // add how many cases you need
      default:
        break;
    }
  
    document.getElementById("tab1").style.display = tab1;
    document.getElementById("tab2").style.display = tab2;
    document.getElementById("tab3").style.display = tab3;
    document.getElementById("tab4").style.display = tab4;
    var tabs2 = document.getElementById("tabs2");
    var ca = Array.prototype.slice.call(tabs2.querySelectorAll("li"));
    ca.map(function(elem) {
      
      elem.style.borderBottom="2px solid #5B788C"
    });
  
    litag.style.borderBottom = "2px solid #ED8B00";
    litag.style.fontWeight="bold";
  
  }
  
  function selInit() {
    var tabs2 = document.getElementById("tabs2");
    var litag = tabs2.querySelector("li");   // first li
    litag.style.borderBottom = "2px solid #ED8B00";
    }