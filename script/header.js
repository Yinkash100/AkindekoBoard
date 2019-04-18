

var date_div = document.getElementById("my_date");

    var presentDate = new Date();
  date_div.innerHTML =presentDate.getDate()+ ": "+presentDate.getMonth() +": "+presentDate.getYear() ;