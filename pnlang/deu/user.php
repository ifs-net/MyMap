<?php
/**
 * @package      MyMap
 * @version      $Id$
 * @author       Florian Schie�l
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
// account settings panel
define('_MYMAPMYMAPS',					'Meine Karten und Routen');	
// needle and insert code part
define('_MYMAPNOSCRIPTMESSAGE',			'Bitte Javascript aktivieren um die hier eingebundene Karte anzeigen zu lassen');
define('_MYMAPMAPNOTFOUND',				'Angegebene Karte nicht gefunden');
define('_MYMAPHOOKREGISTERFAILED',		'Das Initialisieren des Hooks schlug fehl');
define('_MYMAPHOOKDELETEFAILED',		'Das L�schen des Hooks schlug fehl');
define('_MYMAPHOOKDISPLAYERROR',		'Es ist ein Fehler in der Hook-Funktion von MyMap aufgetreten');
define('_MYMAPMAPERROR',				'MyMap - Fehler');
define('_MYMAPMAPIDNOTFOUND',			'Die Karte mit der �bergebenen ID-Nummer konnte nicht gefunden werden');
define('_MYMAPEXPLAINHOOKERR',			'Was bedeutet das, wenn ich das lesen kann? Der Autor der Seite (welcher aber nicht der Administrator der Gesamtseite sein muss!) hat wohl einen Fehler gemacht. Schicke ihm doch ein kleines, liebes Email und weise ihn darauf hin ;-)');
// main 
define('_MYMAPWELCOMETOMYMAP',			'MyMap - grafische Karten mit Markern und Routen erstellen');
define('_MYMAPEXPLAINMYMAP',			'Mit diesem Modul kannst Du eigene Karten anlegen und verwalten. Das heisst genauer, diese k�nnen mit Markern, Texten etc. bef�llt werden. So sind diese sehr vielf�ltig einsetzbar. Eine angelegte Karte kann dann auch in andere Bereiche dieser Seite einfach eingebunden werden. So kann man z.B. Karten in Forenpostings und Weblog-Beitr�ge einbinden.');
define('_MYMAPADDNEWMAP',				'Eine neue Karte anlegen');
define('_MYMAPMYMAPS',					'Map-Management');
define('_MYMAPMANAGEMAPS',				'Hier k�nnen bestehende, angelegte karten verwaltet werden');
define('_MYMAPNOMAP',					'Sie haben noch keine Karten angelegt');
define('_MYMAPEDIT',					'modifizieren');
define('_MYMAPDELETE',					'l�schen');
define('_MYMAPSHOW',					'Karte bearbeiten (Wegpunkt- und Marker-Management)');
// routes
define('_MYMAPROUTEMANAGMENT',			'Wegpunkt-/Routen-Management');
define('_MYMAPROUTESINTRO',				'Es k�nnen Routen in die Karte eingezeichnet werden. Zwischen allen angelegten Wegpunkten wird eine Linie gezogen.');
define('_MYMAPADDCOORDINATE',			'hinzuf�gen');
define('_MYMAPORIMPORT',				'oder die Import-Funktion f�r den Import von GPX-Daten nutzen (den "hinzuf�gen"-Button nach der Dateiauswahl bet�tigen!)');
define('_MYMAPIMPORTERROR',				'Beim Versuch, die Datei zu importieren, ist ein Fehler aufgetreten');
define('_MYMAPIMPORTSUCCESSFULL',		'Die Datei wurde importiert');
define('_MYMAPNUMSOFWPS',				'Anzahl der gespeicherten Wegpunkte');
define('_MYMAPWAYPOINTADDED',			'Neuer Wegpunkt wurde hinzugef�gt');
define('_MYMAPWAYPOINTSDELETED',		'Es wurden alle mit dieser Karte verkn�pften Wegpunkte entfernt!');
define('_MYMAPWAYPOINTSDELETIONERROR',	'Es ist ein Fehler beim L�schen von Wegpunkten aufgetreten');
define('_MYMAPWAYPOINTDELETED',			'Der Wegpunkt wurde erfolgreich entfernt');
define('_MYMAPDELETEALLWAYPOINTS',		'Alle Wegpunkte l�schen');
define('_MYMAPDELETELASTWAYPOINT',		'letzten Wegpunkt entfernen');
define('_MYMAPACTIONS',					'Aktionen');
define('_MYMAPBACKTOMAP',				'Zur�ck zum Marker-Management der Karte');
define('_MYMPUPLOADERROR',				'Es ist eine leere Datei �bermittelt worden oder ein andere Fehler w�hrend des Uploads aufgetreten');
define('_MYMAPORADDWAYPOINT',			'oder einen einzelnen Wegpunkt hinzuf�gen');
// edit
define('_MYMAPTITLE',					'Titel');
define('_MYMAPDESCRIPTION',				'Beschreibung');
define('_MYMAPWIDTH',					'Breite der Karte in Pixeln');
define('_MYMAPHEIGHT',					'H�he der Karte in Pixeln');
define('_MYMAPZOOMFACTOR',				'Zoomfaktor f�r die Karte (1 = gr��ter Zoom)');
define('_MYMAPWIKI',					'Sollen andere Mitglieder dieser Community in der Karte eigene Marker hinzuf�gen k�nnen?');
define('_MYMAPYES',						'Ja');
define('_MYMAPNO',						'Nein');
define('_MYMAPHYBRID',					'Hybrid');
define('_MYMAPNORMAL',					'Normal / Stra�e');
define('_MYMAPSATELLITE',				'Satellitenansicht');
define('_MYMAPMAPTYPE',					'Wie soll die Karte angezeigt werden');
define('_MYMAPOPTIONALTABLE',			'Soll eine Tabelle unter der Karte angezeigt werden, welche alle gespeicherten Punkte extra auflistet');
define('_MYMAPUPDATECREATEMAP',			'Karte erstellen / aktualisieren');
define('_MYMAPRETURNTOMAINPAGE',		'Zur Hauptseite');
define('_MYMAPUPDATED',					'Die Konfiguration der Karte wurde aktualisiert');
define('_MYMAPDELETEMAP',				'Karte und alle damit verkn�pften Informationen l�schen');
define('_MYMAPMAPCREATED',				'Die neue Karte wurde erfolgreich angelegt');
define('_MYMAPMAPDELETED',				'Die Karte wurde mit allen vern�pften Informationen erfolgreich gel�scht');
define('_MYMAPMAPDELETIONERROR',		'W�hrend des Versuchs, die Karte und die damit verkn�pften Informationen zu l�schen, ist ein Fehler aufgetreten');
// display
define('_MYMAPAUTHOR',					'Autor der Karte');
define('_MYMAPMAPNOTFOUND',				'Die angew�hlte Karte existiert nicht oder nicht mehr');
define('_MYMAPADDPOINTS',				'Neue Elemente in die Karte einf�gen');
define('_MYMAPADDPOINTSEXPL',			'Es k�nnen Marker mit der Karte verkn�pft werden. Diese k�nnen u.U. auch HTML-Code in der Beschreibung beinhalten. So lassen Sich auch Bilder, Videos etc. einbinden, sofern n�tig. Wenn auf einen Punkt in der Karte geklickt wird, dann wird dieser automatisch in das entsprechende Formularfeld (Breiten- und L�ngengrad) �bernommen.');
define('_MYMAPCOUNTRYCODE',				'L�ndercode (zweistellig)');
define('_MYMAPPOSTALCODE',				'Postleitzahl');
define('_MYMAPROUTEMANAGEMENT',			'Wegpunkte-/Marker-Management');
define('_MYMAPLAT',						'Breitengrad');
define('_MYMAPLNG',						'L�ngengrad');
define('_MYMAPPLACENAME',				'Name des Ortes');
define('_MYMAPDATE',					'F�r diesen Marker zu speicherndes Datum');
define('_MYMAPUPDATECREATEPOINT',		'Marker erstellen / aktualisieren');
define('_MYMAPCOORDSMISSING',			'Die Koordinatenangaben fehlen. Wenn L�ndercode, Postleitzahl, Ortschaft teilweise bekannt sind bitte angeben, denn dann k�nnen die Koordinaten automatisch ermittelt werden');
define('_MYMAPPOINTUPDATED',			'Der Marker wurde aktualisiert');
define('_MYMAPPOINTADDED',				'Der Marker wurde hinzugef�gt');
define('_MYMAPMULTIFOUND',				'Es wurden mehrere passende Orte gefunden:');
define('_MYMAPCHOOSEONE',				'Bitte den gew�nschten Ort anhand des richtigen L�ndercodes und der richtigen Postleitzahl n�her spezifizieren');
define('_MYMAPDELETE',					'l�schen');
define('_MYMAPPOINTSOVERVIEW',			'�bersicht �ber Marker');
define('_MYMAPPOINTSOVERVIEWEXPL',		'Hier k�nnen, wenn Sie dazu berechtigt sind, die Marker verwaltet werden');
define('_MYMAPSHOWOVERVIEW',			'Liste mit allen Markern einblenden');
define('_MYMAPSHOWADDPOINTS',			'Neuen Marker hinzuf�gen');
define('_MYMAPPOINTDELETED',			'Der Marker wurde gel�scht');
define('_MYMAPPOINTDELETIONERROR',		'Es ist ein Fehler aufgetreten; der Marker konnte nicht gel�scht werden');
define('_MYMAPINSERTMAP',				'Soll die Karte woanders eingebunden werden');
define('_MYMAPINSERTMAPHOWTO',			'Wenn die Karte woanders in der Community z.B. in ein Forum, ein Weblog o.�. eingebunden werden soll, bitte einfach den folgenden Code so an die gew�nschte Stelle kopieren, an welcher die Karte sichtbar sein soll');
define('_MYMAPNOTIFYSENT',				'Der Originalautor der Karte wurde per Email �ber die �nderung an seiner Karte informiert');
define('_MYMAPFULLSCREENMODE',			'Fullscreen-Anzeige');
define('_MYMAPMINIMIZE',				'Minimieren');
define('_MYMAPREALLYDELETE',			'Soll der Marker wirklich gel�scht werden?');
// map control (hook, display, ...)
define('_MYMAPCLOSEMAPCONTROL',			'Men� schlie�en');
define('_MYMAPHIDEMARKERS',				'Marker verstecken');
define('_MYMAPSHOWMARKERS',				'Marker zeigen');
define('_MYMAPHIDEROUTES',				'Route verstecken');
define('_MYMAPSHOWROUTES',				'Route zeigen');
define('_MYMAPEXPORTGPX',				'GPX-Export');
define('_MYMAPEXPORTKML',				'KML-Export');
define('_MYMAPUNKNOWNTYPE',				'Unbekannter Export-Dateityp');
define('_MYMAPWAITFOREXPORT',			'Bitte warten, bis die Daten exportiert wurden!');
// notification email
define('_MYMAPNOTIFYINTRO',				'Dies ist eine kurze Information, dass eine von Ihnen angelegte Karte ver�ndert wurde. Wenn es andern Benutzern nicht mehr m�glich sein soll, diese Karte zu erg�nzen und zu ver�ndern, stellen Sie einfach die Optionen f�r ihre Karten um!');
define('_MYMAPNOTIFYAFFECTEDMAP',		'Informationen �ber die betroffene Karte');
define('_MYMAPMAPID',					'Interne ID-Nummer der Karte');
define('_MYMAPMAPTITLEOFYOURMAP',		'Titel der Karte');
define('_MYMAPNEWMARKERTITLE',			'Titel des neu hinzugef�gten Markers');
define('_MYMAPNEWMARKERTEXT',			'Beschreibung / Text f�r den neuen Marker');
define('_MYMAPADDEDBY',					'Der Marker wurde hinzugef�gt vom Benutzer');
define('_MYMAPMAPLINK',					'Karte ansehen');
define('_MYMAPDONOTREPLY',				'Bitte nicht auf dieses Email antworten. Es handelt sich lediglich um ein automatisch generiertes Email');
define('_MYMAPUSERID',					'Benutzer-ID');
define('_MYMAPSUBJECT',					'Ihre Karte wurde ver�ndert');
// userdeletion support
define('_MYPROFILEMAPSDELETEDFOR',		'Alle Karten gel�scht vom User');
?>