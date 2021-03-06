require('./bootstrap');


/*
 *********************
 *  Drop Down menu   *
 *********************
*/

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
window.myFunction = function() {
    document.getElementById("dropdown-menu-profile").classList.toggle("hidden");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.dropbtn-menu-profile')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('hidden')) {
                openDropdown.classList.remove('hidden');
            }
        }
    }
}

/*
 **************************************************
 * Dynamically input fields                       *
 **************************************************
*/

var i = 0; // Education counter 
var j = 0; // interet counter
var k = 0; // skills counter
var x = 0; // language counter


// dynamically add education level

$("#add-education").click(function () {

    ++i;

    $("#list-education").append(
        `<li>
              <label class="block mt-4">
                  <span class="text-gray-700">L'année</span>
                  <select class="form-select my-4 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600" name="addmore[${i}][year]">
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2001">2002</option>
                    <option value="2002">2003</option>
                    <option value="2004">2004</option>
                    <option value="2004">2005</option>
                    <option value="2005">2006</option>
                    <option value="2005">2007</option>
                    <option value="2005">2008</option>
                    <option value="2005">2009</option>
                    <option value="2005">2010</option>
                    <option value="2005">2011</option>
                    <option value="2005">2012</option>
                    <option value="2005">2013</option>
                    <option value="2005">2014</option>
                    <option value="2005">2015</option>
                    <option value="2005">2016</option>
                    <option value="2005">2017</option>
                    <option value="2005">2018</option>
                    <option value="2005">2019</option>
                    <option value="2005">2020</option>
                    <option value="2005">2021</option>
                  </select>
              </label>
              <label class="block mt-4">
                  <span class="text-gray-700">Niveau</span>
                  <input type="text" name="addmore[${i}][level]" class="form-input my-4 block w-full border-2 border-gray-300 rounded focus:outline-indigo-600" placeholder="Exemple Mastére en génie logiciél">
              </label>
          </li>`

    );
});



// dynamically add interet

$("#add-interet").click(function () {

    ++j;

    $("#list-interet").append(
        `<li>
                <label class="block">
                    <input name="interet[${j}]" class="form-input block w-full border-2 border-gray-300 my-4 rounded focus:outline-indigo-600" placeholder="Intéret">
                </label>
            </li>`
    );
});

// dynamically add compétences

$("#add-competence").click(function () {

    ++k;

    $("#list-competence").append(
        ` <li>
                <label class="block">
                    <input name="skills[${k}]" class="form-input block w-full border-2 border-gray-300 my-4 rounded focus:outline-indigo-600" placeholder="compétence">
                </label>
            </li>`
    );
});

// dynamically add languages

$("#add-language").click(function () {

    ++x;

    $("#list-language").append(
        ` <li>
                <label class="block">
                    <input name="language[${x}]" class="form-input block w-full border-2 border-gray-300 my-4 rounded focus:outline-indigo-600" placeholder="Langue">
                </label>
            </li>`
    );
});

  // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("btn-modal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

/** Map Modal */
  // Get the modal
var mapModal = document.getElementById("mapModel");

// Get the button that opens the modal
var mapBtn = document.getElementById("location-button");

// Get the <span> element that closes the modal
var mapSpan = document.getElementsByClassName("mapclose")[0];

// When the user clicks on the button, open the modal
mapBtn.onclick = function() {
    mapModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
mapSpan.onclick = function() {
    mapModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    mapModal.style.display = "none";
  }
}
