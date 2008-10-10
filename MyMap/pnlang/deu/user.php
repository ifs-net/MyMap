<?php
/**
 * @package      MyMap
 * @version      $Id$
 * @author       Florian Schießl
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
define('_MYMAPHOOKDELETEFAILED',		'Das Löschen des Hooks schlug fehl');
define('_MYMAPHOOKDISPLAYERROR',		'Es ist ein Fehler in der Hook-Funktion von MyMap aufgetreten');
define('_MYMAPMAPERROR',				'MyMap - Fehler');
define('_MYMAPMAPIDNOTFOUND',			'Die Karte mit der übergebenen ID-Nummer konnte nicht gefunden werden');
define('_MYMAPEXPLAINHOOKERR',			'Was bedeutet das, wenn ich das lesen kann? Der Autor der Seite (welcher aber nicht der Administrator der Gesamtseite sein muss!) hat wohl einen Fehler gemacht. Schicke ihm doch ein kleines, liebes Email und weise ihn darauf hin ;-)');
// main 
define('_MYMAPWELCOMETOMYMAP',			'MyMap - grafische Karten mit Markern und Routen erstellen');
define('_MYMAPEXPLAINMYMAP',			'Mit diesem Modul kannst Du eigene Karten anlegen und verwalten. Das heisst genauer, diese können mit Markern, Texten etc. befüllt werden. So sind diese sehr vielfältig einsetzbar. Eine angelegte Karte kann dann auch in andere Bereiche dieser Seite einfach eingebunden werden. So kann man z.B. Karten in Forenpostings und Weblog-Beiträge einbinden.');
define('_MYMAPADDNEWMAP',				'Eine neue Karte anlegen');
define('_MYMAPMYMAPS',					'Map-Management');
define('_MYMAPMANAGEMAPS',				'Hier können bestehende, angelegte karten verwaltet werden');
define('_MYMAPNOMAP',					'Sie haben noch keine Karten angelegt');
define('_MYMAPEDIT',					'modifizieren');
define('_MYMAPDELETE',					'löschen');
define('_MYMAPSHOW',					'Karte bearbeiten (Wegpunkt- und Marker-Management)');
// routes
define('_MYMAPROUTEMANAGMENT',			'Wegpunkt-/Routen-Management');
define('_MYMAPROUTESINTRO',				'Es können Routen in die Karte eingezeichnet werden. Zwischen allen angelegten Wegpunkten wird eine Linie gezogen.');
define('_MYMAPADDCOORDINATE',			'hinzufügen');
define('_MYMAPORIMPORT',				'oder die Import-Funktion für den Import von GPX-Daten nutzen (den "hinzufügen"-Button nach der Dateiauswahl betätigen!)');
define('_MYMAPIMPORTERROR',				'Beim Versuch, die Datei zu importieren, ist ein Fehler aufgetreten');
define('_MYMAPIMPORTSUCCESSFULL',		'Die Datei wurde importiert');
define('_MYMAPNUMSOFWPS',				'Anzahl der gespeicherten Wegpunkte');
define('_MYMAPWAYPOINTADDED',			'Neuer Wegpunkt wurde hinzugefügt');
define('_MYMAPWAYPOINTSDELETED',		'Es wurden alle mit dieser Karte verknüpften Wegpunkte entfernt!');
define('_MYMAPWAYPOINTSDELETIONERROR',	'Es ist ein Fehler beim Löschen von Wegpunkten aufgetreten');
define('_MYMAPWAYPOINTDELETED',			'Der Wegpunkt wurde erfolgreich entfernt');
define('_MYMAPDELETEALLWAYPOINTS',		'Alle Wegpunkte löschen');
define('_MYMAPDELETELASTWAYPOINT',		'letzten Wegpunkt entfernen');
define('_MYMAPACTIONS',					'Aktionen');
define('_MYMAPBACKTOMAP',				'Zurück zum Marker-Management der Karte');
define('_MYMPUPLOADERROR',				'Es ist eine leere Datei übermittelt worden oder ein andere Fehler während des Uploads aufgetreten');
define('_MYMAPORADDWAYPOINT',			'oder einen einzelnen Wegpunkt hinzufügen');
// edit
define('_MYMAPTITLE',					'Titel');
define('_MYMAPDESCRIPTION',				'Beschreibung');
define('_MYMAPWIDTH',					'Breite der Karte in Pixeln');
define('_MYMAPHEIGHT',					'Höhe der Karte in Pixeln');
define('_MYMAPZOOMFACTOR',				'Zoomfaktor für die Karte (1 = größter Zoom)');
define('_MYMAPWIKI',					'Sollen andere Mitglieder dieser Community in der Karte eigene Marker hinzufügen können?');
define('_MYMAPYES',						'Ja');
define('_MYMAPNO',						'Nein');
define('_MYMAPHYBRID',					'Hybrid');
define('_MYMAPNORMAL',					'Normal / Straße');
define('_MYMAPSATELLITE',				'Satellitenansicht');
define('_MYMAPMAPTYPE',					'Wie soll die Karte angezeigt werden');
define('_MYMAPOPTIONALTABLE',			'Soll eine Tabelle unter der Karte angezeigt werden, welche alle gespeicherten Punkte extra auflistet');
define('_MYMAPUPDATECREATEMAP',			'Karte erstellen / aktualisieren');
define('_MYMAPRETURNTOMAINPAGE',		'Zur Hauptseite');
define('_MYMAPUPDATED',					'Die Konfiguration der Karte wurde aktualisiert');
define('_MYMAPDELETEMAP',				'Karte und alle damit verknüpften Informationen löschen');
define('_MYMAPMAPCREATED',				'Die neue Karte wurde erfolgreich angelegt');
define('_MYMAPMAPDELETED',				'Die Karte wurde mit allen vernüpften Informationen erfolgreich gelöscht');
define('_MYMAPMAPDELETIONERROR',		'Während des Versuchs, die Karte und die damit verknüpften Informationen zu löschen, ist ein Fehler aufgetreten');
// display
define('_MYMAPAUTHOR',					'Autor der Karte');
define('_MYMAPMAPNOTFOUND',				'Die angewählte Karte existiert nicht oder nicht mehr');
define('_MYMAPADDPOINTS',				'Neue Elemente in die Karte einfügen');
define('_MYMAPADDPOINTSEXPL',			'Es können Marker mit der Karte verknüpft werden. Diese können u.U. auch HTML-Code in der Beschreibung beinhalten. So lassen Sich auch Bilder, Videos etc. einbinden, sofern nötig. Wenn auf einen Punkt in der Karte geklickt wird, dann wird dieser automatisch in das entsprechende Formularfeld (Breiten- und Längengrad) übernommen.');
define('_MYMAPCOUNTRYCODE',				'Ländercode (zweistellig)');
define('_MYMAPPOSTALCODE',				'Postleitzahl');
define('_MYMAPROUTEMANAGEMENT',			'Wegpunkte-/Marker-Management');
define('_MYMAPLAT',						'Breitengrad');
define('_MYMAPLNG',						'Längengrad');
define('_MYMAPPLACENAME',				'Name des Ortes');
define('_MYMAPDATE',					'Für diesen Marker zu speicherndes Datum');
define('_MYMAPUPDATECREATEPOINT',		'Marker erstellen / aktualisieren');
define('_MYMAPCOORDSMISSING',			'Die Koordinatenangaben fehlen. Wenn Ländercode, Postleitzahl, Ortschaft teilweise bekannt sind bitte angeben, denn dann können die Koordinaten automatisch ermittelt werden');
define('_MYMAPPOINTUPDATED',			'Der Marker wurde aktualisiert');
define('_MYMAPPOINTADDED',				'Der Marker wurde hinzugefügt');
define('_MYMAPMULTIFOUND',				'Es wurden mehrere passende Orte gefunden:');
define('_MYMAPCHOOSEONE',				'Bitte den gewünschten Ort anhand des richtigen Ländercodes und der richtigen Postleitzahl näher spezifizieren');
define('_MYMAPDELETE',					'löschen');
define('_MYMAPPOINTSOVERVIEW',			'Übersicht über Marker');
define('_MYMAPPOINTSOVERVIEWEXPL',		'Hier können, wenn Sie dazu berechtigt sind, die Marker verwaltet werden');
define('_MYMAPSHOWOVERVIEW',			'Liste mit allen Markern einblenden');
define('_MYMAPSHOWADDPOINTS',			'Neuen Marker hinzufügen');
define('_MYMAPPOINTDELETED',			'Der Marker wurde gelöscht');
define('_MYMAPPOINTDELETIONERROR',		'Es ist ein Fehler aufgetreten; der Marker konnte nicht gelöscht werden');
define('_MYMAPINSERTMAP',				'Soll die Karte woanders eingebunden werden');
define('_MYMAPINSERTMAPHOWTO',			'Wenn die Karte woanders in der Community z.B. in ein Forum, ein Weblog o.ä. eingebunden werden soll, bitte einfach den folgenden Code so an die gewünschte Stelle kopieren, an welcher die Karte sichtbar sein soll');
define('_MYMAPNOTIFYSENT',				'Der Originalautor der Karte wurde per Email über die Änderung an seiner Karte informiert');
define('_MYMAPFULLSCREENMODE',			'Fullscreen-Anzeige');
define('_MYMAPMINIMIZE',				'Minimieren');
define('_MYMAPREALLYDELETE',			'Soll der Marker wirklich gelöscht werden?');
// map control (hook, display, ...)
define('_MYMAPCLOSEMAPCONTROL',			'Menü schließen');
define('_MYMAPHIDEMARKERS',				'Marker verstecken');
define('_MYMAPSHOWMARKERS',				'Marker zeigen');
define('_MYMAPHIDEROUTES',				'Route verstecken');
define('_MYMAPSHOWROUTES',				'Route zeigen');
define('_MYMAPEXPORTGPX',				'GPX-Export');
define('_MYMAPEXPORTKML',				'KML-Export');
define('_MYMAPUNKNOWNTYPE',				'Unbekannter Export-Dateityp');
define('_MYMAPWAITFOREXPORT',			'Bitte warten, bis die Daten exportiert wurden!');
// notification email
define('_MYMAPNOTIFYINTRO',				'Dies ist eine kurze Information, dass eine von Ihnen angelegte Karte verändert wurde. Wenn es andern Benutzern nicht mehr möglich sein soll, diese Karte zu ergänzen und zu verändern, stellen Sie einfach die Optionen für ihre Karten um!');
define('_MYMAPNOTIFYAFFECTEDMAP',		'Informationen über die betroffene Karte');
define('_MYMAPMAPID',					'Interne ID-Nummer der Karte');
define('_MYMAPMAPTITLEOFYOURMAP',		'Titel der Karte');
define('_MYMAPNEWMARKERTITLE',			'Titel des neu hinzugefügten Markers');
define('_MYMAPNEWMARKERTEXT',			'Beschreibung / Text für den neuen Marker');
define('_MYMAPADDEDBY',					'Der Marker wurde hinzugefügt vom Benutzer');
define('_MYMAPMAPLINK',					'Karte ansehen');
define('_MYMAPDONOTREPLY',				'Bitte nicht auf dieses Email antworten. Es handelt sich lediglich um ein automatisch generiertes Email');
define('_MYMAPUSERID',					'Benutzer-ID');
define('_MYMAPSUBJECT',					'Ihre Karte wurde verändert');
// userdeletion support
define('_MYPROFILEMAPSDELETEDFOR',		'Alle Karten gelöscht vom User');
?>