## Test Ibit

В залежності від вибраної арифметичної операції, виконується на ajax запит на одну з наступних url:
- /calculate/addition
- /calculate/subtraction
- /calculate/multiplication
- /calculate/division
Для всіх цих запитів передбачені роути і відповідні методи в контроллері CalculatorController
Якщо запит виконується за непердбаченим url із префіксом /calculate  -- в контроллері передбачений метод, який повертає помилку.

Також вхідні дані перевіряться в CalculatorRequest.php
