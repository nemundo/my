


let delay = new Delay();
delay.delay = 3000;
delay.onDelay = function () {
    (new Debug).writeLog("delay");
};