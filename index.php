<!--http://people.cs.clemson.edu/~sourimd/CPSC862/Ass7/-->
<html>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

var table;
var tr;
var td;
var tr_attribute;
var select;

var output_table;
var tr_of_output_table;
var arrows_holder_for_output_table;
var output_attributes_holder;
var output_attrbutes_listbox;
var right_button_output_attributes;

var orderby_table;
var tr_of_orderby_table;
var arrows_holder_for_orderby_table;
var orderby_holder;
var orderby_listbox;
var right_button_orderby;

var tr_for_headings;
var dataset_heading;

var constraint_listbox;

var ascdesc_button;
var ascdesc_holder_for_orderby_table;
var up_down_holder_for_up_buttons;


var selectstatement;
var dialogbox;

var getSQLButton;

var dynamic;

function initialize(){   
    table = document.createElement("TABLE");
    tr = document.createElement("TR");
    td = document.createElement("TD");
    td_attribute = document.createElement("TD");
    // td_output = document.createElement("TD");
    // td_orderby = document.createElement("TD");
    // td_constraints = document.createElement("TD");

    tr_for_headings = document.createElement("TR");
    dataset_heading = document.createElement("TD");
    dataset_heading.innerHTML = "DATASETS";
    dataset_heading.style.textAlign = "center";
    tr_for_headings.appendChild(dataset_heading);

    attribute_heading = document.createElement("TD");
    attribute_heading.innerHTML = "ATTRIBUTES";
    attribute_heading.style.textAlign = "center";
    tr_for_headings.appendChild(attribute_heading);

    output_heading_data = document.createElement("TD");
    output_heading_data.innerHTML = "OUTPUT";
    output_heading_data.style.textAlign = "center";
    output_heading_data.style.paddingRight = "55px";
    tr_for_headings.appendChild(output_heading_data);

    document.body.appendChild(table);
    table.appendChild(tr_for_headings);
    table.appendChild(tr);
    tr.appendChild(td); //tables
    tr.appendChild(td_attribute); //attributes


    select = document.createElement("SELECT");
    select.multiple=true;
    select.size=15;
    select.style.width="170px";
    td_attribute.appendChild(select);

    output_table = document.createElement("TABLE");
    tr_of_output_table = document.createElement("TR");

    arrows_holder_for_output_table =  document.createElement("TD");
    output_attributes_holder = document.createElement("TD");
    output_attrbutes_listbox = document.createElement("SELECT");
    up_down_holder_for_up_buttons = document.createElement("TD");

    output_attrbutes_listbox.multiple=true;
    output_attrbutes_listbox.size=4;
    output_attrbutes_listbox.style.width="250px";

    right_button_output_attributes = document.createElement("BUTTON");
    right_button_output_attributes.innerHTML = "&#8594";
    right_button_output_attributes.id = "OutputAttributesButton";
    right_button_output_attributes.onclick = function(){arrowonclickfunctions(this);}
    
    //output_table.appendChild(output_heading_row);
    output_table.appendChild(tr_of_output_table);
    tr_of_output_table.appendChild(arrows_holder_for_output_table);
    tr_of_output_table.appendChild(output_attributes_holder);
    tr_of_output_table.appendChild(up_down_holder_for_up_buttons);
    arrows_holder_for_output_table.appendChild(right_button_output_attributes);
    arrows_holder_for_output_table.appendChild(document.createElement("BR"));
    
    output_attributes_holder.appendChild(output_attrbutes_listbox);

    up_output_attr_button = document.createElement("BUTTON");//this one
    up_output_attr_button.innerHTML = "&#8593";
    //up_down_holder_for_up_buttons.appendChild(document.createElement("BR"));
    up_down_holder_for_up_buttons.appendChild(up_output_attr_button);
    up_output_attr_button.onclick = function(){opattrmoveupdown(output_attrbutes_listbox,"UP");}

    down_output_attr_button = document.createElement("BUTTON");//this one
    down_output_attr_button.innerHTML = "&#8595";
    up_down_holder_for_up_buttons.appendChild(document.createElement("BR"));
    up_down_holder_for_up_buttons.appendChild(down_output_attr_button);
    down_output_attr_button.onclick = function(){opattrmoveupdown(output_attrbutes_listbox,"DOWN");}

    deleteattributes = document.createElement("BUTTON");//this one
    deleteattributes.innerHTML = "DELETE";
    up_down_holder_for_up_buttons.appendChild(document.createElement("BR"));
    up_down_holder_for_up_buttons.appendChild(deleteattributes);
    deleteattributes.onclick = function(){output_attrbutes_listbox.remove(output_attrbutes_listbox.selectedIndex)} //add remove here

    tr.appendChild(output_table);

    orderby_table = document.createElement("TABLE");
    tr_of_orderby_table = document.createElement("TR");
    arrows_holder_for_orderby_table =  document.createElement("TD");
    ascdesc_holder_for_orderby_table =  document.createElement("TD");
    orderby_holder = document.createElement("TD");
    orderby_listbox = document.createElement("SELECT");

    orderby_heading_row = document.createElement("TR");
    orderby_heading_data = document.createElement("TD");
    orderby_heading_data.style.textAlign = "center";
    orderby_heading_data.innerHTML = "ORDER BY";
    blank_td1 = document.createElement("TD");
    blank_td1.innerHTML = "";
    orderby_heading_row.appendChild(blank_td1);
    orderby_heading_row.appendChild(orderby_heading_data);

    orderby_listbox.multiple=true;
    orderby_listbox.size=4;
    orderby_listbox.style.width="250px";

    right_button_orderby = document.createElement("BUTTON");
    right_button_orderby.innerHTML = "&#8594";
    right_button_orderby.id = "OrderByRightButton";
    right_button_orderby.onclick = function(){arrowonclickfunctions(this);}

    ascdesc_button = document.createElement("BUTTON");
    ascdesc_button.innerHTML = "ASC/DESC";
    ascdesc_holder_for_orderby_table.appendChild(ascdesc_button);
    ascdesc_button.onclick = function(){orderbymanipulation(this);}

    up_orderby_button = document.createElement("BUTTON");
    up_orderby_button.innerHTML = "&#8593";
    ascdesc_holder_for_orderby_table.appendChild(document.createElement("BR"));
    ascdesc_holder_for_orderby_table.appendChild(up_orderby_button);
    up_orderby_button.onclick = function(){orderbymoveupdown(orderby_listbox,"UP");}

    down_orderby_button = document.createElement("BUTTON");
    down_orderby_button.innerHTML = "&#8595";
    ascdesc_holder_for_orderby_table.appendChild(document.createElement("BR"));
    ascdesc_holder_for_orderby_table.appendChild(down_orderby_button);
    down_orderby_button.onclick = function(){orderbymoveupdown(orderby_listbox,"DOWN");}

    deleteorderby = document.createElement("BUTTON");
    deleteorderby.innerHTML = "DELETE";
    ascdesc_holder_for_orderby_table.appendChild(document.createElement("BR"));
    ascdesc_holder_for_orderby_table.appendChild(deleteorderby);
    deleteorderby.onclick = function(){orderby_listbox.remove(orderby_listbox.selectedIndex)} //add here
    

    orderby_table.appendChild(orderby_heading_row);
    orderby_table.appendChild(tr_of_orderby_table);
    tr_of_orderby_table.appendChild(arrows_holder_for_orderby_table);
    tr_of_orderby_table.appendChild(orderby_holder);
    tr_of_orderby_table.appendChild(ascdesc_holder_for_orderby_table);
    arrows_holder_for_orderby_table.appendChild(right_button_orderby);
    arrows_holder_for_orderby_table.appendChild(document.createElement("BR"));
    
    orderby_holder.appendChild(orderby_listbox);

    tr.appendChild(orderby_table);

    //From HERE

    constraint_table = document.createElement("TABLE");
    tr_of_constraint_table = document.createElement("TR");
    arrows_holder_for_constraint_table =  document.createElement("TD");
    constraint_holder = document.createElement("TD");
    constraint_listbox = document.createElement("SELECT");

    constraint_heading_row = document.createElement("TR");
    constraint_heading_data = document.createElement("TD");
    constraint_heading_data.innerHTML = "CONSTRAINTS";
    constraint_heading_data.style.textAlign = "center";
    blank_td2 = document.createElement("TD");
    blank_td2.innerHTML = "";

    deletebuttonforconstraintholder = document.createElement("TD");
    deleteconstraintbut = document.createElement("BUTTON");
    deleteconstraintbut.innerHTML = "DELETE";
    deletebuttonforconstraintholder.appendChild(deleteconstraintbut);

    constraint_heading_row.appendChild(blank_td2);
    constraint_heading_row.appendChild(constraint_heading_data);

    constraint_listbox.multiple=true;
    constraint_listbox.size=4;
    constraint_listbox.style.width="250px";

    right_button_constraint = document.createElement("BUTTON");
    right_button_constraint.innerHTML = "&#8594";
    right_button_constraint.id = "OutputAttributesButton";
    right_button_constraint.onclick = function(){dealwiththeconstraint(this);}

    deletebuttonforconstraintholder.onclick=function(){constraint_listbox.remove(constraint_listbox.selectedIndex)}//here

    constraint_table.appendChild(constraint_heading_row);
    constraint_table.appendChild(tr_of_constraint_table);
    tr_of_constraint_table.appendChild(arrows_holder_for_constraint_table);
    tr_of_constraint_table.appendChild(constraint_holder);
    tr_of_constraint_table.appendChild(deletebuttonforconstraintholder);////////////////////////////////////////
    arrows_holder_for_constraint_table.appendChild(right_button_constraint);
    arrows_holder_for_constraint_table.appendChild(document.createElement("BR"));
    
    constraint_holder.appendChild(constraint_listbox);

    tr.appendChild(constraint_table);



//------------------------------------------------------------------------------------------------------------
    getSQLButton = document.createElement("BUTTON");
    getSQLButton.innerHTML = "GET SQL";

    document.body.appendChild(document.createElement("BR"));
    document.body.appendChild(document.createElement("BR"));
    document.body.appendChild(getSQLButton);

    getSQLButton.onclick = function(){getQueryStatement()};

    getDataButton = document.createElement("BUTTON");
    getDataButton.innerHTML = "SUBMIT";

    
    document.body.appendChild(getDataButton);

    getDataButton.onclick = function(){getOutputData()};

    dynamic = document.createElement("DIV"); //----------------------------------
    //document.body.appendChild(dynamic);


    calltophp();
}

