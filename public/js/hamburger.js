function OpenWhenClick() {
    var x = document.getElementById("nav_id");
    if (x.className === "nav_class") {
      x.className += " responsive";
      document.getElementById('logo_change').className = "fas fa-times";
    } else {
      x.className = "nav_class";
      document.getElementById('logo_change').className = "fa fa-bars";
    }
  }