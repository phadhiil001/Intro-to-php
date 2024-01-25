/******w************
    
	Assignment 2 Javascript
	Name: Allan Palacios
	Date: 2024-01-18
	Description: Javascript from Project 3 to assignment 2

*******************/

const itemDescription = ["MacBook", "The Razer", "WD My Passport", "Nexus 7", "DD-45 Drums"];
const itemPrice = [1899.99, 79.99, 179.99, 249.99, 119.99];
const itemImage = ["mac.png", "mouse.png", "wdehd.png", "nexus.png", "drums.png"];
let numberOfItemsInCart = 0;
let orderTotal = 0;

/*
 * Handles the submit event of the survey form
 *
 * param e  A reference to the event object
 * return   True if no validation errors; False if the form has
 *          validation errors
 */
function validate(e) {

	 // Hides all error elements on the page
	 hideErrors();

	 // Determine if the form has errors
	 if (formHasErrors()) {
		 // Prevents the form from submitting
		 e.preventDefault();
 
		 // When using onSubmit="validate()" in markup, returning false would prevent
		 // the form from submitting
		 return false;
	 }
 
	 // When using onSubmit="validate()" in markup, returning true would allow
	 // the form to submit
	 return true;

}

/*
 * Handles the reset event for the form.
 *
 * param e  A reference to the event object
 * return   True allows the reset to happen; False prevents
 *          the browser from resetting the form.
 */
function resetForm(e) {
	// Confirm that the user wants to reset the form.
	if (confirm('Clear order?')) {
		// Ensure all error fields are hidden
		hideErrors();

		// Set focus to the first text field on the page
		document.getElementById("qty1").focus();

		// When using onReset="resetForm()" in markup, returning true will allow
		// the form to reset
		return true;
	}

	// Prevents the form from resetting
	e.preventDefault();

	// When using onReset="resetForm()" in markup, returning false would prevent
	// the form from resetting
	return false;
}

/*
 * Does all the error checking for the form.
 *
 * return   True if an error was found; False if no errors were found
 */
