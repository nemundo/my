class Timer {

    intervall = 1000;
    _timer = null;

    set onTime(value) {
        this._timer = setInterval(value, this.intervall);
    }

    stop() {
        clearTimeout(this._timer);
    }

}
