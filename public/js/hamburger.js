function OpenWhenClick() {
    var x = document.getElementById(`nav-id`);
    if (x.className === `nav-class`) {
      x.className += ` responsive`;
      document.getElementById('nav-icon').className = `fas fa-times`;
    } else {
      x.className = `nav-class`;
      document.getElementById(`nav-icon`).className = `fa fa-bars`;
    }
  }
  OpenWhenClick();