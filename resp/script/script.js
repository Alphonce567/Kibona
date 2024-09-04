// handling forms

/*
----------------------------------------------
      DON'T TRUST USER INPUT
----------------------------------------------
 */
// get form node
const form = document.forms;
console.log(form[0]);

/*
- get the node of the element.
- get value of the input element compare with the value entered by the user.
- inform the user

 */

// get elements
const name = document.getElementById("name")
const last_name = document.getElementById("lastname")
const errr = document.getElementById("error")

function validateInput(){
      if (name.value == "" || last_name.value == "") {
            document.createElement("p")
      }
}