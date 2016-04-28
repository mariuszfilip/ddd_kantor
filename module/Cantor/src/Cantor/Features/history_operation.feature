Feature: w celu latwego przegladania histori operacji
  jak klient
  chce posiadac zawansowana wyszukiwarka z filtrem konta bankowego oraz zakresem dat

  @domain
  Scenario: wyszukania na podstawie konta bankowego i zakresu dat
    Given wybieram numer konta "x" oraz date od "2015.01.01"
    When klikam wyszukaj
    Then widze liste wszystkich operacji na koncie
      | data_operacji | kwota_operacji | waluta_na_ktora_wymiana | numer_konta_z | numer_konta_na |
      | 2015-01-02    | 3000             | PLN                      |           x   | w              |
