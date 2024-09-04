const URL = "makalio.json";
const btn = document.querySelector("#btn");

btn.addEventListener("click", (e) => {
    const data = [
        {
          "book-name" : "weyhyut" 
        }
    ]
  fetch(URL)
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
    //   console.log(typeof(data));
    })
    .catch((error) => console.error(error));
});
