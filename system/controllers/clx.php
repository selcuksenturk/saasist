<?php

@ini_set('memory_limit', '512M');
@ini_set('max_execution_time', 0);
@set_time_limit(0);


/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

is_dev();
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('_application_menu', 'dev');
$action = route(1,'view');



use Stichoza\GoogleTranslate\TranslateClient;

// use Twilio\Rest\Client;





switch ($action){



    case 'test':


        $t = Workspace::createWorkspace([]);

        dd($t);

        break;


    case 'append':

        $new_strings = [
            'Enabled' => 'Enabled',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

        ];

        $append = '';
        foreach ($new_strings as $key => $value)
        {
            if($key == '')
            {
                continue;
            }
            if(isset($_L[$key])){
                continue;
            }
            $append .= '    \''.$key.'\''.' => '.'\''.$value.'\''.',
';
        }

        if($append == '')
        {
            exit('No new string');
        }

        $append = '
'.$append;
        $append .= '];';




        //  exit;
        $files = glob('system/i18n/*.{php}', GLOB_BRACE);
        foreach($files as $file) {
            $current = file_get_contents($file);
            $current = rtrim($current);
            $current = substr($current, 0, -2);
            $current = rtrim($current);

            $check_string = rtrim($append);
            $check_string = substr($check_string, 0, -2);
            $check_string = str_replace(PHP_EOL,'',$check_string);
            $check_string = trim($check_string);
            $check_string = rtrim($check_string,',');
            $check_string = explode('=>',$check_string);
            $check_string = $check_string[0];
            $check_string = trim($check_string);


            if (strpos($current, $check_string) !== false) {
                continue;
            }
            else{
                $current .= $append;
                file_put_contents($file, $current);
            }

        }

        unset($_L);

        require 'system/i18n/ro.php';

        $content = '';
        foreach ($_L as $key => $value)
        {
            $value = str_repeat("*", strlen($value));
            $content .= '\''.$key.'\' => \''.$value.'\',
    ';
        }

        $content = '<?php
$_L = [
    '.$content;
        $content .= '

];';
        file_put_contents('system/i18n/test.php', $content);


        break;


    case 'compare':

        $english_strings = $_L;

	    $second_language = [
		    'Login' => 'Login',
		    'Edit' => 'Edycja',
		    'Delete' => 'Usuń',
		    'Account' => 'Konto',
		    'Date' => 'Data',
		    'Financial_Balances' => 'Salda finansowe',
		    'Add_New_Account' => 'Nowe konto',
		    'Manage_Accounts' => 'Zarządzaj kontami',
		    'initial_balance' => 'Saldo początkowe',
		    'account_created_successfully' => 'Konto zostało utworzone',
		    'account_updated_successfully' => 'Konto zostało zaktualizowane',
		    'account_already_exist' => 'Konto już istnieje',
		    'system' => 'System',
		    'Total' => 'Razem',
		    'Account_Not_Found' => 'Nie znaleziono konta',
		    'ref_help' => 'np. ID transakcji.',
		    'amount_error' => 'Błędna kwota',
		    'Cleared' => 'Rozliczone',
		    'Uncleared' => 'Nierozliczone',
		    'Reconciled' => 'Pogodzone',
		    'Void' => 'Unieważnij',
		    'Add_Deposit' => 'Dodaj depozyt',
		    'Amount' => 'Ilość',
		    'Payer' => 'Wpłacający',
		    'Category' => 'Kategoria',
		    'Payment Method' => 'Metoda płatności',
		    'Ref' => 'Ref',
		    'Status' => 'Status',
		    'Uncategorized' => 'Nieskategoryzowane',
		    'transaction_added_successfully' => 'Transakcja została dodana',
		    'Add_Expense' => 'Dodaj koszt',
		    'Payee' => 'Odbiorca',
		    'description_error' => 'Wymagany jest prawidłowy opis',
		    'Transfer' => 'Przenieś',
		    'From' => 'Od',
		    'To' => 'Do',
		    'Select An Account' => 'Wybierz konto',
		    'same_account_error' => 'Nie można przenieść pomiędzy tymi samymi kontami',
		    'Transaction_Not_Found' => 'Nie znaleziono transakcji',
		    'transaction_delete_successful' => 'Transakcja została usunięta',
		    'account_delete_successful' => 'Konto zostało usunięte',
		    'transaction_update_successful' => 'Transakcja została zaktualizowana',
		    'Number_of_Payment' => 'Liczba płatności',
		    'Frequency' => 'Częstotliwość',
		    'Monthly' => 'Miesięcznie',
		    'Weekly' => 'Tygodniowo',
		    'Bi_Weekly' => 'Dwutygodniowo',
		    'Everyday' => 'Codziennie',
		    'Every_30_Days' => 'Miesięcznie',
		    'Every_2_Month' => 'Dwumiesięcznie',
		    'Quarterly' => 'Quarterly',
		    'Every_6_Month' => 'Co pół roku',
		    'Yearly' => 'Rocznie',
		    'Once_Only' => 'Jednorazowo',
		    'Edit_Option' => 'Edycja opcji',
		    'Edit_Single_Occurrence' => 'Edytuj pojedyncze wystąpienie',
		    'Delete_Single_Occurrence' => 'Usuń pojedyncze wystąpienie',
		    'Edit_All_Occurrence' => 'Edytuj wszystkie wystąpienia',
		    'Delete_All_Occurrence' => 'Usuń wszystkie wystąpienia',
		    'Manage' => 'Zarządzaj',
		    'Confirm' => 'Potwierdź',
		    'Enter_Transaction' => 'Wprowadź transakcje',
		    'Payment_Cleared' => 'Płatność wyczyszczona',
		    'an_error_occured' => 'Wystąpił błąd',
		    'name_exist_error' => 'Nazwa już istnieje',
		    'account_title_length_error' => 'Tytuł konta powinien zawierać się w przedziale od 3 do 100 znaków',
		    'tr_delete_warning' => 'Usunięcia transakcji nie można cofnąć. Aktualne saldo z powiązanym kontem zostanie dostosowane. ',
		    'frequency_error' => 'Błędna częstotliwość',
		    'name_error' => 'Nazwa jest wymagana',
		    'edit_successful' => 'Edytowano pomyślnie',
		    'added_successful' => 'Dodano pomyślnie',
		    'delete_successful' => 'Skutecznie usunięto',
		    'Name' => 'Nazwa',
		    'Account_Title' => 'Tytuł konta',
		    'Edit_Account' => 'Edycja konta',
		    'Description' => 'Opis',
		    'Submit' => 'Wyślij',
		    'Transaction' => 'Transakcja',
		    'Add_Repeating_Income' => 'Dodaj powtarzalny przychód',
		    'Repeating_Income' => 'Powtarzalny przychód',
		    'Repeating_Expense' => 'Powtarzalny koszt',
		    'Add_Repeating_Expense' => 'Dodaj powtarzalny koszt',
		    'frequency_help' => 'na przykład: Jeśli wybierzesz Miesięczność częstotliwości, możesz wpisać Numer płatności 12. To będzie powtarzać transakcję przez następne 12 miesięcy.',
		    'Welcome' => 'Witaj',
		    'Type' => 'Typ',
		    'View' => 'Pokaż',
		    'Income' => 'Przychód',
		    'Expense' => 'Koszt',
		    'Credit' => 'Kredyt',
		    'Debit' => 'Debet',
		    'Cancel' => 'Anuluj',
		    'Password' => 'Hasło',
		    'Dr' => 'Dr.',
		    'Cr' => 'Cr.',
		    'Method' => 'Metoda',
		    'Toggle_navigation' => 'Przełącz nawigację',
		    'Dashboard' => 'Panel',
		    'Accounts' => 'Konta',
		    'Account_Balances' => 'Salda kont',
		    'Ad_An_Account' => 'Dodaj konto',
		    'Transactions' => 'Transakcje',
		    'View_Transactions' => 'Pokaż transakcje',
		    'Recurring' => 'Powtarzające się',
		    'Income_Calendar' => 'Kalendarz przychodów',
		    'Expense_Calendar' => 'Kalendarz kosztów',
		    'Reports' => 'Raporty',
		    'Account_Statement' => 'Wyciąg z konta',
		    'Reports_by_Date' => 'Raporty po dacie',
		    'Income_Reports' => 'Raporty o dochodach',
		    'Expense_Reports' => 'Raporty wydatków',
		    'Income_Vs_Expense' => 'Dochody vs wydatki',
		    'Settings' => 'Ustawienia',
		    'Expense_Categories' => 'Kategorie wydatków',
		    'Income_Categories' => 'Kategorie dochodów',
		    'Payees' => 'Odbiorca',
		    'Payers' => 'Płatnicy',
		    'Payment_Methods' => 'Metody płatności',
		    'Users' => 'Użytkownicy',
		    'Application_Settings' => 'Ustawienia aplikacji',
		    'My_Account' => 'Moje konto',
		    'Edit_Profile' => 'Edytuj profil',
		    'Change_Password' => 'Zmień hasło',
		    'Logout' => 'Wyloguj',
		    'Income_Today' => 'Przychód dzisiaj',
		    'Expense_Today' => 'Koszty dzisiaj',
		    'Income_This_Month' => 'Dochód w tym miesiącu',
		    'Expense_This_Month' => 'Koszt w tym miesiącu',
		    'Latest_5_Income' => 'Ostatnie 5 dochodów',
		    'Latest_5_Expense' => 'Ostatnie 5 wydatków',
		    'Income_Graph_This_Year' => 'Wykres dochodów w tym roku',
		    'Expense_Graph_This_Year' => 'Wykres wydatków w tym roku',
		    'Balance' => 'Saldo',
		    'Next' => 'Następny',
		    'Last' => 'Ostatni',
		    'Latest_Expense' => 'Ostatni wydatek',
		    'Budgets' => 'Budżety',
		    'View_Budgets' => 'Wyświetl budżety',
		    'Set_Budgets' => 'Ustaw budżety',
		    'Add_Payment_Method' => 'Dodaj metodę płatności',
		    'Manage_Payment_Methods' => 'Zarządzaj metodami płatności',
		    'drag_drop_edit' => 'Przeciągnij i upuść elementy poniżej, aby zmienić pozycję. Kliknij aby edytowac.',
		    'Manage_Categories' => 'Zarządzaj kategoriami',
		    'Manage_Payees' => 'Zarządzaj odbiorcami',
		    'Add_Payee' => 'Dodaj odbiorcę płatności',
		    'Add_Payer' => 'Dodaj płatnika',
		    'Manage_Payers' => 'Zarządzaj płatnikami',
		    'Reports_Categories' => 'Raporty według kategorii',
		    'Reports_Payees' => 'Raporty wg odbiorców',
		    'Reports_Payers' => 'Raporty wg płatników',
		    'App_Name' => 'Nazwa aplikacji / nazwa firmy',
		    'App_Name_Help_Text' => 'Ta nazwa pojawi się w tytule',
		    'Dark' => 'Ciemny',
		    'Blue' => 'Niebieski',
		    'Timezone' => 'Strefa czasowa',
		    'Decimal_Point' => 'Kropka dziesiętna',
		    'Thousands_Separator' => 'Separator tysięcy',
		    'Currency_Code' => 'Kod waluty',
		    'Edit_Categories' => 'Edytuj kategorie',
		    'cat_del_help_txt' => 'Usunięcie kategorii spowoduje zmianę nazwy wszystkich transakcji w tej kategorii na Bez kategorii ',
		    'Current_Password' => 'Aktualne hasło',
		    'New_Password' => 'Nowe hasło',
		    'Confirm_New_Password' => 'Potwierdź nowe hasło',
		    'Edit_Payee' => 'Edytuj odbiorcę',
		    'Edit_Payer' => 'Edytuj płatnika',
		    'Edit_Payment_Methods' => 'Edytuj metody płatności',
		    'Statement' => 'Komunikat',
		    'Total_Income' => 'Całkowity przychód',
		    'Total_Expense' => 'Łączny koszt',
		    'All_Transactions_at_Date' => 'Wszystkie transakcje wg daty',
		    'Income_Summary' => 'Podsumowanie dochodów',
		    'Total_Income_This_Month' => 'Całkowity dochód w tym miesiącu',
		    'Total_Income_This_Week' => 'Całkowity dochód w tym tygodniu',
		    'Total_Income_Last_30_days' => 'Całkowity dochód w ostatnich 30 dniach',
		    'Last_20_deposit_Income' => 'Ostatnie 20 depozytów / dochodów',
		    'Monthly_Income_Graph' => 'Miesięczny wykres dochodów',
		    'Expense_Summary' => 'Podsumowanie wydatków',
		    'Total Expense' => 'Łączny koszt',
		    'Total_Expense_This_Month' => 'Całkowity koszt w tym miesiącu',
		    'Total_Expense_This_Week' => 'Całkowity koszt w tym tygodniu',
		    'Total_Expense_Last_30_days' => 'Całkowity koszt w ostatnich 30 dniach',
		    'Last_20_Expense' => 'Ostatnie 20 wydatków',
		    'Monthly_Expense_Graph' => 'Miesięczny wykres wydatków',
		    'Income_Vs_Expense_This_Year' => 'Przychód Vs wydatki w tym roku',
		    'View_Statement' => 'Zobacz deklarację',
		    'All_Transactions' => 'Wszystkie transakcje',
		    'Select_Payer' => 'Wybierz płatnika',
		    'From_Date' => 'Od daty',
		    'To_Date' => 'Do data',
		    'Select_Payee' => 'Wybierz odbiorcę',
		    'Export_for_Print' => 'Eksport do wydruku',
		    'Export_to_PDF' => 'Eksport do PDF',
		    'Manage_Users' => 'Użytkownicy',
		    'Add_New_User' => 'Dodaj nowego użytkownika',
		    'Username' => 'Użytkownik',
		    'Full_Name' => 'Imię i Nazwisko',
		    'user_type_help' => 'Wybierz typ użytkownika - pracownik - uniemożliwi to dostęp do ustawień',
		    'Confirm_Password' => 'Potwierdzenie hasła',
		    'User_Type' => 'Typ użytkownika',
		    'Full_Administrator' => 'Pełny administrator',
		    'Employee' => 'Pracownik',
		    'password_change_help' => 'Pozostaw puste aby nie zmieniać hasła',
		    'Edit_User' => 'Edytuj użytkownika',
		    'currency_help' => 'Pozostaw to pole puste, jeśli nie chcesz wyświetlać kodu waluty',
		    'Theme_Style' => 'Styl motywu',
		    'Theme_Color' => 'Kolor motywu',
		    'Default_Language' => 'Domyślny język',
		    'CRM' => 'CRM',
		    'Add Contact' => 'Dodaj kontakt',
		    'Add Customer' => 'Dodaj Klienta',
		    'List Contacts' => 'Lista kontaktów',
		    'List Customers' => 'Lista Klientów',
		    'New Deposit' => 'Nowy depozyt',
		    'New Expense' => 'Nowy koszt',
		    'View Transactions' => 'Pokaż transakcje',
		    'Balance Sheet' => 'Bilans',
		    'Sales' => 'Sprzedaż',
		    'Invoices' => 'Rachunki',
		    'New Invoice' => 'Nowy rachunek',
		    'Recurring Invoices' => 'Rachunki powtarzalne',
		    'New Recurring Invoice' => 'Dodaj rach. powtarzalny',
		    'Bank n Cash' => 'Bank i pieniądze',
		    'New Account' => 'Nowe konto',
		    'List Accounts' => 'Lista kont',
		    'Products n Services' => 'Produkty i Usługi',
		    'Products' => 'Produkty',
		    'New Product' => 'Nowy produkt',
		    'Services' => 'Usługi',
		    'New Service' => 'Nowa usługa',
		    'Account Statement' => 'Wyciąg z konta',
		    'Reports by Date' => 'Raporty po dacie',
		    'Income Reports' => 'Raporty przychodów',
		    'Expense Reports' => 'Raporty kosztów',
		    'Income Vs Expense' => 'Przychody kontra koszty',
		    'All Income' => 'Wszystkie przychody',
		    'All Expense' => 'Wszystkie koszty',
		    'All Transactions' => 'Wszystkie transakcje',
		    'Utilities' => 'Narzędzia',
		    'Activity Log' => 'Log aktywności',
		    'Email Message Log' => 'Log wiadomości e-mail',
		    'Database Status' => 'Status bazy danych',
		    'My Account' => 'Moje konto',
		    'Edit Profile' => 'Edycja profilu',
		    'Change Password' => 'Zmiana hasła',
		    'General Settings' => 'Ustawienia główne',
		    'Localisation' => 'Lokalizacja',
		    'Manage Users' => 'Administratorzy',
		    'Payment Gateways' => 'Bramki płatności',
		    'Expense Categories' => 'Kategorie kosztów',
		    'Income Categories' => 'Kategorie przychodów',
		    'Manage Tags' => 'Zarządzaj tagami',
		    'Payment Methods' => 'Metody płatności',
		    'Sales Taxes' => 'Podatek sprzedaży',
		    'Email Settings' => 'Ustawienia e-mail',
		    'Email Templates' => 'Szablony e-mail',
		    'Automation Settings' => 'Automatyzacja',
		    'Please Wait' => 'Proszę czekać',
		    'Search Customers' => 'Szukaj użytkowników',
		    'Income Today' => 'Przychody dzisiaj',
		    'Expense Today' => 'Koszty dzisiaj',
		    'Income This Month' => 'Przychody w miesiącu',
		    'Expense This Month' => 'Koszty w miesiącu',
		    'Income n Expense' => 'Przychody i koszty',
		    'Net Worth n Account Balances' => 'Salda kont netto',
		    'Set Goal' => 'Ustaw cel',
		    'Income vs Expense' => 'Przychody kontra koszty',
		    'Latest Income' => 'Ostatnie przychody',
		    'Latest Expense' => 'Ostatnie koszty',
		    'Copyright' => 'Copyright',
		    'Contacts' => 'Kontakty',
		    'Message Should be between 5 to 1000 characters' => 'Wiadomość musi mieć między 5 a 1000 znaków',
		    'Deleted Successfully' => 'Usunięto',
		    'Invalid Email' => 'Błędny e-mail',
		    'Email already exist' => 'E-mail już istnieje',
		    'Invalid Phone' => 'Nieprawidłowy numer telefonu',
		    'Account Name is required' => 'Nazwa konta jest wymagana',
		    'Subject is Empty' => 'Temat jest pusty',
		    'Message is Empty' => 'Wiadomość jest pusta',
		    'Edit Contact' => 'Edytuj kontakt',
		    'Full Name' => 'Imię i Nazwisko',
		    'Email' => 'E-mail',
		    'Phone' => 'Telefon',
		    'Address' => 'Adres',
		    'City' => 'Miejscowość',
		    'State Region' => 'Województwo',
		    'ZIP Postal Code' => 'Kod pocztowy',
		    'Country' => 'Państwo',
		    'Select Country' => 'Wybierz państwo',
		    'Tags' => 'Tagi',
		    'Working' => 'Pracuję',
		    'are_you_sure' => 'Na pewno?',
		    'Set New Goal for Net Worth' => 'Ustaw nowy cel dla wartości netto',
		    'All Transactions at Date' => 'Wszystkie transakcje wg daty',
		    'Total Income' => 'Całkowity przychód',
		    'New Contact Added' => 'Dodano nowy kontakt',
		    'Contact Deleted Successfully' => 'Kontakt został usunięty pomyślnie',
		    'Invoice Deleted Successfully' => 'Faktura usunięta pomyślnie',
		    'Tag Deleted Successfully' => 'Tag został usunięty pomyślnie',
		    'TAX Deleted Successfully' => 'PODATEK usunięty pomyślnie',
		    'Login Successful' => 'Logowanie zakończone sukcesem',
		    'Invalid Username or Password' => 'Nieprawidłowa nazwa użytkownika lub hasło',
		    'Failed Login' => 'Logowanie nie powiodło się',
		    'Check your email to reset Password' => 'Sprawdź pocztę e-mail, aby zresetować hasło',
		    'User Not Found' => 'Użytkownik nie znaleziony',
		    'Invalid Password Reset Key' => 'Nieprawidłowy klucz resetowania hasła',
		    'Activity' => 'Czynność',
		    'Summary' => 'Summary',
		    'Custom Contact Fields' => 'Dodatkowe pola kontaktu',
		    'Account Title' => 'Tytuł konta',
		    'Initial Balance' => 'Saldo początkowe',
		    'Financial Balances' => 'Salda finansowe',
		    'More' => 'Więcej',
		    'Contact Notes' => 'Uwagi do kontaktu',
		    'Save' => 'Zapisz',
		    'Create Recurring Invoice' => 'Utwórz rachunek powtarzalny',
		    'Create New Invoice' => 'Nowy rachunek',
		    'Customer' => 'Klient',
		    'Select Contact' => 'Wybierz kontakt',
		    'Or Add New Customer' => 'lub dodaj nowego klienta',
		    'Invoice Prefix' => 'Prefix rachunku',
		    'Repeat Every' => 'Powtórz każdego',
		    'Week' => 'Tydzień',
		    'Weeks_2' => '2 tygodnie',
		    'Month' => 'Miesiąc',
		    'Months_2' => '2 miesiące',
		    'Months_3' => '3 miesiące',
		    'Months_6' => '6 miesiące',
		    'Year' => 'Rok',
		    'Years_2' => '2 lata',
		    'Years_3' => '3 lata',
		    'Invoice Date' => 'Data wystawienia',
		    'Payment Terms' => 'Regulamin płatności',
		    'Due On Receipt' => 'Pokwitowanie płatności',
		    'days_3' => '+3 dni',
		    'days_5' => '+5 dni',
		    'days_7' => '+7 dni',
		    'days_10' => '+10 dni',
		    'days_15' => '+15 dni',
		    'days_30' => '+30 dni',
		    'days_45' => '+45 dni',
		    'days_60' => '+60 dni',
		    'Sales TAX' => 'Podatek',
		    'None' => 'Nie',
		    'Discount' => 'Rabat',
		    'Set Discount' => 'Ustaw rabat',
		    'Item Code' => 'Kod elementu',
		    'Item Name' => 'Nazwa elementu',
		    'Qty' => 'Ilość',
		    'Price' => 'Cena',
		    'Add blank Line' => 'Dodaj pustą linię',
		    'Add Product OR Service' => 'Dodaj produkt lub usługę',
		    'Invoice Terms' => 'Regulamin rachunku',
		    'Save Invoice' => 'Zapisz rachunek',
		    'Sub Total' => 'Podsumowanie',
		    'TAX' => 'Podatek',
		    'TOTAL' => 'RAZEM',
		    'Due Date' => 'Data płatności',
		    'List Products' => 'Lista produktów',
		    'List Services' => 'Lista usług',
		    'Sales Price' => 'Cena sprzedaży',
		    'Item Number' => 'Numer elementu',
		    'Add TAX' => 'Dodaj podatek',
		    'Rate' => 'Kurs wymiany',
		    'Back To The List' => 'Wróć do listy',
		    'Add Activity' => 'odaj aktywność',
		    'Post' => 'Wyślij',
		    'Account Name' => 'Nazwa konta',
		    'Subject' => 'Temat',
		    'Send' => 'Wyślij',
		    'Onetime' => 'Jednorazowo',
		    'Unpaid' => 'Nieopłacony',
		    'Paid' => 'Opłacony',
		    'Cancelled' => 'Anulowany',
		    'Manage Recurring Invoices' => 'Rachunki powtarzalne',
		    'Add Invoice' => 'Dodaj rachunek',
		    'Upload Picture' => 'Wyślij zdjęcie',
		    'Use Gravatar' => 'Użyj Gravatar',
		    'No Image' => 'Brak zdjęcia',
		    'Picture' => 'Zdjęcie',
		    'Facebook Profile' => 'Profil Facebook',
		    'Google Plus Profile' => 'Profil Google Plus',
		    'Linkedin Profile' => 'Profil Linkedin',
		    'Accounting Summary' => 'Podsumowanie księgowe',
		    'Add Custom Field' => 'Dodaj pole dodatkowe',
		    'Field Name' => 'Nazwa pola',
		    'Field Type' => 'Typ pola',
		    'Text Box' => 'Boks tekstowy',
		    'Drop Down' => 'Rozwijalne',
		    'Text Area' => 'Obszar tekstowy',
		    'Optional Description help' => 'Opcjonalny opis będzie pokazany jako pomoc',
		    'Regular Expression Validation' => 'Ciąg sprawdzania poprawności wyrażenia regularnego',
		    'Comma Separated List' => 'Lista rozdzielana przecinkami tylko dla list rozwijanych',
		    'Show in View Invoice' => 'Pokazać w widoku rachunku?',
		    'Yes' => 'Tak',
		    'No' => 'Nie',
		    'Validation' => 'Walidacja',
		    'Select Options' => 'Wybierz opcje',
		    'Edit Custom Field' => 'Edycja pola dosatkowego',
		    'Application Name' => 'Nazwa aplikacji / nazwa firmy',
		    'This Name will be' => 'Ta nazwa będzie wyświetlana w tytule, prawach autorskich itp.',
		    'Theme' => 'Szablon',
		    'Style' => 'Styl',
		    'Pay To Address' => 'Adres odbiorcy',
		    'You can use html tag' => 'Możesz użyć znacznika html',
		    'Invoice Starting' => 'Rozpoczęcie faktury',
		    'Enter to set the next invoice' => 'Enter, aby ustawić następny numer faktury, musi być większy niż aktualna wartość automatycznego przyrostu',
		    'Keep Blank for' => 'Pozostaw puste, aby nie zmieniać',
		    'This will replace existing logo' => 'To zastąpi istniejące logo. Możesz również zmienić logo, zastępując plik',
		    'User Interface' => 'Interfejs użytkownika',
		    'Enable Page Loading Animation' => 'Włącz animację ładowania strony?',
		    'Enable RTL' => 'Włączyć RTL?',
		    'Logo' => 'Logo',
		    'Automation' => 'Automatyzacja',
		    'Security Token' => 'Token bezpieczeństwa',
		    'Re Generate Key' => 'Re edycja klucza',
		    'to_enable_automation' => 'Aby umożliwić uruchamianie funkcji automatyzacji, upewnij się, że skonfigurowałeś zadanie cron do uruchamiania raz dziennie. (np. 9:00).',
		    'Create the following Cron Job using GET' => 'Utwórz następującą pracę Cron za pomocą GET:',
		    'Or' => 'lub',
		    'Create the following Cron Job using PHP' => 'Utwórz następującą aplikację Cron przy użyciu PHP:',
		    'Create the following Cron Job using WGET' => 'Utwórz następujące Cron Job za pomocą WGET:',
		    'Generate Daily Accounting Snapshot' => 'Wygeneruj dzienne migawki rachunkowości',
		    'Generate Recurring Invoices' => 'Wygeneruj powtarzające się faktury',
		    'Enable Email Notifications' => 'Włącz powiadomienia e-mail',
		    'Save Changes' => 'Zapisz zmiany',
		    'Edit Categories' => 'Edytuj kategorie',
		    'Deleting Categories will' => 'Usunięcie kategorii spowoduje zmianę nazwy wszystkich transakcji w tej kategorii na Bez kategorii',
		    'Current Password' => 'Aktualne hasło',
		    'New Password' => 'Nowe hasło',
		    'Confirm New Password' => 'Potwierdź nowe hasło',
		    'INVOICE' => 'Rachunek',
		    'Total Amount' => 'Łączna kwota',
		    'Invoiced To' => 'Odbiorca',
		    'Item' => 'Przedmiot',
		    'Quantity' => 'Ilość',
		    'Related Transactions' => 'Powiązane transakcje',
		    'Download PDF' => 'Pobierz PDF',
		    'Printable Version' => 'Wersja do druku',
		    'Amount Due' => 'Do zapłaty',
		    'Pay Now' => 'Zapłać teraz',
		    'Add Deposit' => 'Dodaj depozyt',
		    'Choose an' => 'Wybierz',
		    'Advanced' => 'Zaawansowane',
		    'Choose Contact' => 'Wybierz kontakt',
		    'Select Payment Method' => 'Wybierz formę płatności',
		    'ref_example' => 'na przykład: Identyfikator transakcji, numer czeku',
		    'Recent Deposits' => 'Ostatnie wpłaty',
		    'Custom Fields' => 'Pola dodatkowe',
		    'Custom Fields Not Available' => 'Niestandardowe pola są niedostępne',
		    'Total Database Size' => 'Łączny rozmiar bazy danych',
		    'Download Database Backup' => 'Pobierz kopię zapasową bazy danych',
		    'Table Name' => 'Nazwa tabeli',
		    'Rows' => 'Rows',
		    'Size' => 'Rozmiar',
		    'Edit TAX' => 'Edytuj podatek',
		    'Active' => 'Aktywny',
		    'Inactive' => 'Nieaktywny',
		    'Send Email Using' => 'Wyślij wiadomość e-mail za pomocą',
		    'PHP mail Function' => 'PHP mail() Function',
		    'SMTP' => 'SMTP',
		    'System Email' => 'E-mail systemowy',
		    'All Outgoing Email Will' => 'Wszystkie wychodzące wiadomości e-mail będą wysyłane z tego adresu e-mail.',
		    'SMTP Host' => 'Host SMTP',
		    'SMTP Username' => 'Nazwa użytkownika SMTP',
		    'SMTP Password' => 'Hasło SMTP',
		    'SMTP Port' => 'Port SMTP',
		    'SMTP Secure' => 'Zabezpieczenie SMTP',
		    'TLS' => 'TLS',
		    'SSL' => 'SSL',
		    'Add Expense' => 'Dodaj wydatek',
		    'Choose an Account' => 'Wybierz konto',
		    'Recent Expense' => 'Niedawny wydatek',
		    'Manage Categories' => 'Zarządzaj kategoriami',
		    'drag_n_drop_help' => 'Przeciągnij i upuść przedmioty poniżej, aby zmienić pozycję. Kliknij aby edytowac.',
		    'Reset Password' => 'Zresetuj hasło',
		    'Back To Login' => 'Powrót do logowania',
		    'Email Address' => 'Adres e-mail',
		    'Related Emails' => 'Powiązane wiadomości e-mail',
		    'Invoice' => 'Rachunek',
		    'Send Email' => 'Wyślij E-mail',
		    'Invoice Created' => 'Rachunek został utworzony',
		    'Invoice Payment Reminder' => 'Przypomnienie o płatności',
		    'Invoice Overdue Notice' => 'Powiadomienie o przekroczeniu terminu',
		    'Invoice Payment Confirmation' => 'Potwierdzenie opłacenia',
		    'Invoice Refund Confirmation' => 'Potwierdzenie zwrotu',
		    'Mark As' => 'Oznacz jako',
		    'Partially Paid' => 'Płatność ratalna',
		    'Add Payment' => 'Dodaj płatność',
		    'Preview' => 'Podgląd',
		    'PDF' => 'PDF',
		    'View PDF' => 'Pokaż PDF',
		    'Print' => 'Drukuj',
		    'Subtotal' => 'Podsumowanie',
		    'Grand Total' => 'Razem',
		    'Search by Name' => 'Szukaj po nazwie',
		    'Search' => 'Szukaj',
		    'Add New Contact' => 'Nowy kontakt',
		    'Filter by Tags' => 'Filtruj po tagach',
		    'n_a' => 'Brak informacji',
		    'Records' => 'Rekordy',
		    'List Invoices' => 'Lista rachunków',
		    'Add Recurring Invoice' => 'Dodaj rachunek powtarzalny',
		    'Due' => 'Płatny',
		    'Next Invoice' => 'Następny rachunek',
		    'Stop Recurring' => 'Zatrzymaj powtarzalność',
		    'Add Tax' => 'Dodaj podatek',
		    'Tax Rate' => 'Wysokość podatku',
		    'Default Country' => 'Domyślne państwo',
		    'Date Format' => 'Format daty',
		    'Currency Format' => 'Format watuly',
		    'Currency Code' => 'Kod waluty',
		    'Keep it blank if currency code' => 'Pozostaw to pole puste, jeśli nie chcesz wyświetlać kodu waluty',
		    'Charset n Collation' => 'Charset i sortowanie',
		    'Set Charset n Collation' => 'Ustaw charset i sortowanie dla tabel bazy danych',
		    'Sign in' => 'Zaloguj się',
		    'Forgot password' => 'Zapomniałeś hasła ?',
		    'Edit Transaction' => 'Edycja transakcji',
		    'Add User' => 'Dodaj użytkownika',
		    'Access Level' => 'Poziom dostępu',
		    'Full Access' => 'Pełny dostęp',
		    'Loading Users' => 'Ładuję użytkowników',
		    'Add Payee' => 'Dodaj odbiorcę',
		    'Manage Payees' => 'Zarządzaj odbiorcami',
		    'Edit Payee' => 'Edytuj odbiorcę',
		    'Edit Payer' => 'Edytuj płatnika',
		    'Add Payer' => 'Dodaj płatnika',
		    'Manage Payers' => 'Zarządzaj płatnikami',
		    'Reorder Payment Gateways' => 'Zmień pozycję bramki',
		    'Gateway Name' => 'Nazwa bramki',
		    'Setting Name' => 'Nazwa ustawienia',
		    'Value' => 'Wartość',
		    'Reorder' => 'Zmiana pozycji',
		    'Positions' => 'Pozycja',
		    'Settings Name' => 'Nazwa ustawienia',
		    'Custom Param 1' => 'Custom Param 1',
		    'Conversion Rate' => 'Współczynnik konwersji',
		    'Custom Param 2' => 'Custom Param 2',
		    'Custom Param 3' => 'Custom Param 3',
		    'Custom Param 4' => 'Custom Param 4',
		    'Custom Param 5' => 'Custom Param 5',
		    'Add Payment Methods' => 'Dodaj metody płatności',
		    'Manage Payment Methods' => 'Zarządzaj metodami płatności',
		    'Edit Payment Methods' => 'Edytuj metody płatności',
		    'Click Here to Print' => 'Kliknij tutaj, aby wydrukować',
		    'Add Product' => 'Dodaj produkt',
		    'Add Service' => 'Dodaj usługę',
		    'List' => 'Lista',
		    'Expense Summary' => 'Podsumowanie kosztów',
		    'Total Expense This Month' => 'Całkowity koszt w tym miesiącu',
		    'Total Expense This Week' => 'Całkowity koszt w tym tygodniu',
		    'Total Expense Last 30 days' => 'Całkowity koszt w ostatnich 30 dniach',
		    'Last 20 deposit Expense' => 'Ostatnie 20 depozytów / wydatków',
		    'Dr.' => 'Dr.',
		    'Monthly Expense Graph' => 'Miesięczny wykres wydatków',
		    'Income Summary' => 'Podsumowanie dochodów',
		    'Total Income This Month' => 'Całkowity dochód w tym miesiącu',
		    'Total Income This Week' => 'Całkowity dochód w tym tygodniu',
		    'Total Income Last 30 days' => 'Całkowity dochód w ostatnich 30 dniach',
		    'Last 20 deposit Income' => 'Ostatnie 20 depozytów / dochodów',
		    'Monthly Income Graph' => 'Miesięczny wykres dochodów',
		    'Reports Income Vs Expense' => 'Raporty - Dochody vs Wydatki',
		    'Income minus Expense' => 'Dochód - wydatek',
		    'Income Vs Expense This Year' => 'Przychody vs wydatki w tym roku',
		    'View Statement' => 'Zobacz komunikat',
		    'From Date' => 'Od daty',
		    'To Date' => 'Do daty',
		    'Export for Print' => 'Eksportuj do druku',
		    'Export to PDF' => 'Eksportuj do pliku PDF',
		    'Tag' => 'Tag',
		    'New Transfer' => 'Nowy transfer',
		    'Recent Transfers' => 'Ostatnie transfery',
		    'Add New User' => 'Dodaj nowego użytkownika',
		    'User' => 'Użytkownik',
		    'Full Administrator' => 'Pełny administrator',
		    'Choose User Type' => 'Wybierz Typ użytkownika Pracownik, aby wyłączyć dostęp do ustawień',
		    'Confirm Password' => 'Potwierdź hasło',
		    'Edit User' => 'Edytuj użytkownika',
		    'Clear Old Data' => 'Usuń stare dane',
		    'UID' => 'UID',
		    'IP' => 'IP',
		    'ID' => 'ID',
		    'Total Email Sent' => 'Razem wysłano e-maili',
		    'Sent To' => 'Wysłane do',
		    'Back To Emails' => 'Powrót do wiadomości e-mail',
		    'Settings Saved Successfully' => 'Ustawienia zostały pomyślnie zapisane',
		    'New Goal has been set' => 'Nowy cel został ustawiony',
		    'Choose the Traget Account' => 'Wybierz konto docelowe',
		    'See All Activity' => 'Zobacz całą aktywność',
		    'Item Added Successfully' => 'Artykuł został dodany pomyślnie',
		    'Password changed successfully' => 'Hasło zostało zmienione, zaloguj się ponownie',
		    'Data Updated' => 'Dane zaktualizowane',
		    'Transaction Added Successfully' => 'Transakcja została dodana pomyślnie',
		    'Invalid Number' => 'Nieprawidłowy numer',
		    'Logs has been deleted' => 'Dzienniki starsze niż 30 dni zostały usunięte',
		    'Password Reset Key Expired' => 'Klucz resetowania hasła wygasł',
		    'Payment Cancelled' => 'Płatność anulowana',
		    'Custom Field Deleted Successfully' => 'Pole niestandardowe usunięte pomyślnie',
		    'Plugin Not Found' => 'Nie znaleziono wtyczki',
		    'You do not have permission' => 'Nie masz uprawnień dostępu do tej strony',
		    'disabled_in_demo' => 'Ta opcja jest wyłączona w trybie demonstracyjnym',
		    'All Fields are Required' => 'Wszystkie pola są wymagane',
		    'Invalid System Email' => 'Nieprawidłowy adres e-mail systemu',
		    'smtp_fields_error' => 'Nazwa użytkownika SMTP, hasło i port są wymagane',
		    'Charset Saved Successfully' => 'Zestaw znaków został pomyślnie zapisany',
		    'password_length_error' => 'Nowe hasło musi mieć od 6 do 14 znaków',
		    'Both Password should be same' => 'Oba hasła powinny być takie same',
		    'Incorrect Current Password' => 'Nieprawidłowe bieżące hasło',
		    'Invalid Logo File' => 'Nieprawidłowy plik logo',
		    'Invalid TAX Rate' => 'Nieprawidłowa stawka podatku',
		    'New TAX Added' => 'Dodano nowy podatek',
		    'TAX Not Found' => 'Podatku nie znaleziono',
		    'cron_new_key' => 'Wygenerowano nowy klucz. Upewnij się, że aktualizujesz CRON Jobs.',
		    'cron_notification' => 'Użyj prawidłowego adresu e-mail, aby włączyć powiadamianie',
		    'Select' => 'Wybierz',
		    'Close' => 'Zamknij',
		    'Update' => 'Aktualizuj',
		    'OK' => 'OK',
		    'Terms' => 'Warunki',
		    'PDF Font' => 'Czcionka PDF',
		    'pdf_font_help_default' => 'Domyślnie [Faster PDF Creation with Less Memory]',
		    'pdf_font_help_helvetica' => 'Helvetica',
		    'pdf_font_help_dejavusanscondensed' => 'dejavusanscondensed [Embed fonts with supports UTF8]',
		    'Invoice Total' => 'Wartość razem',
		    'Total Paid' => 'Łączna płatność',
		    'Unique Invoice URL' => 'Unikalny adres URL faktury',
		    'Company Name' => 'Nazwa firmy',
		    'ATTN' => 'ATTN',
		    'Payment Successful' => 'Płatność zakończona',
		    'Plugins' => 'Wtyczki',
		    'Installing Plugin' => 'Instalowanie wtyczki',
		    'Uninstalling Plugin' => 'Odinstalowywanie wtyczki',
		    'Activating Plugin' => 'Aktywacja wtyczki',
		    'Deactivating Plugin' => 'Dezaktywacja wtyczki',
		    'Deleting Plugin' => 'Usuwanie wtyczki',
		    'Upload Plugin' => 'Prześlij wtyczkę',
		    'Unzipping' => 'Rozpakuj',
		    'Plugin Added' => 'Dodano wtyczkę',
		    'No Plugins Available' => 'Brak dostępnych wtyczek',
		    'Quotes' => 'Oferty',
		    'Quote' => 'Oferta',
		    'Choose Features' => 'Wybierz narzędzie',
		    'Accounting' => 'Rachunkowość',
		    'Invoicing' => 'Fakturowanie',
		    'Enable Client Dashboard' => 'Włącz pulpit / portal klienta',
		    'quote_alias' => 'Utwórz nową ofertę / propozycję / kosztorys',
		    'Date Created' => 'Data utworzenia',
		    'Expiry Date' => 'Data ważności',
		    'Stage' => 'Etap',
		    'Draft' => 'Szkic',
		    'Delivered' => 'Dostarczono',
		    'Accepted' => 'Zaakceptowano',
		    'On Hold' => 'Wstrzymany',
		    'Lost' => 'Zaginiony',
		    'Dead' => 'Martwy',
		    'Reports by Category' => 'Raporty według kategorii',
		    'January' => 'Styczeń',
		    'February' => 'Luty',
		    'March' => 'Marzec',
		    'April' => 'Kwiecień',
		    'May' => 'Maj',
		    'June' => 'Czerwiec',
		    'July' => 'Lipiec',
		    'August' => 'Siepień',
		    'September' => 'Wrzesień',
		    'October' => 'Październik',
		    'November' => 'Listopad',
		    'December' => 'Grudzień',
		    'Discount Type' => 'Typ rabatu',
		    'Percentage' => 'Procent',
		    'Fixed Amount' => 'Kwota',
		    'Page' => 'Strona',
		    'of' => 'z',
		    'Loading' => 'Ładuję',
		    'Payment' => 'Płatność',
		    'Recipient' => 'Odbiorca',
		    'Proposal Text' => 'Tekst propozycji',
		    'quote_help_top' => 'Wyświetlane na górze oferty',
		    'quote_help_footer' => 'Wyświetlany jako stopka do oferty',
		    'Customer Notes' => 'Notatki dla Klienta',
		    'Save n Close' => 'Zapisz i zamknij',
		    'Quote Created' => 'Utworzono nową ofertę',
		    'Convert to Invoice' => 'Przekształć w rachunek',
		    'Quote Prefix' => 'Prefix oferty',
		    'quote_number_help' => 'Pozostaw puste, aby automatycznie generować numer oferty',
		    'invoice_number_help' => 'Pozostaw puste, aby automatycznie generować numer faktury',
		    'Public Key' => 'Klucz publiczny',
		    'Private Key' => 'Prywatny klucz',
		    'Default Account' => 'Domyślne konto',
		    'live or sandbox' => 'na żywo lub piaskownica',
		    'plugin_drop_help' => 'Upuść wtyczkę tutaj lub kliknij, aby przesłać',
		    'plugin_upload_help' => '(Prześlij plik zip wtyczki)',
		    'Admin' => 'Admin',
		    'Message Body' => 'Treść wiadomości',
		    'Invoice:Invoice Created' => 'Rachunek - Utworzono rachunek',
		    'Admin:Password Change Request' => 'Admin - Żądanie resetu hasła',
		    'Admin:New Password' => 'Admin - Nowe hasło',
		    'Invoice:Invoice Payment Reminder' => 'Rachunek - Przypomnienie o płatności',
		    'Invoice:Invoice Overdue Notice' => 'Rachunek - Przekroczenie terminu płatności',
		    'Invoice:Invoice Payment Confirmation' => 'Rachunek - Potwierdzenie wpłaty',
		    'Invoice:Invoice Refund Confirmation' => 'Rachunek - Zwrot środków',
		    'Quote:Quote Created' => 'Zapytanie - Utworzenie zapytania',
		    'Send Notifications To' => 'Wyślij powiadomienie do',
		    'No results found' => 'Brak danych',
		    'Quote Deleted Successfully' => 'Zapytanie zostało usunięte',
		    'Create New Quote' => 'Nowe zapytanie',
		    'notice_email_as_username' => 'Użyj prawidłowego adresu e-mail jako nazwy użytkownika',
		    'API' => 'API',
		    'API Access' => 'Dostęp API',
		    'Add API Access' => 'Nowy dostęp',
		    'Label' => 'Nazwa pola',
		    'API Key' => 'Klucz API',
		    'Regenerate' => 'Regeneruj',
		    'Application URL' => 'URL aplikacji',

		    'API Access Added' => 'Dodano dostęp do interfejsu API',
		    'select_a_contact' => 'Wybierz kontakt',
		    'at_least_one_item_required' => 'Przynajmniej jeden przedmiot jest wymagany',
		    'Subject is Required' => 'Temat jest wymagany',
		    'Unique Quote URL' => 'Unikalny adres URL oferty',
		    'Default Invoice Terms' => 'Domyślne warunki faktury',
		    'Additional Settings' => 'Dodatkowe ustawienia',
		    'cron_invoice_created' => 'CRON Job - Automatycznie wysyłaj fakturę Utworzono wiadomość e-mail',
		    'Invoice Creation Method' => 'Metoda tworzenia faktury',
		    'Default' => 'Domyślnie',
		    'V2' => 'V2',
		    'CRON Log' => 'CRON Log',
		    'Message' => 'Wiadomość',
		    'Recent Invoices' => 'Ostatnie faktury',
		    'About' => 'O',
		    'Or Install from URL' => 'Lub zainstaluj z adresu URL',
		    'Fold Sidebar Default' => 'Zwijany sidebar domyślnie?',
		    'Hide Footer Copyright' => 'Ukryć stopkę prawa autorskie?',
		    'Filter' => 'Filtr',
		    'Back' => 'Powrót',
		    'Account Number' => 'Numer konta',
		    'Contact Person' => 'Osoba kontaktowa',
		    'Internet Banking URL' => 'Adres URL bankowości internetowej',
		    'Cc' => 'Cc',
		    'Bcc' => 'Bcc',
		    'Mode' => 'Tryb',
		    'Live' => 'Na żywo',
		    'Sandbox' => 'Piaskownica',
		    'Drop CSV File Here' => 'Upuść plik CSV tutaj',
		    'Or Click to Upload' => 'Lub kliknij, aby przesłać',
		    'Importing' => 'Importowanie',
		    'Import Contacts' => 'Importuj kontakty',
		    'Download Sample File' => 'Pobierz przykładowy plik',
		    'Group' => 'Grupa',
		    'Groups' => 'Grupy',
		    'Add New Group' => 'Dodaj nową grupę',
		    'Group Name' => 'Nazwa grupy',
		    'Group Deleted Successfully' => 'Grupa została pomyślnie usunięta',
		    'Welcome Email' => 'Powitalny e-mail',
		    'Client:Client Signup Email' => 'E-mail z logowaniem Klienta',
		    'Send Client Signup Email' => 'Ustaw TAK aby wysłać klientowi powitalny e-mail.',
		    'Profile' => 'Profil',
		    'Download' => 'Pobierz',
		    'Legacy' => 'Legacy',
		    'New' => 'Nowy',
		    'Default Landing Page' => 'Domyślna strona docelowa',
		    'Admin Login' => 'Logowanie Admina',
		    'Client Login' => 'Logowanie klienta',
		    'Recent Quotes' => 'Ostatnie zapytania',
		    'Recent Transactions' => 'Ostatnie transakcje',
		    'URL Rewrite' => 'Przepisz adres URL',
		    'Currency Symbol' => 'Symbol waluty',
		    'Home Currency' => 'Waluta krajowa',
		    'Currency Symbol Position' => 'Pozycja symbolu waluty',
		    'Left' => 'Z lewej',
		    'Right' => 'Z prawej',
		    'Currency Decimal Digits' => 'Cyfry dziesiętne waluty',
		    'Thousand Separator Placement' => 'Umieszczenie separatora tysięcy',
		    'Or Cancel' => 'lub anuluj',
		    'Send Bcc to Admin' => 'Wysłać BBC do Admina? kliknij tutaj.',
		    'Attach PDF' => 'Dołączyć PDF?',
		    'Cash Flow' => 'Przepływ środków',
		    'Jan' => 'Sty',
		    'Feb' => 'Lut',
		    'Mar' => 'Mar',
		    'Apr' => 'Kwi',
		    'Jun' => 'Cze',
		    'Jul' => 'Lip',
		    'Aug' => 'Sie',
		    'Sep' => 'Wrz',
		    'Oct' => 'Paź',
		    'Nov' => 'Lis',
		    'Dec' => 'Gru',
		    'Last 12 Months' => 'Ostatnie 12 miesięcy',
		    'Data View' => 'Widok danych',
		    'Refresh' => 'Odśwież',
		    'Reset' => 'Resetuj',
		    'Save as Image' => 'Zapisz jako zdjęcie',
		    'Click to Save' => 'Kliknij aby zachować',
		    'Average' => 'Średnio',
		    'Line' => 'Liniowy',
		    'Bar' => 'Bar',
		    'Net Worth' => 'Wartość netto',
		    'Check for Update' => 'Sprawdź aktualizację',
		    'Response' => 'Odpowiedź',
		    'Site Key' => 'Klucz strony',
		    'Secret Key' => 'Klucz sekretny',
		    'Enable Recaptcha' => 'Włącz reCAPTCHA',
		    'Recaptcha' => 'reCAPTCHA',
		    'Recaptcha Verification Failed' => 'Pokaż, że jesteś człowiekiem.',
		    'Client Portal Custom Scripts' => 'Niestandardowe skrypty dla strony klienta',
		    'Header Scripts' => 'Skrypty w nagłówku',
		    'Footer Scripts' => 'Skrypty w stopce',
		    'Received' => 'Odebrane',
		    'System Status' => 'Status systemu',
		    'Application Environment' => 'Środowisko aplikacji',
		    'Server Environment' => 'Środowisko serwera',
		    'Integration Code' => 'Kod integracyjny',
		    'Client Registration' => 'Rejestracja klienta',
		    'Register' => 'Zarejestruj się',
		    'Notes' => 'Uwagi',
		    'Quick Notes' => 'Szybkie notatki',
		    'Whats on your mind' => 'Co masz na myśli?',
		    'Team' => 'Zespół',
		    'Last Activity' => 'Ostatnia aktywność',
		    'Content Animation' => 'Animacja treści',
		    'Appearance' => 'Wygląd',
		    'Customize' => 'Dostosuj',
		    'Editor' => 'Edytor',
		    'Language Editor' => 'Edytor języków',
		    'Themes' => 'Motywy',
		    'Select File to Edit' => 'Wybierz plik do edycji',
		    'File' => 'Plik',
		    'Language File' => 'Plik językowy',
		    'Invoice Layout Print' => 'Układ faktury: Drukuj',
		    'Invoice Layout PDF' => 'Układ faktur: PDF',
		    'Please Choose a File' => 'Wybierz plik',
		    'Profit' => 'Zarobek',
		    'Loss' => 'Strata',
		    'Revenue' => 'Dochód',
		    'Outstanding' => 'Zaległość',
		    'Payments' => 'Płatności',
		    'Transaction ID' => 'ID transakcji',
		    'Customers' => 'Klienci',
		    'Companies' => 'Firmy',
		    'Currencies' => 'Waluty',
		    'Permission' => 'Uprawnienie',
		    'Staff' => 'Zespół',
		    'Roles' => 'Role',
		    'New Role' => 'Nowa rola',
		    'Role name is required' => 'Nazwa roli jest wymagana',
		    'Tasks' => 'Zadania',
		    'Calendar' => 'Kalendarz',
		    'Leads' => 'Wskazówki',
		    'Orders' => 'zamówienia',
		    'Currency' => 'Waluta',
		    'New Currency' => 'Nowa waluta',
		    'Base Conversion Rate' => 'Bazowy współczynnik konwersji',
		    'Currency Example' => 'Kod ISO waluty, np. USD, GBP, PLN itd...',
		    'Make Base Currency' => 'Stwórz bazową walutę',
		    'Base Currency' => 'Bazowa walutay',
		    'New Company' => 'Nowa firma',
		    'URL' => 'URL',
		    'Logo URL' => 'URL logo',
		    'Company Name is required' => 'Nazwa firmy wymagana.',
		    'Event Name' => 'Nazwa zdarzenia',
		    'Priority' => 'Priorytet',
		    'Owner' => 'Właściciel',
		    'Start Date' => 'Data rozpoczęcia',
		    'End Date' => 'Data zakończenia',
		    'Start Time' => 'Czas startu',
		    'End Time' => 'Czas zakończenia',
		    'All day event' => 'Wszystkie dni zdarzenia',
		    'Related Contacts' => 'Powiązane kontakty',
		    'Add Event' => 'Dodaj wydarzenie',
		    'Color' => 'Kolor',
		    'Image' => 'Zdjęcie',
		    'Create' => 'Utwórz',
		    'Avatar' => 'Avatar',
		    'Attach File' => 'Dołącz plik',
		    'Drop File Here' => 'Upuść plik tutaj',
		    'Click to Upload' => 'lub kliknij aby wysłać',
		    'Import' => 'Import',
		    'Export' => 'Eksport',
		    'Phone number already exist' => 'Telefon już istnieje.',
		    'Favicon' => 'Favicon',
		    'Upload' => 'Wyślij',
		    'Remember me' => 'Utrzymuj mnie zalogowanego',
		    'Accept' => 'Akceptacja',
		    'Decline' => 'Odmowa',
		    'Terminal' => 'Terminal',
		    'Customers View Mode' => 'Tryb widoku użytkownika',
		    'Table' => 'Tabela',
		    'Card' => 'Karta',
		    'Your last login was' => 'Twoje ostatnie logowanie było',
		    'Documents' => 'Dokumenty',
		    'List All Orders' => 'Wyświetl wszystkie zamówienia',
		    'Add New Order' => 'Dodaj nowe zamówienie',
		    'Order' => 'Zamówienie',
		    'Product_Service' => 'Produkt / usługa',
		    'Billing Cycle' => 'Cykl rozliczeniowy',
		    'Free' => 'Za darmo',
		    'One Time' => 'Jeden raz',
		    'Semi-Annually' => 'Co pół roku',
		    'Annually' => 'Rocznie',
		    'Biennially' => 'Co dwa lata',
		    'Triennially' => 'Co trzy lata',
		    'Pending' => 'W oczekiwaniu',
		    'Generate Invoice' => 'Wygeneruj fakturę',
		    'Item Not Found' => 'Nie znaleziono elementu',
		    'Available Module for this Order' => 'Dostępny moduł dla tego zamówienia',
		    'Order Number' => 'Numer zamówienia',
		    'New Document' => 'Nowy dokument',
		    'Title' => 'Tytuł',
		    'Server Config' => 'Konfiguracja serwera',
		    'Upload Maximum Size' => 'Prześlij maksymalny rozmiar',
		    'POST Maximum Size' => 'Maksymalny rozmiar POST',
		    'Uploaded Successfully' => 'Przesłano pomyślnie',
		    'Secure Download Link' => 'Bezpieczny link do pobrania',
		    'Files' => 'Pliki',
		    'Assign File' => 'Przydziel plik',
		    'Activation Message' => 'Wiadomość aktywacyjna',
		    'Email Sent' => 'E-mail wysłany',
		    'Downloads' => 'Pliki do pobrania',
		    'Create Auto Login URL' => 'Utwórz automatyczny adres URL logowania',
		    'Created Successfully' => 'Utworzono pomyślnie',
		    'Auto Login URL' => 'Automatyczny adres URL logowania',
		    'Login As Customer' => 'Zaloguj się jako klient',
		    'Revoke Auto Login' => 'Odwołaj automatyczne logowanie',
		    'Re Generate URL' => 'Ponownie wygeneruj URL',
		    'Contact' => 'Kontakt',
		    'All' => 'Wszystko',
		    'Date Range' => 'Zakres dat',
		    'Available for all Customers' => 'Dostępne dla wszystkich klientów',
		    'Proof Of Payment' => 'Dowód wpłaty',
		    'My Orders' => 'Moje zamówienia',
		    'Place New Order' => 'Złóż nowe zamówienie',
		    'Cost Price' => 'Cena fabryczna',
		    'Inventory To Add Subtract' => 'Zapasy aby dodać / odjąć',
		    'Unit' => 'Jednostka',
		    'Units' => 'Jednostki',
		    'Units of measurement' => 'Jednostki miary',
		    'Create New' => 'Utwórz nowe',
		    'Reference' => 'Reference',
		    'Conversion Factor' => 'Współczynnik konwersji',
		    'SKU' => 'SKU',
		    'Weight' => 'Waga',
		    'Show quantity as' => 'Pokaż ilość jako',
		    'New Lead' => 'New Lead',
		    'Import Leads' => 'Importuj namiary',
		    'Source' => 'Źródło',
		    'Salutation' => 'Pozdrowienie',
		    'First Name' => 'Imię',
		    'Middle Name' => 'Drugie imię',
		    'Last Name' => 'Nazwisko',
		    'Industry' => 'Przemysł',
		    'No. of Employees' => 'Ilość pracowników',
		    'Public' => 'Publiczny',
		    'Company' => 'Firma',
		    'Street' => 'Ulica',
		    'Memo' => 'Memo',
		    'Convert to Customer' => 'Konwertuj na klienta',
		    'Buy Now' => 'Kup teraz',
		    'Store' => 'Sklep',
		    'Add to Cart' => 'Dodaj do koszyka',
		    'Copy' => 'Kopiuj',
		    'Unknown' => 'Nieznany',
		    'Access Log' => 'Dziennik dostępu',
		    'Browser' => 'Przeglądaj',
		    'Time' => 'Czas',
		    'Invoice Access Log' => 'Dziennik dostępu do faktury',
		    'Clone' => 'Klonuj',
		    'Cloned successfully' => 'Sklonowano pomyślnie',
		    'Media' => 'Media',
		    'Inventory' => 'Zapas',
		    'Available' => 'Dostępny',
		    'Published' => 'Opublikowany',
		    'No Data Available' => 'Brak dostępnych danych',
		    'Send SMS' => 'Wyślij SMS',
		    'Call' => 'Zadzwoń',
		    'Saved Successfully' => 'Zapisane pomyślnie',
		    'System' => 'System',
		    'Custom' => 'Custom',
		    'Choose from Template' => 'Wybierz z szablonu',
		    'Add New Template' => 'Dodaj nowy szablon',
		    'Assign to Group' => 'Przypisz do grupy',
		    'Select Group' => 'Wybierz grupę',
		    'Empty' => 'Pusty',
		    'Related To' => 'Związany z',
		    'Add New' => 'Dodaj nowy',
		    'Add Fund' => 'Dodaj fundusz',
		    'Back to Client Area' => 'Powrót do obszaru klienta',
		    'Manual Credit' => 'Kredyt ręczny',
		    'Log' => 'Log',
		    'Client' => 'Klient',
		    'All Data' => 'Wszystkie dane',
		    'Sales target' => 'Cel sprzedażowy',
		    'Invoice issued' => 'Wystawiono fakturę',
		    'Currency Exchange' => 'Wymiana walut',
		    'Select Currency' => 'Wybierz walutę',
		    'POS' => 'POS',
		    'Paying as' => 'Płacić jako',
		    'Total Invoice Amount' => 'Całkowita kwota faktury',
		    'Total Paid Amount' => 'Całkowita zapłacona kwota',
		    'Total Un Paid Amount' => 'Całkowita niezapłacona kwota',
		    'Purchase' => 'Zakup',
		    'Purchase Orders' => 'Zamówienia zakupu',
		    'Create Purchase Order' => 'Utwórz zamówienie zakupu',
		    'Items' => 'Items',
		    'Projects' => 'Projekty',
		    'Suppliers' => 'Dostawcy',
		    'Support' => 'Wsparcie',
		    'HRM' => 'HRM',
		    'Warehouse' => 'Magazyn',
		    'Maximum' => 'Maksimum',
		    'Minimum' => 'Minimum',
		    'Barcode' => 'Kod kreskowy',
		    'Total Item' => 'Całkowita pozycja',
		    'Add Item' => 'Dodaj przedmiot',
		    'Item Sold' => 'Przedmiot sprzedany',
		    'Total Invoice' => 'Całkowita faktura',
		    'Sales Count' => 'Liczba sprzedaży',
		    'Expense by Category' => 'Koszt według kategorii',
		    'Total Invoice Paid' => 'Total Invoice Paid',
		    'View Reports' => 'Wyświetl raporty',
		    'Add Supplier' => 'Dodaj dostawcę',
		    'List Suppliers' => 'Lista dostawców',
		    'Receipt' => 'Paragon',
		    'Invoices Vs Expense' => 'Faktury vs wydatki',
		    'Open New Ticket' => 'Otwórz nowe zgłoszenie',
		    'Tickets' => 'Zgłoszenia',
		    'Predefined Replies' => 'Predefiniowane odpowiedzi',
		    'Departments' => 'Departamenty',
		    'Open Ticket' => 'Otwarte zgłoszenie',
		    'Department' => 'Department',
		    'Knowledgebase' => 'Baza wiedzy',
		    'New Article' => 'Nowy artykuł',
		    'All Articles' => 'Wszystkie artykuły',
		    'New Purchase Order' => 'Nowe zamówienie',
		    'Expense Types' => 'Rodzaje wydatków',
		    'Receipt Number' => 'Numer paragonu',
		    'Supplier' => 'Dostawca',
		    'Enable Accounting' => 'Włącz rachunkowość',
		    'Enable Invoicing' => 'Włącz fakturowanie',
		    'Enable Quotes' => 'Enable Quotes',
		    'Tools' => 'Narzędzia',
		    'Make Payment' => 'Dokonaj płatności',
		    'Fax' => 'Faks',
		    'Business Number' => 'Numer służbowy',
		    'Issued at' => 'Wydana w',
		    'Make Default' => 'Domyślna',
		    'SMS' => 'SMS',
		    'Send Single SMS' => 'Wyślij pojedynczą wiadomość SMS',
		    'Send Bulk SMS' => 'Wyślij masowe SMS-y',
		    'Inbox' => 'Skrzynka odbiorcza',
		    'Sent' => 'Wysłane',
		    'SMS Templates' => 'Szablony SMS',
		    'Notifications' => 'Powiadomienia',
		    'SMS Drivers' => 'SMS Drivers',
		    'Quote Accepted' => 'Quote Accepted',
		    'Quote Cancelled' => 'Quote Cancelled',
		    'Profile Picture' => 'Zdjęcie profilowe',
		    'Show Watermark' => 'Pokaż znak wodny',
		    'already exist' => 'już istnieje',
		    'Show Country Flag' => 'Pokazać flagę kraju?',
		    'Password Manager' => 'Menedżer haseł',
		    'New Entry' => 'New Entry',
		    'Tax' => 'Podatek',
		    'Credit Card Information' => 'Informacje o karcie kredytowej',
		    'Daily' => 'Codziennie',
		    'Weeks_3' => '3 tygodnie',
		    'Weeks_4' => '4 tygodnie',
		    'optional' => 'opcjonalny',
		    'Dont have an account' => 'Nie masz konta?',
		    'Already registered' => 'Już zarejestrowany?',
		    'Low' => 'Low',
		    'High' => 'High',
		    'Medium' => 'Medium',
		    'Urgent' => 'Pilne',
		    'Recent Orders' => 'Ostatnie zamówienia',
		    'Transaction Details' => 'Szczegóły transakcji',
		    'Billing' => 'Dane do faktury',
		    'Apps' => 'Aplikacje',
		    'Uploads' => 'Przesłane',
		    'Uploaded at' => 'Przesłano w',
		    'Backup' => 'Kopia zapasowa',
		    'Database' => 'Baza danych',
		    'Backup now' => 'Utwórz teraz kopię zapasową',
		    'New document' => 'Nowy dokument',
		    'Purchases' => 'Zakupy',
		    'Assets' => 'Aktywa',
		    'Clear cache' => 'Wyczyść pamięć podręczną',
		    'Current balance' => 'Aktualne saldo',
		    'Return Fund' => 'Powróć fundusz',
		    'Autologin Successful' => 'Autologowanie zakończyło się pomyślnie',
		    'You do not have any Tickets' => 'Nie masz żadnych zgłoszeń',
		    'List Tickets' => 'Lista zgłoszeń',
		    'Updated' => 'Zaktualizowano',
		    'Open' => 'Otwarte',
		    'Closed' => 'Zamknięte',
		    'Escalated' => 'Escalated',
		    'Total Unpaid Amount' => 'Całkowita niezapłacona kwota',
		    'Developer' => 'Deweloper',
		    'Employees' => 'Pracownicy',
		    'Attendance' => 'Frekwencja',
		    'Payroll' => 'Lista płac',
		    'Support Ticket Departments' => 'Obsługa działów zgłoszenowych',
		    'Add New Department' => 'Dodaj nowy dział',
		    'Department Name' => 'Nazwa działu',
		    'Host' => 'Host',
		    'Remaining' => 'Pozostały',
		    'Length' => 'Length',
		    'Messages' => 'Wiadomości',
		    'Find Phone Number' => 'Znajdź numer telefonu',
		    'Search Contact' => 'Wyszukaj kontakt',
		    'An error occurred while sending email' => 'Wystąpił błąd podczas wysyłania wiadomości e-mail',
		    'Catalog' => 'Katalog',
		    'Your Cart is empty' => 'Twój koszyk jest pusty.',
		    'Shopping Cart' => 'Koszyk',
		    'Product' => 'Produkt',
		    'Proceed to checkout' => 'Przejdź do kasy',
		    'Unit price' => 'Cena jednostkowa',
		    'Ticket' => 'Zgłoszenie',
		    'Add Reply' => 'Dodaj odpowiedź',
		    'Weekly Statistics' => 'Statystyki tygodniowe',
		    'Total Invoice Generated' => 'Suma wygenerowanych faktur',
		    'Total Due' => 'Razem należne',
		    'Monthly Statistics' => 'Miesięczne statystyki',
		    'Categories' => 'Kategorie',
		    'Date purchased' => 'Data zakupu',
		    'Supported until' => 'Obsługiwane do',
		    'All categories' => 'Wszystkie kategorie',
		    'New category' => 'Nowa kategoria',
		    'Add an asset' => 'Dodaj zasób',
		    'Category Name' => 'Nazwa kategorii',
		    'Add an employee' => 'Dodaj pracownika',
		    'Hourly' => 'Co godzinę',
		    'Date Joined' => 'Data dołączenia',
		    'Job title' => 'Stanowisko',
		    'Twitter' => 'Twitter',
		    'Pay frequency' => 'Częstotliwość płatności',
		    'Mark Attendance' => 'Oznacz frekwencję',
		    'Note' => 'Uwaga',
		    'Present' => 'Obecny',
		    'Absent' => 'Nieobecny',
		    'Not processed' => 'Nieprzetworzony',
		    'Run payroll' => 'Uruchom listę płac',
		    'Super Admin' => 'Super Administrator',
		    'Workspaces' => 'Obszary robocze',
		    'Add Predefined Reply' => 'Dodaj wstępnie zdefiniowaną odpowiedź',
		    'Add New Article' => 'Dodaj nowy artykuł',
		    'Latest Articles' => 'Ostatnie artykuły',
		    'Not Started' => 'Nie rozpoczęte',
		    'In Progress' => 'W trakcie',
		    'Completed' => 'Zakończone',
		    'Deferred' => 'Odroczone',
		    'Waiting on someone else' => 'Czekam na kogoś innego',
		    'Plans' => 'Plany',
		    'Billing Period' => 'Okres rozliczeniowy',
	    ];


	    $not_translated = '';
        foreach ($english_strings as $key => $value)
        {
            if(isset($second_language[$key]))
            {
              //  echo '\''.$key.'\' => \''.$value.'\','.PHP_EOL;
              //  echo '\''.$key.'\' => \''.$second_language[$key].'\','.PHP_EOL;
	          //  $data[$key] = $value;
	           // echo $key.','.$value.PHP_EOL;
            }
            else{
	            echo '\''.$key.'\' => \''.$value.'\','.PHP_EOL;
	          //  $not_translated .= '\''.$key.'\' => \''.$value.'\','.PHP_EOL;
            }
        }




        break;

    case 'manual_translate':

        $strings = [

	        'Add' => 'Add',
	        'Monthly recurring revenue' => 'Monthly recurring revenue',
	        'Estimate monthly recurring revenue' => 'Estimate monthly recurring revenue',
	        'Total workspaces' => 'Total workspaces',
	        'Total users' => 'Total users',
	        'Latest users' => 'Latest users',
	        'Latest workspaces' => 'Latest workspaces',
	        'Welcome aboard' => 'Welcome aboard!',
	        'Previous' => 'Previous',
	        'Showing' => 'Showing',
	        'to' => 'to',
	        'entries' => 'entries',
	        'Showing 0 to 0 of 0 entries' => 'Showing 0 to 0 of 0 entries',
	        'Show' => 'Show',
	        'No data available in table' => 'No data available in table',
	        'Nothing found' => 'Nothing found',
	        'Default page' => 'Default page',
	        'Default landing page' => 'Default landing page',
	        'Redirect to another page' => 'Redirect to another page',
	        'Redirect to' => 'Redirect to',
	        'Trial ends at' => 'Trial ends at',
	        'Created at' => 'Created at',
	        'Subscribed' => 'Subscribed',
	        'Not subscribed' => 'Not subscribed',
	        'Trial expires soon' => 'Trial expires soon',
	        'Upgrade' => 'Upgrade',
	        'Invoice marked as paid' => 'Invoice marked as paid',
	        'Invoice not found' => 'Invoice not found',
	        'Invoice marked as unpaid' => 'Invoice marked as unpaid',
	        'Invoice marked as cancelled' => 'Invoice marked as cancelled',
	        'Invoice marked as partially paid' => 'Invoice marked as partially paid',
	        'Transaction added successfully' => 'Transaction added successfully',
	        'Department added successfully' => 'Department added successfully',
	        'Suspended successfully' => 'Suspended successfully',
	        'Un suspended successfully' => 'Un suspended successfully',
	        'Suspend' => 'Suspend',
	        'Un suspend' => 'Un suspend',
	        'Workspace' => 'Workspace',
	        'Billing period' => 'Billing period',
	        'Add plan' => 'Add plan',
	        'Price per user' => 'Price per user',
	        'Plan type' => 'Plan type',
	        'Plan name' => 'Plan name',
	        'Or Choose from contact' => 'Or Choose from contact',
	        'Select all' => 'Select all',
	        'De select all' => 'De select all',
	        'Support ticket departments' => 'Support ticket departments',
	        'Add new department' => 'Add new department',
	        'Reorder departments' => 'Reorder departments',
	        'Upload transparent png image' => 'Upload transparent png image',
	        'Inverse' => 'Inverse',
	        'Optional' => 'Optional',
	        'Business location' => 'Business location',
	        'Tax system' => 'Tax system',
	        'Other settings' => 'Other settings',
	        'view all data or only self created data' => 'view all data or only self created data',
	        'Contracts' => 'Contracts',
	        'Workspace not found' => 'Workspace not found',
	        'Workspace is suspended' => 'Workspace is suspended',
	        'Calendar first day' => 'Calendar first day',
	        'Sunday' => 'Sunday',
	        'Monday' => 'Monday',
	        'Tuesday' => 'Tuesday',
	        'Wednesday' => 'Wednesday',
	        'Thursday' => 'Thursday',
	        'Friday' => 'Friday',
	        'Saturday' => 'Saturday',
	        'Subscribe' => 'Subscribe',
	        'Choose plan' => 'Choose plan',
	        'Billing history' => 'Billing history',
	        'Trial' => 'Trial',
	        'Current plan' => 'Current plan',
	        'Plan' => 'Plan',
        ];

        foreach ($strings as $key => $value)
        {
            echo $value.PHP_EOL;
        }

       // exit;

        $result = 'Dodaj
Miesięczne przychody cykliczne
Oszacuj miesięczne dochody cykliczne
Łączne obszary robocze
Wszystkich użytkowników
Ostatni użytkownicy
Najnowsze obszary robocze
Witamy na pokładzie!
Poprzedni
Seans
do
wpisy
Wyświetlane od 0 do 0 z 0 pozycji
Pokazać
dane niedostępne w tabeli
Nic nie znaleziono
Strona domyślna
Domyślna strona docelowa
Przekieruj do innej strony
Przekierować do
Trial kończy się o
Utworzono w
Subskrybujesz
Nie subskrybowany
Trial wkrótce wygaśnie
Aktualizacja
Faktura oznaczona jako płatna
Nie znaleziono faktury
Faktura oznaczona jako nieopłacona
Faktura oznaczona jako anulowana
Faktura oznaczona jako częściowo opłacona
Transakcja została dodana pomyślnie
Dział został pomyślnie dodany
Zawieszony pomyślnie
Un zawieszone pomyślnie
Zawieszać
Un suspend
Obszar roboczy
Okres rozliczeniowy
Dodaj plan
Cena za użytkownika
Typ planu
Nazwa planu
Lub Wybierz z kontaktu
Zaznacz wszystko
Odznacz wszystkie
Obsługuj działy biletowe
Dodaj nowy dział
Zmień kolejność działów
Prześlij przezroczysty obraz png
Odwrotność
Opcjonalny
Lokalizacja Biznesu
System podatkowy
Inne ustawienia
przeglądaj wszystkie dane lub tylko własne dane
Kontrakty
Nie znaleziono obszaru roboczego
Workspace jest zawieszony
Kalendarz pierwszego dnia
niedziela
poniedziałek
wtorek
środa
czwartek
piątek
sobota
Subskrybować
Wybierz plan
Historia płatności
Próba
Obecny plan
Plan';

        $result = explode(PHP_EOL,$result);

        echo '------------'.PHP_EOL.PHP_EOL;
        $i = 0;
        foreach ($strings as $key => $value)
        {
            echo '\''.$key.'\' => \''.$result[$i].'\','.PHP_EOL;
            $i++;
        }

        break;




    case 'convert':


        $_L = null;

        $_L = [];

        $_L['Login'] = 'Entrar';
        $_L['Edit'] = 'Editar';
        $_L['Delete'] = 'Apagar';
        $_L['Account'] = 'Conta';
        $_L['Date'] = 'Data';
        $_L['Financial_Balances'] = 'Balan&ccedil;o das contas';
        $_L['Add_New_Account'] = 'Nova Conta';
        $_L['Manage_Accounts'] = 'Gerenciar Contas';
        $_L['initial_balance'] = 'Saldo inicial';
        $_L['account_created_successfully'] = 'Conta criada com sucesso';
        $_L['account_updated_successfully'] = 'Conta atualizada com sucesso';
        $_L['account_already_exist'] = 'Conta j&aacute; existe';
        $_L['system'] = 'Sistema';
        $_L['Total'] = 'Total';
        $_L['Account_Not_Found'] = 'Conta n&atilde;o encontrada';
        $_L['ref_help'] = 'ex. C&oacute;digo, n&uacute;mero do cheque';
        $_L['amount_error'] = 'Valor inv&aacute;lido';
        $_L['Cleared'] = 'Cancelado';
        $_L['Uncleared'] = 'Pendente';
        $_L['Reconciled'] = 'Renegociado';
        $_L['Void'] = 'Vazio';
        $_L['Add_Deposit'] = 'Recebimentos / Dep&oacute;sitos';
        $_L['Amount'] = 'Quantia';
        $_L['Payer'] = 'Cliente';
        $_L['Category'] = 'Categoria';
        $_L['Payment Method'] = 'Meios de pagamento';
        $_L['Ref'] = 'Ref';
        $_L['Status'] = 'Situa&ccedil;&atilde;o';
        $_L['Uncategorized'] = 'Sem categoria';
        $_L['transaction_added_successfully'] = 'Transa&ccedil;&atilde;o realizada com sucesso';
        $_L['Add_Expense'] = 'Pagamentos / Saques';
        $_L['Payee'] = 'Fornecedor';
        $_L['description_error'] = 'Descri&ccedil;&atilde;o incorreta';
        $_L['Transfer'] = 'Transfer&ecirc;ncia';
        $_L['From'] = 'De';
        $_L['To'] = 'Para';
        $_L['Select An Account'] = 'Selecione uma conta';
        $_L['same_account_error'] = 'Imposs&iacute;vel transferir para a mesma conta';
        $_L['Transaction_Not_Found'] = 'Transa&ccedil;&atilde;o n&atilde;o encontrada';
        $_L['transaction_delete_successful'] = 'Transa&ccedil;&atilde;o apagada com sucesso';
        $_L['account_delete_successful'] = 'Conta apagada com sucesso';
        $_L['transaction_update_successful'] = 'Transa&ccedil;&atilde;o atualizada com sucesso';
        $_L['Number_of_Payment'] = 'N&uacute;mero do pagamento';
        $_L['Frequency'] = 'Frequ&ecirc;ncia';
        $_L['Monthly'] = 'Mensal';
        $_L['Weekly'] = 'Semanal';
        $_L['Bi_Weekly'] = 'Quinzenal';
        $_L['Everyday'] = 'Di&aacute;rio';
        $_L['Every_30_Days'] = 'Cada 30 dias';
        $_L['Every_2_Month'] = 'Bimestral';
        $_L['Quarterly'] = 'Trimestral';
        $_L['Every_6_Month'] = 'Semestral';
        $_L['Yearly'] = 'Anual';
        $_L['Once_Only'] = '&uacute;nica';
        $_L['Edit_Option'] = 'Editar op&ccedil;&otilde;es';
        $_L['Edit_Single_Occurrence'] = 'Editar ocorr&ecirc;ncia &uacute;nica';
        $_L['Delete_Single_Occurrence'] = 'Apagar ocorr&ecirc;ncia &uacute;nica';
        $_L['Edit_All_Occurrence'] = 'Editar todas ocorr&ecirc;ncias';
        $_L['Delete_All_Occurrence'] = 'Apagar todas ocorr&ecirc;ncias';
        $_L['Manage'] = 'Gerenciar';
        $_L['Confirm'] = 'Confirmar';
        $_L['Enter_Transaction'] = 'Informar transa&ccedil;&atilde;o';
        $_L['Payment_Cleared'] = 'Pagamento cancelado';
        $_L['an_error_occured'] = 'Ocorreu um erro';
        $_L['name_exist_error'] = 'Nome j&aacute; existe';
        $_L['account_title_length_error'] = 'O nome da conta deve conter de 3 a 100 caracteres';
        $_L['tr_delete_warning'] = 'Opera&ccedil;&atilde;o de exclus&atilde;o n&atilde;o pode ser desfeita. Saldo atual das conta associadas ser&atilde;o ajustadas. ';
        $_L['frequency_error'] = 'Frequ&ecirc;ncia ou n&uacute;mero de pagamento inv&aacute;lido';
        $_L['name_error'] = 'Nome obrigat&oacute;rio';
        $_L['edit_successful'] = 'Editado com sucesso';
        $_L['added_successful'] = 'Adicionado com sucesso';
        $_L['delete_successful'] = 'Apagado com sucesso';
        $_L['Name'] = 'Nome';
        $_L['Account_Title'] = 'Nome da conta';
        $_L['Edit_Account'] = 'Editar conta';
        $_L['Description'] = 'Descri&ccedil;&atilde;o';
        $_L['Submit'] = 'Enviar';
        $_L['Transaction'] = 'Transa&ccedil;&atilde;o';
        $_L['Add_Repeating_Income'] = 'Adicionar recebimentos recorrente';
        $_L['Repeating_Income'] = 'Repetindo receita';
        $_L['Repeating_Expense'] = 'Repetindo despesa';
        $_L['Add_Repeating_Expense'] = 'Adicionar pagamentos recorrente';
        $_L['frequency_help'] = 'Ex. Se voc&ecirc; optar por frequ&ecirc;ncia mensal, voc&ecirc; pode colocar o n&uacute;mero de pagamento 12. Isso vai repetir transa&ccedil;&atilde;o para os pr&oacute;ximos 12 meses.';
        $_L['Welcome'] = 'Bem-vindo';
        $_L['Type'] = 'Tipo';
        $_L['View'] = 'Ver';
        $_L['Income'] = 'Receita';
        $_L['Expense'] = 'Despesa';
        $_L['Credit'] = 'Cr&eacute;dito';
        $_L['Debit'] = 'D&eacute;bito';
        $_L['Cancel'] = 'Cancelar';
        $_L['Password'] = 'Senha';
        $_L['Dr'] = 'Deb';
        $_L['Cr'] = 'Crd';
        $_L['Method'] = 'M&eacute;todo';
        $_L['Toggle_navigation'] = 'Alternar navaga&ccedil;&atilde;o';
        $_L['MoneyFlow'] = 'Sistema';
        $_L['Dashboard'] = 'Painel';
        $_L['Accounts'] = 'Contas';
        $_L['Account_Balances'] = 'Balan&ccedil;o das contas';
        $_L['Ad_An_Account'] = 'Adicionar uma conta';
        $_L['Transactions'] = 'Transa&ccedil;&otilde;es';
        $_L['View_Transactions'] = 'Ver transa&ccedil;&otilde;es';
        $_L['Recurring'] = 'Recorrente';
        $_L['Income_Calendar'] = 'Calend&aacute;rio de recebimentos';
        $_L['Expense_Calendar'] = 'Calend&aacute;rio de pagamentos';
        $_L['Reports'] = 'Relat&oacute;rios';
        $_L['Account_Statement'] = 'Extrato da conta';
        $_L['Reports_by_Date'] = 'Relat&oacute;rios por data';
        $_L['Income_Reports'] = 'Relat&oacute;rios de recebimentos';
        $_L['Expense_Reports'] = 'Relat&oacute;rios de pagamentos';
        $_L['Income_Vs_Expense'] = 'Recebimento X Pagamento';
        $_L['Settings'] = 'Configura&ccedil;&otilde;es';
        $_L['Expense_Categories'] = 'Categorias de despesas';
        $_L['Income_Categories'] = 'Categorias de receitas';
        $_L['Payees'] = 'Fornecedores';
        $_L['Payers'] = 'Clientes';
        $_L['Payment_Methods'] = 'Formas de pagamento';
        $_L['Users'] = 'Usu&aacute;rios';
        $_L['Application_Settings'] = 'Configura&ccedil;&otilde;es do aplicativo';
        $_L['My_Account'] = 'Minha conta';
        $_L['Edit_Profile'] = 'Editar perfil';
        $_L['Change_Password'] = 'Mudar senha';
        $_L['Logout'] = 'Sair';
        $_L['Income_Today'] = 'Receitas de hoje';
        $_L['Expense_Today'] = 'Despesas de hoje';
        $_L['Income_This_Month'] = 'Receitas do m&ecirc;s';
        $_L['Expense_This_Month'] = 'Despesas do m&ecirc;s';
        $_L['Latest_5_Income'] = '&Uacute;ltimos 5 recebimentos';
        $_L['Latest_5_Expense'] = '&Uacute;ltimos 5 pagamentos';
        $_L['Income_Graph_This_Year'] = 'Gr&aacute;fico de recebimentos deste ano';
        $_L['Expense_Graph_This_Year'] = 'Gr&aacute;fico de pagamentos deste ano';
        $_L['Balance'] = 'Balan&ccedil;o';
        $_L['Next'] = 'Pr&oacute;ximo';
        $_L['Last'] = '&Uacute;ltimo';
        $_L['Latest_Expense'] = '&Uacute;ltimas despesas';
        $_L['Budgets'] = 'Or&ccedil;amentos';
        $_L['View_Budgets'] = 'Ver or&ccedil;amentos';
        $_L['Set_Budgets'] = 'Definir or&ccedil;amentos';
        $_L['Add_Payment_Method'] = 'Adicionar m&eacute;todo de pagamento';
        $_L['Manage_Payment_Methods'] = 'Gerenciar m&eacute;todos de pagamento';
        $_L['drag_drop_edit'] = 'Arrastar e soltar os itens abaixo para reposicionamento. Clique em Editar.';
        $_L['Manage_Categories'] = 'Gerenciar categorias';
        $_L['Manage_Payees'] = 'Gerenciar favorecidos';
        $_L['Add_Payee'] = 'Adicionar favorecido';
        $_L['Add_Payer'] = 'Adicionar pagador';
        $_L['Manage_Payers'] = 'Gerenciar pagadores';
        $_L['Reports_Categories'] = 'Relat&oacute;rios por categorias';
        $_L['Reports_Payees'] = 'Relat&oacute;rios por favorecidos';
        $_L['Reports_Payers'] = 'Relat&oacute;rios por pagadores';
        $_L['App_Name'] = 'Nome do aplicativo / Nome da empresa';
        $_L['App_Name_Help_Text'] = 'Esse nome ser&aacute; exibido no t&iacute;tulo';
        $_L['Dark'] = 'Escuro';
        $_L['Blue'] = 'Azul';
        $_L['Timezone'] = 'Fuso hor&aacute;rio';
        $_L['Decimal_Point'] = 'Ponto Decimal';
        $_L['Thousands_Separator'] = 'Separador de milhares';
        $_L['Currency_Code'] = 'C&oacute;digo de moeda';
        $_L['Edit_Categories'] = 'Editar categorias';
        $_L['cat_del_help_txt'] = 'Excluir categoria ir&aacute; renomear todas as opera&ccedil;&otilde;es desta categoria para &quot;Sem categoria&quot; ';
        $_L['Current_Password'] = 'Senha atual';
        $_L['New_Password'] = 'Nova senha';
        $_L['Confirm_New_Password'] = 'Confirme a nova senha';
        $_L['Edit_Payee'] = 'Editar fornecedor';
        $_L['Edit_Payer'] = 'Editar cliente';
        $_L['Edit_Payment_Methods'] = 'Editar formas de pagamento';
        $_L['Statement'] = 'Demonstra&ccedil;&atilde;o';
        $_L['Total_Income'] = 'Total de receitas';
        $_L['Total_Expense'] = 'Total de despesas';
        $_L['All_Transactions_at_Date'] = 'Todas as transa&ccedil;&otilde;es na data';
        $_L['Income_Summary'] = 'Resumo de rendimentos';
        $_L['Total_Income_This_Month'] = 'Rendimentos do m&ecirc;s';
        $_L['Total_Income_This_Week'] = 'Rendimentos da semana';
        $_L['Total_Income_Last_30_days'] = 'Renda total dos &uacute;ltimos 30 dias';
        $_L['Last_20_deposit_Income'] = '&Uacute;ltimos 20 rendimentos';
        $_L['Monthly_Income_Graph'] = 'Gr&aacute;fico de rendimento mensal';
        $_L['Expense_Summary'] = 'Resumo de despesas';
        $_L['Total Expense'] = 'Total de despesas';
        $_L['Total_Expense_This_Month'] = 'Despesas do m&ecirc;s';
        $_L['Total_Expense_This_Week'] = 'Despesas da semana';
        $_L['Total_Expense_Last_30_days'] = 'Despesa total dos &uacute;ltimos 30 dias';
        $_L['Last_20_Expense'] = '&Uacute;ltimas 20 despesas';
        $_L['Monthly_Expense_Graph'] = 'Gr&aacute;fico de pagamento mensal';
        $_L['Income_Vs_Expense_This_Year'] = 'Renda X Despesa este ano';
        $_L['View_Statement'] = 'Ver demonstrativo';
        $_L['All_Transactions'] = 'Todas transa&ccedil;&otilde;es';
        $_L['Select_Payer'] = 'Selecionar pagador';
        $_L['From_Date'] = 'Data inicial';
        $_L['To_Date'] = 'Data final';
        $_L['Select_Payee'] = 'Selecionar fornecedor';
        $_L['Export_for_Print'] = 'Exportar para impressora';
        $_L['Export_to_PDF'] = 'Exportar para PDF';
        $_L['Manage_Users'] = 'Gerenciar usu&aacute;rios';
        $_L['Add_New_User'] = 'Adicionar novo usu&aacute;rios';
        $_L['Username'] = 'Nome de usu&aacute;rio';
        $_L['Full_Name'] = 'Nome completo';
        $_L['user_type_help'] = 'Escolha o tipo de usu&aacute;rio &quot;Empregado&quot; para impossibilitar o acesso &agrave;s configura&ccedil;&otilde;es';
        $_L['Confirm_Password'] = 'Confirmar senha';
        $_L['User_Type'] = 'Tipos de usu&aacute;rio';
        $_L['Full_Administrator'] = 'Administrador completo';
        $_L['Employee'] = 'Empregado';
        $_L['password_change_help'] = 'Mantenha em branco para n&atilde;o alterar senha';
        $_L['Edit_User'] = 'Editar usu&aacute;rio';
        $_L['currency_help'] = 'Mantenha-o em branco se voc&ecirc; n&atilde;o quiser mostrar c&oacute;digo de moeda';
        $_L['Theme_Style'] = 'Estilo do tema';
        $_L['Theme_Color'] = 'Cor do tema';
        $_L['Default_Language'] = 'Idioma padr&atilde;o';
        $_L['CRM'] = 'Contatos';
        $_L['Add Contact'] = 'Adicionar contato';
        $_L['Add Customer'] = 'Adicionar cliente';
        $_L['List Contacts'] = 'Listar contatos';
        $_L['List Customers'] = 'Lista de clientes';
        $_L['New Deposit'] = 'Cr&eacute;ditos';
        $_L['New Expense'] = 'D&eacute;bitos';
        $_L['View Transactions'] = 'Ver transa&ccedil;&otilde;es';
        $_L['Balance Sheet'] = 'Balan&ccedil;o';
        $_L['Sales'] = 'Vendas';
        $_L['Invoices'] = 'Faturas';
        $_L['New Invoice'] = 'Nova fatura';
        $_L['Recurring Invoices'] = 'Faturas recorrentes';
        $_L['New Recurring Invoice'] = 'Nova fatura recorrente';
        $_L['Bank n Cash'] = 'Contas';
        $_L['New Account'] = 'Nova conta';
        $_L['List Accounts'] = 'Listar contas';
        $_L['Products n Services'] = 'Produtos & Servi&ccedil;os';
        $_L['Products'] = 'Produtos';
        $_L['New Product'] = 'Novo Produto';
        $_L['Services'] = 'Servi&ccedil;os';
        $_L['New Service'] = 'Novo servi&ccedil;o';
        $_L['Account Statement'] = 'Extrato da conta';
        $_L['Reports by Date'] = 'Relat&oacute;rio di&aacute;rio';
        $_L['Income Reports'] = 'Relat&oacute;rio das receitas';
        $_L['Expense Reports'] = 'Relat&oacute;rio das despesas';
        $_L['Income Vs Expense'] = 'Receita X Despesa';
        $_L['All Income'] = 'Todas receitas';
        $_L['All Expense'] = 'Todas despesas';
        $_L['All Transactions'] = 'Todas transa&ccedil;&otilde;es';
        $_L['Utilities'] = 'Utilit&aacute;rios';
        $_L['Activity Log'] = 'Log de atividades';
        $_L['Email Message Log'] = 'Log de e-mails';
        $_L['Database Status'] = 'Situa&ccedil;&atilde;o da base';
        $_L['My Account'] = 'Minha conta';
        $_L['Edit Profile'] = 'Editar perfil';
        $_L['Change Password'] = 'Mudar senha';
        $_L['General Settings'] = 'Configura&ccedil;&otilde;es gerais';
        $_L['Localisation'] = 'Localiza&ccedil;&atilde;o';
        $_L['Manage Users'] = 'Gerenciar usu&aacute;rios';
        $_L['Payment Gateways'] = 'Gateways de pagamento';
        $_L['Expense Categories'] = 'Categorias de despesa';
        $_L['Income Categories'] = 'Categorias de receita';
        $_L['Manage Tags'] = 'Gerenciar Tags';
        $_L['Payment Methods'] = 'Meios de pagamento';
        $_L['Sales Taxes'] = 'Taxa de venda';
        $_L['Email Settings'] = 'Configurar e-mail';
        $_L['Email Templates'] = 'Modelos de e-mail';
        $_L['Automation Settings'] = 'Configurar automa&ccedil;&atilde;o';
        $_L['Please Wait'] = 'Por favor espere';
        $_L['Search Customers'] = 'Procurar contato';
        $_L['Income Today'] = 'Receitas de hoje';
        $_L['Expense Today'] = 'Despesas de hoje';
        $_L['Income This Month'] = 'Receitas do m&ecirc;s';
        $_L['Expense This Month'] = 'Despesas do m&ecirc;s';
        $_L['Income n Expense'] = 'Recebimentos & Pagamentos';
        $_L['Net Worth n Account Balances'] = 'Patrim&ocirc;nio l&iacute;quido & Saldos de Conta';
        $_L['Set Goal'] = 'Definir meta';
        $_L['Income vs Expense'] = 'Receita X Despesa';
        $_L['Latest Income'] = '&Uacute;ltimos recebimentos';
        $_L['Latest Expense'] = '&Uacute;ltimos pagamentos';
        $_L['Copyright'] = 'Copyright';
        $_L['Contacts'] = 'Contatos';
        $_L['Message Should be between 5 to 1000 characters'] = 'A mensagem precisa conter de 5 a 1000 caracteres';
        $_L['Deleted Successfully'] = 'Apagado com sucesso';
        $_L['Invalid Email'] = 'E-mail incorreto';
        $_L['Email already exist'] = 'E-mail j&aacute; existe';
        $_L['Invalid Phone'] = 'Telefone incorreto';
        $_L['Account Name is required'] = 'Preencha o nome da conta';
        $_L['Subject is Empty'] = 'Preencha o assunto';
        $_L['Message is Empty'] = 'Preencha a mensagem';
        $_L['Edit Contact'] = 'Editar contato';
        $_L['Full Name'] = 'Nome completo';
        $_L['Email'] = 'E-mail';
        $_L['Phone'] = 'Telefone';
        $_L['Address'] = 'Endere&ccedil;o';
        $_L['City'] = 'Cidade';
        $_L['State Region'] = 'Estado';
        $_L['ZIP Postal Code'] = 'CEP';
        $_L['Country'] = 'Pa&iacute;s';
        $_L['Select Country'] = 'Selecione o pa&iacute;s';
        $_L['Tags'] = 'Tags';
        $_L['Working'] = 'Processando';
        $_L['are_you_sure'] = 'Tem certeza disso?';
        $_L['Set New Goal for Net Worth'] = 'Definir nova meta para o patrim&ocirc;nio l&iacute;quido';
        $_L['All Transactions at Date'] = 'Todas as transa&ccedil;&otilde;es at&eacute; a data';
        $_L['Total Income'] = 'Total de receitas';
        $_L['New Contact Added'] = 'Novo contato adicionado';
        $_L['Contact Deleted Successfully'] = 'Contato removido com sucesso';
        $_L['Invoice Deleted Successfully'] = 'Fatura removida com sucesso';
        $_L['Tag Deleted Successfully'] = 'Tag removida com sucesso';
        $_L['TAX Deleted Successfully'] = 'Taxa removida com sucesso';
        $_L['Login Successful'] = 'Autenticado com sucesso';
        $_L['Invalid Username or Password'] = 'Nome de usu&aacute;rio ou senha inv&aacute;lida';
        $_L['Failed Login'] = 'Falha na autentica&ccedil;&atilde;o';
        $_L['Check your email to reset Password'] = 'Verifique seu e-mail para alterar sua senha';
        $_L['User Not Found'] = 'Usu&aacute;rio n&atilde;o encontrado';
        $_L['Invalid Password Reset Key'] = 'Chave de altera&ccedil;&atilde;o de senha inv&aacute;lida';
        $_L['Activity'] = 'Atividades';
        $_L['Summary'] = 'Resumo';
        $_L['Custom Contact Fields'] = 'Campos personalizados';
        $_L['Account Title'] = 'T&iacute;tulo da conta';
        $_L['Initial Balance'] = 'Saldo inicial';
        $_L['Financial Balances'] = 'Saldo cont&aacute;bil';
        $_L['More'] = 'Extras';
        $_L['Contact Notes'] = 'Observa&ccedil;&otilde;es';
        $_L['Save'] = 'Salvar';
        $_L['Create Recurring Invoice'] = 'Criar fatura recorrente';
        $_L['Create New Invoice'] = 'Criar nova fatura';
        $_L['Customer'] = 'Cliente';
        $_L['Select Contact'] = 'Escolha um contato';
        $_L['Or Add New Customer'] = 'ou adicione um novo cliente';
        $_L['Invoice Prefix'] = 'Prefixo';
        $_L['Repeat Every'] = 'Repetir a cada';
        $_L['Week'] = 'Semana';
        $_L['Weeks_2'] = 'Quinzena';
        $_L['Month'] = 'M&ecirc;s';
        $_L['Months_2'] = 'Bimestre';
        $_L['Months_3'] = 'Trimestre';
        $_L['Months_6'] = 'Semestre';
        $_L['Year'] = 'Ano';
        $_L['Years_2'] = '2 anos';
        $_L['Years_3'] = '3 anos';
        $_L['Invoice Date'] = 'Data da fatura';
        $_L['Payment Terms'] = 'Prazo';
        $_L['Due On Receipt'] = 'Devido no recebimento';
        $_L['days_3'] = '+3 dias';
        $_L['days_5'] = '+5 dias';
        $_L['days_7'] = '+7 dias';
        $_L['days_10'] = '+10 dias';
        $_L['days_15'] = '+15 dias';
        $_L['days_30'] = '+30 dias';
        $_L['days_45'] = '+45 dias';
        $_L['days_60'] = '+60 dias';
        $_L['Sales TAX'] = 'Imposto';
        $_L['None'] = 'Nenhum';
        $_L['Discount'] = 'Desconto';
        $_L['Set Discount'] = 'Configurar desconto';
        $_L['Item Code'] = 'C&oacute;digo';
        $_L['Item Name'] = '&Iacute;tem';
        $_L['Qty'] = 'Qt';
        $_L['Price'] = 'Pre&ccedil;o';
        $_L['Add blank Line'] = 'Adicionar linha em branco';
        $_L['Add Product OR Service'] = 'Adicionar produto ou servi&ccedil;o';
        $_L['Invoice Terms'] = 'Termos da fatura';
        $_L['Save Invoice'] = 'Salvar fatura';
        $_L['Sub Total'] = 'Sub-total';
        $_L['TAX'] = 'Imposto';
        $_L['TOTAL'] = 'Total';
        $_L['Due Date'] = 'Vencimento';
        $_L['List Products'] = 'Lista de produtos';
        $_L['List Services'] = 'Lista de servi&ccedil;os';
        $_L['Sales Price'] = 'Pre&ccedil;o de venda';
        $_L['Item Number'] = 'N&uacute;mero do &iacute;tem';
        $_L['Add TAX'] = 'Adicionar imposto';
        $_L['Rate'] = 'Taxa';
        $_L['Back To The List'] = 'Ir para lista';
        $_L['Add Activity'] = 'Adicionar atividade';
        $_L['Post'] = 'Salvar';
        $_L['Account Name'] = 'Nome da conta';
        $_L['Subject'] = 'Assunto';
        $_L['Send'] = 'Envair';
        $_L['Onetime'] = 'Uma vez';
        $_L['Unpaid'] = 'Pendente';
        $_L['Paid'] = 'Pago';
        $_L['Cancelled'] = 'Cancelado';
        $_L['Manage Recurring Invoices'] = 'Gerenciar faturas recorrentes';
        $_L['Add Invoice'] = 'Adicionar fatura';
        $_L['Upload Picture'] = 'Enviar foto';
        $_L['Use Gravatar'] = 'Usar gravatar';
        $_L['No Image'] = 'Sem imagem';
        $_L['Picture'] = 'Foto';
        $_L['Facebook Profile'] = 'Perfil no Facebook';
        $_L['Google Plus Profile'] = 'Perfil no Google';
        $_L['Linkedin Profile'] = 'Perfil no Linkedin';
        $_L['Accounting Summary'] = 'Resumo das contas';
        $_L['Add Custom Field'] = 'Adicionar campos personalizados';
        $_L['Field Name'] = 'Nome do campo';
        $_L['Field Type'] = 'Tipo do campo';
        $_L['Text Box'] = 'Caixa de texto';
        $_L['Drop Down'] = 'Caixa suspensa';
        $_L['Text Area'] = '&Aacute;rea de texto';
        $_L['Optional Description help'] = 'Descri&ccedil;&atilde;o opcional, ser&aacute; mostrada como ajuda';
        $_L['Regular Expression Validation'] = 'Express&atilde;o regular para valida&ccedil;&atilde;o';
        $_L['Comma Separated List'] = 'Use v&iacute;rgulas como separador das op&ccedil;&otilde;es da lista suspensa';
        $_L['Show in View Invoice'] = 'Mostrar na visualiza&ccedil;&atilde;o da fatura?';
        $_L['Yes'] = 'Sim';
        $_L['No'] = 'N&atilde;o';
        $_L['Validation'] = 'Valida&ccedil;&atilde;o';
        $_L['Select Options'] = 'Selecione uma op&ccedil;&atilde;o';
        $_L['Edit Custom Field'] = 'Editar campo personalizado';
        $_L['Application Name'] = 'Nome do sistema ou empresa';
        $_L['This Name will be'] = 'Esse nome ser&aacute; exibido no t&iacute;tulo, direitos autorais, etc.';
        $_L['Theme'] = 'Tema';
        $_L['Style'] = 'Estilo';
        $_L['Pay To Address'] = 'Endere&ccedil;o para pagamento';
        $_L['You can use html tag'] = 'Voc&ecirc; pode usar tag html';
        $_L['Invoice Starting'] = 'C&oacute;digo da pr&oacute;xima fatura';
        $_L['Enter to set the next invoice'] = 'Digite para definir o pr&oacute;ximo n&uacute;mero da fatura, deve ser maior do que o atual, valor de incremento autom&aacute;tico';
        $_L['Keep Blank for'] = 'Mantenha em branco para n&atilde;o alterar';
        $_L['This will replace existing logo'] = 'Isto ir&aacute; substituir o logo existente. Voc&ecirc; tamb&eacute;m pode alterar substituindo o arquivo';
        $_L['User Interface'] = 'Interface do usu&aacute;rio';
        $_L['Enable Page Loading Animation'] = 'Ativar anima&ccedil;&atilde;o durante o carregamento da p&aacute;gina?';
        $_L['Enable RTL'] = 'Ativar RTL (invers&atilde;o vertical da tela)';
        $_L['Logo'] = 'Logo';
        $_L['Automation'] = 'Anima&ccedil;&atilde;o';
        $_L['Security Token'] = 'Chave de seguran&ccedil;a';
        $_L['Re Generate Key'] = 'Gerar nova chave';
        $_L['to_enable_automation'] = 'Para habilitar a execu&ccedil;&atilde;o dos recursos de automa&ccedil;&atilde;o, certifique-se de configurar uma tarefa cron para executar uma vez por dia. (por exemplo, 9:00).';
        $_L['Create the following Cron Job using GET'] = 'Crie o seguinte Cron Job usando GET:';
        $_L['Or'] = ' ou ';
        $_L['Create the following Cron Job using PHP'] = 'Crie o seguinte Cron Job usando PHP:';
        $_L['Create the following Cron Job using WGET'] = 'Crie o seguinte Cron Job usando WGET:';
        $_L['Generate Daily Accounting Snapshot'] = 'Gerar diariamente um espelho das contas';
        $_L['Generate Recurring Invoices'] = 'Gerar faturas recorrentes';
        $_L['Enable Email Notifications'] = 'Ativar notifica&ccedil;&otilde;es por e-mail';
        $_L['Save Changes'] = 'Salvar altera&ccedil;&otilde;es';
        $_L['Edit Categories'] = 'Editar categorias';
        $_L['Deleting Categories will'] = 'Excluir essa categoria ir&aacute; alterar todas as transa&ccedil;&otilde;es desta categoria para &quot;Sem categoria&quot;';
        $_L['Current Password'] = 'Senha atual';
        $_L['New Password'] = 'Nova senha';
        $_L['Confirm New Password'] = 'Confirme a senha';
        $_L['INVOICE'] = 'FATURA';
        $_L['Total Amount'] = 'Valor total';
        $_L['Invoiced To'] = 'Faturado para';
        $_L['Item'] = '&Iacute;tem';
        $_L['Quantity'] = 'Quantidade';
        $_L['Related Transactions'] = 'Transa&ccedil;&otilde;es relacionadas';
        $_L['Download PDF'] = 'Baixar PDF';
        $_L['Printable Version'] = 'Vers&atilde;o para impress&atilde;o';
        $_L['Amount Due'] = 'Valor devido';
        $_L['Pay Now'] = 'Pague agora';
        $_L['Add Deposit'] = 'Depositar';
        $_L['Choose an'] = 'Escolha um';
        $_L['Advanced'] = 'Avan&ccedil;ado';
        $_L['Choose Contact'] = 'Escolha o contato';
        $_L['Select Payment Method'] = 'Escolha o m&eacute;todo';
        $_L['ref_example'] = 'por exemplo c&oacute;digo da transa&ccedil;&atilde;o, n&uacute;mero do cheque.';
        $_L['Recent Deposits'] = 'Recebimentos recentes';
        $_L['Custom Fields'] = 'Campos personalizados';
        $_L['Custom Fields Not Available'] = 'Campos personalizados n&atilde;o est&atilde;o dispon&iacute;veis';
        $_L['Total Database Size'] = 'Tamanho da base de dados';
        $_L['Download Database Backup'] = 'Baixar Backup';
        $_L['Table Name'] = 'Nome da tabela';
        $_L['Rows'] = 'Registros';
        $_L['Size'] = 'Tamanho';
        $_L['Edit TAX'] = 'Editar imposto';
        $_L['Active'] = 'Ativo';
        $_L['Inactive'] = 'Inativo';
        $_L['Send Email Using'] = 'Enviar e-mail usando';
        $_L['PHP mail Function'] = 'PHP mail';
        $_L['SMTP'] = 'SMTP';
        $_L['System Email'] = 'E-mail do sistema';
        $_L['All Outgoing Email Will'] = 'Todos envios de e-mails enviados a partir desse e-mail.';
        $_L['SMTP Host'] = 'Servidor SMTP';
        $_L['SMTP Username'] = 'Usu&aacute;rio SMTP';
        $_L['SMTP Password'] = 'Senha SMTP';
        $_L['SMTP Port'] = 'Porta SMTP';
        $_L['SMTP Secure'] = 'Seguran&ccedil;a SMTP';
        $_L['TLS'] = 'TLS';
        $_L['SSL'] = 'SSL';
        $_L['Add Expense'] = 'Sacar';
        $_L['Choose an Account'] = 'Escolha uma conta';
        $_L['Recent Expense'] = 'Pagamentos recentes';
        $_L['Manage Categories'] = 'Gerenciar categorias';
        $_L['drag_n_drop_help'] = 'Arraste e solte os itens abaixo para reposicionamento. Clique em Editar.';
        $_L['Reset Password'] = 'Nova Senha';
        $_L['Back To Login'] = 'Voltar';
        $_L['Email Address'] = 'E-mail';
        $_L['Related Emails'] = 'e-mails relacionados';
        $_L['Invoice'] = 'Fatura';
        $_L['Send Email'] = 'Enviar e-mail';
        $_L['Invoice Created'] = 'Criar fatura';
        $_L['Invoice Payment Reminder'] = 'lembrete de pagamento da fatura';
        $_L['Invoice Overdue Notice'] = 'Aviso de faturas vencidas';
        $_L['Invoice Payment Confirmation'] = 'Confirma&ccedil;&atilde;o do pagamento da fatura';
        $_L['Invoice Refund Confirmation'] = 'Confirma&ccedil;&atilde;o do reembolso da fatura';
        $_L['Mark As'] = 'Marcar como';
        $_L['Partially Paid'] = 'Pagamento parcial';
        $_L['Add Payment'] = 'Adicionar pagamento';
        $_L['Preview'] = 'Visualizar';
        $_L['PDF'] = 'PDF';
        $_L['View PDF'] = 'Ver PDF';
        $_L['Print'] = 'Imprimir';
        $_L['Subtotal'] = 'Sub-total';
        $_L['Grand Total'] = 'Total geral';
        $_L['Search by Name'] = 'Procurar por';
        $_L['Search'] = 'Procurar';
        $_L['Add New Contact'] = 'Adicionar novo contato';
        $_L['Filter by Tags'] = 'Filtrar por';
        $_L['n_a'] = 'n/d';
        $_L['Records'] = 'Registros';
        $_L['List Invoices'] = 'Lista de faturas';
        $_L['Add Recurring Invoice'] = 'Adicionar fatura recorrente';
        $_L['Due'] = 'Devido';
        $_L['Next Invoice'] = 'Pr&oacute;xima fatura';
        $_L['Stop Recurring'] = 'Parar recorrencia';
        $_L['Add Tax'] = 'Adicionar imposto';
        $_L['Tax Rate'] = 'Adicionar taxa';
        $_L['Default Country'] = 'Pa&iacute;s padr&atilde;o';
        $_L['Date Format'] = 'Formato da data';
        $_L['Currency Format'] = 'Formato da moeda';
        $_L['Currency Code'] = 'S&iacute;mbolo da moeda';
        $_L['Keep it blank if currency code'] = 'Mantenha em branco se n&atilde;o quiser exibir o s&iacute;mbolo da moeda';
        $_L['Charset n Collation'] = 'Charset e Collation';
        $_L['Set Charset n Collation'] = 'Configurar o Charset e Collation das tabelas do banco';
        $_L['Sign in'] = 'Entrar';
        $_L['Forgot password'] = 'Esqueceu sua senha';
        $_L['Edit Transaction'] = 'Editar transa&ccedil;&atilde;o';
        $_L['Add User'] = 'Adicionar usu&aacute;rio';
        $_L['Access Level'] = 'N&iacute;vel de acesso';
        $_L['Full Access'] = 'Acesso total';
        $_L['Loading Users'] = 'Carregando usu&aacute;rios';
        $_L['Add Payee'] = 'Adicionar favorecido';
        $_L['Manage Payees'] = 'Gerenciar favorecidos';
        $_L['Edit Payee'] = 'Editar favorecido';
        $_L['Edit Payer'] = 'Editar pagador';
        $_L['Add Payer'] = 'Adicionar pagador';
        $_L['Manage Payers'] = 'Gerenciar pagadores';
        $_L['Reorder Payment Gateways'] = 'Reordenar posi&ccedil;&atilde;o dos gateways de pagamento';
        $_L['Gateway Name'] = 'Nome da gateway';
        $_L['Setting Name'] = 'Nome da configura&ccedil;&atilde;o';
        $_L['Value'] = 'Valor';
        $_L['Reorder'] = 'Reordenar';
        $_L['Positions'] = 'Posi&ccedil;&otilde;es';
        $_L['Settings Name'] = 'Nome das configura&ccedil;&otilde;es';
        $_L['Custom Param 1'] = 'Par&acirc;metro personalizado 1';
        $_L['Conversion Rate'] = 'Taxa de convers&atilde;o';
        $_L['Custom Param 2'] = 'Par&acirc;metro personalizado 2';
        $_L['Custom Param 3'] = 'Par&acirc;metro personalizado 3';
        $_L['Custom Param 4'] = 'Par&acirc;metro personalizado 4';
        $_L['Custom Param 5'] = 'Par&acirc;metro personalizado 5';
        $_L['Add Payment Methods'] = 'Adicionar m&eacute;todo de pagamento';
        $_L['Manage Payment Methods'] = 'Gerenciar formas de pagamento';
        $_L['Edit Payment Methods'] = 'Editar formas de pagamento';
        $_L['Click Here to Print'] = 'Clique aqui para imprimir';
        $_L['Add Product'] = 'Adicionar produto';
        $_L['Add Service'] = 'Adicionar servi&ccedil;o';
        $_L['List'] = 'Lista de ';
        $_L['Expense Summary'] = 'Resumo das despesas';
        $_L['Total Expense This Month'] = 'Despesa total deste m&ecirc;s';
        $_L['Total Expense This Week'] = 'Despesa total desta semana';
        $_L['Total Expense Last 30 days'] = 'Despesa total dos 30 dias';
        $_L['Last 20 deposit Expense'] = '&Uacute;ltimas 20 despesas';
        $_L['Dr.'] = 'Dr.';
        $_L['Monthly Expense Graph'] = 'Gr&aacute;fico de despesa mensal';
        $_L['Income Summary'] = 'Resumo de rendimentos';
        $_L['Total Income This Month'] = 'Total de rendimentos deste m&ecirc;s';
        $_L['Total Income This Week'] = 'Total de rendimentos desta semana';
        $_L['Total Income Last 30 days'] = 'Total de rendimentos dos 30 dias';
        $_L['Last 20 deposit Income'] = '&Uacute;ltimas 20 receitas';
        $_L['Monthly Income Graph'] = 'Gr&aacute;fico de receita mensal';
        $_L['Reports Income Vs Expense'] = 'Relat&oacute;rio - Renda X Despesa';
        $_L['Income minus Expense'] = 'Rendimento - Despesa';
        $_L['Income Vs Expense This Year'] = 'Rendimento X despesa deste ano';
        $_L['View Statement'] = 'Ver demonstrativo';
        $_L['From Date'] = 'De';
        $_L['To Date'] = 'At&eacute;';
        $_L['Export for Print'] = 'Imprimir';
        $_L['Export to PDF'] = 'Exportar para PDF';
        $_L['Tag'] = 'Tag';
        $_L['New Transfer'] = 'Nova transfer&ecirc;ncia';
        $_L['Recent Transfers'] = 'Transfer&ecirc;ncias recentes';
        $_L['Add New User'] = 'Adicionar novo usu&aacute;rio';
        $_L['User'] = 'Usu&aacute;rio';
        $_L['Full Administrator'] = 'Administrador';
        $_L['Choose User Type'] = 'Escolha o tipo de usu&aacute;rio &quot;Empregado&quot; para desativar o acesso as &quot;Configura&ccedil;&otilde;es&quot;';
        $_L['Confirm Password'] = 'Confirmar senha';
        $_L['Edit User'] = 'Editar usu&aacute;rio';
        $_L['Clear Old Data'] = 'Apagar dados antigos';
        $_L['UID'] = 'UID';
        $_L['IP'] = 'IP';
        $_L['ID'] = 'ID';
        $_L['Total Email Sent'] = 'Total de e-mails enviados';
        $_L['Sent To'] = 'Enviar para';
        $_L['Back To Emails'] = 'Voltar aos e-mails';
        $_L['Settings Saved Successfully'] = 'Configura&ccedil;&otilde;es salvas com sucesso';
        $_L['New Goal has been set'] = 'Novo objetivo foi definido';
        $_L['Choose the Traget Account'] = 'Por favor, escolha a conta de destino';
        $_L['See All Activity'] = 'Ver todas atividades';


        /*
         * @ From V 2.2.0
         */

        $_L['Item Added Successfully'] = '&Iacute;em adicionado com sucesso';
        $_L['Password changed successfully'] = 'Senha alterada com sucesso, por favor entre novamente';
        $_L['Data Updated'] = 'Dados atualizados!';
        $_L['Transaction Added Successfully'] = 'Transa&ccedil;&atilde;o adicionada com sucesso';
        $_L['Invalid Number'] = 'N&uacute;mero inv&aacute;lido';
        $_L['Logs has been deleted'] = 'Hist&oacute;rico com mais de 30 dias ser&atilde;o removidos';
        $_L['Password Reset Key Expired'] = 'Chave para alterar senha expirou';
        $_L['Payment Cancelled'] = 'Pagamento cancelado';
        $_L['Custom Field Deleted Successfully'] = 'Campo personalizado foi removido';
        $_L['Plugin Not Found'] = 'Plugin n&atilde;o encontrado';
        $_L['You do not have permission'] = 'Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar essa p&aacute;gina';
        $_L['disabled_in_demo'] = 'Essa op&ccedil;&atilde;o est&aacute; desabilida no modo de demonstra&ccedil;&atilde;o';
        $_L['All Fields are Required'] = 'Todos os campos s&atilde;o requeridos';
        $_L['Invalid System Email'] = 'E-mail inv&aacute;lido';
        $_L['smtp_fields_error'] = 'Usu&aacute;rio, senha e porta do SMTP s&atilde;o obrigat&oacute;rios';
        $_L['Charset Saved Successfully'] = 'Charset salvo com sucesso';
        $_L['password_length_error'] = 'A nova senha deve conter de 6 a 14 caracteres';
        $_L['Both Password should be same'] = 'As senhas precisam ser iguais.';
        $_L['Incorrect Current Password'] = 'Senha atual incorreta';
        $_L['Invalid Logo File'] = 'Arquivo para logo inv&aacute;lido';
        $_L['Invalid TAX Rate'] = 'Valor de imposto inv&aacute;lido';
        $_L['New TAX Added'] = 'Novo imposto adicionado';
        $_L['TAX Not Found'] = 'Imposto n&atilde;o encontrado';
        $_L['cron_new_key'] = 'Nova chave gerada. Por favor atualize as tarefas no CRON.';
        $_L['cron_notification'] = 'Por favor use um e-mail e v&aacute;lido para recever as notifica&ccedil;&otilde;es';
        $_L['Select'] = 'Selecione';
        $_L['Close'] = 'Fechar';
        $_L['Update'] = 'Atualizar';
        $_L['OK'] = 'Confirmar';
        $_L['Terms'] = 'Termos';


        $_L['PDF Font'] = 'Fontes PDF';
        $_L['pdf_font_help_default'] = 'Padr&atilde;o [Cria&ccedil;&atilde;o de PDF mais r&aacute;pido e com menos mem&oacute;ria]';
        $_L['pdf_font_help_helvetica'] = 'Helvetica'; #Font name
        $_L['pdf_font_help_dejavusanscondensed'] = 'dejavusanscondensed [Incorporar fontes com suporte UTF8]'; # dejavusanscondensed is font name, you can either translate this or you may ignore this word from this string
        $_L['Invoice Total'] = 'Total da fatura';
        $_L['Total Paid'] = 'Total pago';
        $_L['Unique Invoice URL'] = 'URL &uacute;nica da fatura';
        $_L['Company Name'] = 'Empresa';
        $_L['ATTN'] = 'Alerta'; # The short of Atention, used in invoicing

        /*
         * @ From V 2.3.0
         */

        $_L['Plugins'] = 'Plugins';
        $_L['Payment Successful'] = 'Pago com sucesso';


        /*
         * @ From V 2.4.0
         */
        $_L['Installing Plugin'] = 'Instalando Plugin';
        $_L['Uninstalling Plugin'] = 'Desinstalando Plugin';
        $_L['Activating Plugin'] = 'Ativando Plugin';
        $_L['Deactivating Plugin'] = 'Desativando Plugin';
        $_L['Deleting Plugin'] = 'Removendo Plugin';
        $_L['Upload Plugin'] = 'Enviando Plugin';
        $_L['Unzipping'] = 'Descompactando';
        $_L['Plugin Added'] = 'Plugin adicionado';
        $_L['No Plugins Available'] = 'Nenhum Plugin dispon&iacute;vel';
        $_L['Quotes'] = 'Or&ccedil;amentos';
        $_L['Quote'] = 'Or&ccedil;amento';
        $_L['Choose Features'] = 'Escolha os recursos';
        $_L['Accounting'] = 'contabilidade';
        $_L['Invoicing'] = 'faturamento';
        $_L['Quotes'] = 'cota&ccedil;&otilde;es';
        $_L['Enable Client Dashboard'] = 'Ativar painel do cliente';
        $_L['quote_alias'] = 'Criar novo or&ccedil;amento / proposta / cota&ccedil;&atilde;o';
        $_L['Date Created'] = 'Data de cria&ccedil;&atilde;o';
        $_L['Expiry Date'] = 'Data de expira&ccedil;&atilde;o';
        $_L['Stage'] = 'Etapa';
        $_L['Draft'] = 'Rascunho';
        $_L['Delivered'] = 'Entregue';
        $_L['Accepted'] = 'Aceito';
        $_L['On Hold'] = 'Aguardando';
        $_L['Lost'] = 'Perdido';
        $_L['Dead'] = 'Destru&iacute;do';
        $_L['Reports by Category'] = 'Relat&oacute;rios por Categoria';
//Month Names
        $_L['January'] = 'Janeiro';
        $_L['February'] = 'Fevereiro';
        $_L['March'] = 'Mar&ccedil;o';
        $_L['April'] = 'Abril';
        $_L['May'] = 'Maio';
        $_L['June'] = 'Junho';
        $_L['July'] = 'Julho';
        $_L['August'] = 'Agosto';
        $_L['September'] = 'Setembro';
        $_L['October'] = 'Outubro';
        $_L['November'] = 'Novembro';
        $_L['December'] = 'Dezembro';
        $_L['Discount Type'] = 'Tipo de desconto';
        $_L['Percentage'] = 'Porcentagem';
        $_L['Fixed Amount'] = 'Valor fixo';
        $_L['Page'] = 'P&aacute;gina';
        $_L['of'] = 'de';
        $_L['Loading'] = 'Carregando';
        $_L['Payment'] = 'Pagamento';
        $_L['Recipient'] = 'Benefici&aacute;rio';
        $_L['Proposal Text'] = 'Texto da proposta';
        $_L['quote_help_top'] = 'Exibido na parte superior do or&ccedil;amento';
        $_L['quote_help_footer'] = 'Exibido no rodap&eacute; do or&ccedil;amento';
        $_L['Customer Notes'] = 'Observa&ccedil;&otilde;es do cliente';
        $_L['Save n Close'] = 'Salvar & Fechar';
        $_L['Quote Created'] = 'Or&ccedil;amento criado';
        $_L['Convert to Invoice'] = 'Converter or&ccedil;amento em fatura';
        $_L['Quote Prefix'] = 'Prefixo do or&ccedil;amento';
        $_L['quote_number_help'] = 'Mantenha-o em branco para gerar automaticamente o n&uacute;mero do or&ccedil;amento';
        $_L['invoice_number_help'] = 'Mantenha-o em branco para gerar automaticamente o n&uacute;mero da fatura';
        $_L['Public Key'] = 'Chave pública';
        $_L['Private Key'] = 'Chave privada';
        $_L['Default Account'] = 'Conta padr&atilde;o';
        $_L['live or sandbox'] = 'Produ&ccedil;&atilde;o ou Teste';

        $_L['plugin_drop_help'] = 'Solte o plugin aqui ou clique para fazer o envio';
        $_L['plugin_upload_help'] = '(Fazer envio do arquivo compactado )';
        $_L['Admin'] = 'Administrador';
        $_L['Message Body'] = 'Conte&uacute;do da mensagem';

        $_L['Invoice:Invoice Created'] = 'Fatura - Fatura criada';
        $_L['Admin:Password Change Request'] = 'Adminustrador - Solicita&ccedil;&atilde;o de altera&ccedil;&atilde;o de senha';
        $_L['Admin:New Password'] = 'Adminustrador - Nova senha';
        $_L['Invoice:Invoice Payment Reminder'] = 'Fatura - Lembrete de pagamento de fatura';
        $_L['Invoice:Invoice Overdue Notice'] = 'Fatura - Aviso de fatura vencida';
        $_L['Invoice:Invoice Payment Confirmation'] = 'Fatura - Confirma&ccedil;&atilde;o do pagamento da fatura';
        $_L['Invoice:Invoice Refund Confirmation'] = 'Fatura - Confirma&ccedil;&atilde;o de restitui&ccedil;&atilde;o da fatura';
        $_L['Quote:Quote Created'] = 'Or&ccedil;amento - Or&ccedil;amento criado';
        $_L['Send Notifications To'] = 'Enviar notifica&ccedil;&otilde;es para';
        $_L['No results found'] = 'Nenhum resultado encontrado';
        $_L['Quote Deleted Successfully'] = 'Or&ccedil;amento exclu&iacute;do com sucesso';
        $_L['Create New Quote'] = 'Criar novo or&ccedil;amento';

# V3.0.0

        $_L['notice_email_as_username'] = 'Por favor use um e-mail v&aacute;lido como nome de usu&aacute;rio';
        $_L['API'] = 'API';
        $_L['API Access'] = 'Acesso a API';
        $_L['Add API Access'] = 'Adicionar acesso a API';
        $_L['Label'] = 'R&oacute;tulo';
        $_L['API Key'] = 'API Chave';
        $_L['Regenerate'] = 'Regerar';
        $_L['Application URL'] = 'URL do sistema';

# V3.1.0
        $_L['API Access Added'] = 'Acesso a API adicionado';
        $_L['select_a_contact'] = 'Por favor, selecione um contato';
        $_L['at_least_one_item_required'] = 'Pelo menos um item é necessário';
        $_L['Subject is Required'] = 'Assunto é necessária';
        $_L['Unique Quote URL'] = 'URL cita&ccedil;ões originais';

# V3.1.0
        $_L['API Access Added'] = 'API de acesso Adicionado';
        $_L['select_a_contact'] = 'Por favor, selecione um contato';
        $_L['at_least_one_item_required'] = 'Pelo menos um item é necessário';
        $_L['Subject is Required'] = 'Assunto é necessária';
        $_L['Unique Quote URL'] = 'URL cita&ccedil;ões originais';

# V3.3.0
        $_L['Default Invoice Terms'] = 'Termos Padr&atilde;o de Fatuca';
        $_L['Additional Settings'] = 'Configura&ccedil;ões adicionais';
        $_L['cron_invoice_created'] = 'CRON Job - Enviar automaticamente Invoice Criado Email';

# V3.4.0

        $_L['Invoice Creation Method'] = 'Invoice Creation Method';
        $_L['Default'] = 'Padr&atilde;o';
        $_L['V2'] = 'V2';



# V 3.6.0

        $_L['CRON Log'] = 'CRON Log';
        $_L['Message'] = 'Mensagem';
        $_L['Recent Invoices'] = 'Faturas Recentes';

# V 3.7.0

# V 4.0.0

        $_L['About'] = 'About';
        $_L['Or Install from URL'] = 'Ou Instalar a partir de URL';
        $_L['Fold Sidebar Default'] = 'Dobre Sidebar por padr&atilde;o?';
        $_L['Hide Footer Copyright'] = 'Esconder rodapé de Copyright?';
        $_L['Filter'] = 'Filtro';
        $_L['Back'] = 'Voltar';
        $_L['Account Number'] = 'Número da conta';
        $_L['Contact Person'] = 'Pessoa de contato';
        $_L['Internet Banking URL'] = 'Internet Banking URL';

# V 4.1.0

        $_L['Cc'] = 'Cc';
        $_L['Bcc'] = 'Bcc';
        $_L['Mode'] = 'Modo';
        $_L['Live'] = 'Live';
        $_L['Sandbox'] = 'Sandbox';
        $_L['Drop CSV File Here'] = 'Baixe arquivo CSV aqui';
        $_L['Or Click to Upload'] = 'Ou Clique para Carregar';
        $_L['Importing'] = 'Importando';
        $_L['Import Contacts'] = 'Importar contatos';
        $_L['Download Sample File'] = 'Baixar Arquivo de Amostra';
        $_L['Group'] = 'Grupo';
        $_L['Groups'] = 'Grupos';
        $_L['Add New Group'] = 'Adicionar novo grupo';
        $_L['Group Name'] = 'Nome do grupo';
        $_L['Group Deleted Successfully'] = 'Grupo excluído com sucesso';
        $_L['Welcome Email'] = 'Bem-vindo Email';
        $_L['Client:Client Signup Email'] = 'Registre-se cliente de email';
        $_L['Send Client Signup Email'] = 'Defina Sim para enviar Cliente Inscri&ccedil;&atilde;o e-mail.';
        $_L['Profile'] = 'Perfil';
        $_L['Download'] = 'Download';
        $_L['Legacy'] = 'Legacy';
        $_L['New'] = 'Novo';
        $_L['Default Landing Page'] = 'Padr&atilde;o da página de destino';
        $_L['Admin Login'] = 'Admin Acesso';
        $_L['Client Login'] = 'Acesso de cliente';
        $_L['Recent Quotes'] = 'Cota&ccedil;ões recentes';
        $_L['Recent Transactions'] = 'Transa&ccedil;ões recentes';

# V 4.2.0

        $_L['URL Rewrite'] = 'Reescrever URL';
        $_L['Currency Symbol'] = 'Símbolo de moeda';
        $_L['Home Currency'] = 'Início Moeda';
        $_L['Currency Symbol Position'] = 'Posi&ccedil;&atilde;o Símbolo da Moeda';
        $_L['Left'] = 'Esquerda';
        $_L['Right'] = 'Direito';
        $_L['Currency Decimal Digits'] = 'Dígito decimal da moeda';
        $_L['Thousand Separator Placement'] = 'Decimais e separadores de milhares';

# V 4.2.1

        $_L['Or Cancel'] = 'ou Cancelar';
        $_L['Send Bcc to Admin'] = 'Enviar Cco para administrador? Clique aqui.';
        $_L['Attach PDF'] = 'Anexar PDF?';

# v 4.4.0

        $_L['Cash Flow'] = 'Fluxo de caixa';

//Month Names short
        $_L['Jan'] = 'Jan';
        $_L['Feb'] = 'Fev';
        $_L['Mar'] = 'Mar';
        $_L['Apr'] = 'Abr';
        $_L['May'] = 'Mai';
        $_L['Jun'] = 'Jun';
        $_L['Jul'] = 'Jul';
        $_L['Aug'] = 'Ago';
        $_L['Sep'] = 'Set';
        $_L['Oct'] = 'Out';
        $_L['Nov'] = 'Nov';
        $_L['Dec'] = 'Dez';

        $_L['Last 12 Months'] = 'Últimos 12 Meses';
        $_L['Data View'] = 'Ver dados';
        $_L['Refresh'] = 'Refrescar';
        $_L['Reset'] = 'Reiniciar';
        $_L['Save as Image'] = 'Salve como Imagem';
        $_L['Click to Save'] = 'Clique para salvar';
        $_L['Average'] = 'Média';
        $_L['Line'] = 'Linha';
        $_L['Bar'] = 'Barra';
        $_L['Net Worth'] = 'Patrimônio líquido';

# Build 4505

        $_L['Received'] = 'Recebido';

# Build 4520

        $_L['System Status'] = 'Status do Sistema';
        $_L['Application Environment'] = 'Ambiente de aplica&ccedil;&atilde;o';
        $_L['Server Environment'] = 'Ambiente do servidor';
        $_L['Integration Code'] = 'Código de integra&ccedil;&atilde;o';
        $_L['Client Registration'] = 'Registo do cliente';
        $_L['Register'] = 'Registrar';
        $_L['Notes'] = 'Notas';
        $_L['Quick Notes'] = 'Notas rápidas';
        $_L['Whats on your mind'] = 'O que está em sua mente?';
        $_L['Team'] = 'Equipe';
        $_L['Last Activity'] = 'Última atividade';
        $_L['Content Animation'] = 'Anima&ccedil;&atilde;o conteúdo';

# Build 4530

        $_L['Appearance'] = 'Aparência';
        $_L['Customize'] = 'Customizar';
        $_L['Editor'] = 'Editor';
        $_L['Language Editor'] = 'Editor de idiomas';
        $_L['Themes'] = 'Temas';
        $_L['Select File to Edit'] = 'Selecione arquivo para editar';
        $_L['File'] = 'Arquivo';
        $_L['Language File'] = 'Arquivo idioma';
        $_L['Invoice Layout Print'] = 'Invoice Layout: Print';
        $_L['Invoice Layout PDF'] = 'Invoice Layout: PDF';
        $_L['Please Choose a File'] = 'Escolha um arquivo';

# Build 4540

        $_L['Profit'] = 'Lucro';
        $_L['Loss'] = 'Perda';
        $_L['Revenue'] = 'Receita';
        $_L['Outstanding'] = 'Excepcional';

# Build 4550

        $_L['Payments'] = 'Pagamentos';
        $_L['Transaction ID'] = 'ID da transa&ccedil;&atilde;o';
        $_L['Customers'] = 'Clientes';
        $_L['Companies'] = 'Empresas';
        $_L['Currencies'] = 'Moedas';
        $_L['Permission'] = 'Permiss&atilde;o';
        $_L['Staff'] = 'Equipe';
        $_L['Roles'] = 'Fun&ccedil;&atilde;o';
        $_L['New Role'] = 'Novo Papel';
        $_L['Role name is required'] = 'Nome da fun&ccedil;&atilde;o é necessária';
        $_L['Tasks'] = 'Tarefas';
        $_L['Calendar'] = 'Calendário';
        $_L['Leads'] = 'Leads';
        $_L['Orders'] = 'Ordens';
        $_L['Currency'] = 'Moeda';
        $_L['New Currency'] = 'Nova moeda';
        $_L['Base Conversion Rate'] = 'Base de dados de Taxa de Convers&atilde;o';
        $_L['Currency Example'] = 'Moeda Código ISO, por exemplo. USD, GBP, INR etc ...';
        $_L['Make Base Currency'] = 'Criar Moeda Base';
        $_L['Base Currency'] = 'Moeda base';
        $_L['New Company'] = 'Nova Empresa';
        $_L['URL'] = 'URL';
        $_L['Logo URL'] = 'Logo URL';
        $_L['Company Name is required'] = 'Nome da Empresa é necessária.';
        $_L['Event Name'] = 'Nome do evento';
        $_L['Priority'] = 'Prioridade';
        $_L['Owner'] = 'Proprietário';
        $_L['Start Date'] = 'Data de início';
        $_L['End Date'] = 'Data final';
        $_L['Start Time'] = 'Hora de início';
        $_L['End Time'] = 'Fim do tempo';
        $_L['All day event'] = 'Todos os dias do evento';
        $_L['Related Contacts'] = 'Os Contactos relacionados';
        $_L['Add Event'] = 'Adicionar Evento';
        $_L['Color'] = 'Cor';
        $_L['Image'] = 'Imagem';
        $_L['Create'] = 'Crie';
        $_L['Avatar'] = 'Avatar';
        $_L['Attach File'] = 'Anexar arquivo';
        $_L['Drop File Here'] = 'Arraste o arquivo aqui';
        $_L['Click to Upload'] = 'Ou Clique para Carregar';

# Build 4580
        $_L['Import'] = 'Importar';
        $_L['Export'] = 'Exportar';
        $_L['Phone number already exist'] = 'Este telefone ja existe.';

# Build 4590
        $_L['Favicon'] = 'Icone';
        $_L['Upload'] = 'Upload';
        $_L['Remember me'] = 'Manter Conectado';

# Build 4591

        $_L['Accept'] = 'Aceitar';
        $_L['Decline'] = 'Cancelar';

# Build 4592

        $_L['Terminal'] = 'Terminal';
        $_L['Customers View Mode'] = 'Visualiza&ccedil;&atilde;o do Cliente'; // Customers View Mode in User Interface [ Table / Card / Search ]
        $_L['Table'] = 'Tabela';
        $_L['Card'] = 'Galeria';

# Build 4593

        $_L['Your last login was'] = 'Seu ultimo login foi';

# Build 4596

        $_L['Documents'] = 'Documentos';
        $_L['List All Orders'] = 'Todos os Pedidos';
        $_L['Add New Order'] = 'Adicionar Pedido';
        $_L['Order'] = 'Pedido';
        $_L['Product_Service'] = 'Produto/Servi&ccedil;o';
        $_L['Billing Cycle'] = 'Ciclo de Cobran&ccedil;ca';
        $_L['Free'] = 'Gratuito';
        $_L['One Time'] = 'Uma Vez';
        $_L['Monthly'] = 'Mensal';
        $_L['Quarterly'] = 'Quadrimestral';
        $_L['Semi-Annually'] = 'Semi-Anual';
        $_L['Annually'] = 'Anual';
        $_L['Biennially'] = 'Bianual';
        $_L['Triennially'] = 'Trianual';
        $_L['Pending'] = 'Pendente';
        $_L['Generate Invoice'] = 'Gerar Cobran&ccedil;a';
        $_L['Item Not Found'] = 'Item N&atilde;o Localizado';
        $_L['Available Module for this Order'] = 'Modulo disponivel para este pedido';
        $_L['Order Number'] = 'Pedido Numero';
        $_L['New Document'] = 'Novo Documento';
        $_L['Title'] = 'Titulo'; # Document Name / Title
        $_L['Server Config'] = 'Configura&ccedil;&atilde;o do Servidor';
        $_L['Upload Maximum Size'] = 'Tamanho maximo de upload';
        $_L['POST Maximum Size'] = 'Tamanho maximo de postagem';
        $_L['Uploaded Successfully'] = 'Envio Realizado';
        $_L['Secure Download Link'] = 'link Seguro de Download';
        $_L['Files'] = 'Arquivos';
        $_L['Assign File'] = 'Assinar Arquivo';
        $_L['Activation Message'] = 'Mensagem de Ativa&ccedil;&atilde;o';
        $_L['Email Sent'] = 'E-mail Enviado';
        $_L['Downloads'] = 'Downloads';

# Build 4597

        $_L['Create Auto Login URL'] = 'Criar URL de Login Automatico';
        $_L['Created Successfully'] = 'Criado Com Sucesso';
        $_L['Auto Login URL'] = 'URL de Auto Login';
        $_L['Login As Customer'] = 'Logar Como Cliente';
        $_L['Revoke Auto Login'] = 'Cancelar Auto Login';
        $_L['Re Generate URL'] = 'Gerar URL Novamente';

# Build 4601

        $_L['Contact'] = 'Contato';
        $_L['All'] = 'Todos';
        $_L['Date Range'] = 'Intervalo de datas';
        $_L['Available for all Customers'] = 'Dispon&iacute;vel para todos os clientes';
        $_L['Proof Of Payment'] = 'Prova de pagamento';

# Build 4602

        $_L['My Orders'] = 'Meus pedidos';
        $_L['Place New Order'] = 'Coloque o novo pedido';
        $_L['Cost Price'] = 'Pre&ccedil;o de custo';
        $_L['Inventory To Add Subtract'] = 'Invent&aacute;rio para adicionar / subtrair';
        $_L['Unit'] = 'Unidade';
        $_L['Units'] = 'Unidades';
        $_L['Units of measurement'] = 'Unidades de medida';
        $_L['Create New'] = 'Criar novo';
        $_L['Reference'] = 'Refer&ecirc;ncia';
        $_L['Conversion Factor'] = 'Fator de convers&atilde;o';
        $_L['SKU'] = 'SKU';
        $_L['Weight'] = 'Peso';
        $_L['Show quantity as'] = 'Mostrar quantidade como';
        $_L['New Lead'] = 'Novo Lead';
        $_L['Import Leads'] = 'Importar Leads';
        $_L['Source'] = 'Fonte';
        $_L['Salutation'] = 'Sauda&ccedil;&atilde;o';
        $_L['First Name'] = 'Nome';
        $_L['Middle Name'] = 'Nome do meio';
        $_L['Last Name'] = 'Sobrenome';
        $_L['Industry'] = 'Atividade';
        $_L['No. of Employees'] = 'No. de funcion&aacute;rios';
        $_L['Public'] = 'P&uacute;blico';
        $_L['Company'] = 'Empresa';
        $_L['Street'] = 'Rua';
        $_L['Memo'] = 'Memorando';  // Description
        $_L['Convert to Customer'] = 'Converter para cliente';
        $_L['Buy Now'] = 'Compre agora';
        $_L['Store'] = 'Loja';
        $_L['Add to Cart'] = 'Adicionar ao carrinho';
        $_L['Copy'] = 'C&oacute;pia';
        $_L['Unknown'] = 'Desconhecido';
        $_L['Access Log'] = 'Log de acesso';
        $_L['Browser'] = 'Navegador';
        $_L['Time'] = 'Horário';
        $_L['Invoice Access Log'] = 'Log de acesso de fatura';
        $_L['Clone'] = 'Clonar';
        $_L['Cloned successfully'] = 'Clonado com sucesso';
        $_L['Media'] = 'M&iacute;dia';
        $_L['Inventory'] = 'Invent&aacute;rio';
        $_L['Available'] = 'Dispon&iacute;vel';
        $_L['Published'] = 'Publicado';
        $_L['No Data Available'] = 'Sem dados dispon&iacute;veis';
        $_L['Send SMS'] = 'Enviar SMS';
        $_L['Call'] = 'Ligar'; // Phone Call
        $_L['Saved Successfully'] = 'Salvo com sucesso';
        $_L['System'] = 'Sistema';
        $_L['Custom'] = 'Personalizado';
        $_L['Choose from Template'] = 'Escolher do modelo';
        $_L['Add New Template'] = 'Adicionar novo modelo';
        $_L['Assign to Group'] = 'Associar a um grupo';
        $_L['Select Group'] = 'Selecionar grupo';
        $_L['Empty'] = 'Vazio';
        $_L['Related To'] = 'Relacionado a';
        $_L['Add New'] = 'Adicionar novo';
        $_L['Add Fund'] = 'Adicionar fundos';
        $_L['Back to Client Area'] = 'Voltar a &aacute;rea de cliente';
        $_L['Manual Credit'] = 'Crédito manual';
        $_L['Log'] = 'Log';
        $_L['Client'] = 'Cliente';
        $_L['All Data'] = 'Todas os dados';

# 4663
        $_L['Sales target'] = 'Meta de vendas'; # Sales target for specific month
        $_L['Invoice issued'] = 'Fatura emitida';

        foreach ($_L as $key => $value)
        {
            echo "'$key' => '$value',".PHP_EOL;
        }


        break;


    case 'translate':

        clxPerformLongProcess();



        $lan = 'zh';

        $_L = null;

        $_L = [

            'New Contact Added' => 'New Contact Added',
            'Contact Deleted Successfully' => 'Contact Deleted Successfully',
            'Invoice Deleted Successfully' => 'Invoice Deleted Successfully',
            'Tag Deleted Successfully' => 'Tag Deleted Successfully',
            'TAX Deleted Successfully' => 'TAX Deleted Successfully',
            'Login Successful' => 'Login Successful',
            'Invalid Username or Password' => 'Invalid Username or Password',
            'Failed Login' => 'Failed Login',
            'Check your email to reset Password' => 'Check your email to reset Password',
            'User Not Found' => 'User Not Found',
            'Invalid Password Reset Key' => 'Invalid Password Reset Key',
            'Activity' => 'Activity',
            'Summary' => 'Summary',
            'Custom Contact Fields' => 'Custom Contact Fields',
            'Account Title' => 'Account Title',
            'Initial Balance' => 'Initial Balance',
            'Financial Balances' => 'Financial Balances',
            'More' => 'More',
            'Contact Notes' => 'Contact Notes',
            'Save' => 'Save',
            'Create Recurring Invoice' => 'Create Recurring Invoice',
            'Create New Invoice' => 'Create New Invoice',
            'Customer' => 'Customer',
            'Select Contact' => 'Select Contact',
            'Or Add New Customer' => 'Or Add New Customer',
            'Invoice Prefix' => 'Invoice Prefix',
            'Repeat Every' => 'Repeat Every',
            'Week' => 'Week',
            'Weeks_2' => '2 Weeks',
            'Month' => 'Month',
            'Months_2' => '2 Months',
            'Months_3' => '3 Months',
            'Months_6' => '6 Months',
            'Year' => 'Year',
            'Years_2' => '2 Years',
            'Years_3' => '3 Years',
            'Invoice Date' => 'Invoice Date',
            'Payment Terms' => 'Payment Terms',
            'Due On Receipt' => 'Due On Receipt',
            'days_3' => '+3 days',
            'days_5' => '+5 days',
            'days_7' => '+7 days',
            'days_10' => '+10 days',
            'days_15' => '+15 days',
            'days_30' => '+30 days',
            'days_45' => '+45 days',
            'days_60' => '+60 days',
            'Sales TAX' => 'Sales TAX',
            'None' => 'None',
            'Discount' => 'Discount',
            'Set Discount' => 'Set Discount',
            'Item Code' => 'Item Code',
            'Item Name' => 'Item Name',
            'Qty' => 'Qty',
            'Price' => 'Price',
            'Add blank Line' => 'Add blank Line',
            'Add Product OR Service' => 'Add Product OR Service',
            'Invoice Terms' => 'Invoice Terms',
            'Save Invoice' => 'Save Invoice',
            'Sub Total' => 'Sub Total',
            'TAX' => 'TAX',
            'TOTAL' => 'TOTAL',
            'Due Date' => 'Due Date',
            'List Products' => 'List Products',
            'List Services' => 'List Services',
            'Sales Price' => 'Sales Price',
            'Item Number' => 'Item Number',
            'Add TAX' => 'Add TAX',
            'Rate' => 'Rate',
            'Back To The List' => 'Back To The List',
            'Add Activity' => 'Add Activity',
            'Post' => 'Post',
            'Account Name' => 'Account Name',
            'Subject' => 'Subject',
            'Send' => 'Send',
            'Onetime' => 'Onetime',
            'Unpaid' => 'Unpaid',
            'Paid' => 'Paid',
            'Cancelled' => 'Cancelled',
            'Manage Recurring Invoices' => 'Manage Recurring Invoices',
            'Add Invoice' => 'Add Invoice',
            'Upload Picture' => 'Upload Picture',
            'Use Gravatar' => 'Use Gravatar',
            'No Image' => 'No Image',
            'Picture' => 'Picture',
            'Facebook Profile' => 'Facebook Profile',
            'Google Plus Profile' => 'Google Plus Profile',
            'Linkedin Profile' => 'Linkedin Profile',
            'Accounting Summary' => 'Accounting Summary',
            'Add Custom Field' => 'Add Custom Field',
            'Field Name' => 'Field Name',
            'Field Type' => 'Field Type',
            'Text Box' => 'Text Box',
            'Drop Down' => 'Drop Down',
            'Text Area' => 'Text Area',
            'Optional Description help' => 'Optional Description, will be shown as help block',
            'Regular Expression Validation' => 'Regular Expression Validation String',
            'Comma Separated List' => 'Comma Separated  List for Dropdowns Only',
            'Show in View Invoice' => 'Show in View Invoice?',
            'Yes' => 'Yes',
            'No' => 'No',
            'Validation' => 'Validation',
            'Select Options' => 'Select Options',
            'Edit Custom Field' => 'Edit Custom Field',
            'Application Name' => 'Application Name/ Company Name',
            'This Name will be' => 'This Name will be shown on the Title, Copyright etc.',
            'Theme' => 'Theme',
            'Style' => 'Style',
            'Pay To Address' => 'Pay To Address',
            'You can use html tag' => 'You can use html tag',
            'Invoice Starting' => 'Invoice Starting',
            'Enter to set the next invoice' => 'Enter to set the next invoice number, must be greater than Current auto increment value',
            'Keep Blank for' => 'Keep Blank for no change',
            'This will replace existing logo' => 'This will replace existing logo. You may also change logo by replacing file',
            'User Interface' => 'User Interface',
            'Enable Page Loading Animation' => 'Enable Page Loading Animation?',
            'Enable RTL' => 'Enable RTL?',
            'Logo' => 'Logo',
            'Automation' => 'Automation',
            'Security Token' => 'Security Token',
            'Re Generate Key' => 'Re Generate Key',
            'to_enable_automation' => 'To enable the automation features to run, make sure you set up a cron job to run once per day. (e.g. 9AM).',
            'Create the following Cron Job using GET' => 'Create the following Cron Job using GET:',
            'Or' => 'Or',
            'Create the following Cron Job using PHP' => 'Create the following Cron Job using PHP:',
            'Create the following Cron Job using WGET' => 'Create the following Cron Job using WGET:',
            'Generate Daily Accounting Snapshot' => 'Generate Daily Accounting Snapshot',
            'Generate Recurring Invoices' => 'Generate Recurring Invoices',
            'Enable Email Notifications' => 'Enable Email Notifications',
            'Save Changes' => 'Save Changes',
            'Edit Categories' => 'Edit Categories',
            'Deleting Categories will' => 'Deleting Categories will rename all transactions under this category to Uncategorized',
            'Current Password' => 'Current Password',
            'New Password' => 'New Password',
            'Confirm New Password' => 'Confirm New Password',
            'INVOICE' => 'INVOICE',
            'Total Amount' => 'Total Amount',
            'Invoiced To' => 'Invoiced To',
            'Item' => 'Item',
            'Quantity' => 'Quantity',
            'Related Transactions' => 'Related Transactions',
            'Download PDF' => 'Download PDF',
            'Printable Version' => 'Printable Version',
            'Amount Due' => 'Amount Due',
            'Pay Now' => 'Pay Now',
            'Add Deposit' => 'Add Deposit',
            'Choose an' => 'Choose an',
            'Advanced' => 'Advanced',
            'Choose Contact' => 'Choose Contact',
            'Select Payment Method' => 'Select Payment Method',
            'ref_example' => 'e.g. Transaction ID, Check No.',
            'Recent Deposits' => 'Recent Deposits',
            'Custom Fields' => 'Custom Fields',
            'Custom Fields Not Available' => 'Custom Fields Not Available',
            'Total Database Size' => 'Total Database Size',
            'Download Database Backup' => 'Download Database Backup',
            'Table Name' => 'Table Name',
            'Rows' => 'Rows',
            'Size' => 'Size',
            'Edit TAX' => 'Edit TAX',
            'Active' => 'Active',
            'Inactive' => 'Inactive',
            'Send Email Using' => 'Send Email Using',
            'PHP mail Function' => 'PHP mail() Function',
            'SMTP' => 'SMTP',
            'System Email' => 'System Email',
            'All Outgoing Email Will' => 'All Outgoing Email Will be sent from This Email Address.',
            'SMTP Host' => 'SMTP Host',
            'SMTP Username' => 'SMTP Username',
            'SMTP Password' => 'SMTP Password',
            'SMTP Port' => 'SMTP Port',
            'SMTP Secure' => 'SMTP Secure',
            'TLS' => 'TLS',
            'SSL' => 'SSL',
            'Add Expense' => 'Add Expense',
            'Choose an Account' => 'Choose an Account',
            'Recent Expense' => 'Recent Expense',
            'Manage Categories' => 'Manage Categories',
            'drag_n_drop_help' => 'Drag & drop the Items below for Repositioning. Click to Edit.',
            'Reset Password' => 'Reset Password',
            'Back To Login' => 'Back To Login',
            'Email Address' => 'Email Address',
            'Related Emails' => 'Related Emails',
            'Invoice' => 'Invoice',
            'Send Email' => 'Send Email',
            'Invoice Created' => 'Invoice Created',
            'Invoice Payment Reminder' => 'Invoice Payment Reminder',
            'Invoice Overdue Notice' => 'Invoice Overdue Notice',
            'Invoice Payment Confirmation' => 'Invoice Payment Confirmation',
            'Invoice Refund Confirmation' => 'Invoice Refund Confirmation',
            'Mark As' => 'Mark As',
            'Partially Paid' => 'Partially Paid',
            'Add Payment' => 'Add Payment',
            'Preview' => 'Preview',
            'PDF' => 'PDF',
            'View PDF' => 'View PDF',
            'Print' => 'Print',
            'Subtotal' => 'Subtotal',
            'Grand Total' => 'Grand Total',
            'Search by Name' => 'Search by Name',
            'Search' => 'Search',
            'Add New Contact' => 'Add New Contact',
            'Filter by Tags' => 'Filter by Tags',
            'n_a' => 'n/a',
            'Records' => 'Records',
            'List Invoices' => 'List Invoices',
            'Add Recurring Invoice' => 'Add Recurring Invoice',
            'Due' => 'Due',
            'Next Invoice' => 'Next Invoice',
            'Stop Recurring' => 'Stop Recurring',
            'Add Tax' => 'Add Tax',
            'Tax Rate' => 'Tax Rate',
            'Default Country' => 'Default Country',
            'Date Format' => 'Date Format',
            'Currency Format' => 'Currency Format',
            'Currency Code' => 'Currency Code',
            'Keep it blank if currency code' => 'Keep it blank if you do not want to show currency code',
            'Charset n Collation' => 'Charset & Collation',
            'Set Charset n Collation' => 'Set Charset & Collation For Database Tables',
            'Sign in' => 'Sign in',
            'Forgot password' => 'Forgot password ?',
            'Edit Transaction' => 'Edit Transaction',
            'Add User' => 'Add User',
            'Access Level' => 'Access Level',
            'Full Access' => 'Full Access',
            'Loading Users' => 'Loading Users',
            'Add Payee' => 'Add Payee',
            'Manage Payees' => 'Manage Payees',
            'Edit Payee' => 'Edit Payee',
            'Edit Payer' => 'Edit Payer',
            'Add Payer' => 'Add Payer',
            'Manage Payers' => 'Manage Payers',
            'Reorder Payment Gateways' => 'Reorder Payment Gateways Position',
            'Gateway Name' => 'Gateway Name',
            'Setting Name' => 'Setting Name',
            'Value' => 'Value',
            'Reorder' => 'Reorder',
            'Positions' => 'Positions',
            'Settings Name' => 'Settings Name',
            'Custom Param 1' => 'Custom Param 1',
            'Conversion Rate' => 'Conversion Rate',
            'Custom Param 2' => 'Custom Param 2',
            'Custom Param 3' => 'Custom Param 3',
            'Custom Param 4' => 'Custom Param 4',
            'Custom Param 5' => 'Custom Param 5',
            'Add Payment Methods' => 'Add Payment Methods',
            'Manage Payment Methods' => 'Manage Payment Methods',
            'Edit Payment Methods' => 'Edit Payment Methods',
            'Click Here to Print' => 'Click Here to Print',
            'Add Product' => 'Add Product',
            'Add Service' => 'Add Service',
            'List' => 'List',
            'Expense Summary' => 'Expense Summary',
            'Total Expense This Month' => 'Total Expense This Month',
            'Total Expense This Week' => 'Total Expense This Week',
            'Total Expense Last 30 days' => 'Total Expense Last 30 days',
            'Last 20 deposit Expense' => 'Last 20 deposit/ Expense',
            'Dr.' => 'Dr.',
            'Monthly Expense Graph' => 'Monthly Expense Graph',
            'Income Summary' => 'Income Summary',
            'Total Income This Month' => 'Total Income This Month',
            'Total Income This Week' => 'Total Income This Week',
            'Total Income Last 30 days' => 'Total Income Last 30 days',
            'Last 20 deposit Income' => 'Last 20 deposit/ Income',
            'Monthly Income Graph' => 'Monthly Income Graph',
            'Reports Income Vs Expense' => 'Reports- Income Vs Expense',
            'Income minus Expense' => 'Income - Expense',
            'Income Vs Expense This Year' => 'Income Vs Expense This Year',
            'View Statement' => 'View Statement',
            'From Date' => 'From Date',
            'To Date' => 'To Date',
            'Export for Print' => 'Export for Print',
            'Export to PDF' => 'Export to PDF',
            'Tag' => 'Tag',
            'New Transfer' => 'New Transfer',
            'Recent Transfers' => 'Recent Transfers',
            'Add New User' => 'Add New User',
            'User' => 'User',
            'Full Administrator' => 'Full Administrator',
            'Choose User Type' => 'Choose User Type Employee to disable Settings access',
            'Confirm Password' => 'Confirm Password',
            'Edit User' => 'Edit User',
            'Clear Old Data' => 'Clear Old Data',
            'UID' => 'UID',
            'IP' => 'IP',
            'ID' => 'ID',
            'Total Email Sent' => 'Total Email Sent',
            'Sent To' => 'Sent To',
            'Back To Emails' => 'Back To Emails',
            'Settings Saved Successfully' => 'Settings Saved Successfully',
            'New Goal has been set' => 'New Goal has been set',
            'Choose the Traget Account' => 'Please choose the Traget Account',
            'See All Activity' => 'See All Activity',
            'Item Added Successfully' => 'Item Added Successfully',
            'Password changed successfully' => 'Password changed successfully, Please login again',
            'Data Updated' => 'Data Updated!',
            'Transaction Added Successfully' => 'Transaction Added Successfully',
            'Invalid Number' => 'Invalid Number',
            'Logs has been deleted' => 'Logs older than 30 days has been deleted',
            'Password Reset Key Expired' => 'Password Reset Key Expired',
            'Payment Cancelled' => 'Payment Cancelled',
            'Custom Field Deleted Successfully' => 'Custom Field Deleted Successfully',
            'Plugin Not Found' => 'Plugin Not Found',
            'You do not have permission' => 'You do not have permission to access this page',
            'disabled_in_demo' => 'This Option is disabled in the Demo Mode',
            'All Fields are Required' => 'All Fields are Required',
            'Invalid System Email' => 'Invalid System Email',
            'smtp_fields_error' => 'SMTP Username, Password and Port is required',
            'Charset Saved Successfully' => 'Charset Saved Successfully',
            'password_length_error' => 'New Password must be 6 to 14 character',
            'Both Password should be same' => 'Both Password should be same',
            'Incorrect Current Password' => 'Incorrect Current Password',
            'Invalid Logo File' => 'Invalid Logo File',
            'Invalid TAX Rate' => 'Invalid TAX Rate',
            'New TAX Added' => 'New TAX Added',
            'TAX Not Found' => 'TAX Not Found',
            'cron_new_key' => 'New Key Generated. Please Make Sure to Update The CRON Jobs.',
            'cron_notification' => 'Please Use a valid Email Address to enable Notification',
            'Select' => 'Select',
            'Close' => 'Close',
            'Update' => 'Update',
            'OK' => 'OK',
            'Terms' => 'Terms',
            'PDF Font' => 'PDF Font',
            'pdf_font_help_default' => 'Default [Faster PDF Creation with Less Memory]',
            'pdf_font_help_helvetica' => 'Helvetica',
            'pdf_font_help_dejavusanscondensed' => 'dejavusanscondensed [Embed fonts with supports UTF8]',
            'Invoice Total' => 'Invoice Total',
            'Total Paid' => 'Total Paid',
            'Unique Invoice URL' => 'Unique Invoice URL',
            'Company Name' => 'Company Name',
            'ATTN' => 'ATTN',
            'Payment Successful' => 'Payment Successful',
            'Plugins' => 'Plugins',
            'Installing Plugin' => 'Installing Plugin',
            'Uninstalling Plugin' => 'Uninstalling Plugin',
            'Activating Plugin' => 'Activating Plugin',
            'Deactivating Plugin' => 'Deactivating Plugin',
            'Deleting Plugin' => 'Deleting Plugin',
            'Upload Plugin' => 'Upload Plugin',
            'Unzipping' => 'Unzipping',
            'Plugin Added' => 'Plugin Added',
            'No Plugins Available' => 'No Plugins Available',
            'Quotes' => 'Quotes',
            'Quote' => 'Quote',
            'Choose Features' => 'Choose Features',
            'Accounting' => 'Accounting',
            'Invoicing' => 'Invoicing',
            'Enable Client Dashboard' => 'Enable Client Dashboard / Portal',
            'quote_alias' => 'Create New Quote / Proposal / Estimate',
            'Date Created' => 'Date Created',
            'Expiry Date' => 'Expiry Date',
            'Stage' => 'Stage',
            'Draft' => 'Draft',
            'Delivered' => 'Delivered',
            'Accepted' => 'Accepted',
            'On Hold' => 'On Hold',
            'Lost' => 'Lost',
            'Dead' => 'Dead',
            'Reports by Category' => 'Reports by Category',
            'January' => 'January',
            'February' => 'February',
            'March' => 'March',
            'April' => 'April',
            'May' => 'May',
            'June' => 'June',
            'July' => 'July',
            'August' => 'August',
            'September' => 'September',
            'October' => 'October',
            'November' => 'November',
            'December' => 'December',
            'Discount Type' => 'Discount Type',
            'Percentage' => 'Percentage',
            'Fixed Amount' => 'Fixed Amount',
            'Page' => 'Page',
            'of' => 'of',
            'Loading' => 'Loading',
            'Payment' => 'Payment',
            'Recipient' => 'Recipient',
            'Proposal Text' => 'Proposal Text',
            'quote_help_top' => 'Displayed at the Top of the Quote',
            'quote_help_footer' => 'Displayed as a Footer to the Quote',
            'Customer Notes' => 'Customer Notes',
            'Save n Close' => 'Save & Close',
            'Quote Created' => 'Quote Created',
            'Convert to Invoice' => 'Convert to Invoice',
            'Quote Prefix' => 'Quote Prefix',
            'quote_number_help' => 'Keep it Blank to Generate Quote Number Automatically',
            'invoice_number_help' => 'Keep it Blank to Generate Invoice Number Automatically',
            'Public Key' => 'Public Key',
            'Private Key' => 'Private Key',
            'Default Account' => 'Default Account',
            'live or sandbox' => 'live or sandbox',
            'plugin_drop_help' => 'Drop Plugin here or click to upload',
            'plugin_upload_help' => '(Upload Plugin zip file)',
            'Admin' => 'Admin',
            'Message Body' => 'Message Body',
            'Invoice:Invoice Created' => 'Invoice - Invoice Created',
            'Admin:Password Change Request' => 'Admin - Password Change Request',
            'Admin:New Password' => 'Admin - New Password',
            'Invoice:Invoice Payment Reminder' => 'Invoice - Invoice Payment Reminder',
            'Invoice:Invoice Overdue Notice' => 'Invoice - Invoice Overdue Notice',
            'Invoice:Invoice Payment Confirmation' => 'Invoice - Invoice Payment Confirmation',
            'Invoice:Invoice Refund Confirmation' => 'Invoice - Invoice Refund Confirmation',
            'Quote:Quote Created' => 'Quote - Quote Created',
            'Send Notifications To' => 'Send Notifications To',
            'No results found' => 'No results found',
            'Quote Deleted Successfully' => 'Quote Deleted Successfully',
            'Create New Quote' => 'Create New Quote',
            'notice_email_as_username' => 'Please use a valid Email address as Username',
            'API' => 'API',
            'API Access' => 'API Access',
            'Add API Access' => 'Add API Access',
            'Label' => 'Label',
            'API Key' => 'API Key',
            'Regenerate' => 'Regenerate',
            'Application URL' => 'Application URL',
            'API Access Added' => 'API Access Added',
            'select_a_contact' => 'Please select a Contact',
            'at_least_one_item_required' => 'At least one item is required',
            'Subject is Required' => 'Subject is Required',
            'Unique Quote URL' => 'Unique Quote URL',
            'Default Invoice Terms' => 'Default Invoice Terms',
            'Additional Settings' => 'Additional Settings',
            'cron_invoice_created' => 'Automatically email recurring invoices',
            'Invoice Creation Method' => 'Invoice Creation Method',
            'Default' => 'Default',
            'V2' => 'V2',
            'CRON Log' => 'CRON Log',
            'Message' => 'Message',
            'Recent Invoices' => 'Recent Invoices',
            'About' => 'About',
            'Or Install from URL' => 'Or Install from URL',
            'Fold Sidebar Default' => 'Fold Sidebar by Default ?',
            'Hide Footer Copyright' => 'Hide Footer Copyright ?',
            'Filter' => 'Filter',
            'Back' => 'Back',
            'Account Number' => 'Account Number',
            'Contact Person' => 'Contact Person',
            'Internet Banking URL' => 'Internet Banking URL',
            'Cc' => 'Cc',
            'Bcc' => 'Bcc',
            'Mode' => 'Mode',
            'Live' => 'Live',
            'Sandbox' => 'Sandbox',
            'Drop CSV File Here' => 'Drop CSV File Here',
            'Or Click to Upload' => 'Or Click to Upload',
            'Importing' => 'Importing',
            'Import Contacts' => 'Import Contacts',
            'Download Sample File' => 'Download Sample File',
            'Group' => 'Group',
            'Groups' => 'Groups',
            'Add New Group' => 'Add New Group',
            'Group Name' => 'Group Name',
            'Group Deleted Successfully' => 'Group Deleted Successfully',
            'Welcome Email' => 'Welcome Email',
            'Client:Client Signup Email' => 'Client Signup Email',
            'Send Client Signup Email' => 'Set Yes to send Client Signup Email.',
            'Profile' => 'Profile',
            'Download' => 'Download',
            'Legacy' => 'Legacy',
            'New' => 'New',
            'Default Landing Page' => 'Default Landing Page',
            'Admin Login' => 'Admin Login',
            'Client Login' => 'Client Login',
            'Recent Quotes' => 'Recent Quotes',
            'Recent Transactions' => 'Recent Transactions',
            'URL Rewrite' => 'URL Rewrite',
            'Currency Symbol' => 'Currency Symbol',
            'Home Currency' => 'Home Currency',
            'Currency Symbol Position' => 'Currency Symbol Position',
            'Left' => 'Left',
            'Right' => 'Right',
            'Currency Decimal Digits' => 'Currency Decimal Digits',
            'Thousand Separator Placement' => 'Thousand Separator Placement',
            'Or Cancel' => 'Or Cancel',
            'Send Bcc to Admin' => 'Send Bcc to Admin? Click Here.',
            'Attach PDF' => 'Attach PDF?',
            'Cash Flow' => 'Cash Flow',
            'Jan' => 'Jan',
            'Feb' => 'Feb',
            'Mar' => 'Mar',
            'Apr' => 'Apr',
            'Jun' => 'Jun',
            'Jul' => 'Jul',
            'Aug' => 'Aug',
            'Sep' => 'Sep',
            'Oct' => 'Oct',
            'Nov' => 'Nov',
            'Dec' => 'Dec',
            'Last 12 Months' => 'Last 12 Months',
            'Data View' => 'Data View',
            'Refresh' => 'Refresh',
            'Reset' => 'Reset',
            'Save as Image' => 'Save as Image',
            'Click to Save' => 'Click to Save',
            'Average' => 'Average',
            'Line' => 'Line',
            'Bar' => 'Bar',
            'Net Worth' => 'Net Worth',
            'Check for Update' => 'Check for Update',
            'Response' => 'Response',
            'Site Key' => 'Site Key',
            'Secret Key' => 'Secret Key',
            'Enable Recaptcha' => 'Enable reCAPTCHA',
            'Recaptcha' => 'reCAPTCHA',
            'Recaptcha Verification Failed' => 'Please verify that you are not a robot.',
            'Client Portal Custom Scripts' => 'Client Portal Custom Scripts',
            'Header Scripts' => 'Header Scripts',
            'Footer Scripts' => 'Footer Scripts',
            'Received' => 'Received',
            'System Status' => 'System Status',
            'Application Environment' => 'Application Environment',
            'Server Environment' => 'Server Environment',
            'Integration Code' => 'Integration Code',
            'Client Registration' => 'Client Registration',
            'Register' => 'Register',
            'Notes' => 'Notes',
            'Quick Notes' => 'Quick Notes',
            'Whats on your mind' => 'What\'s on your mind?',
            'Team' => 'Team',
            'Last Activity' => 'Last Activity',
            'Content Animation' => 'Content Animation',
            'Appearance' => 'Appearance',
            'Customize' => 'Customize',
            'Editor' => 'Editor',
            'Language Editor' => 'Language Editor',
            'Themes' => 'Themes',
            'Select File to Edit' => 'Select File to Edit',
            'File' => 'File',
            'Language File' => 'Language File',
            'Invoice Layout Print' => 'Invoice Layout: Print',
            'Invoice Layout PDF' => 'Invoice Layout: PDF',
            'Please Choose a File' => 'Please Choose a File',
            'Profit' => 'Profit',
            'Loss' => 'Loss',
            'Revenue' => 'Revenue',
            'Outstanding' => 'Outstanding',
            'Payments' => 'Payments',
            'Transaction ID' => 'Transaction ID',
            'Customers' => 'Customers',
            'Companies' => 'Companies',
            'Currencies' => 'Currencies',
            'Permission' => 'Permission',
            'Staff' => 'Staff',
            'Roles' => 'Roles',
            'New Role' => 'New Role',
            'Role name is required' => 'Role name is required',
            'Tasks' => 'Tasks',
            'Calendar' => 'Calendar',
            'Leads' => 'Leads',
            'Orders' => 'Orders',
            'Currency' => 'Currency',
            'New Currency' => 'New Currency',
            'Base Conversion Rate' => 'Base Conversion Rate',
            'Currency Example' => 'Currency ISO Code, eg. USD, GBP, INR etc...',
            'Make Base Currency' => 'Make Base Currency',
            'Base Currency' => 'Base Currency',
            'New Company' => 'New Company',
            'URL' => 'URL',
            'Logo URL' => 'Logo URL',
            'Company Name is required' => 'Company Name is required.',
            'Event Name' => 'Event Name',
            'Priority' => 'Priority',
            'Owner' => 'Owner',
            'Start Date' => 'Start Date',
            'End Date' => 'End Date',
            'Start Time' => 'Start Time',
            'End Time' => 'End Time',
            'All day event' => 'All day event',
            'Related Contacts' => 'Related Contacts',
            'Add Event' => 'Add Event',
            'Color' => 'Color',
            'Image' => 'Image',
            'Create' => 'Create',
            'Avatar' => 'Avatar',
            'Attach File' => 'Attach File',
            'Drop File Here' => 'Drop File Here',
            'Click to Upload' => 'Or Click to Upload',
            'Import' => 'Import',
            'Export' => 'Export',
            'Phone number already exist' => 'Phone number already exist.',
            'Favicon' => 'Favicon',
            'Upload' => 'Upload',
            'Remember me' => 'Keep me signed in',
            'Accept' => 'Accept',
            'Decline' => 'Decline',
            'Terminal' => 'Terminal',
            'Customers View Mode' => 'Customers View Mode',
            'Table' => 'Table',
            'Card' => 'Card',
            'Your last login was' => 'Your last login was',
            'Documents' => 'Documents',
            'List All Orders' => 'List All Orders',
            'Add New Order' => 'Add New Order',
            'Order' => 'Order',
            'Product_Service' => 'Product/Service',
            'Billing Cycle' => 'Billing Cycle',
            'Free' => 'Free',
            'One Time' => 'One Time',
            'Semi-Annually' => 'Semi-Annually',
            'Annually' => 'Annually',
            'Biennially' => 'Biennially',
            'Triennially' => 'Triennially',
            'Pending' => 'Pending',
            'Generate Invoice' => 'Generate Invoice',
            'Item Not Found' => 'Item Not Found',
            'Available Module for this Order' => 'Available Module for this Order',
            'Order Number' => 'Order Number',
            'New Document' => 'New Document',
            'Title' => 'Title',
            'Server Config' => 'Server Config',
            'Upload Maximum Size' => 'Upload Maximum Size',
            'POST Maximum Size' => 'POST Maximum Size',
            'Uploaded Successfully' => 'Uploaded Successfully',
            'Secure Download Link' => 'Secure Download Link',
            'Files' => 'Files',
            'Assign File' => 'Assign File',
            'Activation Message' => 'Activation Message',
            'Email Sent' => 'Email Sent',
            'Downloads' => 'Downloads',
            'Create Auto Login URL' => 'Create Auto Login URL',
            'Created Successfully' => 'Created Successfully',
            'Auto Login URL' => 'Auto Login URL',
            'Login As Customer' => 'Login As Customer',
            'Revoke Auto Login' => 'Revoke Auto Login',
            'Re Generate URL' => 'Re Generate URL',
            'Contact' => 'Contact',
            'All' => 'All',
            'Date Range' => 'Date Range',
            'Available for all Customers' => 'Available for all Customers',
            'Proof Of Payment' => 'Proof Of Payment',
            'My Orders' => 'My Orders',
            'Place New Order' => 'Place New Order',
            'Cost Price' => 'Cost Price',
            'Inventory To Add Subtract' => 'Inventory To Add/Subtract',
            'Unit' => 'Unit',
            'Units' => 'Units',
            'Units of measurement' => 'Units of measurement',
            'Create New' => 'Create New',
            'Reference' => 'Reference',
            'Conversion Factor' => 'Conversion Factor',
            'SKU' => 'SKU',
            'Weight' => 'Weight',
            'Show quantity as' => 'Show quantity as',
            'New Lead' => 'New Lead',
            'Import Leads' => 'Import Leads',
            'Source' => 'Source',
            'Salutation' => 'Salutation',
            'First Name' => 'First Name',
            'Middle Name' => 'Middle Name',
            'Last Name' => 'Last Name',
            'Industry' => 'Industry',
            'No. of Employees' => 'No. of Employees',
            'Public' => 'Public',
            'Company' => 'Company',
            'Street' => 'Street',
            'Memo' => 'Memo',
            'Convert to Customer' => 'Convert to Customer',
            'Buy Now' => 'Buy Now',
            'Store' => 'Store',
            'Add to Cart' => 'Add to Cart',
            'Copy' => 'Copy',
            'Unknown' => 'Unknown',
            'Access Log' => 'Access Log',
            'Browser' => 'Browser',
            'Time' => 'Time',
            'Invoice Access Log' => 'Invoice Access Log',
            'Clone' => 'Clone',
            'Cloned successfully' => 'Cloned successfully',
            'Media' => 'Media',
            'Inventory' => 'Inventory',
            'Available' => 'Available',
            'Published' => 'Published',
            'No Data Available' => 'No Data Available',
            'Send SMS' => 'Send SMS',
            'Call' => 'Call',
            'Saved Successfully' => 'Saved Successfully',
            'System' => 'System',
            'Custom' => 'Custom',
            'Choose from Template' => 'Choose from Template',
            'Add New Template' => 'Add New Template',
            'Assign to Group' => 'Assign to Group',
            'Select Group' => 'Select Group',
            'Empty' => 'Empty',
            'Related To' => 'Related To',
            'Add New' => 'Add New',
            'Add Fund' => 'Add Fund',
            'Back to Client Area' => 'Back to Client Area',
            'Manual Credit' => 'Manual Credit',
            'Log' => 'Log',
            'Client' => 'Client',
            'All Data' => 'All Data',
            'Sales target' => 'Sales target',
            'Invoice issued' => 'Invoice issued',
            'Currency Exchange' => 'Currency Exchange',
            'Select Currency' => 'Select Currency',
            'POS' => 'POS',
            'Paying as' => 'Paying as',
            'Total Invoice Amount' => 'Total Invoice Amount',
            'Total Paid Amount' => 'Total Paid Amount',
            'Total Un Paid Amount' => 'Total Un Paid Amount',
            'Purchase' => 'Purchase',
            'Purchase Orders' => 'Purchase Orders',
            'Create Purchase Order' => 'Create Purchase Order',
            'Items' => 'Items',
            'Projects' => 'Projects',
            'Suppliers' => 'Suppliers',
            'Support' => 'Support',
            'HRM' => 'HRM',
            'Warehouse' => 'Warehouse',
            'Maximum' => 'Maximum',
            'Minimum' => 'Minimum',
            'Barcode' => 'Barcode',
            'Total Item' => 'Total Item',
            'Add Item' => 'Add Item',
            'Item Sold' => 'Item Sold',
            'Total Invoice' => 'Total Invoice',
            'Sales Count' => 'Sales Count',
            'Expense by Category' => 'Expense by Category',
            'Total Invoice Paid' => 'Total Invoice Paid',
            'View Reports' => 'View Reports',
            'Add Supplier' => 'Add Supplier',
            'List Suppliers' => 'List Suppliers',
            'Receipt' => 'Receipt',
            'Invoices Vs Expense' => 'Invoices Vs Expense',
            'Open New Ticket' => 'Open New Ticket',
            'Tickets' => 'Tickets',
            'Predefined Replies' => 'Predefined Replies',
            'Departments' => 'Departments',
            'Open Ticket' => 'Open Ticket',
            'Department' => 'Department',
            'Knowledgebase' => 'Knowledgebase',
            'New Article' => 'New Article',
            'All Articles' => 'All Articles',
            'New Purchase Order' => 'New Purchase Order',
            'Expense Types' => 'Expense Types',
            'Receipt Number' => 'Receipt Number',
            'Supplier' => 'Supplier',
            'Tools' => 'Tools',
            'Make Payment' => 'Make Payment',
            'Fax' => 'Fax',
            'Business Number' => 'Business Number',
            'Issued at' => 'Issued at',
            'Make Default' => 'Default',
            'SMS' => 'SMS',
            'Send Single SMS' => 'Send Single SMS',
            'Send Bulk SMS' => 'Send Bulk SMS',
            'Inbox' => 'Inbox',
            'Sent' => 'Sent',
            'SMS Templates' => 'SMS Templates',
            'Notifications' => 'Notifications',
            'SMS Drivers' => 'SMS Drivers',
            'Quote Accepted' => 'Quote Accepted',
            'Quote Cancelled' => 'Quote Cancelled',
            'Profile Picture' => 'Profile Picture',
            'Show Watermark' => 'Show Watermark',
            'already exist' => 'already exist',
            'Show Country Flag' => 'Show Country Flag ?',
            'Password Manager' => 'Password Manager',
            'New Entry' => 'New Entry',
            'Tax' => 'Tax',
            'Credit Card Information' => 'Credit Card Information',

            'Daily' => 'Daily',
            'Weeks_3' => '3 Weeks',
            'Weeks_4' => '4 Weeks',

            'optional' => 'optional',

            'Dont have an account' => 'Don\'t have an account?',
            'Already registered' => 'Already Registered?',

        ];

        // require 'system/i18n/en.php';

        $tr = new TranslateClient('en', $lan);

        foreach ($_L as $k => $v){


            $r = $tr->translate($v);

            echo '\''.$k.'\''.' => '.'\''.$r.'\''.',
';
        }


        break;

}