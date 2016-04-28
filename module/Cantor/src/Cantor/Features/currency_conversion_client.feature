Feature: w celu szybkiej wymiany walut
  jako klient
  chce miec mozliwosc wyboru swojego konta , wolumenu oraz potwierdzenia swojego zlecenia


  @domain
  Scenario:  zlecenie kupna waluty
    Given jestem klientem
    When wybieram walute ktora chce kupic
    And wybieram wolumen waluty
    And wybieram konto z ktorego przelewam pln
    And wybieram numer konta na ktory ma byc przelew zwrotny
    Then wyswietla mi sie kurs
    And wyswietla mi sie podsumowanie zlecenia
    And potwierdzam zlecenie


  @application
  Scenario:  zlecenie kupna waluty
    Given jestem klientem
    When wybieram walute ktora chce kupic
    And wybieram wolumen waluty
    And wybieram konto z ktorego przelewam pln
    And wybieram numer konta na ktory ma byc przelew zwrotny
    Then wyswietla mi sie kurs
    And wyswietla mi sie podsumowanie zlecenia
    And potwierdzam zlecenie


