<?php
session_start();
require_once 'application/core/model.php';//класс модели
require_once 'application/core/view.php';//класс обработчика вида
require_once 'application/core/controller.php';// класс главного контроллера
require_once 'application/core/route.php'; //класс маршрутизации
Route::start(); // запускаем маршрутизатор
?>