/********f************
    
	Project 3 Javascript
	Name: Oyebisi Oyekan
	Date: 2023-11-23
	Description: Eventlisteners were created for the add buttons and reset button.
				The shipping information and payment information fields were validated.
				Additionally, Regex was used to validate the postal code and email address
				and an if statement was used such that information about the validity of the input 
				was only shown after fulfilling the required field requirement.
				The month was validated by checking if the selected input has a  number value.
				The expiry date was validated using date object.



*********************/

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
	// Determine if any items are in the cart
	// When the cart has not items, submission of form is halted
	
	if (numberOfItemsInCart == 0) {
		// Display an error message contained in a modal dialog element

		const modal = document.querySelector("#cartError");
		modal.showModal();

		const closeModal = document.querySelector(".close-button");

		closeModal.addEventListener("click", () => {
			modal.close();
			document.getElementById("qty1").focus();
		});

		// Form has errors
		return  true;
		
	}

	
	//	Complete the validations below

	//Shipping Information
	let customerName = document.getElementById("fullname");
	let customerAddress = document.getElementById("address");
	let City = document.getElementById("city");
	let PostalCode = document.getElementById("postal");
	let Email = document.getElementById("email");
	
	
	let errorFlag = false;

	//Validate Customer name
	if (customerName.value == "")
	{
		//Validation issue
		//Give an error message
		let nameError = document.getElementById("fullname_error");
		nameError.style.display = "block";

		if (!errorFlag){
	
			customerName.focus();
			//customerName.select();
		}
		
		errorFlag = true;
		
	}

	//Validate address
	if (customerAddress.value == ""){
		//Validation issue
		//Give an error message
		let addressError = document.getElementById("address_error");
		addressError.style.display = "block";

		if (!errorFlag){
			customerAddress.focus();
			customerAddress.select();
		}
		

		errorFlag = true;

		
	}


		//Validate city
		if (City.value == ""){
			//Validation issue
			//Give an error message
			let cityError = document.getElementById("city_error");
			cityError.style.display = "block";

			if (!errorFlag){
				City.focus();
				City.select();
			}
			

			errorFlag = true;
		}


	// validate postal code
	if (PostalCode.value == ""){
		//Validation issue
		//Give an error message
		let PostalCodeError = document.getElementById("postal_error");
		PostalCodeError.style.display = "block";

		if (!errorFlag){
			PostalCode.focus();
			PostalCode.select();
		}
		errorFlag = true;
	}
	else{

			let postalregex = new RegExp(/[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d/);
			if (!postalregex.test(PostalCode.value)){	
				//Validation issue
					let postalCodeFormatError = document.getElementById("postalformat_error");
					postalCodeFormatError.style.display = "block";
			
					if (!errorFlag){
						PostalCode.focus();
						PostalCode.select();
					}
			
					errorFlag = true;
				}
		}


	// validate EmailAddress
	if (Email.value == ""){
		//Validation issue	
		//Give an error message
		let emailError = document.getElementById("email_error");
		emailError.style.display = "block";

		if (!errorFlag){
			Email.focus();
			Email.select();
		}
		errorFlag = true;
	}
	else	
	{

			//validate email address format
				let emailregex = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
				if (!emailregex.test(Email.value)){	
			//Validation issue
				let emailError = document.getElementById("emailformat_error");
				emailError.style.display = "block";
				
						if (!errorFlag){
							Email.focus();
							Email.select();
						}
						errorFlag = true;
				}	
				
			
		

	}
		



	//Payment Information
	let Card = ["visa", "amex", "mastercard"];
	let CName = document.getElementById("cardname");
	let Month = document.getElementById("month");
	let Year = document.getElementById("year");
	let Number = document.getElementById("cardnumber");
	let numberValue = parseInt(Number.value);
	
		//Validate Card type
		let cardChecked = false;

		for (let i = 0; i < Card.length; i++)
		{
			if(!cardChecked && document.getElementById(Card[i]).checked)
			{

				cardChecked = true;
			}
		}

			if (!cardChecked)
			{
					//validation issue
					//Give an error message
					let cardError = document.getElementById("cardtype_error");
					cardError.style.display = "block";

					errorFlag = true;
					
			}
				
			

			//Validate name on card
			if (CName.value == ""){
				//Validation issue
				

			//Give an error message
			let CNameError = document.getElementById("cardname_error");
				CNameError.style.display = "block";

				if (!errorFlag){
					CName.focus();
					CName.select();
				}
				errorFlag = true;
			}


			//Validate expiry month
			if(isNaN(Month.value))
			{
			// //Validation issue
			//Give an error message
			let monthError = document.getElementById("month_error");
			monthError.style.display = "block";
			if (!errorFlag){
				Month.focus();
				
			}
			

		 	errorFlag = true;
	 	}

		
		
			//validate expiry Date
			let inputMonth = parseInt(Month.value);
			let inputYear = parseInt(Year.value);
			let currentDate = new Date();
			let expiryDate = new Date();
				expiryDate.setMonth(inputMonth - 1);
				expiryDate.setFullYear(inputYear);
			
			let monthValue = expiryDate.getMonth();
			if (isNaN(monthValue)){
				//Validation issue
				//Give an error message
				let monthError = document.getElementById("month_error");
				monthError.style.display = "block";

				if (!errorFlag){
					Month.focus();
				}
				

			 	errorFlag = true;
			 }
			 else
			 {
				//validate expiry date
				if (expiryDate <= currentDate)
						{
				//Validation issue
				//Give an error message
				let dateError = document.getElementById("expiry_error");
				dateError.style.display = "block";

				if (!errorFlag){
				Year.focus();					
				}

				errorFlag = true;
								
			}
	}


			
			 //Validate Card Number
				
			let  checkingFactors = [4, 3, 2, 7, 6, 5, 4, 3, 2];
		
				//Validation issue
				if (Number.value == "")
				{
				//Give an error message
				let numberError = document.getElementById("cardnumber_error");
				numberError.style.display = "block";

					if (!errorFlag){
						Number.focus();
						Number.select();
					}
						errorFlag = true;
						
					}
					else
					{

						// Multiply Checking Factors by Credit Card digits and Sum
						let  sum = 0;
						let numberArray = [];
						let stringNumberValue = numberValue.toString();
						for (let i = 0; i < stringNumberValue.length - 1; i++) 
						{
							numberArray.push(+stringNumberValue.charAt(i));
							sum += numberArray[i] * checkingFactors[i];
						}

		

										let mod = sum % 11;

										let checkDigit = 11 - mod;

										numberArray.push(+stringNumberValue.charAt(9));
										
										if (checkDigit !==  numberArray[9] || stringNumberValue.length !== 10)
										{
											//Give an error message
											let numberFormatError = document.getElementById("invalidcard_error");
											numberFormatError.style.display = "block";
										

											if (!errorFlag){
												Number.focus();
												Number.select();
											}

											errorFlag = true;
											
					
					
				}
				
				
			}
			
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

	// Add event listener for the form submit
	document.getElementById("orderform").addEventListener("submit", validate);	
	
	document.getElementById("orderform").addEventListener("reset", function(e) {
		resetForm(e);
	});
	
	
	let itemsAdded = ["addMac", "addMouse", "addWD", "addNexus", "addDrums"];
	for(let i = 0; i < itemsAdded.length; i++)
	{
		document.getElementById(itemsAdded[i]).addEventListener("click", function(){
			addItemToCart(i+1);
		});
	}


	hideErrors ();
	
	
}

// Add document load event listener
document.addEventListener("DOMContentLoaded", load);












