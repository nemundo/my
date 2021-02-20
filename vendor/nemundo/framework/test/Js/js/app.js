let parentElement = new DivContainer("app");

let form = new FormContainer(parentElement);  // new DivContainer(parentElement);

let input = new TextInputContainer(form);
input.name = "input1";

let fileinput = new FileInputContainer(form);
input.name = "file1";



let btn = new ButtonContainer(form);
btn.label = 'Save';
btn.onClick = function () {

    (new Debug).write('save ' + input.getValue());

    // save

    //fetch(url)

    /*
     let xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
     // Typical action to be performed when the document is ready:
     //document.getElementById("demo").innerHTML = xhttp.responseText;


     }
     };
     xhttp.open("GET", "filename", true);
     xhttp.send();*/

    // class Url

    let url = "/slu3000/config/post-test";
    form.saveData(url);

    /* let request = new WebRequest(url);
     request.onLoaded=function () {

     p.text = request.getContent();

     let obj = JSON.parse(request.getContent());
     for (let n = 0; n <obj.length;n++) {
     console.log(obj[n].id);
     }

     //console.log(obj);

     };*/


    /*
     let url = "http://localhost/slu3000/config/json-test";

     let xhr = new XMLHttpRequest();
     xhr.open('GET', url, true);
     xhr.send();

     xhr.onload = function () {
     // Request finished. Do processing here.

     console.log('onload');
     (new Debug).write(xhr.responseText);


     };*/


    input.clearInput();
    return false;

};


let p = new ParagraphContainer(parentElement);
p.text = "[data]";



