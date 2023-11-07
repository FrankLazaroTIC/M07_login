# M07_login
ACTIVITAT

Seguint la pràctica anterior:

Haurem de modificar la pàgina de:
index.php
mostrar info.php.

Haurem de crear dos fitxers nous:
idioma.php -> on guardarem el valor de l’idioma seleccionat en una cookie.
delete.php -> eliminarem la cookie.

El funcionament serà igual fins arribar a la pàgina de index.php.

A index.php:
Haurem d’afegir 4 enllaços: Cat, Es, Eng i Eliminar.
Per defecte, un dels idiomes haurà d’estar seleccionat de color vermell.
Al seleccionar l’idioma s’haurà de mostrar el títol de la pàgina, els enllaços de la pàgina i les capçaleres amb l’idioma seleccionat.
S’haurà de quedar de color vermell l’enllaç de l’idioma seleccionat.
Al seleccionar eliminar cookies,  haurà de quedar la pàgina per defecte.

mostrarinfo.php:
S’haurà de traduir l’idioma de la pàgina segons l’idioma seleccionat en l’index.php.

idioma.php:
Al seleccionar un idioma de la pàgina index.php haurem d’anar a parar a aquesta pàgina.
Recuperarem el valor de l’idioma pel mètode GET.
Guardarem en una cookie el valor de l’idioma seleccionat que durarà 10 minuts.
Redireccionem a la pantalla index.php.
Segons l’idioma guardat en la cookie haurem de traduir el títol, els enllaços “ mostrar informació “ i “desconnectar” a l’idioma seleccionat.
L’enllaç de l’idioma seleccionat ha de quedar de color vermell. Els altres han de quedar de color negre.

delete.php
Al seleccionar del cookies, eliminarem la cookie i la pantalla haurà de quedar de la forma habitual.
