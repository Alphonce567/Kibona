// get bok name by id
console.log("working");
const book = document.getElementById("book-name").value;
const book_1 = document.getElementById("book-1");
const submit = document.getElementById("submit");
const error = document.getElementById("error");

submit.addEventListener("click", (e) => {
  e.preventDefault(); // prevent browser default styles

//   validate
  if (book === "") {
    error.innerHTML = "enter a valid book name";
  }
  else{
    book_1.innerHTML = book;
  }
//   form.resetForm();
});
