<?php
  require_once __DIR__ . '/data/db.php';

  $genres = [];
  $years = [];
  // dove viene salvato il database ordinato per
  // anni decrescenti
  $orderedDatabase = [];

  /* 
    Ciclando ogni 'record' del 'database' estraggo
    gli anni salvandoli in un array solo se non vi 
    sono già presenti. Poi con 'rsort()' li ordino
    in ordine decrescente.
  */
  foreach ($database as $record) {
    if (!in_array($record['year'], $years)) {
      $years[] = $record['year'];
    }
    rsort($years); 
  }

  /* 
    Per ogni anno nell'array controllo ogni 'record'
    nel 'database' con due cicli foreach innestati
    e quando l'anno matcha con un 'record' questo
    viene salvato nel nuovo array.
  */
  foreach ($years as $year) {
    foreach ($database as $record) {
      if ($year === $record['year']) {
        $orderedDatabase[] = $record;
      }
    }
  }
  
  /* 
    Controllo se la query genre è vuota o se è = a 
    'all'. In quel caso l'array 'records' è uguale
    a al database ordinato. Se non è così, risulta un
    array vuoto.
  */
  $records = empty($_GET['genre']) || $_GET['genre'] === 'all' ? $orderedDatabase : [];
  
  /* 
    Ciclando ogni 'record' del 'database' estraggo
    i generi salvandoli in un array solo se non vi 
    sono già presenti.
  */
  foreach ($database as $record) {
    if (!in_array($record['genre'], $genres)) {
      $genres[] = $record['genre'];
    }
  }

  /* 
    Se l'array 'records' è vuoto (cioè è stata 
    passata una query) allora ciclo ogni 'record'
    dal database ordinato e, se matcha con il genere
    scelto dall'utene (query), viene aggiunto
    all'array 'records' (filtro).
  */
  if (count($records) === 0) {
    foreach ($orderedDatabase as $record) {
      if ($record['genre'] === $_GET['genre']) {
        $records[] = $record;
      }
    }
  }

  $response = [
    'records' => $records,
    'genres' => $genres
  ];

  header('Content-Type: application/json');

  echo json_encode($response);

?>