function calltophp(){

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    //console.log(xmlhttp);
    var jsonstring=xmlhttp.responseText;
    //alert(jsonstring);
    var jsonobject = eval("("+jsonstring+")");
    
    //document.getElementById("txtHint").innerHTML = jsonobject.name;
    
    
    for(var key in jsonobject){
      //console.log(jsonobject[key]);

      var tablebutton = document.createElement("A");
      var t=document.createTextNode(jsonobject[key]);
      tablebutton.appendChild(t);
      tablebutton.id = key;
      td.appendChild(tablebutton);
      //console.log(key);
      //add onclick function here for each button here
      var individual_table_button = document.getElementById(key);
      //console.log(individual_table_button);
      individual_table_button.onclick = function(){getattributes(this.id)};
      
      td.appendChild(document.createElement("BR"));
    }
   }
  }
xmlhttp.open("GET","datafetch.php?",true);
xmlhttp.send();


}

function getattributes(tablename){
  //window.alert(tablename+"xxxxx");
  //console.log(xmlhttp);
  //console.log(tablename);
  if(td_attribute.hasChildNodes()){
       while (td_attribute.firstChild) {
            td_attribute.removeChild(td_attribute.firstChild);
        }
       //console.log("Clear the child nodes");
     }

  if(select.hasChildNodes()){
       while (select.firstChild) {
            select.removeChild(select.firstChild);
        }
       //console.log("Clear the child nodes");
     }
     td_attribute.appendChild(select);
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
    //console.log(xmlhttp);
  xmlhttp=new XMLHttpRequest();
  
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  //console.log(xmlhttp);
 xmlhttp.onreadystatechange=function()
   {
    
    
     
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    
    var jsonstring=xmlhttp.responseText;
    //debugger;
    //window.alert(jsonstring);
    var jsonobject = eval("("+jsonstring+")");

    // select = document.createElement("SELECT");
    // select.multiple=true;
    //td_attribute.appendChild(select);

    for(var key in jsonobject){
      if (jsonobject.hasOwnProperty(key)) {
        var option = document.createElement("OPTION");
        option.id = jsonobject[key][0];
        option.innerHTML = jsonobject[key][1]
        select.appendChild(option);
      //console.log(key + " -> " + jsonobject[key][1]);
    }
    }

    
    }
  }
