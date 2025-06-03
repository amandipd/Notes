// ===================================
// C++ FUNDAMENTALS & CORE FEATURES
// ===================================

#include <iostream>
#include <cmath>
#include <string>

// ===================================
// USER INPUT
// ===================================

int main() {
    // cout << (insertion operator)
    // cin >> (extraction operator)
    
    // Basic input - single word only
    std::string name;
    std::cout << "What's your name: ";
    std::cin >> name;
    
    // Full line input - allows spaces in strings
    std::cout << "What's your full name? ";
    std::getline(std::cin >> std::ws, name);
    std::cout << "Hello " << name;
    
    // Note: If incorrect datatype entered, may resort to default values (int = 0)
    
    return 0;
}

// ===================================
// MATH FUNCTIONS
// ===================================

int mathExample() {
    double x = 3;
    double y = 4;
    double z;
    
    z = std::max(x, y);     // maximum value
    z = std::min(x, y);     // minimum value
    z = pow(2, 3);          // power (2^3 = 8)
    z = sqrt(9);            // square root
    z = abs(-4);            // absolute value
    z = round(x);           // round to nearest int
    z = ceil(3.14);         // round up (4)
    z = floor(3.99);        // round down (3)
    
    return 0;
}

// ===================================
// CONDITIONALS & SWITCHES
// ===================================

int conditionalExample() {
    int grade = 85;
    
    // Switch statement - default case acts as else block
    switch(grade / 10) {
        case 10:
        case 9:
            std::cout << "A grade";
            break;
        case 8:
            std::cout << "B grade";
            break;
        case 7:
            std::cout << "C grade";
            break;
        default:
            std::cout << "Below C grade";
    }
    
    return 0;
}

// ===================================
// TERNARY OPERATOR
// ===================================

int ternaryExample() {
    // ternary operator ?: replacement for if/else statement
    // condition ? expression1 : expression2;
    
    int grade = 75;
    grade >= 60 ? std::cout << "You pass!" : std::cout << "You fail!";
    
    int number = 9;
    number % 2 == 1 ? std::cout << "odd" : std::cout << "even";
    
    return 0;
}

// ===================================
// STRING METHODS
// ===================================

int stringExample() {
    std::string name;
    std::cout << "Enter your name: ";
    std::getline(std::cin, name);
    
    if (name.length() > 12) {
        std::cout << "Your name can't be over 12 characters";
    } else {
        std::cout << "Welcome " << name;
    }
    
    if (name.empty()) {
        std::cout << "Name is empty";
    }
    
    name.clear();                    // clear string
    name.append("@gmail.com");       // append to string
    std::cout << "Your username is now " << name;
    
    return 0;
}

// ===================================
// ARRAYS & ITERATION
// ===================================

int arrayExample() {
    // Array initialization
    std::string cars[] = {"Corvette", "Mustang", "Camry"};
    
    // Array with specified size
    double prices[4];
    prices[0] = 5.00;
    prices[1] = 7.50;
    prices[2] = 9.99;
    prices[3] = 15.00;
    
    // Accessing array elements
    std::string students[] = {"Spongebob", "Patrick", "Squidward"};
    std::cout << students[0];  // outputs "Spongebob"
    
    // Traditional for loop
    for (int i = 0; i < 3; i++) {
        std::cout << students[i] << '\n';
    }
    
    // Range-based for loop (C++11)
    for (std::string student : students) {
        std::cout << student << '\n';
    }
    
    return 0;
}

// ===================================
// SIZEOF() OPERATOR
// ===================================

int sizeofExample() {
    double gpa = 2.5;
    std::cout << sizeof(gpa) << " bytes\n";  // outputs 8 bytes
    
    // Data type sizes:
    // char: 1 byte
    // bool: 1 byte  
    // int: 4 bytes
    // double: 8 bytes
    // string: 32 bytes regardless of content size
    
    char grades[] = {'A', 'B', 'C', 'D', 'F'};
    std::cout << sizeof(grades) << " bytes\n";  // 5 bytes
    
    // Find size of array
    int arr[] = {1, 2, 3, 4, 5};
    int size = sizeof(arr);
    int length = sizeof(arr) / sizeof(int);
    std::cout << length;  // outputs 5
    
    return 0;
}

// ===================================
// FILL ARRAYS
// ===================================

int fillExample() {
    // Manual initialization
    std::string foods[10] = {"pizza", "pizza", "pizza", "pizza", "pizza"};
    
    for (std::string food : foods) {
        std::cout << food << '\n';
    }
    
    // Automated fill
    const int SIZE = 100;
    std::string autoFoods[SIZE];
    std::fill(autoFoods, autoFoods + SIZE, "pizza");  // begin, end, value
    
    return 0;
}

// ===================================
// FILL ARRAY WITH USER INPUT
// ===================================

int userInputArray() {
    std::string foods[5];
    int size = sizeof(foods) / sizeof(foods[0]);
    
    for (int i = 0; i < size; i++) {
        std::cout << "Enter a food you like #" << i + 1 << ": ";
        std::getline(std::cin, foods[i]);
    }
    
    std::cout << "You like the following food:\n";
    for (std::string food : foods) {
        std::cout << food << '\n';
    }
    
    return 0;
}

// ===================================
// MULTIDIMENSIONAL ARRAYS
// ===================================

int multidimensionalExample() {
    std::string cars[][3] = {
        {"Mustang", "Escape", "F150"},
        {"Corvette", "Equinox", "Silverado"},
        {"Challenger", "Durango", "Ram 1500"}
    };
    
    // Calculate dimensions
    int rows = sizeof(cars) / sizeof(cars[0]);
    int cols = sizeof(cars[0]) / sizeof(cars[0][0]);
    
    // Access elements
    std::cout << cars[0][1];  // outputs "Escape"
    
    // Loop through 2D array
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            std::cout << cars[i][j] << " ";
        }
        std::cout << '\n';
    }
    
    return 0;
}