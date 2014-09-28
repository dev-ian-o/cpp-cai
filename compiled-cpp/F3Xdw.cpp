// Example Structure Program Sample1
// Filename: Structure1.cpp

// This program illustrates the declaration and use of structure
// variables and the member operator to access structure
// variable members.

#include <iostream>      // 1 Load the iostream preprocessor directive to the program.  It contains information about the object cout and cin.
#include <string>			// 2 Load the string preprocessor directive to the program.  It contains information about the object string and its associated method like getline()

using namespace std;  // 3 Allows us to code in our programs cout (and later cin) without having to qualify these by coding std::cout (and std::cin).

struct PART_STRUCT  //4  Declares data structure named PART_STRUCT on the memory
{
	string   part_no;       				//5 The first data member of PART_STRUCT structure, part_no, is a string.
	int    quantity_on_hand;  	//6 The second data member of PART_STRUCT structure, quantity_on_hand, is an integer.
	double unit_price;      			//7 The third data member  of PART_STRUCT structure, unit_price, is a double.
} keyboard;  	//8 Note that the definition of the structure ends in a semicolon. In this case it also declares variable, keyboard(optional), that is one of the data type 	PART_STRUCT which can access its data members(part_no, quantity_on_hand, and unit_price).

int main()		// 9 Begins execution and controls the C++ program by executing C++ statements and other functions. 
{
	PART_STRUCT mouse;  //10 This declaration defines a variable, mouse, that is another data type PART_STRUCT that can access its data members(part_no, 	quantity_on_hand, and unit_price)

	keyboard.part_no = "KB12345"; 		//11"KB12345 is assigned to the part_no member of keyboard", or as "keyboard's part_no becomes KB12345."
	keyboard.quantity_on_hand = 10	;	//12 "10 is assigned to the quantity_on_hand member of keyboard", or as "keyboard's quantity_on_hand becomes 10."
	keyboard.unit_price =1499.75; 			//13  "1499.75 is assigned to the unit_price member of keyboard", or as "keyboard's unit_price becomes 1499.75"

	cout << "Enter the seven-character part number: ";    //14  print "Enter the seven-character part number: " on the screen
	getline(cin, mouse.part_no);	 //15 User can now input a value. Assume you input "MS00001". Therefore, "MS000001 is assigned to the part_no member of 	mouse", or as "mouse's part_no becomes MS00001.

	cout << endl;		 //16 Move the cursor to the next line
	cout << "Enter the quantity on hand: "; 	//17 print "Enter the quantity on hand: " on the screen
	cin >> mouse.quantity_on_hand;             //18  User can now input a value. Assume you input 13. Therefore, "13 is assigned to the quantity_on_hand member of 	mouse", or as "mouse's quantity_on_hand becomes 13."

	cout << endl; 		//19 Move the cursor to the next line
	cout << "Enter the unit price: "; 		//20 print "Enter the unit price: " on the screen
	cin >> mouse.unit_price; 		//21 User can now input a value. Assume you input 27.75. Therefore, "27.75 is assigned to the unit_price member of mouse", or as 	"mouse's unit_price becomes 27.75."

	cout << endl;		//22 Move the cursor to the next line
	cout << "You entered the following information for the variable mouse of data type PART_STRUCT:" << endl << endl; 	//23 You entered the following 	information for the variable mouse of data type PART_STRUCT:
	cout << "Part Number:      " << mouse.part_no << endl;             					//24  Part Number: MS00001
	cout << "Quantity On Hand: " << mouse.quantity_on_hand << endl;    	//25 Quantity On Hand: 13                                              
	cout << "Unit Price:       " << mouse.unit_price << endl;         						//26 Unit Price: 27.75

	cout << endl;		//27 Move the cursor to the next line
	cout << "You assigned the following information for the variable keyboard of data type PART_STRUCT:" << endl << endl; 	//28 You assigned the following 	information for the variable keyboard of data type PART_STRUCT:
	cout << "Part Number:      " << keyboard.part_no << endl;             					//29 Part Number: KB12345
	cout << "Quantity On Hand: " << keyboard.quantity_on_hand << endl;    	//30 Quantity On Hand: 10                                              
	cout << "Unit Price:       " << keyboard.unit_price << endl;         						 //31 Unit Price: 1499.75
	return 0; 	//32 Ends the execution of main() and sends the integer value 0 back to the operating system to indicate that the program ended normally.
}