xmlhttp.open("GET","tableattributefetch.php?attributestobefetchedfrom="+tablename,true);
xmlhttp.send();

}

function arrowonclickfunctions(button){
  if(button.id == "OutputAttributesButton"){
  //alert(button.id);
      var numberOfelectedOptionForOutputAttributes = select.selectedIndex;
      var selectedOptionForOutputAttributes = select.options;
      if(selectedOptionForOutputAttributes[numberOfelectedOptionForOutputAttributes] != null){
        //alert(selectedOptionForOutputAttributes[numberOfelectedOptionForOutputAttributes].id);
        var option_inOutputAttributeListbox = document.createElement("OPTION");
        option_inOutputAttributeListbox.id = selectedOptionForOutputAttributes[numberOfelectedOptionForOutputAttributes].id;
        option_inOutputAttributeListbox.innerHTML = selectedOptionForOutputAttributes[numberOfelectedOptionForOutputAttributes].innerHTML;
        output_attrbutes_listbox.appendChild(option_inOutputAttributeListbox);
      }
      else
        alert("You haven't selected any attributes");
}

  if(button.id == "OrderByRightButton"){
  //alert(button.id);
      var numberOfelectedOptionForOrderBy = select.selectedIndex;
      var selectedOptionForOrderBy = select.options;
      if(selectedOptionForOrderBy[numberOfelectedOptionForOrderBy] != null){
        //alert(selectedOptionForOrderBy[numberOfelectedOptionForOrderBy].id);
        var option_inOrderByListbox = document.createElement("OPTION");
        
        option_inOrderByListbox.id = selectedOptionForOrderBy[numberOfelectedOptionForOrderBy].id;
        
        option_inOrderByListbox.innerHTML = selectedOptionForOrderBy[numberOfelectedOptionForOrderBy].innerHTML + "     ASC";
        option_inOrderByListbox.ordering = "ASC";//--------------------------------------------------------------------------------------------
        //option_inOrderByListbox.style.backgroundColor = "lightgreen";
        orderby_listbox.appendChild(option_inOrderByListbox);


      }
      else
        alert("You haven't selected any attributes");
}


  
}

