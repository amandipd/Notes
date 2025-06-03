// ===================================
// C++ MEMORY MANAGEMENT & POINTERS
// ===================================

#include <iostream>
#include <string>

// ===================================
// MEMORY ADDRESSES
// ===================================

int memoryAddressExample() {
    std::string name = "Bro";
    int age = 21;
    bool student = true;
    
    // & operator gets memory address
    std::cout << &name << '\n';     // displays memory address in hexadecimal
    std::cout << &age << '\n';
    std::cout << &student << '\n';
    
    return 0;
}

// ===================================
// VARIABLE SWAPPING (By Value)
// ===================================

int swapByValue() {
    std::string x = "Kool-Aid";
    std::string y = "Water";
    std::string temp;
    
    // Traditional swap using temporary variable
    temp = x;
    x = y;
    y = temp;
    
    // Result: x is "Water", y is "Kool-Aid"
    std::cout << "x: " << x << '\n';
    std::cout << "y: " << y << '\n';
    
    return 0;
}

// ===================================
// POINTERS
// ===================================

int pointerExample() {
    // A pointer is a variable that stores a memory address of another variable
    // & address-of operator
    // * dereference operator
    
    std::string name = "Bro";
    std::string *pName = &name;  // pointer to name
    
    std::cout << pName << '\n';   // pointer value: 0xb15fbff760 (memory address)
    std::cout << *pName << '\n';  // dereferenced value: "Bro"
    
    // Changing value through pointer
    *pName = "Code";
    std::cout << name << '\n';    // outputs "Code"
    
    return 0;
}

// ===================================
// NULL POINTERS
// ===================================

int nullPointerExample() {
    // A null pointer is a special value that means something has no value
    // nullptr is a keyword that represents a null pointer literal
    
    int *pointer = nullptr;
    int x = 123;
    
    // Check if pointer is null before using
    if (pointer == nullptr) {
        std::cout << "Address was not assigned!\n";
    } else {
        std::cout << "Address was assigned\n";
        std::cout << "Value: " << *pointer << '\n';
    }
    
    // Assign address to pointer
    pointer = &x;
    
    if (pointer == nullptr) {
        std::cout << "Address was not assigned!\n";
    } else {
        std::cout << "Address was assigned\n";
        std::cout << "Value: " << *pointer << '\n';
    }
    
    return 0;
}

// ===================================
// CONST PARAMETERS
// ===================================

// Function declaration with const parameters
void printInfo(const std::string name, const int age);

int constParameterExample() {
    std::string name = "Bro";
    int age = 21;
    printInfo(name, age);
    
    return 0;
}

// Function definition - creates read-only parameters
void printInfo(const std::string name, const int age) {
    // These lines would cause compilation errors:
    // name = "Modified";  // Error: cannot modify const parameter
    // age = 25;          // Error: cannot modify const parameter
    
    std::cout << name << '\n';
    std::cout << age << '\n';
}

// ===================================
// PASS BY REFERENCE WITH POINTERS
// ===================================

void swapByReference(std::string *x, std::string *y) {
    std::string temp = *x;
    *x = *y;
    *y = temp;
}

int passByReferenceExample() {
    std::string drink1 = "Kool-Aid";
    std::string drink2 = "Water";
    
    std::cout << "Before swap:\n";
    std::cout << "drink1: " << drink1 << '\n';
    std::cout << "drink2: " << drink2 << '\n';
    
    // Pass addresses to function
    swapByReference(&drink1, &drink2);
    
    std::cout << "After swap:\n";
    std::cout << "drink1: " << drink1 << '\n';
    std::cout << "drink2: " << drink2 << '\n';
    
    return 0;
}

// ===================================
// POINTER ARITHMETIC
// ===================================

int pointerArithmeticExample() {
    int numbers[] = {1, 2, 3, 4, 5};
    int *ptr = numbers;  // points to first element
    
    std::cout << "Array elements using pointer arithmetic:\n";
    for (int i = 0; i < 5; i++) {
        std::cout << *(ptr + i) << " ";  // access elements using pointer arithmetic
    }
    std::cout << '\n';
    
    // Moving pointer
    ptr++;  // now points to second element
    std::cout << "After increment: " << *ptr << '\n';  // outputs 2
    
    return 0;
}

// ===================================
// DYNAMIC MEMORY ALLOCATION
// ===================================

int dynamicMemoryExample() {
    // Allocate memory for single integer
    int *ptr = new int(42);
    std::cout << "Value: " << *ptr << '\n';
    delete ptr;  // free memory
    
    // Allocate memory for array
    int size = 5;
    int *arr = new int[size];
    
    // Initialize array
    for (int i = 0; i < size; i++) {
        arr[i] = i * 10;
    }
    
    // Print array
    for (int i = 0; i < size; i++) {
        std::cout << arr[i] << " ";
    }
    std::cout << '\n';
    
    delete[] arr;  // free array memory
    
    return 0;
}

// ===================================
// COMPLETE EXAMPLE PROGRAM
// ===================================

int main() {
    std::cout << "=== Memory Address Example ===\n";
    memoryAddressExample();
    
    std::cout << "\n=== Swap By Value Example ===\n";
    swapByValue();
    
    std::cout << "\n=== Pointer Example ===\n";
    pointerExample();
    
    std::cout << "\n=== Null Pointer Example ===\n";
    nullPointerExample();
    
    std::cout << "\n=== Pass By Reference Example ===\n";
    passByReferenceExample();
    
    std::cout << "\n=== Pointer Arithmetic Example ===\n";
    pointerArithmeticExample();
    
    std::cout << "\n=== Dynamic Memory Example ===\n";
    dynamicMemoryExample();
    
    return 0;
}