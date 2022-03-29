<?php

echo generarListaNavegacion();
function generarListaNavegacion()
{
    $activities = array(
        array('title' => 'Index', 'link' => ''),
        array('title' => 'Número Aleatorio', 'link' => 'e1'),
        array('title' => 'Reescritura de contraseñas', 'link' => 'e2'),
        array('title' => 'Operaciones Aritméticas', 'link' => 'e3'),
        array('title' => 'Encuesta', 'link' => 'e4'),
        array('title' => 'Figuras Geométricas', 'link' => 'e5'),
    );
    $list = '<ul>';
    foreach ($activities as $activity) {
        $list .= generarItem($activity);
    }
    $list .= '</ul>';
    return $list;
}

function generarItem($activity)
{
    return '<li>' . generarEnlace($activity) . '</li>';
}

function generarEnlace($activity)
{
    return '<a href="http://cpd.iesgrancapitan.org:9118/~cemuja/ra3/' . $activity['link'] . '" >' . $activity['title'] . '</a>';
}