function dealwiththeconstraint(button){
        dialogbox = document.createElement("DIV");
        dialogbox.id = "box";
        dialogbox.style.width = "500px";
        dialogbox.style.padding = "10px";
        dialogbox.style.margin = "auto";
        dialogbox.style.backgroundColor = "white";
        dialogbox.style.border = "3px solid black";
        dialogbox.style.fontSize = "15px";
        dialogbox.style.backgroundImage = "url(background.jpg)";
        dialogbox.style.color = "white";

        //selectedthing = document.getElementById("selectedthing");
        x = select.selectedIndex;
        y = select.options;

        //console.log(y[x].id);

        inbold = document.createElement("B");
        inbold.innerHTML = y[x].innerHTML;
        inbold.id = y[x].id;

        textbox = document.createElement("INPUT");
        textbox.type = "text";

        selectindialog = document.createElement("SELECT");

        var greaterthan = document.createElement("OPTION");
        var lessthan = document.createElement("OPTION");
        var greaterthanequalsto = document.createElement("OPTION");
        var lessthanequalsto = document.createElement("OPTION");
        var equalsto = document.createElement("OPTION");
        var notequalsto = document.createElement("OPTION");
        var islike = document.createElement("OPTION");
        var isnotlike = document.createElement("OPTION");

        acceptbutton = document.createElement("BUTTON");
        acceptbutton.innerHTML = "ACCEPT";
        acceptbutton.onclick = function(){accept()}

        rejectbutton = document.createElement("BUTTON");
        rejectbutton.innerHTML = "REJECT";
        rejectbutton.onclick = function(){reject()}

        greaterthan.innerHTML = ">";
        lessthan.innerHTML = "<";
        greaterthanequalsto.innerHTML = ">=";
        lessthanequalsto.innerHTML = "<=";
        equalsto.innerHTML = "=";
        notequalsto.innerHTML = "!=";
        islike.innerHTML = "LIKE";
        isnotlike.innerHTML = "NOT LIKE";

        selectindialog.appendChild(greaterthan);
        selectindialog.appendChild(greaterthanequalsto);
        selectindialog.appendChild(lessthan);
        selectindialog.appendChild(lessthanequalsto);
        selectindialog.appendChild(equalsto);
        selectindialog.appendChild(notequalsto);
        selectindialog.appendChild(islike);
        selectindialog.appendChild(isnotlike);

        dialogbox.appendChild(inbold);
        dialogbox.appendChild(selectindialog);
        dialogbox.appendChild(textbox);
        dialogbox.appendChild(document.createElement("BR"));
        dialogbox.appendChild(acceptbutton);
        dialogbox.appendChild(rejectbutton);

        // dynamic.style.width="100%";
        // dynamic.style.height = "100%";
        // dynamic.style.backgroundColor="white";
        // dynamic.style.opacity="0.5";

        document.body.appendChild(dynamic);

        dynamic.appendChild(dialogbox);

}