function formHasErrors() {

	// Initialize errorFlag
    let errorFlag = false;

    // Determine if any items are in the cart
    // When the cart has no items, submission of the form is halted
    if (numberOfItemsInCart == 0) {
        // Display an error message contained in a modal dialog element
        const modal = document.querySelector("#cartError");
        modal.showModal();

        const closeModal = document.querySelector(".close-button");

        closeModal.addEventListener("click", () => {
            modal.close();
            // Set focus to the first quantity field
            document.getElementById("qty1").focus();
        });
        errorFlag = true;
    }

   // Validate shipping fields
    let shippingName = document.getElementById("fullname");
    let shippingAddress = document.getElementById("address");
    let shippingCity = document.getElementById("city");
    let shippingPostal = document.getElementById("postal");
    let shippingEmail = document.getElementById("email");


   // Check each shipping field
    if (shippingName.value == "") {
        // Validation issue

        // Give an error message
        let shippingNameError = document.getElementById("fullname_error");
        shippingNameError.style.display = "block";
     

        if(!errorFlag){
            shippingName.focus();
            shippingName.select();
            }

        errorFlag = true;
    }

    if (shippingAddress.value == "") {
        // Validation issue

        // Give an error message
        let shippingAddressError = document.getElementById("address_error");
        shippingAddressError.style.display = "block";
        
        if(!errorFlag){
            shippingAddress.focus();
            shippingAddress.select();
            }

        errorFlag = true;
    }

    if (shippingCity.value == "") {
        // Validation issue

        // Give an error message
        let shippingCityError = document.getElementById("city_error");
        shippingCityError.style.display = "block";
       

        if(!errorFlag){
            shippingCity.focus();
            shippingCity.select();
            }

        errorFlag = true;
    }   


    // Regular expression for a valid postal code (Assuming Canadian postal code format)
    let postalCodeRegex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;

    if (shippingPostal.value == "") {
        // Validation issue

        // Give an error message
        let shippingPostalError = document.getElementById("postal_error");
        shippingPostalError .style.display = "block";

        if(!errorFlag){
        shippingPostal.focus();
        shippingPostal.select();

            }
    
        errorFlag = true;

    } else if (!postalCodeRegex.test(shippingPostal.value)) {
        // Validation issue

        // Give an error message
        let shippingPostalError = document.getElementById("postalformat_error");
        shippingPostalError .style.display = "block";
        if(!errorFlag){
        shippingPostal.focus();
        shippingPostal.select();
        }
    
        errorFlag = true;
    }

    // Regular expression for a valid email address
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (shippingEmail.value == "") {
        // Validation issue

        // Give an error message
        let shippingEmailError = document.getElementById("email_error");
        shippingEmailError .style.display = "block";

         if(!errorFlag){
        shippingEmail.focus();
        shippingEmail.select();
        }
        errorFlag = true;

    } else if (!emailRegex.test(shippingEmail.value)) {
        // Validation issue

        // Give an error message
        let shippingEmailError = document.getElementById("emailformat_error");
        shippingEmailError .style.display = "block";
         if(!errorFlag){
        shippingEmail.focus();
        shippingEmail.select();
        }
        errorFlag = true;
    }

    // Validate payment fields
    let cardTypes = ["visa", "amex", "mastercard"];
    let cardTypesChecked = false;

    for (let i=0; i<cardTypes.length; i++)
    {
        if(!cardTypesChecked && document.getElementById(cardTypes[i]).checked)
        {
            cardTypesChecked = true;
        }
    }

    if(!cardTypesChecked){
        // Validation issue
        let cardTypesError = document.getElementById("cardtype_error");
        cardTypesError.style.display ="block";

        errorFlag = true;
    }

    

    let cardName = document.getElementById("cardname");
    let cardMonth = document.getElementById("month");
    let cardYear = document.getElementById("year");
    let cardNumber = document.getElementById("cardnumber");
 
	
    // Check name on the card
    if (cardName.value == "") {
        // Validation issue

        // Give an error message
        let cardNameError = document.getElementById("cardname_error");
        cardNameError.style.display = "block";

        if(!errorFlag){
            cardName.focus();
            cardName.select();
            }

        errorFlag = true;
    }

    //Check expiry date
  
    //Use the Date object to check if the card has expired
    let currentYear = new Date().getFullYear();
    let currentMonth = new Date(); // Months are zero-based
    let currentMonth1 = new Date(cardMonth.value); // Months are zero-based

    // Month Error
    if (isNaN(currentMonth1.getMonth())) {
        let monthError = document.getElementById("month_error");
        monthError.style.display ="block";

          if(!errorFlag){
            cardMonth.focus();
            cardMonth.select();
            }

        errorFlag = true;
    }

    // Expiry Error

    if(parseInt(cardYear.value) <= currentYear  && (parseInt(cardMonth.value)) <= (currentMonth.getMonth() +1))
    {
         displayCardError("expiry_error");
            if(!errorFlag){
            cardMonth.focus();
            cardMonth.select();
            }

        errorFlag = true;
    }


    // Check card number

     if (cardNumber.value == "") {
        // Validation issue

        // Give an error message
        let cardNumberError = document.getElementById("cardnumber_error");
        cardNumberError.style.display = "block";
    
        if(!errorFlag){
            cardNumber.focus();
            cardNumber.select();
            }

        errorFlag = true;
    


        // Check credit card number
     } else if (!validateCreditCard(cardNumber.value)) {
              if(!errorFlag){
            cardNumber.focus();
            cardNumber.select();
            }
             errorFlag = true;
         }

    // Code above here
    return errorFlag;
}


/*
 * Adds an item to the cart and hides the quantity and add button for the product being ordered.
 *
 * param itemNumber The number used in the id of the quantity, item and remove button elements.
 */
