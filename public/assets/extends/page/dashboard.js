jQuery(document).ready(function () {
 setInterval(displayTime, 1000);

 function displayTime() {
  const timeNow = new Date();
  let hoursOfDay = timeNow.getHours();
  let minutes = timeNow.getMinutes();
  let seconds = timeNow.getSeconds();
  let date = timeNow.getDate();
  let weekDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
  let today = weekDay[timeNow.getDay()];
  let months = timeNow.toLocaleString("default", {
    month: "long"
  });
  let year = timeNow.getFullYear();
  let period = "AM";
  if (hoursOfDay > 12) {
    hoursOfDay -= 12;
    period = "PM";
  }
  if (hoursOfDay === 0) {
    hoursOfDay = 12;
    period = "AM";
  }
  hoursOfDay = hoursOfDay < 10 ? "0" + hoursOfDay : hoursOfDay;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  seconds = seconds < 10 ? "0" + seconds : seconds;
  let time = hoursOfDay + ":" + minutes + ":" + seconds + " " + period;
  document.getElementById('Clock').innerHTML = time;
  document.getElementById('date').innerHTML = today + ", " + date + " " + months + " " + year;
}
displayTime();

});
function currentpass() {
  var x = document.getElementById("currentpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function newpass() {
  var x = document.getElementById("newpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function confirmpass() {
  var x = document.getElementById("confirmpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

