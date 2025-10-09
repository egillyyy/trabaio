<?php

session_start();
session_destroy();

header("Location: formAgendamento.php");