function addItemToCart(itemNumber) {
	// Get the value of the quantity field for the add button that was clicked 
	let quantityValue = trim(document.getElementById("qty" + itemNumber).value);

	// Determine if the quantity value is valid
	if (!isNaN(quantityValue) && quantityValue != "" && quantityValue != null && quantityValue != 0 && !document.getElementById("cartItem" + itemNumber)) {
		// Hide the parent of the quantity field being evaluated
		document.getElementById("qty" + itemNumber).parentNode.style.visibility = "hidden";

		// Determine if there are no items in the car
		if (numberOfItemsInCart == 0) {
			// Hide the no items in cart list item 
			document.getElementById("noItems").style.display = "none";
		}

		// Create the image for the cart item
		let cartItemImage = document.createElement("img");
		cartItemImage.src = "images/" + itemImage[itemNumber - 1];
		cartItemImage.alt = itemDescription[itemNumber - 1];

		// Create the span element containing the item description
		let cartItemDescription = document.createElement("span");
		cartItemDescription.innerHTML = itemDescription[itemNumber - 1];

		// Create the span element containing the quanitity to order
		let cartItemQuanity = document.createElement("span");
		cartItemQuanity.innerHTML = quantityValue;

		// Calculate the subtotal of the item ordered
		let itemTotal = quantityValue * itemPrice[itemNumber - 1];

		// Create the span element containing the subtotal of the item ordered
		let cartItemTotal = document.createElement("span");
		cartItemTotal.innerHTML = formatCurrency(itemTotal);

		// Create the remove button for the cart item
		let cartItemRemoveButton = document.createElement("button");
		cartItemRemoveButton.setAttribute("id", "removeItem" + itemNumber);
		cartItemRemoveButton.setAttribute("type", "button");
		cartItemRemoveButton.innerHTML = "Remove";
		cartItemRemoveButton.addEventListener("click",
			// Annonymous function for the click event of a cart item remove button
			function () {
				// Removes the buttons grandparent (li) from the cart list
				this.parentNode.parentNode.removeChild(this.parentNode);

				// Deteremine the quantity field id for the item being removed from the cart by
				// getting the number at the end of the remove button's id
				let itemQuantityFieldId = "qty" + this.id.charAt(this.id.length - 1);

				// Get a reference to quanitity field of the item being removed form the cart
				let itemQuantityField = document.getElementById(itemQuantityFieldId);

				// Set the visibility of the quantity field's parent (div) to visible
				itemQuantityField.parentNode.style.visibility = "visible";

				// Initialize the quantity field value
				itemQuantityField.value = "";

				// Decrement the number of items in the cart
				numberOfItemsInCart--;

				// Decrement the order total
				orderTotal -= itemTotal;

				// Update the total purchase in the cart
				document.getElementById("cartTotal").innerHTML = formatCurrency(orderTotal);

				// Determine if there are no items in the car
				if (numberOfItemsInCart == 0) {
					// Show the no items in cart list item 
					document.getElementById("noItems").style.display = "block";
				}
			},
			false
		);

		// Create a div used to clear the floats
		let cartClearDiv = document.createElement("div");
		cartClearDiv.setAttribute("class", "clear");

		// Create the paragraph which contains the cart item summary elements
		let cartItemParagraph = document.createElement("p");
		cartItemParagraph.appendChild(cartItemImage);
		cartItemParagraph.appendChild(cartItemDescription);
		cartItemParagraph.appendChild(document.createElement("br"));
		cartItemParagraph.appendChild(document.createTextNode("Quantity: "));
		cartItemParagraph.appendChild(cartItemQuanity);
		cartItemParagraph.appendChild(document.createElement("br"));
		cartItemParagraph.appendChild(document.createTextNode("Total: "));
		cartItemParagraph.appendChild(cartItemTotal);

		// Create the cart list item and add the elements within it
		let cartItem = document.createElement("li");
		cartItem.setAttribute("id", "cartItem" + itemNumber);
		cartItem.appendChild(cartItemParagraph);
		cartItem.appendChild(cartItemRemoveButton);
		cartItem.appendChild(cartClearDiv);

		// Add the cart list item to the top of the list
		let cart = document.getElementById("cart");
		cart.insertBefore(cartItem, cart.childNodes[0]);

		// Increment the number of items in the cart
		numberOfItemsInCart++;

		// Increment the total purchase amount
		orderTotal += itemTotal;

		// Update the total puchase amount in the cart
		document.getElementById("cartTotal").innerHTML = formatCurrency(orderTotal);
	}
}

/*
 * Hides all of the error elements.
 */
function hideErrors() {
	// Get an array of error elements
	let error = document.getElementsByClassName("error");

	// Loop through each element in the error array
	for (let i = 0; i < error.length; i++) {
		// Hide the error element by setting it's display style to "none"
		error[i].style.display = "none";
	}
}

/*
 * Handles the load event of the document.
 */
function load() {
	//	Populate the year select with up to date values
	let year = document.getElementById("year");
	let currentDate = new Date();
	for (let i = 0; i < 7; i++) {
		let newYearOption = document.createElement("option");
		newYearOption.value = currentDate.getFullYear() + i;
		newYearOption.innerHTML = currentDate.getFullYear() + i;
		year.appendChild(newYearOption);
	}

	// Event listener for the form submit
    document.getElementById("orderform").addEventListener("submit", function (e) {
        // Trigger the validate function on form submit
        validate(e);
    });

    // Event listener for the form reset
    document.getElementById("orderform").addEventListener("reset", function (e) {
        // Trigger the resetForm function on form reset
        resetForm(e);
    });

	let items = ["addMac", "addMouse", "addWD", "addNexus", "addDrums"];
    // Event listeners for product buttons
    for (let i = 0; i < items.length; i++) {
        let addButton = document.getElementById(items[i]);
        addButton.addEventListener("click", function() {
            // Call addItemToCart with the unique item number
            addItemToCart(i+1);
        });
    }

    hideErrors();

}

// Add document load event listener
document.addEventListener("DOMContentLoaded", load);