function accept(){

      var constraintoption = document.createElement("OPTION");
      var selectedoptions = selectindialog.options;
      var tempstring = inbold.innerHTML + " " + selectedoptions[selectindialog.selectedIndex].innerHTML + " " + textbox.value;
      if(isNaN(textbox.value))
        var idofconstraintoption = inbold.id + " " + selectedoptions[selectindialog.selectedIndex].innerHTML + " " + "'"+textbox.value+"'";
      else
        var idofconstraintoption = inbold.id + " " + selectedoptions[selectindialog.selectedIndex].innerHTML + " " + textbox.value;
      constraintoption.id = idofconstraintoption;
      //var splittedstring = tempstring.split(".");
      //constraintoption.innerHTML = splittedstring[1];
      constraintoption.innerHTML=tempstring;

      dynamic.innerHTML = "";

      constraint_listbox.appendChild(constraintoption);
}

function reject(){

      dynamic.innerHTML = "";

}

function orderbymanipulation(ascdescbut){

  var optionsoforderbylistbox = orderby_listbox.options;

  if(optionsoforderbylistbox[orderby_listbox.selectedIndex].ordering == "ASC"){
    optionsoforderbylistbox[orderby_listbox.selectedIndex].ordering = "DESC";
    var tempstring;
    tempstring = optionsoforderbylistbox[orderby_listbox.selectedIndex].innerHTML;
    tempstring = tempstring.substring(0,tempstring.length-3);
    optionsoforderbylistbox[orderby_listbox.selectedIndex].innerHTML = tempstring + "DESC"; 
    //console.log("Converted from ASC to DSC" + optionsoforderbylistbox[orderby_listbox.selectedIndex].ordering);
  }
  else{//else if ordering = "DESC"
    optionsoforderbylistbox[orderby_listbox.selectedIndex].ordering = "ASC";

    var tempstring;
    tempstring = optionsoforderbylistbox[orderby_listbox.selectedIndex].innerHTML;
    tempstring = tempstring.substring(0,tempstring.length-4);
    optionsoforderbylistbox[orderby_listbox.selectedIndex].innerHTML = tempstring + "ASC"; 
    //console.log("Converted from DSC to ASC" + optionsoforderbylistbox[orderby_listbox.selectedIndex].ordering);
  }

  //optionsoforderbylistbox[orderby_listbox.selectedIndex].innerHTML = optionsoforderbylistbox[orderby_listbox.selectedIndex].innerHTML + "    bhulla"; 
  //alert(orderby_listbox.selectedIndex);
  //alert(optionsoforderbylistbox[orderby_listbox.selectedIndex].ordering);

}

