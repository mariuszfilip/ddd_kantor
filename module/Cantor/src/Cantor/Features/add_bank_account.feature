Feature: jako klient mam mozliwosc dodania nowego konta bankowego


  Scenario: Prawidlowe dodanie numeru konta przez klienta
   Given jestem klientem
    When  uzpelniam numer konta bankowego ,kraj w systemie
    And system przypisuje numer konta bankowego do klienta
    Then posiadam aktywny numer konta bankowego do wymiany walut