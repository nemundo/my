let doc = new DocumentContainer();

doc.onLoaded = function () {

    let select = new SelectContainer("select1");
    select.onChange = function () {
        console.log(select.value);
        console.log(select.text);
    };

    /*
    let btn = new ButtonContainer("btn_1");
    btn.onClick=function () {
      console.log("click");
    };



    let btnList = new BaseContainerList("button");

    btnList.onClick = function () {
      console.log("hello"+this.id);

        let btn = new ButtonContainer(this.id);
        btn.disabled=true;

    };*/


    /*

    var classname = document.getElementsByClassName("button");

    var myFunction = function() {
        var attribute = this.id;  // getAttribute("data-myattribute");
        //alert(attribute);
        console.log("click"+attribute);
    };

    for (var i = 0; i < classname.length; i++) {
        classname[i].addEventListener('click', myFunction, false);
    }*/


};