function orderbymoveupdown(listbox,direction){
  //var listbox = document.getElementById(listID);
    var selIndex = listbox.selectedIndex;
 
    if(-1 == selIndex) {
        alert("Please select an option to move.");
        return;
    }
 
    var increment = -1;
    if(direction == "UP")
        increment = -1;
    else
        increment = 1;
 
    if((selIndex + increment) < 0 ||
        (selIndex + increment) > (listbox.options.length-1)) {
        return;
    }
 
    var selValue = listbox.options[selIndex].id;
    var selText = listbox.options[selIndex].innerHTML;
    var selOrdering = listbox.options[selIndex].ordering;
    listbox.options[selIndex].id = listbox.options[selIndex + increment].id;
    listbox.options[selIndex].innerHTML = listbox.options[selIndex + increment].innerHTML;
    listbox.options[selIndex].ordering = listbox.options[selIndex + increment].ordering;
 
    listbox.options[selIndex + increment].id = selValue;
    listbox.options[selIndex + increment].innerHTML = selText;
    listbox.options[selIndex + increment].ordering = selOrdering;
 
    listbox.selectedIndex = selIndex + increment;

}

function opattrmoveupdown(listbox,direction){
  //var listbox = document.getElementById(listID);
    var selIndex = listbox.selectedIndex;
 
    if(-1 == selIndex) {
        alert("Please select an option to move.");
        return;
    }
 
    var increment = -1;
    if(direction == "UP")
        increment = -1;
    else
        increment = 1;
 
    if((selIndex + increment) < 0 ||
        (selIndex + increment) > (listbox.options.length-1)) {
        return;
    }
 
    var selValue = listbox.options[selIndex].id;
    var selText = listbox.options[selIndex].innerHTML;
    listbox.options[selIndex].id = listbox.options[selIndex + increment].id;
    listbox.options[selIndex].innerHTML = listbox.options[selIndex + increment].innerHTML;
 
    listbox.options[selIndex + increment].id = selValue;
    listbox.options[selIndex + increment].innerHTML = selText;
 
    listbox.selectedIndex = selIndex + increment;
  
}

