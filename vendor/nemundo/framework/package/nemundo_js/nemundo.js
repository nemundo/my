class Debug {
write(message) {
console.log(message);
}
writeLog(message) {
console.log(message);
}
writeError(message) {
console.error(message);
}
writeWarning(message) {
console.warn(message);
}
writeList(list) {
console.table(list);
}
}
class WebConfig {
static webUrl = '/';
}
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
class Delay {
delay = 1000;
_timer = null;
set onDelay(value) {
this._timer = setTimeout(value, this.delay);
}
}
class DocumentContainer {
set title(value) {
document.title = value;
}
set onLoaded(value) {
document.addEventListener("DOMContentLoaded", value);
}
set keyDown(value) {
document.addEventListener("keydown",value);
}
getBody() {
let element = document.getElementsByTagName("body")[0];
return element;
}
}
class BaseContainerList {
_htmlElementList = null;
constructor(className) {
//console.log(className);
this._htmlElementList = document.getElementsByClassName(className);
/*var classname = document.getElementsByClassName("button");
var myFunction = function() {
var attribute = this.id;  // getAttribute("data-myattribute");
//alert(attribute);
console.log("click"+attribute);
};
for (var i = 0; i < classname.length; i++) {
classname[i].addEventListener('click', myFunction, false);
}*/
}
set onClick(event) {
//this._htmlElement.addEventListener("click", event);
for (let i = 0; i < this._htmlElementList.length; i++) {
this._htmlElementList[i].addEventListener('click', event, false);
}
}
set onChange(event) {
for (let i = 0; i < this._htmlElementList.length; i++) {
this._htmlElementList[i].addEventListener('change', event, false);
}
}
}
// HtmlContainer
class BaseContainer {
_htmlElement = null;
constructor(tagName, parentContainer) {
if (parentContainer !== null) {
this._htmlElement = document.createElement(tagName);
if (parentContainer instanceof BaseContainer) {
parentContainer._htmlElement.appendChild(this._htmlElement);
}
if (parentContainer instanceof Node) {
parentContainer.appendChild(this._htmlElement);
}
if (typeof parentContainer === "string") {
this.fromId(parentContainer);
}
if (this._htmlElement == null) {
(new Debug).writeError("problem");
}
}
}
fromId(id) {
this._htmlElement = document.getElementById(id);
}
set id(value) {
this._htmlElement.id = value;
}
get id() {
return this._htmlElement.id;
}
set onClick(event) {
this._htmlElement.addEventListener("click", event);
}
set onMouseDown(event) {
this._htmlElement.addEventListener("mousedown", event);
}
set onMouseUp(event) {
this._htmlElement.addEventListener("mouseup", event);
}
set onTouchStart(event) {
this._htmlElement.addEventListener("touchstart", event);
}
set onTouchMove(event) {
this._htmlElement.addEventListener("touchmove", event);
}
set onTouchEnd(event) {
this._htmlElement.addEventListener("touchend", event);
}
set onChange(event) {
this._htmlElement.addEventListener("change", event);
}
set onFocus(event) {
this._htmlElement.addEventListener("focus", event);
}
set visible(value) {
if (value) {
this._htmlElement.style.visibility = "";
} else {
this._htmlElement.style.visibility = "hidden";
}
}
addCssClass(cssClass) {
// split cssClass
this._htmlElement.classList.add(cssClass);
}
removeCssClass(cssClass) {
this._htmlElement.classList.remove(cssClass);
}
removeContainer() {
this._htmlElement.remove();
}
emptyContainer() {
this._htmlElement.innerHTML = "";
}
getAttribute(name) {
let value = this._htmlElement.getAttribute(name);
return value;
}
getDataAttribute(name) {
let value = this.getAttribute("data-" + name);
return value;
}
}
class ContentContainer extends BaseContainer {
set text(value) {
this._htmlElement.innerHTML = value;
}
emptyContainer() {
this.text = "";
}
}
class DivContainer extends ContentContainer {
constructor(parentContainer) {
super("div", parentContainer);
}
}
class ParagraphContainer extends ContentContainer {
constructor(parentContainer) {
super("p", parentContainer);
}
}
class SpanContainer extends ContentContainer {
constructor(parentContainer) {
super("span", parentContainer);
}
}
class HyperlinkContainer extends ContentContainer {
constructor(parentContainer) {
super("a", parentContainer);
}
set url(value) {
this._htmlElement.href = value;
}
}
class FormBaseContainer extends BaseContainer {
set disabled(value) {
this._htmlElement.disabled = value;
}
get disabled() {
return this._htmlElement.disabled;
}
set keyDown(value) {
document.addEventListener("keydown",value);
}
}
class LabelContainer extends ContentContainer {
constructor(parentContainer) {
super("label", parentContainer);
}
}
class ButtonContainer extends FormBaseContainer {
constructor(parentContainer) {
super("button", parentContainer);
this._htmlElement.type = "button";
}
set label(value) {
this._htmlElement.innerHTML = value;
}
}
class FormContainer extends BaseContainer {
_afterSave = null;
constructor(parentContainer) {
super("form", parentContainer);
}
set afterSave(value) {
this._afterSave = value;
}
saveData(url) {
let formData = new FormData(this._htmlElement);
let copy = this;
let xhr = new XMLHttpRequest();
if (this._afterSave !== null) {
xhr.onreadystatechange = function () {
if (this.readyState === 4 && this.status === 200) {
copy._afterSave();
}
};
}
xhr.open('POST', url, true);
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(formData);
}
}
class InputContainer extends FormBaseContainer {
constructor(parentContainer) {
super("input", parentContainer);
//this._htmlElement.type = "text";
}
set name(value) {
this._htmlElement.name = value;
}
set readOnly(value) {
this._htmlElement.readOnly = value;
}
set value(value) {
this._htmlElement.value = value;
}
get value() {
return this._htmlElement.value;
}
set onInput(value) {
this._htmlElement.addEventListener("input", value);
}
set onFocus(value) {
this._htmlElement.addEventListener("focus", value);
}
clearInput() {
this.value = "";
}
}
class TextInputContainer extends InputContainer {
constructor(parentContainer) {
super(parentContainer);
this._htmlElement.type = "text";
}
setFocus() {
this._htmlElement.focus();
}
set placeholder(value) {
this._htmlElement.placeholder = value;
}
set onKey(event) {
this._htmlElement.addEventListener("keyup", event);
}
set keyDown(value) {
document.addEventListener("keydown",value);
}
}
class FileInputContainer extends InputContainer {
constructor(parentContainer) {
super(parentContainer);
this._htmlElement.type = "file";
}
}
class RangeInputContainer extends InputContainer {
constructor(parentContainer) {
super( parentContainer);
this._htmlElement.type = "range";
}
set minValue(value) {
this._htmlElement.min = value;
}
set maxValue(value) {
this._htmlElement.max = value;
}
set stepValue(value) {
this._htmlElement.step = value;
}
}
class CheckboxContainer extends InputContainer {
constructor(parentContainer) {
super(parentContainer);
this._htmlElement.type = "checkbox";
}
set value(value) {
this._htmlElement.checked = value;
}
get value() {
return this._htmlElement.checked;
}
set disabled(value) {
this._htmlElement.disabled = value;
}
}
class TextareaContainer extends FormBaseContainer {
constructor(parentContainer) {
super("textarea", parentContainer);
}
set rows(value) {
this._htmlElement.rows = value;
}
set cols(value) {
this._htmlElement.cols = value;
}
set value(value) {
this._htmlElement.value = value;
}
get value() {
return this._htmlElement.value;
}
}
class SelectContainer extends FormBaseContainer {
constructor(parentContainer) {
super("select", parentContainer);
}
addItem(value, label) {
let option = document.createElement("option");
option.value = value;
option.innerText = label;
this._htmlElement.appendChild(option);
}
set value(value) {
this._htmlElement.value = value;
}
get value() {
return this._htmlElement.value;
}
get text() {
return this._htmlElement.options[this._htmlElement.selectedIndex].innerHTML;
}
//  this.options[this.selectedIndex].innerHTML
}
class ImageContainer extends BaseContainer {
constructor(parentContainer) {
super("img", parentContainer);
}
set imageUrl(value) {
this._htmlElement.src =value;
}
set width(value) {
this._htmlElement.width=value;
}
set height(value) {
this._htmlElement.height=value;
}
}
class UnorderedList extends BaseContainer {
constructor(parentContainer) {
super("ul",parentContainer);
}
addItem(text) {
let li = document.createElement("li");
li.innerHTML = text;
this._htmlElement.appendChild(li);
}
}
class TableContainer extends BaseContainer {
constructor(parentContainer) {
super("table", parentContainer);
}
set border(value) {
this._htmlElement.border = value;
}
}
class TdContainer extends BaseContainer {
constructor(parentContainer) {
super("td", parentContainer);
}
}
class TableHeader extends BaseContainer{
constructor(parentContainer) {
super("tr", parentContainer);
}
addText(text) {
let td = document.createElement("th");
//        td.innerText = text;
td.innerHTML = text;
this._htmlElement.appendChild(td);
}
addEmpty() {
this.addText("");
}
}
class TableRow extends BaseContainer {
constructor(parentContainer) {
super("tr", parentContainer);
}
addText(text) {
let td = document.createElement("td");
//td.innerText = text;
td.innerHTML=text;
this._htmlElement.appendChild(td);
}
addEmpty() {
this.addText("&nbsp;");
}
}
class H1Container extends ContentContainer {
constructor(parentContainer=null) {
super("h1", parentContainer);
}
}
class H2Container extends ContentContainer {
constructor(parentContainer=null) {
super("h2", parentContainer);
}
}
class IframeContainer extends ContentContainer {
constructor(parentContainer) {
super("iframe", parentContainer);
}
set src(value) {
this._htmlElement.src = value;
}
set width(value) {
this._htmlElement.width = value;
}
set height(value) {
this._htmlElement.height = value;
}
set frameborder(value) {
this._htmlElement.frameborder = value;
}
}
class UrlParameter {
getValue(parameterName) {
let parameter = {};
window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
parameter[key] = value;
});
let value = null;
if (parameterName in parameter) {
value = parameter[parameterName];
}
return value;
}
}
class UrlBuilder {
_url = null;
_data = [];
constructor(url) {
this._url = url;
}
addParameter(name, value) {
this._data[name] = value;
}
getUrl() {
const ret = [];
for (let n in this._data) {
ret.push(encodeURIComponent(n) + '=' + encodeURIComponent(this._data[n]));
}
let url = this._url;
if (ret.length > 0) {
url = url + "?" + ret.join('&');
}
return url;
}
}
// JsonRequest
// JsonWebRequest
class WebRequest {
url = null;
jsonCount = 0;
constructor(url = null) {
this.url = url;
this._xhr = new XMLHttpRequest();
this._xhr.open('GET', url, true);
this._xhr.send();
}
addParameter(name, value) {
}
// theoretisch kann es auch erst nach dem loading definiert werden
set onLoaded(value) {
this._xhr.onload = value;
}
/*
set onFinished(value) {
}*/
getContent() {
let content = null;
//if (this._xhr.readyState == 4 && this._xhr.status == 200) {
if (this._xhr.status === 200) {
content = this._xhr.responseText;
} else {
content = "Web Request Error";
}
return content;
}
getJson() {
let json = JSON.parse(this.getContent());
this.jsonCount = json.length;
return json;
}
getJsonCount() {
return this.jsonCount;
}
}