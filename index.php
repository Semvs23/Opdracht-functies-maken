<?php

// Functie om een nummer op te vragen bij de gebruiker
function getNumber($prompt)
{
    return (float)readline($prompt);
}

// Functie om de operatie op te vragen bij de gebruiker
function getOperation()
{
    $operation = readline("Enter operation (+, -, *, /): ");
    // Blijf vragen totdat een geldige operatie wordt ingevoerd
    while (!in_array($operation, ['+', '-', '*', '/'])) {
        echo "Invalid operation! Please enter a valid operation (+, -, *, /).\n";
        $operation = readline("Enter operation (+, -, *, /): ");
    }
    return $operation;
}

// Functie om de berekening uit te voeren
function calculate($num1, $num2, $operation)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Error: Division by zero!";
            }
        default:
            return "Invalid operation!";
    }
}

// Functie om te vragen of de gebruiker wil doorgaan
function wantsToContinue()
{
    $choice = readline("Do you want to perform another calculation? (yes/no): ");
    return strtolower($choice) === 'yes';
}

// Start de calculator in een loop
do {
    // Haal de invoer van de gebruiker op
    $num1 = getNumber("Enter first number: ");
    $operation = getOperation();
    $num2 = getNumber("Enter second number: ");

    // Voer de berekening uit
    $result = calculate($num1, $num2, $operation);

    // Toon het resultaat
    echo "Result: $result\n";
} while (wantsToContinue()); // Herhaal zolang de gebruiker 'yes' invoert

echo "Goodbye!\n";