function getQueryStatement(){
  var jsonObjectStringOfTables = "";
  var allattributes="";
  var stringtobesplit;
  var splittedstring;
  var involvedTables = "FROM ";
  selectstatement = "SELECT distinct ";
  var setObject = new Object(); 
  var tablesObject = new Object();
  var x = output_attrbutes_listbox;
  var stringofconstraints = "";
  var p = constraint_listbox;

  var fromclause = "FROM ";
  var orderbystring= "";
  var orderbyoptions;

  orderbyoptions = orderby_listbox.options;

  if(orderbyoptions.length>0){
      orderbystring = "ORDER BY ";
      for(var n=0;n<orderbyoptions.length;n++){
        orderbystring = orderbystring + orderbyoptions[n].id +" "+ orderbyoptions[n].ordering +", ";
      }

  orderbystring = orderbystring.substring(0,orderbystring.length-2);

}

  console.log("Here is the order by string");
  console.log(orderbystring);

  for (var j = 0; j<p.length;j++){
    stringofconstraints = stringofconstraints + p.options[j].id + " and ";

  }

    stringofconstraints=stringofconstraints.substring(0,stringofconstraints.length-4);
    stringofconstraints=stringofconstraints.replace(/&gt;/gi,">");
    stringofconstraints=stringofconstraints.replace(/&lt;/gi,"<");
    //console.log(stringofconstraints);
  //alert(stringofconstraints);

  for (var i=0; i<x.length; i++)
  {
  //console.log(x.options[i].id);
  selectstatement = selectstatement + x.options[i].id +","; 
  stringtobesplit = x.options[i].id;
  splittedstring = stringtobesplit.split(".");
  setObject[splittedstring[0]] = "True";
  //console.log(splittedstring[0]);
  }

  var optionsinconstraints = constraint_listbox.options;

  for(var k=0;k<optionsinconstraints.length;k++){
      var idofconstraintoptions = optionsinconstraints[k].id;
      var splitids = idofconstraintoptions.split(".");
      setObject[splitids[0]]="True";
  }

  var optionsinorderby = orderby_listbox.options;

  for(var k=0;k<optionsinorderby.length;k++){
      var idoforderbyoptions = optionsinorderby[k].id;
      var splitids = idoforderbyoptions.split(".");
      setObject[splitids[0]]="True";
  }

  selectstatement = selectstatement.substring(0,selectstatement.length-1);
  //selectstatement = selectstatement + " FROM ";
  //console.log(setObject);
  
  for(var i in setObject){
    //involvedTables = involvedTables + i + ", ";
    jsonObjectStringOfTables = jsonObjectStringOfTables + i + "|";
    
  }
    jsonObjectStringOfTables = jsonObjectStringOfTables.substring(0,jsonObjectStringOfTables.length-1);
   

  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
    //console.log(xmlhttp);
  xmlhttp=new XMLHttpRequest();
  
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  //console.log(xmlhttp);
 xmlhttp.onreadystatechange=function()
   {
    
    
     
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

    var strret = xmlhttp.responseText;
    //alert(strret);
    var strretexploded = strret.split("|");
    //alert(strretexploded.length);
    var stringofcombinedintertableconnection=strretexploded[0];
    //console.log("string of combined intertable connection" + stringofcombinedintertableconnection);
    //console.log("string of constraints " + stringofconstraints);
    for(var j=1;j<strretexploded.length;j++){
      setObject[strretexploded[j]]="True";
    }


      console.log(setObject);

      for(var m in setObject){
        fromclause = fromclause + m + ",";
        }

    fromclause = fromclause.substring(0,fromclause.length-1);

    //console.log(fromclause);

    //selectstatement = selectstatement + " " + stringofcombinedintertableconnection;
    //console.log("Its here!!");
    console.log("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
    //console.log(selectstatement); 
    //console.log(stringofcombinedintertableconnection);
    //console.log(stringofconstraints);

    selectstatement = selectstatement + " " + fromclause;
    //console.log(selectstatement);
    var ultimatewhereclause="";
    if(stringofconstraints.length > 0 && stringofcombinedintertableconnection.length > 0){
        ultimatewhereclause = "WHERE " + stringofcombinedintertableconnection + " and " + stringofconstraints;
    }
    else if(stringofconstraints.length > 0 && stringofcombinedintertableconnection.length <= 0){
      ultimatewhereclause = "WHERE " + stringofconstraints;
    }
    else if(stringofconstraints.length <= 0 && stringofcombinedintertableconnection.length > 0){
      ultimatewhereclause = "WHERE " + stringofcombinedintertableconnection;
    }
    else{}

    selectstatement = selectstatement + " " + ultimatewhereclause + " " + orderbystring;

    console.log(selectstatement);

    alert(selectstatement);

    //var optionsinconstraints = constraint_listbox.options;

    //alert(optionsinconstraints.length); 


    
    }
  }
xmlhttp.open("GET","FetchTableConnections.php?jsonfortables="+jsonObjectStringOfTables,true);
xmlhttp.send();
}


