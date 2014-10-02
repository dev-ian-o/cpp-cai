//dem051-2.cpp

//This program uses cin to input a first and last name into a program.

#include <iostream>
#include <string>

using namespace std;

int main()
{
  string first_name;
  string last_name;

  cout << "Enter your first name: ";
  cin >> first_name;

  cout << endl;
  cout << "Enter your last name: ";
  cin >> last_name;

  cout << endl << endl;
  cout << "Welcome, " << first_name << " " << last_name << endl;

  return 0;
}