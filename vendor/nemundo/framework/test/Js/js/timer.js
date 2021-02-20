

//let parentElement = document.getElementById("app");

let parentElement = new DivContainer("app");
let p = new ParagraphContainer(parentElement);


let timer = new Timer();
timer.intervall = 500;
timer.onTime = function () {

    p.text = "Time: "+(new Date()).getUTCDate().toTimeString();

};









