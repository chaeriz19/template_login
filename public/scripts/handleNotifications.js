const thing = document.getElementById("2");
console.log("Loading handleNotifications.js");

function notifcation(msg, type){
    // types: 1 Green, 2 Red, 3 Default
    colors = ['green','red','black'];
    const notification = document.querySelector("#notification");
    notification.innerHTML = msg;
    notification.colors = "red";
}