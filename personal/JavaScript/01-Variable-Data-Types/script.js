// This will print 100 to the console
/*
console.log(100);

// This will print a string to the console
console.log("Hello World!");

// To create a variable
const x = 100;

// To print the variable cretaed to the concole
console.log(x);

// To create a warning sign on the console
console.warn("This is a warnign message");

// To create an error message on the console
console.error("This is an error message");

// To create a table on the concole
console.table({name: 'Fadlullah', email: 'fadl@gmail.com', number: 2048699891, address: '525 Kylemore Avenue'});

// To create a group of logs that can be collapsed
console.group('Tuesday to do list');
console.log("Attend interview");
console.log("Go for knowledge Test");
console.log("Go for Health Card");
console.log("Go fro rehearsal at NDC");
console.groupEnd();

// To add css to a console object
const styles = 'padding: 10px; background-color: green; color: white'; // This is to create the styles only

// To use the styling
console.log('%cHello World!', styles);



/*******
 * Variable declaration
 * Are containers for piees of data type
 * To declare variables we have , VAR, LET, CONST(var, let, const)
 * 
 * Global scope - var, let
 * Naming Conventions - Only letters, numbers, underscores and dollar signs, can't start with a number
 */
/*
let firstName = "Fadlullah";
let lastName = "Jamiu-Imam";

console.log(firstName, lastName);

let age = 30;

console.log(age);

// Reassigning variable
age = 21;

console.log(age);

// Declare multiple values at one

let a,b,c;

const d = 10,e = 20,f = 30;

console.log(d);
*/

/****
 * Primitive  Data Types:
 * Undefined : Automatically gets value if not assigned anything explicitly.
 * Null      : A special datatype in JS which holds an explicit null value.
 * Number    : Holds numeric values.
 * String    : Stores text . It is enclosed within double or single quotes.
 * Boolean   : Takes only two values true / false.
 * Symbol    : New primitive datatype introduced in ES6. Used to represent a unique and immutable symbol which has no meaning.
 * Symbol    : ES6 introduced a new primitive data type called symbol. It represents a unique and immutable value.
 * Symbol    : ES6 introduced symbol datatype to represent a unique identifier. 
 * BigInt    : Introduced in ES8 represents a signed integer whose size is unlimited.
 */

/*******
 * Reference  types:
 * Object     : Collection of properties , similar to Map data structure.
 * Array      : Collection of items stored in key index position.
             * Indexed based on numbers starting from zero.
 * Function   : It is also known as First class function because it can be  assigned to a variable, passed as argument and returned as result.
             * Can contain mixed data type elements.
 * Function   : It is a function with a name.
 * Date       : Contains date and time information.
 * RegExp     : Used for matching patterns in strings.
 * Map        : Key value pairs where keys are unique.
 * Set        : Unordered collection of unique values.
 * WeakMap    : Hold weakly referenced objects.
 * WeakSet    : Hold weakly referenced objects.
 
 */

/*******
 * TypeCasting is the process of explicitilty comvertig a value from one type to another
 * e.g "5", to 5.
 * TypeCoersion is the process of implicitly converting from one data type to another
 * 
 */

// let amount = '100';

// amount = parseInt(amount);

// Use unary operator
// amount = +amount;

// use of Number constructor
// amount = Number(amount);


// Change Number to strange
// let amount = 100;

// // Use method
// amount = amount.toString(); // convert number to string
// amount = String(amount)

// Convert string to decimal
let amount = '99.5';
amount = parseFloat(amount);

console.log(amount, typeof amount);