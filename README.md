# M07_login
# ACTIVITAT

Mitjançant un formulari en PHP (amb totes les etiquetes HTML en format DOCTYPE), afegeix les dades dels usuaris (estudiants i professors) utilitzant el mètode procedural.

Utilitza PHPMyAdmin per crear una base de dades anomenada "Users" i una taula anomenada "user".

A la taula "user", afegeix dades d'estudiants i professors des d'un programa en PHP connectant-te a la base de dades "Users".

Dades d'estudiants/professors que han d'estar al formulari:
- user_id (PK INT)
- name (VARCHAR, 255)
- surname (VARCHAR, 255)
- password (VARCHAR, 255)
- email (VARCHAR, 255)
- rol (estudiant, professor) (ENUM)
- active (si l'usuari està actiu o bloquejat) (BOOL)

La pràctica constarà de:
1. Un fitxer HTML pel formulari. Contindrà el formulari segons els camps indicats anteriorment. S'enviarà la informació a través de POST al fitxer PHP.

2. Un fitxer PHP per les gestions de les bases de dades. Contindrà la connexió i les consultes a les bases de dades, codi defensiu i el tancament de la connexió.

3. Un fitxer PHP pel resultat. Informarà del resultat final del procés d'afegir un usuari. Si tot el procés ha anat bé, un cop feta la inserció de l'usuari a les bases de dades, s'ha de redirigir a una pàgina simple on només apareixerà el text "S'ha guardat l'usuari correctament".