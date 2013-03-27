<?php

use RedBean_Facade as R;

$app->get('/test-orm/create/{name}', function ($name) use ($app) {
  $thing = R::dispense('thing');
  $thing->name = $name;

  $id = R::store($thing);

  return $id;
});


$app->get('/test-orm', function () {
  $all = R::find('thing');
  return json_encode( R::exportAll( $all ) );
});


$app->get('/test-orm/{id}', function ($id) use ($app) {
  $thing = R::load('thing', $id);
  return $thing;
});


$app->get('/using-template', function () use ($app) {
  return $app['twig']->render('some_view.twig');
});

?>
