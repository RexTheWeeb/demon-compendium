Changelog:

2 November:
Eigen login en registratie pagina gemaakt en gelinkt.
Kleine CSS aanpassingen gemaakt en CSS problemen zoals verkeerd uitgelijnde tekst opgelost.

1 November:
Contact pagina placeholder verwijderd.
Admin wordt beschikbaar na 10 demonen.
Home pagina gevuld met data.

29 Oktober:
Admin rol aangemaakt.
Permissies aangepast voor gebruiker en admin.
Registratie stuurt je nu naar de home page.

28 Oktober:
CSS opmaak voor overige pagina's (Update, create.)
Authenticatie toegevoegd voor update, create en delete.
Profiel pagina aangemaakt.
Login stuurt je nu naar de home page.

26 Oktober:
Alles gepusht naar GitHub want ik vergeet het steeds. 

25 Oktober:
CSS opmaak van de details pagina.
Delete optie gemaakt.

22 Oktober:
CSS van de demon list gemaakt.
Layout CSS gemaakt.

15 Oktober:
Basis authenticatie toegevoegd voor het toevoegen van demonen.
Database voor rassen toegevoegd.
Toevoeging form aangepast om een drop-down menu met de rassen te bevatten en alignment automatisch in te vullen gebaseerd op het ras.
Basis update en edit functionaliteit toegevoegd.

14 Oktober:
Models aangemaakt.
Demons database aangemaakt.

13 Oktober:
Layout gemaakt voor navigatie.

8 Oktober:
Basis onderdelen toegevoegd om te beginnen (demonen index en controller.)



ERD:

Users Table

id (int, primary key)

name (varchar)

email (varchar)

email_verified_at (datetime, nullable)

password (varchar)

is_admin (tinyint, default 0)

remember_token (varchar, nullable)

created_at (datetime)

updated_at (datetime)

Relaties:

One-many (users.id → demons.added_by).


Demons Table

id (int, primary key)

name (varchar)

origin (varchar)

race_id (int, foreign key → races.id)

alignment (varchar)

description (varchar)

image_url (varchar)

added_by (int, foreign key → users.id)

visible (int, default 1)

created_at (datetime)

updated_at (datetime)

Relaties:

One user.

One race.


Races Table

id (int, primary key)

name (varchar)

alignment (varchar)

created_at (datetime)

updated_at (datetime)

Relaties:

One-many (races.id → demons.race_id).

User stories:
User Story 1:

Als gebruiker van de site,
wil ik de mogelijkheid om te filteren,
zodat ik precies kan vinden welke figuren ik allemaal over wil lezen.

User Story 2:

Als bewerker van de site,
wil ik de mogelijkheid om gegevens te bewerken,
zodat ik inaccurate informatie, typefouten en dergelijke kan fixen.

User Story 3:

Als gebruiker van de site,
wil ik de details over de demonen kunnen bekijken,
zodat ik meer kan lezen over die bizarre wezens.
