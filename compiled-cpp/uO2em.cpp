#include <iostream>
using namespace std; 
class Triangle{
  private:
    int base;
    int height;
  public:
    //class method declaration
    void set_values (int,int); 

    //class method declaration and definition
    //for area()
    double area() {return (base*height)/2;}
}triA;

//class method definition for set_value()
void Triangle::set_values (int x, int y) {
  base = x;
  height = y;
}

int main(){
   Triangle triB;  
   triA.set_values(2,5);
   triB.set_values(5,10);
   cout << "triA area: " << triA.area() << endl;
  cout << "triB area: " << triB.area() << endl;
  return 0;
}
