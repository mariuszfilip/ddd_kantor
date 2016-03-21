Feature: wymiana waluty
  jak klient chce miec mozliwosci szybkiej wymiany waluty


  Scenario:  zlecenie kupna waluty
    Given jestem klientem
    When wybieram walute ktora chce kupic
    And wybieram wolumen waluty
    And wybieram konto z ktorego przelewam pln
    And wybieram numer konta na ktory ma byc przelew zwrotny
    Then wyswietla mi sie kurs
    And wyswietla mi sie podsumowanie zlecenia
    And potwierdzam zlecenie

  #Scenario:  zlecenie sprzedazy waluty
    #Given jestem klientem
    #When wybieram walute ktora chce kupic
    #And wybieram wolumen waluty
    #And wybieram konto z ktorego przelewam pln
    #And wybieram numer konta na ktory ma byc przelew zwrotny
    #Then wyswietla mi sie podsumowanie zlecenia


