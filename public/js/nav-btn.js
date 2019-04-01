function activeBtn() {

    var myParam = location.search.split('sort=')[1];
    var activeButton = document.getElementsByName(myParam);
    console.log(myParam);
    activeButton.className += " active";
  }