function getOutputData(){
  var jsonObjectStringOfTables = "";
  var allattributes="";
  var stringtobesplit;
  var splittedstring;
  var involvedTables = "FROM ";
  selectstatement = "SELECT distinct ";
  var setObject = new Object(); 
  var tablesObject = new Object();
  var x = output_attrbutes_listbox;
  var stringofconstraints = "";
  var p = constraint_listbox;

  var fromclause = "FROM ";
  var orderbystring= "";
  var orderbyoptions;

  orderbyoptions = orderby_listbox.options;

  if(orderbyoptions.length>0){
      orderbystring = "ORDER BY ";
      for(var n=0;n<orderbyoptions.length;n++){
        orderbystring = orderbystring + orderbyoptions[n].id +" "+ orderbyoptions[n].ordering +", ";
      }

  orderbystring = orderbystring.substring(0,orderbystring.length-2);

}

  console.log("Here is the order by string");
  console.log(orderbystring);

  for (var j = 0; j<p.length;j++){
    stringofconstraints = stringofconstraints + p.options[j].id + " and ";

  }

    stringofconstraints=stringofconstraints.substring(0,stringofconstraints.length-4);
    stringofconstraints=stringofconstraints.replace(/&gt;/gi,">");
    stringofconstraints=stringofconstraints.replace(/&lt;/gi,"<");
    //console.log(stringofconstraints);
  //alert(stringofconstraints);

  for (var i=0; i<x.length; i++)
  {
  //console.log(x.options[i].id);
  selectstatement = selectstatement + x.options[i].id +","; 
  stringtobesplit = x.options[i].id;
  splittedstring = stringtobesplit.split(".");
  setObject[splittedstring[0]] = "True";
  //console.log(splittedstring[0]);
  }

  var optionsinconstraints = constraint_listbox.options;

  for(var k=0;k<optionsinconstraints.length;k++){
      var idofconstraintoptions = optionsinconstraints[k].id;
      var splitids = idofconstraintoptions.split(".");
      setObject[splitids[0]]="True";
  }

  var optionsinorderby = orderby_listbox.options;

  for(var k=0;k<optionsinorderby.length;k++){
      var idoforderbyoptions = optionsinorderby[k].id;
      var splitids = idoforderbyoptions.split(".");
      setObject[splitids[0]]="True";
  }

  selectstatement = selectstatement.substring(0,selectstatement.length-1);
  //selectstatement = selectstatement + " FROM ";
  //console.log(setObject);
  
  for(var i in setObject){
    //involvedTables = involvedTables + i + ", ";
    jsonObjectStringOfTables = jsonObjectStringOfTables + i + "|";
    
  }
    jsonObjectStringOfTables = jsonObjectStringOfTables.substring(0,jsonObjectStringOfTables.length-1);
   

  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
    //console.log(xmlhttp);
  xmlhttp=new XMLHttpRequest();
  
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  //console.log(xmlhttp);
 xmlhttp.onreadystatechange=function()
   {
    
    
     
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

    var strret = xmlhttp.responseText;
    //alert(strret);
    var strretexploded = strret.split("|");
    //alert(strretexploded.length);
    var stringofcombinedintertableconnection=strretexploded[0];
    //console.log("string of combined intertable connection" + stringofcombinedintertableconnection);
    //console.log("string of constraints " + stringofconstraints);
    for(var j=1;j<strretexploded.length;j++){
      setObject[strretexploded[j]]="True";
    }


      console.log(setObject);

      for(var m in setObject){
        fromclause = fromclause + m + ",";
        }

    fromclause = fromclause.substring(0,fromclause.length-1);

    //console.log(fromclause);

    //selectstatement = selectstatement + " " + stringofcombinedintertableconnection;
    //console.log("Its here!!");
    console.log("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
    //console.log(selectstatement); 
    //console.log(stringofcombinedintertableconnection);
    //console.log(stringofconstraints);

    selectstatement = selectstatement + " " + fromclause;
    //console.log(selectstatement);
    var ultimatewhereclause="";
    if(stringofconstraints.length > 0 && stringofcombinedintertableconnection.length > 0){
        ultimatewhereclause = "WHERE " + stringofcombinedintertableconnection + " and " + stringofconstraints;
    }
    else if(stringofconstraints.length > 0 && stringofcombinedintertableconnection.length <= 0){
      ultimatewhereclause = "WHERE " + stringofconstraints;
    }
    else if(stringofconstraints.length <= 0 && stringofcombinedintertableconnection.length > 0){
      ultimatewhereclause = "WHERE " + stringofcombinedintertableconnection;
    }
    else{}

    selectstatement = selectstatement + " " + ultimatewhereclause + " " + orderbystring;

    console.log(selectstatement);
    printdata(selectstatement);
    //var optionsinconstraints = constraint_listbox.options;

    //alert(optionsinconstraints.length); 


    
    }
  }
xmlhttp.open("GET","FetchTableConnections.php?jsonfortables="+jsonObjectStringOfTables,true);
xmlhttp.send();
}

function printdata(selectstatement) {
    $.get("printtabulardata.php?querystatement="+selectstatement, function(data){var datawindow=window.open("#/data","_self"); 
                                                                                 datawindow.document.write(data);});
    return true;
}




</script>
</head>
<body onLoad="initialize()">
	<?php ?>
</body>
</html>






    
