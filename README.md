# redpram_progetto_pdgt
# Mappa RedPram 

Gli Open Data in formato .xls sono stati convertiti in un file .csv  con delle modifiche apportate, riguardanti l’eliminazione di campi da noi ritenuti non necessari, eliminazione di campi duplicati, dati ristretti riguardanti l’area urbana di Urbino con infine l’aggiunta di tre campi (ascensore, rampa, servizi igienici) necessari a dettagliare quelle che saranno le informazioni d’interesse per gli utenti.

FILE .CSV -> Importazione -> Database mysql mapmarkerswork .markers

Successivamente gli attributi del database sono stati convertiti in un file .XML grazie all’ausilio dello script .php (Markers_dom_work.php) che tramite il metodo mysqli_connect stabilisce una connessione con il database mysql e ne esegue una query per ottenere tutti i dati tramite metodo mysqli_query per poi associare ogni riga del database ad un attributo nel file xml. Questa funzione viene chiamata PHP ‘s DOM per l’output xml. 

Markers_dom-work -> Connection -> Database mysql mapmarkerswork .markers -> saveXML


Il file XML estrapolato dal database verrà richiamato dal file mappa.html tramite XMLHttpRequest e viene  caricato sulla pagina web dalla function  downloadUrl () 

File .xml -> downloadUrl -> mappa.html

Pagina mappa.html inizializza una mappa di google maps grazie all’utilizzo dell’API: https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap

API -> inizializza mappa -> mappa.html


Una volta che il file .xml viene caricato sulla pagina mappa.html verrà creato un array contenente tutti gli attributi del file xml precedentemente caricato per poi associarli ai marker tramite evento click riguardante l’infoWindow e  all’infoPanel.  

mappa.html -> marker(evento click) -> infoWindow/infoPanel 


# Mappa Segnalazioni

Il file mappa_segnalazioni.html sfrutta l’API messa a disposizione da Google
https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap 
consente di inizializzare la mappa ed avere una lista di place tramite libraries=place che consente di usare la search box per cercare un determinato indirizzo e ne fornisce l’autocompletamento.

API -> inizializza mappa -> search box -> place (auto complete)

Nel file mappasegnalazioni.html all’evento click su un marker si aprirà un form contenente le informazioni che l’utente andrà ad inserire ( Nome,indirizzo,tipo,ascensore,rampa,servizi igienici per disabili).

mappa segnalazioni.html -> marker -> click -> form -> saveData()

saveData salva nome, indirizzo, tipo, coordinate, ascensore, rampa, servizi igienici in un URL il quale viene concatenato con lo script segnalazioni_location.php

saveData -> URL -> segnalazioni_location.php


Il file segnalazioni_location.php acquisisce i dati dai parametri dell’URL tramite variabile $-_GET 

URL -> segnalazioni_location.php -> $_GET 

Successivamente lo script si collega al server mysql tramite funzione mysqliconnect per poi inserire dati tramite mysqliquery nel database userlocation nella mappa locationsend.

segnalazioni_location.php -> connection -> userlocation.locatiosend 
segnalazioni_location.php -> mysqli¬_query -> userlocation.locationsend 


# RedPram Index

Index.html è l’index della nostra piattaforma sviluppata attraverso codice html per avere una base sulla quale richiamare i nostri servizi, ricordando che il template è stato acquisito tramite un sito web utilizzato semplicemente per dare maggior qualità all’interfaccia utente con delle modifiche attraverso le quali risultavano indispensabili compiere. 

Esso richiama i file mappa.html  e mappa segnalazioni.html tramite dei button creati appositamente.
<img src="redpram1.png">

