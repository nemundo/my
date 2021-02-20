let parentElement = new DivContainer("app");

let table = new TableContainer(parentElement);
table.addCssClass("nemundo_table");



let row = new TableHeader(table);
row.addText("A");
row.addText("B");
row.addText("C");


for (let n = 0; n < 10; n++) {

    let row = new TableRow(table);
    row.addText("hello " + n);
    row.addText("hello");
    row.addText("hello");

}

//table.addRow();



